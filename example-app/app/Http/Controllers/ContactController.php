<?php

namespace App\Http\Controllers;

use App\Services\ContactFormValidation;
use Illuminate\Http\Request;

class ContactController extends Controller
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
        return view('contact', compact('errors'), compact('success'));
    }

    public function store(Request $request) {
        $data = $request->all();

        $validation = new ContactFormValidation();

        $validation->setRule("name", 'isName');
        $validation->setRule("email", 'isEmail');
        $validation->setRule("age", 'isAge');
        $validation->setRule("phone", 'isPhone');
        $validation->setRule("birthdate", 'isValidBirthdate');
        $validation->setRule("subject", 'isNotEmpty');
        $validation->setRule("body", 'isNotEmpty');

        $validation->validate($data);
        $this->errors = $validation->showErrors();
        $this->sent = count($this->errors) === 0;
        return $this->index();
    }
}
