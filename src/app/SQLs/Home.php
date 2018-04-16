<?php

namespace App\SQLs;

use App\Core\SQL;

class Home extends SQL
{
    
    public static function getSnip($sort) {
        if ($sort == 'new') {
            return self::$db->select('SELECT `id`, `create`FROM code ORDER BY `create` DESC LIMIT 8');
        } else {
            return self::$db->select('SELECT `id`, `views` FROM code ORDER BY `views` DESC LIMIT 8');
        }
    }
}