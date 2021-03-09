<?php

session_start();

include 'dbcon.php';

$sql = "SELECT * FROM poll_questions" ;
$question_list = mysqli_query($con, $sql);


?>

<html>  
    <head>  

        <title>Admin Dashboard</title>


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
    		<br><br><br>
	    	<b style="color: red;">Note:</b> No styling done. Only logic done. Please take care of the CSS.
	    	<br><br>

	    	<a href="create_poll.php"><h3>Create Poll</h3></a>

	    	<h3>Update/Delete poll</h3>
	    	<ul>
	    		<?php
	    			while($row = mysqli_fetch_assoc($question_list)){
	    				echo "<li>id: " . $row["id"]. " Question: " . $row["question"]."<br> <a href='view_poll.php?id=".$row['id']."'>View</a> &emsp;
	    					<a href='update_poll.php?id=".$row['id']."'>Edit</a> &emsp; <a onclick='return confirm(\"Are you sure ?\");' href='delete_poll.php?id=".$row['id']."'>Delete</a> 
	    				"."</li>";
	    			}
	    		?>
	    	</ul>
    	</div>
    </body>  

</html>