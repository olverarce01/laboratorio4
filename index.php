<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Estilos, css, bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="icon" href="favicon.ico">
    <title>Inicio - Laboratorio 4</title>
</head>
<body>
    <header class="no-border-side navbar navbar-expand-md rounded-lg" >
        <a href="index.php"><button>Inicio</button></a>
        <h1> Class-lilac </h1>
        <a href="./Formulario.html"><button>Agregar curso</button></a>
    </header>
<!-- Inicio de implementacion de php -->
<?php
    // Unir conexion mysql
    include "conexion.php";
    $sql = "SELECT id, nombre, imagen, precio, categoria, temporada, fechaIngreso, descripcion FROM basededatoslab4.producto";
    $productos = $conn->query($sql);
    echo ' <br><h1 class="color-h1">Cursos de programación web</h1><br> ';
?>


<table class="table table-stripedbg-info text-center w-75 mx-auto table-bordered border-last-right" cellspacing="0" cellpadding="0">
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>CATEGORIA</th>
        <th>TEMPORADA</th>
        <th>FECHA</th>
        <th colspan="3">OPCIONES</th>
    </tr>
<?php
foreach($productos as $producto){
    echo '
    <tr>
        <td>'.$producto["id"].'</td>
        <td>'.$producto["nombre"].'</td>
        <td>'.$producto["precio"].'</td>
        <td>'.$producto["categoria"].'</td>
        <td>'.$producto["temporada"].'</td>
        <td>'.$producto["fechaIngreso"].'</td>
        <td class ="no-border-side m-0 pl-0 pr-0"><button class="btn btn-danger button"><a href="delete.php?id='.$producto["id"].'">Eliminar</a></button></td>
        <td class ="no-border-side m-0 pl-0 pr-0"><button class="btn btn-warning button"><a href="editar.php?id='.$producto["id"].'">Editar</a></button></td>
        <td class ="no-border-side m-0 pl-0 pr-0"><button class="btn btn-success button"><a href="ver.php?id='.$producto["id"].'">Ver</a></button></td>
        
    </tr>';
}
?>
</table>




</body>
</html>