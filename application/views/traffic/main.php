    <style>
      html, body, #map-canvas {
        height: 100%;
        margin-top: 25px;
        padding: 0px
      }
    </style>
    <div id="map-canvas"></div>
  </body>
      <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
      <script>

function handleNoGeolocation(errorFlag) {
  if (errorFlag) {
    var content = 'Error: The Geolocation service failed.';
  } else {
    var content = 'Error: Your browser doesn\'t support geolocation.';
  }

  var options = {
    map: map,
    position: new google.maps.LatLng(42.0505936,-87.9755571),
    content: content
  };

  var infowindow = new google.maps.InfoWindow(options);
  map.setCenter(options.position);
}
  var trafficLayer = new google.maps.TrafficLayer();
  trafficLayer.setMap(map);
  google.maps.event.addDomListener(window, 'load', initializeGeo);
var map;
function initializeNoGeo() {
  var myLatlng = new google.maps.LatLng(42.0505936,-87.9755571);
  var mapOptions = {
    zoom: 13,
    center: myLatlng
  }

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var trafficLayer = new google.maps.TrafficLayer();
  trafficLayer.setMap(map);
}

function initializeGeo() {
  var mapOptions = {
    zoom: 13
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  // Try HTML5 geolocation
  if(navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var pos = new google.maps.LatLng(position.coords.latitude,
                                       position.coords.longitude);

      var infowindow = new google.maps.InfoWindow({
        map: map,
        position: pos,
        content: 'Location found using HTML5.'
      });

      map.setCenter(pos);
      var trafficLayer = new google.maps.TrafficLayer();
      trafficLayer.setMap(map);
    }, function() {
      handleNoGeolocation(true);
    });
  } else {
    // Browser doesn't support Geolocation
    handleNoGeolocation(false);
  }
}
    </script>
</html>
