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

    <header class="section-header">
        <nav class="navbar navbar-dark navbar-expand p-0 bg-dark">
            <div class="container-fluid">
                <ul class="navbar-nav d-none d-md-flex mr-auto">
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
                        <a href="/admin" class="nav-link d-flex align-items-center" data-abc="true"><span>Mi Cuenta(admin)</span><i class='bx bxs-chevron-down'></i></a>
                    </li>
                </ul> <!-- list-inline //  -->
            </div> <!-- navbar-collapse .// -->
        </nav> <!-- header-top-light.// -->

        <section class="header-main border-bottom bg-white">
            <div class="container-fluid">
                <div class="row p-2 pt-3 pb-3 d-flex align-items-center">
                    <div class="col-md-2">
                        <img class="d-none d-md-flex" src="https://i.imgur.com/R8QhGhk.png" width="100">
                    </div>
                    <div class="col-md-8">
                        <div class="d-flex form-inputs">
                            <input class="form-control" type="text" placeholder="Busca cualquier producto...">
                            <i class="bx bx-search"></i>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="d-flex d-none d-md-flex flex-row align-items-center">
                            <span class="shop-bag"><i class='bx bxs-shopping-bag'></i></span>
                            <div class="d-flex flex-column ms-2">
                                <span class="qty">1 Producto</span>
                                <span class="fw-bold">27,90 €</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand d-md-none d-md-flex" href="#">Categories</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Todos los Productos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Aceites de CBD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Vapeadores</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Flores de CBD
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Packs</a></li>
                                <li><a class="dropdown-item" href="#">Cogollos</a></li>
                                <li><a class="dropdown-item" href="#">Compactos</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">

            <!-- Carousel for Featured Products -->
            <div id="carouselExampleIndicators" class="carousel slide mb-5" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Producto destacado 1">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Producto destacado 1</h5>
                            <p>Descripción breve del producto destacado 1.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Producto destacado 2">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Producto destacado 2</h5>
                            <p>Descripción breve del producto destacado 2.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="https://via.placeholder.com/800x400" class="d-block w-100" alt="Producto destacado 3">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Producto destacado 3</h5>
                            <p>Descripción breve del producto destacado 3.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>

            <!-- Oils Category -->
            <h2 class="mb-4">Aceites de CBD</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
                <div class="col">
                    <div class="card h-100" data-bs-toggle="modal" data-bs-target="#productModal1">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Aceite de CBD">
                        <div class="card-body">
                            <h5 class="card-title">Aceite de CBD</h5>
                            <p class="card-text">Aceite de CBD de alta calidad para uso diario. Contenido: 30ml.</p>
                            <button class="btn btn-primary">Añadir al carrito</button>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Última actualización: hace 5 minutos</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100" data-bs-toggle="modal" data-bs-target="#productModal1">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Aceite de CBD">
                        <div class="card-body">
                            <h5 class="card-title">Aceite de CBD</h5>
                            <p class="card-text">Aceite de CBD de alta calidad para uso diario. Contenido: 30ml.</p>
                            <button class="btn btn-primary">Añadir al carrito</button>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Última actualización: hace 5 minutos</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100" data-bs-toggle="modal" data-bs-target="#productModal1">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Aceite de CBD">
                        <div class="card-body">
                            <h5 class="card-title">Aceite de CBD</h5>
                            <p class="card-text">Aceite de CBD de alta calidad para uso diario. Contenido: 30ml.</p>
                            <button class="btn btn-primary">Añadir al carrito</button>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Última actualización: hace 5 minutos</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Vapers Category -->
            <h2 class="mb-4">Vapeadores</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
                <div class="col">
                    <div class="card h-100" data-bs-toggle="modal" data-bs-target="#productModal2">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Vapeador de CBD">
                        <div class="card-body">
                            <h5 class="card-title">Vapeador de CBD</h5>
                            <p class="card-text">Disfruta del CBD de manera rápida y efectiva con nuestros vapeadores.</p>
                            <button class="btn btn-primary">Añadir al carrito</button>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Última actualización: hace 10 minutos</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Flowers Category -->
            <h2 class="mb-4">Flores de CBD</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4 mb-4">
                <div class="col">
                    <div class="card h-100" data-bs-toggle="modal" data-bs-target="#productModal3">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Flores de CBD">
                        <div class="card-body">
                            <h5 class="card-title">Flores de CBD</h5>
                            <p class="card-text">Flores de CBD naturales y orgánicas, disponibles en varios aromas.</p>
                            <button class="btn btn-primary">Añadir al carrito</button>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Última actualización: hace 15 minutos</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100" data-bs-toggle="modal" data-bs-target="#productModal3">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Flores de CBD">
                        <div class="card-body">
                            <h5 class="card-title">Flores de CBD</h5>
                            <p class="card-text">Flores de CBD naturales y orgánicas, disponibles en varios aromas.</p>
                            <button class="btn btn-primary">Añadir al carrito</button>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Última actualización: hace 15 minutos</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100" data-bs-toggle="modal" data-bs-target="#productModal3">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Flores de CBD">
                        <div class="card-body">
                            <h5 class="card-title">Flores de CBD</h5>
                            <p class="card-text">Flores de CBD naturales y orgánicas, disponibles en varios aromas.</p>
                            <button class="btn btn-primary">Añadir al carrito</button>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Última actualización: hace 15 minutos</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100" data-bs-toggle="modal" data-bs-target="#productModal3">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Flores de CBD">
                        <div class="card-body">
                            <h5 class="card-title">Flores de CBD</h5>
                            <p class="card-text">Flores de CBD naturales y orgánicas, disponibles en varios aromas.</p>
                            <button class="btn btn-primary">Añadir al carrito</button>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Última actualización: hace 15 minutos</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100" data-bs-toggle="modal" data-bs-target="#productModal3">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Flores de CBD">
                        <div class="card-body">
                            <h5 class="card-title">Flores de CBD</h5>
                            <p class="card-text">Flores de CBD naturales y orgánicas, disponibles en varios aromas.</p>
                            <button class="btn btn-primary">Añadir al carrito</button>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Última actualización: hace 15 minutos</small>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100" data-bs-toggle="modal" data-bs-target="#productModal3">
                        <img src="https://via.placeholder.com/150" class="card-img-top" alt="Flores de CBD">
                        <div class="card-body">
                            <h5 class="card-title">Flores de CBD</h5>
                            <p class="card-text">Flores de CBD naturales y orgánicas, disponibles en varios aromas.</p>
                            <button class="btn btn-primary">Añadir al carrito</button>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">Última actualización: hace 15 minutos</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Product Modals -->
    <div class="modal fade" id="productModal1" tabindex="-1" aria-labelledby="productModal1Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModal1Label">Aceite de CBD</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://via.placeholder.com/150" class="img-fluid" alt="Aceite de CBD">
                    <p>Aceite de CBD de alta calidad para uso diario. Contenido: 30ml.</p>
                    <p>Precio: 27,90 €</p>
                    <p>Descripción detallada del producto.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Añadir al carrito</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="productModal2" tabindex="-1" aria-labelledby="productModal2Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModal2Label">Vapeador de CBD</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://via.placeholder.com/150" class="img-fluid" alt="Vapeador de CBD">
                    <p>Disfruta del CBD de manera rápida y efectiva con nuestros vapeadores.</p>
                    <p>Precio: 39,90 €</p>
                    <p>Descripción detallada del producto.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Añadir al carrito</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="productModal3" tabindex="-1" aria-labelledby="productModal3Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModal3Label">Flores de CBD</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="https://via.placeholder.com/150" class="img-fluid" alt="Flores de CBD">
                    <p>Flores de CBD naturales y orgánicas, disponibles en varios aromas.</p>
                    <p>Precio: 19,90 €</p>
                    <p>Descripción detallada del producto.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Añadir al carrito</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-5 p-4 text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Contacto</h5>
                    <p>Email: info@tiendacbd.com</p>
                    <p>Teléfono: +34 123 456 789</p>
                </div>
                <div class="col-md-4">
                    <h5>Enlaces Útiles</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Política de Privacidad</a></li>
                        <li><a href="#" class="text-white">Términos y Condiciones</a></li>
                        <li><a href="#" class="text-white">Contacto</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Síguenos</h5>
                    <a href="#" class="text-white me-2"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-white me-2"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="text-white me-2"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-white"><i class="bi bi-youtube"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <script src="/build/js/bootstrap.bundle.min.js"></script>
</body>

</html>