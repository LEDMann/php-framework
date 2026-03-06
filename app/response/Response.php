<?php

namespace App\Response;

use App\Router\Request;

class Response {
    private static string $method;
    private static array  $headers;
    private static array  $cookies;

    public static string $body = "";

    public static function __callStatic($name, $arguments) {
        self::default_headers();
        self::respond(...$arguments);
    }

    private static function respond($code) {
        array_map(fn($header) => header($header), self::$headers);
        http_response_code($code);
        var_dump(self::$body);
        exit();
    }

    private static function default_headers() {
        self::$headers['Content-Type'] = match (true) {
                                            json_validate(self::$body) => "application/json",
                                            default => "text/html; charset=utf-8"
                                        };
        self::$headers['Content-Length'] = ob_get_length();
    }
}