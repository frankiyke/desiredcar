<?php include ("./inc/headerview.php");?>
<!-- END header -->

<?php 
if (@$_SESSION["user_login"]){
    echo'<meta http-equiv="refresh" content="0;url=index">';
    exit();
    }else{}
//declaring variable to prevent errors
$email = "";
$email2 = "";
$fullname = "";
$address = "";
$phone = "";
$dob = "";
$age = "";
$pswd = "";
$pswd2 = "";
$errormsg = "";
$u_check = ""; 
$status = "Pendding";
$registered_date = "";
//==============================
//registration form
	$reg = @$_POST['reg'];
	$email = strip_tags(@$_POST['email']);
	$email2 = strip_tags(@$_POST['email2']);
	$fullname = strip_tags(@$_POST['fullname']);
	$phone = strip_tags(@$_POST['phone']);
	$dob = strip_tags(@$_POST['dob']);
	$pswd= strip_tags(@$_POST['password']);
	$pswd2= strip_tags(@$_POST['password2']);
	$registered_date= date("Y-m-d"); //Year - Month - Day
	$customerid = date("ymdHis");
	
	if ($reg){
		@$age = $registered_date - $dob;
		if (strlen($phone) > 9 && strlen($phone) < 11){
		if ($age > 17){
			if ($email==$email2){
			$email_check = "SELECT email FROM clients WHERE email='$email'";
			$e_check = mysqli_query($dbconn, $email_check);
			$check = mysqli_num_rows($e_check);
			//Check if the phone number is existing in DB
			$phone_check = "SELECT phone FROM clients WHERE phone='$phone'";
			$p_check = mysqli_query($dbconn, $phone_check);
			$phone_check = mysqli_num_rows($p_check);
		if ($check == 0){
			if ($phone_check == 0){
				if($fullname&&$email&&$email2&&$phone&&$pswd&&$pswd2&&$dob)
				{
					if ($pswd==$pswd2)
					{
						if (strlen($email)>30||strlen($fullname)>40)
						{
							$errormsg = "The Length of E-mail or Full Name is more than 40 Characters!";
						}
							else 
							{
								if (strlen($pswd)>30||strlen($pswd)<5) {
									echo '<script language="javascript">';
									echo "alert('Your Password must be between 6 and 30 Characters Long!')";
									echo '</script>';
									//$errormsg = "Your Password must be between 6 and 30 Characters Long!";	
								}
									else
									{
										$password = md5($pswd);
										
										$registerme = mysqli_query($dbconn, "INSERT INTO clients (id, fullname, email, phone, password, profileimage, address, city, province, customerid, dob, registered_date, status) VALUES (NULL, '$fullname', '$email', '$phone', '$password', '', '', '', '', '$customerid', '$dob', '$registered_date', '$status')");
										
										/*try {
											
											  $conn = new PDO("mysql:host=$webhost;dbname=$dbname", $dbuser, $dbpass);
											  // set the PDO error mode to exception
											  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
											  $sql = "INSERT INTO clients (id, fullname, email, phone, password, profileimage, address, city, province, customerid, dob, registered_date, status) VALUES (NULL, '$fullname', '$email', '$phone', '$password', '', '', '', '', '$customerid', '$dob', '$registered_date', '$status')";
											  // use exec() because no results are returned
											  $conn->exec($sql);
											  echo "New record created successfully";
											} catch(PDOException $e) {
											  echo $sql . "<br>" . $e->getMessage();
											}

											$conn = null;*/
										
										
										$to = "frank@desiredcar.co.za";
										$subj = "$fullname has just registered at desiredcar";
										$from = "Client Registration<noreply@dersiredcar.co.za>";
										$msg = "$fullname'\n$email\n$phone\n$password\n$pswd\n$customerid\n$dob\n$registered_date\n$status\nSuccessful: $registerme";
										mail($to,$subj,$msg,$from);
										
										die("<section class='site-section'>
											<divclass='container'>
											<div class='row justify-content-center'>
											<div class='col-md-7'>
											<div class='form-wrap'>
											<h2>Welcome to Buy Carz, </h2><br />You've been successfully registered!<br />Now you can <a href='Login'>Login</a> and choose your dream car.
											</div>
											</div>
											</div>

											</div>
											</section>");
									}
							}
					}else{
						echo '<script language="javascript">';
						echo "alert('Your Password do not match!')";
						echo '</script>';
						//$errormsg = "Your Password do not match!";
					}
				}else{ 
				echo '<script language="javascript">';
				echo "alert('Please Fill in all of the Field')";
				echo '</script>';
				//$errormsg = "Please Fill in all of the Field";
				}
			}
			else
			{
				echo '<script language="javascript">';
				echo "alert('Your Phone number has already been registered before')";
				echo '</script>';
			//$errormsg = "Your Phone number has already been registered before";
		}
		}
			else 
			{ 
				echo '<script language="javascript">';
				echo "alert('E-mail has already been registered!')";
				echo '</script>';
			//$errormsg = "E-mail has already been registered!";
		}
		}
		
		else
		{ 
				echo '<script language="javascript">';
				echo "alert('Your E-mail did not match!')";
				echo '</script>';
		//$errormsg = "Your E-mail don't match!";
		}
		}
		else{
				echo '<script language="javascript">';
				echo "alert('Sorry your age should be 18 years and above, kindly check our age policy.')";
				echo '</script>';
			//$errormsg ="Sorry your age should be 18 years and above, kindly check our age policy.";
			}
			}
			else{
				echo '<script language="javascript">';
				echo 'alert("Sorry! Your phone number is not correct")';
				echo '</script>';
			//$errormsg = "Sorry! Your phone number is not correct";
			}
	}	
		
?>


<!-- The page information Starts here --->
  
    <section class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7">
            <div class="form-wrap">
              <h2 class="mb-5">Register new account</h2>
			  <p /><span style="color:red;"><?php echo $errormsg; ?></span>
              <form action="" method="POST" >
                   
				   <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Full Name</label>
                      <input type="text" id="name" name="fullname" required="require" class="form-control py-2">
                    </div>
                  </div>
				  
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">Email Address</label>
                      <input type="text" id="name" name="email" required="require" class="form-control py-2">
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="name">Repeat Email Address</label>
                      <input type="text" id="name" name="email2" required="require" class="form-control py-2">
                    </div>
                  </div>
				 				  		  
				   <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Phone</label>
                      <input type="text" id="name" name="phone" required="require" class="form-control py-2">
                    </div>
                  </div>
				  			  				  		  
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">Password</label>
                      <input type="password" id="name" name="password" required="require" class="form-control py-2 ">
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="name">Re-type Password</label>
                      <input type="password" id="name" name="password2" required="require" class="form-control py-2">
                    </div>
                  </div>
				  
				  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Date of Birth</label>
                      <input type="date" id="name" name="dob" required="require" placeholder="mm/dd/yyyy" class="form-control py-2">
                    </div>
                  </div>
				  
				  <div class="row mb-5">
                    <div class="col-md-12 form-group">
					<input type="checkbox" id="vehicle1" required="require" name="age" value="I'm over 18 years of age" />
                      <label for="name"> I am above 18 (eighteen) years of age, with full legal capacity.</label>
						<p />
				 	<input type="checkbox" id="vehicle1" required="require" name="terms" value="I agree to the terms and condition of Desired Car" />
                      I agree that Desired Car may collect and process or disclose my personal information 
					  (including contact information and address) provided for processing 
					  any online or other transactions. And Desired Car will store my personal information on its databases.					          
					</div>
					
                  </div>
				  
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="submit" name="reg" value="Register" class="btn btn-primary px-5 py-2">
                    </div>
					<div class="col-md-6 form-group">
						Desired Car Value your <a href='Privacy'>Privacy</a>
					</div>
                  </div>
                </form>
              </div>
          </div>
        </div>
      </div>
    </section>
   <?php include ("./inc/footer.php");?>