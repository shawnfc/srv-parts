<?php
	$home = ($page == "home") ? "block" : "none";
	$products = ($page == "products") ? "block" : "none";
	$dealers = ($page == "dealers") ? "block" : "none";
	$about = ($page == "about") ? "block" : "none";
	$testimonials = ($page == "testimonials") ? "block" : "none";
	$resources = ($page == "resources") ? "block" : "none";
	include "top.php";
	echo "<div id='home' class='page' style='display:$home;'>"; include "home_content.php"; echo "</div>";
	echo "<div id='products' class='page' style='display:$products;'>"; include "products_content.php"; echo "</div>";
	echo "<div id='dealers' class='page' style='display:$dealers;'>"; include "dealers_content.php"; echo "</div>";
	echo "<div id='about' class='page' style='display:$about;'>"; include "about_content.php"; echo "</div>";
	echo "<div id='testimonials' class='page' style='display:$testimonials;'>"; include "testimonials_content.php"; echo "</div>";
	echo "<div id='resources' class='page' style='display:$resources;'>"; include "resources_content.php"; echo "</div>";
	include "bottom.php";
?>