<?php 
// 1. Incluir conexión y asegurar que la variable se llame $mysqli o $conexion
include("conexion.php"); 
session_start();

$mensaje = "";

if (isset($_POST["entrar"])) {
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    // 2. IMPORTANTE: Revisa si en tu conexion.php usas $mysqli o $conexion
    // Si usas $conexion, cambia $mysqli por $conexion abajo
    if (isset($mysqli)) {
        $db = $mysqli;
    } elseif (isset($conexion)) {
        $db = $conexion;
    } else {
        die("Error: No se encontró la variable de conexión en conexion.php");
    }

    // 3. Consulta usando los nombres exactos de tu tabla (Correo con C mayúscula)
    $stmt = $db->prepare("SELECT * FROM usuario WHERE Correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        // 4. Comparación de contraseña (Contraseña con C mayúscula y ñ)
        if ($contrasena === $usuario["Contraseña"]) { 
            
            // Guardamos los datos en la sesión
            $_SESSION['id_usuario'] = $usuario['ID']; 
            $_SESSION['nombre_usuario'] = $usuario['Nombre'];

            // Redirigir al index principal
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

<?php if($mensaje != ""): ?>
    <div style="color: red;"><?php echo $mensaje; ?></div>
<?php endif; ?>

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