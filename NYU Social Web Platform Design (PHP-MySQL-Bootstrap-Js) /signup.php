<?php

	// this 
	include('config.php');

	// connect to the database
	$db = mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());

	// if the form has been submitted
	if(isset($_POST['submit']))
	{
		// create an empty error array
		$error = array();

		// check for a firstname
		if(empty($_POST['firstname']))
		{
			$error['firstname'] = 'Required field';
		} 

		// check for a lastname
		if(empty($_POST['lastname']))
		{
			$error['lastname'] = 'Required field';
		} 

		// check for a email
		if(empty($_POST['email']))
		{
			$error['email'] = 'Required field';
		} else {

			// check to see if email address is unique
			$sql = "SELECT user_id FROM users WHERE email = '{$_POST['email']}'";
			$result = mysqli_query($db, $sql);
			if(mysqli_num_rows($result) > 0)
			{
				$error['email'] = 'You already have an account';
			}
		}

		// check for a password
		if(empty($_POST['userpass']))
		{
			$error['userpass'] = 'Required field';
		} 

		// if there are no errors
		if(sizeof($error) == 0)
		{
			// add the user
			$firstname = mysqli_real_escape_string($db, $_POST['firstname']);
			$lastname = mysqli_real_escape_string($db, $_POST['lastname']);
			$email = mysqli_real_escape_string($db, $_POST['email']);
			$userpass = mysqli_real_escape_string($db, $_POST['userpass']);
			
			$sql = "INSERT INTO users (
						user_id,
						firstname,
						lastname,
						email,
						userpass,
						signupdate
					) VALUES (
						null,
						'$firstname',
						'$lastname',
						'$email',
						sha1('$userpass'),
						NOW()
					)";
			mysqli_query($db, $sql);
			
			// get user_id
			$user_id = mysqli_insert_id($db);
			
			// start or continue a session
			session_start();
			
			// added variables to our session
			$_SESSION['user_id'] = $user_id;
			$_SESSION['firstname'] = $firstname;
			
			// email the user
			$message = 'Welcome ' . $firstname . ' ' . $lastname . '!';
			mail($email, 'Welcome to my site', $message, "From: admin@atmysite.com");
			
			// go somewhere else
			header("Location: activity.php");
			
		} 
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    	<meta name="description" content="">
    	<meta name="author" content="">
    	<link rel="icon" href="">

    	<title>Signup</title>

    	<!-- include libries(jQuery, bootstrap, fontawesome) -->
		<script src="//code.jquery.com/jquery-1.9.1.min.js"></script> 
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet"> 
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script> 
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
		<!-- include summernote css/js-->
		<link href="summernote.css" rel="stylesheet">
		<script src="summernote.min.js"></script>

    	<!-- Bootstrap core CSS -->
    	<link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    	<!-- Custom styles for this template -->
    	<link href="jumbotron.css" rel="stylesheet">

    	<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    	<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    	<script src="http://getbootstrap.com/assets/js/ie-emulation-modes-warning.js"></script>

    	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    	<!--[if lt IE 9]>
      	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    	<![endif]-->
	</head>
	<body>
		
		<!-- top navigation -->
		<?php
			
			// check for an invalid username / password
			if($error['user'])
			{
				echo "<p>{$error['user']}</p>";
			}
			
		?>
		<nav class="navbar navbar-inverse navbar-fixed-top">
		  <div class="container">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="#">Signup</a>
			    </div>
			    <div id="navbar" class="navbar-collapse collapse">
			      <form method="post" action="index.php" class="navbar-form navbar-right">
			      </form>
			    </div><!--/.navbar-collapse -->
			  </div>
			</nav>
		</div>
		<div class="jumbotron">
	      <div class="container">
	     	<h1><?php echo "{$_SESSION['firstname']} {$_SESSION['lastname']}"; ?></h1>
	       </div>
	    </div>
			<div class="container">	
			<h2>Sign up</h2>

			<!-- signup form -->
			<form method="post" action="signup.php">
				
				<!-- first name -->
				<label>First Name</label><br />
				<input name="firstname" type="text" value="<?php echo $_POST['firstname']; ?>" />
				<span class="text-danger"><?php echo $error['firstname']; ?></span>
				<br /><br />

							
				<!-- last name -->
				<label>Last Name</label><br />
				<input name="lastname" type="text" value="<?php echo $_POST['lastname']; ?>" />
				<span class="text-danger"><?php echo $error['lastname']; ?></span>
				<br /><br />
				
				<!-- e-mail -->
				<label>E-mail</label><br />
				<input name="email" type="text" value="<?php echo $_POST['email']; ?>" />
				<span class="text-danger"><?php echo $error['email']; ?></span>
				<br /><br />

				
				<!-- password -->
				<label>Password</label><br />
				<input name="userpass" type="password" />
				<span class="text-danger"><?php echo $error['userpass']; ?></span>
				<br /><br />
				
				<!-- submit button -->
				<input name="submit" type="submit" value="Sign up" />
				
			</form>
			
			<!-- sign in link -->
			<p>Already have an account? <a href='index.php'>Sign in</a>!</p>
			
		</div>
	
	</body>
</html>