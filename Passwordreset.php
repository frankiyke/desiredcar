<?php include ("./inc/headerview.php");?>
<!-- END header -->
<?php
if (@$_SESSION["user_login"]){
    echo'<meta http-equiv="refresh" content="0;url=index">';
    exit();
    }else{}
$reset = @$_POST['changepw'];
//declaring variable to prevent errors
$email = $_GET['username'];
$verificationcode= $_GET['verificationcode'];
$customerid= $_GET['customerid'];
$alert = "";
$error = "";
$e_check = ""; //check if the username exists

			$to = $email;
			$subject = "Password Changed";
			$body = "Dear Customer,\n
			You have successfully changed your Desired Car password.\n
			If you did not change this password, Please quickly contact customer care.\n
			Regards,\n
			DesiredCar";
			$from = "From: Desiredcar Account<passwordreset@desiredcar.co.za>";
//registration form
	$paswd1= strip_tags(@$_POST['password']);
	$paswd2= strip_tags(@$_POST['password2']);
	
		if ($reset){
		if ($paswd1 == $paswd2 && $verificationcode == md5($email)){
			$password = md5($paswd1);
					$pwdupdt = "update clients set password='$password' WHERE email='$email'";
					mysqli_query($dbconn, $pwdupdt);
						mail($to, $subject, $body, $from);
						die("<section class='site-section'>
							<divclass='container'>
							<div class='row justify-content-center'>
							<div class='col-md-7'>
							<div class='form-wrap'>
							<br /><span style='color:green;'>Your Password has been changed successfully.</span>
							</div>
							</div>
							</div>
							</div>
							</section>");
						  $alert= "Your Password has been changed successfully.";
						  echo'<meta http-equiv="refresh" content="0;url=index">';
                            exit();
						}				
					else {
						$error = "Entered passwords didn't match or something went wrong, please try again";
					}
			
			}
			else{	}	
					//encrypt the new password		
					
	

?>

    <!-- END section -->
    
    <section class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7">
            <div class="form-wrap">
              <h2 class="mb-4">Change your password</h2>
              <form action="" method="post">           
                    <span style="color:green;"><?php echo $alert; ?></span>
					<span style="color:red;"><?php echo $error; ?></span>            
				<div class="row">
                  <div class="col-md-12 form-group">
                    <label for="name">Password:</label>
                    <input type="password" id="name" name="password" class="form-control py-2">
                  </div>
                </div>
				<div class="row">
                  <div class="col-md-12 form-group">
                    <label for="name">Confirm Password:</label>
                    <input type="password" id="name" name="password2" class="form-control py-2">
                  </div>
                </div>
                 <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="submit" value="Save" name="changepw" class="btn btn-primary px-5 py-2">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    
<?php include ("./inc/footer.php");?>