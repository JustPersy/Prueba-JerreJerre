<?php
require_once 'config.php';

// Conexión a la base de datos
$mysqli = connectDB();

// Consultas por estado
$activos    = $mysqli->query("SELECT email, nombre, apellido FROM usuarios WHERE estado = 1");
$inactivos  = $mysqli->query("SELECT email, nombre, apellido FROM usuarios WHERE estado = 2");
$espera     = $mysqli->query("SELECT email, nombre, apellido FROM usuarios WHERE estado = 3");

$mysqli->close();
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de Usuarios</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <div class="container">

        <div class="volver-enlace">
            <a href="index.php" class="boton-volver">Volver a la página principal</a>
        </div>

        <section>
            <h2>Usuarios Activos</h2>
            <table>
                <thead><tr><th>Email</th><th>Nombre</th><th>Apellido</th></tr></thead>
                <tbody>
                    <?php while ($row = $activos->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($row['apellido']); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>

        <section>
            <h2>Usuarios Inactivos</h2>
            <table>
                <thead><tr><th>Email</th><th>Nombre</th><th>Apellido</th></tr></thead>
                <tbody>
                    <?php while ($row = $inactivos->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($row['apellido']); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>

        <section>
            <h2>Usuarios en Espera</h2>
            <table>
                <thead><tr><th>Email</th><th>Nombre</th><th>Apellido</th></tr></thead>
                <tbody>
                    <?php while ($row = $espera->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($row['apellido']); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </div>
</body>
</html>

