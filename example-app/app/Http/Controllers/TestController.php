<?php

namespace App\Http\Controllers;

use App\Models\TestResults;
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
        $results = TestResults::all()->sortByDesc("created_at");

        return view('test', compact('errors', 'success', 'results'));
    }

    public function store(Request $request) {
        $data = $request->all();

        $validation = new TestFormValidation();

        $validation->setRule("name", 'isName');
        $validation->setRule("age", 'isAge');
        /*$validation->setRule("question1", 'validAnswer1');
        $validation->setRule("question2", 'validAnswer2');
        $validation->setRule("question3", 'validAnswer3');*/

        $data["question2"] = '';

        foreach ($data as $key => $value) {
            if (strcmp(explode('_', $key)[0], "question2") === 0) {
                $data["question2"] = $data["question2"] . "_" . $value;
            }
        }

        $validation->validate($data);
        $this->errors = $validation->showErrors();
        $this->sent = count($this->errors) === 0;
        if ($this->sent) {
            TestResults::create([
                'name' => $data['name'],
                'group' => $data['group'],
                'age' => $data['age'],
                'answer1' => $data['question1'],
                'answer2' =>
                    str_replace('_', ' ',
                        str_replace('plane', 'Самолёт',
                            str_replace('bolt', 'Болт',
                                str_replace('vent', 'Вентиль',
                                    str_replace('scissors', 'Ножницы', $data['question2']))))),
                'answer3' => $data['question3'],
                'answer1IsCorrect' => $validation->validAnswer1($data['question1']),
                'answer2IsCorrect' => $validation->validAnswer2($data['question2']),
                'answer3IsCorrect' => $validation->validAnswer3($data['question3']),
            ]);
        }
        return $this->index();
    }
}
