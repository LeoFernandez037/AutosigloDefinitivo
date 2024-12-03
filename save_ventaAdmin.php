<?php
include("conexion.php");

if (isset($_POST['clienteId']) && isset($_POST['productoId'])) {
    $id = $_GET['id'];
    $idCliente = $_POST['clienteId'];
    $idProducto = $_POST['productoId'];
    $apellido = "SELECT * FROM persona WHERE ID_PERSONA = $idCliente";
    $apellidoCON = mysqli_query($conn, $apellido);
    $apellidoSAS = mysqli_fetch_array($apellidoCON);
    $apellidoWA = $apellidoSAS['AP_PATERNO'];
    $queryRecibo = "INSERT INTO recibo(RAZON_SOCIAL, ID_PERSONA) VALUES ('$apellidoWA', '$idCliente')";
    $result1 = mysqli_query($conn, $queryRecibo);
    if (!$result1) {
        die("Query Erroneo");
    }
    $idRecibo = "SELECT * FROM recibo WHERE ID_PERSONA = '$idCliente' ORDER BY ID_RECIBO DESC LIMIT 1";
    $idReciboCON = mysqli_query($conn, $idRecibo);
    $idReciboSAS = mysqli_fetch_array($idReciboCON);
    $idReciboWA = $idReciboSAS['ID_RECIBO'];
    $precio = "SELECT * FROM auto WHERE ID_AUTO='$idProducto'";
    $precioCON = mysqli_query($conn, $precio);
    $precioSAS = mysqli_fetch_array($precioCON);
    $precioWA = $precioSAS['PRECIO'];
    $queryVenta = "INSERT INTO venta(ID_RECIBO, FECHA_VENTA, CANTIDAD, MONTO_UNIDAD, MONTO_TOTAL, ID_TIPO_PAGO, ID_UNIDAD_MONEDA) VALUES ('$idReciboWA', NOW(), 1, '$precioWA', '$precioWA', 4, 8)";
    $result2 = mysqli_query($conn, $queryVenta);
    if (!$result1) {
        die("Query Erroneo");
    }
    $_SESSION['message'] = 'Venta guardada con exito!!';
    $_SESSION['message_type'] = 'success';
    header("Location: nuevaVentaAdmin.php?id=" . urlencode($id));
}
?>