<?php
include_once('autoload.php');
use App\Route;

/**
 * @author Earl Sabalo
 * 
 * This is the file responsible for creating new routes without creating a controller.
 * 
 * ex: $route->createNewRoute('/test', function() { 
 *          return 'test'; 
 *        });
 */

$routes = new Route();

$routes->createNewRoute('/abcd', function() { 
    return 'abcd';
});
$routes->createNewRoute('/efgh', function() {
    return 'efgh';
});

$routes->loadRoutes();