<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class LoginController {
    public static function login(Router $router) {

        $alertas = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario = new Usuario($_POST);

            $alertas = $usuario->validarLogin();

            if (empty($alertas)) {
                $usuario = Usuario::where('email', $usuario->email);
                if (!$usuario || !$usuario->confirmado) {
                    Usuario::setAlerta('error', 'El usuario no existe o no está confirmado');
                } else {
                    if (password_verify($_POST['password'], $usuario->password)) {
                        session_start();
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['nombre'] = $usuario->nombre;
                        $_SESSION['login'] = true;
                        $_SESSION['rol'] = $usuario->rol;
                        header('Location: /admin');
                    } else {
                        Usuario::setAlerta('error', 'Contraseña incorrecta');
                    }
                }
            }
        }
        $alertas = Usuario::getAlertas();


        $router->render('login/index', [
            'titulo' => 'Iniciar Sesión',
            'alertas' => $alertas
        ]);
    }

    // LOGOUT
    public static function logout()
    {
        session_start();
            $_SESSION = [];
            header('Location: /');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            session_start();
            $_SESSION = [];
            header('Location: /');
        }
    }

    // SIGNUP
    public static function signup(Router $router)
    {
        $alertas = [];
        $usuario = new Usuario;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            if (empty($alertas)) {
                $existeUsuario = Usuario::where('email', $usuario->email);

                if ($existeUsuario) {
                    Usuario::setAlerta('error', 'El Usuario ya está registrado');
                    $alertas = Usuario::getAlertas();
                } else {
                    //Sanitizar email
                    $usuario->lkemail();

                    // Hashear password
                    $usuario->hashPassword();

                    // Eliminar password2
                    unset($usuario->password2);

                    // Guardar timestamp
                    $usuario->registrarTimestamp();

                    // Generar el token
                    $usuario->generarToken();

                    // Crear un nuevo usuario
                    $resultado = $usuario->guardar();

                    if ($resultado) {
                        header('Location: /');
                    }
                }
            }
        }

        $router->render('login/signup', [
            'titulo' => 'Creación de cuenta',
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }
}
