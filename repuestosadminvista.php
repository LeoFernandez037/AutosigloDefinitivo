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
    <link rel="stylesheet" href="./cssPrincipal/cotizacion.css">
    
    <title>Clientes</title>
</head>

<body>
<?php
        $id = $_GET['id'];

        //$id = 3; //valor enviado del login cambiandolo se mueve el usuario
    ?>
    <div class="wrapper">
        <?php include 'sidebaradmin.php'; ?>
        <div class="main" id= "main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <h2>Listado de Repuestos </h2>
                <a href="#agregarAuto" class="btn btn-primary btn-sm" style = "margin-left:10px;">Agregar auto +</a>
                <!-- <a class="modal_close" href="">&times;</a> -->
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
                                    $query = "SELECT * FROM usuario WHERE ID_PERSONA=$id";
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
            <table id="repuestostableadmin" class="display">
                        <thead>
                            <th style="background-color: #b71c1c; color:white;" >Descripcion</th>
                            <th style="background-color: #b71c1c; color:white;" >Precio</th>
                            <th style="background-color: #b71c1c; color:white;" >Marca</th>
                            <th style="background-color: #b71c1c; color:white;" >Accion</th>
                        </thead>
                        <tbody>
                            <?php  
                                $query = "SELECT * FROM repuesto JOIN sub_parametricas_producto WHERE ID_MARCA = ID_SUB;";

                                $result_tasks = mysqli_query($conn, $query);

                                while($row = mysqli_fetch_array($result_tasks)){?>
                                    <tr>
                                        <td>
                                            <?php echo $row['DESCRIPCION'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['PRECIO'] ?>
                                        </td>
                                        <td>
                                            <?php echo $row['DECRIPCION'] ?>
                                        </td>
                                        <td>
                                        <a href="repuestosadminvista.php?id=<?php echo $id?>&id_repuesto=<?php echo $row['ID_REPUESTO']?> " class="btn btn-primary btn-sm">Ver más detalles</a>
                                        </td>
                                        
                                    </tr>
                                <?php } ?>
                        </tbody>
                    </table>
            </div>
            <?php include('footer2.php') ?>
        </div>
    
    </div>  
   

   
    <script src = "https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script>
        // new DataTable('#example');
        $(document).ready(function() {
        $('#repuestostableadmin').DataTable({
            "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
});
    </script>

    <!-- > codigo para scripts-->                           
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="assets/js/addAuto.js"></script>                            
    <script src="assets/js/detallesAuto.js"></script>                            

    <!-- > codigo para datatable-->
 

<!--     
    <div id="verdata" class="modal"> 
        <div class="modal-content">
            <div class="close-btn">
                <a class="modal_close" href="">&times;</a>
            </div>
            <h2>Ver usuario</h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, dolor id, et deleniti incidunt, aspernatur voluptatibus quae nostrum doloremque quam accusantium debitis. Eligendi amet quos reiciendis unde. Sunt, tenetur fuga.</p>
        </div>
    </div> -->

    <div id="agregarRepuesto" class="modal2"> 
        <div class="modal-content">
            <div class="login-box">
                <div class="close-btn">
                    <a class="modal_close" href="repuestosadmin.php?id=<?php echo $id?>">X</a>
                </div>
                <?php include('db.php');
                        if (isset($_GET['id_repuesto'])) {
                        $id_repuesto = $_GET['id_repuesto'];
                        $query = "SELECT * FROM repuesto JOIN sub_parametricas_producto JOIN foto_repuestos WHERE repuesto.ID_MARCA = sub_parametricas_producto.ID_SUB AND repuesto.ID_REPUESTO = foto_repuestos.ID_REPUESTO AND repuesto.ID_REPUESTO = $id_repuesto";
                        $resultado = mysqli_query($conn, $query);
                        $row = mysqli_fetch_array($resultado);
                };
                ?>
                <div class="car-details2">
                    <div class="car-image">
                        <img src="<?php echo $row['FOTOGRAFIA']; ?>" alt="<?php echo $row['DESCRIPCION']; ?>">
                    </div>
                    <div class="car-info2">
                        <h2><?php echo $row['DESCRIPCION']; ?></h2>
                        <p><strong>Precio:</strong> $<?php echo $row['PRECIO']; ?></p>
                        <div class="car-specs">
                            <div class="data">
                                <div class="spec">
                                    <div class="spec-value"><?php echo $row['DECRIPCION']; ?></div>
                                    <div class="spec-label">Marca</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>    
        </div>
    </div>
</body>
</html>
