<?php
$checkimages = "SELECT * FROM cars WHERE id='$id' OR procode='$id'";
$checkimage = mysqli_query($dbconn, $checkimages);
	$imagerow = mysqli_fetch_assoc($checkimage);
	$brand = $imagerow['brand'];
	$model = $imagerow['model'];
	$phone_number = $imagerow['phone_number'];
	$engine = $imagerow['engin'];
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
	$cylinder = $imagerow['cylinder'];
	$town = $imagerow['town'];
	$province = $imagerow['province'];
	$price = $imagerow['price'];
	$year = $imagerow['year'];	
	$mileage = $imagerow['mileage'];
	$procode = $imagerow['procode'];
	$sparekey = $imagerow['sparekey'];
	$history = $imagerow['history'];
	$colour = $imagerow['colour'];
	$turbo = $imagerow['turbo'];
	$fyl = $imagerow['fyl'];	
	$drive = $imagerow['drive'];	
	$gear = $imagerow['gear'];
	$discriptions = $imagerow['discription'];
	$statu = $imagerow['status'];
		
		if($statu == "Available")
		{
				$status='<b style="color:green;">'.$statu.'</b>';
		}
		else{
				$status='<b style="color:red;">'.$statu.'</b>';
		}
	// For the first picture
	if ($picture1 == "")
	{
		$pic1 = "images/Car.png";
	}
	else
	{
		$pic1 = "userdata/car_images/".$picture1;
	}

	// For the Second picture
	if ($picture2 == "")
	{
		$pic2 = "images/Car.png";
	}
	else
	{
		$pic2 = "userdata/car_images/".$picture2;
	}
	
	// For the third picture
	if ($picture3 == "")
	{
		$pic3 = "images/Car.png";
	}
	else
	{
		$pic3 = "userdata/car_images/".$picture3;
	}
	
	// For the fourth picture
	if ($picture4 == "")
	{
		$pic4 = "images/Car.png";
	}
	else
	{
		$pic4 = "userdata/car_images/".$picture4;
	}
	
	// For the fifth picture
	if ($picture5 == "")
	{
		$pic5 = "images/Car.png";
	}
	else
	{
		$pic5 = "userdata/car_images/".$picture5;
	}
	
	// For the sixth picture
	if ($picture6 == "")
	{
		$pic6 = "images/Car.png";
	}
	else
	{
		$pic6 = "userdata/car_images/".$picture6;
	}
?>
<p />