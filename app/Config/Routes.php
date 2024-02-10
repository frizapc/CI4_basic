<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Home;
use App\Controllers\Test;
use App\Controllers\Blogs;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Home::class, 'index']);
$routes->get('/halo/(:any)/(:num)', [Test::class, 'index']);
$routes->get('/blogs', [Blogs::class,'index']);
$routes->get('/blogs/add', [Blogs::class,'create']);
$routes->post('/blogs/add', [Blogs::class,'create']);
$routes->get('/blogs/edit/(:num)', [Blogs::class,'edit']);
$routes->put('/blogs/edit/(:num)', [Blogs::class,'edit']);
$routes->get('/blogs/(:any)', [Blogs::class,'byUrl']);