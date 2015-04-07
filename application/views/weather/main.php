<div class="container">

  <div class="page-header">
    <h1 class="text-center">Weather Conditions</h1>
  </div>
  <div class="row">
            <div class="col-md-6" id="current_conditions">
              <!--<hr>-->
              <div id='status-icon'></div>
              <small id='status'></small>
            </div>
            <div class="col-md-6" id="map"></div>
  </div>  
  <div class="row">
     <div class="col-md-6">
        <table class="table">
          <thead>
            <tr>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody id="forecast-table"></tbody>
        </table>
      </div>
      <div class="col-md-6"></div>
  </div>
</div>
</body>

<script>
var zip = <?php echo $this->config->item('zip_code'); ?>;
var apicode = '<?php echo $this->config->item('wunderground_api'); ?>';
$(document).ready(function($) {
  $.ajax({
  url : "http://api.wunderground.com/api/" + apicode + "/geolookup/conditions/q/" + zip + ".json",
  dataType : "jsonp",
  success : function(parsed_json) {
    var location = parsed_json['current_observation']['display_location']['city'];
    var temp_f = parsed_json['current_observation']['temp_f'];
    var status = parsed_json['current_observation']['weather'];
    var statusicon = parsed_json['current_observation']['icon_url'];
    var feelslike = parsed_json['current_observation']['feelslike_string'];
    var lastupdated = parsed_json['current_observation']['observation_time'];
    $("#current_conditions").prepend("<h2>Currently in " + location + ": " + temp_f + "F</h2>");
    $("#map").html("<img src='http://api.wunderground.com/api/" + apicode + "/animatedradar/q/" + zip + ".gif?newmaps=1&timelabel=1&timelabel.y=10&num=5&delay=50'>");
    $("#status").append(status);
    $("#status-icon").html("<img src='" + statusicon + "'>");
    var colorfl = "test";

    $("#forecast-table").append("<tr><td>Feels like</td><td>" + feelslike + "</td></tr>");
    $("#forecast-table").append("<tr><td>Last Updated</td><td>" + lastupdated + "</td></tr>");
    //alert("Current temperature in " + location + " is: " + temp_f);
  }
  });
  var loc = window.location.href; // returns the full URL
  if(/weather/.test(loc)) {
    $('#weather_header').addClass('active');
  }
});

</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>

</html>
