<?php
include("conexion.php");

if(isset($_POST['update'])){

        $id = $_GET['id'];
        $id_persona = $_GET['id_persona'];
        $nombre2 = $_POST['nombre'];
        $ci2 = $_POST['ci'];
        $apellidopat2 = $_POST['ApPaterno'];
        $apellidomat2 = $_POST['ApMaterno'];
        $email2 = $_POST['email'];
        $fechanac2 = $_POST['fechanac'];
        $nik2 = $_POST['nik'];
        $tel2 = $_POST['tel'];
        $foto2 = $_POST['img'];

        $query0 = "UPDATE persona set NOMBRES = '$nombre2', CI = '$ci2', AP_PATERNO = '$apellidopat2', AP_MATERNO = '$apellidomat2' , FECHA_NACIMIENTO = '$fechanac2', CORREO_ELECTRONICO = '$email2', TELEFONO = '$tel2' WHERE ID_PERSONA = '$id_persona';";
        $query1 = "UPDATE usuario set FOTO = '$foto2', NICKNAME = '$nik2' WHERE ID_PERSONA = '$id_persona';";
        mysqli_query($conn,$query0);
        mysqli_query($conn,$query1);
        header("Location: clientesadminedit.php?id=$id");
    }
    ?>