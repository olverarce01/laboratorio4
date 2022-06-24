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
    <title>Class-lilac - Editando curso</title>
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
        foreach($productos as $producto){
        }
    ?>
    <!-- Uso de php para imprimir datos y remplazar datos sql -->
    <br><div class= center-h1> <h1 class="color-h1">Editando el curso</h1> </div> <br>
    <form action="actualizar.php" method="post" enctype='multipart/form-data'>
        <p>ID: <input type="number" name="id" value="<?php echo $producto["id"]?>" disabled="true"></p>
        <p>Nombre del curso: <input type="text" name="nombre" value="<?php echo $producto["nombre"]?>"></p>
        <p>Imagen:</p>
        <?php 
            // Conseguir imagen en la base de datos
            $result = $conn->query("SELECT imagen FROM basededatoslab4.producto WHERE id=$id"); 
            
            
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
            



        <p>Cambiar imagen: <input type="file" name="imagen" accept="image/png, .jpeg, .jpg, image/gif"> </p>
        <p>Categoria:
            <select id="idcategoria" name="categoria">
                <option value="basico" <?php if($producto["categoria"]=="basico") echo 'selected="true"';?>>Basica</option>
                <option value="intermedio" <?php if($producto["categoria"]=="intermedio") echo 'selected="true"';?>>Intermedia</option>
                <option value="avanzado" <?php if($producto["categoria"]=="avanzado") echo 'selected="true"';?>>Avanzada</option>
            </select>
        </p>
        <p>Precio del curso: <input type="number" name="precio" min="0" value="<?php echo $producto["precio"]?>"></p>
        <p>Temporada:</p>
        <?php 
        if($producto["temporada"]=="primerSemestre"){
            echo '<input type="radio" id="html" name="temporada" value="primerSemestre" checked >';
        }else {echo '<input type="radio" id="html" name="temporada" value="primerSemestre" >';}
        echo '<label for="primer">Primer semestre</label><br>';
        if($producto["temporada"]=="segundoSemestre"){
            echo '<input type="radio" id="css" name="temporada" value="segundoSemestre" checked> ';
        }else {echo '<input type="radio" id="css" name="temporada" value="segundoSemestre">';}
        echo '<label for="segundo">Segundo Semestre</label><br>';
        ?>
        <p>Fecha de ingreso: <input type="date" name="fechaIngreso" value="<?php echo $producto["fechaIngreso"]?>"></p>
        <p>Descripcion: <textarea name="descripcion" rows="5" cols="30"><?php echo $producto["descripcion"]?></textarea> </p>
        <p><input type="submit" class="btn btn-primary" name="submit" value="Actualizar"></p>
    </form>
</body>
</html>

