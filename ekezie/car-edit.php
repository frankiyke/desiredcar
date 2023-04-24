<?php include ("adminheader.php");?>
<div class="container">
<a href='allcars.php'>Back to cars</a>
<?php include ("includes/connect.php");

$id = $_GET['id']; 
$gethem = "SELECT * FROM cars WHERE id='$id'";
$records = mysqli_query($dbconn, $gethem);
$count = mysqli_fetch_array($records);
		$procode = $count['procode'];
		$owner = $count['owner'];
		$email = $count['email'];
		$brand = $count['brand'];
		$model = $count['model'];
		$doors = $count['doors'];
		$transmission = $count['transmission'];
		$body = $count['body'];
		$phone_number = $count['phone_number'];
		$mileage = $count['mileage'];
		$engin = $count['engin'];
		$gas = $count['gas'];
		$town = $count['town'];
		$province = $count['province'];
		$price = $count['price'];
		$id2 = $count['id'];
		$statu = $count['status'];
		
		if($statu == "Available")
		{
				$status='<b style="color:green;">'.$statu.'</b>';
		}
		else{
				$status='<b style="color:red;">'.$statu.'</b>';
		}

if ($count>0){
	?>
	
	<hr>
	<table border="1" style= "min-width: 95%; font-size:11px">
		<tr align="center">
			<th>S/N</th>
			<th>PHONE NO.</th>
			<th>OWNER</th>
			<th>BRAND</th>
			<th>MODEL</th>
			<th>DOORS</th>
			<th>TRANSMISSION</th>
			<th>BODY</th>
			<th>PRODUCT CODE</th>
			<th>MILEAGE</th>
			<th>ENGIN </th>
			<th>GAS</th>
			<th>TOWN</th>
			<th>PROVINCE</th>
			<th>PRICE</th>
			<th>IMAGE</th>
			<th>STATUS</th>
			<th>ACTION</th
		</tr>
	<?php
	echo"
		<tr>
		<td>$id</td>
		<td>$phone_number</td>
		<td>$owner</td>
		<td>$brand</td>
		<td>$model</td>
		<td>$doors</td>
		<td>$transmission</td>
		<td>$body</td>
		<td>$procode</td>
		<td>$mileage</td>
		<td>$engin</td>
		<td>$gas</td>
		<td>$town</td>
		<td>$province</td>
		<form action='' method='POST'>
			<td><input type='text' name='price' value='$price'/>
			<input type='hidden' name='id' value ='$id'/>
		<p /><input type='submit' name='updatep' value='Update'></td>
		</form>";
		
	$carphoto = $count['image1'];
		if ($carphoto == "")
	{
		$carimage = "../images/Car.png";
	}
	else
	{
		$carimage = "../userdata/car_images/".$carphoto;
	}
	?>
		<td align="center"><a href="../Details.php?id=<?php echo $count['id'];?>" target="_blank" ><img src="<?php echo "$carimage"; ?>" width='70' /></a></td>
		<td><?php echo $status; ?>
		
		
		</td>
<?php
		echo "<td><form action='' method='POST'>
			<select name='status' value ='$status'>
							<option value='$status'>$status</option>								
							<option value='Disabled'>Disable Car</option>			
							<option value='Available'>Enable Car</option>							
							<option value='Sold'>Sold</option>														
		<input type='hidden' name='id' value ='$id'/>
		<p><input type='submit' name='update' value='SAVE / UPDATE'></p>
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
	
	mysqli_query($dbconn, "UPDATE cars SET status='$status' WHERE id='$id2'");
	echo ("<script>alert('Car status changed')</script>");

	$_SESSION['msg'] = "Record has been updated";
	@header('location: allcars.php');
}
	if(isset($_POST['updatep'])){
	 
	$price = strip_tags($_POST['price']);
	
	mysqli_query($dbconn, "UPDATE cars SET price='$price' WHERE id='$id2'");
	echo ("<script>alert('Car price has been updated')</script>");
	$_SESSION['msg'] = "Record has been updated";
	@header('location: allcars.php');
}

if(isset($_POST['delete'])){
	 
	$status = strip_tags($_POST['status']);
	
	$result = mysqli_query($dbconn, "DELETE FROM cars WHERE id='$id2'");
	
	if(!$result){ 
            echo "<script>alert('Unable to delete the car')</script>"; 
            }
			else
			{ 
            echo ("<script>alert('Car deleted successfully')</script>");  
            } 
	//header('location: allcars.php');
	@header('location: allcars.php');
}
}
?>
</div>
<?php include ("includes/footer.php");?>
<script type='text/javascript'>
		function confirmDelete()
			{
				return confirm("Are you sure you want to delete this Car?");
			}
	</script>