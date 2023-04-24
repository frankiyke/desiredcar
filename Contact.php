<?php include ("./inc/headerview.php");
$alert2=@$_GET['C'];
$alert=@$_GET['A'];
?>

    <!-- END header -->

      <div class="container">
        <div class="row align-items-center justify-content-center site-hero-sm-inner">
          <div class="col-md-7 text-center">
  <p />
              <h1 class="mb-2">Contact Us</h1>
              <a href="index">Home</a> <span class="sep ion-android-arrow-dropright px-2"></span>  <span class="current">Contact Us</span>
			  		  <br /> Please let us know what you would like to do so we can help meet your needs.<br /><?php echo $alert2; ?>
            <?php echo $alert; ?>
          </div>
        </div>
      </div>

    <!-- END section -->

    <section class="site-section element-animate">
      <div class="container">
        <div class="row">
          <div class="col-md-8 pr-md-5">
            <form action="Mail" method="post" onsubmit="check_if_capcha_is_filled">
                  <div class="row">
                    <div class="col-md-4 form-group">
                      <label for="name">Name</label>
                      <input type="text" id="name" name="fname" required class="form-control py-2">
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="phone">Phone</label>
                      <input type="text" id="phone" name="phone" placeholder="Optinal" class="form-control py-2">
                    </div>
                    <div class="col-md-4 form-group">
                      <label for="email">Email</label>
                      <input type="email" id="email" name="email" required class="form-control py-2">
                    </div>
                  </div>
                  <div class="row">
				  <div class="col-md-12 form-group">
                      <label for="subject">Subject</label>
                      <input type="text" id="name" name="subject" required class="form-control py-2">
                    </div>
                    <div class="col-md-12 form-group">
                      <label for="message">Write Message</label>
                      <textarea name="message" id="message" required class="form-control py-2" cols="30" rows="8"></textarea>
                    </div>
                    
                  </div><?php echo $alert2; ?>
                <div class="g-recaptcha brochure__form__captcha" data-callback='onSubmit' data-action='submit' required="require" data-sitekey="6LcVN9YaAAAAADNT1MoBqQY1uOt5Q_x1AjXbzQ2i"></div><br />
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="submit" value="Send Message" name="contact" class="btn btn-primary">
                    </div>
                  </div>
                </form>
          </div>
          <div class="col-md-4">
            
            <div class="block-23">
              <h3 class="heading mb-5">Contact Information</h3>
              <ul>
                <li><a href=""><span class="icon ion-ios-telephone"></span><span class="text">+27 781 470 962</span></a></li>
                <li><a href="https://wa.me/message/IMXE4WD5Z75WB1" target="_blank"><button class="btn btn-primary" style="max-width:100%" ><img src="images/whatsapp.png" width="25" /> Chat with us on Whatsapp </button></a></li>
                <li><a href="mailto:info@desiredcar.co.za"><span class="icon ion-android-mail"></span><span class="text">info@desiredcar.co.za</span></a></li>
                <li><a target="_blank" href="https://www.google.com/maps/place/Desired+car/@-26.2153617,28.0472275,17z/data=!3m1!4b1!4m5!3m4!1s0x1e950f58391a21af:0x3308236e0ab35468!8m2!3d-26.2153617!4d28.0494162"><span class="icon ion-android-pin"></span><span class="text">2-4 Sprinz Ave, Village Main, Johannesburg South, 2001</span></a></li>
                <li><b><span class="text"><p style="text-decoration: underline;">Oprating Days and Time</p></span></b></li>
                <li><span class="icon ion-android-time"></span><span class="text">Monday &mdash; Friday 8:00am - 4:30pm</span></li>
                <li><span class="icon ion-android-time"></span><span class="text">Saturday : 9:00am - 4:00pm</span></li>
                <li><span class="icon ion-android-time"></span><span class="text">Holidays : 9:00am - 1:00pm</span></li>
              </ul>
            </div>
          </div>
          
        </div>
		<p> To become a DesiredCar.co.za customer or discuss a business opportunity, please click <a href="Dealership">here</a> to complete a short form to request information about DesiredCar.co.za's dealer solutions.</p>
            <div id="map"> 
	            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.425465992177!2d28.047227515030333!3d-26.21536168343289!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e950f58391a21af%3A0x3308236e0ab35468!2sDesired%20car!5e0!3m2!1sen!2sza!4v1611144901790!5m2!1sen!2sza" width="100%" height="480" frameborder="1" style="border:1; border-radius: 10px" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        	</div>
        	
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
    <!-- END section -->

   <?php include ("./inc/footer.php");?>
 
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script> 
    <script src="js/main.js"></script>
    
     <script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
 </script>

  </body>
</html>