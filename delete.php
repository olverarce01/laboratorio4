<a href="index.php">IR A INICIO!!</a>


<?php
include "conexion.php";

$id = $_GET['id'];


$sql = "DELETE FROM basededatoslab4.producto WHERE id=$id";
if (mysqli_query($conn, $sql)) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>