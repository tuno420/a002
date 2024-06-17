<?php

namespace Model;

class Producto extends ActiveRecord
{
    protected static $tabla = 'productos';
    protected static $columnasDB = [
        'id',
        'titulo',
        'descripcion',
        'categoria',
        'precio',
        'activo',
        'destacado',
        'imagen'
    ];


    public $id;
    public $titulo;
    public $descripcion;
    public $categoria;
    public $precio;
    public $activo;
    public $destacado;
    public $imagen;



    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->categoria = $args['categoria'] ?? null;
        $this->precio = $args['precio'] ?? '';
        $this->activo = $args['activo'] ?? 0;
        $this->destacado = $args['destacado'] ?? 0;
        $this->imagen = $args['imagen'] ?? 'https://via.placeholder.com/150';
    }


    public function obtenerProductos()
    {
        $productos = Producto::where('id', $this->id);
        return $productos;
    }


    public function verActivos() {
        $productos = Producto::where('id', $this->id);
        $productos_activos = [];
        foreach($productos as $producto) {
            if($producto->activo == 1) {
                $productos_activos[] = $producto;
            }
        }
        return $productos_activos;
    }


    public static function verDestacados() {
        $productos = Producto::all();
        $productos_destacados = [];
        foreach($productos as $producto) {
            if($producto->destacado == 1) {
                $productos_destacados[] = $producto;
            }
        }
        return $productos_destacados;
    }


    public function getPorCategoria(int $categoriaId) {
        return Producto::where('categoria', $categoriaId);
    }


    // esta merda ten un Producto de input ?????
    public static function addCarrito(Producto $producto) {
        
    }

    public function validarProducto() {
        if(!$this->titulo) {
            self::$alertas['error'][] = 'El nombre del producto es obligatorio';
        }
        if(!$this->imagen) {
            self::$alertas['error'][] = 'La imagen es obligatoria';
        }

        return self::$alertas;
    }

}