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
<?php	  
	$id = strip_tags(@$_POST['id']);


	if(isset($_POST['delete'])){
	
	$result = mysqli_query($dbconn, "DELETE FROM booking WHERE id='$id'");
	
	if(!$result){ 
            echo "<script>alert('Unable to delete the car from favourite list')</script>"; 
            }
			else
			{ 
            echo "<script>alert('Car deleted successfully from favourite list')</script>";  
            } 
	
}
			$check = "SELECT * FROM booking WHERE email='$email'";
			$checks = mysqli_query($dbconn, $check);
			$count=(mysqli_num_rows($checks));			
			if ($count){
				//echo "Below is Your Search result for $search<p /><hr><p />";
				while ($get = mysqli_fetch_array($checks)){
				$carid = $get['carid'];
				$price = $get['price'];
				$carname = $get['car_name'];
				$model = $get['model'];
				$image = $get['image1'];
				$id = $get['id'];
				
	echo ' <div class="item">
            <div class="block-19">
                <div class="text">
                  
                	
				<table style="width: 100%";>
				  <tr>
							<td><a href="Details?id='.$carid.'"><img src="'.$image.'" alt="Image" class="img-fluid" width ="120"></a><br />
							<a href="Details?id='.$carid.'">'.$carname.'</a></td>
							<td>'.$model.'</td><td>R '.$price .' '.'<a href="Details?id='.$carid.'"><span> View</span></a></td>
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
							No car saved!
							
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