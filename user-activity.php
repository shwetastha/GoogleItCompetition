<?php
	//reading session no
		$foldername = "data";
		$my_file = $foldername.'/set_session';
		$handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file); 
		$session_no = fread($handle,filesize($my_file));
		fclose($handle);
	//
	//reading question number
		$foldername = "data";
		$my_file = $foldername.'/cur_question';
		$handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file); 
		$question_no = fread($handle,filesize($my_file));
		fclose($handle);
	//
	
	//getting question and answer
	$get_question= 'SELECT * FROM `qanda` WHERE `id` = '.$question_no;
	$result = mysql_query($get_question);
	while($row = mysql_fetch_array($result)){
		$question = $row['question'];
		$real_answer = $row['answer'];
	}
	
	$get_name = 'SELECT * FROM `user` WHERE `session_id` = '.$session_no.' AND `question_id=`'.$question_no;
	$result = mysql_query($get_name);
	echo '
	<div class="container">
		<div class="table-row">
			<div class="col">User Id</div>
			<div class="col">Username</div>
			<div class="col">Wrong Answers</div>
			<div class="col">WA-send time</div>
			<div class="col">Correct Answer</div>
			<div class="col">CA-send time</div>
		</div>
		<div class="table-row">
	';
	while($row = mysql_fetch_array($result)){
		$username = $row['name']; 
		$user_id = $row['user_id'];
		$get_wrong_answer = 'SELECT `answers`, `send_time` FROM `users_wrong_answer` WHERE `session_id` = '.$session_no.' AND `question_id` = '.$question_no;
		$resultWA = mysql_query($get_wrong_answer);
		while($row = mysql_fetch_array($resultWA)){
			if($user_id == $row['user_id']){
				$wrong_answers = $row['answers'];
				$wasendtime = $row['send_time'];
				echo '
					<div class="col">'.$user_id.'</div>
					<div class="col">'.$username.'</div>
					<div class="col">'.$wrong_answers.'</div>
					<div class="col">'.$wasendtime.'</div>
				';
			}else{
				echo '
					<div class="col">'.$user_id.'</div>
					<div class="col">'.$username.'</div>
					<div class="col"></div>
					<div class="col"></div>
				';
			}
		}
		
		$get_correct_answer = 'SELECT `answers`, `send_time` FROM `users_correct_answer` 
			WHERE `session_id` = '.$session_no.' AND `question_id` = '.$question_no;
		$resultCA = mysql_query($get_correct_answer);
		while($row = mysql_fetch_array($resultCA)){
		if($user_id == $row['user_id']){
			$correct_answers = $row['answers'];
			$casendtime = $row['send_time'];
			echo '
				<div class="col">'.$correct_answers.'</div>
				<div class="col">'.$casendtime.'</div>
			';
		}else{
			echo '
				<div class="col"></div>
				<div class="col"></div>
			';
		}
	}
	echo '</div></div>';
}
	
?>
<html>
	<head><title></title>
		<link href="css/table.css" rel="stylesheet">
	</head>
	<body>
	
	</body>
</html>