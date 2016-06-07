<!DOCTYPE html>
<html>
<head>
<title></title>


<?php
if (!file_exists('data')) {
    mkdir('data', 0777, true);
}
if(isset($_POST['start'])){
		$my_file = 'checkresponse.php';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
		$data = 1;
		fwrite($handle, $data);
		fclose($handle);
		header("Location: servertime.php");
}
if(isset($_POST['stop'])){
		$my_file = 'checkresponse.php';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
		$data = 0;
		fwrite($handle, $data);
		fclose($handle);
		header("Location: servertime.php");
}
?>

<link href="css/table.css" rel="stylesheet">
</head>
<body>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>" >
	<input type="hidden" name="cur_min" value="
	<?php
		$my_file = 'data/cur_min';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
		$data = date('i');
		fwrite($handle, $data);
		fclose($handle);
	?>" />
	<input type="hidden" name="cur_sec" value="
	<?php
		$my_file = 'data/cur_sec';
		$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
		$data = date('s');
		fwrite($handle, $data);
		fclose($handle);
	?>" />
	<div class="heading">
		TIMER SETTING
	</div>
	<input type="submit" name="start" value="START"/>
	<input type="submit" name="stop" value="STOP"/>
</form>
</body>
</html>