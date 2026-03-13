<?php
require("conexion.php");

$mensaje = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];

    $sql = "INSERT INTO usuario (id,nombre, apellido, correo, contraseña)
            VALUES (Null,'$nombre', '$apellido', '$correo', '$contraseña')";

    if ($mysqli->query($sql) === TRUE) {
        $mensaje = "Registro exitoso";
    } else {
        $mensaje = "Error al registrar";    
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="stylesheet" href="registro.css">
</head>

<body>

    
<div class="contenedor">
        
        
    <?php if ($mensaje == "") { ?>
    <h2>Registro de Usuarios</h2>

    <form action="registro.php" method="POST">

        <label>Nombre</label>
        <input type="text" name="nombre" required>

        <label>Apellidos</label>
        <input type="text" name="apellidos" required>

        <label>Correo</label>
        <input type="email" name="correo" required>

        <label>Contraseña</label>
        <input type="password" name="contrasena" required>

        <button type="submit">Registrar</button>

    </form>

    <?php } else { ?>

        <p class="mensaje"><?php echo $mensaje; ?></p>

        <a href="index.html" class="boton-volver">Volver al inicio</a>

    <?php } ?>    
        

</div>

</body>
</html>
