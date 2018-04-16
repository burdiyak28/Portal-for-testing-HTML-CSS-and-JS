<?php

namespace App\Models;

use App\Core\Model;
use App\Exceptions\WrongData;
use \App\Tools\ValidateForm;
use \App\Exceptions\ServerError;

class Registration extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registration($formData)
    {
        $formData = (new ValidateForm())->registration($formData);

        try {
            $userId = $this->auth->register($formData['email'], $formData['password'], function ($selector, $token) {
                $this->sendEmailVerification($selector, $token);
            });

            return $this->loginUser($userId);

        } catch (\Delight\Auth\InvalidEmailException $e) {
            throw new WrongData('Invalid Email');
        } catch (\Delight\Auth\InvalidPasswordException $e) {
            throw new WrongData('Invalid Password');
        } catch (\Delight\Auth\UserAlreadyExistsException $e) {
            throw new WrongData('User already exists');
        } catch (\Delight\Auth\TooManyRequestsException $e) {
            throw new ServerError('Server error');
        }
    }

    private function sendEmailVerification($selector, $token)
    {
        //TODO add send user code to email
    }

    private function loginUser($userId)
    {
        //TODO automatic login user
        return true;
    }
}