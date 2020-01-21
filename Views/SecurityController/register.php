<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="../Public/css/index.css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>Quizzy</title>
</head>
<body>
<div class="container">
    <div class="logo">
        <img src="../Public/img/logo.svg">
    </div>
    <form action="?page=register" method="POST">
        <div class="messages">
            <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
            ?>
        </div>
        <input name="username" type="text" placeholder="Username" required>
        <input name="email" type="text" placeholder="email@email.com" required>
        <input name="password" type="password" placeholder="Password" required>
        <input name="password2" type="password" placeholder="Confirm password" required>
        <button type="submit">Register</button>
    </form>
</div>
</body>
</html>