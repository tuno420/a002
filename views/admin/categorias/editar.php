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
    </div>
    <?php require_once __DIR__ . '/../../templates/alertas.php'; ?>
    <!-- Bootstrap form to edit a product's info -->
    <form method="post" enctype="multipart/form-data" class="mb-4">
    <!-- Remove ID field since it's for new product creation -->
    
    <div class="mb-3">
        <label for="titulo_categoria" class="form-label">Nombre de categoría</label>
        <input type="text" class="form-control" id="titulo_categoria" name="titulo_categoria" placeholder="Nombre de la categoría" value="<?php echo $categoria->titulo_categoria; ?>" required>
    </div>

    
    <div class="mb-3">
        <label for="activo" class="form-label">Activo</label>
        <select class="form-select" id="activo" name="activo" required>
                <option value="1" <?php echo $categoria->activo == 1 ? 'selected' : ''; ?>>Sí</option>
                <option value="0" <?php echo $categoria->activo == 0 ? 'selected' : ''; ?>>No</option>
            </select>
    </div>

    
    <button type="submit" class="btn btn-primary">Guardar Categoria</button>
</form>
    <script src="/build/js/bootstrap.bundle.min.js"></script>
</body>

</html>