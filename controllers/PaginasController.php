<?php
namespace Controllers;

use Model\Producto;
use Model\Imagen;
use Model\Categoria;
use MVC\Router;

class PaginasController
{
    // Inicio
    public static function index(Router $router)
    {
        session_start();
        // $categorias = Categoria::all();
        $categorias = Categoria::where3('activo', 1);
        $productos_categoria = [];
        $destacados = Producto::verDestacados();
        $_SESSION['carrito'] = [];

        foreach ($categorias as $categoria) {
            // Traer productos por categoria. Igual lle meto un LIMIT 3 ou LIMIT 5
            $productos_categoria[$categoria->id] = Producto::where3('categoria', $categoria->id);
        }

        $router->render('inicio/index', [
            'titulo' => 'GLZ CBD| Inicio',
            'categorias' => $categorias,
            'productos_categoria' => $productos_categoria,
            'destacados' => $destacados
        ]);
    }

    public static function error(Router $router)
    {
        $router->render('inicio/error', [
            'titulo' => 'Whoops! Page not found'
        ]);
    }

    public static function legal(Router $router)
    {
        $router->render('inicio/legal', [
            'titulo' => 'GLZ CBD | Legal'
        ]);
    }

    public static function catalog(Router $router) {
        $router->render('catalogo/index', [
            'titulo' => 'GLZ CBD | Catalog'
        ]);
    }

    public static function contact(Router $router) {
        $router->render('inicio/contacto', [
            'titulo' => 'GLZ CBD | Contact'
        ]);
    }

    public static function test(Router $router) {
        $router->render('tienda/index', [
            'titulo' => 'CBD Test'
        ]);
    }
}
