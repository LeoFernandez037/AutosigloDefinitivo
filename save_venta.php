<?php
include("conexion.php");

if (isset($_POST['tittle']) && isset($_POST['description'])){
    $id = $_GET['id'];
    $tittle = $_POST['tittle'];
    $description = $_POST['description'];

    $query = "INSERT INTO recibo(ID_PERSONA, RAZON_SOCIAL) VALUES ('$tittle', '$description')";

   $result =  mysqli_query($conn, $query);
   if (!$result) {
    die("Query Erroneo");
   }

   $_SESSION['message'] = 'Venta guardada con exito!!';
   $_SESSION['message_type'] = 'success';
   header("Location: nuevaVenta.php?id=".urlencode($id));
}
?> 