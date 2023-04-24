<?php include ("adminheader.php");
$msg = '';
$result_per_page = 20;
$id = @$_POST['id'];
		    if(isset($_POST['delete'])){
			mysqli_query($dbconn, "DELETE FROM cars WHERE id='$id'");
			$msg = "<p />Car Deleted!";
			echo'<meta http-equiv="refresh" content="0;url=listedcars.php">';
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
            <p><?php echo "Please click on any of the images below to edit logo.";?></p>
			Click on <a href="diagnostic.php"><< Add another logo >></a> to add more brand
			<span style="color:red;"><?php echo $msg; ?></span>
          </div>
        </div>
		<div class="row">	
	<?php	
	 //"SELECT * FROM diagnostic";
	$checks = "SELECT * from diagnostic ORDER BY brand";
		$check = mysqli_query($dbconn, $checks);
		$num = mysqli_num_rows($check);
		while ($get = mysqli_fetch_array($check)){
				$brand =$get['brand'];
				$logoname =$get['logoname'];
				$picture1 = $get['image'];
				$id = $get['id'];
	if ($picture1 == "")
	{
		$pic1 = "../images/brandlogo.png";
	}
	else
	{
		$pic1 = "../userdata/car-logo/".$picture1;
	}
	
    ?>
        <div class='col-md-6 col-lg-3'>
            <div class='media block-6 d-block' style="padding-right:10px">
              <div class='icon mb-3'><?php echo "<img src='$pic1' title='$brand' height ='80'></a>"; ?>
              <form  action='diagnostic.php?id=<?php echo $id; ?>' method='POST'>
			    <p style="padding-left:17px;"><input type="submit" name="edit" value='Edit'><p />
			  </form>
            </div>
        </div>
        </div>      
          
		  <?php } ?>
		
        </div>
      </div>
		<div class="row mb-5">
              <div class="col-md-12 text-center">
                <div class="block-27">
                  <ul>
				<?php
				  if($page>1){
					  echo'<li><a href="managebrands.php?page='.($page-1).'">&lt; &lt;</a></li>';
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