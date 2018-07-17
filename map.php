<?php require("header.php"); ?>


<div class="navi-bar">
	<div class="container">
		<div class="navi-bar-list">
			<h5><strong>
				<a href="index.php">Home</a>&nbsp;&nbsp;
				/&nbsp;&nbsp;
				<a>Faq</a>
				</strong>
			</h5>
		</div>
		<div class="navi-title">
			<p><strong>Map</strong></p>
		</div>
	</div>
</div>



  


<div class="container custom-container" id="map_div">

  <div class="map-container">
    <div class="placeDiv">
        <div class="placecard__container">

          <div class="placecard__left">
            <p class="placecard__business-name">CLOUD HASHING LIMITED</p>
            <p class="placecard__info">37, Tabernacle Street<br>London, <br>United Kingdom, EC2A 4NJ</p>
            <a class="placecard__view-large" target="_blank" href="https://maps.google.com/maps?ll=22.280390, 114.178863&amp;z=18&amp;t=m&amp;hl=en-US&amp;gl=AR&amp;mapclient=embed&amp;cid=2947398168469204860" id="A_41">View larger map</a>
          </div> <!-- placecard__left -->

          <div class="placecard__right">
              <a class="placecard__direction-link" target="_blank" href="https://maps.google.com/maps?ll=18.416035,-66.162618&amp;z=18&amp;t=m&amp;hl=en-US&amp;gl=AR&amp;mapclient=embed&amp;daddr=Roberto%20Perez%20Obregon%20Law%20Office%209%20Avenida%20Ram%C3%B3n%20Luis%20Rivera%20Bayam%C3%B3n%2C%2000961%20Puerto%20Rico@18.4160349,-66.1626177"
              id="A_9">
                  <div class="placecard__direction-icon"></div>
                  Directions
              </a>
          </div> <!-- placecard__right -->

        </div> <!-- placecard__container -->
    </div> <!-- placeDiv -->
</div> <!-- map-container -->
<div id="map-canvas"></div>
</div>
<!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false" type="text/javascript"></script>-->
  
  
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBP4bvToBat0OjL6MkYC11c8ZCPSPKn-fI"></script>

    <script>
	// if HTML DOM Element that contains the map is found...
if (document.getElementById('map-canvas')) {

  // Coordinates to center the map
  var myLatlng = new google.maps.LatLng(22.280390, 114.178863);

  // Other options for the map, pretty much selfexplanatory
  var mapOptions = {
    zoom: 16,
    center: myLatlng,
    scrollwheel: false,
    query: '37, Tabernacle Street, London, United Kingdom, EC2A 4NJ',
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };

  // Attach a map to the DOM Element, with the defined settings
  var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

  var marker = new google.maps.Marker({
    position: myLatlng,
    map: map,
    title: "37, Tabernacle Street, London, United Kingdom, EC2A 4NJ",
  });
 

  //Resize map
  google.map.event.addDomListener(window, 'load', initialize);
  google.map.event.addDomListener(window, "resize", function() {
    var center = map.getCenter();
    google.map.event.trigger(map, "resize");
    map.setCenter(center);
  });

}
	
	</script>




<?php require("footer.php"); ?>