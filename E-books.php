<?php
require "inc/connact2.php";
$dbconn = mysqli_connect($webhost, $dbuser, $dbpass,$dbname)or die("Couldnt connect to SQL Server");
    if(! $dbconn ) {
      die("Could not connect to database");
   }

$quote = @$_POST['e-book'];

if($quote){
					
$name = strip_tags($_POST['name']);
$email = strip_tags($_POST['email']);;
$sdate = date('d-m-y');
$subject ="DesiredCar Free E-book";
//Headers
$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: DesiredCar PTY <noreply@desiredcar.co.za>";
$body = "
Hello $name,<p />
Thank you for submitting your information. <p />The dealership will be in contact with you as soon as there is a newly released car.<br />
Click <a href='https://www.desiredcar.co.za/E-books/WorldFord_eBook_BuyersGuideToThe2021FordBroncoFamily_01-21.pdf '>Download </a> to view/download the E-book <p />Kind regards<br />DesiredCar PTY<br /><a href='https://www.desiredcar.co.za '><img src='https://www.desiredcar.co.za/images/logo.png' height='95' /></a>";

$body = wordwrap($body,70);
if(mail($email, $subject, $body, $headers)){			
mysqli_query($dbconn, "INSERT INTO subscribers (id, name, email, sdate) VALUES (NULL, '$name', '$email', '$sdate')");
header ("Location: E-book?id=$id&msg2=Please check your e-mail, a dowload link has been sent to email");
echo'<meta http-equiv="refresh" content="0;url=E-book?id=$id&msg2=Please check your e-mail, a dowload link has been sent to email>';
exit();
	}
	else{
		header ("Location: E-book?id=$id&msg1=Sorry, Unable to send download link to your email. Please try again.");
		echo'<meta http-equiv="refresh" content="0;url=E-book?id=E-book?id=$id&msg1=Sorry, Unable to send download link to email. Please try again>';
		exit();
	}
	}
?>