<?php

//Necesario el wp-load.php para usar wordpress como funciones, sesiones y demas
require('../wp-load.php');
global $current_user;
       
      // Obtenemos la informacion del usuario conectado y asignamos los valores a las variables globales
      // Mas info sobre 'get_currentuserinfo()': 
      // http://codex.wordpress.org/Function_Reference/get_currentuserinfo
      get_currentuserinfo();
       
      // Guardamos el nombre del usuario en una variable
      $usuario = esc_attr($current_user->user_login);
 
      /*
      // Condicionales: mostramos contenido segun el nombre de cada usuario   
      if ($usuario === 'admin') {
          // Aqui incluimos el contenido para el usuario 'Admin'
        echo "Admin esta conectado";
      } else {
          // Aqui incluimos el contenido para el usuario 'Daniel' 
        echo "no se esta conectado";
      } 
      */



require('../fpdf/fpdf.php');
include('../conexion/conect.php');

$id = $_GET["id"];
$sql = "SELECT cu.id as cuid,cu.nombre as cunombre,cu.apellido as cuapellido,cu.cedula as cucedula,cu.celular as cucelular,
cu.email as cuemail,cu.numero_registro as cunumero_registro,cu.fecha_fin 
as cufecha_fin,nc.descripcion as ncdescripcion, cu.descargar_certificado as cudescargar_certificado FROM certificados_usuario cu inner join nivel_certificado nc on 
cu.idnivel = nc.idnivel
WHERE cu.id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();


$nombre = $row["cunombre"];  
$apellido =$row["cuapellido"]; 
$cedula =$row["cucedula"];  
$numero_registro =$row["cunumero_registro"];  
$celular =$row["cucelular"];  
$email =$row["cuemail"];  
$nivel_certificado =$row["ncdescripcion"];  
$descargar_certificado = $row["cudescargar_certificado"];
$fecha_fin = date('d/m/Y',strtotime($row["cufecha_fin"]));


//si el usuario no tiene permiso para descargar el certificado o no es admin puede no puede obtener el certificado
if($descargar_certificado != 1)
{
  if($usuario!="admin")
  {
      mysqli_free_result($result);
      mysqli_close($conn);
      exit();
  }
}

$dias = "";

for ($i=0; $i <= $diferencia; $i++) 
{ 


	$dias .=  ($dia_inicio + $i).",";

	if($i == ($diferencia - 1))
	{
		$dias .= $dia_inicio + $i+1;
		$i = $diferencia + 1;

	}
}


class PDF extends FPDF
{

	function Footer($lastPage = true)
	{
		$id = $_GET["id"];
		include('../conexion/conect.php');
		$sql = "SELECT cu.id as cuid,cu.nombre as cunombre,cu.apellido as cuapellido,cu.cedula as cucedula,cu.celular as cucelular,
		cu.email as cuemail,cu.numero_registro as cunumero_registro,cu.fecha_fin 
		as cufecha_fin,nc.descripcion as ncdescripcion FROM certificados_usuario cu inner join nivel_certificado nc on 
		cu.idnivel = nc.idnivel
		WHERE cu.id = $id";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		$registro = $row["cunumero_registro"]; 
		$registro = $row["cunumero_registro"]; 
		$fecha_fin = $row["cufecha_fin"];



		//agregar 12 meses a la fecha
		
		$fecha_fin2 = date('Y',strtotime($fecha_fin)) +1;
		$fecha_fin2 = $fecha_fin2."-".date('m',strtotime($fecha_fin))."-".date('d',strtotime($fecha_fin)); 

		//array para mostrar el nombre del mes en la fecha
		$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
   		'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');    
		$mes = $arrayMeses[date('m',strtotime($fecha_fin2))-1];
		$dia = date('d',strtotime($fecha_fin2));
		$ano = date('Y',strtotime($fecha_fin2));
		mysqli_free_result($result);
		mysqli_close($conn);

	    //Posición: a 1,5 cm del final
	    $this->SetY(-15);
	    //Arial italic 8
	    $this->SetFont('Arial','',12);
	    //Número de página
	   // if (!$lastPage){
	       // $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
	   // }
	   if($lastPage){
	        $this->Cell(40,10,"Cel: 300 602 07 97",0,0,'C');
	        $this->Cell(70,10,"Email: gilbertomazo@gmail.com",0,0,'C');
			$this->Cell(90,10,"Registro # $registro valido a $dia $mes $ano",0,0,'C');
	        
	    }
	}  
}



$pdf = new PDF();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',9);
$pdf->Image('../images/logo.jpg',10,10,-200);
$pdf->SetFont('Arial','I',14);
$pdf->SetXY(60,10);
$pdf->Cell(60,10,utf8_decode("Segun disposiciones de la resolucion N° 1409/12 de Min."));
$pdf->SetXY(70,15);
$pdf->Cell(70,15,utf8_decode("Protección Res. N° 068 -SENA- Autorizando el campo"));
$pdf->SetXY(70,20);
$pdf->Cell(70,20,utf8_decode("de entrenamiento."));

$pdf->SetFont('Arial','',14);
$pdf->SetXY(0,48);
$pdf->Cell(0, 48, "CERTIFICA QUE:", 0, 0, 'C');
$pdf->SetXY(0,54);
$pdf->Cell(0, 54, utf8_decode(mb_strtoupper($nombre." ".$apellido)), 0, 0, 'C');
$pdf->SetXY(0,60);
$pdf->Cell(0, 60, "C.C $cedula", 0, 0, 'C');



$pdf->SetFont('Arial','B',18);
$pdf->SetXY(0,82);
$pdf->Cell(0,82,utf8_decode("Aprobó el Curso de Trabajo Seguro en Alturas"),0,0,'C');
$pdf->SetXY(0,89);
$pdf->Cell(0,89,utf8_decode("Nivel $nivel_certificado"),0,0,'C');


$pdf->SetFont('Arial','b',16);
$pdf->SetXY(60,97);
$pdf->Cell(60,97,utf8_decode("Fecha del curso:"));

$pdf->SetFont('Arial','',16);
$pdf->SetXY(110,97);
$pdf->Cell(110,97,utf8_decode("$fecha_fin"));


$pdf->Image('../images/firma.jpg',85,161,-200);

$pdf->SetXY(55,120);
$pdf->Cell(55,120,utf8_decode("GILBERTO ANIBAL MAZO HERRERA"));

$pdf->SetXY(64,126);
$pdf->Cell(64,126,utf8_decode("Profesional en salud ocupacional"));

$pdf->SetXY(58,132);
$pdf->Cell(58,132,utf8_decode("Licencia # 14857 de 2002 Min. Salud"));

$pdf->SetXY(64,138);
$pdf->Cell(64,138,utf8_decode("Instructor certificado por el SENA"));


mysqli_free_result($result);
mysqli_close($conn);
$pdf->Output();
?>
