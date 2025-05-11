<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Services\FormValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class BlogController extends Controller
{
    private array $errors;
    private bool $sent;

    public function __construct() {
        $this->errors = [];
        $this->sent = false;
    }

    public function index() {
        $blogPosts = Blog::with(['comments' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->orderBy('created_at', 'desc')->paginate(10);
        return view('blog', compact('blogPosts'));
    }

    public function blogEditIndex() {
        $errorsList = $this->errors;
        $success = $this->sent;
        $blogPosts = Blog::with(['comments' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }])->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.blogedit', compact('errorsList', 'success', 'blogPosts'));
    }

    public function store(Request $request) {
        $data = $request->all();

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

    public function destroy($id) {
        Blog::destroy($id);
        return $this->blogEditIndex();
    }

    public function editBlogPost(Request $request) {
        $request->validate([
            'data' => 'required|json'
        ]);

        $data = json_decode($request->input('data'), true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            return response()->json(['status' => 'error', 'message' => 'Invalid JSON format.'], 400);
        }

        $requiredKeys = ['author', 'topic', 'body'];
        foreach ($requiredKeys as $key) {
            if (!isset($data[$key])) {
                return response()->json(['status' => 'error', 'message' => "$key is required."], 400);
            }
        }

        $updated = Blog::where('id', $request->id)->update([
            'author' => $data['author'],
            'topic' => $data['topic'],
            'body' => $data['body'],
        ]);

        if ($updated) {
            return response()->json(['status' => 'success'], 200);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Update failed.'], 500);
        }
    }

    public function addBlogPostsFromFile(Request $request) {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv|max:2048',
        ]);

        $file = $request->file('csv_file');

        $validation = new FormValidation();

        $validation->setRule("topic", 'isNotEmpty');
        $validation->setRule("author", 'isName');
        $validation->setRule("body", 'isNotEmpty');
        $validation->setRule("created_at", 'isDate');

        $handle = fopen($file, 'r');
        $headerChecked = false;
        $rows = [];

        while (($row = fgetcsv($handle, 1000, ',')) !== false) {

            if (count($row) < 4) continue;

            if (!$headerChecked) {
                if ($row[0] !== 'topic' || $row[1] !== 'body' || $row[2] !== 'author' || $row[3] !== 'created_at') {
                    $this->errors[] = 'Был загружен неверный файл';
                    return $this->blogEditIndex();
                }
                $headerChecked = true;
                continue;
            }

            $data = ['topic' => $row[0], 'body' => $row[1], 'author' => $row[2], 'created_at' => $row[3]];

            $validation->validate($data);
            $rows[] = $data;
        }

        fclose($handle);

        $this->errors = $validation->showErrors();

        if (count($this->errors) === 0) {
            $this->sent = true;
            foreach ($rows as $row) {
                Blog::create($row);
            }
        }

        return $this->blogEditIndex();
    }

    public function downloadBlogPostsFile(Request $request) {
        $fileName = 'blog_posts.csv';

        $posts = Blog::all()->sortByDesc('created_at');

        $csvData = [
            ['topic', 'body', 'author', 'created_at'],
        ];

        foreach ($posts as $post) {
            $csvData[] = [
                $post->topic,
                $post->body,
                $post->author,
                $post->created_at,
            ];
        }

        $handle = fopen('php://temp', 'r+');

        foreach ($csvData as $row) {
            fputcsv($handle, $row);
        }

        rewind($handle);

        $content = stream_get_contents($handle);
        fclose($handle);

        return Response::make($content, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$fileName\"",
        ]);
    }
}
