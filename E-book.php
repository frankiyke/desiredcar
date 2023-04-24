<?php include ("./inc/headerview.php");
$msg2 = @$_GET['msg2'].'<br />';
$msg1 = @$_GET['msg1'].'<br />';
?>

    <!-- END header -->
	

    <section class="site-section element-animate">
			<div class="container">			
                <div class="row align-items-center">
				<div class="heading">				
                <h4 style='text-align: center; color: #00c2d2'>Download Our Buyer’s Guide to the 2022 Cars</h4>
              </div>					
					<p>					
					Whether you need a dependable SUV for your daily trips around town or something a little more rugged for your off-road adventures 
					around Pensacola, Crestview, and Fort Walton Beach, FL, the 2021 Ford Bronco family of SUVs can the perfect set of wheels for 
					whatever you need. <br />To learn more, just download a copy of our free eBook!
					</p>
					
					<h5 style="color:green;"><?php echo $msg2; ?></h5>
				<h5 style="color:red;"><?php echo $msg1; ?></h5>
				<br />
					<div class="row">
						
						<div class='col-md-6 col-lg-3'>						
							<div class='media block-6 d-block' style="border: 2px solid  #14e0f1; border-radius:10px; background: #f2feff; color: #000 ">
								<div class='icon mb-3'>
								<p style='text-align: center; color: #00c2d2'><b>Sedan</b>
								<button class="modal-btn btn btn-primary" style="max-width:100%" >Download</button>
								</p>
								</div>
							</div>
						</div>
						<div class='col-md-6 col-lg-3'>						
								<div class='media block-6 d-block' style="border: 2px solid  #14e0f1; border-radius:10px; background: #f2feff; color: #000 ">
								<div class='icon mb-3'>
								<p style='text-align: center; color: #00c2d2'><b>SUV/MUV</b>
								<button class="modal-btn2 btn btn-primary" style="max-width:100%" >Download</button>
								</p>
								
								</div>
							</div>
						</div>
						<div class='col-md-6 col-lg-3'>
						
							<div class='media block-6 d-block' style="border: 2px solid  #14e0f1; border-radius:10px; background: #f2feff; color: #000 ">
								<div class='icon mb-3'>
								<p style='text-align: center; color: #00c2d2'><b>Hatchback</b>
								<button class="modal-btn3 btn btn-primary" style="max-width:100%" >Download</button>
								</p>
								</div>
							</div>
						</div>
					</div>
					<p>
					Although every reasonable effort has been made to ensure the accuracy of the information contained on this site, absolute accuracy cannot be guaranteed. 
					This site, and all information and materials appearing on it, are presented to the user "as is" without warranty of any kind, either express or implied. 
					All vehicles are subject to prior sale. Price does not include applicable tax, title, license, R2599 processing and/or documentation fees, and dealer installed accessories. 
					‡Vehicles shown at different locations are not currently in our inventory (Not in Stock) 
					but can be made available to you at our location within a reasonable date from the time of your request, not to exceed one week.
					</p>
					
				</div>
			</div>
    </section>
    <!-- END section -->
    
    <div style="text-align: center;">
                    
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
   
<div class="modal-bg">

		<div class="modal">
		<h4 class="text-primary heading">Free e-book download</h4>
			<form action="E-books" method="POST" style="width: 98%">
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="text" id="name" name="name" value="<?php echo $name; ?>" required placeholder="Name" class="form-control py-2">
                    </div>
                  		
                    <div class="col-md-6 form-group">
                      <input type="email" id="email" name="email" value="<?php echo $email; ?>" required placeholder="E-mail" class="form-control py-2">
                    </div>      
                  
                    <div class="col-md-6 form-group">
                      <input type="submit" name="e-book" value="Download" class="btn btn-primary">
                    </div>
                  </div>
                </form>
				  <span class="modal-close btn btn-primary" title="Close Quote">X</span>      
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

var modalBtn2 = document.querySelector('.modal-btn2');
var modalBg = document.querySelector('.modal-bg');
var modalClose = document.querySelector('.modal-close');

modalBtn2.addEventListener('click', function(){
	modalBg.classList.add('bg-active');
});
 modalClose.addEventListener('click', function(){
	modalBg.classList.remove('bg-active');
});

var modalBtn3 = document.querySelector('.modal-btn3');
var modalBg = document.querySelector('.modal-bg');
var modalClose = document.querySelector('.modal-close');

modalBtn3.addEventListener('click', function(){
	modalBg.classList.add('bg-active');
});
 modalClose.addEventListener('click', function(){
	modalBg.classList.remove('bg-active');
});
</script>

    
      <?php include ("./inc/footer.php");?>