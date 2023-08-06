<?php
const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'core/functions.php';

ini_set('session.cookie_httponly', '1');
ini_set('session.cookie_secure', '1');
ini_set('session.use_only_cookies', '1');
ini_set('display_errors', '0');

session_name('form_test');
session_start();

if (!isset($_SESSION['CREATED'])) {
    $_SESSION['CREATED'] = time();
} else if (time() - $_SESSION['CREATED'] > 1800) {
    session_regenerate_id(true);
    $_SESSION['CREATED'] = time();
}

$_SESSION['crsf_token'] = bin2hex(random_bytes(32));



view("index.view.php");