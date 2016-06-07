<?php 
	session_start();
	$server_ip_address = "192.168.20.119";
		if((isset($_POST['submit-admin']))){
			$admin_name = $_POST['admin-name'];
			$admin_password = $_POST['admin-password'];
			$table_name = "admin";
			$status = false;
			/*$query = "SELECT `admin-name`, `admin-password` FROM '" . $table_name."`";
			$result = mysql_query($query);
			$status = false;
			while ($row = mysql_fetch_array($result)) {
				if ($row['admin-name'] == $admin_name && $row['admin-password'] == $admin_password) {
					$status = true;
				}
			} */
			if($admin_password == "itmeet-2013!123"){
				$_SESSION['admin-logged'] = "admin-logged";
			}else{
				$_SESSION['error'] = $admin_name.' '.$admin_password;
				header("location: admin.php");
			}
			
		}else{
			if(isset($_SESSION['admin-logged'])){
				
			}else{
				$_SESSION['error'] = "hello";
				header("location: admin.php");
			}
		}
	
?>
<html>
<head><title></title>
 <link href="css/table.css" rel="stylesheet">
 <link href="css/style.css" rel="stylesheet">
 <link href="css/style_template.css" rel="stylesheet">
<script src="jquery-2.0.2.js"></script>
<script> 
		$(document).ready(function(){
			$.ajaxSetup({cache: false});
			$("#show-time").load('http://<?php echo $server_ip_address;?>/googling/servertime.php #disp');
			setInterval(function(){
				$("#show-time").load('http://<?php echo $server_ip_address;?>/googling/servertime.php #disp');
			}, 10000);
		}); 
		</script>
</head>
<body style="background:white !important;">
<div class="main">
	<div id="header">
		<div id="logo"><div class="year">2013</div><div class="sub-text">IT MEET</div></div>
		<div id="header_text">
			GOOGLE YOUR WAY
		</div>
		</div>
	<div id="content">
	<iframe style="height:220px;width:400px;" name="settime" src="http://<?php echo $server_ip_address;?>/googling/settime.php"></iframe>
	<iframe style="height:220px;width:200px;" name="startstop" src="http://<?php echo $server_ip_address;?>/googling/startstop.php"></iframe>
	<div class="heading">SERVER TIME</div>
	<div id="show-time"></div>
	
	</div>
	<div class="question-answer-block" style="margin-top:-120px;margin-bottom:20px;">
		<div class="heading">Question and Answer</div>
		<div class="container">
			<div class="table-row">
			<form method="POST" action="question_answer.php">
				<div class="col"><a href="add-question-answer.php" target="_blank">ADD</a></div>
				<div class="col">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
				<div class="col"><a href="show-list.php" target="_blank">SHOW LIST</a></div>
			</form>
			</div>
		</div>
	</div>
	</div>
	<div class="heading"><a href="logout.php">Logout</a></div>
	<div id="footer">Developed By <a href="https://www.odesk.com/o/profiles/users/Web_Programming_Expert_Sagar_Pathak_~01ebcb0ff243392018/">Sagar Pathak</a></div></div>
</body>
</html>