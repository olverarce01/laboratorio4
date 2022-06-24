<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Estilos, css, bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/estilos.css">
  <link rel="icon" href="favicon.ico">
  <!-- Titulo de la pagina -->
  <title>Class-lilac - Eliminado</title>
</head>

<body style="text-align:center; font-size: 40px;">
  <br><br>
  <br><br>
    <!-- Implementacion de php para conseguir la id y eliminar la fila sql -->
    <?php
    include "conexion.php";

    $id = $_GET['id'];

    $sql = "DELETE FROM basededatoslab4.producto WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
      echo ' <div class= center-h1> <h1 class="color-h1"> Registro eliminado correctamente </h1> </div> <br>  ' ;
    } else {
      echo "Error elminado: " . mysqli_error($conn);
    }
    mysqli_close($conn);
    ?>
    <br><br>
    <br><br>
    <a href="index.php"><button class=" btn btn-primary col-12">Ir al inicio</button> </a>

</body>
</html>
