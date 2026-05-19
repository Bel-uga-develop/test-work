<?php
error_reporting(E_ALL);

use DB\Connect;
use Classes\Router;

include('../config.php');
require_once SITE_PATH . 'vendor/autoload.php';
include(SITE_PATH . DS . 'Core' . DS . 'Core.php');

$dbObject = new Connect();


$router = new Router();
$router->setPath(SITE_PATH . 'Controllers');
$router->start();
