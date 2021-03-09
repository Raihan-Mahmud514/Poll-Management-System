<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Recover Password</title>
	<?php  include 'css/style.php'  ?>
	<?php  include 'links/links.php'  ?> 
</head>
<body>

<?php

include 'dbcon.php';

if(isset($_POST['submit']))
{
	
	$email = mysqli_real_escape_string($con, $_POST['email']);
	


	$emailquery = " select * from registration where email = '$email' ";

	$query = mysqli_query($con,$emailquery);

	$emailcount = mysqli_num_rows($query);

	if($emailcount>0)
	{

			$userdata = mysqli_fetch_array($query);

			$username = $userdata['username'];
			$token = $userdata['token'];

				$subject = "Online Poll Management System - Password Reset";
				$body = "Hi, $username. Click here to reset your password  http://localhost/poll_system/reset_password.php?token=$token";
				$sender_email = "From: onlinepollmanagement121@gmail.com";

				if (mail($email, $subject, $body, $sender_email)) {
    				$_SESSION['msg'] = "Check your mail to reset your password $email";
    				header('location:login.php');
				} else {
   					 echo "Email sending failed...";
				}

		
	}else
	{
		echo "No Email Foud";
	}

}



?>

		<div class="card bg-light">
			<article class="card-body mx-auto" style="max-width: 400px;">
				<h4 class="card-title mt-3 text-center"><b>Recover Account</b></h4>
				<p class="text-center"><b>Please fill the email address</b></p>
				
				<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
					

						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-envelope"></i></span>
							</div>
							<input type="email" name="email" class="form-control" placeholder="Email Address" required>
							</div>

							
						

							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-primary btn-block">Send mail</button>
							</div>

							<p class="text-center">Have an Account? <a href="login.php">Log In</a>
							</p>
						</form>
			</article>
		</div>

	</div>
</div>
</div>

</body>
</html>