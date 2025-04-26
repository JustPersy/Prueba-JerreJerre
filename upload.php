<?php
require_once 'config.php';


$ext = pathinfo($_FILES['archivoUsuarios']['name'], PATHINFO_EXTENSION);
if (strtolower($ext) !== 'txt') {
    header("Location: index.php?error=El formato de archivo no es válido. Use un archivo .txt");
    exit;
}

// Esto crea la carpeta "uploads" si no existe
if (!is_dir('uploads')) {
    mkdir('uploads', 0755, true);
}

// Guarda el archivo en el servidor
$destino = 'uploads/' . basename($_FILES['archivoUsuarios']['name']);
if (!move_uploaded_file($_FILES['archivoUsuarios']['tmp_name'], $destino)) {
    header("Location: index.php?error=Error al guardar el archivo en el servidor.");
    exit;
}

// Lee las lineas del archivo
$lineas = file($destino, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$dataLines = [];
foreach ($lineas as $num => $line) {
    $cols = str_getcsv($line, ',');
    if (count($cols) < 4) {
        header("Location: index.php?error=" . urlencode("El archivo no tiene el formato correcto. Error en línea " . ($num + 1)));
        exit;
    }
    list($email, $nombre, $apellido, $codigo) = $cols;
    $email   = trim($email);
    $nombre  = trim($nombre);
    $apellido= trim($apellido);
    $codigo  = trim($codigo);

    // Validaciones de email y código
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: index.php?error=" . urlencode("Email inválido o faltante en la línea " . ($num + 1) . " del archivo."));
        exit;
    }
    if (!in_array($codigo, ['1','2','3'], true)) {
        header("Location: index.php?error=" . urlencode("Código de estado inválido en la línea " . ($num + 1) . " del archivo."));
        exit;
    }

    $dataLines[] = [
        'email'   => $email,
        'nombre'  => $nombre,
        'apellido'=> $apellido,
        'estado'  => intval($codigo)
    ];
}

$mysqli = connectDB();

// Inserción de datos en la base de datos
try {
    $mysqli->begin_transaction();
    $stmt = $mysqli->prepare("INSERT INTO usuarios (email, nombre, apellido, estado) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $email, $nombre, $apellido, $estado);

    foreach ($dataLines as $row) {
        $email    = $row['email'];
        $nombre   = $row['nombre'];
        $apellido = $row['apellido'];
        $estado   = $row['estado'];
        if (!$stmt->execute()) {
            throw new Exception("Error al insertar el usuario con email: " . $email);
        }
    }

    $mysqli->commit();
    $stmt->close();
    $mysqli->close();

    // Mensaje de extio
    header("Location: index.php?success=1");
    exit;
} catch (Exception $e) {
    $mysqli->rollback();
    $stmt->close();
    $mysqli->close();
    header("Location: index.php?error=" . urlencode($e->getMessage()));
    exit;
}