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
    <link rel="stylesheet" type = "text/css" href="dataTables/datatables.min.css" >
    <link rel="stylesheet" href="style.css">
    <title>Autos</title>
</head>
<?php
         $id = $_GET['id'];
    ?>
<body>
    <!-- <?php  
        //$query = "SELECT * FROM empleados WHERE id_empleado = 1";
        //$result = mysqli_query($conn, $query);
        //$row = $result->fetch_assoc();
        //echo $row['nombre'];
    ?> -->
    <div class="wrapper">
        <?php include 'sidebar.php'; ?>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <h2>Autos</h2>
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
            <div class="col-md-8">
                <table id="autostable" class="display">
                    <thead>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Numero Chasis</th>
                        <th>Traccion</th>
                    </thead>
                    <tbody>
                        <?php  
                            $query = "SELECT * FROM auto";
                            $result_tasks = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($result_tasks)){?>
                                <tr>
                                    <td>
                                        <?php echo $row['NOMBRE'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['PRECIO'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['NUMERO_CHASIS'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['TRACCION'] ?>      
                                    </td>
                                </tr>
                            <?php } ?>
                    </tbody>
                </table>
            </div> 
            <?php include('footer2.php') ?>
        </div>
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src = "https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script>
        // new DataTable('#example');
        $(document).ready(function() {
        $('#example').DataTable({
            "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
});
    </script>
</body>
</html>