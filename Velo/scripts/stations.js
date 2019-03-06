//chuj mnie strzela
//jak zawolac funkcje w funkcji
//jak zawolac jedna variable w innej
//jak przekazac nazwe kliknietej stacji


class Stations {

  constructor(key, city) {
    this.key = key;
    this.city = city;

  }
  showStations() {
    var key = this.key;

    console.log("chuj");
    this.url = 'https://api.jcdecaux.com/vls/v1/stations?contract=' + this.city + '&apiKey=' + this.key;

    ajaxGet(this.url, function(reponse) {
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
          console.log("station from list");
          console.log(station);
          //  console.log(this.key);

          //  this.stationDetails(station);

          ajaxGet("https://api.jcdecaux.com/vls/v1/stations/" + station.number + "?contract=" + station.contract_name + "&apiKey=" + key, function(reponse) {
            var stationInfos = JSON.parse(reponse);


            this.stationDetails(stationInfos);

          })
          //  console.log(stationInfos.name);
        }))
      })
      mymap.addLayer(markers);

      //console.log(markers);
    })

  };

    stationDetails(station) {
      this.name = station.name;
      console.log("station from function stationDetails");
      console.log(station);
      document.getElementById("station-reserver-btn").style.display = "block";


      document.getElementById("station-name").textContent = station.name;
      document.getElementById("station-address").textContent = station.address;
      document.getElementById("station-bike").textContent = station.available_bikes;
      document.getElementById("station-stand").textContent = station.available_bike_stands;
      document.getElementById("station-card").textContent = station.banking;
      document.getElementById("station-number").textContent = station.number;




      if (station.status === "CLOSED") {
        document.getElementById("station-status").textContent = "Ferme";
        document.getElementById("station-reserver-btn").style.display = "none";
      } else {
        document.getElementById("station-status").textContent = "Ouvert";
      }
      if (station.available_bikes < 1) {
        document.getElementById("station-reserver-btn").style.display = "none";
      }

      //tuutaj musisz ukryc guzik jak nie bedzie rowerow
      //tutaj tez pokazesz canvas


    };


}


var greenIcon = L.icon({
  iconUrl: 'images/markerGreen.png',
  //shadowUrl: 'leaf-shadow.png',

  iconSize: [40, 40], // size of the icon
  //  shadowSize:   [50, 64], // size of the shadow
  iconAnchor: [0, 40], // point of the icon which will correspond to marker's location
  //  shadowAnchor: [4, 62],  // the same for the shadow
  //  popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
var redIcon = L.icon({
  iconUrl: 'images/markerRed.png',
  //shadowUrl: 'leaf-shadow.png',

  iconSize: [40, 40], // size of the icon
  //  shadowSize:   [50, 64], // size of the shadow
  iconAnchor: [0, 40], // point of the icon which will correspond to marker's location
  //  shadowAnchor: [4, 62],  // the same for the shadow
  //  popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});
var orangeIcon = L.icon({
  iconUrl: 'images/markerOrange.png',
  //shadowUrl: 'leaf-shadow.png',

  iconSize: [40, 40], // size of the icon
  //  shadowSize:   [50, 64], // size of the shadow
  iconAnchor: [0, 40], // point of the icon which will correspond to marker's location
  //  shadowAnchor: [4, 62],  // the same for the shadow
  //  popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
});





//stations.showStations();
var myStations = new Stations("62114b2e5a5efa9d593e73b53d562e2cf63b4cbb", "Toulouse");
myStations.showStations();

var reserverBtn = document.getElementById("station-reserver-btn");
reserverBtn.addEventListener("click", function() {
  document.getElementById("description-aside").style.display = "none";
  document.getElementById("reservation-aside").style.display = "block";
//console.log(myStations.stationName());
});
