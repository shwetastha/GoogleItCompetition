<?php
	session_start();
	if(!isset($_SESSION['admin-logged'])){
		header("Location: admin.php");
	}
?>
<?php
		include 'initials/connection.php';
		$table_name = 'qanda';
		$query = 'SELECT `id`, `question`, `answer` FROM `'.$table_name.'` WHERE 1';
		$result = mysql_query($query);
		echo '<div class="heading">
						QUESTION & ANSWER LIST
			  </div>
			<div class="container">
			
					<div class="table-row">
						<div class="col">Question No</div>
						<div class="col">Question</div>
						<div class="col">Answer</div>
					</div>
			';
		while ($row = mysql_fetch_array($result)) {
				$question_no = $row['id'];
				$question = $row['question'];
				$answer = $row['answer'];
				echo '
					
					<div class="table-row">
						<div class="col">'.$question_no.'</div>
						<div class="col">'.$question.'</div>
						<div class="col">'.$answer.'</div>
					</div>
			';
		}
		echo '</div>';
?>
<html>
<head><title></title>
<link href="css/table.css" rel="stylesheet">
</head>
<body>

</body>
</html>