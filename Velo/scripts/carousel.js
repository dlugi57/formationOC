class Carousel {
  constructor(slides) {
    this.slides = slides;
    this.intervalSlider;
    this.slideNumber = 0;
  }


  initialize() {

    document.getElementById("slider-block").style.backgroundImage = this.slides[this.slideNumber].image;
    document.getElementById("sliderTitle").innerHTML = this.slides[this.slideNumber].title;
    document.getElementById("sliderText").innerHTML = this.slides[this.slideNumber].text;


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
