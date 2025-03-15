<?php

use Classes\Session;

$pin = $_POST['PIN'];

if ($pin == $_ENV['PIN']) {
    Session::put('auth', "qwertyuiop");
    session_regenerate_id(true);
    redirect('/dashboard');
}

Session::flash('pinerror', "Wrong PIN!, Please take a look at \"PIN\" word");
redirect('/');
