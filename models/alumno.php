<?php
include_once("conexion.php");

class Alumno {

    public static function Asistencias($idAlumno, $idmateria){
        $conexion= new Conexion();
        $conexion->Conectar();
        $query = "SELECT * FROM asistencia
        INNER JOIN alumno ON(alumno.idalumno = asistencia.idalumno)
        INNER JOIN docentemateria ON(docentemateria.iddocentemateria = asistencia.idmateriadocente)
        INNER JOIN materias ON (materias.idmaterias = docentemateria.idmateria)
        WHERE alumno.idalumno = ? AND materias.idmaterias = ? ";
        $pre= mysqli_prepare($conexion->con,$query);
        $pre->bind_param("ii",$idAlumno,$idmateria);
        $pre->execute();
        $res= $pre->get_result();
        $resultados =[];
        while($resultado = $res->fetch_assoc()){
            array_push($resultados,$resultado);
        }
        return $resultados;
    }
    public static function Tareas( $idmateria,$idAlumno){
        $conexion= new Conexion();
        $conexion->Conectar();
        $query = "SELECT * FROM tarea
        JOIN alumno
        LEFT JOIN calificacion ON(calificacion.idtarea =tarea.idtarea AND alumno.idalumno =calificacion.idalumno)
        INNER JOIN docentemateria ON(docentemateria.iddocentemateria=tarea.idmateriadocente)
        INNER JOIN materias ON (materias.idmaterias = docentemateria.idmateria)
        WHERE materias.idmaterias = ? AND alumno.idalumno = ?";
        $pre= mysqli_prepare($conexion->con,$query);
        $pre->bind_param("ii",$idmateria,$idAlumno);
        $pre->execute();
        $res= $pre->get_result();
        $resultados =[];
        while($resultado = $res->fetch_assoc()){
            array_push($resultados,$resultado);
        }
        return $resultados;
    }
    public static function Materias($idgrado){
        $conexion= new Conexion();
        $conexion->Conectar();
        $query = "SELECT * FROM materias 
        WHERE materias.idgrados = ?";
        $pre= mysqli_prepare($conexion->con,$query);
        $pre->bind_param("i",$idgrado);
        $pre->execute();
        $res= $pre->get_result();
        $resultados =[];
        while($resultado = $res->fetch_assoc()){
            array_push($resultados,$resultado);
        }
        return $resultados;
    }
    public static function Num_Tareas_CO( $idAlumno){
        $conexion= new Conexion();
        $conexion->Conectar();
        $query = "SELECT COUNT(tarea.idtarea) as num FROM tarea
        JOIN alumno
        LEFT JOIN calificacion ON(calificacion.idtarea =tarea.idtarea AND alumno.idalumno =calificacion.idalumno)
        INNER JOIN docentemateria ON(docentemateria.iddocentemateria=tarea.idmateriadocente)
        INNER JOIN materias ON (materias.idmaterias = docentemateria.idmateria)
        WHERE alumno.idalumno = ? AND calificacion.idalumno  IS NOT NULL";
        $pre= mysqli_prepare($conexion->con,$query);
        $pre->bind_param("i",$idAlumno);
        $pre->execute();
        $result= $pre->get_result();
        $pre->close();
        return $result->fetch_assoc();
    }
    public static function Num_Tareas_Pen($idAlumno){
        $conexion= new Conexion();
        $conexion->Conectar();
        $query = "SELECT COUNT(tarea.idtarea) as num FROM tarea
        JOIN alumno
        LEFT JOIN calificacion ON(calificacion.idtarea =tarea.idtarea AND alumno.idalumno =calificacion.idalumno)
        INNER JOIN docentemateria ON(docentemateria.iddocentemateria=tarea.idmateriadocente)
        INNER JOIN materias ON (materias.idmaterias = docentemateria.idmateria)
        WHERE alumno.idalumno = ? AND calificacion.idalumno  IS  NULL";
        $pre= mysqli_prepare($conexion->con,$query);
        $pre->bind_param("i",$idAlumno);
        $pre->execute();
        $result= $pre->get_result();
        $pre->close();
        return $result->fetch_assoc();
    }
    // medodo que recoge el numero de asistencias
    public static function Num_Faltas_Acom($idAlumno){
        $conexion= new Conexion();
        $conexion->Conectar();
        $query = "SELECT COUNT(asistencia.id) as num FROM asistencia
        INNER JOIN alumno ON(alumno.idalumno = asistencia.idalumno)
        INNER JOIN docentemateria ON(docentemateria.iddocentemateria = asistencia.idmateriadocente)
        INNER JOIN materias ON (materias.idmaterias = docentemateria.idmateria)
        WHERE alumno.idalumno = ? AND asistencia.asistencia ='Falta'";
        $pre= mysqli_prepare($conexion->con,$query);
        $pre->bind_param("i",$idAlumno);
        $pre->execute();
        $result= $pre->get_result();
        $pre->close();
        return $result->fetch_assoc();
    }

    public static function UpdateAlumno($idgrado,$idAlumno){
        $conexion = new Conexion();
        $conexion->Conectar();
        $query ="UPDATE `alumno` SET `idgrado` = ? WHERE `alumno`.`idalumno` = ?";
        $pre = mysqli_prepare($conexion->con, $query);
        $pre->bind_param("ii" ,$idgrado 
                                ,$idAlumno);
        $pre->execute();
        $pre->close();
    }

    public static function CaliMateria($idAlumno,$idmateria){
        $conexion= new Conexion();
        $conexion->Conectar();
        $query = "SELECT AVG(calificacion.calificacion) as cali FROM tarea
        JOIN alumno
        LEFT JOIN calificacion ON(calificacion.idtarea =tarea.idtarea AND alumno.idalumno =calificacion.idalumno)
        INNER JOIN docentemateria ON(docentemateria.iddocentemateria=tarea.idmateriadocente)
        INNER JOIN materias ON (materias.idmaterias = docentemateria.idmateria)
        where alumno.idalumno= ? AND materias.idmaterias=?";
        $pre= mysqli_prepare($conexion->con,$query);
        $pre->bind_param("ii",$idAlumno,$idmateria);
        $pre->execute();
        $result= $pre->get_result();
        $pre->close();
        return $result->fetch_assoc();
    }
}

