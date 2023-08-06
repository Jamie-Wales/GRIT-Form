<?php

use core\Validator;
use core\RequestLimiter;

RequestLimiter::checkRateLimit();

if (isset($_SESSION['crsf_token']) && $_POST['token'] === $_SESSION['crsf_token'] && $_SERVER['REQUEST_METHOD'] === "POST") {
    $validator = new Validator($_POST);
    if ($validator->validate()) {
        require_once "save.php";
        require_once "email.php";
        $response = ['success' => true];
        http_response_code(200);

    } else {
        $response = [
            'success' => false,
            'errors' => $validator->getErrors()
        ];

        http_response_code(400);

    }

    header('Content-Type: application/json');
    echo json_encode($response);


} else {
    http_response_code(403);
    exit();
}



