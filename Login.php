<?php include ("./inc/headerview.php");?>
<!-- END header -->
<?php
if (@$_SESSION["user_login"]){
    echo'<meta http-equiv="refresh" content="0;url=index">';
    exit();
    }else{}

$error = '';
// user login code section
		if (isset($_POST["user_login"]) && isset($_POST["password_login"])){
			//$user_login = preg_replace('#[^A-Za-z0-9]#i', '',$_POST["user_login"]); //filters off characters
			$user_login = strip_tags($_POST['user_login']);
			$password_login = preg_replace('#[^A-Za-z0-9]#i', '',$_POST["password_login"]);
			$password_login_md5 = md5($password_login);
		$sql = "SELECT id FROM clients WHERE email='$user_login' AND password='$password_login_md5' LIMIT 1";
		$sqlog = mysqli_query($dbconn, $sql);
		$userCount = mysqli_num_rows($sqlog);
		if ($userCount == 1){
			while($row = mysqli_fetch_array($sqlog)){
				$id = $row["id"];
		}
			$_SESSION["user_login"] = $user_login;
		echo'<meta http-equiv="refresh" content="0;url=index">';
        exit();
		} else { 
		$error = 'That information is incorrect, <a href =""> try again</a>';
		
		}
		}
?>

     <section class="site-section" style="background-image: url(images/big_image_2.jpg);">
	  <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7">
            <div class="form-wrap">
              <h2 class="mb-4"><p />Log in with your account</h2>
              <form action="" method="post">
                <div class="row">
                  <div class="col-md-12 form-group"><?php echo $error; ?><br />
                    <label for="name">Email</label>
                    <input type="text" id="name" name="user_login" class="form-control py-2">
                  </div>
                </div>
                <div class="row mb-5">
                  <div class="col-md-12 form-group">
                    <label for="name">Password</label>
                    <input type="password" id="name" name="password_login" class="form-control py-2">
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 form-group">
                    <input type="submit" value="Login" name="login" class="btn btn-primary px-5 py-2">
                  </div>
                </div>
              </form>
				<div class="row">
					<div class="col-md-6 form-group">
						<p /><p /><b ><a href="Forgotpassword">Forgot Password</b></a>
					</div>
				</div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- END section -->
    
<?php include ("./inc/footer.php");?>