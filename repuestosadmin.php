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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="style.css">

    <script src="https://unpkg.com/xlsx@latest/dist/xlsx.full.min.js"></script>
    <script src="https://unpkg.com/file-saverjs@latest/FileSaver.min.js"></script>
    <script src="https://unpkg.com/tableexport@latest/dist/js/tableexport.min.js"></script>

    <title>Repuestos</title>
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
                <h2>Listado de Repuestos</h2>
                <!-- <a href="#agregarRepuesto" class="btn btn-primary btn-sm" style = "margin-left:10px;">Agregar repuesto +</a> -->
                <a href="repuestosadmin.php?id=<?php echo $id?>" class="btn btn-success btn-sm" style = "margin-left:10px;">Refrescar Tabla</a>
                <button id="btnExportar" style = "margin-left:10px;" class="btn btn-success btn-sm">
                <i class="fas fa-file-excel"></i> Exportar datos a Excel
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <h3>Administrador    <?php $query = "SELECT * FROM persona WHERE ID_PERSONA = $id";
                        $result = mysqli_query($conn, $query);
                        $row = $result->fetch_assoc();
                        echo $row['NOMBRES']; ?></h3>
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src= "<?php 
                                    $query = "SELECT * FROM usuario WHERE ID_PERSONA = $id";
                                    $result = mysqli_query($conn, $query);
                                    $row = $result->fetch_assoc();
                                    echo $row['FOTO'];
                                ?>" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="index.php" class="dropdown-item">Cerrar sesion</a>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

            <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
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

<div id="agregarRepuesto" class="modal"> 
        <div class="modal-content">
            <div class="login-box">
            <div class="close-btn">
                <a class="modal_close" href="">&times;</a>
            </div>
            <h2>Agregar Repuesto</h2>
            <form action="RegistroAuto.php" method="POST" enctype="multipart/form-data">
                <input style= "visibility:hidden;" type="text" id="id" name="id" value = "<?php echo $id?>">
                <div class="form-container">
                    <div class="left-column">
                       
                        <label for="nombre">Nombre:</label>
                        <input type="text" id="nombre" name="nombre" placeholder="vitara" required>
                        <label for="precio">Precio:</label>
                        <input type="text" id="precio" name="precio" placeholder="En dolares" required>
                        <label for="numerocha">Numero de chasis:</label>
                        <input type="text" id="numerocha" name="numerocha" placeholder="1HGBH41JXMN109087" required>
                        <label for="traccion">Traccion:</label>
                        <input type="text" id="traccion" name="traccion" placeholder="4x2" required>
                        <label for="traccion">Imagen en formato url:</label>
                        <input type="text" id="imagenurl" name="imagenurl" placeholder="https://cdn-dyn.a" required>
                    </div>
                    <div class="right-column">
                        <label for="transmision">Transmision:</label>
                        <input type="text" id="transmision" name="transmision" placeholder="Manual 5 Velocidades" required>
                        <label for="suspensiondel">Suspension Delantera:</label>
                        <input type="text" id="suspensiondel" name="suspensiondel" placeholder="Eje Rígido" required>
                        <label for="suspensiontras">Suspension Trasera:</label>
                        <input type="text" id="suspensiontras" name="suspensiontras" placeholder="Eje Rígido" required>
                        <label for="text">Frenos Delanteros:</label>
                        <input type="text" id="frenosdel" name="frenosdel" placeholder="Discos Ventilados" required>
                        <label for="text">Frenos Traseros:</label>
                        <input type="text" id="frenostras" name="frenostras" placeholder="Tambores" required>
                    </div>
                </div>
                <button type="submit" >Registrar</button>
            </form>
            </div>
            
        </div>
    </div>

    <script>
        //bajo el formato ISO 8601 EJ 20201006-103045 
        document.addEventListener('DOMContentLoaded', function(){
            const $btnExportar = document.querySelector("#btnExportar"),
            $tabla = document.querySelector("#repuestostableadmin");
            var currentdate = new Date().toISOString();
            console.log(currentdate);
            let tableExport = new TableExport($tabla, {
                exportButtons: false,
                filename: "DatosRepuestos"+ currentdate ,
                sheetname: "Tabla",
            });

            $btnExportar.addEventListener("click", function(){
                let datos = tableExport.getExportData();
                let pref = datos.repuestostableadmin.xlsx;
                tableExport.export2file(
                    pref.data,
                    pref.mimeType,
                    pref.filename,
                    pref.fileExtension,
                    pref.merges,
                    pref.RTL,
                    pref.sheetname
                );
            });
        });
    </script>

</body>

</html>