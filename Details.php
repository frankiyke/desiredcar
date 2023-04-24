<?php
include ("inc/headerview.php");

$id = mysqli_real_escape_string($dbconn, $_GET['id']);
$msg = '';		  
$msg1 = '';		
$msg2 = @$_GET['msg2'];		  
$fsave = @$_POST['save'];
$carid = strip_tags(@$_POST['carid']);
$model = strip_tags(@$_POST['model']);
$car_name = strip_tags(@$_POST['car_name']);
$price = @$_POST['price'];
$image = strip_tags(@$_POST['image']);
$cstatus = strip_tags(@$_POST['cstatus']);
$discription = strip_tags(@$_POST['discription']);

?>
    <style>
    
    @media screen and (min-width:950px){		
.ads,.ads-auto{
	margin-left:left;
	width: 100%;
	}
.ads,.ads-auto{
	max-width:100%
	}
}
    
@media screen and (min-width:950px){		
.w3-content,.w3-auto{
	margin-left:left;
	width: 60%;
	}
.w4-content,.w4-auto{
	float: right;
	width: 40%;
	}
.w4-content,.w4-auto{
	max-width:40%
	}

.w3-content. .w3-auto{
	max-width:60%
	}
}

.w3-animate-fading{
	animation:fading 10s infinite
	}@keyframes fading{
		0%{opacity:0}
		50%{opacity:1}
		100%{opacity:0}
	}


.w3-section,.w3-code{
	margin-top:16px!important;
	margin-bottom:16px!important
}

table, td, th{
  border: 3px;
  border-collapse: collapse;
  border-radius: 10px
}
 td {
  padding: 3px;
  text-align: left;
}
th {
  background-color: #08d2d4;
  color: #000;
  padding: 5px;
  text-align: center;
}
#t01 {
  width: 100%;    
  background-color: #f1f1f1;
  color: #000;
  overflow: hidden;
}

.w3-row-padding:after,
.w3-cell-row:before,.w3-cell-row:after,.w3-clear:after,.w3-clear:before,.w3-bar:before,.w3-bar:after{content:"";display:table;clear:both}

.w3-col{padding:0 4px}
.w3-opacity,.w3-hover-opacity:hover{opacity:0.60}
.w3-opacity-off,.w3-hover-opacity-off:hover{opacity:1}
.w3-opacity-max{opacity:0.25}
.w3-opacity-min{opacity:0.75}
.w3-hover-opacity-off:hover{opacity:1}

.w3-col,.w3-half,.w3-third,.w3-twothird,.w3-threequarter,.w3-quarter{float:left;width:100%}
.w3-col.s1{width:8.33333%}.w3-col.s2{width:16.66666%}.w3-col.s3{width:24.99999%}.w3-col.s4{width:32.33333%}
.w3-col.s5{width:41.66666%}.w3-col.s6{width:49.99999%}.w3-col.s7{width:58.33333%}.w3-col.s8{width:66.66666%}
.w3-col.s9{width:74.99999%}.w3-col.s10{width:83.33333%}.w3-col.s11{width:91.66666%}.w3-col.s12{width:99.99999%}
@media (min-width:601px){.w3-col.m1{width:8.33333%}.w3-col.m2{width:16.66666%}.w3-col.m3,.w3-quarter{width:24.99999%}.w3-col.m4,.w3-third{width:33.33333%}
.w3-col.m5{width:41.66666%}.w3-col.m6,.w3-half{width:49.99999%}.w3-col.m7{width:58.33333%}.w3-col.m8,.w3-twothird{width:66.66666%}
.w3-col.m9,.w3-threequarter{width:74.99999%}.w3-col.m10{width:83.33333%}.w3-col.m11{width:91.66666%}.w3-col.m12{width:99.99999%}}
@media (min-width:993px){.w3-col.l1{width:8.33333%}.w3-col.l2{width:16.66666%}.w3-col.l3{width:24.99999%}.w3-col.l4{width:33.33333%}
.w3-col.l5{width:41.66666%}.w3-col.l6{width:49.99999%}.w3-col.l7{width:58.33333%}.w3-col.l8{width:66.66666%}
.w3-col.l9{width:74.99999%}.w3-col.l10{width:83.33333%}.w3-col.l11{width:91.66666%}.w3-col.l12{width:99.99999%}}

