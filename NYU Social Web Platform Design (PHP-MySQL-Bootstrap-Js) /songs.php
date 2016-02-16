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

	// get all the songs 
	$sql = "SELECT name, artist FROM songs ORDER BY name";
	$result = mysqli_query($db, $sql); 
	

	while($row = mysqli_fetch_assoc($result))
	{
		echo $row['name'] . ": " .$row['artist'] . "<br />";
	}
	?>
</body>
<? include("footer.php"); ?>