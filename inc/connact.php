<?php
$webhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'rentcar';

$host = "ssl://mail.desiredcar.co.za";
$port = "465";
$username = "noreply@desiredcar.co.za";
$password = "Pleaseopen@123";
$smtp = Mail::factory('smtp', array ('host' => $host, 'port' => $port, 'auth' => true, 'username' => $username, 'password' => $password));
?>