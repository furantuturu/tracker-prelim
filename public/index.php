<?php

use Dotenv\Dotenv;

const ROOT = __DIR__ . '/../';
require ROOT . 'vendor/autoload.php';

$dotenv = Dotenv::createImmutable(ROOT);
$dotenv->load();

require ROOT . 'helpers.php';

$router = new Classes\Router;

require ROOT . 'routes.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);