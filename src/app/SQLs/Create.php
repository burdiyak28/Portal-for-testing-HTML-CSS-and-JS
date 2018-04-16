<?php

namespace App\SQLs;

use App\Core\SQL;

class Create extends SQL
{
    
    public static function fork($id, $userId) {
        $data = self::$db->selectRow(
            'SELECT * FROM code WHERE id = ? LIMIT 1',
            [
                $id
            ]
        );
        self::$db->insert(
            'code',
            [
                'user_create' => (int) $userId,
                'html' => $data['html'],
                'css' => $data['css'],
                'js' => $data['js'],
                'fork' => $id,
            ]
        );
        $id = self::$db->getLastInsertId();
        return array(
            'html' => $data['html'],
            'css' => $data['css'],
            'js' => $data['js'],
            'id' => $id,
        );
    }

    public static function getSnip($id) {
        self::$db->exec(
            'UPDATE code SET views = views + 1'
        );
        return self::$db->selectRow(
            'SELECT * FROM code WHERE id = ? LIMIT 1',
            [
                $id
            ]
        );
    }

    public static function save($userId, $id, $html, $css, $js) {
        $id = self::$db->selectValue(
            'SELECT id FROM code WHERE id = ? LIMIT 1',
            [
                $id
            ]
        );
        if ($id) {
            self::$db->update(
                'code',
                [
                    'user_create' => (int) $userId,
                    'html' => $html,
                    'css' => $css,
                    'js' => $js,
                ],
                [
                    'id' => $id
                ]
            );
        } else {
            self::$db->insert(
                'code',
                [
                    'user_create' => (int) $userId,
                    'html' => $html,
                    'css' => $css,
                    'js' => $js,
                ]
            );
            return self::$db->getLastInsertId();
        }
        return true;
    }
}