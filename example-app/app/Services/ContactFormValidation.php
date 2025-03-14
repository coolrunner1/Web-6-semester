<?php

namespace App\Services;

use App\Services\FormValidation;

class ContactFormValidation extends FormValidation
{
    public function isValidBirthdate($birthdate, $age): bool {
        $currentYear = date('Y');
        $formattedBirthdate = strtotime($birthdate);
        $birthYear = date('Y', $formattedBirthdate);
        return ($currentYear - $birthYear == $age || $currentYear - $birthYear == $age+1) && $currentYear > $birthYear;
    }

    public function isPhone($data): bool {
        if (!is_numeric($data)) {
            return false;
        }

        return strlen($data) == 12;
    }

    public function isSex($data): bool {
        return $data == "female" || $data == "male";
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
                case 'isValidBirthdate':
                    if (!$this->isValidBirthdate($postArray[$fieldName], $postArray['age'])) {
                        $this->errors[] = "{$postArray[$fieldName]} не является настоящей датой рождения!";
                    }
                    break;
                case 'isPhone':
                    if (!$this->isPhone($postArray[$fieldName])) {
                        $this->errors[] = "{$postArray[$fieldName]} не является номером телефона!";
                    }
                    break;
                case 'isSex':
                    if (!$this->isSex($postArray[$fieldName])) {
                        $this->errors[] = "{$postArray[$fieldName]} не является настоящим полом!";
                    }
                    break;
                default:
                    $this->errors[] = "Правила {$rule} не существует для поля {$fieldName}!";
                    break;
            }
        }
    }
}
