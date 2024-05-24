var map = L.map('map').setView([-6.334, 106.971], 15);

var marker = L.marker([-6.334, 106.971]).addTo(map);
marker.bindPopup("<b>Hello there!</b><br>We are here!!!").openPopup();

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);
