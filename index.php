<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GEMA.SAS</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Formulario de carga de información</h1>
        
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div class = "form-group"> 
                <input type="file" name="archivoUsuarios" id="archivoUsuarios" accept=".txt" required>
                <?php if(isset($_GET['error'])): ?>
                <div class="error"><?php echo htmlspecialchars($_GET['error']); ?></div>
                <?php endif; ?>
                <?php if(isset($_GET['success'])): ?>
                <div class="success">Archivo procesado correctamente.</div>
                <?php endif; ?>
            </div>

            <button type="submit">Enviar formulario</button>
        </form>

        <p style="margin-top: 20px;">
            <a href="resultados.php">Ver usuarios importados</a>
        </p>
    </div>
</body>
</html>
