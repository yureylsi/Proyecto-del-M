<?php include("conexion.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="login.css">
</head>
<body>

<h2>Iniciar sesión</h2>

<form method="POST">
    <input type="email" name="correo" placeholder="Correo" required>
    <input type="password" name="contraseña" placeholder="Contraseña" required>
    <button type="submit" name="entrar">Entrar</button>
    <a href="registro.php" class="crear" >Crear cuenta</a>
</form>

</body>
</html>

<?php

if (isset($_POST["entrar"])) {

    $correo = $_POST["correo"];
    $password = $_POST["contraseña"];

   
    $sql = "SELECT * FROM usuario WHERE correo='$correo' AND contraseña='$password'";
    $resultado = $conexion->query($sql);

    
    if ($resultado && $resultado->num_rows > 0) {
        header("Location: index2.html");
        exit();
    } else {
        echo "<script>alert('Datos incorrectos');</script>";
    }
}

?>
