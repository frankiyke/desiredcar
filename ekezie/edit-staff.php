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

//Staffs form
if ($list) {
$name = strip_tags(@$_POST['name']);
$title = strip_tags(@$_POST['title']);
$phone = strip_tags(@$_POST['phone']);//
$email = strip_tags(@$_POST['email']);
$image1 = strip_tags(@$_POST['image1']);
$registered_date= date("Y-m-d"); //Year - Month - Day

//$updateinfos = "UPDATE cars SET	phone_number='$phone_number',owner='$owner',brand='$brand',model='$model',doors='$doors',transmission='$transmission',body='$body',cylinder='$cylinder',tank='$tank',mileage='$mileage',engin='$engin',gas='$gas',town='$town',province='$province',gear='$gear',drive='$drive',fyl='$fyl',year='$year',colour='$colour',sparekey='$sparekey',turbo='$turbo',history='$history',discription='$discription' WHERE id='$id'";

$updateinfos = mysqli_query($dbconn, "INSERT INTO team (id, name, title, email, phone, image) VALUES (NULL, '$name', '$title', '$email', '$phone', '$image')"); 
	 
$updateinfo = mysqli_query($dbconn, $updateinfos);
$msg= "You've successfully added a staff!";
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
                      <label for="name"><h4>Hello <?php echo $name; ?>, you are add a staff to Team page.</h4></label>
                    </div>
                  </div>
				  	 <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Title</label>
					  <select name="tank" required="require" class="form-control py-2">
							<option value="<?php echo $title; ?>"><?php echo $title; ?></option>
							<option value="Marketing Manager">Marketing Manager</option>								
							<option value="Managing Directior">Managing Directior</option>
							<option value="Sales Personal">Sales Personal</option>
							<option value="CEO">CEO</option>							
							<option value="Information Analyst">Information Analyst</option>							
							<option value="Agent">Agent</option>
						</select>
                    </div>
                  </div>			  
				  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Full Name of Staff</label>
                      <input type="text" id="name" name="owner" required="require" value="<?php echo $name; ?>" class="form-control py-2">
                    </div>
                  </div>
				  
					<div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Mobile Number of Staff</label>
                      <input type="text" id="name" name="phone_number" required="require" value="<?php echo $phone; ?>" class="form-control py-2">
                    </div>
                  </div>
				
					
				  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Staff's E-mail</label>
					  <div id="cityname" >
						<input type="text" id="name" required="require" name="town" value="<?php echo $town; ?>"<br>							
					</div>
					</div>
                  </div>	
				       
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="submit" name="reg" value="Save" class="btn btn-primary px-5 py-2">
                    </div>
				 </div>
                </form>
				<hr />
				<p><h4>Upload Staff's Images</h4></p>
				Please do not upload an image bigger than 1MB.<p />
				<span style="color:red;"><?php echo $imagedup ?></span><br />
				<form action="" method="POST" enctype="multipart/form-data">
				    <a href="team.php?id=<?php echo $id; ?>&file_name=<?php echo $image; ?>&name='Delete'">Remove Image</a><br />
					<img src="<?php echo $pic1; ?>" width="200" />
					<br /><span style="color:red;"><?php echo "$errorpic1" ;?></span><span>Dim: 600X650MP(1)</span><br />
					<input type= "file" name= "image1">
					<br /><hr />
					
					<input type= "file" multiple="multiple" name= "image6">
					<br /><hr />
					
					<br /><input type="submit" name="uploadpic" value="Upload Images" class="btn btn-primary px-5 py-2">	
				</form>
				
				<hr />
				<a href="dashboard.php" class="btn btn-primary px-5 py-2">Back to Dashboard </a> || 
				
              </div>
          </div>
        </div>
      </div>
    </section>
   <?php include ("includes/footer.php");?>