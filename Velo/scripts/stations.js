class Stations {

  constructor(key, city) {
    this.key = key;
    this.city = city;

  }
  showStations() {
    var newAjax = new Ajax;

    var key = this.key;
    this.url = 'https://api.jcdecaux.com/vls/v1/stations?contract=' + this.city + '&apiKey=' + this.key;
    var that = this;
    newAjax.ajaxGet(this.url, function(reponse) {
      var listeStations = JSON.parse(reponse);
      var markers = new L.MarkerClusterGroup();

      listeStations.forEach(function(station) {

        console.log(station.status);
        var icon = greenIcon;
        if (station.status === "CLOSED") {
          icon = redIcon;
        } else if (station.available_bikes < 1) {
          icon = orangeIcon;
        }

        markers.addLayer(L.marker([station.position.lat, station.position.lng], {
          icon: icon
        }).on('click', function(a) {
          newAjax.ajaxGet("https://api.jcdecaux.com/vls/v1/stations/" + station.number + "?contract=" + station.contract_name + "&apiKey=" + key, function(reponse) {
            var stationInfos = JSON.parse(reponse);


            that.stationDetails(stationInfos);

          })
        }))
      })
      mymap.addLayer(markers);
    })

  };

  stationDetails(station) {
    document.getElementById("info-champs").textContent = "";
    document.getElementById("description").style.display = "block";
    document.getElementById("description-aside").style.display = "block";
    document.getElementById("station-reserver-btn").style.display = "block";
    document.getElementById("reservation-aside").style.display = "none";
    document.getElementById("station-name").textContent = station.name;
    document.getElementById("station-address").textContent = station.address;
    var bikesFree = station.available_bikes;

    document.getElementById("station-stand").textContent = station.available_bike_stands;
    if (station.status === "CLOSED") {
      document.getElementById("station-status").textContent = "Station ferme";
      document.getElementById("station-status").style.backgroundColor = "#D9534F"
      document.getElementById("station-reserver-btn").style.display = "none";
    } else {
      document.getElementById("station-status").textContent = "Station ouvert";
      document.getElementById("station-status").style.backgroundColor = "#5CB85C"
    }
    if (station.available_bikes < 1) {
      document.getElementById("station-reserver-btn").style.display = "none";
    }
    if (sessionStorage.stationName !== '' && station.name === sessionStorage.stationName) {
      console.log("napisz tutaj ze zarezerwowales juz ta stacje");
      document.getElementById("info-champs").textContent = "Vous avez réservé cette station";
      document.getElementById("station-reserver-btn").style.display = "none";
      bikesFree = bikesFree - 1;
    }

    document.getElementById("station-bike").textContent = bikesFree;
  };


}


var greenIcon = L.icon({
  iconUrl: 'images/markerGreen.png',
  iconSize: [40, 40], // size of the icon
  iconAnchor: [0, 40], // point of the icon which will correspond to marker's location
});
var redIcon = L.icon({
  iconUrl: 'images/markerRed.png',

  iconSize: [40, 40], // size of the icon
  iconAnchor: [0, 40], // point of the icon which will correspond to marker's location
});
var orangeIcon = L.icon({
  iconUrl: 'images/markerOrange.png',

  iconSize: [40, 40], // size of the icon
  iconAnchor: [0, 40], // point of the icon which will correspond to marker's location
});
