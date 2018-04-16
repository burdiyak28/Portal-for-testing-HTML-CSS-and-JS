<?php

namespace App\Core;
/**
 * The controller class.
 *
 * The base controller for all other Controllers. Extend this for each
 * created controller and get access to it's wonderful functionality.
 */

use \App\Exceptions\NotFound;

class Controller
{
    protected $view = null,
              $model = null;

    protected function __construct($className)
    {
        $className = explode('\\', $className);
        $class = array_pop($className);
        $this->model($class);
        $this->view($class);
    }

    public function __destruct()
    {
         $this->view = null;
         $this->model = null;
    }

    /**
     * @param string $viewName
     * @throws NotFound
     */
    private function view($viewName)
    {
        $this->view = View::getInstance(strtolower($viewName));
    }

    /**
     * @param string $modelName
     * @throws NotFound
     */
    private function model($modelName)
    {
        $className = '\\App\\Models\\' . ucfirst($modelName);
        if (class_exists($className)) {
            $this->model = new $className;
        } else {
            throw new NotFound('Not found ' . $className);
        }
    }

    /**
     * @return mixed
     */
    protected function checkUser() {
        return $this->model->checkUser();
    }

    protected function e404($message = 'Error') {
        http_response_code(404);
        $this->view->message = $message;
        $this->view->render('404');
        die;
    }

    protected function echoError($message) {
        echo json_encode(array('error' => $message));
        die;
    }

    protected function echoSuccess($data) {
        echo json_encode(array('success' => $data));
        die;
    }

    protected function checkAjax() {
        if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest' ) {
            $this->echoError('Some error');
        }
    }
}
