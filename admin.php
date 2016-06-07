<?php
	session_start();
	if(isset($_SESSION['admin-logged'])){
		header("Location: admin-home.php");
	}
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>IT Meet 2013 - Googling Challenge</title>
  <link rel="stylesheet" href="css/style_template.css">
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
<div class="main">
	<div id="header">
		<div id="logo"><div class="year">2013</div><div class="sub-text">IT MEET</div></div>
		<div id="header_text">
			GOOGLE YOUR WAY
		</div>
		</div>
		<div class="error_message">
		<?php
			if(isset($_SESSION['error'])){
				echo '<font color="red">'.$_SESSION['error'].'</font>';
				unset($_SESSION['error']);
			}
		?>
		</div>
	  <form class="login" method="POST" action="admin-home.php">
		<p>
		  <label for="login">Username:</label>
		  <input type="text" name="admin-name" id="login" placeholder="sagar1992"/>
		</p>

		<p>
		  <label for="password">Password:</label>
		  <input type="password" name="admin-password" />
		</p>
		<p class="login-submit">
			<button type="submit" name="submit-admin" class="login-button">Login</button>
		</p>
	  </form>
</div>
</body>
</html>
