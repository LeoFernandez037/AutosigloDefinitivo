<?php
include("conexion.php");

if(isset($_POST['update'])){

        $id = $_GET['id'];
        $id_auto2 = $_GET['id_auto'];
        $nombre2 = $_POST['nombre'];
        $precio2 = $_POST['precio'];
        $numerocha2 = $_POST['numerocha'];
        $traccion2 = $_POST['traccion'];
        $caracteristica2 = $_POST['caracteristica'];

        $imagenurl2 = $_POST['imagenurl'];

        $transmision2 = $_POST['transmision'];
        $suspensiondel2 = $_POST['suspensiondel'];
        $suspensiontras2 = $_POST['suspensiontras'];
        $frenosdel2 = $_POST['frenosdel'];
        $frenostras2 = $_POST['frenostras'];

        $query0 = "UPDATE auto set NOMBRE = '$nombre2', PRECIO = '$precio2', NUMERO_CHASIS = '$numerocha2', TRACCION = '$traccion2' WHERE ID_AUTO = '$id_auto2'";
        $query1 = "UPDATE caracteristicas set TRANSMISION = '$transmision2', SUSPENSION_DELANTERA = '$suspensiondel2', SUSPENSION_TRASERA = '$suspensiontras2', FRENOS_DELANTEROS = '$frenosdel2', FRENOS_TRASEROS = '$frenostras2' WHERE ID_CARACTERISTICA = '$caracteristica2'";
        $query2 = "UPDATE foto_auto set FOTOGRAFIA = '$imagenurl2' WHERE ID_AUTO = '$id_auto2'";
        mysqli_query($conn,$query0);
        mysqli_query($conn,$query1);
        mysqli_query($conn,$query2);
        header("Location: autosadminedit.php?id=$id");
    }

    ?>