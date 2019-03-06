//czy moge urzywac wielkich liter na poczatku nazwy obiektu
class Reservation {

constructor(nom,prenom,station){
  this.nom= nom;

  this.prenom= prenom;

  this.station = station;
}
  showReservation() {

  //  this.nom = document.getElementById("name-reservation").value;
    //this.prenom = document.getElementById("surname-reservation").value;
    console.log(this.nom);
    document.getElementById("counter-info").textContent = this.nom + " " + this.prenom + " " + this.station;
    //w jaki sposob mam to zrobic ????? znaczy sie w jaki sposob zrobic zegar

  }
}
var confirmerBtn = document.getElementById("station-confirmer-btn");
confirmerBtn.addEventListener("click", function() {

//  reservation.showReservation();
var nameRes = document.getElementById("name-reservation").value;
var surnameRes = document.getElementById("surname-reservation").value;
var stationRes = document.getElementById("station-name").innerHTML;
var myReservation = new Reservation(nameRes,surnameRes,stationRes);
myReservation.showReservation();


})
