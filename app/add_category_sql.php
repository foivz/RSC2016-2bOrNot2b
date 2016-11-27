<?php

include('connection.php');

$quiz_id = $_POST['selectbasic'];
$kategorija = $_POST['categoryname'];
	
$sql = "INSERT INTO rsc_quiz (quiz_id, quiz_title, quiz_author, quiz_created, quiz_category) 
		VALUES (NULL, '$_POST[naziv]', )";
	
mysqli_query($sql) or die(mysqli_error());
mysqli_close($con);
?>