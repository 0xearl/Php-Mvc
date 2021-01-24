<?php
include_once('autoload.php');
use App\Route;

$routes = new Route();
$routes->loadRoutes();
