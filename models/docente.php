<?php
include_once("conexion.php");
class Docente
{
// se asignara una tarea depende a las materias que se le asigno 
    public static function Nueva_Tarea($titulo,$tema,$des,$publi,$entre,$idmateriadocente)
    {
        $conexion = new Conexion();
        $conexion->Conectar();
        $query ="INSERT INTO `tarea` (`idtarea`, `titulo`, `tema`, `descripcion`, `fecha_publicacion`, `fecha_entrega`, `idmateriadocente`) VALUES 
        (NULL, ?, ?, ?, ?, ?, ?)";
        $pre = mysqli_prepare($conexion->con, $query);
        $pre->bind_param("sssssi", $titulo
                                  , $tema
                                  , $des
                                  ,$publi
                                  ,$entre
                                  ,$idmateriadocente);
        $pre->execute();
        $pre->close();
    }
// devolvera los botones de las tareas 
    public static function Tareas($idmateria){
        $conexion= new Conexion();
        $conexion->Conectar();
        $query ="SELECT * FROM tarea
        INNER JOIN docentemateria ON(docentemateria.iddocentemateria = tarea.idmateriadocente)
        WHERE docentemateria.idmateria =?";
        $pre = mysqli_prepare($conexion->con, $query);
        $pre->bind_param("i", $idmateria);
        $pre->execute();
        $res= $pre->get_result();
        $resultados =[];
        while($resultado = $res->fetch_assoc()){
            array_push($resultados,$resultado);
        }
        return $resultados;
    }
// devolvera las tareas para calificarlas despues
    public static function Ver_Tarea($idmateria,$idtarea)
    {
        $conexion= new Conexion();
        $conexion->Conectar();
        $query ="SELECT calificacion.comentario, calificacion.calificacion,alumno.idalumno,usuarios.nombre,usuarios.paterno,usuarios.materno
        from alumno
                INNER JOIN usuarios ON(alumno.matricula = usuarios.matricula)
                INNER JOIN grados ON(grados.idgrado = alumno.idgrado)
                INNER JOIN  materias ON(materias.idgrados = grados.idgrado)
                LEFT JOIN docentemateria ON(docentemateria.idmateria = materias.idmaterias)
                INNER JOIN tarea ON(tarea.idmateriadocente = docentemateria.iddocentemateria)
                LEFT JOIN calificacion ON(calificacion.idtarea = tarea.idtarea AND calificacion.idalumno = alumno.idalumno)
                WHERE  materias.idmaterias = ? AND tarea.idtarea = ?";
        $pre = mysqli_prepare($conexion->con, $query);
        $pre->bind_param("ii", $idmateria,$idtarea);
        $pre->execute();
        $res= $pre->get_result();
        $resultados =[];
        while($resultado = $res->fetch_assoc()){
            array_push($resultados,$resultado);
        }
        return $resultados;
    }
    
// devolvera las materias del docente que se la asigno
    public static function Materiasdocente( $idmateria,$iddocente){
        $conexion= new Conexion();
        $conexion->Conectar();
        $query = "SELECT * from docentemateria 
        INNER JOIN materias ON(materias.idmaterias = docentemateria.idmateria)
        INNER JOIN grados on(grados.idgrado = materias.idgrados)
        INNER JOIN escolaridad ON(escolaridad.idescolaridad = grados.idescolaridad)
        WHERE docentemateria.iddocente = ? AND grados.idgrado =?";
        $pre= mysqli_prepare($conexion->con,$query);
        $pre->bind_param("ii",$iddocente,$idmateria);
        $pre->execute();
        $res= $pre->get_result();
        $resultados =[];
        while($resultado = $res->fetch_assoc()){
            array_push($resultados,$resultado);
        }
        return $resultados;
    }
    // sirve para la id de la materia de cada docente asi la recuperamos para publicar la tareas quue necesitamos otro metodo
    public static function iddocentemate($idmateria,$iddocente){// generaremos una funcion estatica y con sus paramtros
        $conexion = new Conexion();// creamos el objeto para crear la conexion a la base de datos
        $conexion->Conectar();// ejecutamos el metodo
        // creamos el query que se va lanzar en la base de datos
        $query= "SELECT * from docentemateria 
        WHERE docentemateria.idmateria =? AND docentemateria.iddocente = ?";
        $pre = mysqli_prepare($conexion->con,$query);// preparamos el query para pasar los paramtron
        $pre->bind_param("ii",$idmateria//
                              ,$iddocente);// mandamos los paramtros que necesita
        $pre->execute();// ahora ejecutamos el query
        $result= $pre->get_result();// como esperamos algo de la consulta lo almacenaremos con esta funcion
        $pre->close();//c erramos la concexion
        return $result->fetch_assoc();// y retornamos sin  antes asociamos con las tablas de la base de datos
    }
    public static function NuevaMateria($iddocente,$idmateria){
        $conexion = new Conexion();
        $conexion->Conectar();
        $query ="INSERT INTO `docentemateria` (`iddocentemateria`, `iddocente`, `idmateria`) VALUES 
        (NULL, ?, ?)";
        $pre = mysqli_prepare($conexion->con, $query);
        $pre->bind_param("ii", $iddocente
                             , $idmateria);
        $pre->execute();
        $pre->close();
    }
    public static function AuctualizaCali($idtarea,$calificacion,$comentario,$idalumno){
        $conexion = new Conexion();
        $conexion->Conectar();

        $query1 = "SELECT * from calificacion 
        WHERE idalumno =? AND idtarea =?";
        $pre1 = mysqli_prepare($conexion->con, $query1);
        $pre1->bind_param("ii" , $idalumno
                                , $idtarea);
        $pre1->execute();
        $res= $pre1->get_result();
        $resultados =[];
        while($resultado = $res->fetch_assoc()){
            array_push($resultados,$resultado);
        }
        if($resultados == null){
            $query ="INSERT INTO `calificacion` (`id`, `idtarea`, `calificacion`, `comentario`, `idalumno`) VALUES 
            (NULL, ?, ?, ?, ?)";
            $pre = mysqli_prepare($conexion->con, $query);
            $pre->bind_param("iisi", $idtarea
                                 , $calificacion
                                 ,$comentario
                                 ,$idalumno);
        }
        else{
            $query ="UPDATE `calificacion` SET  `calificacion` = ?, `comentario` = ? 
            WHERE `idalumno` = ? AND `idalumno` = ?";
            $pre = mysqli_prepare($conexion->con, $query);
            $pre->bind_param("isii", $calificacion
                                 , $comentario
                                 ,$idalumno
                                 ,$idalumno);
        }
        $pre->execute();
        $pre->close();
    }
    public static function EliminarCali($idtarea,$idalumno){
        $conexion = new Conexion();
        $conexion->Conectar();
        $query ="DELETE FROM calificacion 
        WHERE calificacion.idtarea = ? AND calificacion.idalumno = ?";
        $pre = mysqli_prepare($conexion->con, $query);
        $pre->bind_param("ii", $idtarea
                             , $idalumno);
        $pre->execute();
        $pre->close();
    }
    public static function ElimnarTarea($idtarea){
        $conexion = new Conexion();
        $conexion->Conectar();

        $query1 = "DELETE from calificacion 
        WHERE idtarea = ?";
        $pre1 = mysqli_prepare($conexion->con, $query1);
        $pre1->bind_param("i" , $idtarea);
        $pre1->execute();

        $query ="DELETE FROM tarea
        WHERE idtarea= ?";
        $pre = mysqli_prepare($conexion->con, $query);
        $pre->bind_param("i", $idtarea);
        $pre->execute();
        $pre->close();
    }

