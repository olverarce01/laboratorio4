<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="./css/vista.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Estilos, css, bootstrap -->
    <link Type="text/css" rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/estilos.css">
    <link rel="icon" href="favicon.ico">
    <!-- Titulo de la pagina -->
    <title>Class-lilac - Vista</title>
</head>
<body> 
    <!-- Header de la pagina --> 
    <header class="no-border-side navbar navbar-expand-md rounded-lg" >
        <a href="index.php"><button>Inicio</button></a>
        <h1> Class-lilac </h1>
        <a href="./Formulario.html"><button>Agregar curso</button></a>
    </header>
    <!-- Inicio de implementacion de php para recibir datos sql que tengan igual id recibido -->
    <?php
    include "conexion.php";
    $id = $_GET['id'];
    $sql = "SELECT id, nombre, imagen, precio, categoria, temporada, fechaIngreso, descripcion FROM basededatoslab4.producto WHERE id=$id";
    $productos = $conn->query($sql);
    echo ' <br><div class="center-h1"><h1 class="color-h1">Ver curso </h1></div><br> ';
    ?>

    <!-- Tabla para la vista -->
    <table class="table table-stripedbg-info text-center w-75 mx-auto table-bordered border-last-right" cellspacing="0" cellpadding="0">
        <tr>
            <th>ID</th>
            <th>NOMBRE</th>
            <th>PRECIO</th>
            <th>CATEGORIA</th>
            <th>TEMPORADA</th>
            <th>FECHA</th>
            <th colspan="3">DESCRIPCION</th>
        </tr>
    <?php
    // Implementacion imprimir sql
    foreach($productos as $producto){
        echo '
        <tr>
            <td>'.$producto["id"].'</td>
            <td>'.$producto["nombre"].'</td>
            <td>'.$producto["precio"].'</td>
            <td>'.$producto["categoria"].'</td>
            <td>'.$producto["temporada"].'</td>
            <td>'.$producto["fechaIngreso"].'</td>
            <td>'.$producto["descripcion"].'</td>
        
        </tr>';
    }
    ?>
    </table>
    <?php 
    // Conseguir imagen en la base de datos
    $result = $conn->query("SELECT imagen FROM basededatoslab4.producto WHERE id=$id"); 
    ?>
    <!-- Imprimir vista imagen aparte -->
    <div>


    <?php
        if($result->num_rows >0){
            echo ' <div class="gallery">';
            while($row = $result->fetch_assoc()){
                if($row["imagen"]!="NULL"){
                    echo '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode($row['imagen']).'" width="500px"/>'; 
                }
            }
            echo '</div>';
        }else{
            echo '<p class="status error">Imagen no encontrada..</p>';
        }
    ?>

    </div>
</body>
</html>