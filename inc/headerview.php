<?php 
include ("connect.php");
session_start();
if (isset($_SESSION["user_login"])){
$email = $_SESSION["user_login"];
}
else{
	$email = "";	
	//header ("Location: login.php");
}


include ("pictures.php");
$imagesql = "SELECT * FROM clients WHERE email='$email'";
$checkimage = mysqli_query($dbconn, $imagesql);
	$imagerow = mysqli_fetch_array($checkimage, MYSQLI_ASSOC);
	$profilephoto = $imagerow['profileimage'];
	$name = $imagerow['fullname'];
	$customerid = $imagerow['customerid'];
	$phone_number = $imagerow['phone'];
	//$provin = $imagerow['province'];
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
	
	
	$error ="";
	
	$check = "SELECT * FROM booking WHERE email='$email'";
	$checks = mysqli_query($dbconn, $check);
			$count=(mysqli_num_rows($checks));
			
$reque = "SELECT * FROM request WHERE customerid='$customerid'";
	$requ = mysqli_query($dbconn, $reque);
			$requested=(mysqli_num_rows($requ));
			
			$file = './counter.txt';
if(!file_exists($file)){
	$fopen = fopen($file,"w");
	fwrite($fopen,0);
	fclose($fopen);
}

if(!isset($_COOKIE['count'])){
	$content = file_get_contents($file);
	$val = $content+1;
	$put = file_put_contents($file, $val);
	setcookie('count', $val,time()+2);
	$visitors = $val;
}
else{
	$visitors = $_COOKIE['count'];
}

