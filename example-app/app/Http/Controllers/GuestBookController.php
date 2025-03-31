<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Services\FormValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class GuestBookController extends Controller
{
    private array $errors;
    private bool $sent;

    public function __construct() {
        $this->errors = [];
        $this->sent = false;
    }

    public function index() {
        $errorsList = $this->errors;
        $success = $this->sent;
        $reviews = Review::all()->sortByDesc("created_at");

        return view('guestbook', compact('errorsList', 'success', 'reviews'));
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

    public function downloadReviewsFile() {
        $reviews = Review::all()->sortByDesc("created_at");
        $content = "";

        if (!count($reviews)) {
            $content = "No reviews found";
        }

        foreach ($reviews as $review) {
            $content .= $review->created_at.";".$review->name.";".$review->email.";".$review->body.";\n";
        }

        $fileName = 'messages.inc';

        return Response::make($content, 200, [
            'Content-Type' => 'text/plain',
            'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
        ]);
    }

    public function uploadReviewFromFile(Request $request) {
        error_log("test");
        $request->validate([
            'text_file' => 'required|file|mimes:txt|max:128',
        ]);

        $file = $request->file('text_file');

        $validation = new FormValidation();
        $validation->setRule("name", 'isName');
        $validation->setRule("email", 'isEmail');
        $validation->setRule("body", 'isNotEmpty');

        $contents = explode(PHP_EOL, file_get_contents($file->getRealPath()));

        $reviews = [];

        foreach ($contents as $line) {
            $content = explode(';', $line);

            if (count($content) !== 3) {
                $this->errors[] = "Был опубликован файл неверного формата";
                return $this->index();
            }

            $data = ['name' => $content[0], 'email' => $content[1], 'body' => $content[2]];

            $validation->validate($data);
            $this->errors = $validation->showErrors();

            $reviews[] = $data;
        }

        if (count($this->errors) === 0) {
            foreach ($reviews as $review) {
                Review::create($review);
            }
            $this->sent = true;
        }

        return $this->index();
    }

    public function getReviews() {
        return Review::all();
    }
}