@media screen and (min-width:768px){
.w3-content,.w3-auto{
	margin-left:left;
	padding-left:50px;
	width: 60%;
	}
.w4-content,.w4-auto{
	float: right;
	width: 40%;
	
	}
.w4-content,.w4-auto{
	max-width:40%
	}

.w3-content. .w3-auto{
	max-width:60%
	}
}
@media screen and (min-width:320px){.w4-content,.w4-auto{
	padding: 30px 30px 20px;
	
	}
.w4-content{
	max-width:100%;
	}
.w4-auto{
	max-width:100%;
	}

.w3-content,.w3-auto{
	padding: 30px 30px 20px;
	}

.w3-content{
	max-width:100%
	}
.w3-auto{
	max-width:100%
}}	

	</style>
<?php
include ("inc/picturesdetails.php");

$sug = "SELECT * FROM cars WHERE brand='$brand' AND body='$body'";
$sugg = mysqli_query($dbconn, $sug);
$suggest = mysqli_num_rows($sugg);
if(1 == $suggest){
$suggestion = "";
}
elseif(2 == $suggest){ 
$suggestion = "You May also like this car..";
}
elseif(3 <= $suggest){ 
$suggestion = "You May also like these cars..";
}
else{

}
?>
<div class="w4-content">
<div class="row justify-content-center mb-5 element-animate">
            <h3 class="text-primary heading">R <?php echo $price; ?></h3>
			
</div>
  <table id="t01">
  <th>Vehicle Details</th>
  </table><b>
  <table id="t01">
  <tr>
    <td>FIRST LICENSING DATE :</td><td><?php echo $fyl; ?></td>
  </tr>
    <tr>
    <td>MILEAGE :</td><td><?php echo $mileage; ?></td>
   </tr>
   <tr>
    <td>YEAR MODEL :</td><td><?php echo $year; ?></td>
  </tr>
  <tr>
    <td>COLOUR :</td><td><?php echo $colour; ?></td>
  </tr>
    <tr>
    <td>PRODUCT CODE :</td><td><?php echo $procode; ?></td>
   </tr>
  <tr>
    <td>BRANCH :</td><td><?php echo $town; ?></td>
  </tr>
    <tr>
    <td>SPARE KEY :</td><td><?php echo $sparekey; ?></td>
   </tr>
  <tr>
    <td>SERVICE HISTORY :<hr></td><td><?php echo $history; ?><hr></td>
  </tr>
  
  <tr>
      
    <td>OTHER DETAILS :</td><td><pre><em><?php echo $discriptions; ?></em></pre></td>
        
  </tr>
  
  </table><br /><a href="https://wa.me/message/IMXE4WD5Z75WB1" target="_blank"><button class="btn btn-primary" style="max-width:100%" ><img src="images/whatsapp.png" width="30" /> Chat with us on Whatsapp </button></a><p />
	<!-- Enquiry section form  -->
	<?php
	if ($fsave) {
	
	$car_check = "SELECT * FROM booking WHERE email='$email' AND carid='$carid'";
	$car_checks = mysqli_query($dbconn, $car_check);
	$check = mysqli_num_rows($car_checks);

	if($email){
	if ($check == 0){
		$query = mysqli_query($dbconn, "INSERT INTO booking (id, carid, email, car_name, model, price, image1) VALUES (NULL, '$carid', '$email', '$car_name', '$model', '$price', '$image')");
	
		$msg1 =  " Car saved to Favourite".'<br />';
	}
	else
	{
		$msg = " This Car has already been saved by you".'<br />';
		
	}
	}
	else
	{
		//$msg = " Please <a href='Login'>Login</a> or <a href='Register'>register</a> to continue".'<br />';
		echo ("<script>alert('Please login or register to continue')</script>");
		$_SESSION['msg'] = "Please login or register to continue";
	    @header('location: Details.php?id=$id');
	}
}
	?>
	<span style="color:red;"><?php echo $msg; ?></span>
	<span style="color:green;"><?php echo $msg1; ?></span>
	<span style="color:green;"><b><?php echo $msg2; ?></b></span>
	<p /><button class="modal-btn btn btn-primary" style="max-width:100%" >Enquire about this vehicle</button>
	
	<!-- End of Enquiry section form  -->
	
	<!-- Favourite section form  -->
	<form method="post" action="">
	<input type="hidden" id="name" name="carid" value="<?php echo $id; ?>">
	<input type="hidden" id="name" name="email" value="<?php echo $email; ?>">
	<input type="hidden" id="name" name="car_name" value="<?php echo $brand; ?>">
	<input type="hidden" id="name" name="model" value="<?php echo $model; ?>">
	<input type="hidden" id="name" name="price" value="<?php echo $price; ?>">
	<input type="hidden" id="name" name="image" value="<?php echo $pic1; ?>">
	<p /><input type="submit" value="Save This Car  &#10084;&#65039;" name="save"  class='btn btn-primary' style="max-width:100%" >
	</form>
	<!-- End of favourite section form  -->
