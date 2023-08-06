<?php

namespace core;

class Validator {
    private $filters;
    private $data;
    private $required = [
        'title',
        'name',
        'email',
        'dob'
    ];

    private $checkboxFields = [
        'walking',
        'cycling',
        'reading',
        'films'
    ];

    private $errors = [];

    public function __construct($post) {
        $this->filters = [
            'title' => [
                'filter' => FILTER_CALLBACK,
                'options' => [$this, 'sanitizeTitle']

            ],
            'name' => [
                'filter' => FILTER_CALLBACK,
                'options' => function($name) {
                    $name = trim(htmlspecialchars($name));

                    if (preg_match('/[a-zA-Z]/', $name) && strlen($name) > 1) {
                        return $name;
                    }
                    return false;
                }
            ],
            'email' => [
                'filter' => FILTER_CALLBACK,
                'options' => function($email) {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        return filter_var($email, FILTER_SANITIZE_EMAIL);
                    }
                    return false;
                }
            ],
            'telephone' => [
                'filter' => FILTER_VALIDATE_REGEXP,
                'options' => ['regexp' => '/^(\+44\s?7\d{3}|\(?07\d{3}\)?)\s?\d{3}\s?\d{3}$|^(\+44\s?0?|0)(?:1\d{3}|[23569]\d{2}|[478]\d(?:\d{2})?)\s?\d{3,4}\s?\d{3,4}$/']
            ],
            'dob' => [
                'filter' => FILTER_CALLBACK,
                'options' => [$this, 'sanitizeDob']
            ],
            'walking' => [
                'filter' => FILTER_VALIDATE_BOOLEAN
            ],
            'cycling' => [
                'filter' => FILTER_VALIDATE_BOOLEAN
            ],
            'reading' => [
                'filter' => FILTER_VALIDATE_BOOLEAN
            ],
            'films' => [
                'filter' => FILTER_VALIDATE_BOOLEAN
            ],
        ];

        $this->data = filter_input_array(INPUT_POST, $this->filters);
    }

    private function sanitizeTitle($input) {
        $allowedTitles = ["mr", "mrs", "miss", "doctor"];
        return in_array(strtolower($input), $allowedTitles) ? $input : false;
    }

    private function sanitizeDob($input) {
        if (preg_match('/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/', $input)) {
            return $input;
        }
        return false;
    }

    public function validate() {
        foreach($this->required as $field) {
            if (!isset($this->data[$field]) || $this->data[$field] === false || $this->data[$field] === null) {
                $this->errors[$field] = $field . " has failed Validation";
            }
        }

        $checkboxSelected = false;
        foreach ($this->checkboxFields as $checkbox) {
            if (!empty($this->data[$checkbox]) && $this->data[$checkbox] === true) {
                $checkboxSelected = true;
                break;
            }
        }

        if (!$checkboxSelected) {
            $this->errors['checkbox'] = "Please select at least one interest.";
        }

        return empty($this->errors);

    }

    public function getData() {
        return $this->data;
    }

    public function getErrors() {
        return $this->errors;
    }

    public function getCheckboxFields() {
        return $this->checkboxFields;
    }
}
