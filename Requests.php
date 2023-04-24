<?php include ("inc/headerview.php");

if (@!$_SESSION["user_login"]){
    echo'<meta http-equiv="refresh" content="0;url=Login">';
    exit();
    }else{}
?>

<section class="site-section">
  <div class="container">
	<div class="row justify-content-center">
	  <div class="col-md-7">
	  <p>Requested Cars  </p>
<?php	  
	$id = strip_tags(@$_POST['id']);


	if(isset($_POST['delete'])){
	
	$result = mysqli_query($dbconn, "DELETE FROM request WHERE id='$id'");
	
	if(!$result){ 
            echo "<script>alert('Unable to delete the car from Request list')</script>"; 
            }
			else
			{ 
            echo "<script>alert('Car deleted successfully from Request list')</script>";  
            } 
	
}
			$reque = "SELECT * FROM request WHERE customerid='$customerid'";
			$requ = mysqli_query($dbconn, $reque);
			$requested = (mysqli_num_rows($requ));			
			if ($requested > 0){
			$requ = mysqli_query($dbconn, $reque);
				while ($get = mysqli_fetch_array($requ)){
				$brand = $get['brand'];
				$body = $get['body'];
				$mileage = $get['mileage'];
				$model = $get['model'];
				$id = $get['id'];
				
	echo ' <div class="item">
            <div class="block-19">
                <div class="text">
                 
                	
				<table style="width: 100%";>
				
				  <tr>
							<td><img src="images/Car.png" alt="Image" class="img-fluid" width ="120"></a><br />
							'.$brand.'</a></td>
							<td>'.$model.'</td><td> '.$mileage .' KM'.'</td>
							<td><form action="" method="post">
							<input type="hidden" id="name" name="id" value="'.$id.'">
							<input type="submit" name="delete" value="Delete" onclick="return confirmDelete()">
							</form>
						</td>
					</tr>
				</table>					
                </div>
              </div>
          </div>
		 ';
		
			}
		}
		else
		{
			echo '	<div class="item">
						<div class="block-19">
							<div class="text">
							No car Requested!
							
							</div>
						</div>
					</div>';
		}

?>

</div>
</div>
</div>
</section>
<script type='text/javascript'>
		function confirmDelete()
			{
				return confirm("Are you sure you want to delete this car?");
			}
	</script>
   <?php include ("./inc/footer.php");?>