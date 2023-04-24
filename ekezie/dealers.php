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
//Upading records
if(isset($_POST['update'])){
	$email = mysqli_real_escape_string($dbconn, $_POST['email']);
	$fullname = mysqli_real_escape_string($dbconn, $_POST['fullname']);
	$title = mysqli_real_escape_string($dbconn, $_POST['title']);
	$address = mysqli_real_escape_string($dbconn, $_POST['address']);
	$phone = mysqli_real_escape_string($dbconn, $_POST['phone']);
	$city = mysqli_real_escape_string($dbconn, $_POST['city']);
	$province = mysqli_real_escape_string($dbconn, $_POST['province']);
	$status = mysqli_real_escape_string($dbconn, $_POST['status']);
	$id = mysqli_real_escape_string($dbconn, $_POST['id']);
	
	mysqli_query($dbconn, "UPDATE dealers SET email='$email',firstname='$firstname',lastname='$lastname',address='$address',phone='$phone',town='$town',province='$province',status='$status' WHERE id='$id'");
	echo "Record has been updated";
}

$gethem = "SELECT * FROM dealers ORDER BY id DESC";
$records = mysqli_query($dbconn, $gethem);
$count = mysqli_num_rows($records);
echo "<h1>You have total of $count Dealer request </h1> ";

?>


<?php
if ($count>0){
	?>	
	<hr>
	<table border="1" style= "min-width: 95%; font-size:12px">
		<tr>
			<th>S/N</th>
			<th>TITLE</th>
			<th>FULL NAME</th>
			<th>DEALER NAME</th>
			<th>EMAIL</th>
			<th>PHONE</th>
			<th>CITY</th>
			<th>PROVINCE</th>
			<th>ZIP/POSTAL</th>
			<th>TOTAL USED CARS</th>
			<th>TOTAL NEW CARS</th>
			<th>AD BUDGET</th>
			<th>REGISTERED DATE</th>
			<th>Dealer ID</th>
			<th>ACTION</th>
		</tr>
	<?php
	$i=0;
	while($row = mysqli_fetch_array($records)){
		$i++;
		?>
		<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $title=$row['title']; ?></td>
		<td><?php echo $fullname=$row['fullname']; ?></td>
		<td><?php echo $namedealer=$row['namedealer']; ?></td>
		<td><?php echo $email=$row['email']; ?></td>
		<td><?php echo $phone=$row['phone']; ?></td>
		<td><?php echo $city=$row['city']; ?></td>
		<td><?php echo $province=$row['province']; ?></td>
		<td><?php echo $zip=$row['zip']; ?></td>
		<td><?php echo $tucs=$row['tucs']; ?></td>
		<td><?php echo $tncs=$row['tncs']; ?></td>
		<td><?php echo $eab=$row['eab']; ?></td>
		<td><?php echo $row['registered_date']; ?></td>
		<td><?php echo $row['dealerid']; ?></td>
		<?php $id = $row['id']; ?>
		<form action='?id=<?php echo $id; ?>' method='POST'>
		<td>
			<input type="submit" name="edit" value='Edit'><p />
			<input type="submit" name="delete" value='Delet' onclick='return confirmDelete()'>
			<a href="dealer.php?id=<?php echo $id;?>">View</a>
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
	$rec = "SELECT * FROM dealers WHERE id='$id'";
	$records = mysqli_query($dbconn, $rec);
	$record = mysqli_fetch_array($records);
	$email = $record['email'];
	$fullname = $record['fullname'];
	$namedealer = $record['namedealer'];
	$phone = $record['phone'];
	$city = $record['city'];
	$province = $record['province'];
	

echo"
<form action='' method='POST'>
<table border='1' style= 'min-width: 100%; font-size:11px'>

		<tr>
		<td><input type='text' name='email' value ='$email'</td>
		<td><input type='text' name='fullname' value ='$fullname'</td>
		<td><input type='text' name='namedealer' value ='$namedealer'</td>
		<td><input type='text' name='email' value ='$email'</td>
		<td><input type='text' name='phone' value ='$phone'</td>
		<td><input type='text' name='city' value ='$city'</td>
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
	mysqli_query($dbconn, "DELETE FROM dealers WHERE id='$id'");
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