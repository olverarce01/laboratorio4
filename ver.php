<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     
<a href="index.php">IR A INICIO!!</a>


<?php

include "conexion.php";
$id = $_GET['id'];
$sql = "SELECT id, nombre, imagen, precio, categoria, temporada, fechaIngreso, descripcion FROM basededatoslab4.producto WHERE id=$id";
$productos = $conn->query($sql);

echo "<h3>Alumnos de Tecnologias Web </h3>";

foreach($productos as $producto){
    echo " id: " . $producto["id"] . "imagen: " . $producto["imagen"] . "<br>";
}

?>
</body>
</html>