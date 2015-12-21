<?php
namespace Imie;

require "../autoload.php";

use Imie\Controllers\Router;

// TODO: define constants
define('_VIEWPATH_', __DIR__ . '/Views/');

$router = new Router();
$router->dispatch();
