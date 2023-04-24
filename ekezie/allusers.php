<?php 
include ("adminheader.php");

include ("includes/connect.php");

  //Initialize the variables first to avoid error
	$id = 0;
	$edit_name = false;
  	$email = '';
	$firstname = '';
	$lastname = '';
	$address = '';
	$phone = '';
	$town = '';
	$province = '';
	$status = '';
?>

<div class="container">

<?php

$gethem = "SELECT * FROM users ORDER BY id DESC";
$records = mysqli_query($dbconn, $gethem);
$count = mysqli_num_rows($records);
echo "<h1>You have total of $count  Users </h1> ";

//Upading records
if(isset($_POST['update'])){
	$email = mysqli_real_escape_string($dbconn, $_POST['email']);
	$firstname = mysqli_real_escape_string($dbconn, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($dbconn, $_POST['lastname']);
	$address = mysqli_real_escape_string($dbconn, $_POST['address']);
	$phone = mysqli_real_escape_string($dbconn, $_POST['phone']);
	$town = mysqli_real_escape_string($dbconn, $_POST['town']);
	$province = mysqli_real_escape_string($dbconn, $_POST['province']);
	$status = mysqli_real_escape_string($dbconn, $_POST['status']);
	$id = mysqli_real_escape_string($dbconn, $_POST['id']);
	
	mysqli_query($dbconn, "UPDATE users SET email='$email',firstname='$firstname',lastname='$lastname',address='$address',phone='$phone',town='$town',province='$province',status='$status' WHERE id='$id'");
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
			<th>FIRST NAME</th>
			<th>LAST NAME</th>
			<th>ADDRESS</th>
			<th>PHONE</th>
			<th>DRIVER LICENCE</th>
			<th>TOWN</th>
			<th>PROVINCE</th>
			<th>ID/PASSPORT NUMBER</th>
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
		<td><?php echo $firstname=$row['firstname']; ?></td>
		<td><?php echo $lastname=$row['lastname']; ?></td>
		<td><?php echo $address=$row['address']; ?></td>
		<td><?php echo $phone=$row['phone']; ?></td>
		<td><?php echo $driver_lenience=$row['driver_lenience']; ?></td>
		<td><?php echo $town=$row['town']; ?></td>
		<td><?php echo $province=$row['province']; ?></td>
		<td><?php echo $id_number=$row['id_number']; ?></td>
		<td><?php echo $row['registered_date']; ?></td>
		<td><?php echo $row['date_of_birth']; ?></td>
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
	$rec = "SELECT * FROM users WHERE id='$id'";
	$records = mysqli_query($dbconn, $rec);
	$record = mysqli_fetch_array($records);
	$email = $record['email'];
	$firstname = $record['firstname'];
	$lastname = $record['lastname'];
	$address = $record['address'];
	$phone = $record['phone'];
	$town = $record['town'];
	$province = $record['province'];
	$status = $record['status'];
	

echo"
<form action='' method='POST'>
<table border='1' style= 'min-width: 100%; font-size:11px'>

		<tr>
		<td><input type='text' name='email' value ='$email'</td>
		<td><input type='text' name='firstname' value ='$firstname'</td>
		<td><input type='text' name='lastname' value ='$lastname'</td>
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
	mysqli_query($dbconn, "DELETE FROM users WHERE id='$id'");
	echo '<script language="javascript">';
	echo "Record has been Deleted";
	echo '</script>';
	
}


?>

</div>
<script type='text/javascript'>
		function confirmDelete()
			{
				return confirm("Are you sure you want to delete this User");
			}
	</script>
	
<?php include ("includes/footer.php");?>