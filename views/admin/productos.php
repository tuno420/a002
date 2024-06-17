<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Admin | Productos </title>
    <link rel="stylesheet" href="/build/css/bootstrap.min.css">
    <link rel="stylesheet" href="/build/css/app.css">
    <link rel="stylesheet" href="/build/css/admin.css">
</head>

<body class="container mt-5">
    <h1 class="mb-4">Panel de Administrador</h1>
    <div class="mb-3">
        <a href="/admin" class="btn btn-primary me-2">Panel</a>
        <a href="logout.php" class="btn btn-danger me-2">Cerrar Sesión</a>
        <a href="/admin/productos" class="btn btn-secondary me-2">Productos</a>
        <a href="/admin/categorias" class="btn btn-secondary me-2">Categorías</a>
        <a href="/admin/usuarios" class="btn btn-secondary me-2">Usuarios</a>
        <a href="/admin/pedidos" class="btn btn-secondary me-2">Pedidos</a>
        <a href="clientes.php" class="btn btn-secondary">Clientes</a>
    </div>

    <h2 class="mt-4">Productos</h2>
    <aside>
        <div class="container container-fluid mb-4">
            <a href="/admin/productos/nuevo">Nuevo producto</a>
        </div>
    </aside>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Activo</th>
                <th>Categoría</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($productos as $producto) {

                $imageUrl = "/build/img/" . $producto->portada . ".jpeg";

                echo "<tr>";
                echo "<td>" . $producto->id . "</td>";
                echo "<td>" . $producto->titulo . "</td>";
                echo "<td>" . $producto->precio . "</td>"; // Assuming there's a 'precio' property
                echo "<td>" . $producto->activo . "</td>"; // Assuming there's a 'activo' property
                echo "<td>" . $producto->categoria . "</td>";
                echo "<td><img src='" . $imageUrl . "' alt='Imagen de " . $producto->titulo . "' height='50'></td>"; // Assuming there's a 'portada' property
                echo "<td>
                        <a href='edit.php?id=" . $producto->id . "' class='btn btn-warning btn-sm'>Editar</a>
                        <a href='delete.php?id=" . $producto->id . "' class='btn btn-danger btn-sm'>Eliminar</a>
                      </td>";
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
