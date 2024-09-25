<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link
      rel="stylesheet"
      href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css"
      integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
      crossorigin=""
    />
    <script
      src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js"
      integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
      crossorigin=""
    ></script>
    <style>
      #issMap {
        height: 500px;
      }
    </style>
</head>
<body>
<h1>Where is the ISS?</h1>

<p>
  latitude: <span id="lat"></span>°<br />
  longitude: <span id="lon"></span>°
</p>

<div id="issMap"></div>

<script>
    // Making a map and tiles
    const mymap = L.map('issMap').setView([0, 0], 6);
    const attribution =
      '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors';

    const tileUrl = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
    const tiles = L.tileLayer(tileUrl, { attribution });
    tiles.addTo(mymap);

    // Making a marker with a custom icon
    const issIcon = L.icon({
      iconUrl: 'images/iss200.png',
      iconSize: [50, 32],
      iconAnchor: [25, 16]
    });
    const marker = L.marker([0, 0], { icon: issIcon }).addTo(mymap);

    const api_url = 'https://api.wheretheiss.at/v1/satellites/25544';

    let firstTime = true;

    async function getISS() {
      const response = await fetch(api_url);
      const data = await response.json();
      const { latitude, longitude, altitude } = data;

      const aspect = 1.5625;
      const w = (altitude * aspect) / 10;
      const h = altitude / 10;
      issIcon.options.iconSize = [w, h];
      issIcon.options.iconAnchor = [w / 2, h / 2];

      marker.setLatLng([latitude, longitude]);
      if (firstTime) {
        mymap.setView([latitude, longitude], 6);
        firstTime = false;
      }
      document.getElementById('lat').textContent = latitude.toFixed(2);
      document.getElementById('lon').textContent = longitude.toFixed(2);
    }

    getISS();

    setInterval(getISS, 1000);
  </script>
  <script>
    // if ('geolocation' in navigator){
    //   console.log('ok');
    //   navigator.geolocation.getCurrentPosition(position => {
    //     consolge.log(position.coords);
    //   })
    // } else {
    //   console.log('not ok')
    // }

  </script>
</body>
</html>