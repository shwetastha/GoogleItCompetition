<?php 
			session_start();
			unset($_SESSION['username']);
			unset($_SESSION['email']);
			unset($_SESSION['error']);
			session_destroy();
			header("Location: login.php");
?>