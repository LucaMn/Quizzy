<?php
    if(isset($_SESSION['id']) and isset($_SESSION['role'])) {
        header('Location: ?page=home');
    }
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="../Public/css/index.css" />
    <title>Quizzy</title>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="../Public/img/logo.svg">
    </div>
    <form action="?page=login" method="POST">
        <div class="messages">
            <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
            ?>
        </div>
        <input name="useremail" type="text" placeholder="Username or email">
        <input name="password" type="password" placeholder="Password">
        <button type="submit">Login</button>
        <a href="?page=register" class="button">Register</a>
    </form>
    
</div>
</body>
</html>