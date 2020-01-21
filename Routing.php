<?php

require_once 'Controllers//HomeController.php';
require_once 'Controllers//QuizController.php';
require_once 'Controllers//SecurityController.php';
require_once 'Controllers//AdminController.php';

class Routing {
    private $routes = [];

    public function __construct()
    {
        $this->routes = [
            'home' => [
                'controller' => 'HomeController',
                'action' => 'homeq'
            ],
            'quiz' => [
                'controller' => 'QuizController',
                'action' => 'startQuiz'
            ],
            'result' => [
                'controller' => 'QuizController',
                'action' => 'endQuiz'
            ],
            'login' => [
                'controller' => 'SecurityController',
                'action' => 'login'
            ],
            'register' => [
                'controller' => 'SecurityController',
                'action' => 'register'
            ],
            'logout' => [
                'controller' => 'SecurityController',
                'action' => 'logout'
            ],
            'users' => [
                'controller' => 'AdminController',
                'action' => 'users'
            ]
        ];
    }

    public function run()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 'login';

        if (isset($this->routes[$page])) {
            $controller = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $controller;
            $object->$action();
        }
    }
}