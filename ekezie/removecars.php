<script type='text/javascript'>
		function confirmDelete()
			{
				return confirm("Are you sure you want to delete this image");
			}
	</script>

<?php
include ("./inc/header.php");
// <-- END header -->

if (!$email)
	header("location: login.php");
else {
	//listingmore.php?id=$id
}


if(isset($_POST['delete']))
{
 $filename = $_POST['file_name'];
 @unlink('userdata/car_images/'.$id_number.'/'.$filename);
 echo '<section class="site-section">
<div class="container">The image has been successfully deleted';
 }
?>
<section class="site-section">
<div class="container">
<?php
echo "Please be careful not to delete the worng image, else you will have to reupload the image";
$folder = "userdata/car_images/$id_number/";
if ($dir = opendir($folder))
{
 while (($file = readdir($dir)) !== false)
 {
  if ($file){
  echo "<hr></p>";
  echo "<p>".$file."</p>";
  echo "<form method='post' action='removecars.php'>";
  echo "<input type='hidden' name='file_name' value='".$file."'>";
  echo "<image src='userdata/car_images/$id_number/$file' height='100'><p />";
  echo "<input type='submit' name='delete' value='Delete Image' onclick='return confirmDelete()'>";
  echo "</form>";
  }
  else
  {}
 }
 closedir($dir);
}
?>
</div>
</section>
<?php include ("includes/footer.php");?>
