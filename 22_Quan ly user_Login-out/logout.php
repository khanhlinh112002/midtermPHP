<?php
	session_start();
	session_unset();
	session_destroy();
	header('location:../14_Them Giohang/index.php');
	exit();
?>