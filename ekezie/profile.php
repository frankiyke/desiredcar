<?php 
include ("adminheader.php");

	$id = mysqli_real_escape_string($dbconn, $_GET['id']);

$msg = '';		  
$fsave = @$_POST['save'];
$carid = strip_tags(@$_POST['carid']);
$model = strip_tags(@$_POST['model']);
$car_name = strip_tags(@$_POST['car_name']);
$price = @$_POST['price'];
$image = strip_tags(@$_POST['image']);

if ($fsave) {
	
	$car_check = "SELECT * FROM booking WHERE email='$email' AND carid='$carid'";
	$car_checks = mysqli_query($dbconn, $car_check);
	$check = mysqli_num_rows($car_checks);

}
?>

    <style>
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
include ("../inc/picturesdetails.php");
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
    <td>SERVICE HISTORY :</td><td><?php echo $history; ?></td>
  </tr>
  </table></b>
	<br /><a href='' class='btn btn-primary' style="max-width:100%">Enquire about this vehicle</a><p />
	<p /><a href='' class='btn btn-primary' style="max-width:100%">Book for a Taste Drive</a>
	<form method="post" action="">
	<input type="hidden" id="name" name="carid" value="<?php echo $id; ?>">
	<input type="hidden" id="name" name="email" value="<?php echo $email; ?>">
	<input type="hidden" id="name" name="car_name" value="<?php echo $brand; ?>">
	<input type="hidden" id="name" name="model" value="<?php echo $model; ?>">
	<input type="hidden" id="name" name="price" value="<?php echo $price; ?>">
	<input type="hidden" id="name" name="image" value="<?php echo $pic1; ?>">
	<p /><input type="submit" value="Save This Car" name="save" class='btn btn-primary' style="max-width:100%" ><?php echo $msg; ?>
	</form>
	
	<p /><a href='' class='btn btn-primary' style="max-width:100%">Buy This Car</a>

</div>
<div class="row justify-content-center mb-5 element-animate">
          <h3 class="text-primary heading"><?php echo "$brand";?><?php echo "$model";?></h3>
          
        </div>
  <div class="w3-content" >
      
  <img class="mySlides" src="../<?php echo "$pic1";?>" style="border-radius: 20px; border: 2px solid #08d2d4; width:100%">
  <img class="mySlides" src="../<?php echo "$pic2";?>" style="border-radius: 20px; border: 2px solid #08d2d4; width:100%;display:none">
  <img class="mySlides" src="../<?php echo "$pic3";?>" style="border-radius: 20px; border: 2px solid #08d2d4; width:100%;display:none">
  <img class="mySlides" src="../<?php echo "$pic4";?>" style="border-radius: 20px; border: 2px solid #08d2d4; width:100%;display:none">
  <img class="mySlides" src="../<?php echo "$pic5";?>" style="border-radius: 20px; border: 2px solid #08d2d4; width:100%;display:none">
  <img class="mySlides" src="../<?php echo "$pic6";?>" style="border-radius: 20px; border: 2px solid #08d2d4; width:100%;display:none">

  <div class="w3-row-padding w3-section">
    <div class="w3-col s2">
      <img class="demo w3-opacity w3-hover-opacity-off" src="../<?php echo "$pic1";?>" style="width:100%;cursor:pointe; border-radius: 10px" onclick="currentDiv(1)">
    </div>
    <div class="w3-col s2">
      <img class="demo w3-opacity w3-hover-opacity-off" src="../<?php echo "$pic2";?>" style="width:100%;cursor:pointer; border-radius: 10px" onclick="currentDiv(2)">
    </div>
    <div class="w3-col s2">
      <img class="demo w3-opacity w3-hover-opacity-off" src="../<?php echo "$pic3";?>" style="width:100%;cursor:pointer; border-radius: 10px" onclick="currentDiv(3)">
    </div>
	<div class="w3-col s2">
      <img class="demo w3-opacity w3-hover-opacity-off" src="../<?php echo "$pic4";?>" style="width:100%;cursor:pointer; border-radius: 10px" onclick="currentDiv(4)">
    </div>
	<div class="w3-col s2">
      <img class="demo w3-opacity w3-hover-opacity-off" src="../<?php echo "$pic5";?>" style="width:100%;cursor:pointer; border-radius: 10px" onclick="currentDiv(5)">
    </div>
	<div class="w3-col s2">
      <img class="demo w3-opacity w3-hover-opacity-off" src="../<?php echo "$pic6";?>" style="width:100%;cursor:pointer; border-radius: 10px" onclick="currentDiv(6)">
    </div>
	</div>
  </div>
  <div class="w3-content" style= "min-width: 96%">
  <table id="t01">
  <th>Vehicle Specifications</th>
  </table>
<table id="t01">
	 <tr>
    <td>CYLINDER LAYOUT:</td><td><?php echo $cylinder; ?></td><td></td>
    <td>ENGINE CAPACITY:</td><td><?php echo $engine; ?></td>
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
    <td>TURBOCHARGER:</td><td><?php echo $turbo; ?></td>
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
</script>
    
    <?php include ("includes/footer.php");?>