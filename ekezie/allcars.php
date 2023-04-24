<?php include ("adminheader.php");
 include ("includes/connect.php");
?>
<div class="container">
<?php
$result_per_page = 10;

$gethem = "SELECT * FROM cars";
$records = mysqli_query($dbconn, $gethem);
$count = mysqli_num_rows($records);
echo "<h1>You have total of $count Registered Cars </h1> ";

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


$gethem = "SELECT * FROM cars ORDER BY id DESC LIMIT $num, $result_per_page";
$records = mysqli_query($dbconn, $gethem);
$count = mysqli_num_rows($records);

if ($count>0){
	?>
	<hr>
	<table border="1" style= "min-width: 95%; font-size:12px">
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
			<th>ACTION</th>
		</tr>
	<?php
	$i=0;
	while($row = mysqli_fetch_array($records)){
		$i++;
		?>
		<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row['phone_number']; ?></td>
		<td><?php echo $row['owner']; ?></td>
		<td><?php echo $row['brand']; ?></td>
		<td><?php echo $row['model']; ?></td>
		<td><?php echo $row['doors']; ?></td>
		<td><?php echo $row['transmission']; ?></td>
		<td><?php echo $row['body']; ?></td>
		<td><?php echo $row['procode']; ?></td>
		<td><?php echo $row['mileage']; ?></td>
		<td><?php echo $row['engin']; ?></td>
		<td><?php echo $row['gas']; ?></td>
		<td><?php echo $row['town']; ?></td>
		<td><?php echo $row['province']; ?></td>
		<td><?php echo $row['price']; ?></td>
		<?php $id = $row['id']; 
		$statu = $row['status'];
		
		if($statu == "Available")
		{
				$status='<b style="color:green;">'.$statu.'</b>';
		}
		else{
				$status='<b style="color:red;">'.$statu.'</b>';
		}
		?>
		<?php	
	$carphoto = $row['image1'];
		if ($carphoto == "")
	{
		$carimage = "../images/Car.png";
	}
	else
	{
		$carimage = "../userdata/car_images/".$carphoto;
	}
	?>
		<td align="center"><a href="../Details.php?id=<?php echo $id;?>" target="_blank" ><img src="<?php echo "$carimage"; ?>" width='70' /></a></td>
		<td><?php echo $status; ?></td>

		<td><form action='car-edit.php?id=<?php echo $id; ?>' method='POST'>
		<input type="submit" name="edit" value='Manage'>		
		<br />
		</form>
		
		</td>
		</tr>
<?php
}
		echo"</table><p />";
}
else{
	echo "<h1> There is No Registered car Yet...</h1>"; 
}


for ($page=1;$page<=$number_of_pages;$page++)
		{
			?><a href="allcars.php?page=<?php echo $page; ?>"><?php echo $page." "; ?><a/><?php
		}

?>
<p /><a href="dashboard.php">Dashboard<a/>
</div>
<?php include ("includes/footer.php");?>