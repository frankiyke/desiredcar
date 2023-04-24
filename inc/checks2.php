<?php
include ("connect.php");
session_start();
if (isset($_SESSION["user_login"])){
$email = $_SESSION["user_login"];
}
else{
	$email = "";	
	//header ("Location: login.php");
}

$brand = "";
$model = "";
$phone_number = "";
$vin_number ="";
$category = "";
$engin = "";
$image1 = "";
$image2 = "";
$image3 = "";
$image4 = "";
$image5 = "";
$image6 = "";
$gas = "";
$status = Pendding;

$imagesql = "SELECT * FROM users WHERE email='$email'";
$checkimage = mysqli_query($dbconn, $imagesql);
$imagerow = mysqli_fetch_array($checkimage, MYSQLI_ASSOC);
$id_number = $imagerow['id_number'];

	$e_checks = "SELECT * FROM cars WHERE email='$email'";
	$e_check = mysqli_query($dbconn, $e_checks);
	$check = mysqli_num_rows($e_check);
	
	if ($check < 500){
		$adds = "INSERT INTO cars (email, town, province, status) VALUES( '$email', '$town', '$province', '$status' )";
		$add = mysqli_query ($dbconn, $adds);
	}
	else
	{
		$errormsg = "You can only add 500 cars, click <a href='listing.php'> here</a> to add.";
	}
	header ("Location: ../admin/listedcars.php");
?>