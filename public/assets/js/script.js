var map = L.map('map').setView([-6.3347131, 106.9744025], 15);

var marker = L.marker([-6.3347131, 106.9744025]).addTo(map);
marker.bindPopup("<b>Hello there!</b><br>We are here!!!").openPopup();

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

function centerMap(){
    map.setView(marker.getLatLng(), 15);
}
