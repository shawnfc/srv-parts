<?php
	$uid = 0;
	session_start();

	$authenticated = false;
	
	if ($_SESSION["uid"] == "")
	{
		if ($_COOKIE["latinC"]!="")
		{
			$latinC = $_COOKIE["latinC"];
			$code = substr($latinC, -2);
			$divider = "";
			$chrs = str_split($code);
			foreach ($chrs as $chr) $divider .= (is_numeric($chr)) ? $chr : ord($chr); // for each character in code, append either the number itself or the ascii position of the letter	
			$latinC = substr($latinC, 0, -2);
			$number = doubleval(preg_replace('/\D/', '', $latinC));	// removes non-numerics
			$eid = $number / intval($divider);
			
			$_SESSION["uid"] = $eid;
			$authenticated = true;
		}
	}
	else $authenticated = true;
	
	if ($authenticated) $uid = $_SESSION["uid"];
	else
	{
		session_destroy();
		header("Location: //www.sourcerv.com/admin_login.html");
		die();
	}
?>