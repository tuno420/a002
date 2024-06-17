<?php

namespace Model;

class Pedido extends ActiveRecord {
    protected static $tabla = 'pedidos';
    protected static $columnasDB = [
        'id',
        'id_usuario',
        'total',
        'fecha_pedido',
        'id_estado_pedido',
        'id_direccion_envio',
        'pagado'
    ];


    public $id;
    public $id_usuario;
    public $total;
    public $fecha_pedido;
    public $id_estado_pedido;
    public $id_direccion_envio;
    public $pagado;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->id_usuario = $args['id_usuario'] ?? null;
        $this->total = $args['total'] ?? '';
        $this->fecha_pedido = $args['fecha_pedido'] ?? '';
        $this->id_estado_pedido = $args['id_estado_pedido'] ?? null;
        $this->id_direccion_envio = $args['id_direccion_envio'] ?? null;
        $this->pagado = $args['pagado'] ?? null;
    }
}