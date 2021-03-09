<?php

session_start();

include 'dbcon.php';

if(isset($_POST['question']))
{
	$sql = "INSERT INTO `poll_questions` (`id`, `question`) VALUES (NULL, '$_POST[question]')" ;
	$query = mysqli_query($con,$sql);

    header("location: admin_home.php");
}

?>




<html>  
    <head>  

        <title>Create Poll</title>


        <!-- Bootstap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

        <!-- Google-Font -->
        <link href="https://fonts.googleapis.com/css2?family=Titillium+Web&display=swap" rel="stylesheet"> 

        <link rel="stylesheet" href="Style.css">
    </head>  

    <body> 
    	<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
    		<br><br><br>
    		<center>
    			<h3>Create a question</h3>
    			<input name="question">
	    		<br>
	    		<input type="submit">
    		</center>
    	</form>

    </body>  

</html>