<?php

namespace Model;

class Categoria extends ActiveRecord {
    protected static $tabla = 'categorias';
    protected static $columnasDB = [
        'id',
        'titulo_categoria',
        'activo'
    ];

    public $id;
    public $titulo_categoria;
    public $activo;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo_categoria = $args['titulo_categoria'] ?? '';
        $this->activo = $args['activo'] ?? 0;
    }

    public static function getProductos() {
        $productos_cat = Producto::where('categoria', 'id');
        return $productos_cat;
    }

    public function validarCategoria() {
        if(!$this->titulo_categoria) {
            self::$alertas['error'][] = 'El nombre de la categoría es obligatorio';
        }
        return self::$alertas;
    }
}