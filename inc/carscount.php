<?php
$bakkies = "SELECT * FROM cars WHERE body='Bakkie'";
$bakkied = mysqli_query($dbconn, $bakkies);
$bakkie = mysqli_num_rows($bakkied);

$trucks = "SELECT * FROM cars WHERE body='Truck'";
$trucked = mysqli_query($dbconn, $trucks);
$truck = mysqli_num_rows($trucked);

$convertibles = "SELECT * FROM cars WHERE body='Convertible'";
$convertibled = mysqli_query($dbconn, $convertibles);
$convertible = mysqli_num_rows($convertibled);

$hatchbacks = "SELECT * FROM cars WHERE body='hatchback'";
$hatchbacked = mysqli_query($dbconn, $hatchbacks);
$hatchback = mysqli_num_rows($hatchbacked);

$vans = "SELECT * FROM cars WHERE body='Minivan/Van'";
$vand = mysqli_query($dbconn, $vans);
$van = mysqli_num_rows($vand);

$wagons = "SELECT * FROM cars WHERE body='Wagon'";
$wagoned = mysqli_query($dbconn, $wagons);
$wagon = mysqli_num_rows($wagoned);

$coupes = "SELECT * FROM cars WHERE body='Coupe'";
$couped = mysqli_query($dbconn, $coupes);
$coupe = mysqli_num_rows($couped);


$suvs = "SELECT * FROM cars WHERE body='MUV/SUV'";
$suvsd = mysqli_query($dbconn, $suvs);
$suv = mysqli_num_rows($suvsd);

$sedans = "SELECT * FROM cars WHERE body='Sedan'";
$sedaned = mysqli_query($dbconn, $sedans);
$sedan = mysqli_num_rows($sedaned);
?>