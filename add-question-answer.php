<?php
//getting current question id
	include 'initials/connection.php';
	$table_name = 'qanda';
	$query = 'SELECT `id` FROM `'.$table_name.'` ORDER BY `id` DESC LIMIT 1';
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) {
		$question_no = $row['id'];
	}
?>
<?php
	if(isset($_POST['submit-qanda'])){
		$question = $_POST['question'];
		$answer = $_POST['answer'];
		//insert into table
		$insert_query = 'INSERT INTO `qanda`(`question`, `answer`) VALUES ("'.$question.'","'.$answer.'");';
		if(mysql_query($insert_query)){
			header("Location: add-more.php");
		}else{
			die("couldn't insert into table Reason: ".mysql_error());
		}
	}
	
?>
<html>
	<head><title></title>
		<link href="css/table.css" rel="stylesheet">
	</head>
	<body>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<div class="container">
			<div class="table-row">
				<div class="col">Q.No.</div>
				<div class="col">Question</div>
				<div class="col">Answer</div>
			</div>
			<div class="table-row">
				<div class="col"><?php echo $question_no + 1;?></div>
				<div class="col"><textarea name="question"></textarea></div>
				<div class="col"><textarea name="answer"></textarea></div>
			</div>
			<div class="table-row">
				<div class="col"></div>
				<div class="col"><input type="submit" name="submit-qanda" value="ADD"/></div>
				<div class="col"></div>
			</div>
		</div>
	</form>
	</body>
</html>