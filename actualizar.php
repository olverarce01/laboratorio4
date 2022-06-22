<a href="index.php">IR A INICIO!!</a>
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