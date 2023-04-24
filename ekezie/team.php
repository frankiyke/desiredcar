<?php include ("adminheader.php");
// <-- END header -->
$list = @$_POST['reg'];
$update = @$_POST['update'];
$uploadpic = @$_POST['uploadpic'];
if (isset($_POST['id']) || isset($_GET['id'])){
$id = mysqli_real_escape_string($dbconn, $_GET['id']);
}
else{}
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

if ($update) {
$fullname = strip_tags(@$_POST['fullname']);
$title = strip_tags(@$_POST['title']);
$phone = strip_tags(@$_POST['phone']);//
$email = strip_tags(@$_POST['email']);
$image = strip_tags(@$_POST['image']);
$registered_date= date("Y-m-d"); //Year - Month - Day
$updateinfos = "UPDATE team SET	phone='$phone', name='$fullname', email='$email', title='$title' WHERE id='$id'";
$updateinfo = mysqli_query($dbconn, $updateinfos);
if($updateinfo){
$msg= "You've successfully updated the record!";
}else{
	$msg= "Sorry Unable to update record!";
}
}
else
{
	//$errormsg="Sorry, unable to update record!";	
}

//Deleting image from team
if(isset($_GET['file_name']))
{
 @$id = $_GET['id'];
 @$filename = $_GET['file_name'];
 @unlink($filename);
 $updateinfos = "UPDATE team SET image='' WHERE id='$id'";
 $updateinfo = mysqli_query($dbconn, $updateinfos);
 $error ='The image has been successfully deleted';
 echo'<meta http-equiv="refresh" content="0;url=team.php?id='.$id.'">';
 }
 else{} 
 ?>


<?php
//Staffs form
if ($list) {
$fullname = strip_tags(@$_POST['fullname']);
$title = strip_tags(@$_POST['title']);
$phone = strip_tags(@$_POST['phone']);//
$email = strip_tags(@$_POST['email']);
$image = strip_tags(@$_POST['image']);
$registered_date= date("Y-m-d"); //Year - Month - Day
$updateinfos = mysqli_query($dbconn, "INSERT INTO team (id, name, title, email, phone, image) VALUES (NULL, '$fullname', '$title', '$email', '$phone', '')"); 
$updateinfo = mysqli_query($dbconn, $updateinfos);
$msg= "You've successfully added a staff!";
}
else
{
	//$errormsg="Sorry, unable to update record!";
	
}	

	//Profile image uploading
	include ("includes/staff.php");
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
			echo'    <h2 class="mb-5">Adding Staffs</h2>';}
			else{
			echo" <h2 class='mb-5'>Updating Staff's infomation</h2>";
			}?>
			  <p /><span style="color:red;"><?php echo $errormsg; ?></span>
			  <p /><span style="color:green;"><?php echo $msg; ?></span>
			  <p /><span style="color:green;"><?php echo $error; ?></span><b />
              <form action="" method="post" >
                  
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name"><h4>Hello <?php echo $name; ?>, you are Adding/Editing a staff on Team page.</h4></label>
                    </div>
                  </div>
				  	 <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Title</label>
					  <select name="title" required="require" class="form-control py-2">
							<option value="<?php echo $title; ?>"><?php echo $title; ?></option>
							<option value="Marketing Manager">Marketing Manager</option>
							<option value="Sales Manager">Sales Manager</option>
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
                      <input type="text" id="name" name="fullname" required="require" value="<?php echo $fullname; ?>" class="form-control py-2">
                    </div>
                  </div>
				  
					<div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Mobile Number of Staff</label>
                      <input type="text" id="name" name="phone" required="require" value="<?php echo $phone; ?>" class="form-control py-2">
                    </div>
                  </div>
				
					
				  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Staff's E-mail</label>
					  	<input type="text" id="name" required="require" name="email" value="<?php echo $email; ?>" class="form-control py-2">
                    </div>						
					</div>
									       
                  <div class="row">
                    <div class="col-md-6 form-group">
					<?php
					if(empty($id)){
						echo'<input type="submit" name="reg" value="Save" class="btn btn-primary px-5 py-2">';
					}
					else{
						echo'<input type="submit" name="update" value="UPDATE" class="btn btn-primary px-5 py-2">';
					}
					?>                      
                    </div>
				 </div>
                </form>
				<hr />
			<?php	if ($id){ ?>
				<p><h4>Upload Staff's Images</h4></p>
				Please do not upload an image bigger than 1MB.<p />
				<span style="color:red;"><?php echo $imagedup ?></span><br />
				<form action="" method="POST" enctype="multipart/form-data">
				     <?php 
					$imagesql = "SELECT * FROM team WHERE id='$id'";
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
				else{}
				?>
				
				<a href="dashboard.php" class="btn btn-primary px-5 py-2">Back to Dashboard </a>
				
              </div>
          </div>
        </div>
      </div>
    </section>
   <?php include ("includes/footer.php");?>