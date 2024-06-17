<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Admin</title>
    <link rel="stylesheet" href="/build/css/bootstrap.min.css">
    <link rel="stylesheet" href="/build/css/app.css">
    <link rel="stylesheet" href="/build/css/admin.css">
</head>

<body class="container mt-5">
    <h1 class="mb-4">Panel de Administrador</h1>
    <div class="mb-3">
        <a href="/" class="btn btn-primary me-2">Volver</a>
        <a href="/logout" class="btn btn-danger me-2">Cerrar Sesión</a>
        <!-- <a href="/admin/productos" class="btn btn-secondary me-2">Productos</a>
        <a href="/admin/categorias" class="btn btn-secondary me-2">Categorías</a>
        <a href="/admin/usuarios" class="btn btn-secondary me-2">Usuarios</a>
        <a href="/admin/pedidos" class="btn btn-secondary me-2">Pedidos</a>
        <a href="clientes.php" class="btn btn-secondary">Clientes</a> -->
    </div>

    <h2 class="mt-4">Productos</h2>
<a href="/admin/productos/nuevo">Nuevo producto</a>
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Activo</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $producto) : ?>
            <tr>
                <td><?php echo htmlspecialchars($producto->id); ?></td>
                <td><?php echo htmlspecialchars($producto->titulo); ?></td>
                <td><?php echo htmlspecialchars($producto->precio); ?></td>
                <td>
                    <?php echo $producto->activo ? '✅' : '❌'; ?>
                </td>
                <td>
                    <picture>
                        <source srcset="<?php echo $_ENV['HOST'] . '/build/img/productos/' . $producto->imagen; ?>.webp" type="image/webp">
                        <source srcset="<?php echo $_ENV['HOST'] . '/build/img/productos/' . $producto->imagen; ?>.jpg" type="image/jpeg">
                        <img src="<?php echo $_ENV['HOST'] . '/build/img/productos/' . $producto->imagen . '.webp'; ?>" alt="Imagen de <?php echo htmlspecialchars($producto->titulo); ?>" height="50">
                    </picture>
                </td>
                <td>
                    <div class="row">
                        <div class="col">
                            <a href="/admin/productos/editar?id=<?php echo htmlspecialchars($producto->id); ?>" class="btn btn-warning btn-sm">Editar</a>
                        </div>
                        <div class="col">
                            <form method="POST" action="/admin/productos/eliminar" class="form-delete-product">
                                <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
                                <button type="submit" class="btn btn-danger btn-sm btn-delete-product" data-id="<?php echo htmlspecialchars($producto->id); ?>" data-toggle="modal" data-target="#deleteProductModal" onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<h2 class="mt-4">Categorías</h2>
<a href="/admin/categorias/nuevo">Nueva categoría</a>
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Activo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($categorias as $categoria) : ?>
            <tr>
                <td><?php echo htmlspecialchars($categoria->id); ?></td>
                <td><?php echo htmlspecialchars($categoria->titulo_categoria); ?></td>
                <td>
                    <?php echo $categoria->activo ? '✅' : '❌'; ?>
                </td>
                <td>
                    <div class="row">
                        <div class="col">
                            <a href="/admin/categorias/editar?id=<?php echo htmlspecialchars($categoria->id); ?>" class="btn btn-warning btn-sm">Editar</a>
                        </div>
                        <div class="col">
                            <form method="POST" action="/admin/categorias/eliminar" class="form-delete-product">
                                <input type="hidden" name="id" value="<?php echo $categoria->id; ?>">
                                <button type="submit" class="btn btn-danger btn-sm btn-delete-product" data-id="<?php echo htmlspecialchars($categoria->id); ?>" data-toggle="modal" data-target="#deleteProductModal" onclick="return confirm('¿Estás seguro de que deseas eliminar esta categoría?')">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


    <h2 class="mt-4">Usuarios</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Email</th>
                <th>Localidad</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($usuarios as $usuario) {
                $nombreCompleto = $usuario->nombre . " " . $usuario->apellido1 . " " . $usuario->apellido2;
                echo "<tr>";
                echo "<td>" . $usuario->id . "</td>";
                echo "<td>" . $nombreCompleto . "</td>";
                echo "<td>" . $usuario->email . "</td>";
                echo "<td>" . $usuario->localidad . "</td>";
                echo "<td>" . $usuario->telefono . "</td>";
                echo "<td>
                        <button class='btn btn-info btn-sm btn-show-more' data-id='" . $usuario->id . "'>Mostrar más</button>
                        <a href='/admin/usuarios/editar?id=" . $usuario->id . "' class='btn btn-warning btn-sm'>Editar</a>
                        <a href='/admin/usuarios/eliminar?id=" . $usuario->id . "' class='btn btn-danger btn-sm'>Eliminar</a>
                      </td>";
                echo "</tr>";

                // Additional details row
                echo "<tr class='details-row' id='details-" . $usuario->id . "' style='display: none;'>";
                echo "<td colspan='6'>";
                echo "<div><strong>Password:</strong> " . $usuario->password . "</div>";
                echo "<div><strong>Dirección Línea 1:</strong> " . $usuario->dir_linea1 . "</div>";
                echo "<div><strong>Dirección Línea 2:</strong> " . $usuario->dir_linea2 . "</div>";
                echo "<div><strong>Dirección Línea 3:</strong> " . $usuario->dir_linea3 . "</div>";
                echo "<div><strong>Código Postal:</strong> " . $usuario->codigopostal . "</div>";
                echo "<div><strong>Provincia:</strong> " . $usuario->provincia . "</div>";
                echo "<div><strong>Ciudad:</strong> " . $usuario->ciudad . "</div>";
                echo "<div><strong>País:</strong> " . $usuario->pais . "</div>";
                echo "<div><strong>Confirmado:</strong> " . $usuario->confirmado . "</div>";
                echo "<div><strong>Estado:</strong> " . $usuario->estado . "</div>";
                echo "<div><strong>Rol:</strong> " . $usuario->rol . "</div>";
                echo "<div><strong>Token:</strong> " . $usuario->token . "</div>";
                echo "<div><strong>Creado en:</strong> " . $usuario->creado_en . "</div>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

    <p class="anotacion">
        Estas tablas deben mostrar solo os 5 ultimos items. Ver todos en cada pestaña
    </p>

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