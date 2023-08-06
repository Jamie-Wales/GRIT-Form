<?php


$uri = $_SERVER['REQUEST_URI'];


session_name('form_test');
session_start();

if ($uri === '/formHandler.php') {
    require __DIR__ . '/../vendor/autoload.php';
    require __DIR__ . '/../core/functions.php';
    require __DIR__ . '/../forms/validate.php';
}

