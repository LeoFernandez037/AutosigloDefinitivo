<?php include("conexion.php")?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet">
    <link rel="stylesheet" href="styleadmin.css">
    <title>Inicio</title>
</head>

<body>
    <?php
        $id = $_GET['id'];
        //$id = 3; //valor enviado del login cambiandolo se mueve el usuario
    ?>
    <!-- <?php  
        $query = "SELECT * FROM usuario WHERE ID_PERSONA = $id";
        $result = mysqli_query($conn, $query);
        $row = $result->fetch_assoc();
        echo $row['nombre'];
    ?> -->
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <h2>Inicio</h2>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                    <img src=  <?php $query = "SELECT * FROM usuario WHERE ID_PERSONA= $id";
            $result = mysqli_query($conn, $query);
            $row = $result->fetch_assoc();
            echo $row['FOTO'];?>
                                    class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="index.php" class="dropdown-item">Cerrar sesion</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid">
                <div class="mb-3">
                    <H1>Tu Dashboard</H1>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6 d-flex">
                        <div class="card flex-fill border-0 illustration">
                            <div class="card-body p-0 d-flex flex-fill">
                                <div class="row g-0 w-100">
                                    <div class="p-3 m-1">
                                        <h4>Bienvenido Administrador<?php $query = "SELECT * FROM persona WHERE ID_PERSONA = $id";
        $result = mysqli_query($conn, $query);
        $row = $result->fetch_assoc();
        echo $row['NOMBRES']; ?></h4>
                                        <!-- <p class="mb-0"><?php $query = "SELECT * FROM empleado WHERE ID_PERSONA = $id";
        $result = mysqli_query($conn, $query);
        $row = $result->fetch_assoc();
        echo $row['']; ?> Dashboard, Los pipoquitas</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-flex">
                        <div class="card flex-fill border-0">
                            <div class="card-body py-4">
                                <div class="d-flex align-items-start">
                                    <div class="flex-grow-1">
                                        <h4 class="mb-2">
                                            BOB 9800.00
                                        </h4>
                                        <p class="mb-2">
                                            Total Ingresos
                                        </p>
                                        <div class="mb-0">
                                            <span class="badge text-success me-2">
                                                +9.0%
                                            </span>
                                            <span class="text-muted">
                                                Que el mes anterior
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <?php include('footer.php') ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>

</html>