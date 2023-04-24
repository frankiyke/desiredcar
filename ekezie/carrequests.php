<?php include ("adminheader.php");?>

<div class="container">
<a href='carrequest.php'>Back to Request List</a>
<?php include ("includes/connect.php");

$id = $_GET['id']; 
$gethem = "SELECT * FROM request WHERE id='$id'";
$records = mysqli_query($dbconn, $gethem);
$count = mysqli_fetch_array($records);
		$owner = $count['owner'];
		$customerid = $count['customerid'];
		$brand = $count['brand'];
		$model = $count['model'];
		$doors = $count['doors'];
		$transmission = $count['transmission'];
		$body = $count['body'];
		$phone_number = $count['phone_number'];
		$mileage = $count['mileage'];
		$engin = $count['engin'];
		$gas = $count['gas'];
		$gear = $count['gear'];
		$discription = $count['discription'];
		$drive = $count['drive'];
		$id2 = $count['id'];
		$year = $count['year'];

if ($count>0){
	?>
	
	<hr>
	<table border="1" style= "min-width: 95%; font-size:11px">
		<tr align="center">
			<th>S/N</th>
			<th>CUST. ID</th>
			<th>PHONE NO.</th>
			<th>OWNER</th>
			<th>BRAND</th>
			<th>MODEL</th>
			<th>DOORS</th>
			<th>TRANSMISSION</th>
			<th>BODY</th>
			<th>CYLINDERS</th>
			<th>MILEAGE</th>
			<th>ENGIN </th>
			<th>GEARS</th>
			<th>GAS</th>
			<th>DISCRIPTION</th>
			<th>DRIVE</th>
			<th>YEAR</th>
			<th>IMAGE</th>
			<th>ACTION</th>
		</tr>
	<?php
	echo"
		<tr>
		<td>$id</td>
		<td>$customerid</td>
		<td>$phone_number</td>
		<td>$owner</td>
		<td>$brand</td>
		<td>$model</td>
		<td>$doors</td>
		<td>$transmission</td>
		<td>$body</td>
		<td>$cylinder</td>
		<td>$mileage</td>
		<td>$engin</td>
		<td>$gear</td>
		<td>$gas</td>
		<td>$discription</td>
		<td>$drive</td>
		<td>$year</td>
		";
		$carimage = "../images/Car.png";
	
	?>
		<td align="center"><a href="../Details.php?id=<?php echo $count['id'];?>" target="_blank" ><img src="<?php echo "$carimage"; ?>" width='70' /></a></td>
<?php
		echo "<td><form action='' method='POST'>
			<select name='status' value ='$status'>
							<option value='$status'>$status</option>								
							<option value='Pendding'>Pendding</option>								
							<option value='Received'>Received</option>								
							<option value='Read'>Read</option>
							<option value='Available'>Available</option>							
							<option value='Attended'>Attended</option>									
							<option value='Suspended'>Suspended</option>							
		<input type='hidden' name='id' value ='$id'/>
		<p><input type='submit' name='update' value='Update'></p>
		<p />	
		<p />
		<input type='submit' name='delete' value='Delete' onclick='return confirmDelete()'/>
		</form>";
		?>
		
		</td>
		</tr>
		</table>
<?php

if(isset($_POST['update'])){
	 
	$status = strip_tags($_POST['status']);
	
	mysqli_query($dbconn, "UPDATE request SET status='$status' WHERE id='$id2'");
	echo ("<script>alert('Car status changed')</script>");

	$_SESSION['msg'] = "Record has been updated";
	@header('location: carrequest.php');
}
	if(isset($_POST['updatep'])){
	 
	$price = strip_tags($_POST['price']);
	
	mysqli_query($dbconn, "UPDATE request SET price='$price' WHERE id='$id2'");
	echo ("<script>alert('Car price has been updated')</script>");
	$_SESSION['msg'] = "Record has been updated";
	@header('location: carrequest.php');
}

if(isset($_POST['delete'])){
	 
	$status = strip_tags($_POST['status']);
	
	$result = mysqli_query($dbconn, "DELETE FROM request WHERE id='$id2'");
	
	if(!$result){ 
            echo "<script>alert('Unable to delete the car')</script>"; 
            }
			else
			{ 
            echo ("<script>alert('Car deleted successfully')</script>");  
            } 
	//header('location: allcars.php');
	@header('location: carrequest.php');
}
}
?>
</div>
<?php include ("includes/footer.php");?>
<script type='text/javascript'>
		function confirmDelete()
			{
				return confirm("Are you sure you want to delete this request?");
			}
	</script>