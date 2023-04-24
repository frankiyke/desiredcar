<?php
//image1 uploading
	
	if (isset($_FILES['image1'])) {
		if (((@$_FILES["image1"]["type"]=="image/jpeg" ) || (@$_FILES["image1"]["type"]=="image/png" ) || (@$_FILES["image1"]["type"]=="image/jpg") || (@$_FILES["image1"]["type"]=="image/gif"))&& (@$_FILES["image1"]["size"] < 1048576))//this means 1MB
		{
			
			@$randdirname = $id_number;
			mkdir("userdata/car_images/$randdirname");
			
			if (file_exists("userdata/car_images/$randdirname/".@$_FILES["image1"]["name"]))
			{
				echo @$_FILES["image1"]["name"]." Already exists";
			}
			else
			{
					move_uploaded_file(@$_FILES["image1"]["tmp_name"],"userdata/car_images/$randdirname/".@$_FILES["image1"]["name"]);
					$carimage_name = @$_FILES["image1"]["name"];
					$profilepics = "UPDATE cars SET image1='$randdirname/$carimage_name' WHERE email='$email'";
					$profilepic = mysqli_query($dbconn, $profilepics);
					header ("Location: listing.php");
			}
		}
			else
			{
				$errorpic1 = "Sorry Unable to upload file, either your Image is larger than 1MB or you Uploaded none Image File!";
			}
		}
//image2 uploading
	
	if (isset($_FILES['image2'])) {
		if (((@$_FILES["image2"]["type"]=="image/jpeg" ) || (@$_FILES["image2"]["type"]=="image/png" ) || (@$_FILES["image2"]["type"]=="image/jpg") || (@$_FILES["image2"]["type"]=="image/gif"))&& (@$_FILES["image2"]["size"] < 1048576))//this means 1MB
		{
			
			@$randdirname = $id_number;
			@mkdir("userdata/car_images/$randdirname");
			
			if (file_exists("userdata/car_images/$randdirname/".@$_FILES["image2"]["name"]))
			{
				echo @$_FILES["image2"]["name"]." Already exists";
			}
			else
			{
					move_uploaded_file(@$_FILES["image2"]["tmp_name"],"userdata/car_images/$randdirname/".@$_FILES["image2"]["name"]);
		//echo "Image has been Uploaded and Stored in:  userdata/car_images/$randdirname/".@$_FILES["image2"]["name"];
					$carimage_name = @$_FILES["image2"]["name"];
					$profilepics = "UPDATE cars SET image2='$randdirname/$carimage_name' WHERE email='$email'";
					$profilepic = mysqli_query($dbconn, $profilepics);
					header ("Location: listing.php");
			}
		}
			else
			{
				$errorpic2 = "Sorry Unable to upload file, either your Image is larger than 1MB or you Uploaded none Image File!";
			}
		}
//image3 uploading
	
	if (isset($_FILES['image3'])) {
		if (((@$_FILES["image3"]["type"]=="image/jpeg" ) || (@$_FILES["image3"]["type"]=="image/png" ) || (@$_FILES["image3"]["type"]=="image/jpg") || (@$_FILES["image3"]["type"]=="image/gif"))&& (@$_FILES["image3"]["size"] < 1048576))//this means 1MB
		{
			
			@$randdirname = $id_number;
			mkdir("userdata/car_images/$randdirname");
			
			if (file_exists("userdata/car_images/$randdirname/".@$_FILES["image3"]["name"]))
			{
				echo @$_FILES["image3"]["name"]." Already exists";
			}
			else
			{
					move_uploaded_file(@$_FILES["image3"]["tmp_name"],"userdata/car_images/$randdirname/".@$_FILES["image3"]["name"]);
					$carimage_name = @$_FILES["image3"]["name"];
					$profilepics = "UPDATE cars SET image3='$randdirname/$carimage_name' WHERE email='$email'";
					$profilepic = mysqli_query($dbconn, $profilepics);
					header ("Location: listing.php");
			}
		}
			else
			{
				$errorpic3 = "Sorry Unable to upload file, either your Image is larger than 1MB or you Uploaded none Image File!";
			}
		}
