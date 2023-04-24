<?php include ("adminheader.php");
$msg = '';
$result_per_page = 20;
$id = @$_POST['id'];
		    if(isset($_POST['delete'])){
			mysqli_query($dbconn, "DELETE FROM cars WHERE id='$id'");
			$msg = "<p />Car Deleted!";
			echo'<meta http-equiv="refresh" content="0">';
			exit();
	}
$checks = "SELECT * FROM cars";
		$check = mysqli_query($dbconn, $checks);
		$num = mysqli_num_rows($check);
		$count = mysqli_num_rows($check);
		$number_of_pages = ceil($count/$result_per_page);
		
	
	if (!isset($_GET['page']) || ($_GET['page'])<1)
	{
	$page = 1;
	}
	else
	{
		$page = $_GET['page'];
	}
	
	$num = ($page-1)*$result_per_page;
?>
    
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 text-center section-heading">
            <h2 class="text-primary heading">Added Cars</h2>
            <p><?php echo "You have total of ".$num." cars, please click on any of the images below to edit.";?></p>
			Click on <a href="includes/checks2.php"><< Add more >></a> to add more cars
			<span style="color:red;"><?php echo $msg; ?></span>
          </div>
        </div>
        <div class="row">
			<?php  
			
			$gethem ="SELECT * FROM cars ORDER BY id DESC LIMIT $num,$result_per_page";
		    $checked = mysqli_query($dbconn, $gethem);
			while ($get = mysqli_fetch_array($checked)){
				$engin = $get['engin'];
				$year = $get['year'];
				$province = $get['province'];
				$brand =$get['brand'];
				$gas =$get['gas'];
				$model =$get['model'];
				$picture1 = $get['image1'];
				$id = $get['id'];
				$price = $get['price'];
				$status = $get['status'];
	if ($picture1 == "")
	{
		$pic1 = "../images/Car.png";
	}
	else
	{
		$pic1 = "../userdata/car_images/".$picture1;
	}
				
				?>
          <div class='col-md-6 col-lg-3'>
            <div class='media block-6 d-block'>
              <div class='icon mb-3'><?php echo "<a href='listingmore.php?id=$id'><img src='$pic1' height ='100'></a>"; ?></span></div>
              <div class='media-body'>
                <b><?php echo $brand;?></b><br />
                <span style="font-size:12px;">
				<b><?php echo $model." ".$year;?></b><br /><b>R <?php echo $price; ?></b><br />
				<form action='' method='POST'>
						<input type='hidden' name='id' value='<?php echo $id; ?>'/>
						<input type='submit' name='delete' value='Delete Car' onclick='return confirmDelete()'>
						</form>
				</span>
					<hr>
              </div>
            </div> 
          </div>
		  <?php }
		  ?>
			         
          <a href="includes/checks2.php"> Add more Cars >></a>
        </div>
      </div>
		<div class="row mb-5">
              <div class="col-md-12 text-center">
                <div class="block-27">
                  <ul>
				<?php
				  if($page>1){
					  echo'<li><a href="Allcars?page='.($page-1).'">&lt; &lt;</a></li>';
				  }
				  
						for ($page=1;$page<=$number_of_pages;$page++)
						{
							?><li><a href="listedcars.php?page=<?php echo $page; ?>"><?php echo $page." "; ?></a></li><?php
						}
						
						
						 if($page<1){
					  echo'<li><a href="listedcars.php?page='.($page-1).'">&gt; &gt;</a></li>';
				  }				
				  if(@$_GET['page']>=1){
				  echo"<br>PAGE ". $_GET['page'];
				  }else{}
					?>
				</ul>
                </div>
              </div>
            </div>
    <!-- END section -->


    


    
<?php include ("includes/footer.php");?>
	  
	  <script type='text/javascript'>
		function confirmDelete()
			{
				return confirm("Are you sure you want to delete this Car?");
			}
	</script>