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
        <div class="main" id= "main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <h2>Editar Autos</h2>
                <!-- <a class="modal_close" href="">&times;</a> -->
                <a href="autosadmin.php?id=<?php echo $id?>" class="btn btn-success btn-sm" style = "margin-left:10px;">Refrescar Tabla</a>
                <a href="#" class="btn btn-success btn-sm" style = "margin-left:10px;">Exportar hoja de calculo</a>
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
                <table id="empleadostableadmin" class="display">
                    <thead>
                        <th style="background-color: #b71c1c; color:white;" >Nombre</th>
                        <th style="background-color: #b71c1c; color:white;" >Precio</th>
                        <th style="background-color: #b71c1c; color:white;" >Numero de chasis</th>
                        <th style="background-color: #b71c1c; color:white;" >Traccion</th>
                        <th style="background-color: #b71c1c; color:white;" >Accion</th>
                    </thead>
                    <tbody>
                        <?php  
                            $query = "SELECT * FROM auto";
                            $result_tasks = mysqli_query($conn, $query);

                            while($row = mysqli_fetch_array($result_tasks)) { ?>
                                <tr>
                                    <td><?php echo $row['NOMBRE']; ?></td>
                                    <td><?php echo $row['PRECIO']; ?></td>
                                    <td><?php echo $row['NUMERO_CHASIS']; ?></td>
                                    <td><?php echo $row['TRACCION']; ?></td>
                                    <td>
                                        <a href="autosadminedit.php?id=<?php echo $id?>&id_auto=<?php echo $row['ID_AUTO']?> " class="btn btn-primary btn-sm">Editar</a>
                                    </td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <?php include('footer2.php') ?>
        </div>
    
    </div>  
   
    <!-- > codigo para scripts-->                           
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="assets/js/addAuto.js"></script>                            
    <script src="assets/js/detallesAuto.js"></script>                            

    <!-- > codigo para datatable-->
    
    <script src = "https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script>
        // new DataTable('#example');
        $(document).ready(function() {
        $('#empleadostableadmin').DataTable({
            "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
});
    </script>

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
    <?php
    include("db.php");

    if (isset($_GET['id']) AND isset($_GET['id_auto'])) {

        $id = $_GET['id'];
        $id_auto = $_GET['id_auto'];
        $query = "SELECT * FROM caracteristicas JOIN auto JOIN foto_auto WHERE foto_auto.ID_AUTO = auto.ID_CARACTERISTICA AND auto.ID_CARACTERISTICA = caracteristicas.ID_CARACTERISTICA AND auto.ID_AUTO = $id_auto";
        $resultado = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result); 
        }
    }

    if(isset($_POST['update'])){
        $id = $_GET['id'];
        $id_auto = $_GET['id_auto'];
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $numerocha = $_POST['numerocha'];
        $traccion = $_POST['traccion'];
        $caracteristica = $_POST['caracteristica'];

        $imagenurl = $_POST['imagenurl'];

        $transmision = $_POST['transmision'];
        $suspensiondel = $_POST['suspensiondel'];
        $suspensiontras = $_POST['suspensiontras'];
        $frenosdel = $_POST['frenosdel'];
        $frenostras = $_POST['frenostras'];

        $query0 = "UPDATE auto set NOMBRE = '$nombre', PRECIO = '$precio', NUMERO_CHASIS = '$numerocha', TRACCION = '$traccion' WHERE ID_AUTO = '$id_auto'";
        $query1 = "UPDATE caracteristicas set TRANSMISION = '$transmision', SUSPENSION_DELANTERA = '$suspensiondel', SUSPENSION_TRASERA = '$suspensiondeltras', FRENOS_DELANTEROS = '$frenosdel', FRENOS_TRASEROS = '$frenostras' WHERE id = '$id'";
        $query2 = "UPDATE auto set nombre = '$tittle', description = '$description' WHERE id = '$id'";
        mysqli_query($conn,$query0);
        mysqli_query($conn,$query1);
        mysqli_query($conn,$query2);
        header("Location: index.php");
    }
?>

    <div id="agregarAuto" class="modal2"> 
        <div class="modal-content">
            <div class="login-box">
            <div class="close-btn">
                <a class="modal_close" href="autosadminedit.php?id=<?php echo $id?>">X;</a>
            </div>
            <h2>Agregar Auto</h2>
            <form action="autosedit.php?id=<?php echo $id?>&id_auto=<?php echo $id_auto?>" method="POST" enctype="multipart/form-data">
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
</body>
</html>
