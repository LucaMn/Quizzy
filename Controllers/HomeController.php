<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Database.php';

class HomeController extends AppController {

    public function homeq()
    {   
        
        $this->render('home');
    
    }
}