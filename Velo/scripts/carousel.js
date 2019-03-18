//class to make slider works
class Carousel {
  //get the slides array with photo title and text
  constructor(slides) {
    this.slides = slides;
    this.intervalSlider;
    this.slideNumber = 0;
  }
  //population of elements
  initialize() {
    document.getElementById("slider-block").style.backgroundImage = this.slides[this.slideNumber].image;
    document.getElementById("sliderTitle").innerHTML = this.slides[this.slideNumber].title;
    document.getElementById("sliderText").innerHTML = this.slides[this.slideNumber].text;
  }
  //send to the next slide
  nextSlide() {
    this.slideNumber++;
    //condition to close a circle od slider and start from 0
    if (this.slideNumber > this.slides.length - 1) {
      this.slideNumber = 0;
    }
    this.initialize();
  }
  //send to the previous slider
  previousSlide() {
    this.slideNumber--;
    //condtion to send to the last slider if we are on the firs
    if (this.slideNumber < 0) {
      this.slideNumber = this.slides.length - 1;
    }
    this.initialize();
  }
  //start of interval
  playSlider() {
    this.intervalSlider = setInterval(this.nextSlide.bind(this), 5000);
    document.getElementById("sliderPlayBtn").style.display = "none";
    document.getElementById("sliderStopBtn").style.display = "block";
  }
  //stop of interval 
  stopSlider() {
    clearInterval(this.intervalSlider);
    document.getElementById("sliderPlayBtn").style.display = "block";
    document.getElementById("sliderStopBtn").style.display = "none";
  }
};
