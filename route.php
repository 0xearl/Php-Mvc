<?php

use App\Route;
use App\Controllers\Index;
use App\Controllers\Test;

/**
 * @author Earl Sabalo
 * 
 * This is the route file where you can define your routes
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
$routes->get('/index/test', [Index::class, 'test']);
$routes->get('/test', [Test::class, 'index']);
$routes->resource('/resource', App\Controllers\Resource::class);


$routes->loadRoutes();