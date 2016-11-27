<?php
	session_start();
	unset($_SESSION['usertoken']);
	header('location: http://' . $_SERVER['HTTP_HOST']);
?>