<p /><h6 class="text-primary heading">CAR STATUS :- <?php echo $status; ?></h6>

	</div>
<div class="row justify-content-center mb-5 element-animate">
          <h3 class="text-primary heading"><?php echo "$brand";?> (<?php echo "$model";?>)</h3>
          
        </div>
		
		<!--Sold tag section--->
    		<!--Sold tag section--->
 
  <div class="w3-content" >
      
  <img class="mySlides" src="<?php echo "$pic1";?>" style="border-radius: 20px; border: 2px solid #08d2d4; width:100%">
  <img class="mySlides" src="<?php echo "$pic2";?>" style="border-radius: 20px; border: 2px solid #08d2d4; width:100%;display:none">
  <img class="mySlides" src="<?php echo "$pic3";?>" style="border-radius: 20px; border: 2px solid #08d2d4; width:100%;display:none">
  <img class="mySlides" src="<?php echo "$pic4";?>" style="border-radius: 20px; border: 2px solid #08d2d4; width:100%;display:none">
  <img class="mySlides" src="<?php echo "$pic5";?>" style="border-radius: 20px; border: 2px solid #08d2d4; width:100%;display:none">
  <img class="mySlides" src="<?php echo "$pic6";?>" style="border-radius: 20px; border: 2px solid #08d2d4; width:100%;display:none">

  <div class="w3-row-padding w3-section">
    <div class="w3-col s2">
      <img class="demo w3-opacity w3-hover-opacity-off" src="<?php echo "$pic1";?>" style="width:100%;cursor:pointer; border-radius: 10px" onclick="currentDiv(1)">
    </div>
    <div class="w3-col s2">
      <img class="demo w3-opacity w3-hover-opacity-off" src="<?php echo "$pic2";?>" style="width:100%;cursor:pointer; border-radius: 10px" onclick="currentDiv(2)">
    </div>
    <div class="w3-col s2">
      <img class="demo w3-opacity w3-hover-opacity-off" src="<?php echo "$pic3";?>" style="width:100%;cursor:pointer; border-radius: 10px" onclick="currentDiv(3)">
    </div>
	<div class="w3-col s2">
      <img class="demo w3-opacity w3-hover-opacity-off" src="<?php echo "$pic4";?>" style="width:100%;cursor:pointer; border-radius: 10px" onclick="currentDiv(4)">
    </div>
	<div class="w3-col s2">
      <img class="demo w3-opacity w3-hover-opacity-off" src="<?php echo "$pic5";?>" style="width:100%;cursor:pointer; border-radius: 10px" onclick="currentDiv(5)">
    </div>
	<div class="w3-col s2">
      <img class="demo w3-opacity w3-hover-opacity-off" src="<?php echo "$pic6";?>" style="width:100%;cursor:pointer; border-radius: 10px" onclick="currentDiv(6)">
      <p />
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
  
  <div class="w3-content" style= "min-width: 96%">
  <table id="t01">
  <th>Vehicle Specifications</th>
  </table>
<table id="t01">
	 <tr>
    <td>CYLINDER:</td><td><?php echo $cylinder; ?></td><td></td>
    <td>ENGINE:</td><td><?php echo $engine; ?></td>
  </tr>
  <tr>
  </tr>
  <tr>
    <td>FUEL TYPE:</td><td><?php echo $gas; ?></td>
    <td></td>
    <td>MAKE:</td><td><?php echo $brand; ?></td>
  </tr>
  <tr>
    <td>NO OF DOORS:</td><td><?php echo $doors; ?></td>
    <td></td>
    <td>TURBO:</td><td><?php echo $turbo; ?></td>
  </tr>
  <tr>
    <td>BODY TYPE:</td><td><?php echo $body; ?></td>
    <td></td>
    <td>DRIVE:</td><td><?php echo $drive; ?></td>
  </tr>
  <tr>
    <td>FUEL TANK CAPACITY:</td><td><?php echo $tank; ?></td>
    <td></td>
    <td>GEARS:</td>
    <td><?php echo $gear; ?></td>
  </tr>
  <tr>
	<td>MODEL:</td>	<td><?php echo $model; ?></td>
	<td></td>
	<td>GEARBOX:</td><td><?php echo $transmission; ?></td>	
  </tr>
</table>
<p>
	   <a href='#'><strong>DISCLAIMER: </strong></a>Although utmost care is taken in supplying accurate data and images, 
	   Desiredcar.co.za, management, employees or sources may not be held responsible for any errors, 
	   omissions or any incorrect price. Desiredcar.co.za reserve the right to change prices at any time or correct any error that may arise without notification. 
	   </p>
