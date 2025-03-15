<?php

namespace Classes\Middleware;

class Auth {
    public static function handle() {
        if (empty($_SESSION['auth'])) {
            redirect('/');
        }
    }
}