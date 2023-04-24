<?php 

	function cars(){
		include ("connect.php");
		
		$carq = "SELECT * FROM cars WHERE id='$id'";
		$fetch_cat = mysqli_query($dbconn, $carq);
		$row = mysqli_fetch_array($fetch_cat)
				$row[''];
				$row[''];
				$row[''];
				$row[''];
				$row[''];
		}

include ("./inc/footer.php");

?>