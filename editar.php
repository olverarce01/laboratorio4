<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Estilos, css, bootstrap -->
    <link Type="text/css" rel="stylesheet" href="./css/bootstrap.min.css">
    <link Type="text/css" rel="stylesheet" href="./css/estilos.css">
    <!-- Formulario para la base de datos -->
    <title>Lab 4 - Formulario</title>
</head>
<body>

<a href="index.php">IR A INICIO!!</a>


<?php
    include "conexion.php";
    $id = $_GET['id'];
    $sql = "SELECT id, nombre, imagen, precio, categoria, temporada, fechaIngreso, descripcion FROM basededatoslab4.producto WHERE id=$id";
    $productos = $conn->query($sql);
    foreach($productos as $producto){
    }
?>
    <h1>Formulario</h1>
    <form action="actualizar.php" method="get" enctype='multipart/form-data'>
        <p>ID: <?php echo $producto["id"]?></p>
        <p>Nombre: <input type="text" name="nombre" value="<?php echo $producto["nombre"]?>"></p>
        <p>Imagen: <input type="file" name="imagen" accept="image/png, .jpeg, .jpg, image/gif" value="<?php echo $producto["imagen"]?>"> </p>
        <p>Categoria:
            <select id="idcategoria" name="categoria">
                <option value="basico" <?php if($producto["categoria"]=="basico") echo 'selected="true"';?>>Basica</option>
                <option value="intermedio" <?php if($producto["categoria"]=="intermedio") echo 'selected="true"';?>>Intermedia</option>
                <option value="avanzado" <?php if($producto["categoria"]=="avanzado") echo 'selected="true"';?>>Avanzada</option>
            </select>

        </p>
        <p>Precio: <input type="number" name="precio" value="<?php echo $producto["precio"]?>"></p>
        <p>Temporada:</p>

        <?php 
        if($producto["temporada"]=="primerSemestre"){
            echo '<input type="radio" id="html" name="temporada" value="primerSemestre" checked >';
        }else {echo '<input type="radio" id="html" name="temporada" value="primerSemestre" >';}
        echo '<label for="primer">primerSemestre</label><br>';
        if($producto["temporada"]=="segundoSemestre"){
            echo '<input type="radio" id="css" name="temporada" value="segundoSemestre" checked> ';
        }else {echo '<input type="radio" id="css" name="temporada" value="segundoSemestre">';}
        echo '<label for="segundo">segundoSemestre</label><br>';
        ?>



        <p>Fecha de ingreso: <input type="date" name="fechaIngreso" value="<?php echo $producto["fechaIngreso"]?>"></p>
        <p>Descripcion: <textarea name="descripcion" rows="5" cols="30"><?php echo $producto["descripcion"]?></textarea> </p>
        <p><input type="submit"></p>
    </form>
</body>
</html>

