<?php

require_once "Repository.php";
require_once __DIR__.'//..//Models//User.php';

class UserRepository extends Repository {

    public function updateScore(int $id, int $score, int $completed)
    {
        try {
        $stmt = $this->database->connect()->prepare('
            UPDATE points SET score = :score, completed = :completed WHERE id = :id
        ');
        $stmt->bindParam(':score', $score, PDO::PARAM_INT);
        $stmt->bindParam(':completed', $completed, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        }catch(PDOException $e){
            $pdo->rollback();
            echo "blad";
        }
    }

    public function loadQuestions()
    {
        $stmt = $this->database->connect()->prepare(
                   'SELECT * FROM questions'
    );
    $stmt->execute();
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo '<script>';
    echo 'var questions = ' . json_encode($questions) . ';';
    echo '</script>';
    }

    public function createUser(string $username,string $email,string $password)
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users WHERE username = :username OR email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user) {
            return false;
        }
        try {
            $pdo = $this->database->connect();
        $stmtr = $pdo->prepare('
            INSERT INTO users (username, email, password) 
            VALUES (:username, :email, :password)');
        $stmtr->execute([
            'username' => $username,
            'email' => $email,
            'password' => $password,
        ]);
        $id = (int)$pdo->lastInsertId();
        $score = 0;
        $completed = 0;
        $stmtr2 = $pdo->prepare('
            INSERT INTO points (id, score, completed) 
            VALUES (:id, :score, :completed)');
        $stmtr2->execute([
            'id' => $id,
            'score' => $score,
            'completed' => $completed,
            ]);
        } catch(PDOException $e){
            $pdo->rollback();
            return false;
        }

        return true;

    }

    public function getUser(string $useremail): ?User 
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users WHERE username = :useremail OR email = :useremail
        ');
        $stmt->bindParam(':useremail', $useremail, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        $stmt2 = $this->database->connect()->prepare('
            SELECT * FROM points WHERE id = :id
        ');
        $stmt2->bindParam(':id', $user['id'], PDO::PARAM_INT);
        $stmt2->execute();
        $points = $stmt2->fetch(PDO::FETCH_ASSOC);

        return new User(
            $user['username'],
            $user['email'],
            $user['password'],
            $user['id'],
            $points['score'],
            $points['completed']
        );
    }

    public function getUsers(): array {
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users
        ');
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt2 = $this->database->connect()->prepare('
            SELECT * FROM points
        ');
        $stmt2->execute();
        $points = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        $i = 0;
        foreach ($users as $user) {
            $result[] = new User(
                $user['username'],
                $user['email'],
                $user['password'],
                $user['id'],
                $points[$i]['score'],
                $points[$i]['completed']
            );
            $i += 1;
        }

        return $result;
    }
}