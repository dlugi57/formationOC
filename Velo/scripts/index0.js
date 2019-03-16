var slides = [];

slides.push({

  image: "url('../Velo/images/slide0.jpg')",
  title: "Bienvenue sur l'application de réservation <b>Vélô</b> à Toulouse !",
  text: "Découvrez son fonctionnement"
});
slides.push({
  image: "url('../Velo/images/slide1.jpg')",
  title: "Choisir votre station",
  text: "Selectionnez le marqueur correspondant à la station de votre choix."
});
slides.push({
  image: "url('../Velo/images/slide2.jpg')",
  title: "Valider la réservation",
  text: "Vérifiez le nombre de <b>Vélôs</b> disponibles ,entrez votre nom et prénom puis cliquez &quot;Réserve&quot;"
});
slides.push({
  image: "url('../Velo/images/slide3.jpg')",
  title: "Confirmer la réservation",
  text: "Laissez votre signature dans le carré blanc et cliquez sur &quot;confirmer&quot; pour enregistrer votre réservation."
});
slides.push({
  image: "url('../Velo/images/slide4.jpg')",
  title: "Réservation en cours",
  text: "Retrouvez toutes les informations concernant votre réservation en cours, ainsi que la possibilité de l'annuler à tout moment."
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

var checkName = document.getElementById("name-reservation").value;
var checkSurname = document.getElementById("surname-reservation").value;

  //document.getElementById("description-aside").style.display = "none";
  if (checkName == null||checkName=="" || checkSurname==null||checkSurname=="") {
    document.getElementById("info-champs").textContent = "Nom et prénom obligatoire";
    console.log("you need to put things into imput");
    return false;
  }
  document.getElementById("description-aside").style.display = "none";
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
document.getElementById("station-confirmer-btn").style.display = "none";
document.getElementById("reservation-aside").style.display = "none";
document.getElementById("description-aside").style.display = "block";
newCanvas.clearCanvas();

});

/* CANVAS -----------------------------------------------------------------------------------------------------------------*/
var newCanvas = new Canvas();
newCanvas.startDrawing();
newCanvas.startTouching();
var clearResBtn = document.getElementById("station-clear-btn");
clearResBtn.addEventListener("click" , function(){
document.getElementById("station-confirmer-btn").style.display = "none";
newCanvas.clearCanvas();

})
