<?php include ("./inc/headerview.php"); 
$msg3 = @$_GET['msg3'].'<br />';
$msg4 = @$_GET['msg4'].'<br />';
?>
  <p />
  <h1 style="text-align:center">Car Engine Diagnostics</h1>
  
   <div class="container">
  We also have a reputable service and repair centre specialising in well-known car brands.

We exist with the purpose of assisting people who own vehicles out of warranty with any service and repair related queries.

Our fully functional workshop together with the best technicians in the industry, means we are able to provide clients with premium quality services at affordable rates.

Each and every one of our staff members are brand specialists in their own right, so you can put your trust in them to get the job done, quickly and efficiently.
<br />
Below are the listed brands we diagnose:
</div>
    <div style="text-align: center;">
                    <h5 style="color:green;"><?php echo $msg3; ?></h5>
					<h5 style="color:red;"><?php echo $msg4; ?></h5>
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
   
<section class="container">
<div class="row">	
	<?php	
	 //"SELECT * FROM diagnostic";
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
            <div class='media block-6 d-block' style="padding-right:10px">
              <div class='icon mb-3'><?php echo "<img src='$pic1' title='$brand' height ='80'></a>"; ?></div>
            </div> 
  <?php }	  ?>
    <p />
    </div> 
    <button class="modal-btn btn btn-primary" style="max-width:100%" >Book Now</button>
    <!-- Myads Section Starts here -->
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- Myads -->
        <ins class="adsbygoogle"
            style="display:inline-block;width:100%;height:50px;overflow: hidden"
            data-ad-client="ca-pub-1481560478677463"
            data-ad-slot="3851187277"
            data-ad-format="auto"
            data-full-width-responsive="true"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
        <!-- End of Myads Section  -->
    
    </div>    
</section>    

   
<div class="modal-bg">

		<div class="modal">
		<h4 class="text-primary heading">Request for Car diagnostic | 0781470962</h4>
			<form action="web-quote" method="POST" style="width: 98%">
                  <div class="row">
                    <div class="col-md-4 form-group">
                      <input type="text" id="name" name="name" value="<?php echo $name; ?>" required placeholder="Name" class="form-control py-2">
                    </div>
					
                    <div class="col-md-4 form-group">
                      <input type="text" id="phone" name="phone" value="<?php echo $phone_number; ?>" placeholder="Phone {Optional}" class="form-control py-2">
                    </div>
                    <div class="col-md-4 form-group">
                      <input type="email" id="email" name="email" value="<?php echo $email; ?>" required placeholder="E-mail" class="form-control py-2">
                    </div>
					
                  </div>
                  <div class="row">
                    <div class="col-md-4 form-group">
                      <select id="brand" name="brand" required="require" class="form-control py-2">
							<option value="">Select your car Make</option>
							<option value="Acura">Acura</option>        
								<option value="Alfa-Romeo">Alfa-Romeo</option>        
								<option value="Audi">Audi</option>        
								<option value="BMW">BMW</option>        
								<option value="Bentley">Bentley</option>        
								<option value="Bugatti">Bugatti</option>        
								<option value="Buick">Buick</option>        
								<option value="Cadillac">Cadillac</option>        
								<option value="Chevrolet">Chevrolet</option>
								<option value="Chrysler">Chrysler</option>
								<option value="Citroen">Citroen</option>
								<option value="Daewoo">Daewoo</option>
								<option value="Daihatsu">Daihatsu</option>
								<option value="Dodge">Dodge</option>
								<option value="Datsun">Datsun</option>
								<option value="Ferrari">Ferrari</option>
								<option value="Fiat">Fiat</option>
								<option value="Ford">Ford</option>
								<option value="GMC">GMC</option> 
								<option value="GWM">GWM</option>
								<option value="Genesis">Genesis</option>
								<option value="Haval">Haval</option>
								<option value="Honda">Honda</option>  
								<option value="Hyundai">Hyundai</option> 
								<option value="Infiniti">Infiniti</option>
								<option value="Isuzu">Isuzu</option>
								<option value="Jaguar">Jaguar</option>
								<option value="Jeep">Jeep</option> 
								<option value="Kia">Kia</option>
								<option value="Lamborghini">Lamborghini</option>
								<option value="Land Rover">Land Rover</option>
								<option value="Lexus">Lexus</option>
								<option value="Lincoln">Lincoln</option>
								<option value="Lotus">Lotus</option>
								<option value="Maserati">Maserati</option>
								<option value="Mahindra">Mahindra</option>
								<option value="Mazda">Mazda</option>
								<option value="Mercedes-Benz">Mercedes-Ben</option>
								<option value="Mercury">Mercury</option>
								<option value="Mini">Mini</option>
								<option value="Mitsubishi">Mitsubishi</option>
								<option value="Mustang">Mustang</option>
								<option value="Nissan">Nissan</option>
								<option value="Opel">Opel</option>
								<option value="Polestar">Polestar</option>
								<option value="Pontiac">Pontiac</option>
								<option value="Porsche">Porsche</option>
								<option value="Ram">Ram</option>
								<option value="Renault">Renault</option>
								<option value="Rivian">Rivian</option>
								<option value="Rolls-Royce">Rolls-Royce</option>
								<option value="Saab">Saab</option>
								<option value="Saturn">Saturn</option>
								<option value="Scion">Scion</option>
								<option value="Smart">Smart</option>
								<option value="Subaru">Subaru</option>
								<option value="Suzuki">Suzuki</option>
								<option value="Tata">Tata</option>
								<option value="Tesla">Tesla</option>
								<option value="Toyota">Toyota</option>
								<option value="Vinfast">Vinfast</option>
								<option value="Volkswagen">Volkswagen</option>
								<option value="Volvo">Volvo</option>
							<option value="Others">Others</option>
						</select>
                    </div>
                    
                    <div class="col-md-4 form-group">
                      <input type="text" id="model" name="model"  required placeholder="Model (Eg:C-RV)" class="form-control py-2">
                    </div>
                    
                    <div class="col-md-4 form-group">
                      <input type="number" id="cyear" name="cyear" required placeholder="Year Model 2017" min="1990" max="2030" class="form-control py-2">
                    </div>
                    
					<div class="col-md-12 form-group" id="discription">
                      <textarea name="message" placeholder="Detailed description of your car..." required id="message" class="form-control py-2" cols="30" rows="4"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="submit" name="diagnostic" value="Request" class="btn btn-primary">
                    </div>
                  </div>
                </form>
				  <span class="modal-close" title="Close Quote">(X)</span>      
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