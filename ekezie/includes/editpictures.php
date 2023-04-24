<?php
$imagesql = "SELECT * FROM cars WHERE id='$id'";
$checkimage = mysqli_query($dbconn, $imagesql);
	$imagerow = mysqli_fetch_assoc($checkimage);
	$brand = $imagerow['brand'];
	$model = $imagerow['model'];
	$engin = $imagerow['engin'];
	$picture1 = $imagerow['image1'];
	$picture2 = $imagerow['image2'];
	$picture3 = $imagerow['image3'];
	$picture4 = $imagerow['image4'];
	$picture5 = $imagerow['image5'];	
	$picture6 = $imagerow['image6'];
	$gas = $imagerow['gas'];
	$transmission = $imagerow['transmission'];
	$doors = $imagerow['doors'];
	$body = $imagerow['body'];
	$tank = $imagerow['tank'];
	$owner = $imagerow['owner'];
	$cylinder = $imagerow['cylinder'];
	$procode = $imagerow['procode'];
	$mileage = $imagerow['mileage'];
	$town = $imagerow['town'];
	$province = $imagerow['province'];
	$price = $imagerow['price'];
	$status = $imagerow['status'];
	$year = $imagerow['year'];	
	$mileage = $imagerow['mileage'];	
	$fyl = $imagerow['fyl'];	
	$drive = $imagerow['drive'];	
	$gear = $imagerow['gear'];	
	$colour = $imagerow['colour'];	
	$turbo = $imagerow['turbo'];	
	$sparekey = $imagerow['sparekey'];	
	$history = $imagerow['history'];
	$discription = $imagerow['discription'];
	$phone_number = $imagerow['phone_number'];
	// For the first picture
	if ($picture1 == "")
	{
		$pic1 = "../images/Car.png";
	}
	else
	{
		$pic1 = "../userdata/car_images/".$picture1;
	}

	// For the Second picture
	if ($picture2 == "")
	{
		$pic2 = "../images/Car.png";
	}
	else
	{
		$pic2 = "../userdata/car_images/".$picture2;
	}
	
	// For the third picture
	if ($picture3 == "")
	{
		$pic3 = "../images/Car.png";
	}
	else
	{
		$pic3 = "../userdata/car_images/".$picture3;
	}
	
	// For the fourth picture
	if ($picture4 == "")
	{
		$pic4 = "../images/Car.png";
	}
	else
	{
		$pic4 = "../userdata/car_images/".$picture4;
	}
	
	// For the fifth picture
	if ($picture5 == "")
	{
		$pic5 = "../images/Car.png";
	}
	else
	{
		$pic5 = "../userdata/car_images/".$picture5;
	}
	
	// For the sixth picture
	if ($picture6 == "")
	{
		$pic6 = "../images/Car.png";
	}
	else
	{
		$pic6 = "../userdata/car_images/".$picture6;
	}
?>