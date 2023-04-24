<?php 
include ("inc/headerview.php");

//declaring variable to prevent errors
$errormsg = "";
$errorpic0 = "";
$errorpic1 = "";
$errorpic2 = "";
$errorpic3 = "";
$errorpic4 = "";
$errorpic5 = "";
$errorpic6 = "";
$imagedup = "";
$msg = "";
$customerid = date("ymdHis");
$registered_date= date("Y-m-d");
?>
<?php 
$list = @$_POST['reg'];
$uploadpic = @$_POST['uploadpic'];


//registration form
if ($list) {
$brand = strip_tags(@$_POST['brand']);
$model = strip_tags(@$_POST['model']);
$gear = strip_tags(@$_POST['gear']);
$drive = strip_tags(@$_POST['drive']);
$engin = strip_tags(@$_POST['engin']);
$colour = strip_tags(@$_POST['colour']);
$gas = strip_tags(@$_POST['gas']);
$mileage = strip_tags(@$_POST['mileage']);
$cylinder = strip_tags(@$_POST['cylinder']);
$body = strip_tags(@$_POST['body']);
$discription = strip_tags(@$_POST['discription']);
$history = strip_tags(@$_POST['history']);
$year = strip_tags(@$_POST['year']);
$transmission = strip_tags(@$_POST['transmission']);
$doors = strip_tags(@$_POST['doors']);
$availability = strip_tags(@$_POST['availability']);
$name = strip_tags(@$_POST['name']);
$email = strip_tags(@$_POST['email']);
$phone = strip_tags(@$_POST['phone']);
$customerid = (@$_POST['customerid']);
$status = "GeustRequest";
$registered_date= date("Y-m-d");
$dob = "0000-00-00";

$to = 'info@desiredcar.co.za'; 
$subject = 'New Car request'; 
$message = $name.' has requested for a car ('.$brand.' '.$model.') with Customer number :'.$customerid."\n".$phone; 
$from = $email;

$updateinfo = mysqli_query($dbconn, "INSERT INTO request (id,phone_number,owner,customerid,brand,model,doors,transmission,body,cylinder,discription,mileage,engin,gas,gear,drive,year) VALUES (NULL,'$phone','$name','$customerid','$brand','$model','$doors','$transmission','$body','$cylinder','$discription','$mileage','$engin','$gas','$gear','$drive','$year')");
$registerme = mysqli_query($dbconn, "INSERT INTO clients (id,fullname,email,phone,password,profileimage,address,city,province,customerid,dob,registered_date,status) VALUES (NULL,'$name','$email','$phone','','','','','','$customerid','$dob','$registered_date','$status')");

mail($to, $subject, $message, $from);
$msg= "You've successfully requested a car!";
echo'<meta http-equiv="refresh" content="2;url=Requests">';
}
else
{}	
?>


