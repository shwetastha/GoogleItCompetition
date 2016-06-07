<?php
	ini_set('max_execution_time', 0);
	$server_ip_address = "192.168.20.119";
	session_start();
	$url = "http://".$server_ip_address."/googling/servertime.php";
	if(isset($_SESSION['username'])){
		//reading question number
			$foldername = "data";
			$my_file = $foldername.'/cur_question';
			$handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file); //implicitly creates file
			$question_no = fread($handle,filesize($my_file));
			fclose($handle);
		//
			
			include 'initials/connection.php';
			$table_name = 'qanda';
			$query = 'SELECT `question` FROM `'.$table_name.'` WHERE `id` ='.$question_no;
			$result = mysql_query($query);
			while ($row = mysql_fetch_array($result)) {
					$question = $row['question'];
			}
	}else{
		header("Location: login.php"); //session expired
	}
?>
<?php
	if(isset($_POST['submit-answer'])){
	ob_start();
		if(isset($_SESSION['user_email'])){
			$user_email = $_SESSION['user_email'];
			$user_answer = trim($_POST['user_answer']);
			$table_name = 'qanda';
			$query = 'SELECT `answer` FROM `'.$table_name.'` WHERE `id` ='.$question_no;
			$result = mysql_query($query);
			$status = false;
			while ($row = mysql_fetch_array($result)) {
				if(strtolower($user_answer) == strtolower($row['answer']))
					$status = true;
			}
		//scraping time from server
				$get_send_time = file_get_contents($url);
				$regex_min = '/>(.+?)min/';
				$regex_sec = '/min(.+?)sec/'; //need to change this one
				preg_match($regex_min,$get_send_time,$send_time_m); 
				preg_match($regex_sec,$get_send_time,$send_time_s);
				$send_time_sec = ($send_time_m[1] * 60) + $send_time_s[1]; //echo $send_time_s[1];
		//
		//getting session_no from file
				$my_file = $foldername.'/set_session';
				$handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file); //implicitly creates file
				$session_no = fread($handle,filesize($my_file));
				fclose($handle);
		//
		//getting question_no from file
				$my_file = $foldername.'/cur_question';
				$handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file); //implicitly creates file
				$question_id = fread($handle,filesize($my_file));
				fclose($handle);
		//
		//getting user_id  from database
				$table_name = 'user';
				$query = 'SELECT `user_id`, `name`, `question_id`, `email` FROM `user` WHERE `email` = "'.$user_email.'"';
				$result = mysql_query($query);
				$user_id = "";
				$multiple_time = false;
				
				while ($row = mysql_fetch_array($result)) {
						$user_id     = $row['user_id'];
				}
		//
			if ($status == true) {
			/*	$query = 'SELECT `user_id` FROM `users_correct_answer` WHERE (`user_id` = '.$user_id.' AND `session_id` = '.$session_no.');';
				$result = mysql_query($query);
				while($row = mysql_fetch_array($result)){
					if($user_id == $row['user_id']){
						$multiple_time = true;
					}
				}  
				if($multiple_time == true){
					$no_again = "already provided the correct answer";
				}else{  */
				
					$query = 'SELECT * FROM `users_correct_answer` WHERE `user_id` = '.$user_id.' ;';
					$result = mysql_query($query);
					$prev_c_answer  = "";
					$prev_c_send_time = "";
					$prev_session_no = "";
					$prev_quesion_id = "";
					$another_session = false;
					
					while($row = mysql_fetch_array($result)){
						if($user_id == $row['user_id']){
							$another_session = true;
							$prev_c_answer = $row['answers'];
							$prev_c_send_time = $row['send_time'];
							$prev_session_no = $row['session_id'];
							$prev_quesion_id = $row['question_id'];
						}
					}
					if($another_session == true){
						$a_questions = $prev_quesion_id . ", ".$question_id;
						$a_answers = $prev_c_answer. ", ".$user_answer;
						$a_send_time = $prev_c_send_time . ", ".$send_time_sec;
						$a_session_id = $prev_session_no . ", ".$session_no;
						$query = 'UPDATE `users_correct_answer` SET `question_id`= "'.$a_questions.'" ,`answers`= "'.$a_answers.
						'",`send_time`= "'.$a_send_time.'",`session_id`= "'.$a_session_id.'" WHERE `user_id` = '.$user_id.';';
						mysql_query($query) or die("Update + into correct answer table ".mysql_error());
						$again_correct = "again correct answer";
					}else{
						$query = 'INSERT INTO `users_correct_answer`(`user_id`, `question_id`, `answers`, `send_time`, `session_id`) VALUES ('.$user_id.','.$question_id.',"'.$user_answer.'",'.$send_time_sec.','.$session_no.')';
						mysql_query($query) or die("Insert into correct answer table ".$another_session."  -->".mysql_error());
						$success = "correct answer";
					}
			//	}
					
			} else {
				$fail = "wrong answer";
				//check for previously wrong answered answer. 
				$query = 'SELECT * FROM `users_wrong_answer`'; 
				//if(mysql_query($query)){
				
				$result = mysql_query($query);
				if($result){
					$user_id_found = false;
					$prev_answer = "";
					$prev_send_time = "";
					while($row =  mysql_fetch_array($result)){
						if($user_id == $row['user_id']){
							$user_id_found = true;
							$prev_answer = $row['answers'];
							$prev_send_time = $row['send_time'];
						}
					}
					if(!$user_id_found){
							$query = 'INSERT INTO `users_wrong_answer`(`user_id`, `question_id`, `answers`, `send_time`, `session_id`) VALUES ('.$user_id.','.$question_id.',"'.$user_answer.'",'.$send_time_sec.','.$session_no.')';
								mysql_query($query) or die("Insert into wrong answer table ".mysql_error());
								
						}else{
							$update_ans = $prev_answer.",".$user_answer;
							$update_time = $prev_send_time.",".$send_time_sec;
							
							$query = 'UPDATE `users_wrong_answer` SET `answers`="'.$update_ans.'",`send_time`="'.$update_time.'" WHERE `user_id` = '.$user_id;
							mysql_query($query) or die("Update into wrong answer table ".mysql_error());
						}
				}
}
}else{
				header("location: login.php"); //SESSION EXPIRED
}
unset($_POST['submit-answer']);
ob_clean();
ob_flush();
ob_end_flush();
flush();
}
?>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Sagar Pathak">

	<script src="jquery-2.0.2.js"></script>
		<script> /*
		$(document).ready(function(){
			$.ajaxSetup({cache: false});
			setInterval(function(){
				$("#timer").load('http://localhost/googling/servertime.php #disp');
			}, 1000);
		}); */
		</script>
		<script>
		$(document).ready(function(){
		$.ajaxSetup({cache: false});
		setInterval(function(){
				$.ajax({
					url: 'http://<?php echo $server_ip_address;?>/googling/servertime.php',
					dataType: 'html',
						success: function(data) {
							$('#timer').html($(data).filter('#disp'));
							//alert(data);
							
							//trying to handle maximum ip request to server
							/*
							var fromNewLine = data.split("\n"); //extracting first line of html page
							var firstLine = fromNewLine[0];
							var getTime = firstLine.split(" "); //<div id="disp"> 9 min 32 sec </div>
							var minute = getTime[2];
							var second = getTime[4]; */
						}
				});
			}, 1000);
			setInterval(function(){
				$.ajax({
					url: 'http://<?php echo $server_ip_address;?>/googling/print_question.php',
					dataType: 'html',
						success: function(data) {
							$('#print-question').html($(data).filter('#disp-question'));
						}
				});
		  }, 2000);
		  setInterval(function(){
				$.ajax({
						url: 'http://<?php echo $server_ip_address;?>/googling/checkresponse.php',
						dataType: 'html',
							success: function(data) {
								if(data == 1){
									$('#qanda').css('visibility', 'visible');
									$('#timeout').css('visibility', 'hidden');
									$('#server_response').css('visibility','hidden');
								}
								if(data == 0){
									$('#qanda').css('visibility', 'hidden');
									$('#server_response').css('visibility','hidden');
									$('#timeout').css('visibility', 'hidden');
									
								}  
								if(data == 2){
								$('#server_response').css('visibility','visible');
									$('#timeout').css('visibility', 'visible');
									$('#qanda').css('visibility','hidden');
									$('#server_response').css('visibility','hidden');
								}
								if(data == 3){ //waiting response from server
									$('#timeout').css('visibility', 'hidden');
									$('#qanda').css('visibility','hidden');
									$('#server_response').css('visibility','visible');
								}
							}  
					});
			}, 2000);
		}); 
		</script>
    <title>Googling Competition</title>
	
    <link href="css/style.css" rel="stylesheet">
	<link href="css/style_template.css" rel="stylesheet">
