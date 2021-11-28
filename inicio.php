<?php
session_start();
if(!isset($_SESSION["matricula"],$_SESSION["correo"],$_SESSION["id_tipo"])){
    header("location: login");
}
else{
    include_once("models/usuarios.php");
    $Datos= usuario::Datos($_SESSION["matricula"],$_SESSION["correo"],$_SESSION["id_tipo"]);
    if($Datos == null){
        
        session_start();
        session_unset();
        session_destroy();
        session_write_close();
        header("location: login");
    }
    else{
        if($_SESSION["id_tipo"]== 3){
            $_SESSION["idalumno"]= $Datos["idalumno"];
            $_SESSION["idgrado"] = $Datos["idgrado"];
            include_once("models/alumno.php");
            $Num_Tareas_CO = Alumno::Num_Tareas_CO($_SESSION["idalumno"]);
            $Num_Tareas_Pe = Alumno::Num_Tareas_Pen($_SESSION["idalumno"]);
            $Num_Faltas_Acom = Alumno::Num_Faltas_Acom($_SESSION["idalumno"]);
            include_once("resource/templates/inicio_alumno.php");
        }
        elseif($_SESSION["id_tipo"] == 2){
            require_once("models/docente.php");
            $_SESSION["iddocente"]= $Datos["iddocente"];
            $Num_Mate_A = Docente::Num_Mate_A($_SESSION["iddocente"]);
            $Num_Tareas_C = Docente::Num_Tareas_C($_SESSION["iddocente"]);
            $Num_Tareas_P = Docente::Num_Tareas_P($_SESSION["iddocente"]);
            // $Num_Tareas_NO_Cal = Docente::Num_Tareas_No_C($_SESSION["iddocente"]);
            include_once("resource/templates/inicio_docente.php");
        }
        elseif($_SESSION["id_tipo"]== 1){
            $_SESSION["idadministrador"]= $Datos["idadministrador"];
                include_once("models/admin.php");
                $Num_Admins = Admin::Num_Admin();
                $Num_Docentes = Admin::Num_Docente();
                $Num_Alumnos = Admin::Num_Alumno();
                $Mb_Database = Admin::MB_Database();
            include_once("resource/templates/inicio_admin.php");
        }
    }
}