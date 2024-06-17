<?php
namespace Model;

class Imagen extends ActiveRecord {
    protected static $tabla = 'imagenes';
    protected static $columnasDB = ['id', 'id_producto', 'url'];

    public $id;
    public $id_producto;
    public $url;


    public function __construct($args = [])
    {
        if (is_array($args)) {
            $this->id = $args['id'] ?? null;
            $this->id_producto = $args['id_producto'] ?? null;
            $this->url = $args['url'] ?? '';
        } elseif (is_object($args)) {
            $this->id = $args->id ?? null;
            $this->id_producto = $args->id_producto ?? null;
            $this->url = $args->url ?? '';
        }
    }


}