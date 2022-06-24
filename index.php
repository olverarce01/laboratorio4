<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Estilos, css, bootstrap -->
    <link Type="text/css" rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="icon" href="favicon.ico">
    <!-- Titulo de la pagina -->
    <title>Class-lilac - Inicio</title>
</head>
<body>
    <!-- Header de la pagina -->
    <header class="no-border-side navbar navbar-expand-md rounded-lg" >
        <a href="index.php"><button>Inicio</button></a>
        <h1> Class-lilac </h1>
        <a href="./Formulario.html"><button>Agregar curso</button></a>
    </header>
<!-- Inicio de implementacion de php para recibir datos sql -->
<?php
    // Unir conexion mysql
    include "conexion.php";
    $sql = "SELECT id, nombre, imagen, precio, categoria, temporada, fechaIngreso, descripcion FROM basededatoslab4.producto";
    $productos = $conn->query($sql);
    echo ' <br><div class= center-h1> <h1 class="color-h1">Cursos de programación web</h1> </div> <br> ';
?>
<!-- Tabla que contiene los registros actuales de la base de datos, sin incluir imagen y descripcion -->
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
<!-- Implementacion php para imprimir datos sql en la tabla con botones ver, editar y eliminar -->
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
        <td class ="no-border-side m-0 pl-0 pr-0"><a href="delete.php?id='.$producto["id"].'"><button class="btn btn-danger button">Eliminar</button></a></td>
        <td class ="no-border-side m-0 pl-0 pr-0"><a href="editar.php?id='.$producto["id"].'"><button class="btn btn-warning button">Editar</button></a></td>
        <td class ="no-border-side m-0 pl-0 pr-0"><a href="ver.php?id='.$producto["id"].'"><button class="btn btn-success button">Ver</button></a></td>


        
    </tr>';
}
?>
</table>
</body>
</html>