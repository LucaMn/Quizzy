<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//User.php';
require_once __DIR__.'//..//Repository//UserRepository.php';

class SecurityController extends AppController {

    public function register()
    {   
        $userRepository = new UserRepository();

        if ($this->isPost()) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];

            if (empty($username)) {
                $this->render('register', ['messages' => ['Username is required']]);
                return;
            }
            if (empty($email)) {
                $this->render('register', ['messages' => ['Email is required']]);
                return;
            }

            if (!(strpos($email,'@') && strpos($email,'.'))) {
                $this->render('register', ['messages' => ['Wrong email address']]);
                return;
            }

            if (empty($password)) {
                $this->render('register', ['messages' => ['Password is required']]);
                return;
            }

            if (strlen($password)<6) {
                $this->render('register', ['messages' => ['Password requires at least 6 characters']]);
                return;
            }

            if ($password !== $password2) {
                $this->render('register', ['messages' => ['Passwords do not match']]);
                return;
            }
            $password = md5($password);
            $user = $userRepository->createUser($username, $email, $password);

            if (!$user) {
                $this->render('register', ['messages' => ['User with this email or username already exsits!']]);
                return;
            }
            $this->render('login', ['messages' => ['You account was successfully created. You can now log in.']]);
        }

        $this->render('register');
    }

    public function login()
    {   
        $userRepository = new UserRepository();

        if ($this->isPost()) {
            $useremail = $_POST['useremail'];
            $password = $_POST['password'];
            $password = md5($password);
            $user = $userRepository->getUser($useremail);

            if (!$user) {
                $this->render('login', ['messages' => ['User with this email not exist!']]);
                return;
            }

            if ($user->getPassword() !== $password) {
                $this->render('login', ['messages' => ['Wrong password!']]);
                return;
            }
            $_SESSION["id"] = $user->getUsername();
            $_SESSION["role"] = $user->getRole();
            $url = "http://$_SERVER[HTTP_HOST]/";
            header("Location: {$url}?page=home");
            return;
        }

        $this->render('login');
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        $this->render('login', ['messages' => ['You have been successfully logged out!']]);
    }
}