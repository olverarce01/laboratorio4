<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">IR A INICIO!!</a>
    <button><a href="./Formulario.html">Agregar producto</a></button>
    <?php

include "conexion.php";

$sql = "SELECT id, nombre, imagen, precio, categoria, temporada, fechaIngreso, descripcion FROM basededatoslab4.producto";
$productos = $conn->query($sql);

echo "<h3>Alumnos de Tecnologias Web </h3>";

foreach($productos as $producto){
    echo "<p> id: " . $producto["id"] . "imagen: " . $producto["imagen"] ."</p>";
    echo "<button><a href='delete.php?id=".$producto["id"]."'>eliminar</a></button>";
    echo "<button><a href='editar.php?id=".$producto["id"]."'>editar</a></button>";
    echo "<button><a href='ver.php?id=".$producto["id"]."'>ver</a></button>";
}
?>





</body>
</html>