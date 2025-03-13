<?php

namespace App\Http\Controllers;

use App\Services\TestFormValidation;
use Illuminate\Http\Request;

class TestController extends Controller
{
    private array $errors;
    private bool $sent;

    public function __construct() {
        $this->errors = [];
        $this->sent = false;
    }

    public function index() {
        $errors = $this->errors;
        $success = $this->sent;
        return view('test', compact('errors'), compact('success'));
    }

    public function store(Request $request) {
        $data = $request->all();

        $validation = new TestFormValidation();

        $validation->setRule("name", 'isName');
        $validation->setRule("age", 'isAge');
        $validation->setRule("question1", 'validAnswer1');
        $validation->setRule("question2", 'validAnswer2');
        $validation->setRule("question3", 'validAnswer3');

        $data["question2"] = '';

        foreach ($data as $key => $value) {
            if (strcmp(explode('_', $key)[0], "question2") === 0) {
                $data["question2"] = $data["question2"] . "_" . $value;
            }
        }

        $validation->validate($data);
        $this->errors = $validation->showErrors();
        $this->sent = count($this->errors) === 0;
        return $this->index();
    }
}
