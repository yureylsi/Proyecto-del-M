<?php
// 1. Evitamos que cualquier error extraño se muestre y rompa el diseño
error_reporting(0);
ini_set('display_errors', 0);

// 2. Conexión y sesión
require 'conexion.php';
session_start();

// 3. Inicializamos la variable $resultado para que NUNCA esté indefinida
$resultado = false;
$mensaje_error = "";
$nombre_usuario_actual = "Usuario";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturamos el ID del usuario (Carmen)
    $u_id = $_SESSION['id_usuario'] ?? null;

    if ($u_id) {
        $db = isset($mysqli) ? $mysqli : $conexion;
        $consulta_user = $db->prepare("SELECT Nombre FROM usuario WHERE ID = ?");
        $consulta_user->bind_param("i", $u_id);
        $consulta_user->execute();
        $res_user = $consulta_user->get_result();
        if ($fila = $res_user->fetch_assoc()) {
            $nombre_usuario_actual = $fila['Nombre']; // Aquí obtendrá "Estelvin"
        }
    }

    // Recibimos los campos (ajustados a tu tabla pedidos)
    $n_cli = $_POST['nombre_cli'] ?? '';
    $t_cli = $_POST['telefono_cli'] ?? '';
    $corr  = $_POST['correo'] ?? '';
    $t_arr = $_POST['tipo_de_arreglo'] ?? '';
    $col   = $_POST['color_de_flores'] ?? '';
    $msj   = $_POST['mensaje'] ?? '';
    $det   = $_POST['detalle_adicional'] ?? $_POST['detalle'] ?? ''; 
    $f_ent = $_POST['fecha_de_entrega'] ?? '';
    $n_des = $_POST['nombre_destinatario'] ?? '';
    $t_des = $_POST['telefono_destinatario'] ?? '';
    $d_env = $_POST['direccion_envio'] ?? '';
    $m_env = $_POST['metodo_envio'] ?? '';
    $m_pag = $_POST['metodo_pago'] ?? '';

    // 4. SQL con los 14 campos según tu estructura en image_62359c.png
    $sql = "INSERT INTO pedidos 
    (usuario_id, nombre_cli, telefono_cli, correo, tipo_de_arreglo, color_de_flores, mensaje, detalle_adicional, fecha_de_entrega, nombre_destinatario, telefono_destinatario, direccion_envio, metodo_envio, metodo_pago)
    VALUES 
    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    // Verificamos si usas $mysqli o $conexion
    $db = isset($mysqli) ? $mysqli : $conexion;

    if ($stmt = $db->prepare($sql)) {
        $stmt->bind_param("isssssssssssss", 
            $u_id, $n_cli, $t_cli, $corr, $t_arr, $col, $msj, $det, 
            $f_ent, $n_des, $t_des, $d_env, $m_env, $m_pag
        );
        
        if($stmt->execute()) { 
            $resultado = true; 
        } else {
            $mensaje_error = $stmt->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estado del Pedido</title>
    <style>
        /* Estilo rápido para que combine con Infinite Flowers */
        body { font-family: sans-serif; background: #fdf2f8; display: flex; justify-content: center; padding-top: 50px; }
        .card { background: white; padding: 40px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); text-align: center; max-width: 400px; }
        .icon { font-size: 50px; margin-bottom: 20px; }
        .success { color: #4CAF50; }
        .error { color: #e91e63; }
        .btn { display: inline-block; background: #e91e63; color: white; padding: 12px 25px; border-radius: 50px; text-decoration: none; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="card">
        <?php if ($resultado): ?>
            <div class="icon success">✔</div>
            <h2>¡Pedido Recibido!</h2>
            <p>Gracias <strong><?php echo htmlspecialchars($nombre_usuario_actual); ?></strong>, tus flores eternas están en camino.</p>
            <a href="Perfil/mis-pedidos.php" class="btn">Ver mis pedidos</a>
            <a href="index2.html" class="btn">Volver al inicio</a>
        <?php else: ?>
            <div class="icon error">❌</div>
            <h2>¡Ups! Algo salió mal</h2>
            <p>No pudimos procesar tu pedido. <?php echo $mensaje_error; ?></p>
            <a href="index2.html" class="btn">Reintentar</a>
        <?php endif; ?>
    </div>
</body>
</html>