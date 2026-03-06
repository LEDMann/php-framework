<?php

namespace App;

use App\Router\Router;
use App\Response\Success;

Router::put('/balls/{lmao}', [Success::class, "_201"]);
Router::get('/balls2/{fuuuck}', [Success::class, "_200"]);