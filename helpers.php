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

function sanitize(mixed $data) {
    return htmlspecialchars(trim($data));
}

function isEmpty(...$datas) {
    foreach($datas as $data ) {
        if (empty($data)) {
            return true;
        }
        continue;
    }
    return false;
}

function makeDirectory(string $targetDir) {
    if (!file_exists($targetDir) && !is_dir($targetDir)) {
        mkdir($targetDir);
    }
}