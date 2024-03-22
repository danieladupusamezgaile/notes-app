<?php

namespace App\Controllers\Notes;

use App\Model\Controller;
use App\Src\Validator;

class NotesController extends Controller
{
    protected $view;
    private $data = [];
    private $errors = [];
    public function index($view)
    {
        // $this->view($view);
        if (!isset ($_SESSION['user']['id'])) {
            $this->view("notes/index");
            die();
        }

        $notes = $this->selectall("SELECT * FROM notes WHERE user_id=?", [$_SESSION['user']['id']]);
        $data = [
            'notes' => $notes,
            'notesActive' => 'active'
        ];
        $this->view($view, $data);
    }
    function create()
    {
        $this->view("notes/create", ['notesActive' => 'active']);
    }
    public function validate()
    {
        // Validate empty inputs
        if (empty ($_POST['title']) || empty ($_POST['body'])) {
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
    public function delete()
    {
        echo "NotesController::delete()<br>";
        if (!isset ($_POST['checkbox'])) {
            header("Location: /notes");
            die();
        }

        foreach ($_POST['checkbox'] as $note) {
            $st = $this->conn->prepare("DELETE FROM notes WHERE  id=?");
            $st->bind_param("s", $note);

            if (!$st->execute()) { // === bool
                $this->errors['databseErr'] = "An error occured, while deleting data";
                $this->view('notes/index', $this->errors);
                die();
            }
        }

        header("Location: /notes");
        die();
    }
    public function deleteone()
    {
        var_dump("NotesController::deleteone()<br>");

        $st = $this->conn->prepare("DELETE FROM notes WHERE  id=?");
        $st->bind_param("s", $_POST['id']);

        if (!$st->execute()) { // === bool
            $this->errors['databseErr'] = "An error occured, while deleting data";
            $this->view('notes/index', $this->errors);
            die();
        }

        header("Location: /notes");
        die();
    }
    public function edit()
    {
        if (!isset ($_SESSION['user'])) {
            header("Location: /");
            die();
        }
        $note = $this->select("SELECT * FROM notes WHERE id=? AND user_id=?", [$_GET['id'], $_SESSION['user']['id']]);
        if ($note ?? false) {
            $this->view("notes/edit", $note);
        }
    }
    public function update()
    {
        // Validate data
        if (!$this->validate()) {
            $this->view('notes/edit', $this->errors);
            die();
        }

        extract($this->data);

        $st = $this->conn->prepare("UPDATE notes SET title=?, body=? WHERE user_id=? AND id=?");
        $st->bind_param("ssss", $title, $body, $_SESSION['user']['id'], $_POST['id']);

        if (!$st->execute()) { // === bool
            $this->errors['databseErr'] = "An error occured, while inserting data";
            $this->view('notes/create', $this->errors);
            die();
        }

        header("Location: /notes/edit?id=" . $_POST['id']);
        die();
    }
    public function show()
    {
        $note = $this->select("SELECT * FROM notes WHERE id=? AND user_id=?", [$_GET['id'], $_SESSION['user']['id']]);
        if ($note ?? false) {
            $this->view("notes/show", $note);
        }
    }
}