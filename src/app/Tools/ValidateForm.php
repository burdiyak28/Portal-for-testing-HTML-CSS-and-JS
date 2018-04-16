<?php
/**
 * Created by PhpStorm.
 * User: fuckyou
 * Date: 05/03/18
 * Time: 18:46
 */

namespace App\Tools;

use \App\Lib\FlashMessage;
use \App\Lib\Validator;
use \App\Exceptions\WrongData;

class ValidateForm
{
    private $validator = null;

    public function __construct()
    {
        $this->validator = new Validator();
    }

    public function login(array $post)
    {
        $this->validator->setData($post);
        $this->validator
            ->required()
            ->email()
            ->validate("email");
        $this->validator
            ->required()
            ->validate("password");

        if ($this->validator->hasErrors()) {
            $this->flashError($this->validator->getAllErrors());
        }
        return $this->validator->getValidData();
    }

    public function registration(array $post)
    {
        $this->validator->setData($post);
        $this->validator
            ->required()
            ->email()
            ->maxLength(250)
            ->validate("email");
        $this->validator
            ->required()
            ->minLength(FORM_MIN_PASSWORD)
            ->maxLength(FORM_MAX_PASSWORD)
            ->matches("confirmPassword", "Confirm Password")
            ->validate("password");
        $this->validator
            ->required()
            ->validate("confirmPassword");

        if ($this->validator->hasErrors()) {
            $this->flashError($this->validator->getAllErrors());
        }
        return $this->validator->getValidData();
    }

    public function remember(array $post)
    {
        $this->validator->setData($post);
        $this->validator
            ->required()
            ->email()
            ->validate("email");

        if ($this->validator->hasErrors()) {
            $this->flashError($this->validator->getAllErrors());
        }
        return $this->validator->getValidData();
    }

    public function checkHash(array $get, $name = 'code')
    {
        $this->validator->setData($get);
        $this->validator
            ->filter(function ($val) {
                if (preg_match('/^[a-z0-9]+$/', $val)) {
                    return $val;
                }
                return false;
            })
            ->required()
            ->length(40)
            ->validate($name);

        if ($this->validator->hasErrors()) {
            $this->flashError($this->validator->getAllErrors());
        }
        return $this->validator->getValidData();
    }

    public function newPassword(array $post)
    {
        $this->validator->setData($post);
        $this->validator
            ->required()
            ->minLength(FORM_MIN_PASSWORD)
            ->maxLength(FORM_MAX_PASSWORD)
            ->matches("confirmPassword", "Confirm Password")
            ->validate("password");
        $this->validator
            ->required()
            ->validate("confirmPassword");

        if ($this->validator->hasErrors()) {
            $this->flashError($this->validator->getAllErrors());
        }
        return $this->validator->getValidData();
    }

    private function flashError(array $getAllErrors)
    {
        (new FlashMessage(true))->errorArray($getAllErrors);
        throw new WrongData('Wrong data set');
    }
}