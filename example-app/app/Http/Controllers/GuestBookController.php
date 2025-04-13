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
    private string $messagesFilePath;

    public function __construct() {
        $this->errors = [];
        $this->sent = false;
        $this->messagesFilePath = storage_path('app/public/messages.inc');
    }

    public function index() {
        $errorsList = $this->errors;
        $success = $this->sent;
        $contents = explode(PHP_EOL, file_get_contents($this->messagesFilePath));

        $reviews = [];

        foreach ($contents as $line) {
            $content = explode(';', $line);
            if (count($content) !== 4) {
                break;
            }
            $data = ['date' => $content[0], 'name' => $content[1], 'email' => $content[2], 'body' => $content[3]];
            $reviews[] = $data;
        }

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
            $reviews = file_get_contents($this->messagesFilePath);
            $newReview = date('Y-m-d').";".$data['name'].";".$data['email'].";".$data['body']."\n";
            file_put_contents($this->messagesFilePath, $newReview.$reviews);
            Review::create(['name' => $data['name'], 'email' => $data['email'], 'body' => $data['body']]);
        }
        return $this->index();
    }

    public function downloadReviewsFile() {
        $fileName = 'messages.inc';

        return Response::make(file_get_contents($this->messagesFilePath), 200, [
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
        $validation->setRule("date", 'isDate');
        $validation->setRule("name", 'isName');
        $validation->setRule("email", 'isEmail');
        $validation->setRule("body", 'isNotEmpty');

        $contents = explode(PHP_EOL, file_get_contents($file->getRealPath()));

        $reviews = [];

        foreach ($contents as $line) {
            $content = explode(';', $line);

            if (count($content) !== 4) {
                $this->errors[] = "Был опубликован файл неверного формата";
                return $this->index();
            }

            $data = ['date' => $content[0], 'name' => $content[1], 'email' => $content[2], 'body' => $content[3]];

            $validation->validate($data);
            $this->errors = $validation->showErrors();

            $reviews[] = $line;
        }

        rsort($reviews);

        if (count($this->errors) === 0) {
            file_put_contents($this->messagesFilePath, implode("\n", $reviews));
            $this->sent = true;
            error_log("test");
        }

        return $this->index();
    }

    public function getReviews() {
        return Review::all();
    }
}
