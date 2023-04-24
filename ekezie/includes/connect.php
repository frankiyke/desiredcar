<?php 
$webhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'desiredc_car';
$dbconn = mysqli_connect($webhost, $dbuser, $dbpass,$dbname)or die("Couldnt connect to SQL Server");
    if(! $dbconn ) {
      die("Could not connect to database");
   }
?>
