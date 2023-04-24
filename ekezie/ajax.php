<?php
require ("includes/connect.php");
$province=$_GET["province"];

if ($province!="")
{
	$city=mysqli_query($dbconn,"SELECT * FROM cities WHERE province='$province'");
	echo "<select class='form-control py-2' name='town' required='require'>";
		while($row=mysqli_fetch_array($city))
		{
			echo "<option>"; echo $row["cityname"]; echo "</option>";
		}
	echo "</select>";
}
?>