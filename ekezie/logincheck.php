<?php
	session_start();
	
	if (!isset($_SESSION["user"]) || !isset($_SESSION["loggedIn"])){
		echo'<meta http-equiv="refresh" content="0;url=index.php">';
        exit();
	}
	else{
		
		$user=$_SESSION["user"];
		$email=$_SESSION["user"];
	}

?>