<?php

namespace App\Controllers\Authentication;

use App\Model\Controller;
use App\Src\Validator;

class RegisterController extends Controller
{
    protected $view;
    private $data = [];
    private $errors = [];
    public function index()
    {
        $this->view("authentication/create");
    }
    public function validate()
    {
        // Validate empty inputs
        if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
            $this->errors['emptyErr'] = 'Please, fill out all fields';
            return false;
        }

        // Validate inputs
        if (!Validator::letterSpaceDash($_POST['name'])) $this->errors['nameErr'] = 'Please, use only letters';
        if (!Validator::email($_POST['email'])) $this->errors['emailErr'] = 'Please, enter valid email address';
        if (!Validator::password($_POST['password'])) $this->errors['passwordErr'] = 'Please, enter valid password';

        if (!empty($this->errors)) {
            return false;
        }

        // Save inputs
        $this->data['name'] = $_POST['name'];
        $this->data['email'] = $_POST['email'];
        $this->data['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

        return true;
    }
    public function store()
    {
        // Validate data
        if (!$this->validate()) {
            $this->view('register', $this->errors);
            die();
        }

        extract($this->data);

        $sql = "SELECT * FROM users WHERE email=?";
        $user = $this->conn->execute_query($sql, [$email])->fetch_assoc();

        if (!empty($user)) {
            $this->errors['emailErr'] = "User with this email already exists";
            $this->view('register', $this->errors);
            die();
        }

        $st = $this->conn->prepare("INSERT INTO users (name, email, password) VALUES (?,?,?)");
        $st->bind_param("sss", $name, $email, $password);

        if (!$st->execute()) { // === bool
            $this->errors['databseErr'] = "An error occured, while inserting data";
            $this->view('register', $this->errors);
            die();
        }

        header("Location: /authenticate");
        die();
    }
}