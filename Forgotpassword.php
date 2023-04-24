<?php include ("./inc/headerview.php");?>
<!-- END header -->
<?php
if (@$_SESSION["user_login"]){
    echo'<meta http-equiv="refresh" content="0;url=index">';
    exit();
    }else{}
$reset = @$_POST['resetpw'];
//declaring variable to prevent errors
$phone = "";
$alert = "";
$error = "";
$e_check = ""; //check if the username exists
//registration form
	$phone= strip_tags(@$_POST['phone']);
	
	if ($reset){
			$e_check = "SELECT * FROM clients WHERE phone='".$phone."'";
			$e_check = mysqli_query($dbconn, $e_check);
			$email_check = mysqli_num_rows($e_check);
				if ($email_check != 0){
					while($row = mysqli_fetch_array($e_check)){
					$email = $row["email"];
					$name = $row['fullname'];
					$phone = $row['phone'];
					$customerid = $row['customerid'];
					}
					$verificationcode= md5($email);
					$link ="https://desiredcar.co.za/Passwordreset?customerid=$customerid&username=$email&verificationcode=$verificationcode ";
					//Sends the new password		
							$to = $email;
							$subject = "Password Reset";
							$from = "From: Password Reset <passwordreset@desiredcar.co.za>";
							$body = "Dear $name,\n
We have received a request to change the password to your DesiredCar account.\r
Please follow the link below to reset your password now.\n
Your username is: $email\n
$link\r
If you did not request this password change, you can simply ignore this email.\r 
If you have any questions please let us know.\n
Regards,\r
DesiredCar";
							
							mail($to, $subject, $body, $from);
							//Encoding the email for security reasons
                            $string = "$email";
							$replacement = "************";
							$length = strlen($replacement);
							$position = 2;
							$final = substr_replace($string, $replacement, $position, $length);
						$alert= "Password reset link has been sent to your email ($final), kindly follow the link to change your password. <br />Please check your bulk as well if you did not receive the email.";
						}
						
					else {
						$error = "Sorry! Youv'e Entered a Wrong Phone number";
					}
	}

?>

    <!-- END section -->
    
    <section class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7">
            <div class="form-wrap">
              <h2 class="mb-4">Please enter your phone number below</h2>
              <form action="" method="post">           
                    <span style="color:green;"><?php echo $alert; ?></span>
					<span style="color:red;"><?php echo $error; ?></span>            
				<div class="row">
                  <div class="col-md-12 form-group">
                    <label for="name">Phone Number</label>
                    <input type="text" id="name" name="phone" class="form-control py-2">
                  </div>
                </div>
                 <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="submit" value="Reset Password" name="resetpw" class="btn btn-primary px-5 py-2">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    
<?php include ("./inc/footer.php");?>