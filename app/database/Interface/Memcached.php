<?php

namespace App\Database\Interface;

use \Memcached as Cache;

class Memcached {
    public static Cache $server;

    public static function init() {
        self::$server = new Cache();
        self::$server->addServer("127.0.0.1", 11211);
    }
}

Memcached::init();