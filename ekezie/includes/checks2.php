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

$brand = "Being Loaded";
$model = "Please wait...";
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
$status = 'Loading';

$imagesql = "SELECT * FROM users WHERE email='$email'";
$checkimage = mysqli_query($dbconn, $imagesql);
$imagerow = mysqli_fetch_array($checkimage, MYSQLI_ASSOC);
$customerid = $imagerow['id'];
$name = $imagerow['fullname'];
$email = $imagerow['email'];
$town = $imagerow['town'];
$province = $imagerow['province'];

$timeh=date('ymdHis');
$procode= $customerid.$timeh;

	$e_checks = "SELECT * FROM cars WHERE email='$email'";
	$e_check = mysqli_query($dbconn, $e_checks);
	$check = mysqli_num_rows($e_check);
	
	if ($check < 1000){
		$add = mysqli_query($dbconn, "INSERT INTO cars (id, phone_number, email, owner, brand, model, doors, transmission, body, cylinder, tank, mileage, engin, image1, image2, image3, image4, image5, image6, gas, town, province, price, status, gear, drive, fyl, year, colour, sparekey, turbo, procode, history, discription) VALUES (NULL, '', '$email', '', '$brand', '$model', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '$town', '$province', '', '$status', '', '', '', '', '', '', '', '$procode', '', '')"); 

	}
	else
	{
		$errormsg = "You can only add 1000 cars, click <a href='listing.php'> here</a> to add.";
	}
	echo'<meta http-equiv="refresh" content="0;url=../listedcars.php">';
    exit();
?>