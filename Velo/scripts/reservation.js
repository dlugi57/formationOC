//czy moge urzywac wielkich liter na poczatku nazwy obiektu
class Reservation {
  //  minutes;
  //  seconds;
  nameRes;
  surnameRes;
  stationRes;
  secondes;
  minutes;
  counterInter;
  constructor() {

  }
  setReservation() {
    this.nameRes = document.getElementById("name-reservation").value;
    this.surnameRes = document.getElementById("surname-reservation").value;
    this.stationRes = document.getElementById("station-name").innerHTML;
    this.secondes = 0;
    this.minutes = 20;

    localStorage.setItem("name", this.nameRes);
    localStorage.setItem("surname", this.surnameRes);
    sessionStorage.setItem("secondes", this.secondes);
    sessionStorage.setItem("minutes", this.minutes);
    sessionStorage.setItem("stationName", this.stationRes);
    this.showReservation();
  }
  showReservation() {



    this.nom = localStorage.name;

    this.prenom = localStorage.surname;

    this.station = sessionStorage.stationName;

    this.minutes = sessionStorage.minutes;
    this.secondes = sessionStorage.secondes;

    //  this.seconds


    //  this.nom = document.getElementById("name-reservation").value;
    //this.prenom = document.getElementById("surname-reservation").value;
    console.log(this.nom);
    if (localStorage.name !== '') {
      document.getElementById("name-reservation").setAttribute('value', localStorage.getItem('name'));
      document.getElementById("surname-reservation").setAttribute('value', localStorage.getItem('surname'));
    }
    console.log(sessionStorage.stationName);
    if (sessionStorage.stationName !== '' && sessionStorage.stationName !== undefined) {
      document.getElementById("counter-info").textContent = this.nom + " " + this.prenom + " " + this.station;
      //this.showCounter();
      clearInterval(this.counterInter);
      this.counterInter = setInterval(this.counter.bind(this), 1000);
    }

    //sessionStorage.setItem("nomStation", Station.nom);
    //w jaki sposob mam to zrobic ????? znaczy sie w jaki sposob zrobic zegar

  }

  counter() {
    if (this.minutes >= 0 && this.secondes > 0) {
      this.secondes--;
      sessionStorage.setItem("secondes", this.secondes);

    } else if (this.minutes > 0 && this.secondes <= 0) {
      this.secondes = 59;
      this.minutes--;
      sessionStorage.setItem("minutes", this.minutes);
      sessionStorage.setItem("secondes", this.secondes);
    } else if (this.minutes === 0 && this.secondes === 0) {
      document.getElementById("counter-info").textContent = "koniec rezerwacji";
      this.deleteRes();
      console.log("to juz jest koniec");
    }
    if (this.secondes < 10) {
      document.getElementById("counter-second").textContent = "0" + this.secondes;
    } else {
      document.getElementById("counter-second").textContent = this.secondes;
    }


    if (this.minutes < 10) {
      document.getElementById("counter-minut").textContent = "0" + this.minutes;
    } else {
      document.getElementById("counter-minut").textContent = this.minutes;
    }

  }

  deleteRes() {
    clearInterval(this.counterInter);
    sessionStorage.clear();

  }
  /*  showCounter() {
      //var t = this;
      this.counterInter = setInterval(this.counter.bind(this), 1000);
      //this.showLoading.bind(this)
      this.counter = setInterval(function() {
        this.counter();
      }, 5000);

    }*/
}
