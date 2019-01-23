<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2481.5491097243494!2d-0.4693926841050324!3d51.53982936615244!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48766ddec01a9fad%3A0x6d724498660e4297!2s'<?php echo $Address1;?>'+Rd%2C+<?php echo $Address2;?>%2C+<?php echo $Towncity;?>+<?php echo $Postcode;?>!5e0!3m2!1sen!2suk!4v1457011373348"   width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
<div class="map">
	<div class="title">Map</div>
	<script src="//maps.googleapis.com/maps/api/js?v=3.&key=AIzaSyAfXHL-uAPWs7gAbj4DmuK5piTvo4gnzPk" type="text/javascript"></script>
	<script type="text/javascript">
		function initialize() {
			var mapLatlng = new google.maps.LatLng(51.420601, -0.126064);
			var mapOptions = {
			  zoom: 17,
			  center: mapLatlng,
			  mapTypeId: google.maps.MapTypeId.ROADMAP,
			  scrollwheel: false
			};
			var map = new google.maps.Map(document.getElementById("map"), mapOptions);
			var marker = new google.maps.Marker({
				position: mapLatlng,
				map: map,
			 	title:"Station Cars Streatham"
			 });
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	</script>
	<div id="map" style="max-width: none;width:100%;height:300px"></div>