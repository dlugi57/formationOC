var slides = [];

slides.push({
  image: "images/slide0.jpg",
  title: "title0",
  text: "text0"
});
slides.push({
  image: "images/slide1.jpg",
  title: "title1",
  text: "text1"
});
slides.push({
  image: "images/slide2.jpg",
  title: "title2",
  text: "text2"
});
slides.push({
  image: "images/slide3.jpg",
  title: "title3",
  text: "text3"
});
slides.push({
  image: "images/slide4.jpg",
  title: "title4",
  text: "text4"
});



var carousel = {
  slides: [],
  slideNumber: 0,
  intervalSlider:'',
  initialize() {
    document.getElementById("sliderImage").src = this.slides[this.slideNumber].image;
    document.getElementById("sliderTitle").textContent = this.slides[this.slideNumber].title;
    document.getElementById("sliderText").textContent = this.slides[this.slideNumber].text;
    console.log(this.slideNumber);
  },
  nextSlide() {
    this.slideNumber++;
    if (this.slideNumber > this.slides.length - 1) {
      this.slideNumber = 0;
    }
    carousel.initialize();
  },
  previousSlide() {
    this.slideNumber--;
    if (this.slideNumber < 0) {
      this.slideNumber = this.slides.length - 1;
    }
    carousel.initialize();
  },
  playSlider(){
    this.intervalSlider = setInterval(function() {
      carousel.nextSlide();
    }, 5000);
  },
  stopSlider(){
    clearInterval(this.intervalSlider);
  }



};


carousel.slides = slides;
carousel.initialize();
carousel.playSlider();
/*var playSlider = setInterval(function() {
  carousel.nextSlide();
}, 1000);*/
var rightBtn = document.getElementById("sliderRightBtn");
rightBtn.addEventListener("click", function() {
  carousel.nextSlide();
  //carousel.initialize();
});
var leftBtn = document.getElementById("sliderLeftBtn");
leftBtn.addEventListener("click", function() {
  carousel.previousSlide();
  //carousel.initialize();
});
var startBtn = document.getElementById("sliderPlayBtn");
startBtn.addEventListener("click", function() {
  carousel.playSlider();
  /*  setInterval(function() {
      carousel.nextSlide();
    }, 1000);*/
  //carousel.initialize();
});
var stopBtn = document.getElementById("sliderStopBtn");
stopBtn.addEventListener("click", function() {
  //  clearInterval(playSlider);
  //carousel.initialize();
  carousel.stopSlider();
});

document.addEventListener("keyup", function(e) {

  if (e.keyCode === 37) {
    carousel.previousSlide();
    carousel.initialize();
  } else if (e.keyCode === 39) {
    carousel.nextSlide();
    //carousel.initialize();
  }

})
/*
var playSlider = setInterval(function () {
    carousel.nextSlide();
}, 1000);
*/
