<?php

namespace App\Core;

/**
 * The application class.
 *
 * Handles the request for each call to the application
 * and calls the chosen controller and method after splitting the URL.
 *
 */

use \Whoops\Run;
use \Whoops\Handler\PrettyPageHandler;
use \App\Exceptions\NotFound;

class App
{
    /**
     * Stores the controller from the split URL
     *
     * @var string
     */
    protected $controller = 'Home';

    /**
     * Stores the method from the split URL
     * @var string
     */
    protected $method = 'index';

    /**
     * Stores the parameters from the split URL
     * @var array
     */
    protected $params = [];

    public function __construct()
    {
        // Get broken up URL
        $url = $this->parseUrl();
        // Error Handler Init
        //$this->initWhoopsErrorHandler();

        // Does the requested controller exist?
        // If so, set it and unset from URL array
        $className = '\\App\\Controllers\\' . ucfirst($url[0]);
        if (isset($url[0])) {
            if (class_exists($className)) {
                //dd($className);
                $this->controller = new $className;
                unset($url[0], $className);
            } else {
                throw new NotFound('Class not found');
            }
        } else {
            $className = '\\App\\Controllers\\' . ucfirst($this->controller);
            $this->controller = new $className;
        }



        // Has a second parameter been passed?
        // If so, it might be the requested method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];

                unset($url[1]);
            } else {
                throw new NotFound('Function not found');
            }
        }

        // Set parameters to either the array values or an empty array
        $this->params = $url ? array_values($url) : [];

        // Call the chosen method on the chosen controller, passing
        // in the parameters array (or empty array if above was false)
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * Send any Exceptions or PHP errors to the Whoops! Error Handler
     *
     * @return $this
     */    
    public function initWhoopsErrorHandler()
    {
        $whoops = new Run;
        $whoops->pushHandler(new PrettyPageHandler);
        $whoops->register();

        return $this;
    }


    /**
     * Parse the URL for the current request. Effectivly splits it, stores the controller
     * and the method for that controller.
     *
     * @return array
     */
    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            // Explode a trimmed and sanitized URL by /
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL));
        }
    }
}
