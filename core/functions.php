<?php

function dd($value): void {
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}


function basePath($path) {
    return  __DIR__ . '/../' . $path;
}


function view($path, $attributes=[]): void {
    extract($attributes);
    require basepath('views/') . $path;
}