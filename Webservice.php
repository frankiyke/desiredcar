<?php include ("./inc/headerview.php");
$msg2 = @$_GET['msg2'].'<br />';
$msg1 = @$_GET['msg1'].'<br />';
?>

    <!-- END header -->

    <section class="site-section element-animate">
			<div class="container">
			
                <div class="row align-items-center">
				<div class="heading">
                <h4 style='text-align: center; color: #00c2d2'>WEB BASED APPLICATION DESIGN</h4>
              </div>
					<p>
					Designing websites for our clients that are Desktop, Tablet and Mobile Friendly is not only our mission, it is our passion! As creative website designers, our aim is to make your business' 
					website look great, and at the same time help design you a website that drives business to your door like a machine!<br />
					We like to think of the websites we design as employees of your company and not just a digital or online flyer. Your website will give you daily feedback, statistics and reports to help you make better online marketing decisions.
					</p>
					<h5 style="color:green;"><?php echo $msg2; ?></h5>
					<h5 style="color:red;"><?php echo $msg1; ?></h5>
					<p />
					<div class="row">
						<div class='col-md-6 col-lg-3'>						
							<div class='media block-6 d-block' style="border: 2px solid  #14e0f1; border-radius:10px; background: #f2feff; color: #000 ">
								<div class='icon mb-3'>
								<p style='text-align: center; color: #00c2d2'><b>Basic Website Package</b></p>
								<ul>
									<li>1 Page Website</li>
									<li>Contact section (with contact form)</li>
									<li>About section</li>
									<li>Basic SEO (Makes your website show up on google)</li>
									<li>.co.za domain registration</li>
									<li>Google Maps listing</li>
									<li>Secure, fast website</li>
								</ul>
									<p style='text-align: center'>Total: R1 299 Once off + R60 Website Hosting Per Month. (Includes business emails)</p>
								</div>
							</div>
						</div>
						<div class='col-md-6 col-lg-3'>						
							<div class='media block-6 d-block' style="border: 2px solid  #14e0f1; border-radius:10px; background: #f2feff; color: #000 ">
								<div class='icon mb-3'>
								<p style='text-align: center; color: #00c2d2'><b>Advanced Website Package</b></p>
									<ul>
									<li>3 Pages Website (Eg: Home, Services, Products)</li>
									<li>Contact section (with contact form)</li>
									<li>Product showcase (Up to 10 products) +R15 per product showcase thereafter</li>
									<li>About section</li>
									<li>Basic SEO (Makes your website show up on google)</li>
									<li>.co.za domain registration</li>
									<li>Google Maps listing</li>
									<li>Secure, fast website</li>
									</ul>
									<p style='text-align: center'>Total: R2 299 Once off + R60 Website Hosting Per Month. (Includes business emails)</p>
								</div>
							</div>
						</div>
						<div class='col-md-6 col-lg-3'>						
								<div class='media block-6 d-block' style="border: 2px solid  #14e0f1; border-radius:10px; background: #f2feff; color: #000 ">
								<div class='icon mb-3'>
								<p style='text-align: center; color: #00c2d2'><b>Professional Website Package</b></p>
								
								<ul>
									<li>5 Pages Website (Eg: Home, Services, Products, About us, Contact us)</li>
									<li>Product showcase (Up to 25 products) +R15 per product showcase thereafter</li>
									<li>Intermediate SEO (Makes your website show up on google)</li>
									<li>.co.za domain registration</li>
									<li>Google Maps listing</li>
									<li>Secure, fast website</li>
								</ul>
									<p style='text-align: center'><b>Total: R3 850 </b>Once off + R60 Website Hosting Per Month. (Includes business emails)</p>
								</div>
							</div>
						</div>
						<div class='col-md-6 col-lg-3'>
						
							<div class='media block-6 d-block' style="border: 2px solid  #14e0f1; border-radius:10px; background: #f2feff; color: #000 ">
								<div class='icon mb-3'>
								<p style='text-align: center; color: #00c2d2'><b>Executive Website Package</b></p>
								<ul>
									<li>8 - 15 Pages Website (Includes 2 Dynamic pages)</li>
									<li>Admin Section(CMS)</li>
									<li>Detailed Product page for each item</li>
									<li>Product showcase (Up to 50 products) +R15 per product showcase thereafter</li>
									<li>Basic SEO (Makes your website show up on google)</li>
									<li>.co.za domain registration</li>
									<li>Google Maps listing</li>
									<li>Secure, fast website</li>
									<li>Manage Basic Contents of your website</li>
								</ul>
									<p style='text-align: center'><b>From: R5 499 </b>Once off + R60 Website Hosting Per Month. (Includes business emails)</p>
								</div>
							</div>
						</div>
					</div>
					<p>
					We plan, create and develop a web-based application such as Inventory Control system, Mini CRM, Share point  etc.<br />
					Desired Web boasts with a great in-house development team. We have already created and maintain custom made web-based applications for small to large business alike.
					We listen carefully to all aspects of your custom code project and determine a needs analysis. With this, we develop a strategic plan to move forward and execute this plan with great precision
					<p /><button class="modal-btn btn btn-primary" style="max-width:100%" >Get a Quote</button>
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
		<h4 class="text-primary heading">Get A Quote for  Website/Web-application</h4>
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
                    <div class="col-md-12 form-group">
                      <select id="subject" name="subject" required="require" class="form-control py-2">
							<option value="">Select Subject</option>
							<option value="Basic Website Package">Basic Website Package</option>
							<option value="Advanced Website Package">Advanced Website Package</option>
							<option value="Professional Website Package">Professional Website Package</option>
							<option value="Executive Website Package">Executive Website Package</option>
							<option value="Web-based Application">Web-based Application</option>
							<option value="Others">Others</option>
						</select>
                    </div>
					<div class="col-md-12 form-group" id="discription">
                      <textarea name="message" placeholder="Detailed description..." required id="message" class="form-control py-2" cols="30" rows="4"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="submit" name="quote" value="Send Message" class="btn btn-primary">
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