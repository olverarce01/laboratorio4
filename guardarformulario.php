<a href="index.php">IR A INICIO!!</a>


<?php

include "conexion.php";


    $fecha_ingreso = date("Y/m/d", strtotime($_GET['fechaIngreso']) );
    echo ($_GET['imagen']);
    $sql = "INSERT INTO basededatoslab4.producto (id, nombre, imagen, precio, categoria, temporada, fechaIngreso, descripcion)
    VALUES ( '', '$_GET[nombre]', '$_GET[imagen]', $_GET[precio], '$_GET[categoria]', '$_GET[temporada]', '$fecha_ingreso' , '$_GET[descripcion]' ) ";
    if ($conn->query($sql) === TRUE){
        echo "Registro agregado satisfactoriamente";
    }else{
        echo "Error: ". $sql . "<br>" . $conn->error;
    }
    $conn->close();

?>