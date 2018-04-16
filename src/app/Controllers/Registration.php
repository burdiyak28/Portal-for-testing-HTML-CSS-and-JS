<?php

namespace App\Controllers;

use \App\Core\Controller;
use App\Exceptions\BaseException;
use App\Lib\FlashMessage;

class Registration extends Controller
{

    public function __construct()
    {
        parent::__construct(__CLASS__);
    }

    /**
     * The default controller method. authorisation
     *
     * @return void
     */
    public function index()
    {


        $this->view->render();
    }

    public function registration()
    {
        try {
            $this->model->registration($_POST);
            header('Location: ' . SITE_FULL . '/create');
        } catch (BaseException $e) {
            $message = FlashMessage::getMessages('error');
            $message[] = "Error! WrongData input";
            $this->view->errorMessage = $message;
        }
        $this->view->render();
    }
}
