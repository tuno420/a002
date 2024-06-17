<?php

namespace Controllers;

use Model\Categoria;
use Model\Producto;
use Model\Imagen;
use Intervention\Image\ImageManagerStatic as Image;
use MVC\Router;

class ProductosController
{



    // INDEX


    public static function index(Router $router)
    {
        $router->render('admin/productos', [
            'titulo' => 'admin productos'
        ]);
    }

    public static function crear(Router $router)
    {
        session_start();

        if(!isset($_SESSION['id'])) {
            header('Location: /login');
        }
        $alertas = [];
        $producto = new Producto;
        $categorias = Categoria::all();

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Leer imagen subida desde formulario
            if(!empty($_FILES['imagen']['tmp_name'])) {

                $carpeta_imagenes = '../public/build/img/productos/';
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }
                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->encode('webp', 80);

                $nombre_imagen = md5( uniqid( rand(), true) );

                $_POST['imagen'] = $nombre_imagen;
            } else {
                $_POST['imagen'] = '';
            }
            $producto->sincronizar($_POST);
            $alertas = $producto->validarProducto();
            
            if(empty($alertas)) {
                $imagen_png->save($carpeta_imagenes . $nombre_imagen . '.png');
                $imagen_webp->save($carpeta_imagenes . $nombre_imagen . '.webp');
                $producto->guardar();
                header('Location: /admin');
            }
        }



        $router->render('admin/productos/nuevo', [
            'titulo' => 'Nuevo producto',
            'categorias' => $categorias,
            'alertas' => $alertas
        ]);
    }

    public static function editar(Router $router)
    {
        session_start();
        if (!isset($_SESSION['id'])) {
            header('Location: /login');
        }
        $alertas = [];
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);
        if (!$id) {

            header('Location: /admin');
        }
        $producto = Producto::find($_GET['id']);
        $categorias = Categoria::all();
        $categoria_producto = Categoria::where('id', $producto->categoria);
        $imagen_actual = $producto->imagen;

        if (!$producto) {
            header('Location: /admin');
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_FILES['imagen']['tmp_name'])) {
                $carpeta_imagenes = '../public/build/img/productos/';
                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }
                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->encode('webp', 80);
                $nombre_imagen = md5(uniqid(rand(), true));
                $_POST['imagen'] = $nombre_imagen;
            } else {
                $_POST['imagen'] = $imagen_actual;
            }

            $producto->sincronizar($_POST);

            $alertas = $producto->validarProducto();



            if (empty($alertas)) {
                if(isset($nombre_imagen)) {
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . '.png');
                    $imagen_webp->save($carpeta_imagenes . '/' . $nombre_imagen . '.webp');
                }
                $resultado = $producto->guardar();
                if ($resultado) {
                    header('Location: /admin');
                }
            }
        }
        $router->render('admin/productos/editar', [
            'titulo' => 'Editar producto',
            'alertas' => $alertas,
            'producto' => $producto ?? null,
            'imagen_actual' => $imagen_actual,
            'categorias' => $categorias,
            'categoria_producto' => $categoria_producto
        ]);
    }

    public static function eliminar(Router $router)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $producto = Producto::find($id);
            if (!isset($producto)) {
                header('Location: /admin');
            }
            $resultado = $producto->eliminar();
            if ($resultado) {
                header('Location: /admin');
            }
        }
    }
}
