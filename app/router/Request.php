<?php

namespace App\Router;

use App\Router\Router;

class Request
{
    public private(set) static string $method;
    public private(set) static string $uri;
    public private(set) static array $headers;
    public private(set) static array $cookies;
    public private(set) static array $files;
    public private(set) static array $qparams;
    public private(set) static array $fparams;

    /**
     * parse request headers and contextual information
     */
    public static function parse_context() {
        self::$method  = $_SERVER['REQUEST_METHOD'];
        self::$uri     = $_SERVER['REQUEST_URI'];
        self::$headers = array_map(fn($param) => self::parse_param_type($param), getallheaders());
        self::$cookies = array_map(fn($param) => self::parse_param_type($param), $_COOKIE);
    }

    /**
     * parse query parameters
     */
    public static function parse_query() {
        self::$qparams = array_map(fn($param) => self::parse_param_type($param, FILTER_SANITIZE_EMAIL), $_GET);
    }

    /**
     * parse the request body, format consistent no matter copntent type or http method
     */
    public static function parse_body() {
        self::$fparams = self::parse_form();
        self::$files   = array_map(fn($param) => self::parse_param_type($param), $_FILES);
    }

    /**
     * parses the parameters in an array to have the correct datatypes
     */
    private static function parse_param_type($param, $sanitize = FILTER_UNSAFE_RAW) {
        return match (true) {
            is_array($param)                                                => array_map(fn($child) => self::parse_param_type($child), $param),
            strtolower($param) == 'true' || strtolower($param) == 'false'   => (bool) $param,
            is_int(filter_var($param, FILTER_VALIDATE_INT))                 => intval($param),
            is_float(filter_var($param, FILTER_VALIDATE_FLOAT))             => (float) $param,
            default                                                         => filter_var($param, $sanitize)
        };
    }

    /**
     * actual request body parsing
     */
    private static function parse_form(): array {
        return match (self::$method) {
            'POST' => array_map(fn($param) => self::parse_param_type($param, FILTER_SANITIZE_EMAIL), $_POST),
            'PUT', 'PATCH', 'DELETE'   => match (($contentType = explode('; boundary=', self::$headers['Content-Type']))[0]) {
                'multipart/form-data'               =>  array_merge(...array_map(fn($param) => [$param['Headers']['name'] => array_key_exists('Content-Type', $param['Headers']) ? $param['Headers']['filename'] : $param['Data']], array_map(  function($part) { $section = explode("\r\n\r\n", trim($part)); return [ 'Headers' => $section_headers = array_merge(...array_map(function($header) { $header_parsed = array_map(fn($i) => trim($i, "\""), preg_split("/:\s|=/", $header)); return [$header_parsed[0] => $header_parsed[1]]; }, preg_split("/\r\n|;\s/", $section[0]))), 'Data' =>   (array_key_exists('Content-Type', $section_headers)) ? file_put_contents($_ENV['ROOT'].'\\uploads\\'.$section_headers['filename'], $section[1]) : self::parse_param_type($section[1], FILTER_SANITIZE_EMAIL) ]; }, array_filter(preg_split("/-*".$contentType[1]."-*/", file_get_contents('php://input')), fn($i) => !empty(trim($i)))))),
                'application/x-www-form-urlencoded' =>  array_map(self::parse_param_type($param, FILTER_SANITIZE_EMAIL), mb_parse_str(file_get_contents('php://input'))),
                'application/json'                  =>  (json_validate(file_get_contents('php://input'))) ? array_map(self::parse_param_type($param, FILTER_SANITIZE_EMAIL), json_decode(file_get_contents('php://input'), true)) : ['input' => file_get_contents('php://input')],
                default                             =>  ['input' => file_get_contents('php://input')] 
            },
            default => []
        };
    }
}