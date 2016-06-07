<?php
	$my_file = 'checkresponse.php';
	$handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file); //implicitly creates file
	$data = 3;
	fwrite($handle, $data);
	fclose($handle);  
	header("location: client.php");
?>