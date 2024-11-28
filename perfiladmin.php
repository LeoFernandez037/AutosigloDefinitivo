<?php include("conexion.php")?>
<?php
        if(isset($_GET['id'])) {    
        $id = $_GET['id'];
        $query = "SELECT * FROM persona WHERE ID_PERSONA = '$id'"; 
        $result = mysqli_query($conn, $query); 
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result); 
            $NOMBRES = $row['NOMBRES'];
            $AP_PATERNO = $row['AP_PATERNO'];
            $AP_MATERNO = $row['AP_MATERNO'];
            $CORREO_ELECTRONICO = $row['CORREO_ELECTRONICO'];
            $TELEFONO = $row['TELEFONO'];
        }
    }

    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $NOMBRES = $_POST['NOMBRES'];
        $AP_PATERNO = $_POST['AP_PATERNO'];
        $AP_MATERNO = $_POST['AP_MATERNO'];
        $CORREO_ELECTRONICO = $_POST['CORREO_ELECTRONICO'];
        $TELEFONO = $_POST['TELEFONO'];
        $query = "UPDATE persona set NOMBRES = '$NOMBRES', AP_PATERNO = '$AP_PATERNO',AP_MATERNO = '$AP_MATERNO', CORREO_ELECTRONICO = '$CORREO_ELECTRONICO', TELEFONO = '$TELEFONO' WHERE ID_PERSONA = '$id'";
        mysqli_query($conn,$query);
    }
?>


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
    <title>Personal Page</title>
</head>

<body>
    <!-- <?php  
        // $query = "SELECT * FROM empleados WHERE id_empleado = 1";
        // $result = mysqli_query($conn, $query);
        // $row = $result->fetch_assoc();
        // echo $row['nombre'];
    ?> -->
    <div class="wrapper">
        <?php include 'sidebaradmin.php'; ?>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <h2>Perfil</h2>
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
                                <a href="index.php" class="dropdown-item">Cerrar sesion</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="profile">
                <div class="tarjetaprofile">
                    <img src=  <?php $query = "SELECT * FROM usuario WHERE ID_PERSONA = $id";
                                    $result = mysqli_query($conn, $query);
                                    $row = $result->fetch_assoc();
                                    echo $row['FOTO'];?>
                        class="img_prev" alt="no hay imagen">
                    <form class="formprof" action="perfil.php?id=<?php echo $_GET['id']; ?>" method="POST">            
                        <div class="contlabel">
                        <h4>Nombre</h4>
                        <div class="form-group">
                            <input type="text" name="NOMBRES" value="<?php echo $NOMBRES; ?>"class="form-control" placeholder="Actualiza tu nombre">
                        </div>
                        </div>
                        <div class="contlabel">
                        <h4>Apellido Paterno</h4>
                        <div class="form-group">
                            <input type="text" name="AP_PATERNO" value="<?php echo $AP_PATERNO; ?>"class="form-control" placeholder="Actualiza tu Apellido Paterno">
                        </div>
                        </div>
                        <div class="contlabel">
                        <h4>Apellido Materno</h4>
                        <div class="form-group">
                            <input type="text" name="AP_MATERNO" value="<?php echo $AP_MATERNO; ?>"class="form-control" placeholder="Actualiza tu Apellido Materno">
                        </div>
                        </div>
                        <div class="contlabel">
                        <h4>Correo Electronico</h4>
                        <div class="form-group">
                            <input type="text" name="CORREO_ELECTRONICO" value="<?php echo $CORREO_ELECTRONICO; ?>"class="form-control" placeholder="Actualiza tu Correo">
                        </div>
                        </div>
                        <div class="contlabel">
                        <h4>Telefono</h4>
                        <div class="form-group">
                            <input type="text" name="TELEFONO" value="<?php echo $TELEFONO; ?>"class="form-control" placeholder="Actualiza tu Telefono">
                        </div>
                        </div>
                        &nbsp;
                        <button class="btn btn-primary btn-sm" name="update">
                            ACTUALIZAR
                        </button>
                    </form>
                </div>  
            </div>
            <?php include('footer2.php') ?>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>

</html>