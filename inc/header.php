<?php 
include ("inc/connect.php");
session_start();
if (isset($_SESSION["user_login"])){
$email = $_SESSION["user_login"];
}
else{
	$email = "";	
	//header ("Location: login.php");
}
include ("inc/pictures.php");
$imagesql = "SELECT * FROM users WHERE email='$email'";
$checkimage = mysqli_query($dbconn, $imagesql);
	$imagerow = mysqli_fetch_array($checkimage, MYSQLI_ASSOC);
	$profilephoto = $imagerow['profileimage'];
	$name = $imagerow['firstname'];
	$id_number = $imagerow['id_number'];
	$town = $imagerow['town'];
	$province = $imagerow['province'];
	$status = $imagerow['status'];
	$email = $imagerow['email'];
	if ($profilephoto == "")
	{
		$profileimage = "images/default.jpg";
	}
	else
	{
		$profileimage = "userdata/profileimages/".$profilephoto;
	}
?>
<!doctype html>
<html lang="en">
  <head>
    <title></title>
    <meta name="google-site-verification" content="S1tdnYWjco-acjZY-4IVDPb5iJOuMF0anYwt6roDkCg" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <link rel="stylesheet" href="fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="icon" type="image/gif" href="images/logo.png">
    <!-- Theme Style -->
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
    <header role="banner">
			
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
		 <a class="navbar-brand absolute" href="index.php"><img src="./images/logo.png" height="95" /> Test My Ride <i>Africa</i></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
            <ul class="navbar-nav mx-auto">
			<?php
			if (!$email) {
			echo
				'
              <li class="nav-item">
                <a class="nav-link active" href="index.php">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Drivers/Listing</a>
                <div class="dropdown-menu" aria-labelledby="dropdown05">
                  <a class="dropdown-item" href="register.php">Register / Listing</a>
                  <a class="dropdown-item" href="driver/driver_register.php">Register as a driver</a>
                  <a class="dropdown-item" href="driver/driver_login.php">Login as a driver</a>
				  <a class="dropdown-item" href="car-search.php">Search</a>
				  <a class="dropdown-item" href="rentacar.php">Rent a Car</a>
                </div>

              </li>
              <li class="nav-item">
                <a class="nav-link" href="blog.php">Blog</a>
              </li>
			  
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>
            </ul>
            <ul class="navbar-nav absolute-right">
              <li>
                <a href="login.php">Login</a> / <a href="register.php">Register</a>
              </li>
			  
            </ul>
            
          </div>
        </div>
      </nav>
			</header>';
			}
			
			
			
			
			
		else{
			echo '<li class="nav-item">
					<a class="nav-link active"><strong>Account: </strong> <span style= "color: green";>'.$status.'</span></a>
				  </li>
				<li class="nav-item">
                <a class="nav-link active" href="index.php">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Listing</a>
                <div class="dropdown-menu" aria-labelledby="dropdown05">
                  <a class="dropdown-item" href="listedcars.php">Manage your cars</a>
                  <a class="dropdown-item" href="rentacar.php">Rent a Car</a>
				  <a class="dropdown-item" href="cars_profile.php">Preview Your Cars</a>
				  <a class="dropdown-item" href="rented.php">View Your Rented Cars</a>
                </div>

              </li>
              <li class="nav-item">
                <a class="nav-link" href="blog.php">Blog</a>
              </li>
			  
              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>            
			  <li class="nav-item">
				<a class="nav-link"> </a>
			  </li>
			</ul>
            <ul class="navbar-nav absolute-right">
              <li>
                <a href="logout.php"> Logout </a> / <a href="accountsettings.php"> Settings </a>';
				?>
              </li>
			  
            </ul>
            
          </div>
        </div><a href="accountsettings.php"><?php echo " <img src='$profileimage' width='60' /> <br />$name"; ?></a><br />
        		
      </nav>
			</header>
		<?php }?>	