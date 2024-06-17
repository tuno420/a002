<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <link rel="stylesheet" href="/build/css/bootstrap.min.css">
    <link rel="stylesheet" href="/build/css/app.css">
    <link rel="stylesheet" href="/build/css/admin.css">
</head>

<body class="container mt-5">
    <h1 class="mb-4">Panel de Administrador</h1>
    <div class="mb-3">
        <a href="/admin" class="btn btn-primary me-2">Volver</a>
        <a href="/logout" class="btn btn-danger me-2">Cerrar Sesión</a>
        <!-- <a href="/admin/productos" class="btn btn-secondary me-2">Productos</a>
        <a href="/admin/categorias" class="btn btn-secondary me-2">Categorías</a>
        <a href="/admin/usuarios" class="btn btn-secondary me-2">Usuarios</a>
        <a href="/admin/pedidos" class="btn btn-secondary me-2">Pedidos</a>
        <a href="clientes.php" class="btn btn-secondary">Clientes</a> -->
    </div>
    <?php require_once __DIR__ . '/../../templates/alertas.php'; ?>
    <!-- Bootstrap form to edit a product's info -->
    <form method="post" enctype="multipart/form-data" class="mb-4">
        <div class="mb-3">
            <label for="id" class="form-label">ID del Producto</label>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo htmlspecialchars($producto->id); ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo htmlspecialchars($producto->titulo); ?>" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required><?php echo htmlspecialchars($producto->descripcion); ?></textarea>
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <select class="form-select" id="categoria" name="categoria" required>
                <?php foreach ($categorias as $categoria) : ?>
                    <option value="<?php echo htmlspecialchars($categoria->id); ?>" <?php echo $producto->categoria == $categoria->id ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($categoria->titulo_categoria); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio" value="<?php echo htmlspecialchars($producto->precio); ?>" required>
        </div>
        <div class="mb-3">
            <label for="activo" class="form-label">Activo</label>
            <select class="form-select" id="activo" name="activo" required>
                <option value="1" <?php echo $producto->activo == 1 ? 'selected' : ''; ?>>Sí</option>
                <option value="0" <?php echo $producto->activo == 0 ? 'selected' : ''; ?>>No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="destacado" class="form-label">Destacado</label>
            <select class="form-select" id="destacado" name="destacado" required>
                <option value="1" <?php echo $producto->destacado == 1 ? 'selected' : ''; ?>>Sí</option>
                <option value="0" <?php echo $producto->destacado == 0 ? 'selected' : ''; ?>>No</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input type="file" class="form-control" id="imagen" name="imagen">
            <?php if ($producto->imagen) : ?>
                <div class="mt-3">
                    <label for="currentImage" class="form-label">Imagen Actual</label>
                    <div>
                        <picture>
                            <source srcset="<?php echo $_ENV['HOST'] . '/build/img/productos/' . $producto->imagen; ?>.webp" type="image/webp">
                            <source srcset="<?php echo $_ENV['HOST'] . '/build/img/productos/' . $producto->imagen; ?>.jpg" type="image/jpeg">
                            <img src="<?php echo $_ENV['HOST'] . '/build/img/productos/' . $producto->imagen . '.webp'; ?>" alt="Imagen de <?php echo htmlspecialchars($producto->titulo); ?>" height="50">
                        </picture>
                    </div>
                </div>
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>

    <script src="/build/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.btn-show-more').forEach(button => {
            button.addEventListener('click', () => {
                const userId = button.getAttribute('data-id');
                const detailsRow = document.getElementById('details-' + userId);
                if (detailsRow.style.display === 'none') {
                    detailsRow.style.display = '';
                    button.textContent = 'Mostrar menos';
                } else {
                    detailsRow.style.display = 'none';
                    button.textContent = 'Mostrar más';
                }
            });
        });
    </script>
</body>

</html>