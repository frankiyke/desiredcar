<?php include ("./inc/headerview.php"); ?>
<div class="container site-section element-animate">
    <div class="container">
            <div class="block-17">
                
			<form action="" method="POST" class="d-block d-lg-flex mb-4">
                  
				    <input type="text" class="form-control" name="search" placeholder="Enter Car name, Model, Body type or Brand name...">
                  
                  <input type="submit" class="search-submit btn btn-primary" value="Search">  
                </form>
			</div>

   <div class="site-section bg-light">
      <div class="container">
        <div class="row">   
			
<?php

if (isset($_POST['search'])){
	$search = mysqli_real_escape_string($dbconn, $_POST['search']);
		$checks = "SELECT * FROM cars WHERE status='Available' && brand='$search' OR model='$search' OR body='$search' OR engin='$search' OR procode='$search' OR model Like '%$search%'";
		$check = mysqli_query($dbconn, $checks);
			if (mysqli_num_rows($check)){
				//echo "Below is Your Search result for $search<p /><hr><p />";
				while ($get = mysqli_fetch_array($check)){
				$engin = $get['engin'];
				$province = $get['province'];
				$brand =$get['brand'];
				$gas =$get['gas'];
				$model =$get['model'];
				$picture1 = $get['image1'];
				$id = $get['id'];
				$price = $get['price'];
				$statu = $get['status'];
				
		if($statu == "Available")
		{
				$status='<b style="color:green;">'.$statu.'</b>';
		}
		else{
				$status='<b style="color:red;">'.$statu.'</b>';
		}
	// For the first picture
	if ($picture1 == "")
	{
		$pic1 = "images/Car.png";
	}
	else
	{
		$pic1 = "userdata/car_images/".$picture1;
	}
	if (!$brand || !$model ){
		
	} 
	else{
			echo "<div class='col-md-12 col-lg-6 mb-5'>
                <div class='block-25'>
                  <figure>
                    <a href='Details.php?id=$id'><img src='$pic1' style='border-radius: 10px; border: 2px solid #08d2d4;' title='R $price' alt='' class='img-fluid'/></a>
                  </figure>
                  <div class='text'>
                    <h2 class='heading'>Name :<a href='Details?id=$id'> $brand /R$price</a></h2>
                    <div class='meta'>
                      Model : <a href='Details?id=$id'>$model</a><br />
                      Gas : <a href='Details?id=$id'>$gas</a><br />
                      Province : <a href='Details?id=$id'>$province</a><br />
                      Status : <a href='Details?id=$id'>$status</a><br />
                    </div>
                  </div>
                </div>
              </div>";
			
			}
				}
			}
		else
		{
			echo "<p style='text-align: center'>You searched for $search. Please Modify Your search, no car found...</p>";
		}
	}
?>
</div>
</div>
</div>
<?php include ("./inc/footer.php");?>