<?php 
include ("adminheader.php");

include ("includes/connect.php");

  //Initialize the variables first to avoid error
	$id = 0;
	$edit_name = false;
  	$email = '';
	$fullname = '';
	$lastname = '';
	$address = '';
	$phone = '';
	$town = '';
	$province = '';
	$status = '';
?>

<div class="container">

<?php

$gethem = "SELECT * FROM team ORDER BY id DESC";
$records = mysqli_query($dbconn, $gethem);
$count = mysqli_num_rows($records);
echo "<h1>Managing Your Staff's information </h1> ";

?>


<?php
if ($count>0){
	?>	
	<hr>
	<table border="1" style= "min-width: 95%; font-size:12px">
		<tr>
			<th>S/N</th>
			<th>TITLE/POST</th>
			<th>FULL NAME</th>
			<th>EMAIL ADDRESS</th>
			<th>PHONE NUMBER</th>
			<th>PICTURE</th>
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
		<td><?php echo $name=$row['name']; ?></td>
		<td><?php echo $email=$row['email']; ?></td>
		<td><?php echo $phone=$row['phone']; ?></td>
		<?php 	$id = $row['id'];	
				$picture1=$row['image'];
				if ($picture1 == "")
					{
						$pic1 = "../images/default.jpg";
					}
					else
					{
						$pic1 = "../userdata/team_images/".$picture1;
					}
	?>
		<td align="center"><img src="<?php echo "$pic1"; ?>" width='55' /></td>
		
		<form action='team.php?id=<?php echo $id; ?>' method='POST'>
		<td>
			<input type="submit" name="edit" value='Edit'><p />
			</form>
			<form action='?id=<?php echo $id; ?>' method='POST'>		
			<input type="submit" name="delete" value='Delet' onclick='return confirmDelete()'>
		</td>
		</form>
		</tr>
<?php
}
		echo"</table>";		
}
else{
	echo "<h1> There is No Staff Yet...</h1>"; 
}
//Deleting a record
if(isset($_POST['delete'])){
	$id = $_GET['id'];
	mysqli_query($dbconn, "DELETE FROM team WHERE id='$id'");
	echo '<script language="javascript">';
	echo "Record has been Deleted";
	echo '</script>';
	echo'<meta http-equiv="refresh" content="0;url=managestaffs.php?id='.$id.'">';
}
?>

</div>
<script type='text/javascript'>
		function confirmDelete()
			{
				return confirm("Are you sure you want to remove this staff?");
			}
	</script>
	
<?php include ("includes/footer.php");?>