<?php 
	session_start();
	include 'include/Admin.php';
	$logout = $su->logout();
	if ($logout == 1) {
		header("location:login.php");
	}else{
		header("location:index.php?error_logout");
	}

 ?>