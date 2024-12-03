<?php

require('./fpdf.php');
$id = $_GET['id'];
require('../conexion.php');
$nombre = "SELECT * FROM persona WHERE ID_PERSONA = $id";
      $nombre2 = mysqli_query($conn, $nombre);
      $eto = $nombre2->fetch_assoc();

$var1 = 'Informe generado por:';
$nombreposi = $var1 . $eto['NOMBRES'];      

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      //include '../../recursos/Recurso_conexion_bd.php';//llamamos a la conexion BD

      //$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
      //$dato_info = $consulta_info->fetch_object();
      $this->Image('..\imagenes\logo.png', 10, 5, 50); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->Image('..\imagenes\LogoGesimasHD.png', 160, 5, 45); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->Ln(7);
      $this->Ln(7);
      $this->SetFont('Arial', 'B', 19); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(45); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('Importadora Autosiglo'), 0, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(3); // Salto de línea
      $this->SetTextColor(103); //color

      $this->Cell(5);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode('Informe generado por: Galia Alisson '), 0, 0, '', 0);
      $this->Ln(5);

      /* UBICACION */
      $this->Cell(5);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(96, 10, utf8_decode("Ubicación : Av. Revolución 1234 y Col. Moderna, Ciudad de La Paz, Bolivia"), 0, 0, '', 0);
      $this->Ln(5);

      /* TELEFONO */
      $this->Cell(5);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(59, 10, utf8_decode("Teléfono : +591 72345678"), 0, 0, '', 0);
      $this->Ln(5);

      /* COREEO */
      $this->Cell(5);  // mover a la derecha
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(85, 10, utf8_decode("Correo : info@autosiglo.com"), 0, 0, '', 0);
      $this->Ln(5);
      $this->Ln(7);
      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(255,0,0);
      $this->Cell(50); // mover a la derecha
      $this->SetFont('Arial', 'B', 15);
      $this->Cell(100, 10, utf8_decode("INFORME DE CLIENTES "), 0, 1, 'C', 0);
      $this->Ln(7);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(255,0,0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 11);
      $this->Cell(30, 10, utf8_decode('CI'), 1, 0, 'C', 1);
      $this->Cell(30, 10, utf8_decode('AP_PATERNO'), 1, 0, 'C', 1);
      $this->Cell(38, 10, utf8_decode('NOMBRE'), 1, 0, 'C', 1);
      $this->Cell(25, 10, utf8_decode('TELEFONO'), 1, 0, 'C', 1);
      $this->Cell(70, 10, utf8_decode('EMAIL'), 1, 1, 'C', 1);
   }


   // Pie de página
   function Footer()
   {
      $this->SetY(-35); // Posición: a 1,5 cm del final  
      $this->SetFont('Arial', 'I', 12); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(185, 10, utf8_decode('--------------------                        ----------------------'), 0, 1, 'C', 0);
      $this->Cell(185, 5, utf8_decode('Firma Administrador                        Firma Encargado'), 0, 1, 'C', 0);
      $this->SetY(-15); // Posición: a 1,5 cm del final  
      $this->SetFont('Arial', 'I', 12); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 12); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

require("dbcon.php"); 
$sql_clientes = ("SELECT * FROM `persona` JOIN `usuario` WHERE persona.ID_PERSONA = usuario.ID_PERSONA AND ID_ROL = 1;");
$resultado = $mysqli->query($sql_clientes);

$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

/*$consulta_reporte_alquiler = $conexion->query("  ");*/

while($row = $resultado -> fetch_assoc()){
   $pdf->Cell(30, 10, $row['CI'], 1, 0, 'C', 0);
   $pdf->Cell(30, 10, $row['AP_PATERNO'], 1, 0, 'C', 0);
   $pdf->Cell(38 , 10, $row['NOMBRES'], 1, 0, 'C', 0);
   $pdf->Cell(25, 10, $row['TELEFONO'], 1, 0, 'C', 0);
   $pdf->Cell(70, 10, $row['CORREO_ELECTRONICO'], 1, 1, 'C', 0);
}


$pdf->Output('InformeClientes.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)\

?>