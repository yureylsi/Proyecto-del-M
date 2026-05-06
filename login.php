<?php 
include("conexion.php"); 
session_start(); // Línea importante para sesiones

$mensaje = "";

if (isset($_POST["entrar"])) {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    // Usamos $mysqli que viene de conexion.php
    $stmt = $mysqli->prepare("SELECT * FROM usuario WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        // CAMBIO A TEXTO PLANO (Comparación directa)
        if ($contrasena === $usuario["contrasena"]) { 
            header("Location: index2.html");
            exit();
        } else {
            $mensaje = "Contraseña incorrecta";
        }
    } else {
        $mensaje = "Usuario no encontrado";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>

<h2>Iniciar sesión</h2>

<form method="POST">
    <input type="email" name="correo" placeholder="Correo" required>
    <input type="password" name="contrasena" placeholder="Contraseña" required>
    <button type="submit" name="entrar">Entrar</button>
    <a href="registro.php" class="crear">Crear cuenta</a>
</form>

<p><?php echo $mensaje; ?></p>

</body>
</html>