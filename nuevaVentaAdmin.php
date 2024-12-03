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
        <?php include 'sidebaradmin.php'; ?>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <h2>Nueva Venta</h2>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                    <h3>Administrador    <?php $query = "SELECT * FROM persona WHERE ID_PERSONA = $id";
                        $result = mysqli_query($conn, $query);
                        $row = $result->fetch_assoc();
                        echo $row['NOMBRES']; ?></h3>
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                    <img src=  <?php $query = "SELECT * FROM usuario WHERE ID_PERSONA = $id";
                                    $result = mysqli_query($conn, $query);
                                    $row = $result->fetch_assoc();
                                    echo $row['FOTO'];?> class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="index.php" class="dropdown-item">Cerrar sesion</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container_venta">
            <form id="seleccionForm" action="save_ventaAdmin.php?id=<?php echo $id ?>" method="POST">
                    <input type="hidden" id="clienteId" name="clienteId" value="">
                    <input type="hidden" id="productoId" name="productoId" value="">
                    <div class="objcont">
                        <h2>Clientes</h2>
                        <div class="search-container">
                            <label for="buscarCliente">Buscar cliente:</label>
                            <input type="text" id="buscarCliente" class="search-input"
                                placeholder="Nombre o email del cliente" onkeyup="buscarClientes()">
                        </div>
                        &nbsp
                        <div class="scrolltable" style="width: 600px; height: 586px; overflow-y: auto;">
                            <table id="clientesTable" class="table table-striped">
                                <tr>
                                    <th style="background-color: #b71c1c; color:white;" >Nombre</th>
                                    <th style="background-color: #b71c1c; color:white;" >Email</th>
                                    <th style="background-color: #b71c1c; color:white;" >Carnet de Identidad</th>
                                </tr>
                                <?php
                                $query_cliente = "SELECT * FROM persona";
                                $resultado_cliente = mysqli_query($conn, $query_cliente);
                                while ($cliente = mysqli_fetch_array($resultado_cliente)) {
                                    echo "<tr onclick='selectCliente(this)' data-id='{$cliente['ID_PERSONA']}'>";
                                    echo "<td>{$cliente['NOMBRES']} {$cliente['AP_PATERNO']} {$cliente['AP_MATERNO']}</td>";
                                    echo "<td>{$cliente['CORREO_ELECTRONICO']}</td>";
                                    echo "<td>{$cliente['CI']}</td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                    <div class="objcont">
                    <h2>Vehículos</h2>
                    <div class="search-container">
                        <label for="buscarProducto">Buscar vehículos:</label>
                        <input type="text" id="buscarProducto" class="search-input"
                            placeholder="Nombre o chasis del vehículo" onkeyup="buscarProductos()">
                    </div>
                    &nbsp
                    <div class="scrolltable" style="width: 450px; height: 586px; overflow-y: auto;">
                        <table id="productosTable" class="table table-striped">
                            <tr>
                                <th style="background-color: #b71c1c; color:white;"  >Nombre</th>
                                <th style="background-color: #b71c1c; color:white;"  >Precio</th>
                                <th style="background-color: #b71c1c; color:white;"  >Número de Chasis</th>
                            </tr>
                            <?php
                            $query_producto = "SELECT * FROM auto";
                            $resultado_producto = mysqli_query($conn, $query_producto);
                            while ($producto = mysqli_fetch_array($resultado_producto)) {
                                echo "<tr onclick='selectProducto(this)' data-id='{$producto['ID_AUTO']}'>";
                                echo "<td>{$producto['NOMBRE']}</td>";
                                echo "<td>{$producto['PRECIO']}\$</td>";
                                echo "<td>{$producto['NUMERO_CHASIS']}</td>";
                                echo "</tr>";
                            }
                            ?>
                        </table>
                    </div>    
                </div>
                    <div id="seleccion">
                        
                        <h2>Comprando:</h2>
                        <p>Cliente: <span id="clienteSeleccionado">Ninguno</span></p>
                        <p>Auto: <span id="productoSeleccionado">Ninguno</span></p>
                        <p>Precio: <span id="precioSeleccionado">Ninguno</span></p>
                        <button type="submit" id="enviarSeleccion" class = "btn btn-primary btn-sm" disabled>Enviar Selección</button>
                    </div>
                   

                </form>
            </div>  
            <?php include('footer2.php') ?>
        </div>
    </div>        

    <script src = "https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <!-- <script>
        // new DataTable('#example');
        $(document).ready(function() {
        $('#productosTable').DataTable({
            "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });

    </script> -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
            <script>
                function selectCliente(row) {
                    document.querySelectorAll('#clientesTable tbody tr').forEach(r => r.classList.remove('selected'));
                    row.classList.add('selected');
                    document.getElementById('clienteSeleccionado').textContent = row.children[0].textContent;
                    document.getElementById('clienteId').value = row.getAttribute('data-id');
                    checkSeleccion();
                }

                function selectProducto(row) {
                    document.querySelectorAll('#productosTable tbody tr').forEach(r => r.classList.remove('selected'));
                    row.classList.add('selected');
                    document.getElementById('productoSeleccionado').textContent = row.children[0].textContent;
                    document.getElementById('precioSeleccionado').textContent = row.children[1].textContent;
                    document.getElementById('productoId').value = row.getAttribute('data-id');
                    checkSeleccion();
                }

                function checkSeleccion() {
                    const clienteId = document.getElementById('clienteId').value;
                    const productoId = document.getElementById('productoId').value;
                    document.getElementById('enviarSeleccion').disabled = !(clienteId && productoId);
                }

                function buscarClientes() {
                    const input = document.getElementById('buscarCliente');
                    const filter = input.value.toUpperCase();
                    const table = document.getElementById('clientesTable');
                    const tr = table.getElementsByTagName('tr');

                    for (let i = 1; i < tr.length; i++) {
                        const tdNombre = tr[i].getElementsByTagName('td')[0];
                        const tdEmail = tr[i].getElementsByTagName('td')[1];
                        const tdCI = tr[i].getElementsByTagName('td')[2];
                        if (tdNombre && tdEmail && tdCI) {
                            const txtNombre = tdNombre.textContent || tdNombre.innerText;
                            const txtEmail = tdEmail.textContent || tdEmail.innerText;
                            const txtCI = tdCI.textContent || tdCI.innerText;
                            if (txtNombre.toUpperCase().indexOf(filter) > -1 || txtEmail.toUpperCase().indexOf(filter) > -1 || txtCI.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = '';
                            } else {
                                tr[i].style.display = 'none';
                            }
                        }
                    }
                }

                function buscarProductos() {
                    const input = document.getElementById('buscarProducto');
                    const filter = input.value.toUpperCase();
                    const table = document.getElementById('productosTable');
                    const tr = table.getElementsByTagName('tr');

                    for (let i = 1; i < tr.length; i++) {
                        const tdNombre = tr[i].getElementsByTagName('td')[0];
                        const tdPrecio = tr[i].getElementsByTagName('td')[1];
                        const tdChasis = tr[i].getElementsByTagName('td')[2];
                        if (tdNombre && tdPrecio && tdChasis) {
                            const txtNombre = tdNombre.textContent || tdNombre.innerText;
                            const txtPrecio = tdPrecio.textContent || tdPrecio.innerText;
                            const txtChasis = tdChasis.textContent || tdChasis.innerText;
                            if (txtNombre.toUpperCase().indexOf(filter) > -1 || txtPrecio.toUpperCase().indexOf(filter) > -1 || txtChasis.toUpperCase().indexOf(filter) > -1) {
                                tr[i].style.display = '';
                            } else {
                                tr[i].style.display = 'none';
                            }
                        }
                    }
                }
            </script>
</body>

</html>