</head>
<body>
<div class="main">
	<div id="header">
		<div id="logo"><div class="year">2013</div><div class="sub-text">IT MEET</div></div>
		<div id="header_text">
			GOOGLE YOUR WAY <?php if(isset($_SESSION['username'])){ echo '<a href="logout-client.php" style="margin-left:400px">Logout</a>';}?>
		</div>
		
		</div>
	<div id="content">
		<div id="qanda">
			<div class="question"><font color="red">Question: </font><div id="print-question"></div></div>
			<div id="timer"></div>
			<?php 
					if(isset($fail)){ 
						echo '<div class="wrong_message">"'.$user_answer.'" is wrong answer.</div>'; 
						unset($fail);
					}  
					if(isset($success)){
						echo '<div class="correct_message">"'.$user_answer.'" is the correct answer.</div>'; 
						unset($success);
					}
					if(isset($no_again)){
						echo '<div class="correct_message">"'.$user_answer.'" is the correct answer. PLEASE WAIT till timeout. You might be the winner of this round. </div>'; 
						unset($no_again);
					}
					if(isset($again_correct)){
						echo '<div class="correct_message">WoW!!! ... "'.$user_answer.'" is the correct answer. PLEASE WAIT for the timeout. </div>'; 
						unset($again_correct);
					}
					?>
			<div class="answer"><font color="green">Answer:</font>
				<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<textarea rows="4" cols="90" name="user_answer" class="uanswer"></textarea></br>
					<input type="submit" name="submit-answer" value="SUBMIT" />
				</form>
			</div>
		</div>
		<div id="timeout">
				<font color="red" size="25px">TIME OUT</font></br></br><font color="white">&nbsp;&nbsp;Better Luck Next Time :)</br><a href="client.php">&nbsp;&nbsp;REFRESH</a></font>
		</div>
		<div id="server_response">
			<font color="green-light" size="25px">PLEASE WAIT</font></br></br><font color="white" size="4px">Waiting for all users to be ready...</font>
		</div>
	</div>
	<div id="footer"><font color="white">Developed By </font><a target= "_blank" href="https://www.odesk.com/o/profiles/users/Web_Programming_Expert_Sagar_Pathak_~01ebcb0ff243392018/">Sagar Pathak</a></div></div>

	
</div>
</body>
</html>