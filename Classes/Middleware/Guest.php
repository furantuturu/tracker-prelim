<?php

namespace Classes\Middleware;

class Guest {
    public static function handle() {
        if (isset($_SESSION['auth'])) {
            redirect('/dashboard');
        }
    }
}