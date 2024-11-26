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
                <h2>Ver informacion clientes</h2>
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
                        <th style="background-color: #b71c1c; color:white;" >Nombre</th>
                        <th style="background-color: #b71c1c; color:white;" >Email</th>
                        <th style="background-color: #b71c1c; color:white;" >Teléfono</th>
                        <th style="background-color: #b71c1c; color:white;" >CI</th>
                        <th style="background-color: #b71c1c; color:white;" >Acciones</th>
                    </thead>
                    <tbody>
                        <?php  
                            $query = "SELECT * FROM persona";
                            $result_tasks = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($result_tasks)) { ?>
                                <tr>
                                    <td><?php echo $row['NOMBRES']; ?></td>
                                    <td><?php echo $row['CORREO_ELECTRONICO']; ?></td>
                                    <td><?php echo $row['TELEFONO']; ?></td>
                                    <td><?php echo $row['CI']; ?></td>
                                    <td>
                                        <a href="#verdata" class="btn btn-primary btn-sm">Ver más detalles</a>
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

    <div id="verdata" class="modal"> 
        <div class="modal-content">
            <div class="close-btn">
                <a class="modal_close" href="">&times;</a>
            </div>
            <h2>Ver usuario</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, dolor id, et deleniti incidunt, aspernatur voluptatibus quae nostrum doloremque quam accusantium debitis. Eligendi amet quos reiciendis unde. Sunt, tenetur fuga.</p>
        </div>
        
    </div>

</body>

</html>
