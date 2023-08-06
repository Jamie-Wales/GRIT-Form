<?php

use core\Email;

$config = require basePath("config.php");

$Email = new Email($config['email']);

if (isset($validator)) {
    $validatedData = $validator->getData();
    $body = "<h1>Form Submission Details</h1><table>";
    foreach ($validatedData as $key => $value) {
        if (in_array($key, $validator->getCheckboxFields())) {
            $value = $value ? 'Yes' : 'No';
        }
        $body .= "<tr><td>" . ucfirst($key) . "</td><td>" . $value . "</td></tr>";
    }

    $body .= "</table>";

    //uncomment when ready to send mail, tested does work: $Email->sendMail("jjwales38@gmail.com", "Jamie  Wales", "GRIT Form Test", $body);
}












