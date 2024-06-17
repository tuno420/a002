<?php

namespace Controllers;

use Model\Categoria;
use Model\Pedido;
use Model\Producto;
use Model\Usuario;
use MVC\Router;

class AdminController
{

    public static function index(Router $router)
    {
        session_start();

        if ($_SESSION['rol'] == 1) {
            // $productos = Producto::get(5);
            $productos = Producto::all();
            // $categorias = Categoria::get(5);
            $categorias = Categoria::all();
            $usuarios = Usuario::get(5);
            $pedidos = Pedido::get(5);
        } else {
            header('Location: /login');
        }
        $router->render('admin/index', [
            'titulo' => 'ADMIN',
            'productos' => $productos,
            'categorias' => $categorias,
            'usuarios' => $usuarios,
            'pedidos' => $pedidos
        ]);
    }

    public static function productos(Router $router)
    {
        $productos = Producto::all();

        $router->render('admin/productos', [
            'titulo' => 'Productos',
            'productos' => $productos
        ]);
    }

    public static function categorias(Router $router)
    {
        $categorias = Categoria::all();
        $router->render('admin/categorias', [
            'titulo' => 'Categorias',
            'categorias' => $categorias
        ]);
    }

    public static function usuarios(Router $router)
    {
        $usuarios = Usuario::all();
        $router->render('admin/usuarios', [
            'titulo' => 'Usuarios',
            'usuarios' => $usuarios
        ]);
    }

    public static function pedidos(Router $router)
    {
        $pedidos = Pedido::all();
        $router->render('admin/pedidos', [
            'titulo' => 'Pedidos',
            'pedidos' => $pedidos
        ]);
    }
}
