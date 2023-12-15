<?php

namespace core\controllers;

use core\models\Generations;
use core\views\View;

class RandomNumberGenerator {

    public $view;

    public function __construct()
    {
        $this->view = new View();
    }
    public function generateRandomNumber() {
        
        $id = uniqid();
        $randomNumber = rand();
        $gen = new Generations($id, $randomNumber);
        $res = $gen->insert_one();
        $this->view->responseJson($res);
        
    }

    public function getGeneratedNumber($id) {        
        $gen = new Generations($id);
        $res = $gen->get_by_id();
        $this->view->responseJson($res);
    }
}
