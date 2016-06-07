<?php
	session_start();
	if(!isset($_SESSION['admin-logged'])){
		header("Location: admin.php");
	}
?>
<?php
if(isset($_POST['add-more'])){
	header("Location: add-question-answer.php");
}
?>
<html>
<head><title></title></head>
<body>
<font size="20" color="green">QUESTION HAS BEEN ADDED SUCCESSFULLY</font>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="submit" name="add-more" value="ADD MORE"/>
</form>
</body>
<html>