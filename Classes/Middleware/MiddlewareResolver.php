<?php

namespace Classes\Middleware;

class MiddlewareResolver {
    private const ROLES_MAP = [
        'auth' => Auth::class,
        'guest' => Guest::class
    ];
    public static function resolve($key) {
        if (!$key) return;

        $roles = static::ROLES_MAP[$key] ?? false;

        if (!$roles) {
            throw new \Exception("No matching middleware of key: {$key}");
        }

        (new $roles)->handle();
    }
}