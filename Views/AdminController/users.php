<?php
    if(!isset($_SESSION['id']) and !isset($_SESSION['role'])) {
        die('You are not logged in!');
    }

    if(!in_array('ROLE_USER', $_SESSION['role'])) {
        die('You do not have permission to watch this page!');
    }
?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="Stylesheet" type="text/css" href="../Public/css/style.css" />
    <link rel="Stylesheet" type="text/css" href="../Public/css/home.css" />
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/723297a893.js" crossorigin="anonymous"></script>
    <title>Quizzy</title>
</head>
<body>
<?php include(dirname(__DIR__).'/Common/navbar.php'); ?>
<div class="container">
<div class="col-6">
    <table class="table mt-4 text-light">
        <thead>
            <tr>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Correct answers</th>
            <th scope="col">Overall score</th>
            </tr>
        </thead>
        <tbody>
            <?php
             foreach($users as $user): ?>
                    <tr>
                    <th scope="row"><?= $user->getUsername(); ?></th>
                    <td><?= $user->getEmail(); ?></td>
                    <td><?php if($user->getScore()==0) echo "0";
                    else echo round(($user->getScore()*100)/($user->getCompleted()*10)); 
                    ?>%</td>
                    <td><?= $user->getScore() ?></td>
                    </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
</div>
</body>
</html>