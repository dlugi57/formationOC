/* Here we call inits of all classes and most of events */
class Index {
  //call carousel
  carousel() {
    //all photos titles and text for slider its stoked into an array
    var slides = [];

    slides.push({

      image: "url('../Velo/images/slide0.jpg')",
      title: "Bienvenue sur l'application de réservation <b>Vélô</b> à Toulouse !",
      text: "Découvrez son fonctionnement"
    });
    slides.push({
      image: "url('../Velo/images/slide1.jpg')",
      title: "Choisir votre station",
      text: "Sélectionnez le marqueur correspondant à la station de votre choix."
    });
    slides.push({
      image: "url('../Velo/images/slide2.jpg')",
      title: "Valider la réservation",
      text: "Vérifiez le nombre de <b>Vélôs</b> disponibles, entrez votre nom et prénom puis cliquez &quot;Réserve&quot;"
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
    //send of array to a carousel class
    var newCarousel = new Carousel(slides);
    newCarousel.initialize();
    //start of interval
    newCarousel.playSlider();
    //events from slider mouse
    var rightBtn = document.getElementById("sliderRightBtn");
    rightBtn.addEventListener("click", function() {
      newCarousel.nextSlide();
    });
    var leftBtn = document.getElementById("sliderLeftBtn");
    leftBtn.addEventListener("click", function() {
      newCarousel.previousSlide();
    });
    var startBtn = document.getElementById("sliderPlayBtn");
    startBtn.addEventListener("click", function() {
      newCarousel.playSlider();
    });
    var stopBtn = document.getElementById("sliderStopBtn");
    stopBtn.addEventListener("click", function() {
      newCarousel.stopSlider();
    });
    //event with keybord
    document.addEventListener("keyup", function(e) {
      if (e.keyCode === 37) {
        newCarousel.previousSlide();
        newCarousel.initialize();
      } else if (e.keyCode === 39) {
        newCarousel.nextSlide();
      }
    })
  };

  //call to Stations class
  stations() {
    //send of APIµ key and city
    var myStations = new Stations("62114b2e5a5efa9d593e73b53d562e2cf63b4cbb", "Toulouse");
    myStations.showStations();
    //event of button
    var reserverBtn = document.getElementById("station-reserver-btn");
    reserverBtn.addEventListener("click", function() {
      var checkName = document.getElementById("name-reservation").value;
      var checkSurname = document.getElementById("surname-reservation").value;
      //condition to check if name and surname are in imput
      if (checkName == null || checkName == "" || checkSurname == null || checkSurname == "") {
        document.getElementById("info-champs").textContent = "Nom et prénom obligatoire";
        return false;
      }
      //hide description and shows canvas
      document.getElementById("description-aside").style.display = "none";
      document.getElementById("reservation-aside").style.display = "block";
    });
  };

  //call Reservation class
  reservation() {

    var myReservation = new Reservation();
    myReservation.showReservation();
    //event of confirmation button
    var confirmerBtn = document.getElementById("station-confirmer-btn");
    confirmerBtn.addEventListener("click", function() {
      //hide and shows elements
      document.getElementById("reservation-aside").style.display = "none";
      document.getElementById("description-aside").style.display = "block";
      document.getElementById("info-champs").textContent = "Vous avez réservé cette station";
      document.getElementById("station-reserver-btn").style.display = "none";
      //send to the bottom of the page to show reservation
      window.scrollTo(0, document.body.scrollHeight);
      myReservation.setReservation();
    })
    //event of anuler button
    var anulerResBtn = document.getElementById("station-anuler-btn");
    anulerResBtn.addEventListener("click", function() {
      //hide and shows elements
      document.getElementById("station-confirmer-btn").style.display = "none";
      document.getElementById("reservation-aside").style.display = "none";
      document.getElementById("description-aside").style.display = "block";
      document.getElementById("canvas").style.borderColor = "#D9534F";
      //call to canvas class for clear canvas
      var clearCanvas = new Canvas;
      clearCanvas.clearCanvas();
    });
  };

  //call Canvas class
  canvas() {
    var newCanvas = new Canvas();
    newCanvas.startDrawing();
    newCanvas.startTouching();
    //event of clear button
    var clearResBtn = document.getElementById("station-clear-btn");
    clearResBtn.addEventListener("click", function() {
      document.getElementById("station-confirmer-btn").style.display = "none";
      document.getElementById("canvas").style.borderColor = "#D9534F";
      newCanvas.clearCanvas();
    })
  }
}

/*****************************/
/* Initialize all of classes */
/*****************************/
var application = new Index;
application.carousel();
application.stations();
application.reservation();
application.canvas();
