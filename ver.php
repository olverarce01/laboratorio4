<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="./css/vista.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Estilos, css, bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
    <link rel="icon" href="favicon.ico">
    <title>Document</title>
</head>
<body>  
<header class="no-border-side navbar navbar-expand-md rounded-lg" >
        <a href="index.php"><button>Inicio</button></a>
        <h1> Class-lilac </h1>
        <a href="./Formulario.html"><button>Agregar curso</button></a>
    </header>

<?php

include "conexion.php";
$id = $_GET['id'];
$sql = "SELECT id, nombre, imagen, precio, categoria, temporada, fechaIngreso, descripcion FROM basededatoslab4.producto WHERE id=$id";
$productos = $conn->query($sql);

echo ' <br><h1 class="color-h1">Ver curso </h1><br> ';
?>

<table class="table table-stripedbg-info text-center w-75 mx-auto table-bordered border-last-right" cellspacing="0" cellpadding="0">
    <tr>
        <th>ID</th>
        <th>NOMBRE</th>
        <th>PRECIO</th>
        <th>CATEGORIA</th>
        <th>TEMPORADA</th>
        <th>FECHA</th>
        <th colspan="3">DESCRIPCION</th>
        <!-- <th>IMAGEN</th> -->
    </tr>
<?php

// foreach($productos as $producto){
//     echo " ID:". $producto["id"] . "<br>";
//     echo " Nombre del curso: " . $producto["nombre"] . "<br>";   
//     echo " Precio del curso: " . $producto["precio"] . "<br>";  
//     echo " Categoria: " . $producto["categoria"] . "<br>";  
//     echo " Temporada: " . $producto["temporada"] . "<br>";  
//     echo " Fecha de ingreso: " . $producto["fechaIngreso"] . "<br>";  
//     echo " Descripcion: " . $producto["descripcion"] . "<br>";   
// }

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
<!-- <td>'.$producto["id"].'</td> -->
<?php 
 
// Get image data from database 
$result = $conn->query("SELECT imagen FROM basededatoslab4.producto WHERE id=$id"); 
?>

<div>
<?php if($result->num_rows > 0){ ?> 
    <div class="gallery">
        <p style="color:black; font-size: 35px; font-weight: bold;"> Imagen: </p>
        <?php while($row = $result->fetch_assoc()){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['imagen']); ?>" /> 
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>
</div>

</body>
</html>