    // alumnos por grado para asistencia 
    public static function AlumnosGrado( $idgrado){
        $conexion= new Conexion();
        $conexion->Conectar();
        $query = "SELECT * from alumno 
        INNER JOIN usuarios ON(usuarios.matricula =alumno.matricula)
        INNER JOIN grados ON(grados.idgrado = alumno.idgrado)
        WHERE grados.idgrado = ?";
        $pre= mysqli_prepare($conexion->con,$query);
        $pre->bind_param("i",$idgrado,);
        $pre->execute();
        $res= $pre->get_result();
        $resultados =[];
        while($resultado = $res->fetch_assoc()){
            array_push($resultados,$resultado);
        }
        $pre->close();
        return $resultados;
    }
    public static function NuevaAsistencia($asistencia,$observacion,$idalumno,$idmateriadocente,$fecha){
        $conexion = new Conexion();
        $conexion->Conectar();
        $query ="INSERT INTO `asistencia` (`id`, `asistencia`, `observacion`, `idalumno`, `idmateriadocente`, `fecha`) VALUES 
        (NULL, ?, ?, ?, ?, ?)";
        $pre = mysqli_prepare($conexion->con, $query);
        $pre->bind_param("ssiis" ,$asistencia ,$observacion ,$idalumno ,$idmateriadocente, $fecha);
        $pre->execute();
        $pre->close();
    }
    public static function Num_Mate_A( $iddocente){
        $conexion= new Conexion();
        $conexion->Conectar();
        $query = "SELECT COUNT(matricula) as num FROM docentemateria
        INNER JOIN docente ON(docente.iddocente = docentemateria.iddocente)
        WHERE docente.iddocente = ?";
        $pre= mysqli_prepare($conexion->con,$query);
        $pre->bind_param("i",$iddocente,);
        $pre->execute();
        $result= $pre->get_result();
        $pre->close();
        return $result->fetch_assoc();
    
    }
    public static function Num_Tareas_P( $iddocente){
        $conexion= new Conexion();
        $conexion->Conectar();
        $query = "SELECT COUNT(tarea.idtarea) as num FROM tarea
        INNER JOIN docentemateria  ON (docentemateria.iddocentemateria = tarea.idmateriadocente)
        WHERE docentemateria.iddocente = ?";
        $pre= mysqli_prepare($conexion->con,$query);
        $pre->bind_param("i",$iddocente,);
        $pre->execute();
        $result= $pre->get_result();
        $pre->close();
        return $result->fetch_assoc();
    
    }  
    public static function Num_Tareas_C( $iddocente){
        $conexion= new Conexion();
        $conexion->Conectar();
        $query = "SELECT COUNT(calificacion.id)as num FROM calificacion 
        INNER JOIN tarea ON (tarea.idtarea = calificacion.idtarea)
        INNER JOIN docentemateria on (docentemateria.iddocentemateria = tarea.idmateriadocente)
        WHERE docentemateria.iddocente = ?";
        $pre= mysqli_prepare($conexion->con,$query);
        $pre->bind_param("i",$iddocente);
        $pre->execute();
        $result= $pre->get_result();
        $pre->close();
        return $result->fetch_assoc();
    }
    public static function UpdateDocente($entrada,$dias,$salida,$iddocente){
        $conexion = new Conexion();
        $conexion->Conectar();
        $query ="UPDATE `docente` 
        SET `entrada` = ?, `dias` = ?, `salida` = ? WHERE `docente`.`iddocente` = ?";
        $pre = mysqli_prepare($conexion->con, $query);
        $pre->bind_param("sssi" ,$entrada 
                                ,$dias
                                ,$salida 
                                ,$iddocente);
        $pre->execute();
        $pre->close();
    }
    public static function DeleteMateriaDocente($idmateria){
        $conexion = new Conexion();
        $conexion->Conectar();
        $query ="DELETE FROM docentemateria
        WHERE docentemateria.iddocentemateria = ?";
        $pre = mysqli_prepare($conexion->con, $query);
        $pre->bind_param("i" ,$idmateria);
        $pre->execute();
        $pre->close();
    }
}
