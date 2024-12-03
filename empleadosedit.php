<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">

    <link rel="stylesheet" type = "text/css" href="dataTables/datatables.min.css" >
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type = "text/css" href="dataTables/datatables.min.css" >
    <title>Clientes</title>
</head>

<body>
<?php
        $id = $_GET['id'];
        //$id = 3; //valor enviado del login cambiandolo se mueve el usuario
    ?>
    <div class="wrapper">
        <?php include 'sidebaradmin.php'; ?>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <h2>Editar datos de empleados</h2>                <!-- <a class="modal_close" href="">&times;</a> -->
                <a href="empleadosadmin.php?id=<?php echo $id?>" class="btn btn-success btn-sm" style = "margin-left:10px;">Refrescar Tabla</a>
                <a href="empleadosadmin.php?id=<?php echo $id?>" class="btn btn-success btn-sm" style = "margin-left:10px;">Exportar hoja de calculo</a>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                    <h3>Administrador    <?php $query = "SELECT * FROM persona WHERE ID_PERSONA = $id";
                        $result = mysqli_query($conn, $query);
                        $row = $result->fetch_assoc();
                        echo $row['NOMBRES']; ?></h3>
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="<?php
                                    $query = "SELECT * FROM usuario WHERE ID_USUARIO=$id";
                                    $result = mysqli_query($conn, $query);
                                    $row = $result->fetch_assoc();
                                    echo $row['FOTO'];
                                ?>" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="index.php" class="dropdown-item">Cerrar sesión</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            
            <div class="col-md-8">
                <!-- <table id="example" class="table table-bordered"> -->
                <table id="example" class="display">
                    <thead>
                        <th style="background-color: #b71c1c; color:white;" >Foto de Perfil</th>
                        <th style="background-color: #b71c1c; color:white;" >Nombre</th>
                        <th style="background-color: #b71c1c; color:white;" >Email</th>
                        <th style="background-color: #b71c1c; color:white;" >Teléfono</th>
                        <th style="background-color: #b71c1c; color:white;" >CI</th>
                        <th style="background-color: #b71c1c; color:white;" >Accion</th>
                    </thead>
                    <tbody>
                        <?php  
                            $query = "SELECT * FROM `persona` JOIN `usuario` WHERE persona.ID_PERSONA = usuario.ID_PERSONA AND ID_ROL = 1;";
                            $result_tasks = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($result_tasks)) { ?>
                                <tr>
                                    <td> <img src="<?php echo $row['FOTO']; ?>" alt="nai" style="margin-left: 50px; width: 40px;  border-radius: 100%;" srcset=""></td>
                                    <td><?php echo $row['NOMBRES']; ?></td>
                                    <td><?php echo $row['CORREO_ELECTRONICO']; ?></td>
                                    <td><?php echo $row['TELEFONO']; ?></td>
                                    <td><?php echo $row['CI']; ?></td>
                                    <td>
                                        <a href="empleadosedit.php?id=<?php echo $id?>&id_persona=<?php echo $row['ID_PERSONA']?>" class="btn btn-primary btn-sm">Editar</a>
                                        <!-- <a href="#verdata" class="btn btn-warning btn-sm">Editar</a>
                                        <a href="#verdata" class="btn btn-primary btn-sm">Eliminar</a> -->
                                    </td>
                                </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php include('footer2.php') ?>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src = "https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script>
        // new DataTable('#example');
        $(document).ready(function() {
        $('#example').DataTable({
            "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
});
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
<?php
    include("db.php");
    
    if (isset($_GET['id']) AND isset($_GET['id_persona'])) {
        $id = $_GET['id'];
        $id_persona = $_GET['id_persona'];

        $query = "SELECT * FROM PERSONA JOIN USUARIO WHERE persona.ID_PERSONA = usuario.ID_PERSONA AND usuario.ID_PERSONA = '$id_persona';";

        $resultado2 = mysqli_query($conn, $query);
        if (mysqli_num_rows($resultado2) == 1) {
            $row = mysqli_fetch_array($resultado2);
            
            $id = $_GET['id'];
            $id_persona = $_GET['id_persona'];
            $nombre = $row['NOMBRES'];
            $ci = $row['CI'];
            $ap_paterno = $row['AP_PATERNO'];
            $ap_materno = $row['AP_MATERNO'];
            $fechanac = $row['FECHA_NACIMIENTO'];
            $correo = $row['CORREO_ELECTRONICO'];
            $telefono = $row['TELEFONO'];
            $foto = $row['FOTO'];
            $nick = $row['NICKNAME'];
        } 
    }
?>


    <div id="agregarCliente" class="modal2"> 
        <div class="modal-content">
            <div class="login-box">
            <div class="close-btn">
                <a class="modal_close" href="clientesadminedit.php?id=<?php echo $id; ?>">&times;</a>
            </div>
            <h2>Agregar Cliente</h2>
            <form id="formularioCliente" action="empleadossave.php?id=<?php echo $id; ?>&id_persona=<?php echo $id_persona; ?>" method="POST" enctype="multipart/form-data">
                <input style= "visibility:hidden;" type="text" id="id" name="id" value = "<?php echo $id?>">
                <div class="form-container">
                    <div class="left-column">
                        <label for="nombre">Nombres:</label>
                        <input type="text" id="nombre" name="nombre" placeholder="Genesis Candida" value = "<?php echo $nombre; ?>"  required>
                        <label for="ApPaterno">Apellido paterno:</label>
                        <input type="text" id="ApPaterno" name="ApPaterno" placeholder="Suarez" value = "<?php echo $ap_paterno; ?>" required>
                        <label for="ApMaterno">Apellido materno:</label>
                        <input type="text" id="ApMaterno" name="ApMaterno" placeholder="Argandoña"value = "<?php echo $ap_materno; ?>" required>
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" id="email" name="email" placeholder="correo@ejemplo.com" value = "<?php echo $correo; ?>" required>
                        <label for="ApMaterno">Imagen:</label>
                        <input type="text" id="img" name="img" placeholder="falta imagen"value = "<?php echo $foto; ?>" required>
                    </div>
                    <div class="right-column">
                        <label for="Nickname">Nickname:</label>
                        <input type="text" id="nik" name="nik" placeholder="dato faltante" value = "<?php echo $nick; ?>" required>
                        <label for="Nickname">Fecha de nacimiento: (YYYY-MM-DD)</label>
                        <input type="text" id="fechanac" name="fechanac" placeholder="dato faltante" value = "<?php echo $fechanac; ?>" required>
                        <label for="Nickname">Telefono:</label>
                        <input type="text" id="tel" name="tel" placeholder="dato faltante" value = "<?php echo $telefono; ?>" required>
                        <label for="Nickname">CI:</label>
                        <input type="text" id="ci" name="ci" placeholder="dato faltante" value = "<?php echo $ci; ?>" required>
                    </div>
                </div>
                <button type="submit" name = "update" >Registrar</button>
            </form>
            </div>
            
        </div>
    </div>

</body>

</html>
