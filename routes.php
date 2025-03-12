<?php

$router->get('/dashboard', 'dashboard.php');

//Comunication related routes
$router->get('/communications', 'communications/index.php');
$router->get('/communications/create', 'communications/create.php');

$router->get('/reports', 'reports/index.php');

$router->get('/attach', 'attach/index.php');

