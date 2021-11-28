<?php
//Inicio de PHP
require('assets/library/fpdf/fpdf.php');   //importo la librería para el apartado en PDF

class PDF extends FPDF
{
    //Cabecera de la página
    function Header()
    {
        $this->Image('assets/img/Logo.png', 8, 8, 38);
        $this->Image('assets/img/M&Y.png', 160, 3, 53);
        $this->SetFont('Arial', 'B', 20);
        $this->Cell(190, 25, 'INSTITUTO LICEO JEAN PIAGET', 0, 0, 'C');
        $this->Ln(10);
        $this->Cell(190, 15, '______________________________', 0, 0, 'C');
        $this->Ln(20);
    }

    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'R');
    }
}

session_start();
if (isset($_GET["PDF_Download"], $_GET["id"], $_SESSION["matricula"], $_SESSION["correo"], $_SESSION["id_tipo"])) {
    $pdf = new PDF();
    if ($_GET["PDF_Download"] == 2) {
        include_once("models/admin.php");
        $DocenteMateria = Admin::VerDocenteMateria($_GET["id"]);
        $datos = Admin::DatosPdf($_GET["id"], $_GET["PDF_Download"]);
        if ($datos == null) {
            header("location: inicio?matricula=" . $_SESSION['matricula'] . "&tools=Inicio");
        }
        $nombre = $datos["paterno"] . " " . $datos["materno"] . " " . $datos["nombre"];
        $matricula = $datos["matricula"];
        $fechaEntera = time();
        $anio = date("Y", $fechaEntera);
        $mes = date("m", $fechaEntera);
        $dia = date("d", $fechaEntera);
        $Fecha = $dia . " / " . $mes . " / " . $anio;
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 19); // TIPOGRAFIA
        $pdf->Cell(0, 20, 'REPORTE DE MATERIAS DEL DOCENTE', 0, 0, 'C');
        $pdf->Ln(20);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(140, 10, utf8_decode('Nombre Completo: ' . $nombre . ' '), 0, 0);
        $pdf->Cell(0, 10, utf8_decode('Matricula: ' . $matricula . ' '), 0, 0);
        $pdf->Ln(15);
        $pdf->Cell(140, 10, 'Fecha: ' . $Fecha, 0, 0);
        $pdf->Ln(25);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(23, 10, '#', 1, 0, "C");
        $pdf->Cell(23, 10, 'idmateria', 1, 0, "C");
        $pdf->Cell(67, 10, 'Materia', 1, 0, "C");
        $pdf->Cell(38, 10, 'Escolaridad', 1, 0, "C");
        $pdf->Cell(38, 10, 'Grado', 1, 0, "C");
        $pdf->SetFont('Arial', '', 11);
        $pdf->Ln(10);
        $i = 1;
        foreach ($DocenteMateria as $D) {
            $pdf->Cell(23, 10, $i, 1, 0, "C");
            $pdf->Cell(23, 10, $D["iddocentemateria"], 1, 0, "C");
            $pdf->Cell(67, 10, utf8_decode($D["materias"]), 1, 0, "C");
            $pdf->Cell(38, 10, utf8_decode($D["escolaridad"]), 1, 0, "C");
            $pdf->Cell(38, 10, utf8_decode($D["grados"]), 1, 0, "C");
            $pdf->Ln(10);
            $i++;
        }
        $pdf->Output();
    } elseif ($_GET["PDF_Download"] == 3) {

        include_once("models/alumno.php");
        include_once("models/admin.php");
        $materia = Alumno::Materias($_SESSION["idgrado"]);
        $datos = Admin::DatosPdf($_SESSION["idalumno"], $_GET["PDF_Download"]);
        if ($datos == null) {
            header("location: inicio?matricula=" . $_SESSION['matricula'] . "&tools=Inicio");
        }
        $calificacion = array();
        for ($i = 0; $i < count($materia); $i++) {
            $wf = Alumno::CaliMateria($_SESSION["idalumno"], $materia[$i]["idmaterias"]);
            array_push($calificacion, $wf);
        }
        $total = 0;
        $fechaEntera = time();
        $anio = date("Y", $fechaEntera);
        $mes = date("m", $fechaEntera);
        $dia = date("d", $fechaEntera);
        $Fecha = $dia . " / " . $mes . " / " . $anio;
        $nombre = $datos["paterno"] . " " . $datos["materno"] . " " . $datos["nombre"];
        $matricula = $datos["matricula"];
        $Escolaridad = $datos["escolaridad"];
        $Grado = $datos["grados"];
        if ($datos["escolaridad"] == "Preescolar") {
            $Clave = "21PJN0475K";
        } elseif ($datos["escolaridad"] == "Primaria") {
            $Clave = "21PPR00794M";
        } elseif ($datos["escolaridad"] == "Secundaria") {
            $Clave = "21PES0492K";
        } else {
            $Clave = "";
        }
        $pdf = new PDF();
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 19); // TIPOGRAFIA
        $pdf->Cell(0, 20, 'REPORTE DE TAREAS', 0, 0, 'C');
        $pdf->Ln(20);
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(140, 10, utf8_decode('Nombre Completo: ' . $nombre . ' '), 0, 0);
        $pdf->Cell(0, 10, utf8_decode('Matricula: ' . $matricula . ' '), 0, 0);
        $pdf->Ln(15);
        $pdf->Cell(140, 10, 'Escolaridad: ' . $Escolaridad, 0, 0);
        $pdf->Cell(140, 10, 'Grado: ' . $Grado, 0, 0);
        $pdf->Ln(15);
        $pdf->Cell(140, 10, 'Clave: ' . $Clave, 0, 0);
        $pdf->Cell(140, 10, 'Fecha: ' . $Fecha, 0, 0);
        $pdf->Ln(25);
        $pdf->SetFont('Arial', 'B', 15);
        $pdf->Cell(95, 10, 'Materias', 1, 0, "C");
        $pdf->Cell(95, 10, 'Calificacion', 1, 0, "C");
        $pdf->SetFont('Arial', '', 11);
        $pdf->Ln(10);
        $i = 0;
        foreach ($calificacion as $C) {
            $pdf->Cell(95, 10, utf8_decode($materia[$i]["materias"]), 1, 0, "J");
            $pdf->Cell(95, 10, $C["cali"], 1, 0, "C");
            $pdf->Ln(10);
            $total += $C["cali"];
            $i++;
        }
        $pdf->Cell(95, 10, utf8_decode('Promedio de tareas'), 1, 0, "J");
        $pdf->Cell(95, 10, bcdiv($total/count($materia), 1, 1), 1, 0, "C");
        $pdf->Ln(35);
        $pdf->Cell(190, 15, '____________________________________', 0, 0, 'C');
        $pdf->Ln(10);
        $pdf->Cell(190, 15, 'Firma del tutor o padre de familia', 0, 0, 'C');
        $pdf->Output();
    } else {
        header("location: inicio?matricula=" . $_SESSION['matricula'] . "&tools=Inicio");
    }
} else {
    header("location: index");
}
