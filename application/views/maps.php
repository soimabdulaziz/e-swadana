<html>
    <head>
    <title>Lokasi</title>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvruAh9_EallzUR7ZDM6ZRH9j4Eqp9lRA&callback=initMap"></script>
    <script>
        function initMap() {
          var map = new google.maps.Map(document.getElementById('map'), {
              center : new google.maps.LatLng(-7.8698167, 110.3936263),
              zoom : 12
          });
        }
    </script>
    </head>
    <body>
        <div id="map" style="width:100%; height : 600px;"></div>
        <div>Titik Koordinat</div>
    </body>
</html>