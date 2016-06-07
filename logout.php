<?php
	session_start();
	unset($_SESSION['admin-logged']);
	session_destroy();
	header("Location: admin.php");
?>