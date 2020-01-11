<?php

define('BASE_PATH', dirname(__FILE__));

define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'testerevict');
define('DB_USER', 'carlos');
define('DB_PASS', '1234');
define('DB_PORT', '3306');

// development 
ini_set('display_errors', true);
error_reporting(E_ALL);
date_default_timezone_set('America/Sao_Paulo');