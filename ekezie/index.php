<?php
session_start();
	include ("includes/connect.php");
	$error= "";
	if(@$_SESSION["user"]){header("Location: carlookup.php");}
	if (isset($_POST["logIn"])){
		$connection = new mysqli($webhost, $dbuser, $dbpass,$dbname);
		
		$user = $connection->real_escape_string($_POST["user"]);
		$passwords = $connection->real_escape_string($_POST["password"]);
		$password =md5($passwords);
		$data = $connection->query("SELECT * FROM users WHERE email='$user' AND password='$password'");

		if ($data->num_rows > 0){
			$_SESSION["user"] = $user;
			$_SESSION["loggedIn"] = 1;
			
			header("Location: dashboard.php");
		}
		else{
				$error= "Wrong Login credentials!";
		}
		}
?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Adim User</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="shortcut icon" href="images/logo.png">
	</head>
	<body>
		<div class="box">
			<h2>Admin Login</h2>
			<form action="index.php" method="POST">
			<span style="color: red; background: #fff;"><?php echo $error; ?></span>
				<div class="inputBox">
					<input type="text" name="user" required="">
					<label>Username</label>
				</div><p />
				<div class="inputBox">
					<input type="password" name="password" required="">
					<label>Password</label>
				</div>
				
				<input type="submit" name="logIn" value="Login >>">
			</form>
		</div>
		</b><p /><p />
		<p />
		<div class="box-power">
		<?php @$date = date(Y); ?>
			<p /><br /><b>All Right Reserved &copy; <?php echo "$date"; ?></b><p /><p /> 
			<a href="https://www.desiredcar.co.za"><img src="images/logo.png" width="50" name="Desired Car Logo..."></a>
		</div>
	</body>
	
</html>