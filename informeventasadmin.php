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
                <h2>Informe Ventas</h2>
                <a href="fpdf/PruebaVENTAS.php?id=<?php echo $id?>" target="_blank" class="btn btn-primary" style="margin-left: 20px;">Generar Informe </a>

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
                                <a href="#" class="dropdown-item">Cerrar sesión</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="col-md-8" id = "printableArea">
                <table id = "tablainforme" class="display">
                    <thead>
                        <th style="background-color: #b71c1c; color:white;">Fecha</th>
                        <th style="background-color: #b71c1c; color:white;">Cantidad</th>
                        <th style="background-color: #b71c1c; color:white;">Monto</th>
                        <th style="background-color: #b71c1c; color:white;">Ap. Paterno</th>
                        <th style="background-color: #b71c1c; color:white;">Ap. Materno</th>
                        <th style="background-color: #b71c1c; color:white;">Nombres</th>
                        <th style="background-color: #b71c1c; color:white;">CI</th>
                    </thead>
                    <tbody>
                        <?php  
                            $query = "SELECT * FROM venta JOIN recibo JOIN persona WHERE venta.ID_RECIBO = recibo.ID_RECIBO AND recibo.ID_PERSONA = persona.ID_PERSONA;";
                            $result_tasks = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($result_tasks)) { ?>
                                <tr>
                                    <td><?php echo $row['FECHA_VENTA']; ?></td>
                                    <td><?php echo $row['CANTIDAD']; ?></td>
                                    <td><?php echo $row['MONTO_TOTAL']; ?></td>
                                    <td><?php echo $row['AP_PATERNO']; ?></td>
                                    <td><?php echo $row['AP_MATERNO']; ?></td>
                                    <td><?php echo $row['NOMBRES']; ?></td>
                                    <td><?php echo $row['CI']; ?></td>
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
        $('#tablainforme').DataTable({
            "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
});
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>