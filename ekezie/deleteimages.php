<?php
include ("adminheader.php");

if(isset($_POST['delete']))
{
 $filename = $_POST['file_name'];
 unlink('../userdata/car_images/'.$id_number.'/'.$filename);
 echo '<section class="site-section">
<div class="container">The image has been successfully deleted';
 }
?>
<section class="site-section">
<div class="container">
<div class="row align-items-center">
  <p>Please be careful not to delete the worng image, else you will have to reupload the image<p />         
<?php
$folder = "../userdata/car_images/$id_number";
?>
<div class="row">
<?php
if ($dir = opendir($folder))
{
 while (($file = readdir($dir)) !== false)
 {
  if ($file){
  echo "<div class='col-md-6 col-lg-3'>";
  echo "<div class='media block-6 d-block' style='border: 3px solid  #14e0f1'>";
  echo "<form method='post' action=''>";
  echo "<input type='hidden' name='file_name' value='".$file."'>";
  echo "<image src='../userdata/car_images/$id_number/$file' width =100%><br />";
  echo $file."<br />";
  echo "<input type='submit' name='delete' value='Delete ($file)' onclick='return confirmDelete()'><br />";
  echo "</form>";
  echo "</div>";
  echo "</div>";
  }
  else
  {}
 }
 closedir($dir);
}
?>
</div>
</section>
<script type='text/javascript'>
		function confirmDelete()
			{
				return confirm("Are you sure you want to delete this image ?");
			}
	</script>
<?php
include ("includes/footer.php");
?>