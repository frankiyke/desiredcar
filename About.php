<?php include ("./inc/headerview.php");?>

    <!-- END header -->

    <section class="site-section element-animate">
      <div class="container">
        <div class="row">
          <div class="col-md-6 order-md-2">
            <div class="block-16">
              <figure>
			  <?php
			  
		$check =    "SELECT * FROM cars AS r1 JOIN (SELECT (RAND() * (SELECT MAX(id) FROM cars )) AS id) AS r2 WHERE r1.id >= r2.id AND status='Available' ORDER BY r1.id ASC LIMIT 0, 12";
		$checks = mysqli_query($dbconn, $check);
			if (mysqli_num_rows($checks)){
				//echo "Below is Your Search result for $search<p /><hr><p />";
				$get = mysqli_fetch_array($checks);
				$engin_capacity = $get['engin'];
				$province = $get['province'];
				$year = $get['year'];
				$brand =$get['brand'];
				$gas =$get['gas'];
				$model =$get['model'];
				$picture1 = $get['image1'];
				$ids = $get['id'];
				$price = $get['price'];
				$procode = $get['procode'];
				
	// For the first picture
	if ($picture1 == "")
	{
		$pic1 = "images/Car.png";
	}
	else
	{
		$pic1 = "userdata/car_images/".$picture1;
	}
		
	echo ' <div class="item">
            <div class="block-19" style="border: 2px solid  #14e0f1; border-radius:15px">
                <figure>
                  <a href="Details?id='.$procode.'">
				  <img style="border-radius:12px 12px 0 0" src="'.$pic1.'" alt="Image" class="img-fluid">
				  </a>
                </figure>
                <div class="text">
                  <h2 class="heading"><a href="Details?id='.$procode.'">'.$brand.'</a></h2>
                  <p class="mb-4">MODEL: '.$model. ' ('.$year.') '.', ENGINE: '.$engin_capacity.'<br />
				LOCATION: '.$province.', GAS: '.$gas.'
                  <div class="meta d-flex align-items-center">
                    <div class="number">
                      <span>A random pick for you...</span>
                    </div>
                    <div class="price text-right"><class="mr-3">R'.$price.' <a href="Details?id='.$procode.'"><span>View</span></a></div>
                  </div>
                </div>
              </div>
          </div>
		  ';
		
			}
			?>
			  
              </figure>
			  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- details -->
            <ins class="adsbygoogle"
              style="display:block"
              data-ad-client="ca-pub-1481560478677463"
              data-ad-slot="8493400592"
              data-ad-format="auto"
              data-full-width-responsive="true"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script> <br />
        
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

            </div>
          </div>
          <div class="col-md-6 order-md-1">

            <div class="block-15">
              <div class="heading">
                <h2>About Desired Car</h2>
              </div>
              <div class="text mb-5">
              <p>Welcome to Desiredcar.co.za, we are very delighted to have you visit our website and also taking your time to learn more about our company.  
			  Serving our customers better has always been our priority and to provide quality customer experience with optimum satisfaction.<p />
              <b>Desired Car Pty Ltd  with Reg. Number 2020/788004/07</b> was found in 2020, which happened to be an online platform for both car shoppers/Buyers. We specialize in selling all kinds of cars like: <b>Bakkies, Sedan, Hatchback, SUVs </b>and etc. Buying cars has never been this easy with DesiredCar, no hidden fee no extra cost. We have good number of cars which makes your dream car easy to find, we are also in collaboration with Sprinz Auto and Success Motors. We list used/pre-owned cars on reguler basis if you are not able to see your dream car, please keep on checking. <br />
However, we have a platform where a customer can make a <a href="Request">request </a>and we will get back to the customer with an expected or very similar result within the stipulated time. We will be very eager to welcome your business Ideas/proposals not limited to listing your available cars with us either as a dealer or as an owner. <br />Do you wish to sell your car? If yes, then you are in the right place. We will give you a better offer.
			  </p>
			  
              <p></p>
              
              </div>
              
            </div>

          </div>
          
        </div>
<!-- Ads -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-1481560478677463"
     data-ad-slot="4634030721"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
      </div>
    </section>
    <!-- END section -->
<div class="nonloop-block-11 owl-carousel">

</div>

    
    <!-- END section -->

    


    
      <?php include ("./inc/footer.php");?>