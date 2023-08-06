<?php

use core\Database;

$config = require basePath("config.php");
$db = new Database($config['database']);

if (isset($validator)) {
    $validatedData = $validator->getData();
    $db->query('INSERT INTO form_users(title, full_name, email, telephone, dob, walking, cycling, reading, films) 
    VALUES(:title, :full_name, :email, :telephone, :dob, :walking, :cycling, :reading, :films)', [
        'title' => $validatedData['title'],
        'full_name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'telephone' => $validatedData['telephone'],
        'dob' => $validatedData['dob'],
        'walking' => $validatedData['walking'] ?? 0,
        'cycling' => $validatedData['cycling'] ?? 0,
        'reading' => $validatedData['reading'] ?? 0,
        'films' => $validatedData['films' ] ?? 0
    ]);
}