<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Services\FormValidation;
use Illuminate\Http\Request;

class GuestBookController extends Controller
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
        $reviews = Review::all()->sortByDesc("created_at");

        return view('guestbook', compact('errors', 'success', 'reviews'),);
    }

    public function addReview(Request $request) {
        $data = $request->all();

        $validation = new FormValidation();

        $validation->setRule("name", 'isName');
        $validation->setRule("email", 'isEmail');
        $validation->setRule("body", 'isNotEmpty');

        $validation->validate($data);
        $this->errors = $validation->showErrors();
        $this->sent = count($this->errors) === 0;
        if ($this->sent) {
            Review::create(['name' => $data['name'], 'email' => $data['email'], 'body' => $data['body']]);
        }
        return $this->index();
    }

    public function getReviews(Request $request) {
        return Review::all();
    }
}
