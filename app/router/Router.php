<?php

namespace App\Router;

use App\Router\Request;
use App\Response\Success;

class Router
{
    public static function __callStatic($name, $arguments) {
        Request::parse_context();
        if (Request::$uri == $arguments[0]) {
            self::$name($arguments[0], ...$arguments[1]);
        }
    }

    private static function get($target_uri, $class, $func) {
        if (Request::$method == "GET" || Request::$method == "HEAD") {
            Request::parse_query();
            $class::$func();
        }
    }

    private static function post($target_uri, $class, $func) {
        if (Request::$method == "POST") {
            Request::parse_body();
            $class::$func();
        }
    }

    private static function patch($target_uri, $class, $func) {
        if (Request::$method == "PATCH") {
            Request::parse_body();
            $class::$func();
        }
    }

    private static function put($target_uri, $class, $func) {
        if (Request::$method == "PUT") {
            Request::parse_body();
            $class::$func();
        }
    }

    private static function delete($target_uri, $class, $func) {
        if (Request::$method == "DELETE") {
            Request::parse_body();
            $class::$func();
        }
    }

    private static function options($target_uri, $class, $func) {
        if (Request::$method == "OPTIONS") {
            Request::parse_query();
            $class::$func();
        }
    }

    private static function trace($target_uri, $class, $func) {
        if (Request::$method == "TRACE") {
            Request::parse_query();
            $class::$func();
        }
    }
}