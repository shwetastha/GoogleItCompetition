<?php	
error_reporting(0);
if (!file_exists('data')) {
    mkdir('data', 0777, true);
}
if(isset($_POST['submit_time'])){
	$my_file = 'data/set_time';
	$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
	$time_limit = $_POST['minutes'];
	fwrite($handle, $time_limit);
	fclose($handle);
	
	$my_file = 'data/cur_question';
	$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
	$question_no = $_POST['question_id'];
	fwrite($handle, $question_no);
	fclose($handle);

	$my_file = 'data/set_session';
	$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
	$session_no= $_POST['session_no'];
	fwrite($handle, $session_no);
	fclose($handle);
	echo '
		<div class="heading">
				CURRENT STATUS
			</div>
			<div class="container">
			<div class="table-row">
				<div class="col">Time Limit</div>
				<div class="col">Current Question No</div>
				<div class="col">Session No</div>
			</div>
			<div class="table-row">
				<div class="col">'.$time_limit.' min</div>
				<div class="col">Q.No '.$question_no.'</div>
				<div class="col">'.$session_no.'</div>
			</div>
			</div>
			</div>
	';
	unset($_POST['submit']);
}else{
//reading question number
	$foldername = "data";
	$my_file = $foldername.'/set_time';
	$handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file); 
	$current_time_limit = fread($handle,filesize($my_file));
	fclose($handle);
	$my_file = $foldername.'/cur_question';
	$handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file); 
	$current_question_no = fread($handle,filesize($my_file));
	fclose($handle);
	$my_file = $foldername.'/set_session';
	$handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file); 
	$current_session_no = fread($handle,filesize($my_file));
	fclose($handle);
	echo '
		
			<div class="heading">
				CURRENT STATUS
			</div>
			<div class="container">
			<div class="table-row">
				<div class="col">Time Limit</div>
				<div class="col">Current Question No</div>
				<div class="col">Session No</div>
			</div>
			<div class="table-row">
				<div class="col">'.$current_time_limit.' min</div>
				<div class="col">Q.No '.$current_question_no.'</div>
				<div class="col">'.$current_session_no.'</div>
			</div>
			</div>
			</div>
	';
}
?>
<html>
<head><title></title>
 <link href="css/table.css" rel="stylesheet">
</head>
<body>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<div class="heading">
				CHANGE PARAMETERS
	</div>
	<div class="container">
		<div class="table-row">
			<div class="col"> Minutes: </div>
			<div class="col"><input type="number" name="minutes" placeholder="10" /></div>
		</div>
		<div class="table-row">
			<div class="col">Question No:</div>
			<div class="col"><input type="number" name="question_id" placeholder="1" /></div>
		</div>
		<div class="table-row">
			<div class="col">Session No:</div>
			<div class="col"><input type="number" name="session_no" placeholder="3"/></div>
		</div>
		<div class="table-row">
			<div class="col"></div>
			<div class="col"><input type="submit" name="submit_time" value="SET PARAMETERS" /></div>
		</div>
	</div>
	</form>
</body>
</html>