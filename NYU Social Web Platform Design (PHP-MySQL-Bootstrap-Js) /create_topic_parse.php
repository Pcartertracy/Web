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
	

	if (isset($_POST['topic_submit'])) {
		if (($_POST['topic_title'] == "") && ($_POST['topic_content'] == "")) {
			echo "You did not fill in both fields. Please return to the previous page.";
			exit();
	} else {
		$cid = $_POST['cid'];
		$title = $_POST['topic_title'];
		$content = $_POST['topic_content'];
		$creator = $_SESSION['user_id'];
		$sql = "INSERT INTO topics (category_id, topic_title, topic_creator, topic_date, topic_reply_date) VALUES ('".$cid."', '".$title."', '".$creator."', now(), now())";
		$res = mysqli_query($db, $sql) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
		$new_topic_id = mysqli_insert_id();
		$sql2 = "INSERT INTO posts (category_id, topic_id, post_creator, post_content, post_date) VALUES ('".$cid."', '".$new_topic_id."', '".$creator."', '".$content."', now())";
		$res2 = mysqli_query($db, $sql2) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
		$sql3 = "UPDATE categories SET last_post_date=now(), last_user_posted='".$creator."' WHERE id='".$cid."' LIMIT 1";
		$res3 = mysqli_query($db, $sql3) OR die ('Could not connect to MySQL: ' . mysqli_connect_error());
		if (($res) && ($res2) && ($res3)) {
			header("Location: view_topic.php?cid=".$cid."&tid=".$new_topic_id);
		} else {
			echo "There was a problem creating your topic. Please try again.";
		}
	}
}

?>