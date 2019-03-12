var slides = [];

slides.push({

  image: "url('../Velo/images/slide0.jpg')",
  title: "title0",
  text: "text0"
});
slides.push({
  image: "url('../Velo/images/slide1.jpg')",
  title: "title1",
  text: "text1"
});
slides.push({
  image: "url('../Velo/images/slide2.jpg')",
  title: "title2",
  text: "text2"
});
slides.push({
  image: "url('../Velo/images/slide3.jpg')",
  title: "title3",
  text: "text3"
});
slides.push({
  image: "url('../Velo/images/slide4.jpg')",
  title: "title4",
  text: "text4"
});

var newCarousel = new Carousel(slides);
//carousel.slides = slides;
newCarousel.initialize();
newCarousel.playSlider();
/*var playSlider = setInterval(function() {
  carousel.nextSlide();
}, 1000);*/
var rightBtn = document.getElementById("sliderRightBtn");
rightBtn.addEventListener("click", function() {
  newCarousel.nextSlide();
  //carousel.initialize();
});
var leftBtn = document.getElementById("sliderLeftBtn");
leftBtn.addEventListener("click", function() {
  newCarousel.previousSlide();
  //carousel.initialize();
});
var startBtn = document.getElementById("sliderPlayBtn");
startBtn.addEventListener("click", function() {
  newCarousel.playSlider();
  /*  setInterval(function() {
      carousel.nextSlide();
    }, 1000);*/
  //carousel.initialize();
});
var stopBtn = document.getElementById("sliderStopBtn");
stopBtn.addEventListener("click", function() {
  //  clearInterval(playSlider);
  //carousel.initialize();
  newCarousel.stopSlider();
});

document.addEventListener("keyup", function(e) {

  if (e.keyCode === 37) {
    newCarousel.previousSlide();
    newCarousel.initialize();
  } else if (e.keyCode === 39) {
    newCarousel.nextSlide();
    //carousel.initialize();
  }

})



/* STATIONS ------------------------------------------------------------------------------*/

var myStations = new Stations("62114b2e5a5efa9d593e73b53d562e2cf63b4cbb", "Toulouse");
myStations.showStations();

var reserverBtn = document.getElementById("station-reserver-btn");
reserverBtn.addEventListener("click", function() {
document.getElementById("description-aside").style.display = "none";
var checkName = document.getElementById("name-reservation").value;
var checkSurname = document.getElementById("surname-reservation").value;

  //document.getElementById("description-aside").style.display = "none";
  if (checkName == null||checkName=="",checkSurname==null||checkSurname=="") {
    document.getElementById("info-champs").textContent = "Veuillez renseigner ce champ";
    console.log("you need to put things into imput");
    return false;
  }
  document.getElementById("reservation-aside").style.display = "block";
//console.log(myStations.stationName());
});

/* RESERVATIONS ---------------------------------------------------------------------------------*/


var myReservation = new Reservation();
myReservation.showReservation();
//myReservation.counter();

var confirmerBtn = document.getElementById("station-confirmer-btn");
confirmerBtn.addEventListener("click", function() {
document.getElementById("reservation-aside").style.display = "none";
document.getElementById("description-aside").style.display = "block";
document.getElementById("info-champs").textContent = "Vous avez réservé cette station";
document.getElementById("station-reserver-btn").style.display = "none";

//document.getElementById("description").style.display = "none";
//  reservation.showReservation();

window.scrollTo(0,document.body.scrollHeight);
myReservation.setReservation();


})

var anulerResBtn = document.getElementById("station-anuler-btn");
anulerResBtn.addEventListener("click", function(){

document.getElementById("reservation-aside").style.display = "none";
document.getElementById("description-aside").style.display = "block";

});

/* CANVAS -----------------------------------------------------------------------------------------------------------------*/
var newCanvas = new Canvas();
newCanvas.startDrawing();
newCanvas.startTouching();
var clearResBtn = document.getElementById("station-clear-btn");
clearResBtn.addEventListener("click" , function(){

newCanvas.clearCanvas();

})
