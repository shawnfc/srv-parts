<!DOCTYPE html>
<html>
<head>
<title>Superior RV Chassis Parts | Springfield, OR</title>
<link rel="icon" href="favicon.ico" sizes="32x32" type="image/ico">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="Superior RV Chassis Parts" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="/css/style.css" type="text/css" media="all">
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
<script type="text/javascript">
function send() {
	if($("#botty").val()=="") {
		var valid=true;
		$("#nom").css("color","black");
		$("#company").css("color","black");
		$("#phone").css("color","black");
		$("#email").css("color","black");
		$("#msg").css("color","black");
		var nom=$("#nom").val();
		var company=$("#company").val();
		var phone=$("#phone").val();
		var email=$("#email").val();
		var msg=$("#msg").val();
		if (nom=="" || nom=="name") {
			$("#nom").val("name");
			$("#nom").css("color","red");
			valid=false;
		}
		if (company=="" || company=="company") {
			$("#company").val("company");
			$("#company").css("color","red");
			valid=false;
		}
		if (phone=="" || phone=="phone") {
			$("#phone").val("phone");
			$("#phone").css("color","red");
			valid=false;
		}
		if (email=="" || email=="email") {
			$("#email").val("email");
			$("#email").css("color","red");
			valid=false;
		}
		
		if (msg=="" || msg=="message") {
			$("#msg").val("message");
			$("#msg").css("color","red");
			valid=false;
		}
		
		if (valid) {
			$("#contact_form").html("sending..");
			$.post("ajax",{nom:nom,company:company,phone:phone,email:email,msg:msg},function(data){$("#contact_form").html(data);});
		}
	}
	else console.log("are you human?");
}
</script>
</head>
<body>
<script>
	// google analytics
</script>
<div id="content">
	<div id="top">
		<!--<img id="logo" src="/images/logo.png" />-->
		<span style="font-size: 43px;color: #BE0707;">Superior RV Chassis Parts, LLC</span>
		<div id="addr">
			CONTACT<br />
			541-914-3827<br />
			PO Box 72485 Springfield, OR 97477
		</div>
		<div class="clearer"></div>
	</div>
	<div id="menu">
		<?php include "menu.php"; ?>
	</div>	
	<div id="banner">
		<?php echo "$banner"; ?>
	</div>