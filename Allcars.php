<?php include ("./inc/headerview.php");
$result_per_page = 36;

$checks = "SELECT * FROM cars WHERE status='Available'";
		$check = mysqli_query($dbconn, $checks);
		$num = mysqli_num_rows($check);
		$count = mysqli_num_rows($check);
		$number_of_pages = ceil($count/$result_per_page);
		
	
	if (!isset($_GET['page']) || ($_GET['page'])<1)
	{
	$page = 1;
	}
	else
	{
		$page = $_GET['page'];
	}
	
	$num = ($page-1)*$result_per_page;
	
	$id = mysqli_real_escape_string($dbconn, @$_POST['id']);
$msg = '';		  
$msg1 = '';		
$msg2 = @$_GET['msg2'].'<br />';		  
$fsave = @$_POST['save'];
$carid = strip_tags(@$_POST['carid']);
$model = strip_tags(@$_POST['model']);
$car_name = strip_tags(@$_POST['car_name']);
$price = @$_POST['price'];
$image = strip_tags(@$_POST['image']);
$cstatus = strip_tags(@$_POST['cstatus']);
$discription = strip_tags(@$_POST['discription']);

if ($fsave) {
	
	$car_check = "SELECT * FROM booking WHERE email='$email' AND carid='$carid'";
	$car_checks = mysqli_query($dbconn, $car_check);
	$check = mysqli_num_rows($car_checks);

	if($email){
	if ($check == 0){
		$query = mysqli_query($dbconn, "INSERT INTO booking (id, carid, email, car_name, model, price, image1) VALUES (NULL, '$carid', '$email', '$car_name', '$model', '$price', '$image')");
		echo '<script language="javascript">';
		echo "alert('Car Added to your wishlist')";
		echo '</script>';
	}
	else
	{
		echo '<script language="javascript">';
		echo "alert('This car has already been added to your wishlist!')";
		echo '</script>';
	}
	}
	else
	{
		echo '<script language="javascript">';
		echo "alert('Please Login or Register to add a car to your wishlist!')";
		echo '</script>';
	}
}
?>
<section class="site-section element-animate">
      <div class="container">			             
		<div class="row justify-content-center mb-4 element-animate">
				<h2 class="text-primary heading"><b>All Vehicles for sale</b></h2>
			</div>
			<div class="block-17"><p>		
                <a href="Allcars?search=Convertible" class="search-submit btn btn-primary" style="padding: 1px">Convertible</a>
				<a href="Allcars?search=Hatchback" class="search-submit btn btn-primary" style="padding: 1px">Hatchback</a>
                <a href="Allcars?search=Sedan" class="search-submit btn btn-primary" style="padding: 1px">Sedan</a>
                <a href="Allcars?search=Bakkie" class="search-submit btn btn-primary" style="padding: 1px">Bakkie</a>
                <a href="Allcars?search=Truck" class="search-submit btn btn-primary" style="padding: 1px">Truck</a>
                <a href="Allcars?search=Coupe" class="search-submit btn btn-primary" style="padding: 1px">Coupe</a>
                <a href="Allcars?search=Minivan/Van" class="search-submit btn btn-primary" style="padding: 1px">Minivan/Van</a>
                <a href="Allcars?search=SUV" class="search-submit btn btn-primary" style="padding: 1px"> SUV </a>
                <a href="Allcars?search=Wagon" class="search-submit btn btn-primary" style="padding: 1px">Wagon</a>	
                <a href="Allcars" class="search-submit btn btn-primary" style="padding: 1px">All Cars</a>
                <a href="Request" class="search-submit btn btn-primary" style="padding: 1px">Request a Car</a>
                </p>	
				<form action="Car-search" method="POST" class="d-block d-lg-flex mb-4">
                    <input type="text" class="form-control" name="search" placeholder="Enter Car name, model or brand name...">
					<input type="submit" class="search-submit btn btn-primary" value="Search">  
                </form>
			</div>
        <div class="row align-items-center">
           <div class="row">
			  
		  <?php 
		  $search = @$_GET['search'];
		  if ($search){
			$gethem = "SELECT * FROM cars WHERE body='$search' AND status='Available' ORDER BY id DESC LIMIT $num,$result_per_page";
			$check = mysqli_query($dbconn, $gethem);
			if (mysqli_num_rows($check)){
				//echo "Below is Your Search result for $search<p /><hr><p />";
				$i=0;
				while ($get = mysqli_fetch_array($check)){
				$i++;
				$engin = $get['engin'];
				$year = $get['year'];
				$province = $get['province'];
				$brand =$get['brand'];
				$gas =$get['gas'];
				$model =$get['model'];
				$picture1 = $get['image1'];
				$id = $get['id'];
				$price = $get['price'];
				$status = $get['status'];
	if ($picture1 == "")
	{
		$pic1 = "images/Car.png";
	}
	else
	{
		$pic1 = "userdata/car_images/".$picture1;
	}				
				?>
          <div class='col-md-6 col-lg-3'>
            <div class='media block-6 d-block' style="border: 3px solid  #14e0f1; border-radius:10px; background: #c2f6fa ; color: #000 ">
              <div class='icon mb-3'><?php echo "<a href='Details?id=$id'><img style='border-radius:8px 8px 0 0' title='$brand $model' src='$pic1' width =100%></a>"; ?>
                  <b><?php echo $brand." "."$model"; ?></b><br />
				<b>Price: </b>R<?php echo $price." "."<a href='Details?id= $id'>VIEW </a>".
				'<form method="post" action="">
				<input type="hidden" id="name" name="carid" value='.$id.'>
				<input type="hidden" id="name" name="email" value='.$email.'>
				<input type="hidden" id="name" name="car_name" value='.$brand.'>
				<input type="hidden" id="name" name="model" value='.$model.'>
				<input type="hidden" id="name" name="price" value='.$price.'>
				<input type="hidden" id="name" name="image" value='.$pic1.'>
				<input type="submit" title="Add this car to your wishlist" value="&#10084;&#65039;" name="save" class="btn">
				</form>'; ?>
              </div>
            </div> 
          </div>
		  <?php }	}  }		 
		  else{
		  $gethem = "SELECT * FROM cars WHERE status='Available' ORDER BY id DESC LIMIT $num,$result_per_page";
			$check = mysqli_query($dbconn, $gethem);
			if (mysqli_num_rows($check)){
				//echo "Below is Your Search result for $search<p /><hr><p />";
				$i=0;
				while ($get = mysqli_fetch_array($check)){
				$i++;
				$engin = $get['engin'];
				$year = $get['year'];
				$province = $get['province'];
				$brand =$get['brand'];
				$gas =$get['gas'];
				$model =$get['model'];
				$picture1 = $get['image1'];
				$id = $get['id'];
				$price = $get['price'];
				$status = $get['status'];
	if ($picture1 == "")
	{
		$pic1 = "images/Car.png";
	}
	else
	{
		$pic1 = "userdata/car_images/".$picture1;
	}
				
				?>
          <div class='col-md-6 col-lg-3'>
            <div class='media block-6 d-block' style="border: 3px solid  #14e0f1; border-radius:10px; background: #c2f6fa ; color: #000 ">
              <div class='icon mb-3'><?php echo "<a href='Details?id=$id'><img style='border-radius:8px 8px 0 0' title='$brand $model' src='$pic1' width =100%></a>"; ?>
                  <b><?php echo $brand." "."$model"; ?></b><br />
				<b>Price: </b>R<?php echo $price." "."<a href='Details?id= $id'>VIEW </a>".
				'<form method="post" action="">
				<input type="hidden" id="name" name="carid" value='.$id.'>
				<input type="hidden" id="name" name="email" value='.$email.'>
				<input type="hidden" id="name" name="car_name" value='.$brand.'>
				<input type="hidden" id="name" name="model" value='.$model.'>
				<input type="hidden" id="name" name="price" value='.$price.'>
				<input type="hidden" id="name" name="image" value='.$pic1.'>
				<input type="submit" title="Add this car to your wishlist" value="&#10084;&#65039;" name="save" class="btn">
				</form>'; ?>
              </div>
            </div> 
          </div>
		  <?php }	}  }?>
        </div>
      </div>
	  
			<div class="row mb-5">
              <div class="col-md-12 text-center">
                <div class="block-27">
                  <ul>
				  <?php
				  if($page>1){
					  echo'<li><a href="Allcars?page='.($page-1).'"> &lt;</a></li>';
				  }
						for ($page=1;$page<=$number_of_pages;$page++)
						{
							?><li><a href="Allcars?page=<?php echo $page; ?>&search=<?php echo $search; ?>"><?php echo $page." "; ?></a></li><?php
						}
						
						 if($page<1){
					  echo'<li><a href="Allcars?page='.($page+1).'">&gt; </a></li>'.'<p >';
				  }				
				  if(@$_GET['page']>=1){
				  echo"<br>PAGE ". $_GET['page'];
				  }else{}
					?>							
                  </ul>
                  <?php echo"<br /><p>";?>
                </div>
                            <!--Ads Section starts here-->
    
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Myads -->
        <ins class="adsbygoogle"
            style="display:inline-block;width:100%;height:90px;overflow: hidden"
            data-ad-client="ca-pub-1481560478677463"
            data-ad-slot="3851187277"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>

    <!--End of Ads Section here-->
              </div>
              </div>
            </div>
    </section>
   <?php include ("inc/footer.php");?>