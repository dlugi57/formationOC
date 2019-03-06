//play slider() musialem urzyc funkcji w srodku bo sie nic nie dzialo jak nie bylo funkcji



class Carousel {
intervalSlider;
slideNumber = 0;
  constructor(slides) {
    this.slides = slides;

  //  this.intervalSlider = '';
  }

  //slides: [],
  //slideNumber: 0,
  //intervalSlider: '',
  initialize() {
    document.getElementById("sliderImage").src = this.slides[this.slideNumber].image;
    document.getElementById("sliderTitle").textContent = this.slides[this.slideNumber].title;
    document.getElementById("sliderText").textContent = this.slides[this.slideNumber].text;
    //console.log(this.slideNumber);---------------------------------------------------------------------------------------------------

  }
  nextSlide() {
    this.slideNumber++;
    if (this.slideNumber > this.slides.length - 1) {
      this.slideNumber = 0;
    }
    this.initialize();
  }
  previousSlide() {
    this.slideNumber--;
    if (this.slideNumber < 0) {
      this.slideNumber = this.slides.length - 1;
    }
    this.initialize();
  }
  playSlider() {

     //this.intervalSlider = setInterval("this.nextSlide()", 5000);
    this.intervalSlider = setInterval(this.nextSlide.bind(this), 5000);
    document.getElementById("sliderPlayBtn").style.display = "none";
    document.getElementById("sliderStopBtn").style.display = "block";
  }
  stopSlider() {
    clearInterval(this.intervalSlider);
    document.getElementById("sliderPlayBtn").style.display = "block";
    document.getElementById("sliderStopBtn").style.display = "none";
  }



};


/*
var playSlider = setInterval(function () {
    carousel.nextSlide();
}, 1000);
*/
