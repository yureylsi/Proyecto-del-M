<?php 
include("conexion.php"); 

$mensaje = "";
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

<?php

if (isset($_POST["entrar"])) {

    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    // CONSULTA SEGURA
    $stmt = $mysqli->prepare("SELECT * FROM usuario WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {

        $usuario = $resultado->fetch_assoc();

        // VERIFICAR CONTRASEÑA ENCRIPTADA
        if (password_verify($contrasena, $usuario["contraseña"])) {
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