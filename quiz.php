<!DOCTYPE html>
<html>
<head>
	<title>Quiz </title>
	<link rel="stylesheet" href="../Public/css/style.css">

</head>
<body>
 <?php
 	$questions = array();
	if(file_exists("pytania.txt"))
	{
		if($handle = fopen("pytania.txt", "r"))
		{
			while(!feof($handle))
			{
				$data = fgets($handle);
				$carry = explode(";",$data);
				array_pop($carry);
				array_push($questions, $carry);
			}
			echo '<script>';
			echo 'var questions = ' . json_encode($questions) . ';';
			echo '</script>';
		}
	}
	else
	{
		throw new Exception("Out of service");
	}
	
?>
	<div class="container">
		<div class="question">
		</div>
		<div class="answers">
			<div id="0" class="answera" onclick="check(this)"></div>
			<div id="1" class="answerb" onclick="check(this)"></div>
			<div id="2" class="answerc" onclick="check(this)"></div>
			<div id="3" class="answerd" onclick="check(this)"></div>
		</div>
		<div class="bars">
			<div class="timeBar"><center><h3><span class="timeLeft"></span></h3></center></div>
			<div class="progressBar"><div class="prgB"><center><h3><span class="questionNumber"></span>/10</h3></center></div></div>
			
			
		</div>
	</div>
	<script src="../Public/js/script.js"></script>
</body>
</html>