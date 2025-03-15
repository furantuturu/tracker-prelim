<?php
$router->get('/dashboard', 'dashboard.php')->only('auth');

//Login/Logout related routes
$router->get('/', 'login/index.php')->only('guest');
$router->post('/login', 'login/login.php');
$router->get('/logout', 'logout.php')->only('auth');

//Comunication related routes
$router->get('/communications', 'communications/index.php')->only('auth');
$router->get('/communications-create', 'communications/create.php')->only('auth');
$router->post('/communications-create', 'communications/store.php');
$router->get('/communications-edit', 'communications/edit.php')->only('auth');
$router->put('/communications-edit', 'communications/update.php');
$router->delete('/communications', 'communications/delete.php');
$router->post('/communications', 'communications/search.php');

//Reports related routes
$router->get('/reports', 'reports/index.php')->only('auth');
$router->post('/reports', 'reports/filter.php');

//File attachment related routes
$router->get('/attach', 'attach/index.php')->only('auth');
$router->post('/attach', 'attach/upload.php');
$router->delete('/attach', 'attach/delete.php');

