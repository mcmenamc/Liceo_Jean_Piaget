<?php
include_once("conexion.php");
class Admin{

    public static function MB_Database(){
        $conexion= new Conexion();
        $conexion->Conectar();
        $query = "SELECT table_schema AS 'Base de datos',
        ROUND(SUM(data_length + index_length) / 1024 / 1024, 2) AS 'Tamaño'
        FROM information_schema.TABLES
        where table_schema = 'liceo_jean_piaget'
        GROUP BY table_schema;";
        $pre= mysqli_prepare($conexion->con,$query);
        $pre->execute();
        $result= $pre->get_result();
        $pre->close();
        return $result->fetch_assoc();

    }

    public static function Num_Admin(){
        $conexion= new Conexion();
        $conexion->Conectar();
        $query = "SELECT COUNT(usuarios.matricula)as num FROM usuarios 
        INNER JOIN administrador ON(administrador.matricula = usuarios.matricula)";
        $pre= mysqli_prepare($conexion->con,$query);
        $pre->execute();
        $result= $pre->get_result();
        $pre->close();
        return $result->fetch_assoc();

    }
    public static function Num_Docente(){
        $conexion= new Conexion();
        $conexion->Conectar();
        $query = "SELECT COUNT(usuarios.matricula) as num FROM usuarios
        INNER JOIN docente ON(docente.matricula = usuarios.matricula)";
        $pre= mysqli_prepare($conexion->con,$query);
        $pre->execute();
        $result= $pre->get_result();
        $pre->close();
        return $result->fetch_assoc();

    }
    public static function Num_Alumno(){
        $conexion= new Conexion();
        $conexion->Conectar();
        $query = "SELECT COUNT(usuarios.matricula) as num FROM usuarios
        INNER JOIN alumno ON(alumno.matricula = usuarios.matricula)";
        $pre= mysqli_prepare($conexion->con,$query);
        $pre->execute();
        $result= $pre->get_result();
        $pre->close();
        return $result->fetch_assoc();

    }
    

