<?php 
	if(!isset($_POST['stop_timer'])){
	/*
			$my_file = 'checktimeout.php';
			$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
			$data = '';
			fwrite($handle, $data);
			fclose($handle); 
	*/
			$foldername = "data";
			$my_file = $foldername.'/cur_min';
			$handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file); //implicitly creates file
			$data = fread($handle,filesize($my_file));
			fclose($handle);
			$started_min = $data;
			
			$my_file = $foldername.'/cur_sec';
			$handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file); //implicitly creates file
			$data = fread($handle,filesize($my_file));
			fclose($handle);
			$started_sec = $data;
			
			$my_file = $foldername.'/set_time';
			$handle = fopen($my_file, 'r') or die('Cannot open file:  '.$my_file); //implicitly creates file
			$data = fread($handle,filesize($my_file));
			fclose($handle);
			
			$target_sec  = $data * 60;
			$realmin = date('i');
			$realsec = date('s');
			$input = ($started_min * 60 + $started_sec) + $target_sec - ($realmin * 60 + $realsec); //sec
			$hr = $input / (60 *60);
			$ehr = floor($hr);
			$min = ($hr -$ehr)*60;
			$emin = floor($min);
			$sec =  floor(($min - $emin)* 60);
			if(($emin == 0 && $sec == 0) || ($emin == 59 && $sec == 59)){
				echo '<div id="disp">timeout</div>';  
				$my_file = 'checkresponse.php';
				$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
				$data = 2;
				fwrite($handle, $data);
				fclose($handle);  
			}else{
				echo '<div id="disp"> '.$emin." min ".$sec.' sec </div>';
			}
		}
		if(isset($_POST['stop_timer'])){
			header("Location: startstop.php");
		}
?>
<html>
<head><title></title></head>
<body>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="submit" name="stop_timer" value="RESET"/>
</form>
</body>
</html>