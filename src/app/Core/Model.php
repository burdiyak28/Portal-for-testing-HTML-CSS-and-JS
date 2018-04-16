<?php

namespace App\Core;

use \Delight\Auth\Auth;

class Model
{
    protected $auth = null;

    protected function __construct()
    {
        $db = SQL::getInstance()->getDb();
        $this->auth = new Auth($db);
    }

    public function checkUser() {
        return $this->auth->isLoggedIn();
    }
}