//image4 uploading
	
	if (isset($_FILES['image4'])) {
		if (((@$_FILES["image4"]["type"]=="image/jpeg" ) || (@$_FILES["image4"]["type"]=="image/png" ) || (@$_FILES["image4"]["type"]=="image/jpg") || (@$_FILES["image4"]["type"]=="image/gif"))&& (@$_FILES["image4"]["size"] < 1048576))//this means 1MB
		{
			
			@$randdirname = $id_number;
			mkdir("userdata/car_images/$randdirname");
			
			if (file_exists("userdata/car_images/$randdirname/".@$_FILES["image4"]["name"]))
			{
				echo @$_FILES["image4"]["name"]." Already exists";
			}
			else
			{
					move_uploaded_file(@$_FILES["image4"]["tmp_name"],"userdata/car_images/$randdirname/".@$_FILES["image4"]["name"]);
					$carimage_name = @$_FILES["image4"]["name"];
					$profilepics = "UPDATE cars SET image4='$randdirname/$carimage_name' WHERE email='$email'";
					$profilepic = mysqli_query($dbconn, $profilepics);
					header ("Location: listing.php");
			}
		}
			else
			{
				$errorpic4 = "Sorry Unable to upload file, either your Image is larger than 1MB or you Uploaded none Image File!";
			}
		}
//image5 uploading
	
	if (isset($_FILES['image5'])) {
		if (((@$_FILES["image5"]["type"]=="image/jpeg" ) || (@$_FILES["image5"]["type"]=="image/png" ) || (@$_FILES["image5"]["type"]=="image/jpg") || (@$_FILES["image5"]["type"]=="image/gif"))&& (@$_FILES["image5"]["size"] < 1048576))//this means 1MB
		{
			
			@$randdirname = $id_number;
			mkdir("userdata/car_images/$randdirname");
			
			if (file_exists("userdata/car_images/$randdirname/".@$_FILES["image5"]["name"]))
			{
				echo @$_FILES["image5"]["name"]." Already exists";
			}
			else
			{
					move_uploaded_file(@$_FILES["image5"]["tmp_name"],"userdata/car_images/$randdirname/".@$_FILES["image5"]["name"]);
					$carimage_name = @$_FILES["image5"]["name"];
					$profilepics = "UPDATE cars SET image5='$randdirname/$carimage_name' WHERE email='$email'";
					$profilepic = mysqli_query($dbconn, $profilepics);
					header ("Location: listing.php");
			}
		}
			else
			{
				$errorpic5 = "Sorry Unable to upload file, either your Image is larger than 1MB or you Uploaded none Image File!";
			}
		}
//image6 uploading
	
	if (isset($_FILES['image6'])) {
		if (((@$_FILES["image6"]["type"]=="image/jpeg" ) || (@$_FILES["image6"]["type"]=="image/png" ) || (@$_FILES["image6"]["type"]=="image/jpg") || (@$_FILES["image6"]["type"]=="image/gif"))&& (@$_FILES["image6"]["size"] < 1048576))//this means 1MB
		{
			
			@$randdirname = $id_number;
			@mkdir("userdata/car_images/$randdirname");
			
			if (file_exists("userdata/car_images/$randdirname/".@$_FILES["image6"]["name"]))
			{
				$imagedup ="Sorry ".@$_FILES["image6"]["name"]." Already exists";
			}
			else
			{
					move_uploaded_file(@$_FILES["image6"]["tmp_name"],"userdata/car_images/$randdirname/".@$_FILES["image6"]["name"]);
					$carimage_name = @$_FILES["image6"]["name"];
					$profilepics = "UPDATE cars SET image6='$randdirname/$carimage_name' WHERE email='$email'";
					$profilepic = mysqli_query($dbconn, $profilepics);
					header ("Location: listing.php");
			}
		}
			else
			{
				$errorpic6 = "Sorry Unable to upload file, either your Image is larger than 1MB or you Uploaded none Image File!";
			}
		}

?>