<p /><h4 class="text-primary heading"><?php echo @$suggestion; ?><p /></h4>
	<section class="container">
	<div class="row align-items-center">
           <div class="row">
<?php	
	$checks = "SELECT * FROM cars WHERE brand='$brand' AND body='$body' AND status='Available' ORDER BY id DESC Limit 9";
		$check = mysqli_query($dbconn, $checks);
		$num = mysqli_num_rows($check);
		while ($get = mysqli_fetch_array($check)){
				$engin = $get['engin'];
				$year = $get['year'];
				$province = $get['province'];
				$brand =$get['brand'];
				$gas =$get['gas'];
				$model =$get['model'];
				$picture1 = $get['image1'];
				$sid = $get['id'];
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
        <?php 
        if($sid == $id){}else{ ?>
            <div class='media block-6 d-block' style="padding-right:10px">
              <div class='icon mb-3'><?php echo "<a href='Details?id=$sid'><img src='$pic1' height ='80'></a>"; ?></div>
              <div class='media-body'>
				<span style="font-size:12px;">
				    <?php echo 'Model: ' .$model.' '.$year.'<br />'; ?>
					<b>Price: </b>R<?php echo $price." "."<a href='Details?id= $sid'>View</a>"; ?>
					<p />
				</span>
              </div>
            </div> 
       
  <?php }	}	  ?>
       </div> </div>
       <!--Advert-->
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
        </script>
	</section>
	<?php
	 $checks = "SELECT * FROM cars WHERE id='$id'";
		$check = mysqli_query($dbconn, $checks);
		$get = mysqli_fetch_array($check);
				$engin = $get['engin']; 
				$year = $get['year'];
				$province = $get['province'];
				$brand =$get['brand'];
				$gas =$get['gas'];
				$model =$get['model'];
				$picture1 = $get['image1'];
				$sid = $get['id'];
				$price = $get['price'];
				$status = $get['status'];

	?>
	
	<div class="modal-bg">

		<div class="modal">
		<h4 class="text-primary heading"><?php echo $brand;?> | <?php echo $model;?> | (R<?php echo $price;?>)</h4>
			<form action="inforequest" method="POST" style="width: 95%">
                  <div class="row">
                    <div class="col-md-4 form-group">
                      <input type="text" id="name" name="name" value="<?php echo $name;?>" required placeholder="Name" class="form-control py-2">
                    </div>
					<input type="hidden" id="name" name="carid" value="<?php echo $id; ?>">
					<input type="hidden" id="name" name="brand" value="<?php echo $brand ?>">
					<input type="hidden" id="name" name="model" value="<?php echo $model; ?>">
					<input type="hidden" id="name" name="price" value="<?php echo $price; ?>">
                    <div class="col-md-4 form-group">
                      <input type="text" id="phone" name="phone" placeholder="Phone {Optional}" class="form-control py-2">
                    </div>
                    <div class="col-md-4 form-group">
                      <input type="email" id="email" name="email" value="<?php echo $email;?>" required placeholder="E-mail" class="form-control py-2">
                    </div>
					
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <select id="status" onChange="change_province()" name="status" required="require" class="form-control py-2">
							<option value="">Select Subject</option>
							<?php
							$statuselect = mysqli_query($dbconn, "SELECT * FROM carstatus");
							while($row=mysqli_fetch_array($statuselect)){
								?>
							<option value="<?php $status = $row["status"]; echo $status; ?>"><?php echo $status; ?></option>
							<?php
							}
							?>
						</select>
					  
					  
                    </div>
					<div class="col-md-12 form-group" id="discription">
                      <textarea name="message" placeholder="Write Message..." required id="message" class="form-control py-2" cols="30" rows="4"><?php echo $discription; ?></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="submit" name="caraval" value="Send Message" class="btn btn-primary">
                      
                    </div>
                  </div>
                </form>
				  <span class="modal-close">X</span>      
		</div>
	</div>
	
	
	
	<script>
function currentDiv(n) {
  showDivs(slideIndex = n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
  }
  x[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " w3-opacity-off";
}

var modalBtn = document.querySelector('.modal-btn');
var modalBg = document.querySelector('.modal-bg');
var modalClose = document.querySelector('.modal-close');

modalBtn.addEventListener('click', function(){
	modalBg.classList.add('bg-active');
});
 modalClose.addEventListener('click', function(){
	modalBg.classList.remove('bg-active');
});

function change_province()
{
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.open("GET","caravail.php?status="+document.getElementById("status").value,false);
	xmlhttp.send(null);
	document.getElementById("discription").innerHTML=xmlhttp.responseText;
}
</script>
<?php include ("./inc/footer.php");?>