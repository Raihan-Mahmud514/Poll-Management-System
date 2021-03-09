<?php 

# DELETE FROM `poll_questions` WHERE `poll_questions`.`id` = 1

include 'dbcon.php';

try {
	$sql = "DELETE FROM `poll_questions` WHERE `poll_questions`.`id` = $_GET[id]";
	$query = mysqli_query($con,$sql);	

	echo "<br>Deleted Succesfully";

	header("location: admin_home.php");
} catch (Exception $e) {
	echo "$e";
}



?>