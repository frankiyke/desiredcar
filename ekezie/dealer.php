<?php 
include ("adminheader.php");

include ("includes/connect.php");

 $id= @$_GET['id'];
?> 
 <style>
 table, td, th{
  border: 1px solid black;
  border-collapse: collapse;
}
 td {
  padding: 3px;
  text-align: left;
}
th {
  background-color: #08d2d4;
  color: #000;
  padding: 5px;
  text-align: center;
}
#t01 {
  width: 100%;    
  background-color: #f1f1f1;
  color: #000;
}

 </style>


<div class="container">

<?php
//Upading records

if($id){
$gethem = "SELECT * FROM dealers WHERE id =$id";
$records = mysqli_query($dbconn, $gethem);
$row = mysqli_fetch_array($records);
?>
<p />
  <table id="t01">
  <th>Dealer Details</th>
  </table><b>
  <table id="t01">
  <tr>
    <td>TITLE :</td><td><?php echo $title=$row['title']; ?></td>
  </tr>
    <tr>
    <td>NAME :</td><td><?php echo $fullname=$row['fullname']; ?></td>
   </tr>
  <tr>
    <td>DEALER :</td><td><?php echo $namedealer=$row['namedealer']; ?></td>
  </tr>
    <tr>
    <td>EMAIL :</td><td><?php echo $email=$row['email']; ?></td>
   </tr>
  <tr>
    <td>PHONE :</td><td><?php echo $phone=$row['phone']; ?></td>
  </tr>
    <tr>
    <td>CITY :</td><td><?php echo $city=$row['city']; ?></td>
   </tr>
  <tr>
    <td>PROVINCE :</td><td><?php echo $province=$row['province']; ?></td>
  </tr>
  <tr>
    <td>POSTAL :</td><td><?php echo $zip=$row['zip']; ?></td>
  </tr>
  <tr>
    <td>USED CARS :</td><td><?php echo $tucs=$row['tucs']; ?></td>
  </tr>
  <tr>
    <td>NEW CARS :</td><td><?php echo $tncs=$row['tncs']; ?></td>
  </tr>
  <tr>
    <td>AD BUDGET :</td><td><?php echo $eab=$row['eab']; ?></td>
  </tr>
  <tr>
    <td>DATE :</td><td><?php echo $row['registered_date']; ?></td>
  </tr>
  <tr>
    <td>DEALER ID :</td><td><?php echo $row['dealerid']; ?></td>
  </tr>
  
  </table>

<?php


	
		
}
else{
	echo "<h1> No dealer selected...</h1>"; 
}

echo '<br /><a href="dealers.php"> Back to Dealers</a>';
	
php include ("includes/footer.php");?>