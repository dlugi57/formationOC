//this class show the reservation of bike and counter
class Reservation {

  constructor() {
    this.nameRes;
    this.surnameRes;
    this.stationRes;
    this.secondes;
    this.minutes;
    this.counterInter;
  }
  //take the info from description and set time
  setReservation() {
    this.nameRes = document.getElementById("name-reservation").value;
    this.surnameRes = document.getElementById("surname-reservation").value;
    this.stationRes = document.getElementById("station-name").innerHTML;
    this.secondes = 0;
    this.minutes = 20;
    //set info to local and session storage
    localStorage.setItem("name", this.nameRes);
    localStorage.setItem("surname", this.surnameRes);
    sessionStorage.setItem("secondes", this.secondes);
    sessionStorage.setItem("minutes", this.minutes);
    sessionStorage.setItem("stationName", this.stationRes);
    this.showReservation();
  }

  //populate reservation section 
  showReservation() {
    //populate from session and local storage
    this.nom = localStorage.name;
    this.prenom = localStorage.surname;
    this.station = sessionStorage.stationName;
    this.minutes = sessionStorage.minutes;
    this.secondes = sessionStorage.secondes;
    //conditions to populate name and surname if there are some in local storage
    if (localStorage.name !== '' && localStorage.name !== null && localStorage.name !== undefined) {
      document.getElementById("name-reservation").setAttribute('value', localStorage.getItem('name'));
      document.getElementById("surname-reservation").setAttribute('value', localStorage.getItem('surname'));
    }
    //condition with station to show reservation and call interval
    if (sessionStorage.stationName !== '' && sessionStorage.stationName !== undefined) {
      document.getElementById("counter-info").textContent = "Vélo réservé à la station " + this.station + " par " + this.prenom + " " + this.nom;
      clearInterval(this.counterInter);
      this.counterInter = setInterval(this.counter.bind(this), 1000);
    }
  }

  //counter mechanizm
  counter() {
    var minElt = document.getElementById("counter-minut");
    var secElt = document.getElementById("counter-second");
    //only design condition to put zero before single number
    if (this.secondes < 10) {
      secElt.textContent = "0" + this.secondes + "s";
    } else {
      secElt.textContent = this.secondes + "s";
    }
    if (this.minutes < 10) {
      minElt.textContent = "Temps restant 0" + this.minutes + " min";
    } else {
      minElt.textContent = "Temps restant " + this.minutes + " min";
    }
    //counter engine
    if (this.minutes >= 0 && this.secondes > 0) {
      this.secondes--;
      sessionStorage.setItem("secondes", this.secondes);
    } else if (this.minutes > 0 && this.secondes <= 0) {
      this.secondes = 59;
      this.minutes--;
      sessionStorage.setItem("minutes", this.minutes);
      sessionStorage.setItem("secondes", this.secondes);
    } else if (this.minutes == 0 && this.secondes == 0) {
      document.getElementById("counter-info").textContent = "Aucune réservation en cours";
      //call to delete reservation
      this.deleteRes();
      secElt.textContent = "";
      minElt.textContent = "";
    }
  }
  //this methode clear session storage and clear interval
  deleteRes() {
    clearInterval(this.counterInter);
    sessionStorage.clear();
  }
}
