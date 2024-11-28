<?php
    include("db.php");

    if (isset($_GET['id']) AND isset($_GET['id_persona'])) {
        $id = $_GET['id'];
        $id_persona = $_GET['id_persona']; 
        $query = "DELETE FROM usuario WHERE ID_PERSONA = '$id_persona';"; 
        $query2 =  "DELETE FROM persona WHERE ID_PERSONA = '$id_persona';";
        $result = mysqli_query($conn, $query);
        $result2 = mysqli_query($conn, $query2);
        if (!$result & !$result2){
            die("Query Faaaailed");
        }
        header("Location: empleadosadmindelete.php?id=$id  ");
    }
?>