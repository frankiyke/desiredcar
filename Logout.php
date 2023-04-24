<?php
session_start();
if (isset($_SESSION['user_login']))
{
    unset($_SESSION['user_login']);
	echo'<meta http-equiv="refresh" content="0;url=Allcars">';
	exit();
}
?>