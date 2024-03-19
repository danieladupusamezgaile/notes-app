<?php

namespace App\Controllers\Notes;

use App\Model\Controller;
use App\Src\Validator;

class NotesController extends Controller
{
    protected $view;
    private $data = [];
    private $errors = [];
    public function index()
    {
        $notes = $this->selectall("SELECT * FROM notes WHERE user_id=?", [$_SESSION['user']['id']]);
        $data = [
            'notes' => $notes,
            'notesActive' => 'active'
        ];
        // if (empty($user)) {
        //     $this->errors['emailErr'] = 'User with this email not registered';
        //     return false;
        // }
        $this->view("notes/index", $data);
    }
    function create(){
        $this->view("notes/create", ['notesActive' => 'active']);
    }
    public function validate()
    {
        // Validate empty inputs
        if (empty($_POST['title']) || empty($_POST['body'])) {
            $this->errors['emptyErr'] = 'Please, fill out all fields';
            return false;
        }

        // Save inputs
        $this->data['title'] = htmlspecialchars($_POST['title']);
        $this->data['body'] = htmlspecialchars($_POST['body']);

        return true;
    }
    public function store()
    {
        // Validate data
        if (!$this->validate()) {
            $this->view('notes/create', $this->errors);
            die();
        }

        extract($this->data);

        $st = $this->conn->prepare("INSERT INTO notes (title, body, user_id) VALUES (?,?,?)");
        $st->bind_param("sss", $title, $body, $_SESSION['user']['id']);

        if (!$st->execute()) { // === bool
            $this->errors['databseErr'] = "An error occured, while inserting data";
            $this->view('notes/create', $this->errors);
            die();
        }

        header("Location: /notes");
        die();
    }
}