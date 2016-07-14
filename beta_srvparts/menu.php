<?php

$home_menu = "<a href='index.html' title='Home'>HOME</a>";

$products_menu = "<a href='products.php' title='Products'>PRODUCTS</a>";

// $dealers_menu = "<a href='/dealers' title='Dealers'>DEALERS</a>";

// $testimonials_menu = "<a href='http://sourceRV.com/testimonials' title='Testimonials'>TESTIMONIALS</a>";

$videos_menu = "<a href='videos.php' title='Videos'>VIDEOS</a>";

$resources_menu = "<a href='resources.php' title='Resources'>RESOURCES</a>";

$about_menu = "<a href='about.php' title='About Us'>ABOUT US</a>";



switch ($page)

{

case "home":

	$home_menu="<span>HOME</span>";

	$banner="<span style='height: 246px;'><img src='images2/banner_home.png' /></span>";

	break;

case "products":

	$products_menu="<span>PRODUCTS</span>";

	$banner="<span style='height: 162px;'>Click a product below to view details.</span><img src='images2/trans_rv.png' />";

	break;

// case "dealers":

	// $dealers_menu="<span>DEALERS</span>";

	// $banner="<span style='height: 162px;'>Dealers</span><img src='/images2/trans_rv.png' />";

	// break;

case "about":

	$about_menu="<span>ABOUT US</span>";

	$banner="<span style='height: 162px;'>Meet Superior</span><img src='images2/trans_rv.png' />";

	break;

// case "testimonials":

	// $testimonials_menu="<span>TESTIMONIALS</span>";

	// $banner="<span style='height: 162px;'>What others think about us.</span><img src='/images2/trans_rv.png' />";

	// break;

case "videos":

	$videos_menu="<span>VIDEOS</span>";

	$banner="<span style='height: 162px;'>Videos</span><img src='images2/trans_rv.png' />";

	break;	

case "resources":

	$resources_menu="<span>RESOURCES</span>";

	$banner="<span style='height: 162px;'>Resources</span><img src='images2/trans_rv.png' />";

	break;

case "trailing_arm":

	$banner="<span style='height: 162px;'>Trailing Arm Replacement Kit (TRA-1004)</span><img src='images2/trans_rv.png' />";

	break;

case "radiators":

	$banner="<span style='height: 162px;'>High Performance Radiators</span><img src='images2/trans_rv.png' />";

	break;

case "air_coolers":

	$banner="<span style='height: 162px;'>High Performance Charge Air Coolers</span><img src='images2/trans_rv.png' />";

	break;

case "fan_blades":

	$banner="<span style='height: 162px;'>High Performance Fan Blades</span><img src='images2/trans_rv.png' />";

	break;

case "rek4":

	$banner="<span style='height: 162px;'>4-Bag Ride Enhancement Kit</span><img src='images2/trans_rv.png' />";

	break;

case "rek8":

	$banner="<span style='height: 162px;'>8-Bag Ride Enhancement Kit</span><img src='images2/trans_rv.png' />";

	break;

case "rek206":

	$banner="<span style='height: 162px;'>Freightliner XC Ride Enhancement Kit</span><img src='images2/trans_rv.png' />";

	break;

case "shocks":

	$banner="<span style='height: 162px;'>Custom Shock Absorbers</span><img src='images2/trans_rv.png' />";

	break;

case "valves":

	$banner="<span style='height: 162px;'>Comfort Ride Valve Kit</span><img src='images2/trans_rv.png' />";

	break;

}

echo "<ul><li>$home_menu</li>";

echo "<li>$products_menu</li>";

echo "<li>$videos_menu</li>";

echo "<li>$resources_menu</li>";

echo "<li>$about_menu</li></ul>";

?>