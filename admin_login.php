<?php
session_start();
ob_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
	<?php include 'css/style.php' ?>
	<?php include 'links/links.php' ?>
</head>
<body>

<?php

include 'dbcon.php';

if(isset($_POST['submit']))
{
	$email = $_POST['email'];
	$password = $_POST['password'];

	$email_search = " select * from registration where email='$email' and status='admin' ";
	$query = mysqli_query($con,$email_search);

	$email_count = mysqli_num_rows($query);

	if($email_count)
	{
		$email_pass = mysqli_fetch_assoc($query);

		$db_pass = $email_pass['password'];

		$_SESSION['username'] = $email_pass['username'];

		$pass_decode = password_verify($password, $db_pass);

		if($pass_decode)
		{
			if(isset($_POST['rememberme']))
			{

				setcookie('emailcookie',$email,time()+86400);
				setcookie('passwordcookie',$password,time()+86400);

				header('location:admin_home.php');
			}else
			{
				header('location:admin_home.php');
			}
			
			

		}else
		{
		?>
				<script>
					alert("Password Incorrect");
				</script>
				<?php
		}

	}
	else
	{
		?>
				<script>
					alert("Invalid Email");
				</script>
				<?php
	}

}

?>







		<div class="card bg-light">
			<article class="card-body mx-auto" style="max-width: 400px;">
				<h4 class="card-title mt-3 text-center"><b>Online Poll Management System</b></h4>
				<p class="text-center"><b style="color: red;">Admin Log In</b></p>

				<p class="divider-text">
					<span class="bg-light">OR</span>
				</p>

				<div>
					<p class="bg-success text-white px-4"> <?php 

					if(isset($_SESSION['msg']))
					{
						echo $_SESSION['msg'];
					}else
					{
						echo $_SESSION['msg'] = "You are logged out. Please Log in again. ";
					}

					 ?> </p>
				</div>

				<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-user"></i></span>
						</div>
						<input name="email" class="form-control" placeholder="Email" type="email" value="<?php if(isset($_COOKIE['emailcookie']))
						{
							echo $_COOKIE['emailcookie'];
						}
						?>">
					</div>

					<div class="form-group input-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fa fa-lock"></i></span>
						</div>
						<input name="password" class="form-control" placeholder="Password" type="password" value="<?php if(isset($_COOKIE['passwordcookie']))
						{
							echo $_COOKIE['passwordcookie'];
						}?>">
					</div>

					<div class="form-group ">
						
						<input name="rememberme" type="checkbox" > Remember Me
					</div>



					<div class="form-group">
						<button type="submit" name="submit" class="btn btn-primary btn-block">Log In</button>
					</div>

					<p class="text-center">Forgot your password. Don't worry  <a href="recover_email.php">Click Here</a></p>


				</form>
				
			</article>
			
		</div>

	</div>
</body>
</html>