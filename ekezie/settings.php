<?php
include ("adminheader.php");

?>	
<?php 
	$updatedata = @$_POST['updatedata'];
	$senddata = @$_POST['senddata'];
	$error = "";
	$passsuccess = "";
	$proerror = "";
	$prosuccess = "";
	$errorpic = "";
	//create some variable to terminate any kind of error
	
	$oldpass = strip_tags(@$_POST['oldpassword']);
	$newpassword = strip_tags(@$_POST['newpassword']);
	$newpassword2 = strip_tags(@$_POST['newpassword2']);
	
	$oldpassword = md5($oldpass);
	
	if ($senddata) {
		$passwordquery = "SELECT * FROM users WHERE email='$email'";
		$password_query = mysqli_query($dbconn, $passwordquery);
		while ($row = mysqli_fetch_assoc($password_query)) {
			$dbpassword = $row['password'];
			//verify the password
			if ($oldpassword == $dbpassword) {
				//compare the old 2 typed password
				if ($newpassword == $newpassword2) {
					if (strlen($newpassword) <= 6){
						$error = "Sorry! Your password must be at least 6 character long!";
					}
					else
					{
					$encryptedpass = md5($newpassword);
					$passupdate = "UPDATE users SET password='$encryptedpass' WHERE email='$email'";
					$passupdated = mysqli_query($dbconn, $passupdate);
					
					$passsuccess = "Password Successfully Changed!";
				}
				}
				else
				{
				 $error = "Your two new password didn't match!";
				}
			  }
			else
			{
				$error = "Your Old password was typed wrongly!";
			}
		}
	}
	else {
		echo "";		
	}
	//First name last name and about the user query to update
	$getinfo1 = "SELECT * FROM users WHERE email='$email'";
	$getinfo = mysqli_query($dbconn, $getinfo1);
	$getrow = mysqli_fetch_assoc($getinfo);
	$firstname = $getrow['firstname'];
	$lastname = $getrow['lastname'];
	$address = $getrow['address'];
	$phone = $getrow['phone'];
	//submitting the edited info by user
	if ($updatedata) {
		$firstname = strip_tags(@$_POST['firstname']);
		$lastname = strip_tags(@$_POST['lastname']);
		$address = strip_tags(@$_POST['address']);
		$phone = strip_tags(@$_POST['phone']);
	if (strlen($phone) > 9 && strlen($phone) < 11)
	{		
			if (strlen($firstname) > 3)
			{						
				if (strlen($lastname) > 3)
				{
					//submit the form to DB
					$submitinfo = "UPDATE users SET firstname='$firstname', lastname='$lastname', address='$address', phone='$phone' WHERE email='$email'";
					$submitinfos = mysqli_query($dbconn, $submitinfo);
					$prosuccess = "Your Information has been successfully updated!";
					echo'<meta http-equiv="refresh" content="0;url=settings.php">';
                     exit();
				}

				else {
						$proerror = "Sorry! Your Last Name Can't be less than 3 characters long!";
					}
			}
			else {
				$proerror = "Sorry! Your First Name Cannot be less than 3 characters long!";
				}
	}
	else{
		$proerror = "Sorry! Your phone number is not correct!";}
	}
	else 
	{
	// do nothing my code	
	}
	//Check whether the image has uploaded or nothing
	$checkimage = "SELECT profileimage FROM users WHERE email='$email'";
	$checkimages = mysqli_query($dbconn, $checkimage);
	$imagerow = mysqli_fetch_assoc($checkimages);
	$profilephoto = $imagerow['profileimage'];
	if ($profilephoto == "")
	{
		$profileimage = "../images/default.jpg";
	}
	else
	{
		$profileimage = "../userdata/profileimages/".$profilephoto;
	}
	//Profile image uploading
	if (isset($_FILES['profileimage'])) {
		if (((@$_FILES["profileimage"]["type"]=="image/jpeg" ) || (@$_FILES["profileimage"]["type"]=="image/png" ) || (@$_FILES["profileimage"]["type"]=="image/jpg") || (@$_FILES["profileimage"]["type"]=="image/gif"))&& (@$_FILES["profileimage"]["size"] < 2088576))//this means 2MB
		{
			
			$randdirname = $name;
			@mkdir("../userdata/profileimages/$randdirname");
			
			if (file_exists("../userdata/profileimages/$randdirname/".@$_FILES["profileimage"]["name"]))
			{
				echo @$_FILES["profileimage"]["name"]." Already exists";
			}
			else
			{
					move_uploaded_file(@$_FILES["profileimage"]["tmp_name"],"../userdata/profileimages/$randdirname/".@$_FILES["profileimage"]["name"]);
		//echo "Image has been Uploaded and Stored in:  userdata/profileimages/$randdirname/".@$_FILES["profileimage"]["name"];
					$profileimage_name = @$_FILES["profileimage"]["name"];
					$profile = "UPDATE users SET profileimage='$randdirname/$profileimage_name' WHERE email='$email'";
					$profilepic = mysqli_query($dbconn, $profile);
					echo'<meta http-equiv="refresh" content="0;url=settings.php">';
                     exit();
			}
		}
			else
			{
				$errorpic = "Sorry Unable to upload file, either your Image is larger than 2MB or you Uploaded none Image File!";
			}
		}
?>
<div class="container">
<br />
<h2>Edit Your Account Information Below</h2>
<hr />
<p><h4>UPLOAD YOUR PHOTO</h4></p><br />
<form action="" method="POST" enctype="multipart/form-data">
 <img src="<?php echo $profileimage;?>" width="80" />
 <br /><span style="color:red;"><?php echo "$errorpic" ;?></span><br />
 <input type= "file" name= "profileimage">
 <br />
 <br /><input type="submit" name="uploadpic" value="Upload Image">	
</form>
<hr />
<form action="" method="post">
<p><h4>CHANGE YOUR PASSWORD:</h4>
</p>
	<span style="color:red;"><?php echo "$error" ;?></span><span style="color:green;"><?php echo "$passsuccess" ;?></span>
<br />
Your Old Password:<br /> <input type="password" name="oldpassword" id="oldpassword" size="40"><br />
Your New Password:<br /> <input type="password" name="newpassword" id="newpassword" size="40"><br />
Repeat Password:  <br /> <input type="password" name="newpassword2" id="newpassword2" size="40"><br />
<br /><input type="submit" name="senddata" id="senddata" value="Change Password">	
</form>
<hr />
<p><h4>UPDATE YOUR PROFILE INFO:</h4>
</p>
	<span style="color:red;"><?php echo "$proerror" ;?></span><span style="color:green;"><?php echo $prosuccess ;?></span>
<br />	
<form action="" method="post">
First Name:<br /> <input type="text" name="firstname" id="fname" size="40" value="<?php echo $firstname;?>"><br />
Last Name:<br /> <input type="text" name="lastname" id="lname" size="40" value="<?php echo $lastname;?>"><br />
Address:<br /> <input type="text" name="address" id="address" size="40" value="<?php echo $address;?>"><br />
Phone No.:<br /> <input type="text" name="phone" id="phone" size="40" value="<?php echo $phone;?>"><br />
<br /><input type="submit" name="updatedata" id="updatedata" value="Update Info">	
</form>
<hr />
<p />
<p />
<h6>Please use this Button only when you are done with all your update</h6>
<br />
<form action="dashboard.php" method="post">
<input type="submit" name="saveall" id="saveall" value="Save & Goto Dashboard">
</form>
<hr />
<p /><p/><p/>	
</div>	
	
<?php include ("includes/footer.php");?>