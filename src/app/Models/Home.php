<?php

namespace App\Models;

use App\Core\Model;
use App\SQLs\Home as SQL;

class Home extends Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function logout() {
        $this->auth->logOutAndDestroySession();
    }

    public function getSnipIndex($sort) {
        return SQL::getSnip($sort);
    }
}