function  get_ip(){
		if(isset($_SERVER['HTTP_CLIENT_IP'])){
			return $_SERVER['HTTP_CLIENT_IP'];
		}
		elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else{
			return (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
			}
}
$ip=get_ip();
$query=@unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
if($query && $query['status'] == 'success'){
	 $isp = $query['isp'];
	 $country = $query['country'];
	 $countrycode = $query['countryCode'];
	 $regionname = $query['regionName'];
	 $city = $query['city'];
	 $zip = $query['zip'];
	 $lat = $query['lat'];
	 $lon = $query['lon'];
	 $time = $query['timezone'];
	 $org = $query['org'];
	 $asl = $query['as'];
	 $ltime = date('d/m/y - H:i');
	 $ip_check = "SELECT ip FROM counter WHERE ip='$ip'";
			$ip_checks = mysqli_query($dbconn, $ip_check);
			$ip_checked = mysqli_num_rows($ip_checks);
			if ($ip_checked == 0){	
				$countthem = mysqli_query($dbconn, "INSERT INTO counter (id, ip, isp, country, countrycode, regionname, city, zip, lat, lon, timezone, org, asl, ltime) VALUES (NULL, '$ip', '$isp', '$country', '$countrycode', '$regionname', '$city', '$zip', '$lat', '$lon', '$time', '$org', '$asl', '$ltime')");

	 $alldata = "IP: $ip<p />
ISP: $isp<p /> 
Country: $country<p /> 
Conry Code: $countrycode<p /> 
Region: $regionname<p /> 
City: $city<p /> 
Zip: $zip<p /> 
Latitude: $lat<p /> 
Longitude: $lon<p /> 
Timezone: $time<p /> 
ORG: $org<p /> 
AS :$as<p />
==================<p />";

$lfile = './location.txt';
if(!file_exists($lfile)){
	$fopen = fopen($lfile,"w");
	fwrite($fopen, $alldata);	
	fclose($fopen);
}
			}else{}
}
else
{$locn = "Uknown Location";}
@$locn =  "Your Location is ".$city." | ".$country;

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Desired-Car: Cars for sale in South Africa | Pre-owned or Used cars from Desiredcar.co.za</title>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge" />
	<meta name="robots" content="index, follow" />
	<meta name="rating" content="SAFE FOR KIDS" />                
	<meta name="audience" content="Public" />                
	<meta name="Language" content="en" />                
	<meta name="Country" content="ZA" />	
    <meta name="google-site-verification" content="na7eBQzWkeegWup5CbOLon2IErx7kE4WYEOeexmsNEg" />
	<meta name="description" content="We Trade, buy and sell Used cars at affordable price.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes">
    <meta name="keywords" content="Used Car, Used Vehicle, Used Car Dealer, Cars, Desired car, Cheap cars, Affordable cars, cars, Nice Used car, Pre-owened car">
    <meta name="author" content="NobleWares">	
	<meta property="og:description" content="DesiredCar offer free valuations of your car, to make selling it convenient for you in a quick, efficient and safe way."/>
	<meta property="og:url" content="https://www.desiredcar.co.za"/>
	<meta property="fb:admins" content="desiredcar.co.za" />
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
    <script data-ad-client="ca-pub-1481560478677463" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
  </head>
  <body>
    
    <header role="banner">
			
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
		 <a class="navbar-brand absolute" href="index"><img src="./images/logo.png" height="95" /> Desired Car</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse navbar-light" id="navbarsExample05">
            <ul class="navbar-nav mx-auto">
			<?php if (!$email) {
			echo
				'
              <li class="nav-item">
                <a class="nav-link active" href="index">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cars</a>
                <div class="dropdown-menu" aria-labelledby="dropdown05">
                  <a class="dropdown-item" href="Allcars">View All Cars</a>
				  <a class="dropdown-item" href="Car-search">Search </a>
				  <a class="dropdown-item" href="Buycar">Buy Car</a>
				  <a class="dropdown-item" href="Dealership">Sale a car</a>
				  <a class="dropdown-item" href="">Dealers</a>
				  <a class="dropdown-item" href="Webservice">Other Services</a>
		        </div>
              </li>
			  <li class="nav-item">
                <a class="nav-link" href="Car-search">Search</a>
              </li>
			  
			  <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" aria-haspopup="true" aria-expanded="false">More</a>
                <div class="dropdown-menu" aria-labelledby="dropdown05">
                  <a class="dropdown-item" href="Car-diagnostic">Car Diagnostic</a>
				  <a class="dropdown-item" href="Webservice">Web Service</a>
		        </div>
              </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown" href="#">We</a>
                <div class="dropdown-menu" aria-labelledby="dropdown05">
                  <a class="dropdown-item" href="About">About Us</a>
				  <a class="dropdown-item" href="Team">Our Team </a>
		        </div>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="Contact">Contact</a>
              </li>
            </ul>
            <ul class="navbar-nav absolute-right">
              <li>
                <a href="Login">Login</a> | <a href="Register">Register</a>
              </li>
			  
            </ul>
            
          </div>
        </div>
      </nav>
			</header>';
		}
	else{
			echo '<li class="nav-item">
					<a class="nav-link active"><strong>Logged In</strong></a>
				  </li>
				<li class="nav-item">
                <a class="nav-link active" href="index">Home</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Cars</a>
                <div class="dropdown-menu" aria-labelledby="dropdown05">
                  <a class="dropdown-item" href="Allcars">View all cars</a>
                  <a class="dropdown-item" href="Buycar">Buy Car</a>
				  <a class="dropdown-item" href="Request">Request a Car</a>
				  <a class="dropdown-item" href="Favourite">Favourite Cars ('.$count.')</a>
				  <a class="dropdown-item" href="Requests">Requested ('.$requested.')</a>
				  <a class="dropdown-item" href="Webservice">Web Service</a>
                </div>

              </li>
              <li class="nav-item">
                <a class="nav-link" href="Favourite">Wish('.$count.')</a>
              </li>
              
			  <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" aria-haspopup="true" aria-expanded="false">More</a>
                <div class="dropdown-menu" aria-labelledby="dropdown05">
                  <a class="dropdown-item" href="Car-diagnostic">Car Diagnostic</a>
				  <a class="dropdown-item" href="Webservice">Web Service</a>
				  <a class="dropdown-item" href="About">About Us</a>
				  <a class="dropdown-item" href="Team">Our Team </a>
		        </div>
              </li>              
              <li class="nav-item">
                <a class="nav-link" href="Contact">Contact</a>
              </li>            
			  <li class="nav-item">
				<a class="nav-link"> </a>
			  </li>
			</ul>
            <ul class="navbar-nav absolute-right">
              <li>
                <a href="Logout"> Logout </a>';
				?>
              </li>
			  
            </ul>
            
          </div>
        </div><a href="Accountsettings"><?php echo " <img src='$profileimage' width='60' /> <br />"."$name"; ?></a><br />
        		
      </nav>
			</header>
			
              </li>
			  
            </ul>
            
          </div>
        </div>
        		
      </nav>
			</header>
			
			
		<?php }?>	<?php 
$alert ='';