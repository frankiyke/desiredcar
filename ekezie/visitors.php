<?php
include ("adminheader.php");
include ("includes/connect.php");
?>
 <div class="container">
 <?php
 
$gethem = "SELECT * FROM counter ORDER BY id DESC";
$records = mysqli_query($dbconn, $gethem);
$count = mysqli_num_rows($records);
 
if ($count>0){
	?>	
	<hr><center><h5>You have <?php echo $count; ?> visitor(s) for now.</h5></center>
	<form action='?id=<?php echo $id; ?>' method='POST'>
	<input type="submit" name="deleteall" value='Delete All' onclick='return confirmDeleteAll()'>
	
	</form>
<form method='POST'>
	<table border="1" style= "min-width: 95%; font-size:12px">
		<tr align="center">
			<th>S/N</th>
			<th>TIME</th>
			<th>IP</th>
			<th>ISP</th>
			<th>COUNTRY</th>
			<th>CODE</th>
			<th>REGION</th>
			<th>CITY</th>
			<th>ZIP CODE</th>
			<th>LATITUDE</th>
			<th>LONGITUDE</th>
			<th>TIME-ZONE</th>
			<th>ORGANIZATION</th>
			<th>AS</th>
			<th>DLT</th>
		</tr>
	<?php
	$i=0;
	while($row = mysqli_fetch_array($records)){
		$i++;
		?>
		<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $ltime=$row['ltime']; ?></td>
		<td><?php echo $ip=$row['ip']; ?></td>
		<td><?php echo $isp=$row['isp']; ?></td>
		<td><?php echo $country=$row['country']; ?></td>
		<td><?php echo $countrycode=$row['countrycode']; ?></td>
		<td><?php echo $regionname=$row['regionname']; ?></td>
		<td><?php echo $city=$row['city']; ?></td>
		<td><?php echo $zip=$row['zip']; ?></td>
		<td><?php echo $lat=$row['lat']; ?></td>
		<td><?php echo $lon=$row['lon']; ?></td>
		<td><?php echo $time=$row['timezone']; ?></td>
		<td><?php echo $org=$row['org']; ?></td>
		<td><?php echo $asl=$row['asl']; ?></td>
		<?php $id = $row['id']; ?>
				

		
		<td align="center">
			<input type="checkbox" name='checkbox[]' value='<?php echo $id; ?>'>
		</td>
		
	</tr>
<?php
}
		echo"</table>";
		
}
else{
    echo "<p />";
	echo "<h1>There is no visitor...</h1>"; 
}
?>
<input type="submit" name="delete" value='Delete' onclick='return confirmDelete()'>
</form>
<?php
//Deleting a record
if(isset($_POST['delete'])){
	$deleteid = $_POST['checkbox'];
	foreach($deleteid as $id){
	mysqli_query($dbconn, "DELETE FROM counter WHERE id='$id'");
		}
	echo '<script language="javascript">';
	echo 'Record has been Deleted';
	echo '</script>';
	echo'<meta http-equiv="refresh" content="0" url="visitor.php">';
}
if(isset($_POST['deleteall'])){
mysqli_query($dbconn, "TRUNCATE TABLE counter" );
echo '<script language="javascript">';
echo 'All records has been deleted';
echo '</script>';
echo'<meta http-equiv="refresh" content="0" url="visitor.php">';
exit();
}
?>

</div>
<script type='text/javascript'>
		function confirmDelete()
			{
				return confirm("You are about to delete selected record(s)?");
			}
		function confirmDeleteAll()
			{
				return confirm("Are you sure you want to delete all the records?");
			}
	</script>
	
<?php include ("includes/footer.php");?>