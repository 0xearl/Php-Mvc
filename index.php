<?php
include_once('autoload.php');
include_once('./helpers.php');

use App\Route;

/**
 * @author Earl Sabalo
 * 
 * This is the file responsible for creating new routes without creating a controller.
 * 
 * ex: 
 * $route->get('/test', function() { 
 *    return 'test'; 
 * });
 */

$routes = new Route();

$routes->get('/hello-world', function() {
    return 'Hello World';
});

$routes->get('/', [Index::class, 'index']);

$routes->loadRoutes();