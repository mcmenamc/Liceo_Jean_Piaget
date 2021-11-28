<?php
include_once("conexion.php");// necesitaremos la clase de la conexion para hacer consultas sql
class usuario{

public static function Login($Matricula,$Contrasena){// generaremos una funcion estatica y con sus paramtros
    $conexion = new Conexion();// creamos el objeto para crear la conexion a la base de datos
    $conexion->Conectar();// ejecutamos el metodo
    // creamos el query que se va lanzar en la base de datos
    $query= "SELECT matricula,nombre,paterno,materno,contrasena,correo,id_tipo
             FROM usuarios 
             WHERE (usuarios.matricula=? OR usuarios.correo= ?) 
            AND usuarios.contrasena= BINARY  ?";
    $pre = mysqli_prepare($conexion->con,$query);// preparamos el query para pasar los paramtron
    $pre->bind_param("sss",$Matricula//
                          ,$Matricula
                          ,$Contrasena);// mandamos los paramtros que necesita
    $pre->execute();// ahora ejecutamos el query
    $result= $pre->get_result();// como esperamos algo de la consulta lo almacenaremos con esta funcion
    $pre->close();//c erramos la concexion
    return $result->fetch_assoc();// y retornamos sin  antes asociamos con las tablas de la base de datos
}

public static function Datos($Matricula,$Correo, $idtipo){// pedimos los paramtros para rescatar otra tabla
    $conexion = new Conexion();// creamos el objeto para crear la conexion a la base de datos
    $conexion->Conectar();// ejecutamos el metodo
        if($idtipo ==3){// Alumno
            $query = "select escolaridad.idescolaridad, alumno.idgrado,idalumno,alumno.matricula,nombre,paterno,materno,correo,foto,
            grados,escolaridad 
            from alumno 
            LEFT join usuarios on(alumno.matricula = usuarios.matricula) 
            inner join grados ON(alumno.idgrado= grados.idgrado) 
            inner join escolaridad ON (grados.idescolaridad= escolaridad.idescolaridad)
            WHERE usuarios.matricula= ? AND usuarios.correo= ?";
        }elseif($idtipo ==2){// Docente
            $query ="select iddocente,usuarios.matricula,nombre,paterno,materno,correo,foto,entrada,dias,salida 
            from docente 
            left join usuarios ON(docente.matricula= usuarios.matricula)
            WHERE usuarios.matricula= ? AND usuarios.correo = ?" ;
        }elseif($idtipo ==1){//Administrador
            $query ="select idadministrador,administrador.matricula,nombre,paterno,materno,correo,foto
            from administrador 
            left join usuarios on(usuarios.matricula= administrador.matricula)
            WHERE usuarios.matricula = ? AND usuarios.correo= ?";
        }
        else{
            $query ="";
        }
    
    // creamos el query que se va lanzar en la base de datos
    $pre = mysqli_prepare($conexion->con,$query);// preparamos el query para pasar los paramtron
    $pre->bind_param("ss",$Matricula
                          ,$Correo);
    $pre->execute();// ahora ejecutamos el query
    $result= $pre->get_result();// como esperamos algo de la consulta lo almacenaremos con esta funcion
    $pre->close();//cerramos la concexion
    return $result->fetch_assoc();// y retornamos sin  antes asociamos con las tablas de la base de datos
}
public static function Escolaridad(){
    $conexion = new Conexion();
    $conexion->Conectar();
    $pre = mysqli_prepare($conexion->con,"SELECT * FROM escolaridad ");
    $pre->execute();
    $result= $pre->get_result();
    $pre->close();
    $resultados =[];
    while($resultado = $result->fetch_assoc()){
        array_push($resultados,$resultado);
    }
    return $resultados;
}
public static function Grados($idescolaridad){
    $conexion = new Conexion();
    $conexion->Conectar();
    $pre = mysqli_prepare($conexion->con,"SELECT * FROM  grados
    WHERE grados.idescolaridad = ?");
    $pre->bind_param("i", $idescolaridad);
    $pre->execute();
    $result= $pre->get_result();
    $pre->close();
    $resultados =[];
    while($resultado = $result->fetch_assoc()){
        array_push($resultados,$resultado);
    }
    return $resultados;
}
public static function Materias($idgrado){
    $conexion = new Conexion();
    $conexion->Conectar();
    $pre = mysqli_prepare($conexion->con,"SELECT materias.idmaterias, materias.idgrados, materias.materias
    FROM Usuarios
    LEFT JOIN Docente
    on Usuarios.Matricula=Docente.Matricula
    RIGHT JOIN docentemateria
    ON Docente.iddocente=docentemateria.iddocente
    RIGHT JOIN materias 
    ON materias.idmaterias=docentemateria.idmateria 
    WHERE materias.idgradoS = ? AND docente.matricula IS NULL");
    $pre->bind_param("i", $idgrado);
    $pre->execute();
    $result= $pre->get_result();
    $pre->close();
    $resultadosm =[];
    while($resultados = $result->fetch_assoc()){
        array_push($resultadosm,$resultados);
    }
    return $resultadosm;
}
public static function RegistroUsuario($nombre, $paterno,$materno,$correo,$contrasena,$foto,$idtipo){
    $conexion = new Conexion();
    $conexion->Conectar();
     mysqli_query($conexion->con,"INSERT INTO `usuarios` (`matricula`, `nombre`, `paterno`, `materno`, `contrasena`, `correo`, `foto`, `id_tipo`) VALUES 
    (NULL, '".$nombre."', '".$paterno."', '".$materno."', '".$contrasena."','".$correo."', '".$foto."', '".$idtipo."')");
    
}
public  static function RegistroAlumno($correo,$contrasena,$Grado){
    $conexion = new Conexion();
    $conexion->Conectar();
    $query= "INSERT INTO alumno (idalumno,matricula,idgrado) VALUES 
    (NULL, (SELECT usuarios.matricula from usuarios WHERE usuarios.correo = ? AND usuarios.contrasena= ?),?)";
    $pre = mysqli_prepare($conexion->con,$query);
    $pre->bind_param("ssi" , $correo
                          , $contrasena
                          , $Grado);
    $pre->execute();
    $pre->close();
}

public  static function RegistroDocente($correo,$contrasena,$Entrada,$Salida,$Atencion){
    $conexion = new Conexion();
    $conexion->Conectar();
    $query= "INSERT INTO docente (iddocente,matricula,entrada,dias,salida) VALUES 
    (NULL, (SELECT usuarios.matricula from usuarios WHERE usuarios.correo = ? AND usuarios.contrasena= ?),?,?,?)";
    $pre = mysqli_prepare($conexion->con,$query);
    $pre->bind_param("sssss" , $correo
                            , $contrasena
                            , $Entrada
                            , $Atencion
                            , $Salida  );
    $pre->execute();
    $pre->close();
}
public static function RegistroAdmins($correo,$contrasena){
    $conexion = new Conexion();
    $conexion->Conectar();
    $query= "INSERT INTO administrador (idadministrador,matricula) VALUES 
    (NULL, (SELECT usuarios.matricula from usuarios WHERE usuarios.correo = ? AND usuarios.contrasena= ?))";
    $pre = mysqli_prepare($conexion->con,$query);
    $pre->bind_param("ss" , $correo
                            , $contrasena );
    $pre->execute();
    $pre->close();
}
public static function CorreosExits($correo){
    $conexion = new Conexion();
    $conexion->Conectar();
    $pre = mysqli_prepare($conexion->con,"SELECT correo FROM usuarios
    WHERE usuarios.correo = ?");
    $pre->bind_param("s",$correo);
    $pre->execute();
    $result= $pre->get_result();
    $pre->close();
    return $result->fetch_assoc();
}

public static function DevuleveGrados($idescolaridad){
    $conexion = new Conexion();
    $conexion->Conectar();
	$pre = mysqli_prepare($conexion->con, "select * from grados 
    where grados.idescolaridad =?");
	$pre->bind_param("s",$idescolaridad);
	$pre->execute();
    $result= $pre->get_result();
    $pre->close();
    $resultadosm =[];
    while($resultados = $result->fetch_assoc()){
        array_push($resultadosm,$resultados);
    }
    return $resultadosm;
}
public static function UpdatePerfil($matricula,$nombre,$paterno,$materno,$correo,$foto){
    $conexion = new Conexion();
    $conexion->Conectar();
    if($foto != ""){
        $query = "UPDATE `usuarios` 
        SET `nombre` = '".$nombre."', `paterno` = '".$paterno."', `materno` = '".$materno."',
         `foto` = '".$foto."'  WHERE `usuarios`.`matricula` = ".$matricula." AND `usuarios`.`correo` = '".$correo."'";
    }
    else{
        $query = "UPDATE `usuarios` 
        SET `nombre` = '".$nombre."', `paterno` = '".$paterno."', `materno` = '".$materno."'
          WHERE `usuarios`.`matricula` = ".$matricula." AND `usuarios`.`correo` = '".$correo."'";
    }
    mysqli_query($conexion->con,$query);
}

}