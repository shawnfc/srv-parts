<?php
// this file takes a username and password and if an uid is found, creates session and generates the latinC cookie
// latinC is a meaningless name to add another minor layer of security (inconspicuity)
// if you want to use this code, please give credit to the author: brandon@blackwelldata.com

function getRandomString() // returns anywhere from 0 to 4 letters
{
	$string = "";
	for ($i=0;$i<rand(0,4);$i++) $string .= chr(rand(97,122));
	return $string;
}

try {
$db = new PDO("mysql:host=localhost;dbname=sourceo4_main", "sourceo4", "Source&Recreation04", array(PDO::ATTR_PERSISTENT => true));
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// get matching uid from posted username and password
$user = $_POST["user"];
$pass = md5($_POST["pass"]);
$sql = "SELECT id FROM users WHERE username = ? AND password = ?";
$stmt = $db->prepare($sql);
$stmt->execute(array($user,$pass));
$row = $stmt->fetch(PDO::FETCH_NUM);
$uid = $row[0]; // this system will break when uid > 800 million because the multiplier can be as much as 122122 (zz) and the product overflows integer

// if uid was returned, authentication succeeded; log them in and create cookie (used for ASP session and admin page authentication)
if ($uid != "")
{
	$_SESSION["uid"] = $uid; // set PHP session variable
	
	$letters = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","1","2","3","4","5","6","7","8","9");
	$code = ""; // a three character string composed of letters and/or numbers used to decode cookie
	for ($i=0;$i<2;$i++) $code .= $letters[rand(0,34)]; // append random array position value to code
	
	// get multiplier; which is what the uid is multiplied by; the result is integrated into latinC
	$multiplier = "";
	$chrs = str_split($code);
	foreach ($chrs as $chr) $multiplier .= (is_numeric($chr)) ? $chr : ord($chr); // for each character in code, append either the number itself or the ascii position of the letter
		
	// multiply uid by multiplier to get the numbers to be integrated into latinC
	$number_string = strval(intval($uid) * intval($multiplier));
	
	$latinC = getRandomString(); // initialize latinC
	
	$numbers = str_split($number_string);
	foreach ($numbers as $number)
	{
		$latinC .= $number; // append a number from number_string
		$latinC .= getRandomString();
	}
	
	$latinC .= $code; // append 2 character code to latinC
	
	setcookie("latinC", $latinC, time() + (86400 * 30), "/"); // 86400 = 1 day
	
	// ----------------------------------------------------------------
	// to decode
	// ----------------------------------------------------------------
	// $latinC = $_COOKIE["latinC"];
	// $code = substr($latinC, -2);
	// $divider = "";
	// $chrs = str_split($code);
	// foreach ($chrs as $chr) $divider .= (is_numeric($chr)) ? $chr : ord($chr); // for each character in code, append either the number itself or the ascii position of the letter	
	// $latinC = substr($latinC, 0, -2);
	// $number = doubleval(preg_replace('/\D/', '', $latinC));	// removes non-numerics
	// $uid = $number / intval($divider);
	
	echo "success";
}
else echo "authentication failed";

} catch (PDOException $e) {
    echo $e->getMessage();
    die();
}

?>
