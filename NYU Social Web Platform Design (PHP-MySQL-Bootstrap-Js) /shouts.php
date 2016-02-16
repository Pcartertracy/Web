<? include("header.php"); ?>
<body>
	<?php
	$db_user = 'root';
	$db_password = ''; 
	$db_host = 'localhost'; 
	$db_name = 'DSP'; 

	$db = mysqli_connect(
			$db_host,
			$db_user,
			$db_password,
			$db_name

		) OR die ('Can not connect' . mysqli_connect_error()); 

	if(isset($_POST['shout']))
	{
		if(!empty($_POST['shout']))
		{
			$shout = mysqli_real_escape_string($db, $_POST['shout']);
			$sql = "INSERT INTO shouts(
					shout_id, 
					shout,
					shout_date
				) VALUES (
					null, 
					'$shout',
					NOW()
				)";
			mysqli_query($db, $sql);

			echo'Your shout has bin saved';
		}
	}
	?>
	<h1>Shouts</h1>
	<form method="post" action="shouts.php">
		<textarea name="shout" rows="4" cols="30"></textarea><br />
		<input name="submit" type="submit" value="Save" /> 
	</form>

	<?php 
		$sql = "SELECT shout_id, shout, shout_date FROM shouts ORDER BY shout_date DESC";
		$result = mysqli_query($db, $sql); 
		while($row = mysqli_fetch_assoc($result))
		{
			echo $row['shout_date'] . "<br />" . $row['shout'] . "<hr />"; 
		}
	?>
</body>
<? include("footer.php"); ?>

