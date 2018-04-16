<?php

namespace App\Models;

use App\Core\Model;
use App\SQLs\Create as SQL;

class Create extends Model
{
    private $sql = null;

    public function __construct()
    {
        parent::__construct();
    }
    
    public function fork($id) {
        $userId = $this->auth->getUserId();
        return SQL::fork($id, $userId);
    }

    public function save($data) {
        $html = ($data['html']) ?? null;
        $css = ($data['css']) ?? null;
        $js = ($data['js']) ?? null;
        $id = ($data['id']) ?? null;

        return SQL::save($this->auth->getUserId(), $id, $html, $css, $js);
    }

    public function getSnip($id) {
        return SQL::getSnip($id);
    }
}
