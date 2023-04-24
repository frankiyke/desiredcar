<?php include ("adminheader.php");
 include ("includes/connect.php");
?>
<div class="container">
<?php
$result_per_page = 7;

$gethem = "SELECT * FROM request";
$records = mysqli_query($dbconn, $gethem);
$count = mysqli_num_rows($records);
echo"<p />";
echo "<h1>You have total of $count Car(s) Request </h1> ";

$number_of_pages = ceil($count/$result_per_page);

if (!isset($_GET['page']))
{
	$page = 1;
}
else
{
		$page = $_GET['page'];
}

$num = ($page-1)*$result_per_page;


$gethem = "SELECT * FROM request ORDER BY id DESC LIMIT $num, $result_per_page";
$records = mysqli_query($dbconn, $gethem);
$count = mysqli_num_rows($records);

if ($count>0){
	?>
	<hr>
	<table border="1" style= "min-width: 95%; font-size:12px">
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
	$i=0;
	while($row = mysqli_fetch_array($records)){
		$i++;
		?>
		<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row['customerid']; ?></td>
		<td><?php echo $row['phone_number']; ?></td>
		<td><?php echo $row['owner']; ?></td>
		<td><?php echo $row['brand']; ?></td>
		<td><?php echo $row['model']; ?></td>
		<td><?php echo $row['doors']; ?></td>
		<td><?php echo $row['transmission']; ?></td>
		<td><?php echo $row['body']; ?></td>
		<td><?php echo $row['cylinder']; ?></td>
		<td><?php echo $row['mileage']; ?></td>
		<td><?php echo $row['engin']; ?></td>
		<td><?php echo $row['gear']; ?></td>
		<td><?php echo $row['gas']; ?></td>
		<td><?php echo $row['discription']; ?></td>
		<td><?php echo $row['drive']; ?></td>
		<td><?php echo $row['year']; ?></td>
		<?php $id = $row['id']; $carimage = "../images/Car.png";?>
		<td align="center"><a href="../Details.php?id=<?php echo $id;?>" target="_blank" ><img src="<?php echo "$carimage"; ?>" width='70' /></a></td>

		<td><form action='carrequests.php?id=<?php echo $id; ?>' method='POST'>
		<input type="submit" name="edit" value='Edit'>		
		<p />
		<input type="submit" name="" value='Delete'>
		</form>
		
		</td>
		</tr>
<?php
}
		echo"</table><p />";
}
else{
	echo "<h1> You have no request...</h1>"; 
}


for ($page=1;$page<=$number_of_pages;$page++)
		{
			?><a href="carrequest.php?page=<?php echo $page; ?>"><?php echo $page." "; ?><a/><?php
		}

?>
<p /><a href="dashboard.php">Dashboard<a/>
</div>
<?php include ("includes/footer.php");?>