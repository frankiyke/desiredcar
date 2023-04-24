<?php 
include ("./inc/headerview.php");
include ("./inc/carscount.php");
?>
	<div class="site-section bg-light">
      <div class="container">
        <div class="row">
          
          <div class="col-md-6 col-lg-8 order-md-2">
            <div class="row">
			
<?php
              if (isset($_GET['category'])){
	$category = mysqli_real_escape_string($dbconn, $_GET['category']);
		$checks = "SELECT * FROM cars WHERE category='$category' AND status='Available'";
		$check = mysqli_query($dbconn, $checks);
			if (mysqli_num_rows($check)){
				//echo "Below is Your Search result for $search<p /><hr><p />";
				while ($get = mysqli_fetch_array($check)){
				$engin_capacity = $get['engin_capacity'];
				$province = $get['province'];
				$brand =$get['brand_name'];
				$price =$get['price'];
				$model =$get['model'];
				$picture1 = $get['image1'];
				$id = $get['id'];
	
	// For the first picture
	if ($picture1 == "")
	{
		$pic1 = "images/Car.png";
	}
	else
	{
		$pic1 = "userdata/car_images/".$picture1;
	}
	if (!$brand || !$model){
		
	} 
	else{
			echo "<div class='col-md-12 col-lg-6 mb-5'>
                <div class='block-20'>
                  <figure>
                    <a href='Details?id=$id'><img src='$pic1' style='border-radius: 10px; border: 2px solid #08d2d4;' alt='' class='img-fluid'/></a>
                  </figure>
                  <div class='text'>
                    <h2 class='heading'>Brand :<a href='Details?id=$id'> $brand</a></h2>
                    <div class='meta'>
                      Model : <a href='Details?id=$id'>$model</a><br />
                      Price : <a href='Details?id=$id'>R $price</a><br />
                      Province : <a href='Details?id=$id'>$province</a><br />
                    </div>
                  </div>
                </div>
              </div>";
			
			}
				}
			}
		else
		{
			die ("There is no avaliable ".$category."s for now.");
		}
	}
?>
              
<!--Rent a car section code-->
<?php
$result_per_page = 8;

	$checks = "SELECT * FROM cars WHERE status='Available'";
		$check = mysqli_query($dbconn, $checks);
		$count = mysqli_num_rows($check);
			$number_of_pages = ceil($count/$result_per_page);

	if (!isset($_GET['page']))
	{
	$page = 1;
	}
	else
	{
		$page = $_GET['page'];
	}

	$num = ($page-1)*$result_per_page;
	
	$gethem = "SELECT * FROM cars WHERE status='Available' LIMIT $num,$result_per_page";
	$check = mysqli_query($dbconn, $gethem);
			if (mysqli_num_rows($check)){
				//echo "Below is Your Search result for $search<p /><hr><p />";
				$i=0;
				while ($get = mysqli_fetch_array($check)){
				$i++;
				$engin_capacity = $get['engin'];
				$province = $get['province'];
				$brand =$get['brand'];
				$price =$get['price'];
				$model =$get['model'];
				$picture1 = $get['image1'];
				$id = $get['id'];
	
	// For the first picture
	if ($picture1 == "")
	{
		$pic1 = "images/Car.png";
	}
	else
	{
		$pic1 = "userdata/car_images/".$picture1;
	}
	
	if (!$brand || !$model){
		
	} 
			  else{
			echo "<div class='col-md-12 col-lg-6 mb-5'>
                <div class='block-20'>
                  <figure>
                    <a href='Details?id=$id'><img src='$pic1' style='border-radius: 10px; border: 2px solid #08d2d4;' alt='' class='img-fluid'/></a>
                  </figure>
                  <div class='text'>
                    <h2 class='heading'>Brand :<a href='Details?id=$id'> $brand</a></h2>
                    <div class='meta'>
                      Model : <a href='Details?id=$id'>$model</a><br />
                      Price : <a href='Details?id=$id'>R $price</a><br />
                      Province : <a href='Details?id=$id'>$province</a><br />
                    </div>
                  </div>
                </div>
              </div>";
			
			}
				}
			}
		else
		{
			echo "There is no avaliable car for now";
		}
?>
	<!--End of Rent a car section code-->
              

              
            </div>

            <div class="row mb-5">
              <div class="col-md-12 text-center">
                <div class="block-27">
                  <ul>
                    <li><a href="Buycar?page=<?php echo --$page; ?>">&lt;</a></li>					
					<?php

					for ($page=1;$page<=$number_of_pages;$page++)
						{
							?><li><a href="Buycar?page=<?php echo $page; ?>"><?php echo $page; ?></a></li><?php
						}
					?>
					<li><a href="Buycar?page=<?php echo $page++; ?>">&gt;</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- END content -->
          <div class="col-md-6 col-lg-4 order-md-1">

             <div class="block-24 mb-5">
              <h3 class="heading">Body Type</h3>
              <ul>
                <li><a href="Category?category=Bakkie">Bakkie<span><?php echo $bakkie;?></span></a></li>
                <li><a href="Category?category=Truck">Truck<span><?php echo $truck;?></span></a></li>
                <li><a href="Category?category=Convertible">Convertible<span><?php echo $convertible;?></span></a></li>
                <li><a href="Category?category=Coupe">Coupe<span><?php echo $coupe;?></span></a></li>
                <li><a href="Category?category=Van">Van<span><?php echo $van;?></span></a></li>
                <li><a href="Category?category=MUV/SUV">MUV/SUV<span><?php echo $suv;?></span></a></li>
                <li><a href="Category?category=Sedan">Sedan<span><?php echo $sedan;?></span></a></li>
                <li><a href="Category?category=Wagon">Wagon<span><?php echo $wagon;?></span></a></li>
                <li><a href="Category?category=hatchback">Hatchback<span><?php echo $hatchback;?></span></a></li>
              </ul>
            </div>

            
           <div class="block-26">
              <h3 class="heading">Populer Brands</h3>
              <ul>
                <?php 
                $checks = "SELECT * from diagnostic ORDER BY brand";
		        $check = mysqli_query($dbconn, $checks);
		        $num = mysqli_num_rows($check);
		        while ($get = mysqli_fetch_array($check)){
				$brand =$get['brand'];
				$logoname =$get['logoname'];
				$picture1 = $get['image'];
            	if ($picture1 == "")
            	{
	        	$pic1 = "images/brandlogo.png";
                	}
            	else
            	{
	            	$pic1 = "userdata/car-logo/".$picture1;
            	}
             ?>
             
            <li><a href="Category?carname=<?php echo $brand; ?>"><?php echo "<img src='$pic1' title='$brand' height ='52'>"; ?></a></li>
            <?php }	  ?>
              </ul>
            </div>


          </div>
          <!-- END Sidebar -->
        </div>
      </div>
    </div>

    
    
  <?php include ("./inc/footer.php");?>