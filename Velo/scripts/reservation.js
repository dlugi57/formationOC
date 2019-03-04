//czy moge urzywac wielkich liter na poczatku nazwy obiektu
var reservation = {
  nom: '',

  prenom: '',

  showReservation() {

this.nom = document.getElementById("name-reservation").value;
this.prenom = document.getElementById("surname-reservation").value;
console.log(this.nom);
    document.getElementById("counter-info").textContent = this.nom + " " + this.prenom + " " + stations.name;
    //w jaki sposob mam to zrobic ????? znaczy sie w jaki sposob zrobic zegar

  }
}
var confirmerBtn = document.getElementById("station-confirmer-btn");
confirmerBtn.addEventListener("click", function() {

reservation.showReservation();



})
