<?php include ("./inc/headerview.php");?>
<!-- END header -->

<?php 

//declaring variable to prevent errors
$email = "";
$email2 = "";
$fullname = "";
$address = "";
$phone = "";
$dob = "";
$pswd = "";
$pswd2 = "";
$errormsg = "";
$u_check = ""; 
$status = "Pendding";
$registered_date = "";
//==============================
//registration form
	$start = strip_tags(@$_POST['reg']); 
	$fullname = strip_tags(@$_POST['fullname']);       
	$title  = strip_tags(@$_POST['title']);        
	$namedealer = strip_tags(@$_POST['namedealer']);     
	$city = strip_tags(@$_POST['city']);       
	$province = strip_tags(@$_POST['province']);  
	$zip = strip_tags(@$_POST['zip']);      
	$phone = strip_tags(@$_POST['phone']);     
	$email = strip_tags(@$_POST['email']);       
	$tucs = strip_tags(@$_POST['tucs']);      
	$tncs = strip_tags(@$_POST['tncs']);   
	$eab = strip_tags(@$_POST['eab']);      
	$registered_date = date("Y-m-d"); //Year - Month - Day
	$dealerid = "D00".date("ymdHis");
	
	if ($start){
		
		$query = "INSERT INTO dealers VALUES ('','$fullname','$title','$namedealer','$city','$province','$zip','$phone','$email','$tucs','$tncs','$eab','$registered_date','$dealerid')";
		$query = mysqli_query($dbconn, $query);
		
		$body = "Fullname : $fullname \nTitle : $title \nDealerName: $namedealer \nCity : $city \nProvince : $province \nPostal Code : $zip \nPhone : $phone \nE-mail : $email \nTotal Used Cars: $tucs \nTotal New Cars : $tncs \nEstimated Ad Budget : $eab \nRegistered Date : $registered_date \nDealerID : $dealerid";
		$to = "dealers@desiredcar.co.za";
		$from = "Web dealer Request<dealerequest@desiredcar.co.za>";
		
		mail($to, $namedealer, $body, $from);
		
		die("<section class='site-section'>
			<divclass='container'>
			<div class='row justify-content-center'>
			<div class='col-md-7'>
			<div class='form-wrap'>
			<h2>Request Has been successfully sent</h2><br />Your representative will get in touch with you within 24 working hours of submission.
			</div>
			</div>
			</div>

			</div>
			</section>");
	}	
		
?>


<!-- The page information Starts here --->
  
    <section class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7">
            <div class="form-wrap">
              <h3 class="mb-5">Contact Us</h3>
			  Thanks for your interest in partnering with DesiredCar.co.za. Fill out this simple form to get in touch with your representative. 
			  We can’t wait to connect you with our audience of in-market shoppers and deliver long-term growth for your dealership.
			  <p /><span style="color:red;"><?php echo $errormsg; ?></span>
              <form action="" method="POST" >
                   
				   <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Full Name</label>
                      <input type="text" id="name" name="fullname" required="require" class="form-control py-2">
                    </div>
                  </div>
				  
				  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Title</label>
						<select name="title" required="require" class="form-control py-2">
							<option value=""></option>
							<option value="3rd Party Contact">3rd Party Contact</option>
							<option value="BDC Manager">BDC Manager</option>
							<option value="Blling Contact">Blling Contact</option>
							<option value="Executive">Executive</option>					
							<option value="Finance">Finance</option>
							<option value="General Manager">General Manager</option>
							<option value="General Sales Manager">General Sales Manager</option>
							<option value="Internet Sales Manager">Internet Sales Manager</option>
							<option value="Inventory Sale">Inventory Sale</option>
							<option value="Inventory Contact">Inventory Contact</option>
							<option value="Marketing Manager">Marketing Manager</option>
							<option value="New Car Manager">New Car Manager</option>
							<option value="Others">Others</option>
							<option value="Owner/Dealer Principle">Owner/Dealer Principle</option>
							<option value="Service Manager">Service Manager</option>
							<option value="Sales Manager">Sales Manager</option>
							<option value="Sales Rep">Sales Rep</option>
							<option value="Technical Contact">Technical Contact</option>
							<option value="Used Car Manager">Used Car Manager</option>
							<option value="VP">VP</option>
						</select>
					
					</div>
                  </div>
				  
				  
				  
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Name of Dealership</label>
                      <input type="text" id="name" name="namedealer" required="require" class="form-control py-2">
                    </div>
                  </div>
				  			 				  		  
				   <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">City</label>
                      <input type="text" id="name" name="city" required="require" class="form-control py-2">
                    </div>
                 			  
                    <div class="col-md-6 form-group">
                      <label for="name">Province</label>
                      <input type="text" id="name" name="province" required="require" class="form-control py-2">
                    </div>
                  </div>
				  
				  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">Postal/Zip Code/</label>
                      <input type="text" id="name" name="zip" required="require" class="form-control py-2">
                    </div>
                 			  
                    <div class="col-md-6 form-group">
                      <label for="name">Phone</label>
                      <input type="text" id="name" name="phone" required="require" class="form-control py-2">
                    </div>
                  </div>
				  
				   <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Email Address</label>
                      <input type="email" id="name" name="email" required="require" class="form-control py-2">
                    </div>
                  </div>
				  
				  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">Total Used cars</label>
                      <input type="text" id="name" name="tucs" required="require" class="form-control py-2">
                    </div>
                 			  
                    <div class="col-md-6 form-group">
                      <label for="name">Total New Cars</label>
                      <input type="text" id="name" name="tncs" required="require" class="form-control py-2">
                    </div>
                  </div>
				  
                  <div class="row mb-5">
                    <div class="col-md-12 form-group">
                      <label for="name">Estimated Ad Budget</label>
                      <input type="text" id="name" name="eab" required="require" class="form-control py-2">
                    </div>
                  </div>		  
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <input type="submit" name="reg" value="GET STARTED" class="btn btn-primary px-5 py-2">
                    </div>
                  </div>
                </form>
              </div>
          </div>
        </div>
      </div>
    </section>
   <?php include ("./inc/footer.php");?>