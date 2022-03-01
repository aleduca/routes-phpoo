<?php

use app\core\Router;
use Dotenv\Dotenv;

require '../vendor/autoload.php';

session_start();

$dotenv = Dotenv::createImmutable('../');
$dotenv->load();

// dd($_SERVER);
// dd(RequestType::get());

Router::run();
