<?php

use App\Route;
use App\Controllers\Index;
use App\Controllers\Test;
use App\Controllers\Crud;
use App\Controllers\DynamicRoute;

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
$routes->resource('/add-user', Crud::class);
$routes->get('/test/{id}', function ($id) {
    echo "ID: $id";
});

$routes->get('/dynamic-route/{id}', [DynamicRoute::class, 'index']);
$routes->get('/dynamic-route/show/{name}', [DynamicRoute::class, 'show']);

$routes->loadRoutes();