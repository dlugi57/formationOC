//czy tworze variables czy proprietes w funkcji ktora znajduje sie w obiekcie
//jak dodac priopreties do string na przykladzie url
//mam stacje z detalami zrekuperowana z listy albo z nowym ajax get


var stations = {


  key: "62114b2e5a5efa9d593e73b53d562e2cf63b4cbb",
  city: "Toulouse",
  url() {
    return 'https://api.jcdecaux.com/vls/v1/stations?contract=' + this.city + '&apiKey=' + this.key;
  },

  showStations() {
    ajaxGet(this.url(), function(reponse) {
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
          stations.stationDetails(station);

          /*  ajaxGet("https://api.jcdecaux.com/vls/v1/stations/" + station.number + "?contract=" + stations.city + "&apiKey=" + stations.key, function(reponse) {
              var stationInfos = JSON.parse(reponse);
              stations.stationDetails(stationInfos);
              console.log("station from details");
              console.log(stationInfos);

            })*/
          console.log(station.name);
        }));
      })
      mymap.addLayer(markers);
      //console.log(markers);
    });

  },
  stationDetails(station) {
    console.log("station from function stationDetails");
    console.log(station);

    document.getElementById("station-name").textContent = station.name;
    document.getElementById("station-address").textContent = station.address;
    document.getElementById("station-bike").textContent = station.available_bikes;
    document.getElementById("station-stand").textContent = station.available_bike_stands;
    document.getElementById("station-card").textContent = station.banking;
    document.getElementById("station-number").textContent = station.number;
    document.getElementById("station-status").textContent = station.status;





  }

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



stations.showStations();
