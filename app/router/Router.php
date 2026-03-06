<?php

namespace App\Router;

use App\Router\Request;
use App\Response\Response;
use App\Database\Interface\Memcached;

class Router {
    /**
     * parse and then route the request to the correct http method validator
     */
    public static function __callStatic($name, $arguments) {
        Request::parse_context();
        if ($parsed_uri = preg_match($uri_regex = self::parse_uri_key($arguments[0]), Request::$uri)) {
            Response::$body =  "$parsed_uri, $uri_regex";
            var_dump(Memcached::$server->getAllKeys(),  Memcached::$server->getResultCode());
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

    /**
     * get the regex version of the endpoint uri either by searching for the uri in the cache or if it isnt in the cache generate the regex for the specified uri
     */
    private static function parse_uri_key($uri_key): string {
        return match ($val = Memcached::$server->get($uri_key)) {
            false => (  function($uri_key) { 
                            Memcached::$server->add($uri_key, $uri_regex = "/^\/".implode("\\/", array_map(fn($res) => ($res[0] == "{" && substr($res, -1) == "}") ? "(?<".trim($res, "{}").">[^\/]+)" : $res , explode("/", ltrim($uri_key, "/"))))."$/"); 
                            return $uri_regex; 
                        })($uri_key),
            default => $val
        };
    }
}