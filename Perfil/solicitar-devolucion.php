<?php
require '../conexion.php'; 
session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../login.php");
    exit();
}

$id_usuario = $_SESSION['id_usuario'];
$id_pedido = $_GET['id'] ?? null; 
$exito = false;

if ($id_pedido) {
    $db = isset($mysqli) ? $mysqli : $conexion;

    // ESTA ES LA PARTE QUE ACTUALIZA TU BASE DE DATOS
    // Cambiamos el 'estado' del pedido a 'Devuelto' para ese ID específico
    $stmt = $db->prepare("UPDATE pedidos SET estado = 'Devuelto' WHERE id = ? AND usuario_id = ?");
    $stmt->bind_param("ii", $id_pedido, $id_usuario);
    
    if ($stmt->execute() && $stmt->affected_rows > 0) {
        $exito = true;
    } 
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Devolución Procesada</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; background-color: #fdf2f8; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .card { background: white; padding: 40px; border-radius: 20px; text-align: center; max-width: 400px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .btn { display: inline-block; background: #e91e63; color: white; padding: 12px 25px; border-radius: 50px; text-decoration: none; margin-top: 20px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="card">
        <?php if ($exito): ?>
            <h2 style="color: #e91e63;">✅ ¡Listo!</h2>
            <p>La devolución del pedido #<?php echo htmlspecialchars($id_pedido); ?> se ha completado.</p>
        <?php else: ?>
            <h2>❌ Error</h2>
            <p>No se pudo actualizar la base de datos. Revisa que la columna 'estado' exista.</p>
        <?php endif; ?>
        <a href="mis-pedidos.php" class="btn">Volver a mis pedidos</a>
    </div>
</body>
</html>