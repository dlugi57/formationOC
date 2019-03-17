var mymap = L.map('reservation-map').setView([43.604, 1.439], 13);
L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
  attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  maxZoom: 18,
  id: 'mapbox.streets',
  accessToken: 'pk.eyJ1IjoiZGx1Z2k1NyIsImEiOiJjanNwM2k4ZjUwMGNzNDNrdDFwczM3eW9yIn0.xkOq44ZjKRK9A3SRsXltMA'
}).addTo(mymap);
