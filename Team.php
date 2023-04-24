<?php include ("./inc/headerview.php");?>


	
    <!-- END header -->
<section class="site-section element-animate">
    <div class="container">			             
		<div class="row justify-content-center mb-4 element-animate">
			<h2 class="text-primary heading"><b>Meet Our Team</b></h2>
		</div>
			<div class="row align-items-center">
				<div class="row">
				<?php
					$imagesql = "SELECT * FROM team";
					$checkimage = mysqli_query($dbconn, $imagesql);
					if (mysqli_num_rows($checkimage)){
					//echo "Below is Your Search result for $search<p /><hr><p />";
					$i=0;
					while ($imagerow = mysqli_fetch_array($checkimage)){
					$i++;
					$name = $imagerow['name'];
					$picture1 = $imagerow['image'];
					$phone = $imagerow['phone'];
					$email = $imagerow['email'];
					$title = $imagerow['title'];					
					if ($picture1 == "")
					{
						$pic1 = "images/default.jpg";
					}
					else
					{
						$pic1 = "userdata/team_images/".$picture1;
					}
				
		   	   		echo "<div class='col-md-6 col-lg-3'>
							<div class='media block-6 d-block'>
							<div class='icon mb-3'>
							<img style='width:100%; border-radius:50%; border: 4px solid #14e0f1' title='$title' alt='$name' src='$pic1'/>     
				  			<p style='border: 1px solid #14e0f1; border-radius:5px; background: #c2f6fa ; color: #000 width:auto '>
								Name : $name<br>Title : $title<br>Email: $email
							</p>
							</div>							
						</div> 
					</div>"	;
					}}
					?>					
				</div>
            </div> 
    </div>
</section>
   
    <!-- END section -->
<div class="nonloop-block-11 owl-carousel">

</div>

    
    <!-- END section -->

    


    
      <?php include ("./inc/footer.php");?>