<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Services\FormValidation;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private array $errors;
    private bool $sent;

    public function __construct() {
        $this->errors = [];
        $this->sent = false;
    }

    public function index() {
        $blogPosts = Blog::orderBy('created_at', 'desc')->paginate(10);
        return view('blog', compact('blogPosts'));
    }

    public function blogEditIndex() {
        $errorsList = $this->errors;
        $success = $this->sent;
        $blogPosts = Blog::orderBy('created_at', 'desc')->paginate(10);
        return view('blogedit', compact('errorsList', 'success', 'blogPosts'));
    }

    public function addBlogPost(Request $request) {
        $data = $request->all();

        foreach ($data as $key => $value) {
            error_log($key.' '.$value);
        }

        $request->validate([
            'image' => [
                'nullable',
                'image',
                'mimes:jpg,png,jpeg,gif,svg',
                'max:2048'
            ],
        ]);

        $validation = new FormValidation();

        $validation->setRule('author', 'isName');
        $validation->setRule('topic', 'isNotEmpty');
        $validation->setRule('body', 'isNotEmpty');

        $validation->validate($data);

        $this->errors = $validation->showErrors();

        if (!count($this->errors)) {
            $this->sent = true;
            $path = null;
            if (key_exists('image', $data)) {
                $path = $request->file('image')->store('blog', 'public');
            }
            Blog::create([
                'author' => $data['author'],
                'topic' => $data['topic'],
                'image' => $path,
                'body' => $data['body'],
            ]);
            error_log($path);
        }

        return $this->blogEditIndex();
    }
}
