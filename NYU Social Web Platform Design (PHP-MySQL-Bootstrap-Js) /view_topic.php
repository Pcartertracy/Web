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
		exit();
	}
	$cid = $_GET['cid'];
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

    	<title>View Topic</title>

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
			      <a class="navbar-brand" href="#">View Topic</a>
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
			<?php 
				function convertdate($date) {
					$date = strtotime($date);
					return date("M j, Y g:ia", $date);
				}

				// Assign local variables from the variables in the URL
				$cid = $_GET['cid'];
				$tid = $_GET['tid'];
				// Select the topic data depending on the $cid and $tid variables
				$sql = "SELECT * FROM topics WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
				// Execute the SELECT query
				$res = mysqli_query($db, $sql) OR die ('Could not connect to MySQL: 1' . mysqli_connect_error());
				// Check to see if the topic exists
				if (mysqli_num_rows($res) == 1) {
					echo "<table width='100%'>";
				// Check to see if the person accessing this page is logged in


					if ($_SESSION['user_id']) { 
						 echo "<tr><td colspan='2'><input type='submit' value='Add Reply' onClick=\"window.location = 'post_reply.php?cid=".$cid."&tid=".$tid."'\"/>"; 
						 echo "<br></br>";
					} else { 
						echo "<tr><td colspan='2'><p>Please log in to add your reply.</p><hr /></td></tr>"; 
					}

					// Fetch all the topic data from the database
					while ($row = mysqli_fetch_assoc($res)) {
					// Query the posts table for all posts in the specified topic

						$sql2 = "SELECT * FROM posts WHERE category_id='".$cid."' AND topic_id='".$tid."'";
						$res2 = mysqli_query($db, $sql2) OR die ('Could not connect to MySQL: 2' . mysqli_connect_error());
						// get user information
						$sql2 = "SELECT user_id, firstname, lastname FROM users WHERE user_id = '{$row['user_id']}'";
						$result2 = mysqli_query($db, $sql2);
						$row2 = mysqli_fetch_assoc($result2);
				
							
						while ($row2 = mysqli_fetch_assoc($res2)) {
					// Echo out the topic post data from the database
						?><div class="row"> 
						<div class="col-md-2"> <h5><?php 
						echo "User Info Here"; 
						if(file_exists('photos/' . $row['user_id'] . '.jpg'))
							{
								// assign time to prevent image caching
								$timestamp = time();
								// If the user has a profile image on file, display the user's profile image
								echo "<img src=\"photos/{$row['user_id']}.jpg?time={$timestamp}\" />";
								
							} else {
							
								// If the user does not have a profile image on file, display a default profile image
								echo "<img src=\"photos/noimage.png\" />";
								
							}
						?> </h5></div>
						<div class="col-md-2"> <h2><?php echo "".$row['topic_title'].""; ?> </h2></div>
						<div class="col-md-6"> <h4 ><?php echo "  ".$row2['post_content'].""; ?></h4> </div>
						<div class="col-md-2"> <h5 ><?php echo " ".$row2['post_creator']." ".convertdate($row2['post_date']).""; ?></h5> </div>
						</div>
						<hr>
						<?php
						#echo "<tr><td><div> <td>User Info Here</td> ".$row['topic_title']." <br />by ".$row2['post_creator']." - ".convertdate($row2['post_date'])." - ".$row2['post_content']."</div></td></tr><tr><td><hr /></td></tr>";
						
						}
						#echo "<tr><td valign='top' style='border: 1px solid #000000;'><div style='min-height: 125px;'>  ".$row['topic_title']." <br />by ".$row2['post_creator']." - ".convertdate($row2['post_date'])."<hr />".$row2['post_content']."</div></td><td width='200' valign='top' align='center' style='border: 1px solid #000000;'>User Info Here</td></tr><tr><td colspan='2'><hr /></td></tr>";
						
						// Assign local variable for the current number of views that this topic has
						$old_views = $row['topic_views'];
					// Add 1 to the current value of the topic views
						$new_views = $old_views + 1;
					// Update query that will update the topic_views for this topic
						$sql3 = "UPDATE topics SET topic_views='".$new_views."' WHERE category_id='".$cid."' AND id='".$tid."' LIMIT 1";
					// Execute the UPDATE query
						$res3 = mysqli_query($db, $sql3) OR die ('Could not connect to MySQL: 3' . mysqli_connect_error());
					}
				} else {
					// If the topic does not exist
					echo "<p>This topic does not exist.</p>";
				}
			?> </div>
		</div>
	
	</body>
</html>