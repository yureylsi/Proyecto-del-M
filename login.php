<?php include("conexion.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

<h2>Iniciar sesión</h2>

<form method="POST">
    <input type="email" name="correo" placeholder="Correo" required>
    <input type="password" name="contraseña" placeholder="Contraseña" required>
    <button type="submit" name="entrar">Entrar</button>
</form>

</body>
</html>

<?php

if (isset($_POST["entrar"])) {

    $correo = $_POST["correo"];
    $password = $_POST["contraseña"];

    // Consulta SQL
    $sql = "SELECT * FROM usuario WHERE correo='$correo' AND contraseña='$password'";
    $resultado = $conexion->query($sql);

    // Validación corregida
    if ($resultado && $resultado->num_rows > 0) {
        header("Location: bienvenido.php");
        exit();
    } else {
        echo "<script>alert('Datos incorrectos');</script>";
    }
}

?>
