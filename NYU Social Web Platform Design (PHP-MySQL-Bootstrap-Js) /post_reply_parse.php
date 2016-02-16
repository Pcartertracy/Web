<?php
	
	// include configuration file
	include('config.php');

	// connect to the database
	$db = mysqli_connect ($db_host, $db_user, $db_password, $db_name) OR die ('Could not connect to MySQL: 0' . mysqli_connect_error());

	// continue the session
	session_start();

	// is the user allowed here
	if(!$_SESSION['user_id'])
	{
		header("Location: signup.php");
		exit();
	}
	
	if (isset($_POST['reply_submit'])) {
		
		$creator = $_SESSION['user_id'];
		$cid = $_POST['cid'];
		$tid = $_POST['tid'];
		$reply_content = $_POST['reply_content'];
		// Insert query to enter the information into the posts table
		$sql = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date) VALUES ('".$cid."', '".$tid."', '".$creator."', '".$reply_content."', now())";
		// Execute the INSERT query
		$$res = mysqli_query($db, $sql) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
		// Update query that will update the category that is associated with this topic reply
		$sql2 = "UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1";
		// Execute the category UPDATE query
		$res2 = mysqli_query($db, $sql2) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
		// Update query that will update the topic that is associated with this topic reply
		$sql3 = "UPDATE topics SET topic_reply_date=now(), topic_last_user='".$creator."' WHERE id='".$tid."' LIMIT 1";
		// Execute the topic UPDATE query
		$res3= mysqli_query($db, $sql3) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());

		if (($res) && ($res2) && ($res3)) {
			echo "<p>Your reply has been successfully posted. <a href='view_topic.php?cid=".$cid."&tid=".$tid."'>Click here to return to the topic.</a></p>";
		} else {
			echo "<p>There was a problem posting your reply. <a href='view_topic.php?cid=".$cid."&tid=".$tid."'>Try again later.</a></p>";
		}
		
	} else {
		exit();
	}	

?>