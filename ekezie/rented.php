<?php include ("./inc/header.php"); ?>
<div class="container site-section element-animate">
            <form action="car-search.php" class="subscribe">
              <div class="form-group">
                <input type="text" class="form-control email" name="search" placeholder="Search for a car..."><p />
                <p />
				<input type="submit" class="btn btn-primary submit" value="Search">
              </div>
            </form>

   <div class="site-section bg-light">
      <div class="container">
        <div class="row">   
			
<?php

if (isset($_POST['search'])){
	$search = mysqli_real_escape_string($dbconn, $_GET['search']);
		$checks = "SELECT * FROM transaction WHERE Email='$email' AND status='Rented'";
		$check = mysqli_query($dbconn, $checks);
			if (mysqli_num_rows($check)){
				//echo "Below is Your Search result for $search<p /><hr><p />";
				while ($get = mysqli_fetch_array($check)){
				$Billing_Date = $get['Billing_Date'];
				$Amount_paid = $get['Amount_paid'];
				$Car_Description =$get['Car_Description'];
				$Car_Name =$get['Car_Name'];
				$Car_Id =$get['Car_Id'];
				$cardt = mysqli_real_escape_string($dbconn, $_POST['search']);
				$query = "SELECT * FROM cars WHERE id='$Car_Id'";
				$check = mysqli_query($dbconn, $query);
				
	
	// For the first picture
	if ($picture1 == "")
	{
		$pic1 = "images/Car.png";
	}
	else
	{
		$pic1 = "userdata/car_images/".$picture1;
	}
	if (!$brand || !$model || $status!='Activated'){
		
	} 
	else{
			echo "<div class='col-md-12 col-lg-6 mb-5'>
                <div class='block-20'>
                  <figure>
                    <a href='Details.php?id=$id'><img src='$pic1' style='border-radius: 10px; border: 2px solid #08d2d4;' alt='' class='img-fluid'/></a>
                  </figure>
                  <div class='text'>
                    <h2 class='heading'>Name :<a href='Details.php?id=$id'> $brand</a></h2>
                    <div class='meta'>
                      Model : <a href='Details.php?id=$id'>$model</a><br />
                      Gas : <a href='Details.php?id=$id'>$gas</a><br />
                      Province : <a href='Details.php?id=$id'>$province</a><br />
                      Status : <a href='Details.php?id=$id'>Verified</a><br />
                    </div>
                  </div>
                </div>
              </div>";
			
			}
				}
			}
		else
		{
			echo "You searched for $search. <p />Please Modify Your search, no car found...";
		}
	}
?>

</div>
</div>
</div>
<?php include ("includes/footer.php");?>