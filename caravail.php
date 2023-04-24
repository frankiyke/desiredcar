<?php
require ("inc/connect.php");
$status=$_GET["status"];
if ($status!="")
{
	$discselect=mysqli_query($dbconn,"SELECT * FROM carstatus WHERE status='$status'");
	echo '<textarea name="discription" placeholder="Write Message..." required class="form-control py-2" cols="30" rows="4">';
		while($row=mysqli_fetch_array($discselect))
		{
			echo $row["discription"];
		}
		echo '</textarea>';
}
?>