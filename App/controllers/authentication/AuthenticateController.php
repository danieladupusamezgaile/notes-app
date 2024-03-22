<?php

namespace App\Controllers\Authentication;

use App\Model\Controller;
use App\Src\Validator;

class AuthenticateController extends Controller
{
    protected $view;
    private $data = [];
    private $errors = [];
    public function index($view)
    {
        $this->view($view, ['authenticateActive' => 'active']);
    }
    public function validate()
    {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            $this->errors['emptyErr'] = 'Please, fill out all fields';
            return false;
        }

        if (!Validator::email($_POST['email'])) {
            $this->errors['emailErr'] = 'Please, enter valid email address';
            return false;
        }

        $user = $this->select("SELECT * FROM users WHERE email=?", [$_POST['email']]);

        if (empty($user)) {
            $this->errors['emailErr'] = 'User with this email not registered';
            return false;
        }

        if (!password_verify($_POST['password'], $user['password'])) {
            $this->errors['passwordErr'] = 'Invalid password';
            return false;
        }

        $this->data['id'] = $user['id'];

        return true;
    }
    public function login()
    {
        if (!$this->validate()) {
            $this->view('authentication/authenticate', $this->errors);
            die();
        }

        // create session
        $_SESSION['user'] = [
            'id' => $this->data['id'],
            'timeout' => time()
        ];

        header('location: /notes');
        die();
    }
    public function logout()
    {
        $_SESSION['user'] = [];
        session_destroy();
        header('Location: /');
        die();
    }
}