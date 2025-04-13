<?php

namespace App\Services;

use function PHPUnit\Framework\isEmpty;
use function Symfony\Component\String\b;

class FormValidation
{
    protected array $rules;
    protected array $errors;

    public function __construct() {
        $this->rules = [];
        $this->errors = [];
    }

    public function isNotEmpty($data): bool {
        return !empty($data);
    }

    public function isInteger($data): bool {
        return is_int($data);
    }

    public function isLess($data, $value): bool {
        if (is_numeric($data) && is_string($data)) {
            return $data < $value;
        }
        return false;
    }

    public function isGreater($data, $value): bool {
        if (is_numeric($data) && is_string($data)) {
            return $data > $value;
        }
        return false;
    }

    public function isEmail($data): bool {
        $emailPattern = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
        return boolval(preg_match($emailPattern, $data));
    }

    public function setRule($fieldName, $validatorName): void {
        $this->rules[$fieldName] = $validatorName;
    }

    public function isDate($data): bool {
        return count(explode('-', $data)) === 3 && (bool)strtotime($data);
    }

    public function validate($postArray) {
        if (!count($this->rules)) {
            return ["Отсутствуют правила для валидации"];
        }
        foreach ($this->rules as $fieldName => $rule) {
            if (!array_key_exists($fieldName, $postArray)) {
                $this->errors[] = "Отсутствует поле для правила валидации: {$fieldName}!";
                continue;
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
                case 'isDate':
                    if (!$this->isDate($postArray[$fieldName])) {
                        $this->errors[] = "{$postArray[$fieldName]} не является настоящей датой!";
                    }
                    break;
                default:
                    $this->errors[] = "Правила {$rule} не существует для поля {$fieldName}!";
                    break;
            }
        }
    }

    public function showErrors(): array {
        return $this->errors;
    }

    public function isName($data): bool {
        if (!is_string($data)) {
            return false;
        }
        return count(explode(' ', $data)) === 3;
    }

    public function isAge($data): bool {
        if (!is_numeric($data)) {
            return false;
        }

        return ($this->isLess($data, 150) && $this->isGreater($data, 0));
    }
}
