<?php

namespace App;

use App\Router\Router;
use App\Response\Success;

Router::put('balls/lmao', [Success::class, "_200"]);