<? include("header.php"); ?>
<body>
	<div id="page-wrap">
        <?php
            $answer1 = $_POST['q1a'];
            $answer2 = $_POST['q2a'];
            $answer3 = $_POST['q3a'];
        
            $totalCorrect = 0;
            
            if ($answer1 == "B") { $totalCorrect++; }
            if ($answer2 == "A") { $totalCorrect++; }
            if ($answer3 == "A") { $totalCorrect++; }
            echo "<div id='results'>$totalCorrect / 3 correct</div>";
        ?>
	</div>
	
	<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
</body>
<? include("footer.php"); ?>