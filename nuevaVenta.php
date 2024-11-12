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
    <link rel="stylesheet" href="style.css">
    <title>Venta</title>
</head>

<body>
    <!-- <?php  
        //$query = "SELECT * FROM empleados WHERE id_empleado = 1";
        //$result = mysqli_query($conn, $query);
        //$row = $result->fetch_assoc();
        //echo $row['nombre'];
    ?> -->
    <?php
         $id = $_GET['id'];
    ?>
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <h2>Nueva Venta</h2>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                    <img src=  <?php $query = "SELECT * FROM usuario WHERE ID_PERSONA = $id";
            $result = mysqli_query($conn, $query);
            $row = $result->fetch_assoc();
            echo $row['FOTO'];?>
                                    class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Cerrar sesion</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container">
            <form action="save_venta.php?id=<?php echo $id?>" method="POST">
                <div class="form-group">
                    <input type="text" name="tittle" class="form-control"
                    placeholder="Ingresa Persona" autofocus>
                </div>
                <div class="form-group">
                    <textarea name="description" rows="2" class="form-control"
                    placeholder="Ingresa la razon social"></textarea>
                </div>
                <input type="submit" class="btn btn-success btn-block" name="save-task" value="Guardar Venta">
            </form>
            </div>  
           
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>

</html>