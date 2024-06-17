<?php

namespace Model;

class Usuario extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columnasDB = [
        'id',
        'nombre',
        'apellido1',
        'apellido2',
        'email',
        'password',
        'dir_linea1',
        'dir_linea2',
        'dir_linea3',
        'codigopostal',
        'localidad',
        'provincia',
        'ciudad',
        'pais',
        'telefono',
        'confirmado',
        'estado',
        'rol',
        'token',
        'creado_en'
    ];

    public $id;
    public $nombre;
    public $apellido1;
    public $apellido2;
    public $email;
    public $password;
    public $password2;
    public $dir_linea1;
    public $dir_linea2;
    public $dir_linea3;
    public $codigopostal;
    public $localidad;
    public $provincia;
    public $ciudad;
    public $pais;
    public $telefono;
    public $confirmado;
    public $estado;
    public $rol;
    public $token;
    public $creado_en;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido1 = $args['apellido1'] ?? '';
        $this->apellido2 = $args['apellido2'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->dir_linea1 = $args['dir_linea1'] ?? '';
        $this->dir_linea2 = $args['dir_linea2'] ?? '';
        $this->dir_linea3 = $args['dir_linea3'] ?? '';
        $this->codigopostal = $args['codigopostal'] ?? '';
        $this->localidad = $args['localidad'] ?? '';
        $this->provincia = $args['provincia'] ?? '';
        $this->ciudad = $args['ciudad'] ?? '';
        $this->pais = $args['ciudad'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        $this->confirmado = $args['confirmado'] ?? 0;
        $this->estado = $args['estado'] ?? 0;
        $this->rol = $args['rol'] ?? 0;
        $this->token = $args['token'] ?? '';
        $this->creado_en = $args['creado_en'] ?? '';
    }

    // Confirmar manual
    public function confirmar()
    {
        $this->confirmado = 1;
    }


    // Validar login
    public function validarLogin()
    {

        if (!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }

        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Formato de email no válido';
        }

        if (!$this->password) {
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        }

        return self::$alertas;
    }

     // Validar alta manual
     public function validarManual()
     {
         if (!$this->email) {
             self::$alertas['error'][] = 'El email del usuario es obligatorio';
         }
 
         if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
             self::$alertas['error'][] = 'Email no válido';
         }
         return self::$alertas;
     }

     // Validación para cuentas nuevas
    public function validarNuevaCuenta()
    {

        if (!$this->email) {
            self::$alertas['error'][] = 'El email del usuario es obligatorio';
        }
        if (!$this->password) {
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        }
        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = 'La contraseña debe tener al menos 6 caracteres';
        }
        if ($this->password !== $this->password2) {
            self::$alertas['error'][] = 'Las contraseñas no coinciden';
        }
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Email no válido';
        }

        return self::$alertas;
    }

    // Validar password
    public function validarPassword()
    {
        if (!$this->password) {
            self::$alertas['error'][] = 'La contraseña es obligatoria';
        }
        if (strlen($this->password) < 6) {
            self::$alertas['error'][] = 'La contraseña debe tener al menos 6 caracteres';
        }
        return self::$alertas;
    }
    
    // Email a lowercase
    public function lkemail()
    {
        $this->email = strtolower($this->email);
    }

    // Ciudad a 1a mayuscula
    public function sanCiudad()
    {
        $this->ciudad = ucfirst($this->ciudad);
    }

    // Hashear contraseña
    public function hashPassword()
    {
        $this->password = password_hash($this->password, PASSWORD_BCRYPT);
    }

    // Generar token
    public function generarToken()
    {
        $this->token = uniqid();
    }

    // Validar un email
    public function validarEmail()
    {
        if (!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }

        // Validación de que sea un email. A mayores de la validación del cliente
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            self::$alertas['error'][] = 'Email no válido';
        }
        return self::$alertas;
    }

    public function validarPerfil()
    {
        if (!$this->fname) {
            self::$alertas['error'][] = 'El nombre es obligatorio';
        }
        if (!$this->email) {
            self::$alertas['error'][] = 'El email es obligatorio';
        }
        return self::$alertas;
    }

    public function nuevoPassword(): array
    {
        if (!$this->pwdactual) {
            self::$alertas['error'][] = 'La contraseña actual no puede estar en blanco';
        }
        if (!$this->pwdnuevo) {
            self::$alertas['error'][] = 'La nueva contraseña no puede estar en blanco';
        }

        if (strlen($this->pwdnuevo) < 6) {
            self::$alertas['error'][] = 'La nueva contraseña debe contener al menos seis carateres';
        }
        return self::$alertas;
    }

    public function comprobarPassword(): bool
    {
        return password_verify($this->pwdactual, $this->password);
    }

    // Comprobar nueva contraseña
    public function confirmarPassword(): bool
    {
        return password_verify($this->pwdnuevo, $this->pwdnuevo2);
    }


    // timestamp registro
    function registrarTimestamp() {
        $this->creado_en = date('Y-m-d H:i:s');
    }

}