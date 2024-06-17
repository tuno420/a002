<?php
// Comentado pa que funcione en server
// require_once __DIR__ . '/../includes/app.php';
require_once __DIR__ . '/includes/app.php';

use MVC\Router;
use Controllers\AdminController;
use Controllers\CategoriasController;
use Controllers\LoginController;
use Controllers\PaginasController;
use Controllers\ProductosController;

$router = new Router();

// Inicio
$router->get('/', [PaginasController::class, 'index']);
$router->post('/', [PaginasController::class, 'index']);

$router->get('/productos', [PaginasController::class, 'productos']);
$router->post('/productos', [PaginasController::class, 'productos']);

$router->get('/categoria/?id=', [PaginasController::class, 'categoria']);
$router->post('/categoria/?id=', [PaginasController::class, 'categoria']);


$router->get('/producto/?id=', [ProductosController::class, 'detalles']);
$router->post('/producto/?id=', [ProductosController::class, 'detalles']);

$router->get('/carrito', [PaginasController::class, 'carrito']);
$router->post('/carrito', [PaginasController::class, 'carrito']);



// Login
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);

$router->get('/signup', [LoginController::class, 'signup']);
$router->post('/signup', [LoginController::class, 'signup']);

$router->get('/logout', [LoginController::class, 'logout']);
$router->post('/logout', [LoginController::class, 'logout']);



// Misc
$router->get('/test', [PaginasController::class, 'test']);
$router->post('/test', [PaginasController::class, 'test']);










// ZONA ADMIN

$router->get('/admin', [AdminController::class, 'index']);
$router->post('/admin', [AdminController::class, 'index']);

$router->get('/admin/productos', [AdminController::class, 'productos']);
$router->post('/admin/productos', [AdminController::class, 'productos']);

$router->get('/admin/productos/nuevo', [ProductosController::class, 'crear']);
$router->post('/admin/productos/nuevo', [ProductosController::class, 'crear']);

$router->get('/admin/productos/editar', [ProductosController::class, 'editar']);
$router->post('/admin/productos/editar', [ProductosController::class, 'editar']);

$router->post('/admin/productos/eliminar', [ProductosController::class, 'eliminar']);


$router->get('/admin/categorias', [AdminController::class, 'categorias']);
$router->post('/admin/categorias', [AdminController::class, 'categorias']);

$router->get('/admin/categorias/nuevo', [CategoriasController::class, 'crear']);
$router->post('/admin/categorias/nuevo', [CategoriasController::class, 'crear']);

$router->get('/admin/categorias/editar', [CategoriasController::class, 'editar']);
$router->post('/admin/categorias/editar', [CategoriasController::class, 'editar']);

$router->post('/admin/categorias/eliminar', [CategoriasController::class, 'eliminar']);

$router->get('/admin/usuarios', [AdminController::class, 'usuarios']);
$router->post('/admin/usuarios', [AdminController::class, 'usuarios']);

$router->get('/admin/pedidos', [AdminController::class, 'pedidos']);
$router->post('/admin/pedidos', [AdminController::class, 'pedidos']);

//Catalogo

//Detalles

//Info

//Contacto

//Legal

//Varios


/*
Libre por debaixo desta linea
*/
$router->comprobarRutas();
