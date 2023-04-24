<?php
if(empty($id)){
	$pic1 = "../images/default.jpg";
	$fullname = '';
	$picture1 = '';
	$phone = '';
	$email = '';
	$title = '';
}
else{
$imagesql = "SELECT * FROM team WHERE id='$id'";
$checkimage = mysqli_query($dbconn, $imagesql);
	$imagerow = mysqli_fetch_assoc($checkimage);
	$fullname = $imagerow['name'];
	$picture1 = $imagerow['image'];
	$phone = $imagerow['phone'];
	$email = $imagerow['email'];
	$title = $imagerow['title'];
	if ($picture1 == "")
	{
		$pic1 = "../images/default.jpg";
	}
	else
	{
		$pic1 = "../userdata/team_images/".$picture1;
	}
}
//image1 uploading
	
	if (isset($_FILES['image'])) {
		if (((@$_FILES["image"]["type"]=="image/jpeg" ) || (@$_FILES["image"]["type"]=="image/png" ) || (@$_FILES["image"]["type"]=="image/jpg") || (@$_FILES["image"]["type"]=="image/gif"))&& (@$_FILES["image"]["size"] < 1048576))//this means 1MB
		{
			
			$randdirname = 'staff';
			mkdir("../userdata/team_images/$randdirname");
			
			if (file_exists("../userdata/team_images/$randdirname/".@$_FILES["image"]["name"]))
			{
				$imagedup ="Sorry <b>".@$_FILES["image1"]["name"]."</b> Already exists, please use another image or remove the image from below.";
			}
			else
			{
					move_uploaded_file(@$_FILES["image"]["tmp_name"],"../userdata/team_images/$randdirname/".@$_FILES["image"]["name"]);
					$image_name = @$_FILES["image"]["name"];
					$profilepics = "UPDATE team SET image='$randdirname/$image_name' WHERE id='$id'";
					$profilepic = mysqli_query($dbconn, $profilepics);
					echo'<meta http-equiv="refresh" content="0;url=team.php?id='.$id.'">';					
			}
		}
			else
			{
				$errorpic1 = "Sorry Unable to upload file, either your Image is larger than 1MB or you Uploaded none Image File!";
			}
		}

?>