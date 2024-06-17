<?php

namespace Controllers;

use Model\Categoria;
use Model\Imagen;
use Model\Producto;
use MVC\Router;

class CategoriasController {


    public static function index(Router $router) {
        $router->render('admin/categorias', [
            'titulo' => 'admin categorias'
        ]);
    }


    public static function crear(Router $router) {
        session_start();
        if(!isset($_SESSION['id'])) {
            header('Location: /login');
        }

        $alertas = [];
        $categoria = new Categoria;
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoria->sincronizar($_POST);
            $alertas = $categoria->validarCategoria();

            if(empty($alertas)) {
                $categoria->guardar();
                header('Location: /admin');
            }
        }
        $router->render('admin/categorias/nuevo', [
            'titulo' => 'Nueva categoría',
            'alertas' => $alertas,
            'categoria' => $categoria
        ]);

    }


    public static function editar(Router $router) {
        session_start();
        if(!isset($_SESSION['id'])) {
            header('Location: /login');
        }
        $alertas = [];
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if(!$id) {
            header('Location: /admin');
        }
        $categoria = Categoria::find($_GET['id']);
        if(!$categoria) {
            header('Location: /admin');
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoria->sincronizar($_POST);
            $alertas = $categoria->validarCategoria();

            if(empty($alertas)) {
                $resultado = $categoria->guardar();
                if($resultado) {
                    header('Location: /admin');
                }
            }
        }
        $router->render('admin/categorias/editar', [
            'titulo' => 'Editar categoría',
            'alertas' => $alertas,
            'categoria' => $categoria ?? null
        ]);
    }

    public static function eliminar(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $categoria = Categoria::find($id);
            if(!isset($categoria)) {
                header('Location: /admin');
            }
            $resultado = $categoria->eliminar();
            if($resultado) {
                header('Location: /admin');
            }
        }

    }





    
}