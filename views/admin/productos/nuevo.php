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
    <!-- Remove ID field since it's for new product creation -->
    
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Nombre del producto" required>
    </div>
    
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripción del producto..." required></textarea>
    </div>
    
    <div class="mb-3">
        <label for="categoria" class="form-label">Categoría</label>
        <select class="form-select" id="categoria" name="categoria" required>
            <option selected disabled>-- Selecciona una categoría --</option>
            <?php foreach ($categorias as $categoria) : ?>
                <option value="<?php echo htmlspecialchars($categoria->id); ?>">
                    <?php echo htmlspecialchars($categoria->titulo_categoria); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="number" step="0.01" class="form-control" id="precio" name="precio" placeholder="Precio" required>
    </div>
    
    <div class="mb-3">
        <label for="activo" class="form-label">Activo</label>
        <select class="form-select" id="activo" name="activo" required>
            <option value="1">Sí</option>
            <option value="0">No</option>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="destacado" class="form-label">Destacado (mostrar en carrusel de Destacados)</label>
        <select class="form-select" id="destacado" name="destacado" required>
            <option value="1">Sí</option>
            <option value="0" selected>No</option>
        </select>
    </div>
    
    <div class="mb-3">
        <label for="imagen" class="form-label">Imagen</label>
        <input type="file" class="form-control" id="imagen" name="imagen">
    </div>
    
    <button type="submit" class="btn btn-primary">Guardar Producto</button>
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