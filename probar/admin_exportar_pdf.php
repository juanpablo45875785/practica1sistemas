<?php
require('fpdf/fpdf.php');
include "conexion.php";

$sql ="SELECT *FROM tbl_contacto";
$query=mysqli_query($conexion,$sql);

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      //include '../../recursos/Recurso_conexion_bd.php';//llamamos a la conexion BD

      //$consulta_info = $conexion->query(" select *from hotel ");//traemos datos de la empresa desde BD
      //$dato_info = $consulta_info->fetch_object();
     
      $this->SetFont('Arial', 'B', 20); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(80); // Movernos a la derecha
      $this->SetTextColor(0, 0, 0); //color
      //creamos una celda o fila
      $this->Cell(130, 10, utf8_decode('USUARIOS REGISTRADOS DE LA TABLA'), 0, 1, 'C', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)
      $this->Ln(10); // Salto de línea
      $this->SetTextColor(103); //color

      
      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(228, 100, 0); //colorFondo
      $this->SetTextColor(255, 255, 255); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 10);
      $this->Cell(10, 10, utf8_decode('ID'), 1, 0, 'C', 1);
      $this->Cell(45, 10, utf8_decode('Nombre'), 1, 0, 'C', 1);
      $this->Cell(35, 10, utf8_decode('Apellido'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('Carrera_1'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('Carrera_2'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('Telefono_1'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('Telefono_2'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('Propietario'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('Origen'), 1, 0, 'C', 1);
      $this->Cell(22, 10, utf8_decode('Cod_Estado'), 1, 0, 'C', 1);
      $this->Cell(23, 10, utf8_decode('Descripcion'), 1, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('Estado'), 1, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('pagina ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, cursiva, tamañoTexto
      $hoy = date('d/m/Y');
      $this->Cell(540, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

//include '../../recursos/Recurso_conexion_bd.php';
//require '../../funciones/CortarCadena.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */
//$consulta_info = $conexion->query(" select *from hotel ");
//$dato_info = $consulta_info->fetch_object();

$pdf = new PDF();
$pdf->AddPage("landscape"); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas
$pdf->SetFont('Arial', '', 10);
$pdf->SetDrawColor(163, 163, 163); //colorBorde

/*$consulta_reporte_alquiler = $conexion->query("  ");*/

/*while ($datos_reporte = $consulta_reporte_alquiler->fetch_object()) {      
   }*/

/* TABLA */
while ($row = mysqli_fetch_assoc($query)){
    $pdf->Cell(10,10,$row['id_contacto'],1,0,'C',0);
    $pdf->Cell(45,10,$row['nombre_cont'],1,0,'C',0);
    $pdf->Cell(35,10,$row['apellido_cont'],1,0,'C',0);
    $pdf->Cell(20,10,$row['cod_car_1'],1,0,'C',0);
    $pdf->Cell(20,10,$row['cod_car_2'],1,0,'C',0);
    $pdf->Cell(20,10,$row['telefono_1'],1,0,'C',0);
    $pdf->Cell(20,10,$row['telefono_2'],1,0,'C',0);
    $pdf->Cell(20,10,$row['propietario_cont'],1,0,'C',0);
    $pdf->Cell(20,10,$row['cod_origen_dato'],1,0,'C',0);
    $pdf->Cell(22,10,$row['cod_estado_cont'],1,0,'C',0);
    $pdf->Cell(23,10,$row['descripcion_cont'],1,0,'C',0);
    $pdf->Cell(20,10,$row['estado_cont'],1,1,'C',0);
}

$pdf->Output('Prueba.pdf', 'I');//nombreDescarga, Visor(I->visualizar - D->descargar)