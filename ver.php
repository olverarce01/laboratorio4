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
    echo " id: " . $producto["id"] . "<br>";
}

?>

<?php 
 
// Get image data from database 
$result = $conn->query("SELECT imagen FROM basededatoslab4.producto WHERE id=$id"); 
?>

<?php if($result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = $result->fetch_assoc()){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['imagen']); ?>" /> 
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>



</body>
</html>