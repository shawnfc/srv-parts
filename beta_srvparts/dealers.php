<?php $page="dealers"; include "top.php";
$db = new mysqli("localhost", "sourceo4", "Source&Recreation04", "sourceo4_main");
?>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC03GXsIhAxXp3-U-at3be_zA7QIr83_XE"></script>
<script type="text/javascript">
function initialize()
{
	var mapOptions = { center: { lat: 39, lng: -100}, zoom: 4 };
	var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	// var map = new google.maps.Map(document.getElementById("map"), {
        // center: new google.maps.LatLng(47.6145, -122.3418),
        // zoom: 13,
        // mapTypeId: 'roadmap'
      // });
	  
	var infoWindow = new google.maps.InfoWindow;
	
	downloadUrl("genxml", function(data) {
		var xml = data.responseXML;
		var markers = xml.documentElement.getElementsByTagName("marker");
		for (var i = 0; i < markers.length; i++)
		{
			var name = markers[i].getAttribute("name");
			var address = markers[i].getAttribute("address");
			// var type = markers[i].getAttribute("type");
			var point = new google.maps.LatLng( parseFloat(markers[i].getAttribute("lat")), parseFloat(markers[i].getAttribute("lng")));
			var html = "<b>" + name + "</b> <br/>" + address;
			// var icon = customIcons[type] || {};
			// var marker = new google.maps.Marker({ map: map, position: point, icon: icon.icon });
			var marker = new google.maps.Marker({ map: map, position: point });
			bindInfoWindow(marker, map, infoWindow, html);
		}
	});	  
}

function downloadUrl(url,callback)
{
	var request = window.ActiveXObject ? new ActiveXObject('Microsoft.XMLHTTP') : new XMLHttpRequest;
	request.onreadystatechange = function()
	{
		if (request.readyState == 4)
		{
			request.onreadystatechange = doNothing;
			callback(request, request.status);
		}
	};
	request.open('GET', url, true);
	request.send(null);
}

function bindInfoWindow(marker, map, infoWindow, html)
{
	google.maps.event.addListener(marker, 'click', function() {
		infoWindow.setContent(html);
		infoWindow.open(map, marker);
	});
}

function doNothing() {}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
<div id="map-canvas" style="height: 350px;"></div>
<div class='page' style='padding: 0 150px;'>

<?php
$qry = $db->query("SELECT dealers.id,dealer_name,street,city,state,zip,phone,email,link,outside_us,lat,lng,state_name FROM dealers LEFT JOIN states ON dealers.state = states.abbr ORDER BY outside_us,state,city");
$last = "";
echo "<div>";
while($row = $qry->fetch_array(MYSQLI_NUM))
{
	$state_name = ($row[12] == "") ? "Outside US" : $row[12];
	if ($state_name != $last)
	{
		echo "</div><h2 style='margin-left:-40px;color:#58585a;'>$state_name</h2><div style='border-left: 2px solid #2B6F9E;padding-left: 10px;'>";
	}
	$link = ($row[8] == "") ? "<b>$row[1]</b>" : "<a href = '$row[8]' >$row[1]</a>";
	echo "<p>$link<br />";
	echo "$row[2]<br />";
	echo "$row[3], $row[4] $row[5]<br />";
	echo "$row[6]<br />";
	echo "$row[7]</p>";
	$last = $state_name;
}

echo "</div>";
include "bottom.php";
?>