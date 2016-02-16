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

    	<title>View Category</title>

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
			      <a class="navbar-brand" href="#">View Category</a>
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
			<div class="container"><?php 
			function convertdate($date) {
				$date = strtotime($date);			
				return date("M j, Y g:ia", $date);
			}

			$cid = $_GET['cid'];
			if (isset($_SESSION['user_id'])) {
				$logged = " | <a href='create_topic.php?cid=".$cid."'style='text-decoration: none; color: #000;'>Click Here To Create A Topic</a>";
			} else {
			$logged = " | Please log in to create topics in this forum.";
			}
			$sql = "SELECT id FROM categories WHERE id='".$cid."' LIMIT 1";
			$res = mysqli_query($db, $sql) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
			if (mysqli_num_rows($res) == 1) {
			$sql2 = "SELECT * FROM topics WHERE category_id='".$cid."' ORDER BY topic_reply_date DESC";
			$res2 = mysqli_query($db, $sql2) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
			if (mysqli_num_rows($res2) > 0) {
				$topics .= "<table width='100%' style='border-collapse: collapse;'>";
				$topics .= "<tr><td colspan='4'><a href='index.php' style='text-decoration: none; color: #000;'>Return To Forum Index</a>".$logged."<hr /></td></tr>";
				$topics .= "<tr style='background-color: #dddddd;'><td>Topic Title</td><td width='65' align='center'>Last User</td><td width='65' align='center'>Views</td><td width='65' align='center'>Replies</td></tr>";
				$topic .= "<tr><td colspan='4'><hr /></td><tr>";
				// Fetching topic data from the database
				while ($row = mysqli_fetch_assoc($res2)) {
					// Assign local variables from the database data
					$tid = $row['id'];
					$title = $row['topic_title'];
					$views = $row['topic_views'];
					$date = $row['topic_date'];
					$creator = $row['topic_creator'];
					// Check to see if the topic has every been replied to
					if ($row['topic_last_user'] == "") { 
						$last_user = "N/A"; 
					} else { 
						$last_user = $row['topic_last_user']; 
					}
					// Append the actual topic data to the $topics variable
					$topics .= "<tr><td><h4><a href='view_topic.php?cid=".$cid."&tid=".$tid."' style='text-decoration: none; color: #000;''>".$title."</a></h4><br /><span class='post_info'>Posted by: ".$creator." on ".convertdate($date)."</span></td><td align='center'>".$last_user."</td><td align='center'>".$views."</td></tr>";
					$topics .= "<tr><td colspan='4'><hr /></td></tr>";
				}
				$topics .= "</table>";
				// Displaying the $topics variable on the page
				echo $topics;
				} else {
				// If there are no topics
					echo "<a href='index.php'style='text-decoration: none; color: #000;'>Return To Forum Index</a><hr />";
					echo "<p>There are no topics in this category yet.".$logged."</p>";
			}
			} else {
				// If the category does not exist
				echo "<a href='index.php'style='text-decoration: none; color: #000;'>Return To Forum Index</a><hr />";
				echo "<p>You are trying to view a category that does not exist yet.";
			}	
			?></div>
		</div>
	
	</body>
</html>