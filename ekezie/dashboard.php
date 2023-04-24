<?php
include ("adminheader.php");
include ("includes/connect.php");
?>

 <div class="site-section bg-light">
      <div class="container">
	  <h2 class="heading text-center mb-4">
		<?php echo "Hello " .$name.", Welcome to Desired Car admin Section.<p />";?>
	 </h2>
<?php
$reque = "SELECT * FROM request";
$requ = mysqli_query($dbconn, $reque);
$requested=(mysqli_num_rows($requ));

$clien = "SELECT * FROM clients";
$client = mysqli_query($dbconn, $clien);
$clients=(mysqli_num_rows($client));

$gethem = "SELECT * FROM dealers ORDER BY id DESC";
$records = mysqli_query($dbconn, $gethem);
$count = mysqli_num_rows($records);

$checks = "SELECT * FROM cars";
		$check = mysqli_query($dbconn, $checks);
		$num = mysqli_num_rows($check);
		
$sales = "SELECT * FROM cars WHERE status='Sold'";
		$sold = mysqli_query($dbconn, $sales);
		$numsold = mysqli_num_rows($sold);
		
$counting = "SELECT * FROM counter";
		$countings = mysqli_query($dbconn, $counting);
		$counted = mysqli_num_rows($countings);

$user = $_SESSION["user"]; 
?>
<style>
#progressbar {
  background-color:  #c9caca;
  border-radius: 13px;
  /* (height of inner div) / 2 + padding */
  padding: 3px;
  width:95%;
}

#progressbar>div {
  background-color:#00b9c8;
  max-width:100%;
  width:<?php echo $counted;?>%;
  /* Adjust with JavaScript */
  height: 20px;
  border-radius: 10px;
}
</style>
				<div class="row">
					<div class='col-md-6 col-lg-3'>
						<a href="subscribers.php">
							<p style='border: 10px solid #c2f6fa; border-radius:5px; background: #c2f6fa; width:80%; height:80%; text-align: center; color: #000;' >
								Manage your Subscribers
							</p>
						</a> 
					</div>
					
					<div class='col-md-6 col-lg-3'>
						<a href="clients.php">
							<p style='border: 10px solid #c2f6fa; border-radius:5px; background: #c2f6fa; width:80%; height:80%; text-align: center; color: #000;' >
								Manage clients  <?php echo '('.$clients.')';?>
							</p>
						</a>
					</div>
					
					<div class='col-md-6 col-lg-3'>
						<a href="listedcars.php">
							<p style='border: 10px solid #c2f6fa; border-radius:5px; background: #c2f6fa; width:80%; height:80%; text-align: center; color: #000;' >
								<?php echo 'Manage your cars ('.$num.')';?>
							</p>
						</a>
					</div>					
										
					<div class='col-md-6 col-lg-3'>
						<a href="allcars.php">
							<p style='border: 10px solid #c2f6fa; border-radius:5px; background: #c2f6fa; width:80%; height:80%; text-align: center; color: #000;' >
								Update Car Prices
							</p>
						</a>
					</div>
					
					<div class='col-md-6 col-lg-3'>
						<a href="carrequest.php">
							<p style='border: 10px solid #c2f6fa; border-radius:5px; background: #c2f6fa; width:80%; height:80%; text-align: center; color: #000;' >
								<?php echo 'Car Requests ('.$requested.')';?>
							</p>
						</a>
					</div>
															
					<div class='col-md-6 col-lg-3'>
						<a href="carlookup.php">
							<p style='border: 10px solid #c2f6fa; border-radius:5px; background: #c2f6fa; width:80%; height:80%; text-align: center; color: #000;' >
								Lookup for car Owner
							</p>
						</a>
					</div>
					
					<div class='col-md-6 col-lg-3'>
						<a href="allusers.php">
							<p style='border: 10px solid #c2f6fa; border-radius:5px; background: #c2f6fa; width:80%; height:80%; text-align: center; color: #000;' >
								Manage Admin Users
							</p>
						</a>
					</div>
					
					<div class='col-md-6 col-lg-3'>
						<a href="team.php">
							<p style='border: 10px solid #c2f6fa; border-radius:5px; background: #c2f6fa; width:80%; height:80%; text-align: center; color: #000;' >
								Add Staff
							</p>
						</a>
					</div>
									
					<div class='col-md-6 col-lg-3'>
						<a href="managestaffs.php">
							<p style='border: 10px solid #c2f6fa; border-radius:5px; background: #c2f6fa; width:80%; height:80%; text-align: center; color: #000;' >
								Manage Staffs
							</p>
						</a>
					</div>
					
					<div class='col-md-6 col-lg-3'>
						<a href="diagnostic.php">
							<p style='border: 10px solid #c2f6fa; border-radius:5px; background: #c2f6fa; width:80%; height:80%; text-align: center; color: #000;' >
								Add Brand For Diagnostic
							</p>
						</a>
					</div>
					
					<div class='col-md-6 col-lg-3'>
						<a href="managebrands.php">
							<p style='border: 10px solid #c2f6fa; border-radius:5px; background: #c2f6fa; width:80%; height:80%; text-align: center; color: #000;' >
								Manage Brands & Logos
							</p>
						</a>
					</div>
					
					<div class='col-md-6 col-lg-3'>
						<a href="dealers.php">
							<p style='border: 10px solid #c2f6fa; border-radius:5px; background: #c2f6fa; width:80%; height:80%; text-align: center; color: #000;' >
								Manage Dealers <?php echo '('.$count.')';?>
							</p>
						</a>
					</div>
										
					<div class='col-md-6 col-lg-3'>
						<a href="deleteimages.php">
							<p style='border: 10px solid #c2f6fa; border-radius:5px; background: #c2f6fa; width:80%; height:80%; text-align: center; color: #000;' >
								Remove car Images
							</p>
						</a>				 
					</div>
					
					<div class='col-md-6 col-lg-3'>
						<a href="soldcars.php">
							<p style='border: 10px solid #c2f6fa; border-radius:5px; background: #c2f6fa; width:80%; height:80%; text-align: center; color: #000;' >
								<?php echo 'Sold Cars('.$numsold.')';?>
							</p>
						</a>
					</div>							
						
					<div class='col-md-6 col-lg-3'>
						<a target= "_blank" href="https://desiredcar.co.za:2096">
							<p style='border: 10px solid #c2f6fa; border-radius:5px; background: #c2f6fa; width:80%; height:80%; text-align: center; color: #000;' >
								Check Emails
							</p>
						</a>
					</div>
					
					<div class='col-md-6 col-lg-3'>
					<a href="logout.php">
							<p style='border: 10px solid #c2f6fa; border-radius:5px; background: #c2f6fa; width:80%; height:80%; text-align: center; font-size:18px;color:red' >
								 Logout <i class="fa fa-power-off"></i>
							</p>
					</a>		
					</div>
					</div>
					Visitor's Progess bar is <?php echo $counted.'%';?>
			        <a href="visitors.php"><div id="progressbar">
                            <div></div>
                        </div></a>
</div></div>
<?php include ("includes/footer.php");?>