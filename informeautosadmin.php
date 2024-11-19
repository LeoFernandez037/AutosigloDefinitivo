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
        <?php include 'sidebaradmin.php'; ?>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <h2>Informe Autos</h2>
                <button class="boton-imprimir" onclick="printDiv('printableArea')">Imprimir Informe</button>
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
            <div class="col-md-8"  id = "printableArea">
                    <table class="table table-bordered">
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
        <script> function printDiv(divId) { var content = document.getElementById(divId).innerHTML; var myWindow = window.open('', '', 'width=800,height=600'); myWindow.document.write('<html><head><title>Print</title>'); myWindow.document.write('</head><body>'); myWindow.document.write(content); myWindow.document.write('</body></html>'); myWindow.document.close(); myWindow.print(); } </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
</body>

</html>