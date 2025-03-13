<?php

$router->get('/dashboard', 'dashboard.php');

//Comunication related routes
$router->get('/communications', 'communications/index.php');
$router->get('/communications-create', 'communications/create.php');
$router->post('/communications-create', 'communications/store.php');

//Reports related routes
$router->get('/reports', 'reports/index.php');

//File attachment related routes
$router->get('/attach', 'attach/index.php');
$router->post('/attach', 'attach/upload.php');
$router->delete('/attach', 'attach/delete.php');

