<?php

namespace App\Models;

use App\Core\Model;
use App\Exceptions\WrongData;
use \App\Tools\ValidateForm;
use \App\Exceptions\ServerError;

class Login extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function login($formData)
    {
        $formData = (new ValidateForm())->login($formData);

        if (!$formData['dontRemember']) {
            $time = FORM_TIME_TO_REMEMBER;
        }

        try {
            $this->auth->login($formData['email'], $formData['password'], $time);
        }
        catch (\Delight\Auth\InvalidEmailException $e) {
            throw new WrongData('Invalid Email');
        }
        catch (\Delight\Auth\InvalidPasswordException $e) {
            throw new WrongData('Invalid Password');
        }
        catch (\Delight\Auth\EmailNotVerifiedException $e) {
            throw new WrongData('Email not verified');
        }
        catch (\Delight\Auth\TooManyRequestsException $e) {
            throw new ServerError('Server error');
        }
    }
}