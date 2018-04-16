<?php

namespace App\Controllers;

use \App\Core\Controller;

/**
 * The default assets controller, called when no controller/method has been passed
 * to the application.
 */
class Create extends Controller
{
    private $data = null;

    public function __construct()
    {
        parent::__construct(__CLASS__);
    }

    /**
     * The default controller method.
     *
     * @return void
     */
    public function index()
    {
        if ($this->data !== null) {
            $this->view->projectId = $this->data['id'];
            $this->view->html = $this->data['html'];
            $this->view->css = $this->data['css'];
            $this->view->js = $this->data['js'];
            $this->data = null;
            $this->view->disableFork = true;
            $this->view->disableSave = false;
        } else {
            $this->view->disableFork = true;
            $this->view->disableSave = false;
            $this->view->projectId = '';
        }
        $this->view->render();
    }

    public function snip($id)
    {

        $project = $this->model->getSnip($id);

        if (!$project) {
            $this->e404();
        }
        
        $this->view->disableFork = false;
        $this->view->disableSave = true;
        $this->view->projectId = $project['id'];
        $this->view->html = $project['html'];
        $this->view->css = $project['css'];
        $this->view->js = $project['js'];

        $this->view->render('create');
    }

    public function fork($id)
    {
        if (!$this->checkUser() || empty($id)) {
            $this->e404('');
        }
        
        $data = $this->model->fork($id);
        
        if (empty($data)) {
            $this->e404('qwe');
        }
        
        $this->data['id'] = $data['id'];
        $this->data['html'] = $data['html'];
        $this->data['css'] = $data['css'];
        $this->data['js'] = $data['js'];
        $this->index();
    }

    public function save()
    {
        $this->checkAjax();
        if (!$this->checkUser()) {
            $this->echoError('Some error');
        }

        $result = $this->model->save($_POST);
        if ($result) {
            $this->echoSuccess(((is_bool($result)) ? 'ok' : $result));
        } else {
            $this->echoError('Server error');
        }
    }
}
