<?php

function dd(mixed $value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function redirect(string $path) {
    header("Location: {$path}");
    die();
}

function view(string $viewPath, $attr = []) {
    extract($attr);
    require "views/{$viewPath}";
}

function getDatabaseClass() {
    $dsnData = require 'dbData.php';

    return new Classes\Database($dsnData, $_ENV['USERNAME'], $_ENV['PASSWORD']);
}
