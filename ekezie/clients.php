<?php 
include ("adminheader.php");

include ("includes/connect.php");

  //Initialize the variables first to avoid error
	$id = 0;
	$edit_name = false;
  	$email = '';
	$fullname = '';
	$address = '';
	$phone = '';
	$town = '';
	$province = '';
	$status = '';
?>

<div class="container">

<?php

$gethem = "SELECT * FROM clients ORDER BY id DESC";
$records = mysqli_query($dbconn, $gethem);
$count = mysqli_num_rows($records);
echo "<h1>You have total of $count  Client(s) </h1> ";

//Upading records
if(isset($_POST['update'])){
	$email = mysqli_real_escape_string($dbconn, $_POST['email']);
	$fullname = mysqli_real_escape_string($dbconn, $_POST['fullname']);
	$address = mysqli_real_escape_string($dbconn, $_POST['address']);
	$phone = mysqli_real_escape_string($dbconn, $_POST['phone']);
	$town = mysqli_real_escape_string($dbconn, $_POST['town']);
	$province = mysqli_real_escape_string($dbconn, $_POST['province']);
	$status = mysqli_real_escape_string($dbconn, $_POST['status']);
	$id = mysqli_real_escape_string($dbconn, $_POST['id']);
	
	mysqli_query($dbconn, "UPDATE clients SET email='$email',fullname='$fullname',address='$address',phone='$phone',city='$town',province='$province',status='$status' WHERE id='$id'");
		
	echo "Record has been updated";
}

?>


<?php
if ($count>0){
	?>	
	<hr>
	<table border="1" style= "min-width: 95%; font-size:12px">
		<tr>
			<th>S/N</th>
			<th>EMAIL</th>
			<th>FULL NAME</th>
			<th>ADDRESS</th>
			<th>PHONE</th>
			<th>DRIVER LICENCE</th>
			<th>TOWN</th>
			<th>PROVINCE</th>
			<th>CUSTOMER ID</th>
			<th>REGISTERED DATE</th>
			<th>DATE OF BIRTH</th>
			<th>PROFILE IMAGE</th>
			<th>STATUS</th>
			<th>ACTION</th>
		</tr>
	<?php
	$i=0;
	while($row = mysqli_fetch_array($records)){
		$i++;
		?>
		<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $email=$row['email']; ?></td>
		<td><?php echo $fullname=$row['fullname']; ?></td>
		<td><?php echo $address=$row['address']; ?></td>
		<td><?php echo $phone=$row['phone']; ?></td>
		<td><?php echo $driver_lenience=$row['driver_lenience']; ?></td>
		<td><?php echo $town=$row['city']; ?></td>
		<td><?php echo $province=$row['province']; ?></td>
		<td><?php echo $id_number=$row['customerid']; ?></td>
		<td><?php echo $row['registered_date']; ?></td>
		<td><?php echo $row['dob']; ?></td>
		<?php $id = $row['id']; ?>
<?php	
	$profilephoto = $row['profileimage'];
		if ($profilephoto == "")
	{
		$profileimage = "../images/default.jpg";
	}
	else
	{
		$profileimage = "../userdata/profileimages/".$profilephoto;
	}
	?>
		<td align="center"><img src="<?php echo "$profileimage"; ?>" width='55' /></td>
		<td><?php echo $status=$row['status']; ?></td>
		<form action='?id=<?php echo $id; ?>' method='POST'>
		<td>
			<input type="submit" name="edit" value='Edit'><p />
			<input type="submit" name="delete" value='Delet' onclick='return confirmDelete()'>
		</td>
		</form>
		</tr>
<?php
}
		echo"</table>";
		
}
else{
	echo "<h1> There is No User Yet...</h1>"; 
}


if (isset($_POST['edit'])){
	//Fetch record to be updated
	
	//if (isset($_GET['edit'])){
	$id = $_GET['id'];
	$edit_name = true;	
	$rec = "SELECT * FROM clients WHERE id='$id'";
	$records = mysqli_query($dbconn, $rec);
	$record = mysqli_fetch_array($records);
	$email = $record['email'];
	$fullname = $record['fullname'];
	$address = $record['address'];
	$phone = $record['phone'];
	$town = $record['city'];
	$province = $record['province'];
	$status = $record['status'];
	

echo"
<form action='' method='POST'>
<table border='1' style= 'min-width: 100%; font-size:11px'>

		<tr>
		<td><input type='text' name='email' value ='$email'</td>
		<td><input type='text' name='fullname' value ='$fullname'</td>
		<td><input type='text' name='address' value ='$address'</td>
		<td><input type='text' name='phone' value ='$phone'</td>
		<td><input type='text' name='town' value ='$town'</td>
		<td><input type='text' name='province' value ='$province'</td>
		<td><select name='status' value ='$status' required='require'>
							<option value='$status'>$status</option>								
							<option value='Pendding'>Pendding</option>								
							<option value='Investigating'>Investigating</option>								
							<option value='Activated'>Activated</option>									
							<option value='Deactivated'>Deactivated</option>									
							<option value='Suspended'>Suspended</option>
		</td>
		<td><input type='hidden' name='id' value ='$id'</td>
		<td><input type='submit' name='update' value='Update'></td>
		</tr>
</table>
</form>";
}

//Deleting a record
if(isset($_POST['delete'])){
	$id = $_GET['id'];
	mysqli_query($dbconn, "DELETE FROM clients WHERE id='$id'");
	echo '<script language="javascript">';
	echo "Record has been Deleted";
	echo '</script>';
	
}


?>

</div>
<script type='text/javascript'>
		function confirmDelete()
			{
				return confirm("Are you sure you want to delete this Client");
			}
	</script>
	
<?php include ("includes/footer.php");?>