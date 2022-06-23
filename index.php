<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./css/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>

    <header><a href="index.php"><button>Inicio</button></a>
        <a href="./Formulario.html"><button>Agregar curso</button></a>
    </header>
<?php
include "conexion.php";
$sql = "SELECT id, nombre, imagen, precio, categoria, temporada, fechaIngreso, descripcion FROM basededatoslab4.producto";
$productos = $conn->query($sql);
echo "<h1>Cursos de programación web</h1>";
?>


<table class="default" cellspacing="0" cellpadding="0">
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>
<?php
foreach($productos as $producto){
    echo '
    <tr>
        <td>'.$producto["id"].'</td>
        <td>'.$producto["nombre"].'</td>
        <td>'.$producto["precio"].'</td>
        <td><button><a href="delete.php?id='.$producto["id"].'">Eliminar</a></button></td>
        <td><button><a href="editar.php?id='.$producto["id"].'">Editar</a></button></td>
        <td><button><a href="ver.php?id='.$producto["id"].'">Ver</a></button></td>
        
    </tr>';

}
?>
</table>




</body>
</html>