<?php

define('DS', DIRECTORY_SEPARATOR);
$sitePath = realpath(dirname(__FILE__) . DS) . DS;
define('SITE_PATH', $sitePath);

define('DB_HOST', getenv('DB_HOST') ?: 'db');
define('DB_USER', getenv('DB_USER') ?: 'admin');
define('DB_PASS', getenv('DB_PASS') ?: '1234567');
define('DB_NAME', getenv('DB_NAME') ?: 'test_DB');
