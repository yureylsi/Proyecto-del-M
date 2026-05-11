<?php
require '../conexion.php'; 
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../login.php");
    exit();
}

$id_actual = $_SESSION['id_usuario'];
$db = isset($mysqli) ? $mysqli : $conexion;

// Obtenemos el nombre dinámico del usuario
$nombre_usuario = "Usuario";
$consulta_user = $db->prepare("SELECT Nombre FROM usuario WHERE ID = ?");
$consulta_user->bind_param("i", $id_actual);
$consulta_user->execute();
$res_user = $consulta_user->get_result();
if ($fila_u = $res_user->fetch_assoc()) {
    $nombre_usuario = $fila_u['Nombre'];
}

// Consultamos los pedidos (usando 'id' en minúscula según tu tabla)
$sql = "SELECT id, tipo_de_arreglo, nombre_destinatario, fecha_de_entrega 
        FROM pedidos 
        WHERE usuario_id = ? AND estado = 'En Proceso' 
        ORDER BY fecha_registro DESC";
$stmt = $db->prepare($sql);
$stmt->bind_param("i", $id_actual);
$stmt->execute();
$resultado_pedidos = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mis Pedidos | Infinite Flowers</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #fdf2f8; padding: 20px; color: #333; }
        .contenedor { max-width: 1000px; margin: auto; }
        .saludo { display: flex; align-items: center; gap: 15px; margin-bottom: 40px; }
        .grid-pedidos { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 25px; }
        
        /* Tarjeta de Pedido */
        .card-pedido { 
            background: white; 
            border-radius: 20px; 
            padding: 25px; 
            box-shadow: 0 10px 25px rgba(233, 30, 99, 0.08); 
            border-left: 6px solid #e91e63;
            position: relative;
            transition: transform 0.3s ease;
        }
        .card-pedido:hover { transform: translateY(-5px); }
        
        .status { background: #fff0f5; color: #e91e63; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: bold; display: inline-block; margin-bottom: 15px; }
        .pedido-num { font-size: 20px; margin: 0 0 15px 0; color: #333; }
        .info-item { margin: 12px 0; font-size: 14px; color: #666; display: flex; align-items: center; gap: 8px; }
        
        /* Estilo del Botón de Devolución */
        .btn-devolucion {
            display: block;
            width: 100%;
            background: white;
            color: #888;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 12px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 600;
            margin-top: 20px;
            text-align: center;
            transition: all 0.3s ease;
        }
        .btn-devolucion:hover {
            background: #fdf2f8;
            color: #e91e63;
            border-color: #e91e63;
        }

        .btn-volver { display: inline-block; margin-top: 30px; text-decoration: none; color: #e91e63; font-weight: bold; }
    </style>
</head>
<body>
    <div class="contenedor">
        <div class="saludo">
            <span style="font-size: 40px;">🌸</span>
            <h1>Mis Pedidos, <?php echo htmlspecialchars($nombre_usuario); ?></h1>
        </div>

        <div class="grid-pedidos">
            <?php if ($resultado_pedidos->num_rows > 0): ?>
                <?php while($pedido = $resultado_pedidos->fetch_assoc()): ?>
                    <div class="card-pedido">
                        <span class="status">En Proceso</span>
                        <h3 class="pedido-num">Pedido #<?php echo $pedido['id']; ?></h3>
                        
                        <div class="info-item"><span>🎁</span> <b>Arreglo:</b> <?php echo htmlspecialchars($pedido['tipo_de_arreglo']); ?></div>
                        <div class="info-item"><span>👤</span> <b>Para:</b> <?php echo htmlspecialchars($pedido['nombre_destinatario']); ?></div>
                        <div class="info-item"><span>📅</span> <b>Entrega:</b> <?php echo $pedido['fecha_de_entrega']; ?></div>

                        <a href="solicitar-devolucion.php?id=<?php echo $pedido['id']; ?>" class="btn-devolucion">
                            Solicitar Devolución
                        </a>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <div style="text-align: center; grid-column: 1/-1; padding: 50px;">
                    <p style="font-size: 18px; color: #888;">Aún no tienes pedidos registrados.</p>
                    <a href="../index2.html" class="btn-volver">Ir a comprar flores</a>
                </div>
            <?php endif; ?>
        </div>

        <a href="../index2.html" class="btn-volver">← Volver a la tienda</a>
    </div>
</body>
</html>