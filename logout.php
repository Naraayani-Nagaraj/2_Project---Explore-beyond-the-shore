<?php
	session_start();
	session_destroy();
	unset($_SESSION['username']);
	$_SESSION['message'] = "logged out";
	header("location: 1firstpage.php");
?>