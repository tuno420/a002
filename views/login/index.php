<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <link rel="stylesheet" href="/build/css/bootstrap.min.css">
    <link rel="stylesheet" href="/build/css/app.css">
</head>

<body>

<?php require_once __DIR__ . '/../templates/alertas.php';?>
    <header class="section-header">
        <nav class="navbar navbar-dark navbar-expand p-0 bg-dark">
            <div class="container-fluid">
                <ul class="navbar-nav d-none d-md-flex mr-auto sticky-top">
                    <li class="nav-item"><a class="nav-link" href="#" data-abc="true">Contrareembolso</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-abc="true">Envío Gratis</a></li>
                    <li class="nav-item"><a class="nav-link" href="#" data-abc="true">Atención al Cliente</a></li>
                </ul>
                <ul class="navbar-nav d-flex align-items-center">
                    <li class="nav-item">
                        <div class="d-flex flex-row">
                            <img src="build/img/default.png" class="rounded-circle" width="30">
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link d-flex align-items-center" data-abc="true"><span>Volver al sitio</span><i class='bx bxs-chevron-down'></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <!-- login form inside this container. Modify as needed -->
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-dark text-white text-center">
                            <h4>Iniciar Sesión</h4>
                        </div>
                        <div class="card-body">
                            <form action="/login" method="POST">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <button type="submit" class="btn btn-dark w-100">Iniciar Sesión</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <a href="/signup">Registrarse</a>
            </div> -->
        </div>
    </main>

    <!-- <footer class="fixed-bottom bg-dark text-white mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Sobre Nosotros</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                </div>
                <div class="col-md-4">
                    <h5>Enlaces</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Inicio</a></li>
                        <li><a href="#" class="text-white">Productos</a></li>
                        <li><a href="#" class="text-white">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Redes Sociales</h5>
                    <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-12">
                    <p class="m-0">&copy; 2024 Tienda CBD. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer> -->

    <script src="/build/js/bootstrap.bundle.min.js"></script>
</body>

</html>
