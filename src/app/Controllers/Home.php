<?php

namespace App\Controllers;

use \App\Core\Controller;

/**
 * The default assets controller, called when no controller/method has been passed
 * to the application.
 */
class Home extends Controller
{

    public function __construct()
    {
        parent::__construct(__CLASS__);
    }

    /**
     * The default controller method.
     *
     * @return void
     */
    public function index($sort = 'popular')
    {
        if (!in_array($sort, ['popular', 'new'], true)) {
            $this->e404();
        }
        $this->view->snipets = $this->model->getSnipIndex($sort);
        $this->view->render();
    }
    
    public function logout() {
        
        if (!$this->checkUser()) {
            $this->e404();
        }
        
        $this->model->logout();
        $this->index();
    }
}
