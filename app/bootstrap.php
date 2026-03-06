<?php

define('APP_START', microtime(true));

require_once __DIR__ . '/../vendor/autoload.php';

$_ENV['ROOT'] =  implode('\\', array_slice(explode('\\', __DIR__), 0, -1));

require_once __DIR__ . '/database/interface/Memcached.php';
require_once __DIR__ . '/Routes.php';