<?php include ("adminheader.php");
// <-- END header -->
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
$pic1 = "";
$pic2 = "";
$pic3 = "";
$pic4 = "";
$pic5 = "";
$pic6 = "";
$msg = "";

if(!$email){
	header("location: index");
}
else {
	//listingmore.php?id=$id
}


 
isset($_POST['id']);
$id = mysqli_real_escape_string($dbconn, $_GET['id']);
if (!$id){
	//echo'<meta http-equiv="refresh" content="0;url=listedcars.php">';
	//exit();
	}
	else{}
	
if(isset($_GET['file_name']))
{
 @$id = $_GET['id'];
 @$filename = $_GET['file_name'];
 @unlink($filename);
 $error ='The image has been successfully deleted';
 }
 else{} 
 ?>


<?php 
$list = @$_POST['reg'];
$uploadpic = @$_POST['uploadpic'];


//registration form
if ($list) {
$brand = strip_tags(@$_POST['brand']);
$model = strip_tags(@$_POST['model']);
$phone_number = strip_tags(@$_POST['phone_number']);//
$gear = strip_tags(@$_POST['gear']);
$drive = strip_tags(@$_POST['drive']);
$owner = strip_tags(@$_POST['owner']);
$engin = strip_tags(@$_POST['engin']);
$image1 = strip_tags(@$_POST['image1']);
$image2 = strip_tags(@$_POST['image2']);
$image3 = strip_tags(@$_POST['image3']);
$image4 = strip_tags(@$_POST['image4']);
$image5 = strip_tags(@$_POST['image5']);
$image6 = strip_tags(@$_POST['image6']);
$colour = strip_tags(@$_POST['colour']);
$gas = strip_tags(@$_POST['gas']);
$fyl = strip_tags(@$_POST['fyl']);
$mileage = strip_tags(@$_POST['mileage']);
$turbo = strip_tags(@$_POST['turbo']);
$cylinder = strip_tags(@$_POST['cylinder']);
$sparekey = strip_tags(@$_POST['sparekey']);
$body = strip_tags(@$_POST['body']);
$tank = strip_tags(@$_POST['tank']);
$history = strip_tags(@$_POST['history']);
$town = strip_tags(@$_POST['town']);
$province = strip_tags(@$_POST['province']);
$year = strip_tags(@$_POST['year']);
$transmission = strip_tags(@$_POST['transmission']);
$doors = strip_tags(@$_POST['doors']);
$availability = strip_tags(@$_POST['availability']);
$registered_date= date("Y-m-d"); //Year - Month - Day
$discription = strip_tags(@$_POST['discription']);;		

$updateinfos = "UPDATE cars SET	phone_number='$phone_number',owner='$owner',brand='$brand',model='$model',doors='$doors',transmission='$transmission',body='$body',cylinder='$cylinder',tank='$tank',mileage='$mileage',engin='$engin',gas='$gas',town='$town',province='$province',gear='$gear',drive='$drive',fyl='$fyl',year='$year',colour='$colour',sparekey='$sparekey',turbo='$turbo',history='$history',discription='$discription' WHERE id='$id'";

//$updateinfos = "UPDATE cars SET brande='$brand',model='$model',transmission='$transmission',category='$category',doors='$doors',availability='$availability',phone_number='$phone_number',vin_number='$vin_number',engin='$engin',gas='$gas',town='$town',province='$province',status='$status' WHERE email='$email' AND id='$id'";

$updateinfo = mysqli_query($dbconn, $updateinfos);
$msg= "You've successfully updated this car's information!";
}
else
{
	//$errormsg="Sorry, unable to update record!";
	
}	

	//Check whether the image has uploaded or nothing
	include ("includes/editpictures.php");
	//==============================
	
	//Profile image uploading
	include ("includes/uploadpictures2.php");
?>


