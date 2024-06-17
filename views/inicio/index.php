<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <link rel="stylesheet" href="/public/build/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/build/css/app.css">
    <script src="https://kit.fontawesome.com/013f3a478a.js" crossorigin="anonymous"></script>
</head>

<body>

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
                            <img src="/public/build/img/default.png" class="rounded-circle" width="30">
                        </div>
                    </li>
                    <li class="nav-item">
                        <?php if (isset($_SESSION['id'])) : ?>
                            <a href="/admin" class="nav-link d-flex align-items-center" data-abc="true">
                                <span>Panel de administrador</span><i class='bx bxs-chevron-down'></i>
                            </a>
                        <?php else : ?>
                            <a href="/login" class="nav-link d-flex align-items-center" data-abc="true">
                                <span>Login</span><i class='bx bxs-chevron-down'></i>
                            </a>
                        <?php endif; ?>
                    </li>
                </ul>
            </div>
        </nav>
        <section class="header-main border-bottom bg-white">
            <div class="container-fluid">
                <div class="row p-2 pt-3 pb-3 d-flex align-items-center">
                    <div class="col-md-2">
                        <img class="d-none d-md-flex" src="/public/build/img/glzcbd.png" width="100">
                    </div>
                    <div class="col-md-8">
                        <div class="d-flex form-inputs align-items-center">
                            <input class="form-control" type="text" placeholder="Busca cualquier producto...">
                            <i class="bx bx-search"></i>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="https://wa.me/+34613028243" target="_blank" class="text-reset text-decoration-none d-block h-100">
                            <div class="ml-3 pedidos-info d-flex align-items-center h-100">
                                <span><i class="fa fa-whatsapp" aria-hidden="true"></i> 613028243</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand d-md-none d-md-flex" href="#">Categorías</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Todos los Productos</a>
                        </li>
                        <?php foreach ($categorias as $categoria) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="#categoria-<?php echo $categoria->id; ?>"><?php echo $categoria->titulo_categoria; ?></a>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>

    </header>
    <main>
        <div class="container">
            <!-- Carrusel que parece que por fin vai -->
            <div id="carouselExampleIndicators" class="carousel slide mb-5" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <?php foreach ($destacados as $index => $destacado) : ?>
                        <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $index; ?>" <?php echo ($index === 0) ? 'class="active"' : ''; ?>></li>
                    <?php endforeach; ?>
                </ol>
                <div class="carousel-inner">
                    <?php foreach ($destacados as $index => $destacado) : ?>
                        <div class="carousel-item <?php echo ($index === 0) ? 'active' : ''; ?>">
                            <picture>
                                <source srcset="<?php echo $_ENV['HOST'] . '/public/build/img/productos/' . $destacado->imagen; ?>.webp" type="image/webp">
                                <source srcset="<?php echo $_ENV['HOST'] . '/public/build/img/productos/' . $destacado->imagen; ?>.jpg" type="image/jpeg">
                                <img class="d-block w-100 i800x600" src="<?php echo $_ENV['HOST'] . '/public/build/img/productos/' . $destacado->imagen . '.webp'; ?>">
                            </picture>
                            <div class="carousel-caption text-outline">
                                <h5><?php echo $destacado->titulo; ?></h5>
                                <p><?php echo $destacado->descripcion; ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Anterior</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Siguiente</span>
                </a>
            </div>


            <!-- Productos por categoría -->
            <?php foreach ($categorias as $categoria) : ?>
                <h2 id="categoria-<?php echo $categoria->id; ?>"><?php echo $categoria->titulo_categoria; ?></h2>
                <div class="row">
                    <?php foreach ($productos_categoria[$categoria->id] as $index => $producto) : ?>
                        <div class="col-md-3 mb-4">
                            <div class="card h-100" data-bs-toggle="modal" data-bs-target="#productModal<?php echo $producto->id; ?>">

                                <picture>
                                    <source srcset="<?php echo $_ENV['HOST'] . '/public/build/img/productos/' . $producto->imagen; ?>.webp" type="image/webp">
                                    <source srcset="<?php echo $_ENV['HOST'] . '/public/build/img/productos/' . $producto->imagen; ?>.jpg" type="image/jpeg">
                                    <img src="<?php echo $_ENV['HOST'] . '/public/build/img/productos/' . $producto->imagen . '.webp'; ?>" alt="Imagen de <?php echo htmlspecialchars($producto->titulo); ?>" class="card-img-top">
                                </picture>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $producto->titulo; ?></h5>
                                    <p class="card-text"><?php echo $producto->descripcion; ?></p>
                                    <p class="card-text"><?php echo $producto->precio; ?> €</p>
                                    <button class="btn btn-primary">Ver producto</button>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Última actualización: hace 5 minutos</small>
                                </div>
                            </div>
                        </div>

                        <!-- Modal para Producto -->
                        <div class="modal fade" id="productModal<?php echo $producto->id; ?>" tabindex="-1" aria-labelledby="productModal<?php echo $producto->id; ?>Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="productModal<?php echo $producto->id; ?>Label"><?php echo $producto->titulo; ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <picture>
                                            <source srcset="<?php echo $_ENV['HOST'] . '/public/build/img/productos/' . $producto->imagen; ?>.webp" type="image/webp">
                                            <source srcset="<?php echo $_ENV['HOST'] . '/public/build/img/productos/' . $producto->imagen; ?>.jpg" type="image/jpeg">
                                            <img class="i150" src="<?php echo $_ENV['HOST'] . '/public/build/img/productos/' . $producto->imagen . '.webp'; ?>" alt="Imagen de <?php echo htmlspecialchars($producto->titulo); ?>">
                                        </picture>
                                        <p><?php echo $producto->descripcion; ?></p>
                                        <p>Precio: <?php echo $producto->precio; ?> €</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <?php
                                        $mensajeWpp = urlencode("Hola, estoy interesado en el producto: " . $producto->titulo . " con un precio de " . $producto->precio . " €. ¿Podrías darme más información?");
                                        ?>
                                        <button type="button" class="btn btn-primary">
                                            <a href="https://wa.me/+34613028243?text=<?php echo $mensajeWpp; ?>" target="_blank" class="text-white text-decoration-none">Hacer mi pedido</a>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>

        </div>
    </main>

    <footer class="bg-dark text-white mt-5 pt-3 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Sobre Nosotros</h5>
                    <p>Somos una tienda especializada en productos de CBD de la mejor calidad. Ofrecemos envíos rápidos desde España y atención directa a través de WhatsApp.</p>
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
                    <p class="m-0">&copy; 2024 GLZCBD. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </footer>

    <script src="/public/build/js/bootstrap.bundle.min.js"></script>
</body>

</html>