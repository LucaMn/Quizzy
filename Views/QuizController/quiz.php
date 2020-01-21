<?php
    if(!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
        die('You are not logged in!');
    }

    if(!in_array('ROLE_USER', $_SESSION['role'])) {
        die('You do not have permission to watch this page!');
    }
?>
 

<!DOCTYPE html>
<html>
<head>
	<title>Quiz </title>
	
	<meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../Public/css/style.css">
</head>
<body>
	<?php include(dirname(__DIR__).'/Common/navbar.php'); ?>
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
	<script src="../../Public/js/script.js"></script>
</body>
</html>