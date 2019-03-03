var mymap = L.map('reservation-map').setView([43.604, 1.439], 13);
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  maxZoom: 18,
  id: 'mapbox.streets',
  accessToken: 'pk.eyJ1IjoiZGx1Z2k1NyIsImEiOiJjanNwM2k4ZjUwMGNzNDNrdDFwczM3eW9yIn0.xkOq44ZjKRK9A3SRsXltMA'
}).addTo(mymap);

//var marker = L.marker([51.5, -0.09]).addTo(mymap);
//marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();


//var littleton = L.marker([51.5, -0.09]).bindPopup('This is Littleton, CO.'),
//  denver    = L.marker([51.501, -0.08]).bindPopup('This is Denver, CO.'),
//  aurora    = L.marker([51.507, -0.06]).bindPopup('This is Aurora, CO.'),
//  golden    = L.marker([51.508, -0.05]).bindPopup('This is Golden, CO.');

//  var cities = L.layerGroup([littleton, denver, aurora, golden]).addTo(mymap);



/*
markers.addLayer(L.marker([51.5, -0.09]));
markers.addLayer(L.marker([51.502, -0.08]));
markers.addLayer(L.marker([51.507, -0.07]));
markers.addLayer(L.marker([51.508, -0.06]));
markers.addLayer(L.marker([51.508, -0.65]));
markers.addLayer(L.marker([51.508, -0.67]));
markers.addLayer(L.marker([51.508, -0.66]));
// add more markers here...

mymap.addLayer(markers);
*/
/*
markers.on('click', function(a) {
  console.log(a);
});
*/



//var name = "";

ajaxGet("https://api.jcdecaux.com/vls/v1/stations?contract=Toulouse&apiKey=62114b2e5a5efa9d593e73b53d562e2cf63b4cbb", function(reponse) {
  var listeStations = JSON.parse(reponse);


  var markers = new L.MarkerClusterGroup();
  var name = "";
  listeStations.forEach(function(station) {



    markers.addLayer(L.marker([station.position.lat, station.position.lng]).on('click', function(a) {
      console.log(station.name);
    }));

    name = station.name;

    /*marker.on('click', function(a) {
      console.log(name);
    });*/
    /*    markers.on('click', function(a) {
          console.log(name = station.name);
        });*/

  })
  mymap.addLayer(markers);
  console.log(markers);


});