<!-- The page information Starts here --->

    <!-- END section -->
    
    <section class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7">
            <div class="form-wrap">
              <h2 class="mb-5">Vehicle Request</h2>
			  <p /><span style="color:red;"><?php echo $errormsg; ?></span>
			  <p /><span style="color:green;"><?php echo $msg; ?></span><b />
              <form action="" method="POST" >
                  
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name"><h4>Hello Guest, you are making a car request.</h4></label>
					  <p>Please note that we may not get exactly what you requested for, but we will always be very close to your detailed description. 
					  An agent will get in-touch with you within 48 working hours through your email.</p>
                    </div>
                  </div>
				  <div class="row">
						<div class="col-md-12 form-group">
						<label for="name">Name</label>
				            <input type="text" id="name" name="name" Placeholder="Full Name" required="require" class="form-control py-2">
						</div>
                  </div>
				   <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">Phone</label>
                      <input type="text" id="name" name="phone" Placeholder="083 000 0000" required="require" class="form-control py-2">
                    </div>
                    <div class="col-md-6 form-group">
                      <label for="name">Email</label>
                      <input type="text" id="name" name="email" Placeholder="email@example.com" required="require" class="form-control py-2">
                    </div>
                  </div>
				  <input type="hidden" id="name" name="customerid" required="require" value="<?php echo $customerid; ?>" class="form-control py-2">
				  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">Brand Name</label>
					  <select name="brand" required="require" class="form-control py-2">
							<option value="">Select Brand</option>
								<option value="Acura">Acura</option>        
								<option value="Alfa-Romeo">Alfa-Romeo</option>        
								<option value="Audi">Audi</option>        
								<option value="BMW">BMW</option>        
								<option value="Bentley">Bentley</option>        
								<option value="Bugatti">Bugatti</option>        
								<option value="Buick">Buick</option>        
								<option value="Cadillac">Cadillac</option>        
								<option value="Chevrolet">Chevrolet</option>
								<option value="Chrysler">Chrysler</option>
								<option value="Citroen">Citroen</option>
								<option value="Daewoo">Daewoo</option>
								<option value="Daihatsu">Daihatsu</option>
								<option value="Dodge">Dodge</option>
								<option value="Datsun">Datsun</option>
								<option value="Ferrari">Ferrari</option>
								<option value="Fiat">Fiat</option>
								<option value="Ford">Ford</option>
								<option value="GMC">GMC</option> 
								<option value="GWM">GWM</option>
								<option value="Genesis">Genesis</option>
								<option value="Haval">Haval</option>
								<option value="Honda">Honda</option>  
								<option value="Hyundai">Hyundai</option> 
								<option value="Infiniti">Infiniti</option>
								<option value="Isuzu">Isuzu</option>
								<option value="Jaguar">Jaguar</option>
								<option value="Jeep">Jeep</option> 
								<option value="Kia">Kia</option>
								<option value="Lamborghini">Lamborghini</option>
								<option value="Land Rover">Land Rover</option>
								<option value="Lexus">Lexus</option>
								<option value="Lincoln">Lincoln</option>
								<option value="Lotus">Lotus</option>
								<option value="Maserati">Maserati</option>
								<option value="Mahindra">Mahindra</option>
								<option value="Mazda">Mazda</option>
								<option value="Mercedes-Benz">Mercedes-Ben</option>
								<option value="Mercury">Mercury</option>
								<option value="Mini">Mini</option>
								<option value="Mitsubishi">Mitsubishi</option>
								<option value="Mustang">Mustang</option>
								<option value="Nissan">Nissan</option>
								<option value="Opel">Opel</option>
								<option value="Polestar">Polestar</option>
								<option value="Pontiac">Pontiac</option>
								<option value="Porsche">Porsche</option>
								<option value="Ram">Ram</option>
								<option value="Renault">Renault</option>
								<option value="Rivian">Rivian</option>
								<option value="Rolls-Royce">Rolls-Royce</option>
								<option value="Saab">Saab</option>
								<option value="Saturn">Saturn</option>
								<option value="Scion">Scion</option>
								<option value="Smart">Smart</option>
								<option value="Subaru">Subaru</option>
								<option value="Suzuki">Suzuki</option>
								<option value="Tata">Tata</option>
								<option value="Tesla">Tesla</option>
								<option value="Toyota">Toyota</option>
								<option value="Vinfast">Vinfast</option>
								<option value="Volkswagen">Volkswagen</option>
								<option value="Volvo">Volvo</option>
						</select>
					
					</div>
                  
				  				  
				  
                    <div class="col-md-6 form-group">
                      <label for="name">Specify Model</label>
                      <input type="text" id="name" name="model" required="require" Placeholder="Honder CRV " class="form-control py-2">
                    </div>
                  </div>
				    <div class="row">
                    <div class="col-md-6 form-group">
					<?php $years = range(1980, strftime("%Y", time())); ?>
                      <label for="name">Model Year Require</label>
                      	<select name="year" required="require" class="form-control py-2">
						  <option>Select</option>
						  <?php foreach($years as $year) : ?>
							<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
						  <?php endforeach; ?>
						</select>
												
					</div>
                  
                    <div class="col-md-6 form-group">
                      <label for="name">Numbers of Doors Require</label>
						<select name="doors" required="require" class="form-control py-2">
							<option value="">Select</option>
							<option value="2 Doors">2 Doors</option>
							<option value="3 Doors">3 Doors</option>					
							<option value="4 Doors">4 Doors</option>
							<option value="5 Doors">5 Doors</option>
							<option value="6 Doors">6 Doors</option>
							<option value="7 Doors">7 Doors</option>
						</select>
					
					</div>
                  </div>
				  
				   <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">Required Transmission</label>
						<select name="transmission" required="require" class="form-control py-2">
							<option value="">Select</option>
							<option value="Manual">Manual</option>								
							<option value="Automatic">Automatic</option>
						</select>
					</div>
                 
                    <div class="col-md-6 form-group">
                      <label for="name">Required Body Type</label>
						<select name="body" required="require" class="form-control py-2">
							<option value="">Select</option>
							<option value="Truck">Truck</option>
							<option value="Bakkie">Bakkie</option>
							<option value="Coupe">Coupe</option>
							<option value="Sedan">Sedan</option>
							<option value="Minivan/Van">Minivan/Van</option>
							<option value="Hatchback">Hatchback</option>
							<option value="Convertible">Convertible</option>
							<option value="MUV/SUV">MUV/SUV</option>
							<option value="Wagon">Wagon</option>
						</select>
					</div>
                  </div>
						  
				  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">Required Engine Capacity</label>
                      <input type="text" id="name" name="engin" required="require" Placeholder="1.6 or 1671cc" class="form-control py-2">
                    </div>
                  
                    <div class="col-md-6 form-group">
                      <label for="name">Preferred Gas</label>
					  <select name="gas" required="require" class="form-control py-2">
							<option value="">Select</option>								
							<option value="Petrol">Petrol</option>
							<option value="Diesel">Diesel</option>
							<option value="Hybrid">Hybrid</option>
							<option value="Electric">Electric</option>
						</select>
                    </div>
                  </div>
				  
			       <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">Preferred Cylinder Layout:</label>
                   		<select name="cylinder" required="require" class="form-control py-2">
							<option value="">Select</option>							
							<option value="I2">i2</option>
							<option value="I3">i3</option>							
							<option value="I4">i4</option>
							<option value="I5">i5</option>
							<option value="I6">i6</option>
							<option value="I8">i8</option>
							<option value="I12">i12</option>
						</select>

				   </div>
                  
                    <div class="col-md-6 form-group">
                      <label for="name">Preferred Gears</label>
						<select name="gear" required="require" class="form-control py-2">
							<option value="">Select</option>							
							<option value="3">3</option>
							<option value="4">4</option>							
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
						</select>
					
					</div>
                  </div>
				  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">Preferred Wheel Drive</label>
                      <select name="drive" required="require" class="form-control py-2">
							<option value="">Select</option>							
							<option value="Rear">Rear</option>
							<option value="Front">Front</option>							
							<option value="Front-Rear">Front-Rear</option>
							<option value="ADW">AWD</option>
							<option value="4DW">4WD</option>
						</select>
                    </div>
                  
                    <div class="col-md-6 form-group">
                      <label for="name">Desired Mileage</label>
                      <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required="require" Placeholder="15000" name="mileage" class="form-control py-2"/>
                    </div>
                  </div>
				  
				  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">Preferred Colour</label>
					  <select name="colour" required="require" class="form-control py-2">
						<option value="">Select</option>								
							<option value="White">White</option>
							<option value="Silver">Silver</option>
							<option value="Gray">Gray</option>
							<option value="Yellow">Yellow</option>
							<option value="Red">Red</option>
							<option value="Meroon">Meroon</option>
							<option value="Orange">Orange</option>
							<option value="Green">Green</option>
							<option value="Blue">Blue</option>
							<option value="Brown">Brown</option>
							<option value="Black">Black</option>
						</select>
					
					</div>
                  
                    <div class="col-md-6 form-group">
                      <label for="name">Servicing History?</label>
						<select name="history" required="require" class="form-control py-2">
						<option value="">Select</option>								
							<option value="Yes Preferably">Yes Preferably</option>
							<option value="Yes if Available">Yes if Available</option>
							<option value="No">No</option>
						</select>			
					
					</div>
                  </div>
                  
                   <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Other Discriptions:</label>
                      <textarea name="discription" id="name" required class="form-control py-2" rows="4"></textarea>
                    </div>
                  </div>
				  
							       
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="submit" name="reg" value="Request" class="btn btn-primary px-5 py-2">
                    </div>
				 </div>
                </form>
				<hr />
				
				<script type="text/javascript">
						function change_province()
						{
							var xmlhttp=new XMLHttpRequest();
							xmlhttp.open("GET","ajax.php?province="+document.getElementById("province").value,false);
							xmlhttp.send(null);
							document.getElementById("cityname").innerHTML=xmlhttp.responseText;
						}
				</script>
				
              </div>
          </div>
        </div>
      </div>
    </section>
   <?php include ("./inc/footer.php");