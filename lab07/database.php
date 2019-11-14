<!DOCTYPE html>
<html lang="en">
	<head>
		<title>sqlhtml</title>
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/gradestore.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<?= $_POST["query"]; ?> <br><br>
		<?php
		$databasename = $_POST["dbname"];
		$queryq = $_POST["query"];
		$db = new PDO("mysql:dbname=$databasename", "root", 123123);
		$rows = $db->query($queryq);
		foreach ($rows as $row) {
		    ?>
		    <li> name: <?= $row["name"] ?>,
				grade: <?= $row["grade"] ?> </li>
		    <?php
		}
		?>
	</body>
</html>
