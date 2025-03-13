<?php

namespace App\Services;

use App\Services\FormValidation;

class TestFormValidation extends FormValidation {
    public function validAnswer1($data): bool {
        return !(bool)strcmp(mb_strtolower($data), "спецификация");
    }

    public function validAnswer2($data): bool {
        $valid = 0;
        $errors = 0;
        foreach (explode("_", $data) as $value) {
            if ($value == "bolt" || $value == "vent") {
                $valid++;
            } else if ($value == "plane" || $value == "scissors") {
                $errors++;
            }
        }
        return $valid == 2 && $errors == 0;
    }


    public function validAnswer3($data): bool {
        return !(bool)strcmp($data, "Прямые линии");
    }

    public function validate($postArray) {
        if (!count($this->rules)) {
            return ["Отсутствуют правила для валидации"];
        }
        foreach ($this->rules as $fieldName => $rule) {
            if (!array_key_exists($fieldName, $postArray)) {
                if (strcmp($rule, 'validAnswer2') !== 0) {
                    $this->errors[] = "Отсутствует поле для правила валидации: {$fieldName}!";
                    continue;
                }
            }
            switch ($rule) {
                case 'isNotEmpty':
                    if (!$this->isNotEmpty($postArray[$fieldName])) {
                        $this->errors[] = "{$fieldName} пустой!";
                    }
                    break;
                case 'isInteger':
                    if (!$this->isInteger($postArray[$fieldName])) {
                        $this->errors[] = "{$postArray[$fieldName]} не является номером!";
                    }
                    break;
                case 'isEmail':
                    if (!$this->isEmail($postArray[$fieldName])) {
                        $this->errors[] = "{$postArray[$fieldName]} не является почтовым адресом!";
                    }
                    break;
                case 'isName':
                    if (!$this->isName($postArray[$fieldName])) {
                        $this->errors[] = "{$postArray[$fieldName]} не является ФИО!";
                    }
                    break;
                case 'isAge':
                    if (!$this->isAge($postArray[$fieldName])) {
                        $this->errors[] = "{$postArray[$fieldName]} не является настоящим возрастом!";
                    }
                    break;
                case 'validAnswer1':
                    if (!$this->validAnswer1($postArray[$fieldName])) {
                        $this->errors[] = "{$postArray[$fieldName]} - неверный ответ на вопрос №1!";
                    }
                    break;
                case 'validAnswer2':
                    if (!$this->validAnswer2($postArray[$fieldName])) {
                        $this->errors[] = "На вопрос №2 был дан неверный ответ!";
                    }
                    break;
                case 'validAnswer3':
                    if (!$this->validAnswer3($postArray[$fieldName])) {
                        $this->errors[] = "{$postArray[$fieldName]} - неверный ответ на вопрос №3!";
                    }
                    break;
                default:
                    $this->errors[] = "Правила {$rule} не существует для поля {$fieldName}!";
                    break;
            }
        }
    }
}
