<?php
require("conexion.php");

$mensaje = ""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];

   
    $sql = "INSERT INTO usuario (id,nombre, apellido, correo, contraseña)
            VALUES (Null'$nombre', '$apellidos', '$correo', '$contraseña')";

    if ($conexion->query($sql) === TRUE) {
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
    <style>
        body {
            background: #f2f2f2;
             font-family: 'Times New Roman', Times, serif;
        }

        .contenedor {
            width: 380px;
            background: white;
            margin: 70px auto;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.15);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
            display: block;
            color: #444;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 8px;
            border: 1px solid #aaa;
        }

        button {
            width: 100%;
            padding: 12px;
            margin-top: 20px;
            background: #4CAF50;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #45A049;
        }

        .boton-volver {
            display: block;
            width: 100%;
            text-align: center;
            background: #2196F3;
            padding: 12px;
            border-radius: 8px;
            color: white;
            text-decoration: none;
            margin-top: 20px;
            font-size: 15px;
            transition: 0.3s;
        }

        .boton-volver:hover {
            background: #0b7dda;
        }

        .mensaje {
            text-align: center;
            font-size: 18px;
            margin-bottom: 15px;
            color: #333;
        }
    </style>
</head>

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

    <a class="boton-volver" href="index.html">Volver al inicio</a>

    <?php } ?>

</div>


<body>