<!-- The page information Starts here --->

    <!-- END section -->
    
    <section class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7">
            <div class="form-wrap">
              <h2 class="mb-5">Listing your other cars</h2>
			  <p /><span style="color:red;"><?php echo $errormsg; ?></span>
			  <p /><span style="color:green;"><?php echo $msg; ?></span>
			  <p /><span style="color:green;"><?php echo $error; ?></span><b />
              <form action="" method="post" >
                  
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name"><h4>Hello <?php echo $name; ?>, you are about to list another car.</h4></label>
                    </div>
                  </div>
				  				  
				  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Car Owner Name</label>
                      <input type="text" id="name" name="owner" required="require" value="<?php echo $owner; ?>" class="form-control py-2">
                    </div>
                  </div>
				  
					<div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Mobile Number of Car Owner</label>
                      <input type="text" id="name" name="phone_number" required="require" value="<?php echo $phone_number; ?>" class="form-control py-2">
                    </div>
                  </div>
				  <hr />
				  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">Brand Name</label>
					  <select name="brand" required="require" class="form-control py-2">
							<option value="<?php echo $brand; ?>"><?php echo $brand; ?></option>
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
                      <label for="name">Model</label>
                      <input type="text" id="name" name="model" required="require" value="<?php echo $model; ?>" class="form-control py-2">
                    </div>
                  </div>
				  
				    <div class="row">
                    <div class="col-md-6 form-group">
					<?php $years = range(1970, strftime("%Y", time())); ?>
                      <label for="name">Year</label>
                      	<select name="year" required="require" value="<?php echo $year; ?>" class="form-control py-2">
						  <option><?php echo $year; ?></option>
						  <?php foreach($years as $year) : ?>
							<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
						  <?php endforeach; ?>
						</select>
					</div>
                    <div class="col-md-6 form-group">
                      <label for="name">Doors</label>
						<select name="doors" required="require" class="form-control py-2">
							<option value="<?php echo $doors; ?>"><?php echo $doors; ?></option>
							<option value="eXtra Cab">Toyota eXtra Cab</option>
							<option value="Club Cab">Isuzu Club Cab</option>
							<option value="Super Cab">Ranger Super Cab</option>
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
                      <label for="name">Transmission</label>
						<select name="transmission" required="require" class="form-control py-2">
							<option value="<?php echo $transmission; ?>"><?php echo $transmission; ?></option>
							<option value="Manual">Manual</option>								
							<option value="Automatic">Automatic</option>
						</select>
					</div>
                  
                    <div class="col-md-6 form-group">
                      <label for="name">Engine Capacity</label>
                      <input type="text" id="name" name="engin" required="require" value="<?php echo $engin; ?>" class="form-control py-2">
                    </div>
                  </div>
				  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">Gas</label>
					  <select name="gas" required="require" class="form-control py-2">
							<option value="<?php echo $gas; ?>"><?php echo $gas; ?></option>								
							<option value="Petrol">Petrol</option>
							<option value="Diesel">Diesel</option>
							<option value="Hybrid">Hybrid</option>
							<option value="Electric">Electric</option>
						</select>
                    </div>
                 
                    <div class="col-md-6 form-group">
                      <label for="name">FUEL TANK CAPACITY</label>
					  <select name="tank" required="require" class="form-control py-2">
							<option value="<?php echo $tank; ?>"><?php echo $tank; ?></option>
							<option value="10L">10L</option>								
							<option value="20L">20L</option>
							<option value="25L">25L</option>
							<option value="30L">30L</option>							
							<option value="35L">35L</option>							
							<option value="40L">40L</option>
							<option value="45L">45L</option>
							<option value="50L">50L</option>
							<option value="55L">55L</option>
							<option value="60L">60L</option>
							<option value="65L">65L</option>
							<option value="70L">70L</option>
							<option value="75L">75L</option>
							<option value="80L">80L</option>
							<option value="85L">85L</option>
							<option value="90L">90L</option>
							<option value="95L">95L</option>
							<option value="100L">100L</option>
						</select>
                    </div>
                  </div>
				  
				   <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">CYLINDER LAYOUT:</label>
                   		<select name="cylinder" required="require" class="form-control py-2">
							<option value="<?php echo $cylinder; ?>"><?php echo $cylinder; ?></option>							
							<option value="i2">i2</option>
							<option value="i3">i3</option>							
							<option value="i4">i4</option>
							<option value="i5">i5</option>
							<option value="i6">i6</option>
							<option value="i8">i8</option>
							<option value="i12">i12</option>
						</select>
				   </div>                  
                    <div class="col-md-6 form-group">
                      <label for="name">Mileage</label>
                      <input type="text" id="name" required="require" name="mileage" value="<?php echo $mileage; ?>" class="form-control py-2">
                    </div>
                  </div>
				  
					<div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">Body Type</label>
						<select name="body" required="require" class="form-control py-2">
							<option value="<?php echo $body; ?>"><?php echo $body; ?></option>
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
                
                    <div class="col-md-6 form-group">
                      <label for="name">Car Colour</label>
					  <select name="colour" required="require" class="form-control py-2">
						<option value="<?php echo $colour; ?>"><?php echo $colour; ?></option>								
							<option value="White">White</option>
							<option value="Silver">Silver</option>
							<option value="Gray">Gray</option>
							<option value="Gold">Gold</option>
							<option value="Yellow">Yellow</option>
							<option value="Red">Red</option>
							<option value="Meroon">Meroon</option>
							<option value="Orange">Orange</option>
							<option value="Green">Green</option>
							<option value="Army Green">Army Green</option>
							<option value="Blue">Blue</option>
							<option value="Brown">Brown</option>
							<option value="Black">Black</option>
						</select>
					
					</div>
                  </div>				  
				   <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">Gears</label>
						<select name="gear" required="require" class="form-control py-2">
							<option value="<?php echo $gear; ?>"><?php echo $gear; ?></option>							
							<option value="3">3</option>
							<option value="4">4</option>							
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
						</select>
					
					</div>
                    <div class="col-md-6 form-group">
                      <label for="name">Wheel Drive</label>
                      <select name="drive" required="require" class="form-control py-2">
							<option value="<?php echo $drive; ?>"><?php echo $drive; ?></option>							
							<option value="Rear">Rear</option>
							<option value="Front">Front</option>				
							<option value="Front-Rear">Front-Rear</option>
							<option value="4X4">4X4</option>
							<option value="4WD">4WD</option>
						    <option value="AWD">AWD</option>
						</select>
                    </div>
                  </div>  
	
					<div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">Province</label>
						<select id="province" onChange="change_province()" name="province" required="require" class="form-control py-2">
							<option><?php echo $province; ?></option>
							<?php
							$poviselect = mysqli_query($dbconn, "SELECT * FROM province");
							while($row=mysqli_fetch_array($poviselect)){
								?>
							<option value="<?php $province = $row["name"]; echo $province; ?>"><?php echo $province; ?></option>
							<?php
							}
							?>
						</select>
					</div>                  
                    <div class="col-md-6 form-group">
                      <label for="name">City/Town</label>
					  <div id="cityname" >
						<input type="text" id="name" required="require" name="town" value="<?php echo $town; ?>"<br>							
					</div>
					</div>
                  </div>				 				  
				  <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">Spare Key?</label>
						<select name="sparekey" required="require" class="form-control py-2">
						<option value="<?php echo $sparekey; ?>"><?php echo $sparekey; ?></option>								
							<option value="Yes">Yes</option>
							<option value="No">No</option>
						</select>			
					</div>                  
                    <div class="col-md-6 form-group">
                      <label for="name">Servicing History</label>
						<select name="history" required="require" class="form-control py-2">
						<option value="<?php echo $history; ?>"><?php echo $history; ?></option>								
							<option value="Yes Complete">Yes Complete</option>
							<option value="Yes incomplete">Yes incomplete</option>
							<option value="Not Available">Not Avaliable</option>
						</select>			
					
					</div>
                  </div>
				  
				   <div class="row">
                    <div class="col-md-6 form-group">
                      <label for="name">Turbocharger</label>
						<select name="turbo" placeholder="Optional" class="form-control py-2">
						<option value="<?php echo $turbo; ?>"><?php echo $turbo; ?></option>								
							<option value="Single Turbo">Single Turbo</option>
							<option value="Turbocharged Stratified Injection (TSI)">Turbocharged Stratified Injection (TSI)</option>
							<option value="Turbocharged Direct Injection (TDI)">Turbocharged Direct Injection (TDI)</option>
							<option value="Sequential Turbos">Sequential Turbos</option>
							<option value="Twin-scroll Turbo">Twin-scroll Turbo</option>
							<option value="VGT Turbo">VGT Turbo</option>
							<option value="Variable Twin-scroll Turbo">Variable Twin-scroll Turbo</option>
							<option value="Electric Turbo">Electric Turbo</option>
							<option value="None">None</option>
						</select>
					
					</div>
                    <div class="col-md-6 form-group">
                      <label for="name">First Year licensing:</label>
                      <input type="text" id="name" required="require" name="fyl" value="<?php echo $fyl; ?>" class="form-control py-2">
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Other Details:</label>
                      <textarea name="discription" id="name" required class="form-control py-2" rows="4"><?php echo $discription; ?></textarea>
                    </div>
                  </div>
				       
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="submit" name="reg" value="Update" class="btn btn-primary px-5 py-2">
                    </div>
				 </div>
                </form>
				<hr />
				<p><h4>Upload Your Car Images</h4></p>
				Please do not upload an image bigger than 1MB.<p />
				<span style="color:red;"><?php echo $imagedup ?></span><br />
				<form action="" method="POST" enctype="multipart/form-data">
				<div class="row">
                    <div class="col-md-6 form-group">
				    <a href="listingmore.php?id=<?php echo $id; ?>&file_name=<?php echo $pic1; ?>&name='Delete'">Remove Image</a><br />
					<img src="<?php echo $pic1; ?>" width="205" />
					<br /><span style="color:red;"><?php echo "$errorpic1" ;?></span><span>Dim: 1000X600MP(1)</span><br />
					<input type= "file" name= "image1">
					</div>
                    <div class="col-md-6 form-group">
					<a href="listingmore.php?id=<?php echo $id; ?>&file_name=<?php echo $pic2; ?>&name='Delete'">Remove Image</a><br />
					<img src="<?php echo $pic2;?>" width="205" />
					<br /><span style="color:red;"><?php echo "$errorpic2" ;?></span><span>Dim: 1000X600MP(2)</span><br />
					<input type= "file" name= "image2">
					</div>
				</div>
					<hr />
				<div class="row">
                    <div class="col-md-6 form-group">	
					<a href="listingmore.php?id=<?php echo $id; ?>&file_name=<?php echo $pic3; ?>&name='Delete'">Remove Image</a><br />
					<img src="<?php echo $pic3;?>" width="205" />
					<br /><span style="color:red;"><?php echo "$errorpic3" ;?></span><span>Dim: 1000X600MP(3)</span><br />
					<input type= "file" name= "image3">
					</div>
					<div class="col-md-6 form-group">
					<a href="listingmore.php?id=<?php echo $id; ?>&file_name=<?php echo $pic4; ?>&name='Delete'">Remove Image</a><br />
					<img src="<?php echo $pic4;?>" width="205" />
					<br /><span style="color:red;"><?php echo "$errorpic4" ;?></span><span>Dim: 1000X600MP(4)</span><br />
					<input type= "file" name= "image4">
					</div>
				</div>
					<hr />
				<div class="row">
                    <div class="col-md-6 form-group">
					<a href="listingmore.php?id=<?php echo $id; ?>&file_name=<?php echo $pic5; ?>&name='Delete'">Remove Image</a><br />
					<img src="<?php echo $pic5;?>" width="205" />
					<br /><span style="color:red;"><?php echo "$errorpic5" ;?></span><span>Dim: 1000X600MP(5)</span><br />
					<input type= "file" name= "image5">
					</div>
                    <div class="col-md-6 form-group">
					<a href="listingmore.php?id=<?php echo $id; ?>&file_name=<?php echo $pic6; ?>&name='Delete'">Remove Image</a><br />
					<img src="<?php echo $pic6;?>" width="205" />
					<br /><span style="color:red;"><?php echo "$errorpic6" ;?></span><span>Dim: 1000X600MP(6)</span><br />
					<input type= "file" multiple="multiple" name= "image6">
					</div>
				</div><br />
					<input type="submit" name="uploadpic" value="Upload Images" class="btn btn-primary px-5 py-2">	
				</form>
				
				<script type="text/javascript">
						function change_province()
						{
							var xmlhttp=new XMLHttpRequest();
							xmlhttp.open("GET","ajax.php?province="+document.getElementById("province").value,false);
							xmlhttp.send(null);
							document.getElementById("cityname").innerHTML=xmlhttp.responseText;
						}
				</script>
				
				<hr /><p />
				<a href="listedcars.php" class="btn btn-primary px-5 py-2"> Save </a> || 
				<a href="includes/checks2.php"> Add more Cars >></a> || 
				<a href="deleteimages.php"> Remove Car Images X</a>
              </div>
          </div>
        </div>
      </div>
    </section>
   <?php include ("includes/footer.php");?>