<?php
//getting session_no from file
		$foldername = "data";
		$my_file = $foldername.'/cur_question';
		$handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file); 
		$question_no = fread($handle,filesize($my_file));
		fclose($handle);
		include 'initials/connection.php';
		$table_name = 'qanda';
		$query = 'SELECT `question` FROM `'.$table_name.'` WHERE `id` ='.$question_no;
		$result = mysql_query($query);
		while ($row = mysql_fetch_array($result)) {
				$question = $row['question'];
		}
//
	echo '
		<div id="disp-question">
			'.$question.'
		</div>
	';
?>
<html>
	<head><title></title></head>
	<body>
	
	</body>
</html>