<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Database.php';
require_once __DIR__.'//..//Repository//UserRepository.php';

class QuizController extends AppController {

    public function startQuiz()
    {
        $userRepository = new UserRepository();
        $userRepository->loadQuestions();
        $this->render('quiz');
    }
    public function endQuiz()
    {
        if ($this->isPost()){
            $userRepository = new UserRepository();
            $user = $userRepository->getUser($_SESSION["id"]);
            $score = (int)$_POST['score'] + $user->getScore();
            $userRepository->updateScore($user->getId(),$score,$user->getCompleted()+1);
            $this->render('result');
        }
    }
}