<? include("header.php"); ?>
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
	$mode = $_GET['mode'];
	$vote = $_GET['vote'];
	$cookie = "Voted"; 

	function res () {  
  		$data = mysqli_query("SELECT * FROM votes")  or die(mysqli_error());  
  		$result = mysqli_fetch_array( $data );  
  		$total = $result[apple] + $result[windos];  
  		$one = round (360 * $result[apple] / $total);  
  		$two = round (360 * $result[windos] / $total);  
  		$per1 = round ($result[apple] / $total * 100);  
  		$per2 = round ($result[windos] / $total * 100);  
	} 
if ( $mode=="voted")  { 
	if(isset($_COOKIE[$cookie])) 
		{ 
			Echo "Sorry You have already voted<br>"; 
		} 
	else 
		{ 
			$month = 2592000 + time();  
			setcookie(Voted, Voted, $month);
			switch ($vote) 
				{ 
					case 1: mysqli_query ("UPDATE votes SET apple = apple+1"); break; 
					case 2: mysqli_query ("UPDATE votes SET windos = windos+1");

				 }  
			res (); 
		} 
}

if(isset($_COOKIE[$cookie])) 
	{ 
		res (); 
	}
else  
	{ 
	if(!$mode=='voted') 
	}
?> 
<body>
	<form action="<?php echo $_SERVER[’PHP_SELF’]; ?>" method="get"x>  
  		<select name="vote"> 
  		<ol>
       		<li>
          	<h3>Which OS is better?</h3>
            <div>
              <input type="radio" name="q1a" id="q1a-A" value="A" />
                 <option value="1">A) Windos</option>
             </div>
             <div>
               <input type="radio" name="q1a" id="q1a-B" value="B" />
                <option value="2">B) Apple </option> 
            </div>
            </li>
		</ol> 
		</select> 
		<input type=hidden name=mode value=voted> 
		<input type=submit>
	</form> 
</body> 


<? include("footer.php"); ?>