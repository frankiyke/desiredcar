<?php
include ("includes/connect.php");
require "logincheck.php";
	//header ("Location: login.php");

include ("../inc/pictures.php");
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
		$profileimage = "../images/default.jpg";
	}
	else
	{
		$profileimage = "../userdata/profileimages/".$profilephoto;
	}
	$error="";
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Desired Car</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet">

    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">

    <link rel="stylesheet" href="../fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../fonts/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="icon" type="image/gif" href="images/logo.png">
    <!-- Theme Style -->
    <link rel="stylesheet" href="../css/style.css">
  </head>
  <body>
    
    <header role="banner">
			
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
		 <a class="navbar-brand absolute" href="index.php"><img src="../images/logo.png" height="95" /> Desired Car</a>
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
                <a class="nav-link active" href="../index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../car-search.php">Search For Cars</a>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="../buycar.php">Buy Car</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../contact.php">Contact</a>
              </li>
            </ul>
            <ul class="navbar-nav absolute-right">
              <li>
                <a href="admin.php">Admin</a> / <a href="../register.php">Register</a>
              </li>
			  
            </ul>
            
          </div>
        </div>
      </nav>
			</header>';
			}
			
			
			
			
			
		else{
			echo '<li class="nav-item">
					<a class="nav-link" href="soldcars.php">Sold Cars</a>
				  </li>
				<li class="nav-item">
                <a class="nav-link active" href="dashboard.php">Dashboard</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="allcars.php" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Price</a>
                <div class="dropdown-menu" aria-labelledby="dropdown05">
                  <a class="dropdown-item" href="listedcars.php">Manage cars</a>
				  <a class="dropdown-item" href="soldcars.php">View Your Sold Cars</a>
				  <a class="dropdown-item" href="allcars.php">View All Car</a>
				  <a class="dropdown-item" href="allusers.php">View All Users</a>
				  <a class="dropdown-item" href="managecars.php">Manage Cars</a>
				  <a class="dropdown-item" href="deleteimages.php">Remove Cars</a>
                </div>

              </li>
              <li class="nav-item">
                <a class="nav-link" href="listedcars.php">My Cars</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="deleteimages.php">Remove Cars</a>
              </li>            
			</ul>
            <ul class="navbar-nav absolute-right">
              <li>
                <a href="logout.php">     Logout</a>';
				?>
              </li>
			  
            </ul>
          </div><ul class="navbar-nav absolute-right">
                
        </div><a href="settings.php"><?php echo " <img src='$profileimage' width='60' /> <br />$name"; ?></a><br />
        		
      </nav>
			</header>
		<?php }?>	