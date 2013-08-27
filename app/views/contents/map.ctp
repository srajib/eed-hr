<?php echo $this->Html->Script('http://maps.google.com/maps/api/js?sensor=true', false); ?>
<?php 
$backlink = $this->Html->link("back", array('controller'=>'search', 'action'=>'index'), array('class'=>"btn_nav btn_back"));
echo $this->element('toptab', array('current'=>0,'backlink'=>$backlink)); 

?>

<div id="content">

<script type="text/javascript">
	var geocoder;
  	var map;
  function initialize() {
    geocoder = new google.maps.Geocoder();

    var address = "8848 Greenville Avenue Dallas, TX 75243";
    geocoder.geocode( { 'address': address}, function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) 
	  {
			var myOptions = {
			  zoom: 16,
			  center: results[0].geometry.location,
			  mapTypeId: google.maps.MapTypeId.ROADMAP
			}
			map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
			
			var marker = new google.maps.Marker({
				map: map, 
				position: results[0].geometry.location
			});
      
	  } else {
        alert("Geocode was not successful for the following reason: " + status);
      }
    });
	
  }

</script>

<div id="map_canvas" style="width: 300px; height: 300px; margin: auto"></div>

</div>
<?php echo $this->element('bottomtab', array('current'=>1)); ?>