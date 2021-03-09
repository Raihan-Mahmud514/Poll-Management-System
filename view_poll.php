<?php

session_start();

include 'dbcon.php';

if($_GET['id']){
	$sql = "SELECT * FROM `poll_questions` WHERE id=".$_GET['id'];
	$query = mysqli_query($con,$sql);

	$poll = mysqli_fetch_assoc($query);

	//option config
	$sql = "SELECT * FROM `poll_options` WHERE question_id=".$_GET['id'];
	$options = mysqli_query($con,$sql);
}
else{
	header("location: admin_home.php");
}

?>



<!DOCTYPE html>
<html>
<head>  

	<title>Update Poll</title>


	<!-- Bootstap -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<!-- Google-Font -->
	<link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet"> 

	<link rel="stylesheet" href="Style.css">
</head>  

<body>
	<div class="container">
		<p><?=$poll['question']?></p>

		<?php
			while($o = mysqli_fetch_assoc($options)){
				echo "• $o[option_text] &emsp; - &emsp; $o[percentage]% <br>";
			}
		?>
	</div>
</body>
</html>