<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre_cli = $_POST['nombre_cli'] ?? '';
    $telefono_cli = $_POST['telefono_cli'] ?? '';
    $tipo_de_arreglo = $_POST['tipo_de_arreglo'] ?? '';
    $color_de_flores = $_POST['color_de_flores'] ?? '';
    $mensaje = $_POST['mensaje'] ?? '';
    $detalle = $_POST['detalle'] ?? '';
    $fecha_de_entrega = $_POST['fecha_de_entrega'] ?? '';
    $direccion = $_POST['direccion'] ?? '';

    $sql = "INSERT INTO pedidos 
    (nombre_cli, telefono_cli, tipo_de_arreglo, color_de_flores, mensaje, detalle, fecha_de_entrega, direccion)
    VALUES 
    ('$nombre_cli', '$telefono_cli', '$tipo_de_arreglo', '$color_de_flores', '$mensaje', '$detalle', '$fecha_de_entrega', '$direccion')";
}

$resultado = $conexion->query($sql); 

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Usamos Bootstrap para el diseño -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Estado del Pedido</title>
    <style>
        body { background-color: #f8f9fa; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
        .card { border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); padding: 40px; text-align: center; max-width: 500px; width: 90%; }
        .success-icon { font-size: 60px; color: #28a745; margin-bottom: 20px; }
        .error-icon { font-size: 60px; color: #dc3545; margin-bottom: 20px; }
        h3 { color: #333; font-weight: 700; margin-bottom: 15px; }
        p { color: #666; margin-bottom: 30px; }
        .btn-regresar { background-color: #e91e63; border: none; padding: 12px 30px; border-radius: 50px; color: white; font-weight: bold; text-decoration: none; transition: 0.3s; }
        .btn-regresar:hover { background-color: #c2185b; color: white; transform: scale(1.05); }
    </style>
</head>
<body>

    <div class="card">
        <?php if ($resultado) { ?>
            <div class="success-icon">✔</div>
            <h3>¡Pedido Completado!</h3>
            <p>Gracias por confiar en <strong>Infinite Flowers</strong>. Hemos recibido tus detalles y estamos preparando tu arreglo.</p>
        <?php } else { ?>
            <div class="error-icon">✘</div>
            <h3>¡Ups! Algo salió mal</h3>
            <p>No pudimos procesar tu pedido en este momento. Por favor, inténtalo de nuevo.</p>
            <small class="text-danger"><?php echo $conexion->error; ?></small>
        <?php } ?>
        
        <div class="mt-4">
            <a href="index2.html" class="btn-regresar">Volver a la Tienda</a>
        </div>
    </div>

</body>
</html>