    public static function VerAdmins(){
        $conexion= new Conexion();
        $conexion->Conectar();
        $query = "SELECT * FROM usuarios 
        INNER JOIN administrador ON(administrador.matricula = usuarios.matricula)";
        $pre= mysqli_prepare($conexion->con,$query);
        $pre->execute();
        $res= $pre->get_result();
        $resultados =[];
        while($resultado = $res->fetch_assoc()){
            array_push($resultados,$resultado);
        }
        $pre->close();
        return $resultados;
    }
    public static function EliminarUs($matricula){
        $conexion = new Conexion();
        $conexion->Conectar();
        $query ="DELETE FROM usuarios
        WHERE usuarios.matricula = ?";
        $pre = mysqli_prepare($conexion->con, $query);
        $pre->bind_param("i", $matricula);
        $pre->execute();
        $pre->close();
    }
    public static function EliminarAdmin($idadmin){
        $conexion = new Conexion();
        $conexion->Conectar();
        $query ="DELETE FROM administrador 
        WHERE administrador.idadministrador = ? ";
        $pre = mysqli_prepare($conexion->con, $query);
        $pre->bind_param("i", $idadmin);
        $pre->execute();
        $pre->close();
    }
    // se cambiara los de 3 usuarios
    public static function EditUs($matricula,$nombre,$paterno,$materno,$contrasena,$correo){
        $conexion = new Conexion();
        $conexion->Conectar();
        $query ="UPDATE `usuarios` 
        SET `nombre` = ?, `paterno` = ?, `materno` =?, `contrasena` = ?, `correo` = ? WHERE `usuarios`.`matricula` = ?";
        $pre = mysqli_prepare($conexion->con, $query);
        $pre->bind_param("sssssi", $nombre,$paterno,$materno,$contrasena,$correo,$matricula);
        $pre->execute();
        $pre->close();
    }
    public static function VerDocentes(){
        $conexion= new Conexion();
        $conexion->Conectar();
        $query = "SELECT * FROM usuarios 
        INNER JOIN docente ON(docente.matricula = usuarios.matricula)";
        $pre= mysqli_prepare($conexion->con,$query);
        $pre->execute();
        $res= $pre->get_result();
        $resultados =[];
        while($resultado = $res->fetch_assoc()){
            array_push($resultados,$resultado);
        }
        $pre->close();
        return $resultados;
    }
    public static function EliminarDocente($iddocnete){
        $conexion = new Conexion();
        $conexion->Conectar();
        $query ="DELETE FROM docente 
        WHERE docente.iddocente = ? ";
        $pre = mysqli_prepare($conexion->con, $query);
        $pre->bind_param("i", $iddocnete);
        $pre->execute();
        $pre->close();
    }
    public static function VerDocenteMateria($iddocente){
        $conexion= new Conexion();
        $conexion->Conectar();
        $query = "SELECT * from docentemateria 
        INNER JOIN materias ON(materias.idmaterias = docentemateria.idmateria)
        INNER JOIN grados on(grados.idgrado = materias.idgrados)
        INNER JOIN escolaridad ON(escolaridad.idescolaridad = grados.idescolaridad)
        WHERE docentemateria.iddocente =?";
        $pre= mysqli_prepare($conexion->con,$query);
        $pre->bind_param("i",$iddocente);
        $pre->execute();
        $res= $pre->get_result();
        $resultados =[];
        while($resultado = $res->fetch_assoc()){
            array_push($resultados,$resultado);
        }
        $pre->close();
        return $resultados;
    }
    public static function DatosPdf($id, $tipo){
        $conexion = new Conexion();
        $conexion->Conectar();

        if($tipo == 2){
            $query= "SELECT * from usuarios
            INNER JOIN docente ON(usuarios.matricula = docente.matricula)
            WHERE docente.iddocente = ?";
        }
        elseif($tipo == 3){
            $query= "SELECT * from usuarios
            INNER JOIN alumno ON(usuarios.matricula = alumno.matricula)
            INNER JOIN grados ON(grados.idgrado = alumno.idgrado)
            INNER JOIN escolaridad ON(escolaridad.idescolaridad = grados.idescolaridad)
            WHERE alumno.idalumno = ?";
        }
        $pre = mysqli_prepare($conexion->con,$query);
        $pre->bind_param("i",$id);
        $pre->execute();
        $result= $pre->get_result();
        $pre->close();
        return $result->fetch_assoc();
    }
    public static function VerAlumnos($idgrado){
        $conexion= new Conexion();
        $conexion->Conectar();
        $query = "SELECT * FROM usuarios 
        INNER JOIN alumno ON(alumno.matricula = usuarios.matricula)
        INNER JOIN grados ON (grados.idgrado = alumno.idgrado)
        INNER JOIN escolaridad ON (escolaridad.idescolaridad = grados.idescolaridad)
        WHERE grados.idgrado = ?";
        $pre= mysqli_prepare($conexion->con,$query);
        $pre->bind_param("i",$idgrado);
        $pre->execute();
        $res= $pre->get_result();
        $resultados =[];
        while($resultado = $res->fetch_assoc()){
            array_push($resultados,$resultado);
        }
        $pre->close();
        return $resultados;
    }
    public static function EliminarAlumno(){
        $conexion = new Conexion();
        $conexion->Conectar();
        $query ="DELETE FROM alumno 
        WHERE alumno.idalumno = ? ";
        $pre = mysqli_prepare($conexion->con, $query);
        $pre->bind_param("i", $iddocnete);
        $pre->execute();
        $pre->close();
    }
    public static function ReiniciarDatabase(){
        $conexion = new Conexion();
        $conexion->Conectar();
        $query ="DELETE FROM tarea";
        $pre = mysqli_prepare($conexion->con, $query);
        $pre->execute();
        $query1 = "DELETE FROM asistencia";
        $pre = mysqli_prepare($conexion->con, $query1);
        $pre->execute();
        $pre->close();
    }
}
?>