<?php
require 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre_cli = $_POST['nombre_cli'] ?? '';
    $telefono_cli = $_POST['telefono_cli'] ?? '';
    $tipo_de_arreglo = $_POST['tipo_de_arreglo'] ?? '';
    $color_de_flores = $_POST['color_de_flores'] ?? '';
    $mensaje = $_POST['mensaje'] ?? '';
    $detalle = $_POST['detalle'] ?? '';
    $fecha_de_entrega = $_POST['fecha_de_entrega'] ?? '';
    $direccion = $_POST['direccion'] ?? '';

    $sql = "INSERT INTO pedidos 
    (nombre_cli, telefono_cli, tipo_de_arreglo, color_de_flores, mensaje, detalle, fecha_de_entrega, direccion)
    VALUES 
    ('$nombre_cli', '$telefono_cli', '$tipo_de_arreglo', '$color_de_flores', '$mensaje', '$detalle', '$fecha_de_entrega', '$direccion')";
}

$resultado = $mysqli->query($sql);

?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>
						<h3>REGISTRO GUARDADO</h3>
						<?php } else { ?>
						<h3>ERROR AL GUARDAR</h3>
					<?php } ?>
					
					<a href="index.html" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html> 