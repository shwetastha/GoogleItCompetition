<?php
session_start();
if(isset($_SESSION['user_email'])){
	header("Location: client.php");
}		
include 'initials/connection.php';
if (isset($_POST['submit_name'])) {
	if(isset($_SESSION['user_email'])){
		header("Location: client.php");
	}else{
	//reading question number
			$foldername = "data";
			$my_file = $foldername.'/cur_question';
			$handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file); //implicitly creates file
			$cur_question = fread($handle,filesize($my_file));
			fclose($handle);
	//
	//reading session number
			$foldername = "data";
			$my_file = $foldername.'/set_session';
			$handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file); //implicitly creates file
			$session_no = fread($handle,filesize($my_file));
			fclose($handle);
	//

			$username = $_POST['username'];
			$email    = $_POST['email'];
			$query = 'INSERT INTO `user`( `name`, `question_id`, `email`, `session_id`) VALUES ("'.$username.'",'.$cur_question.',"'.$email.'",'.$session_no.')';
			if(mysql_query($query)){
				$_SESSION['username'] = $username;
				$_SESSION['user_email'] = $email;
			//setting waiting response from server message
				$my_file = 'checkresponse.php';
				$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
				$data = 3;
				fwrite($handle, $data);
				fclose($handle);
				echo $username.' adfs '. $email;
			    header("Location: client.php");
			}else{
				echo "error login ". die(mysql_error());
			} 
		}
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
  <script type="text/javascript">
		<!--
		function validateEmail() {
			var emailText = document.getElementById('email').value;
			var pattern = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;
			if (pattern.test(emailText)) {
				return true;
			} else {
				document.getElementById("error_message").innerHTML = "Invalid email address";
				//alert('Bad email address: ' + emailText);
				return false;
			}
		}

		window.onload = function() {
			document.getElementById('login').onsubmit = validateEmail;
		}
</script>
</head>
<body>
<div class="main">
	<div id="header">
		<div id="logo"><div class="year">2013</div><div class="sub-text">IT MEET</div></div>
		<div id="header_text">
			GOOGLE YOUR WAY
		</div>
		</div>
		<font color="red">
	<div id="error_message" class="error_message">
		<?php
			if(isset($_SESSION['error'])){
				echo $_SESSION['error'];
				unset($_SESSION['error']);
			}
		?>
		
		</div>
		</font>
	  <form id="login" class="login" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<p>
		  <label for="login">Full Name:</label>
		  <input type="text" name="username" id="login" placeholder="itmeet 2013">
		</p>

		<p>
		  <label for="password">Email:</label>
		  <input type="text" id="email" name="email" placeholder="itmeet2013@gmail.com">
		</p>

		<p class="login-submit">
		  <button type="submit" name="submit_name" class="login-button">Login</button>
		</p>
	  </form>
</div>
</body>
</html>
