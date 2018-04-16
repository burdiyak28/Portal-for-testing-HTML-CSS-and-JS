<?php

namespace App\Lib;

use App\Exceptions\WrongData;
use Delight\Cookie\Session;

class FlashMessage
{
    const SessionMessageName = 'flash_messages';

    private static $msgTypes = [
        'e' => 'error',
        'w' => 'warning',
        's' => 'success',
        'i' => 'info',
    ];

    public function __construct(bool $replace = true)
    {
        if (!((bool) session_status())) {
            Session::start();
        }

        if ($replace) {
            $_SESSION[self::SessionMessageName] = [];
        }
    }

    public static function getMessages(string $type) {

        if (!in_array($type, self::$msgTypes, true)) {
            throw new WrongData('Type not found');
        }

        $result = $_SESSION[self::SessionMessageName][$type];
        unset($_SESSION[self::SessionMessageName][$type]);
        return $result;
    }
    
    public function error(string $message) {
        $this->_add($message, self::$msgTypes['e']);
        return $this;
    }
    
    public function warning(string $message) {
        $this->_add($message, self::$msgTypes['w']);
        return $this;
    }
    
    public function success(string $message) {
        $this->_add($message, self::$msgTypes['s']);
        return $this;
    }
    
    public function info(string $message) {
        $this->_add($message, self::$msgTypes['i']);
        return $this;
    }
    
    public function errorArray(array $messages) {
        $this->_addArray($messages, self::$msgTypes['e']);
        return $this;
    }
    
    public function warningArray(array $messages) {
        $this->_addArray($messages, self::$msgTypes['w']);
        return $this;
    }
    
    public function successArray(array $messages) {
        $this->_addArray($messages, self::$msgTypes['s']);
        return $this;
    }
    
    public function infoArray(array $messages) {
        $this->_addArray($messages, self::$msgTypes['i']);
        return $this;
    }
    
    private function _add(string $message, string $msgType) {
        if (empty($message)) {
            throw new WrongData('Message cant be empty');
        }
        $_SESSION[self::SessionMessageName][$msgType][] = $message;
    }

    private function _addArray(array $messages, string $msgType) {
        foreach ($messages as $message) {
            if (!is_string($message) || empty($message)) {
                throw new WrongData('Message cant be empty');
            }
        }

        if (isset($_SESSION[self::SessionMessageName][$msgType])) {
            $_SESSION[self::SessionMessageName][$msgType][] += array_values($messages);
        } else {
            $_SESSION[self::SessionMessageName][$msgType] = array_values($messages);
        }
    }
}