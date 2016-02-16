<?php
	
	// include configuration file
	include('config.php');

	// connect to the database
	$db = mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());

	// continue the session
	session_start();

	// is the user allowed here
	if(!$_SESSION['user_id'])
	{
		header("Location: signup.php");
	}

?>

<html>
	<head>
		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    	<meta name="description" content="">
    	<meta name="author" content="">
    	<link rel="icon" href="">

    	<title>Activity</title>

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
			      <a class="navbar-brand" href="#">Activity</a>
			    </div>
			    <div id="navbar" class="navbar-collapse collapse">
			      <form method="post" action="index.php" class="navbar-form navbar-right">
			       		<button name="submit" class="btn btn-success"><a href="activity.php" style='text-decoration: none;color: #FFF; '>Activity</a>!</button>
			       		<button name="submit" class="btn btn-success"><a href="profile.php" style='text-decoration: none;color: #FFF; '>Profile</a>!</button>
			 			<button name="submit" class="btn btn-success"><a href="signout.php" style='text-decoration: none;color: #FFF; '>Sign out</a>!</button>
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
		    <?php 
				}else {
			 	echo "<p> There are no Categories available yet.</p>";
				}
			?>
			</div> 
			<footer>
	        	<p>&copy; Summer 2015</p>
	    	</footer>

		</div> <!-- /container -->
			
	
		
	</body>
</html>