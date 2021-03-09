<?php
session_start();

if( !function_exists('random_bytes') )
{
    function random_bytes($length = 6)
    {
        $characters = '0123456789';
        $characters_length = strlen($characters);
        $output = '';
        for ($i = 0; $i < $length; $i++)
            $output .= $characters[rand(0, $characters_length - 1)];

        return $output;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<?php  include 'css/style.php'  ?>
	<?php  include 'links/links.php'  ?> 
</head>
<body>
<div class="cookie-container">
	<p>
		We use cookies to improve user experience, and analyze website traffic. By clicking “Accept Cookies,” you consent to store on your device all the technologies described in our Cookie Policy. To find out more read our <a href="#"> privacy policy </a> and <a href="#"> cookie policy</a>. 	
	</p>

	<button class = "cookie-btn"> Accept Cookies</button>
</div>
<?php

include 'dbcon.php';

if(isset($_POST['submit']))
{
	$username = mysqli_real_escape_string($con, $_POST['username']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$mobile = mysqli_real_escape_string($con, $_POST['mobile']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);

	$pass = password_hash($password, PASSWORD_BCRYPT);
	$cpass = password_hash($cpassword, PASSWORD_BCRYPT);

	$token = bin2hex(random_bytes(15));

	$emailquery = " select * from registration where email = '$email' ";

	$query = mysqli_query($con,$emailquery);

	$emailcount = mysqli_num_rows($query);

	if($emailcount>0)
	{
		?>
				<script>
					alert("Email already exists");
				</script>
				<?php
	}else
	{
		if($password === $cpassword)
		{
			$insertquery = "insert into registration( username, email, mobile, password, cpassword, token, status) values('$username','$email','$mobile','$pass','$cpass', '$token', 'inactive')";

			$iquery = mysqli_query($con, $insertquery);

			if($iquery)
			{

				$subject = "Email Activision of Online Poll Management System";
				$body = "Hi, $username. Click the Link to activate your account  http://localhost/poll_system/activate.php?token=$token";
				$sender_email = "From: onlinepollmanagement121@gmail.com";

				if (mail($email, $subject, $body, $sender_email)) {
    				$_SESSION['msg'] = "Check your mail to activate the account $email";
    				header('location:login.php');
				} else {
   					 echo "Email sending failed...";
				}

				
			}else
			{
				?>
				<script>
					alert("Not Successful");
				</script>
				<?php
			}

		}else
		{
			?>
				<script>
					alert("Password is not matching");
				</script>
				<?php
		}
	}

}



?>

		<div class="card bg-light">
			<article class="card-body mx-auto" style="max-width: 400px;">
				<h4 class="card-title mt-3 text-center"><b>Online Polling System</b></h4>
				<p class="text-center"><b>Create Your Account</b></p>
				<p>
					<a href="" class="btn btn-block btn-gmail"><i class="fa fa-google"></i>         Login via Gmail</a>

					<a href="" class="btn btn-block btn-facebook"><i class="fa fa-facebook-f"></i>         Login via Facebook</a>
				</p>
				<p class="divider-text">
					<span class="bg-light">OR</span>
				</p>
				<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-user"></i></span>
						</div>
						<input name="username" class="form-control" placeholder="Username" type="text" required>
						</div>

						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-envelope"></i></span>
							</div>
							<input type="email" name="email" class="form-control" placeholder="Email Address" required>
							</div>

							<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-phone"></i></span>
							</div>
							<input type="number" name="mobile" class="form-control" placeholder="Phone Number" required>
							</div>

							<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-lock"></i></span>
							</div>
							<input class="form-control" placeholder="Create Password" type="password" name="password" value="" required>
							</div>

							<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fa fa-lock"></i></span>
							</div>
							<input class="form-control" placeholder="Confirm Password" type="password" name="cpassword" value="" required>
							</div>

							<div class="form-group">
								<button type="submit" name="submit" class="btn btn-primary btn-block">Create Account</button>
							</div>

							<p class="text-center">Have an Account? <a href="login.php">Log In</a>
							</p>
						</form>
			</article>
		</div>

	</div>
</div>
</div>
<script src = "cookie.js"></script>
</body>
</html>