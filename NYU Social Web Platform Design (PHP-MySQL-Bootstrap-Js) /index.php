<?php

// include configuration file
include('config.php');
	
// connect to the database
$db = mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());

// continue session
session_start();

// if the submit button has been pressed
if(isset($_POST['submit']))
{
	// create an empty error array
	$error = array();
	
	// check for a email
	if(empty($_POST['email']))
	{
		$error['email'] = 'Required field';
	} 
	
	// check for a password
	if(empty($_POST['userpass']))
	{
		$error['userpass'] = 'Required field';
	} 
	
	// check signin credentials
	if(!empty($_POST['email']) && !empty($_POST['userpass']))
	{
		// get user_id from the users table
		$sql = "SELECT 
					user_id, 
					firstname, 
					lastname 
				FROM 
					users 
				WHERE 
					email = '{$_POST['email']}' AND userpass = sha1('{$_POST['userpass']}') 
				LIMIT 1";
		$result = mysqli_query($db, $sql);
		$row = mysqli_fetch_assoc($result);
		
		// if the user is not found
		if(!$row['user_id'])
		{
			$error['user'] = 'Invalid username and/or password';
		}
	}
	
	// if there are no errors
	if(sizeof($error) == 0)
	{
		// append user variables to session
		$_SESSION['user_id'] = $row['user_id'];
		$_SESSION['firstname'] = $row['firstname'];
		$_SESSION['lastname'] = $row['lastname'];
		
		// redirect user to profile page
		header("Location: activity.php");
		exit();

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

    	<title>Index</title>

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
			      <a class="navbar-brand" href="#">Index</a>
			    </div>
			    <div id="navbar" class="navbar-collapse collapse">
			      <form method="post" action="index.php" class="navbar-form navbar-right">
				        <div class="form-group">
				        	<input name="email" type="text" class="form-control" placeholder="Email"  value="<?php echo $_POST['email']; ?>" />
							<span class="text-danger"><?php echo $error['email']; ?></span>
				        </div>
				        <div class="form-group">
				          	<input name="userpass" placeholder="Password"  type="password" class="form-control" />
						  	<span class="text-danger"><?php echo $error['userpass']; ?></span>
				        </div>
			       		<button name="submit" type="submit" value="Sign in" class="btn btn-success">Sign in</button>
			       		<!-- sign in link -->
			       		<button name="submit" class="btn btn-success"><a href="signup.php" style='text-decoration: none;color: #FFF; ' >Sign up</a>!</button>
			      </form>
			    </div><!--/.navbar-collapse -->
			  </div>
			</nav>
		</div>
		<div class="jumbotron">
	      <div class="container">
	        <h1>Welcome <?php echo $_SESSION['firstname']; ?></h1>
	        <p>Use it as a starting point to create something more unique.</p>
	        </div>
	    </div>
	     <div class="container"> 
	    	<div class="row"> 
			<?php
			$sql = "SELECT * FROM categories ORDER BY category_title ASC"; 
			$res = mysqli_query($db, $sql) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
			$categories = ""; 
			if (mysqli_num_rows($res) > 0) {
				while ($row = mysqli_fetch_assoc($res)) {
					$id = $row['id']; 
					$title = $row['category_title']; 
					$description = $row['category_description'];
					$categories .=  "<h2><a href='view_category.php?cid=".$id."'style='text-decoration: none; color: #000;' class='cat_link'>".$title."  </a></h2>"; 
					$categories .=  "<p><a href='view_category.php?cid=".$id."' style='text-decoration: none; color: #000;' class='cat_link'>".$description."</a><p><hr>"; 
				}
				?> 
				
				<hr>
				<div class="col-md-12"> <h2><?php echo $categories; ?> <h2></div>
	
				<!-- Example row of columns -->
	      		</div>
	   			<footer>
	        		<p>&copy; Summer 2015</p>
	    		</footer>
	    		</div> <!-- /container -->

	      		<?php 
				}else {
			 	echo "<p> There are no Categories available yet.</p>";
				}
				?>
	  	</body>
</html>