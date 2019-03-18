/* class stations alows us to put all of markers
 and markerclusters
  and to show information of every station*/
class Stations {
  // get API key and city
  constructor(key, city) {
    this.key = key;
    this.city = city;
  }
  //methode to show every marker with Ajax call
  showStations() {
    var newAjax = new Ajax;
    var key = this.key;
    this.url = 'https://api.jcdecaux.com/vls/v1/stations?contract=' + this.city + '&apiKey=' + this.key;
    var that = this;
    //AJAX
    newAjax.ajaxGet(this.url, function(reponse) {
      var listeStations = JSON.parse(reponse);
      //initialize of markers from leaflet map
      var markers = new L.MarkerClusterGroup();
      //show every station
      listeStations.forEach(function(station) {
        //change color of the icons
        var icon = greenIcon;
        if (station.status === "CLOSED") {
          icon = redIcon;
        } else if (station.available_bikes < 1) {
          icon = orangeIcon;
        }
        //position of markers and on click event which call ajax to get more info from station on LIVE
        markers.addLayer(L.marker([station.position.lat, station.position.lng], {
          icon: icon
        }).on('click', function(a) {
          //AJAX
          newAjax.ajaxGet("https://api.jcdecaux.com/vls/v1/stations/" + station.number + "?contract=" + station.contract_name + "&apiKey=" + key, function(reponse) {
            var stationInfos = JSON.parse(reponse);
            //send info to show ststion details
            that.stationDetails(stationInfos);
          })
        }))
      })
      //add markers to a Map
      mymap.addLayer(markers);
    })
  };
  //show details of station
  stationDetails(station) {
    //show hide elements
    document.getElementById("info-champs").textContent = "";
    document.getElementById("description").style.display = "block";
    document.getElementById("description-aside").style.display = "block";
    document.getElementById("station-reserver-btn").style.display = "block";
    document.getElementById("reservation-aside").style.display = "none";
    //show infos
    document.getElementById("station-name").textContent = station.name;
    document.getElementById("station-address").textContent = station.address;
    var bikesFree = station.available_bikes;
    document.getElementById("station-stand").textContent = station.available_bike_stands;
    //condition to hide button reservation if station is closed or there are no bikes
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
    //condition if station is already reserved
    if (sessionStorage.stationName !== '' && station.name === sessionStorage.stationName) {
      document.getElementById("info-champs").textContent = "Vous avez réservé cette station";
      document.getElementById("station-reserver-btn").style.display = "none";
      bikesFree = bikesFree - 1;
    }
    document.getElementById("station-bike").textContent = bikesFree;
  };
}
//icons of markers 
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
