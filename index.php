<?php include ("./inc/headerview.php");

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
		echo ("<script>alert('Car Added to your wishlist')</script>");
	}
	else
	{
		echo ("<script>alert('This car has already been added to your wishlist!')</script>");
	}
	}
	else
	{
		echo ("<script>alert('Please Login or Register to add a car to your wishlist!')</script>");
	}
}
?>
  <!-- END header -->
    <section class="site-hero overlay" data-stellar-background-ratio="0.5" style="background-image: url(images/big_image_2.jpg);">
      <div class="container">
        <div class="row align-items-center justify-content-center site-hero-inner">
          <div class="col-md-10">
  
            <div class="mb-5 element-animate">
              <div class="block-17">
                <h2 class="heading text-center mb-4"><b>Find your desired Car</b></h2>
                <form action="Car-search" method="POST" class="d-block d-lg-flex mb-4">
                  <div class="fields d-block d-lg-flex">
				    <input type="text" class="form-control" name="search" placeholder="Enter Car name, model or brand name...">
                  </div>
                  <input type="submit" class="search-submit btn btn-primary" value="Search">  
                </form>
                 <h4 class="heading text-center mb-4"><b>You are welcome if you wish to use finance</b></h4>
                <p class="text-center mb-5"><b>Checkout free ebook for 2022 upcoming cars, <a href='E-book'>download </a> for free</b></p>
                 <?php if (@$_SESSION["user_login"]){
				
						echo'<p class="text-center"><a href="Buycar" class="btn py-3 px-5">Buy a car Now</a></p>';
						}
					else{
						echo'<p class="text-center"><a href="Register" class="btn py-3 px-5">Register Now</a></p>';
					} 					
				?>
				
              </div>
              
            </div>
           
          </div>
         
        </div>
         
      </div>
      
    </section>
    <!-- END section -->   

    <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 element-animate">
          
            <h2 class="text-primary heading">We will provide you with that your dream car with cash or Finance, <a href='Register'>Sign-up</a> today and make your online <a href="Request">request</a> and we will call you.</h2>
           
           <p>We add cars on daily or weekly basis as the case may be, please keep on checking you will surely find that your dream car, alternatively you can make your <a href="Request">Request </a> today</p>
           
            <a href="Dealership" class="btn btn-primary py-2 px-4">List Your Car</a><pre> </pre><a href="Request" class="btn btn-primary py-2 px-4">Request a Car</a>
        </div>
      </div>
      <div style="text-align: center;">
        <!-- Myads Section Starts here -->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Myads -->
        <ins class="adsbygoogle"
            style="display:inline-block;width:100%;height:40px;overflow: hidden"
            data-ad-client="ca-pub-1481560478677463"
            data-ad-slot="3851187277"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <!-- End of Myads Section  -->
		</div>
<?php		

$checks = "SELECT * FROM cars WHERE status='Available' ORDER BY id DESC LIMIT 24";
		$check = mysqli_query($dbconn, $checks);
		$num = mysqli_num_rows($check);
?>		
    
    <!-- END section -->
	<section class="site-section element-animate">
      <div class="container">
        <div class="row align-items-center">
           <div class="row">
			  
		  <?php while ($get = mysqli_fetch_array($check)){
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
            <div class='media block-6 d-block'style="border: 3px solid  #14e0f1; border-radius:10px; background: #dcf8fb; color: #000">
              <div class='icon mb-3'><?php echo "<a href='Details?id=$id'><img src='$pic1' style='border-radius:8px 8px 0 0' title='$brand $model' width =100%></a>"; ?></span></div>
              <div class='media-body'>
               <?php echo '<form method="post" action="">
				<input type="hidden" id="name" name="carid" value='.$id.'>
				<input type="hidden" id="name" name="email" value='.$email.'>
				<input type="hidden" id="name" name="car_name" value='.$brand.'>
				<input type="hidden" id="name" name="model" value='.$model.'>
				<input type="hidden" id="name" name="price" value='.$price.'>
				<input type="hidden" id="name" name="image" value='.$pic1.'>
				<b>'. $brand." "."$model </b>".'<input type="submit" title="Add this car to your wishlist" value="&#10084;&#65039;" name="save" class="btn">'; ?></form>
               <b>Price: R </b><?php echo $price." "."<a href='Details?id= $id'>View Details</a>"; ?>
              </div>
            </div> 
          </div>
		  <?php } ?>
        </div>			
	  </div>			
    </section>
			<div class="row justify-content-center mb-5 element-animate">
			<a href="Allcars?page=2" class="btn btn-primary py-2 px-4">See more Cars...</a>
			</div>
	<!---End of cars section---->  
	
        <div style="text-align: center;">
        <!-- Myads Section Starts here -->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Myads -->
        <ins class="adsbygoogle"
            style="display:inline-block;width:100%;height:40px;overflow: hidden"
            data-ad-client="ca-pub-1481560478677463"
            data-ad-slot="3851187277"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <!-- End of Myads Section  -->
		</div>
		
		
	<div class="py-5 block-22" >
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 mb-4 mb-md-0 pr-md-5">
            <h2 class="heading">Buy used and pre-owen cars on DesiredCar.co.za</h2>
            <p>See our list of the best used cars and save some serious cash without compromising on features or performance.</p>
         
		  </div>
          <div class="col-md-6">
            <form action="Car-search" method='POST' class="subscribe">
              <div class="form-group">
                <input type="text" class="form-control email" name="search" placeholder="Search for a car...">
                <input type="submit" class="btn btn-primary submit" value="Search">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
 
   <?php include ("./inc/footer.php");?>