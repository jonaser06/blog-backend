<?php

define('BASE_DIR', 'f/responsive/');
define('HOME_DIR', 'http://localhost/zox-bk');

//define('API_URL', 'http://localhost/api/');
define('API_URL', 'http://api.bitsforcode.xyz/');

#libs
require_once './vendor/autoload.php';

$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

define('MONGO_HOST', getenv('MONGO_HOST') );
define('MONGO_PORT', getenv('MONGO_PORT') );

define('DEV_DATABASE', getenv('DEV_DATABASE') );
define('PRO_DATABASE', getenv('PRO_DATABASE') );

#controller
require_once './controller/core.php';
require_once './controller/home.controller.php';
require_once './controller/nota.controller.php';
require_once './controller/categorias.controller.php';
require_once './controller/post.controller.php';
require_once './controller/router.php';

#model


?>