<?php

use Classes\Session;

return view('login.view.php', [
    'hasTrackerClass' => "",
    'title' => "Login",
    'pinErr' => Session::get('pinerror')
]);