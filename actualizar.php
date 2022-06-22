<a href="index.php">IR A INICIO!!</a>


<?php

include "conexion.php";


    $fecha_ingreso = date("Y/m/d", strtotime($_GET['fechaIngreso']) );
    echo ($_GET['imagen']);
    $sql = "UPDATE basededatoslab4.producto SET nombre='$_GET[nombre]', imagen='NULL', precio='$_GET[precio]', categoria='$_GET[categoria]', temporada='$_GET[temporada]', fechaIngreso='$fecha_ingreso', descripcion='$_GET[descripcion]' WHERE id=$_GET[id]";
    if ($conn->query($sql) === TRUE){
        echo "Registro cambiado satisfactoriamente";
    }else{
        echo "Error: ". $sql . "<br>" . $conn->error;
    }
    $conn->close();

?>