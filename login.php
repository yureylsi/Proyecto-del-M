<?php include("conexion.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="login.css">

    <style>
        body {
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
        }

        h2 {
            text-align: center;
            color: #8a2be2;
            font-size: 30px;
            margin-top: 50px;
        }

        
        form {
            width: 350px;
            background: rgba(255, 255, 255, 0.85);
            padding: 25px;
            margin: auto;
            margin-top: 40px;
            border-radius: 15px;
            box-shadow: 0px 0px 15px #b57edc;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        /* Inputs */
        input {
            padding: 15px;
            border: 2px solid #d8b3ff;
            border-radius: 10px;
            outline: none;
            font-size: 16px;
        }

        /* Botón */
        button {
            padding: 12px;
            background: #b57edc;
            border: none;
            color: white;
            font-size: 17px;
            border-radius: 10px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #9a4de9;
        }
    </style>

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

   
    $sql = "SELECT * FROM usuario WHERE correo='$correo' AND contraseña='$password'";
    $resultado = $conexion->query($sql);

    
    if ($resultado && $resultado->num_rows > 0) {
        header("Location: bienvenido.php");
        exit();
    } else {
        echo "<script>alert('Datos incorrectos');</script>";
    }
}

?>
