<?php
$db = new mysqli("localhost", "sourceo4", "Source&Recreation04", "sourceo4_main");
$qry = $db->query("SELECT id,dealer_name,street,city,state,zip,phone,email,link,outside_us,lat,lng FROM dealers ORDER BY outside_us,state,city");

function parseToXML($htmlStr)
{
	$xmlStr=str_replace('<','&lt;',$htmlStr);
	$xmlStr=str_replace('>','&gt;',$xmlStr);
	$xmlStr=str_replace('"','&quot;',$xmlStr);
	$xmlStr=str_replace("'",'&#39;',$xmlStr);
	$xmlStr=str_replace("&",'&amp;',$xmlStr);
	return $xmlStr;
}

header("Content-type: text/xml");

echo "<markers>";
while ($row = $qry->fetch_array(MYSQLI_NUM))
{
	$name = parseToXML($row[1]);
	$address = parseToXML($row[2] . ", " . $row[3] . ", " . $row[4]);
	echo "<marker name='$name' address='$address' lat='$row[10]' lng='$row[11]'" . "/>";
}
echo "</markers>";
?>