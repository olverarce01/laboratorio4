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
  <title>Actualizado</title>

</head>

<body style="text-align:center; font-size: 40px;">
<br><br>
<br><br>
<?php

include "conexion.php";


    // If file upload form is submitted 
    $status = $statusMsg = ''; 



    if(isset($_POST["submit"])){ 
        $status = 'error'; 

        if(!empty($_FILES["imagen"]["name"])) { 
            // Get file info 
            $fileName = basename($_FILES["imagen"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
            
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif'); 
            if(in_array($fileType, $allowTypes)){ 
                $image = $_FILES['imagen']['tmp_name']; 
                $imgContent = addslashes(file_get_contents($image)); 
            
                // Insert image content into database 
                //$insert = $db->query("INSERT into images (image, created) VALUES ('$imgContent', NOW())"); 
                
                // if($insert){ 
                //     $status = 'success'; 
                //     $statusMsg = "File uploaded successfully."; 
                // }else{ 
                //     $statusMsg = "File upload failed, please try again."; 
                // }
                


                $fecha_ingreso = date("Y/m/d", strtotime($_POST['fechaIngreso']) );
                $sql = "UPDATE basededatoslab4.producto SET nombre='$_POST[nombre]', imagen='$imgContent', precio='$_POST[precio]', categoria='$_POST[categoria]', temporada='$_POST[temporada]', fechaIngreso='$fecha_ingreso', descripcion='$_POST[descripcion]' WHERE id=$_POST[id]";
                if ($conn->query($sql) === TRUE){
                    echo "Registro agregado satisfactoriamente";
                }else{
                    echo "Error: ". $sql . "<br>" . $conn->error;
                }
                $conn->close();
            


                

            }else{ 
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
            } 
        }else{ 
            $statusMsg = 'Please select an image file to upload.'; 
        } 
    } 
    
    // Display status message 
    echo $statusMsg;
    
?>

<br><br>
<br><br>
<a href="index.php"><button class=" btn btn-primary col-12">Ir al inicio</button> </a>
</body>