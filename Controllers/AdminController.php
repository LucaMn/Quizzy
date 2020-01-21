<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Models//User.php';
require_once __DIR__.'//..//Repository//UserRepository.php';

class AdminController extends AppController {

    public function users()
    {   
        $userRepository = new UserRepository();
        $users = $userRepository->getUsers();

        $this->render('users', ['users' => $users]);
    }
}