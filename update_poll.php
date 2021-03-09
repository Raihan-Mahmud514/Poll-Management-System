<?php

session_start();

include 'dbcon.php';

if(isset($_POST['submit'])){
	$num_count = $_POST['num_count'];

	for ($i=0; $i <= $num_count; $i++) { 
		$n = 'opt'.$i;

		//echo "<br>$_POST[$n]";
		
		$sql = "INSERT INTO `poll_options` (`id`, `option_text`, `question_id`, `percentage`) VALUES (NULL, '".$_POST[$n]."', ".$_POST['question_id'].", '0')" ;
		$query = mysqli_query($con,$sql);
	}

	$poll['question'] = $_POST['question_id'];
}

else if($_GET['id']){
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
				echo "• $o[option_text] <br>";
			}
		?>
		
		<br><br>
		Add options:
		<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
			<input type="hidden" value="0" id="num_count" name="num_count">
			<input type="hidden" name="question_id" value="<?= $poll['id'] ?>">
			<div id="add_option_form">
				<input type="text" name="opt0">
			</div>
			<input type="submit" name="submit">
		</form>
		<a href="#" onclick="add_another_field();">Add another option</a>
	</div>
</body>

<script type="text/javascript">
	function add_another_field(){
		form = document.getElementById('add_option_form');
		last_num = document.getElementById('num_count').value;

		form.innerHTML += '<br><input type="text" name="opt'+ (++last_num) +'">';
		document.getElementById('num_count').value = last_num;
	}
</script>

</html>