<?php

namespace Classes;

class Session {
    public static function put(string $key, mixed $value) {
        $_SESSION[$key] = $value;
    }
    public static function flash(string $key, mixed $value) {
        $_SESSION['_flash'][$key] = $value;
    }
    public static function unflash() {
        unset($_SESSION['_flash']);
    }
    public static function has(string $key) {
        return (bool) static::get($key);
    }
    public static function get(string $key) {
        return $_SESSION['_flash'][$key] ?? $_SESSION[$key] ?? '';
    }
    public static function destroy() {
        $_SESSION = [];
        session_destroy();

        $cookieParams = session_get_cookie_params();

        setcookie(
            'PHPSESSID',
            '',
            time() - 3600,
            $cookieParams['path'],
            $cookieParams['domain'],
            $cookieParams['secure'],
            $cookieParams['httponly']
        );
    }
}