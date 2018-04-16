<?php

namespace App\Core;

use App\Exceptions\WrongData;

class View
{
    private $viewFileName = null,
            $data = array();

    private static $instance = null;

    public static function getInstance(string $controllerName) {
        if (self::$instance === null) {
            self::$instance = new self($controllerName);
        }
        return self::$instance;
    }

    private function __clone() {}

    private function __wakeup() {}

    private function __construct(string $controllerName)
    {
        $this->viewFileName = $controllerName;
    }

    public function __destruct()
    {
        self::$instance = null;
        $this->data = array();
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        if (!key_exists($name, $this->data)) {
            throw new WrongData('Key not found');
        }
        $tmp = $this->data[$name];
        unset($this->data[$name]);
        return $tmp;
    }

    public function render(string $fileName = null)
    {
        if ($fileName) {
            $viewFile = $fileName;
        } else {
            $viewFile = $this->viewFileName;
        }

        if (!empty($this->data)) {
            foreach ($this->data as $key => $value) {
                $$key = $value;
            }
        }

        require_once ROOT_VIEW_DIRECTORY . '/assets/index.php';
    }

}