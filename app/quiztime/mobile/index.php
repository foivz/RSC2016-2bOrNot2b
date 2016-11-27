<?php
	session_start();
	if(isset($_SESSION['usertoken']) && !isset($_GET['token'])) {
		header("location: ?token=" . $_SESSION['usertoken']);
	} 
?>

<!doctype html>
<html>
	<head>
		<link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="../../css/skeleton.css" />
		<link rel="stylesheet" href="../../css/mobile.css" />
		<link rel="stylesheet" href="../../css/animate.min.css" />
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css">
		<link href="../../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		
		<script src="../../js/jquery.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>
		<script src="../../js/api.js"></script>
		<script src="../../js/mobile.js"></script>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
	</head>
	<body>
		<div class="row answer">
			<div class="twelve columns label">
				<h2>a</h2>
			</div>
			<div class="twelve columns solution">
				<i class="fa fa-check-circle fa-3x" aria-hidden="true"></i>
			</div>
		</div>
		<div class="row answer">
			<div class="twelve columns label">
				<h2>b</h2>
			</div>
			<div class="twelve columns solution">
				<i class="fa fa-check-circle fa-3x" aria-hidden="true"></i>
			</div>
		</div>
		<div class="row" id="scoreboard" data-command="get_self_info">
			<div class="twelve columns">
				<img src="#" data-attr="src" data-var="user_picture" class="img-circle" alt="User Image">
		
				<h3>1/15</h3>
				
				<h3>25</h3>
			</div>
		</div>
	</body>
</html>