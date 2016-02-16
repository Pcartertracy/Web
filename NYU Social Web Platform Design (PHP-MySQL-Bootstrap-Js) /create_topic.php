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

    	<title>Creat Forum Topic</title>

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
			      <a class="navbar-brand" href="#">Creat Forum Topic</a>
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
				<form action="create_topic_parse.php" method="post" id="postForm" onsubmit="return postForm()">
				<p>Topic Title</p>
				<textarea id="summernote1" name="topic_title" maxlength="150"></textarea>
				<p>Topic Content</p>
				<textarea id="summernote2" name="topic_content"></textarea>
				<input type="hidden" name="cid" value="<?php echo $cid; ?>"/>
				<input type="hidden" name="tid" value="<?php echo $tid; ?>" />
				<button type="submit" name="topic_submit" class="btn btn" value="Create Your Topic" >Create Your Topic</button>
				</form>
			</div>
		</body>
	</html>
	<script type="text/javascript">
		$(document).ready(function() {
				$('#summernote1').summernote({
					toolbar: [],
				height: "40px",               // set editor height
				minHeight: "null",            // set minimum height of editor
				maxHeight: "null",            // set maximum height of editor
				focus: "true"
				});
				$('#summernote2').summernote({
				height: "300px",               // set editor height
				minHeight: "null",            // set minimum height of editor
				maxHeight: "null",            // set maximum height of editor
				focus: "true"
				});
		});
		var postForm = function()
		{
			var topic_title = $('#summernote1').html($('#summernote1').code());
			var topic_content = $('#summernote2').html($('#summernote2').code());
		}
</script>