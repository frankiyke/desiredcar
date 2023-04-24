<?php include ("adminheader.php");
// <-- END header -->
if (isset($_POST['id']) || isset($_GET['id'])){
$id = mysqli_real_escape_string($dbconn, $_GET['id']);
}
else{}

$save = @$_POST['save'];
$update = @$_POST['update'];
$logoname = strip_tags(@$_POST['logoname']);
$brand = strip_tags(@$_POST['brand']);
$carlogo = strip_tags(@$_POST['image1']);
$errormsg='';
$msg = '';
$error = '';

//Updating section
if ($update) {
        if (isset($_FILES['image1'])) {
		if (((@$_FILES["image1"]["type"]=="image/jpeg" ) || (@$_FILES["image1"]["type"]=="image/png" ) || (@$_FILES["image1"]["type"]=="image/jpg") || (@$_FILES["image1"]["type"]=="image/gif"))&& (@$_FILES["image1"]["size"] < 1048576))//this means 1MB
		{
			$randdirname = $id_number;
			mkdir("../userdata/car-logo/$randdirname");
			if (file_exists("../userdata/car-logo/$randdirname/".@$_FILES["image1"]["name"]))
			{
				$errormsg ="Sorry <b>".@$_FILES["image1"]["name"]."</b> Already exists, please use another image or remove the image from below.";
			}
			else
			{
					move_uploaded_file(@$_FILES["image1"]["tmp_name"],"../userdata/car-logo/$randdirname/".@$_FILES["image1"]["name"]);
					$carlogo = @$_FILES["image1"]["name"];
					$profilepics = "UPDATE diagnosti SET logoname='$logoname', brand='$brand', image='$randdirname/$carlogo' WHERE id='$id'";
					$profilepic = mysqli_query($dbconn, $profilepics);
                    $msg= "You've successfully updated this brand!";
			}
		}
			else
			{
				$error  = "Sorry Unable to upload file, either your Image is larger than 1MB or you Uploaded none Image File!";
			}
		}
}
else
{
	//$errormsg="Sorry, unable to update record!";
	
}

//Image removing section
if(isset($_GET['file_name']))
{
 @$id = $_GET['id'];
 @$filename = $_GET['file_name'];
 @unlink($filename);
 $updateinfos = "UPDATE diagnostic SET image='' WHERE id='$id'";
 $updateinfo = mysqli_query($dbconn, $updateinfos);
 $error ='The image has been successfully deleted';
 echo'<meta http-equiv="refresh" content="0;url=team.php?id='.$id.'">';
 }
 else{} 


//Staffs form
if ($save) {
                    
                    
        if (isset($_FILES['image1'])) {
		if (((@$_FILES["image1"]["type"]=="image/jpeg" ) || (@$_FILES["image1"]["type"]=="image/png" ) || (@$_FILES["image1"]["type"]=="image/jpg") || (@$_FILES["image1"]["type"]=="image/gif"))&& (@$_FILES["image1"]["size"] < 1048576))//this means 1MB
		{
			
			$randdirname = $id_number;
			mkdir("../userdata/car-logo/$randdirname");
			
			if (file_exists("../userdata/car-logo/$randdirname/".@$_FILES["image1"]["name"]))
			{
				$errormsg ="Sorry <b>".@$_FILES["image1"]["name"]."</b> Already exists, please use another image or remove the image from below.";
			}
			else
			{
					move_uploaded_file(@$_FILES["image1"]["tmp_name"],"../userdata/car-logo/$randdirname/".@$_FILES["image1"]["name"]);
					$carlogo = @$_FILES["image1"]["name"];
					$profilepics = "INSERT INTO diagnostic (id, logoname, brand, image) VALUES (NULL, '$logoname', '$brand', '$randdirname/$carlogo')";
					$profilepic = mysqli_query($dbconn, $profilepics);
                    $msg= "You've successfully added a brand!";
					
					
					
			}
		}
			else
			{
				$error  = "Sorry Unable to upload file, either your Image is larger than 1MB or you Uploaded none Image File!";
			}
		}
}
else
{
	//$errormsg="Sorry, unable to update record!";
	
}	

?>


<!-- The page information Starts here --->

    <!-- END section -->
    
    <section class="site-section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7">
            <div class="form-wrap">
			<?php
			if(empty($id)){
			echo'    <h2 class="mb-5">Adding brand</h2>';}
			else{
			echo" <h2 class='mb-5'>Updating brand's infomation</h2>";
			}?>
			  <p /><span style="color:red;"><?php echo $errormsg; ?></span>
			  <p /><span style="color:green;"><?php echo $msg; ?></span>
			  <p /><span style="color:green;"><?php echo $error; ?></span><b />
              <form action="" method="post" enctype="multipart/form-data" >
                	  
				  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Logo Name</label>
                      <input type="text" id="name" name="logoname" value="<?php echo '$logoname';?>" required="require" class="form-control py-2">
                    </div>
                  </div>
				  
				  	 <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="brand">Brands Name</label>
					  <select name="brand" required="require" value="<?php echo '$brand';?>" class="form-control py-2">
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
                  </div>			  
				  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Upload Logo</label>
                      	<?php	if ($id){ ?>
				<p><h4>Upload Staff's Images</h4></p>
				Please do not upload an image bigger than 1MB.<p />
				<span style="color:red;"><?php echo $imagedup ?></span><br />
				<form action="" method="POST" enctype="multipart/form-data">
				     <?php 
					$imagesql = "SELECT * FROM diagnostic WHERE id='$id'";
					$checkimage = mysqli_query($dbconn, $imagesql);
					$imagerow = mysqli_fetch_assoc($checkimage);
					$pic = $imagerow['image'];
					if(empty($pic)){
					
					}
					else
					{
					echo "<a href='team.php?id=$id&file_name=$pic1&name='Delete'>Remove Image</a><br />'";
					}
					?>
					
					<img src="<?php echo $pic1; ?>" width="200" />
					<br /><span style="color:red;"><?php echo "$errorpic1" ;?></span><span>Dim: 600 X 650 MP</span><br />
					<input type= "file" name= "image">
					<input type="submit" name="uploadpic" value="Upload Images" class="btn btn-primary px-5 py-2">	
				</form>
				<hr />
				<?php }
				else{
				    ?>
				    	<input type= "file" multiple="multiple" name= "image1" value="">
						<?php
						if ($id)
						{
						    echo '<input type="submit" name="update" value="Update" class="btn btn-primary px-5 py-2">';
                        }
                        else{
						echo' <input type="submit" name="save" value="Add" class="btn btn-primary px-5 py-2">';
                        }
				}
				?>
						<br />
					</div>
                  </div>
                  
                  
				  
				  </form>				
				<hr />
				<a href="dashboard.php" class="btn btn-primary px-5 py-2">Back to Dashboard </a>
				
              </div>
          </div>
        </div>
      </div>
    </section>
   <?php include ("includes/footer.php");?>