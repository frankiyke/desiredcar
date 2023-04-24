<?php
$brand_name = "";
$model = "";
$reg_number = "";
$vin_number ="";
$category = "";
$engin_capacity = "";
$image1 = "";
$image2 = "";
$image3 = "";
$image4 = "";
$image5 = "";
$image6 = "";
$gas = "";

	$e_checks = "SELECT email FROM cars WHERE email='$email'";
	$e_check = mysqli_query($dbconn, $e_checks);
	$check = mysqli_num_rows($e_check);
	
	if ($check == 0){
		//$add = mysql_query("INSERT INTO cars VALUES ('','$id_number','$email','$brand_name','$model','$reg_number','$engin_capacity','$image1','$image2','$image3','$image4','$image5','$image6','$gas','$town','$province')");
		$adds = "INSERT INTO cars (id_number, email, vin_number, town, province) VALUES( '$id_number', '$email', '$vin_number', '$town', '$province' )";
		$add = mysqli_query ($dbconn, $adds);
	}
	else
	{

	}
?>