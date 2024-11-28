<?php
    include("db.php");

    if (isset($_GET['id']) AND isset($_GET['id_auto']) AND isset($_GET['id_caracteristica']) ) {

        $id = $_GET['id'];
        $id_auto = $_GET['id_auto']; 
        $id_caracteristica = $_GET['id_caracteristica'];
        
        $query0 = "DELETE FROM caracteristicas WHERE ID_CARACTERISTICA = '$id_caracteristica';"; 
        $query = "DELETE FROM auto WHERE ID_AUTO = '$id_auto';"; 
        $query2 =  "DELETE FROM foto_auto WHERE ID_AUTO = '$id_auto';";
        $result2 = mysqli_query($conn, $query2);
        $result = mysqli_query($conn, $query);
        $result0 = mysqli_query($conn, $query0);
       
        if (!$result & !$result2){
            die("Query Faaaailed");
        }
        header("Location: autosadmindelete.php?id=$id ");
    }
?>