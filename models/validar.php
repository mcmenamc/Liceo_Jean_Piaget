<?php
// modificar las claves para hacer el registro
$claveAdmin = 159753;
$claveDocente = 12369;
$claveAlumno = 14789;

if(isset($_POST['continente'])){
    $continente=$_POST['continente'];
    include_once("usuarios.php");
    $SelectGrados = usuario::DevuleveGrados($continente);
    $cadena = "<select onchange='TablaAlumnos(this.value)'  name='Grado' class='form-select' id='inputGroupSelect0' > <option value='0' selected>Selecione grado</option>";

    foreach( $SelectGrados as $gra){
        $cadena = $cadena . '<option  value=' . $gra["idgrado"] . '>' . $gra["grados"] . '</option>';
    }
	echo($cadena . "</select>");
}
elseif(isset($_POST["gradosyescolaridad"])){
    $continente=$_POST['gradosyescolaridad'];
    include_once("usuarios.php");
    $SelectGrados = usuario::DevuleveGrados($continente);
    $cadena = "<select name='Grado' class='form-select' id='inputGroupSelect03' > <option value='0' selected>Selecione grado</option>";
    foreach( $SelectGrados as $gra){
        $cadena = $cadena . '<option  value=' . $gra["idgrado"] . '>' . $gra["grados"] . '</option>';
    }
	echo($cadena . "</select>");
}
elseif(isset($_REQUEST["Login"])){// si ocurrio un click en el boton en el formulario de login llamado login
    if(isset($_POST["Matricula"],$_POST["Contrasena"])){// necesitamos sabes que existen 
        include_once("usuarios.php");// incluimos el archivo suario que contiene la clase
        $matricula = $_POST["Matricula"];//guardamos lo que nos paso por post en varibales
        $Contrasena = $_POST["Contrasena"];
        session_start();// abrimos las sessiones
        try{// validamos los errores si ocurre en la consula 
            $login = usuario::Login($matricula,$Contrasena);// como es una funcion estatica lo llamamos asi y
            // y lo almacenamos en una varibaler login que devolvera un array de la tabla 
            if($login!= null){// si las crecenciales son correctas abriras las sesiones 
                $_SESSION["matricula"]= $login["matricula"];
                $_SESSION["correo"]= $login["correo"];
                $_SESSION["id_tipo"]= $login["id_tipo"];
                unset($_SESSION["error"]);
                header("location: ../inicio?matricula=".$_SESSION['matricula']."&tools=Inicio");// y si esta todo bien hasta esta parte necesitamos mandarlo al inicio
            }else{ // si las credenciales no conciden nos devolvera un null el metodo
                unset($_SESSION["matricula"]);
                unset($_SESSION["correo"]);
                unset($_SESSION["id_tipo"]);
                $_SESSION["error"]= "Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '¡Ingrese las credenciales correctas!'
                    })";// en esta session alamcenaramos el error para mostrarlo en un alert en bootstrap
                header("location: ../login");// y como las credenciales no son correctas lo direcionaremos de nuevo al login 
            }
        }
        catch(Exception $e){// si ocurrio un eror lo guardaremos en e
            session_destroy();// y borramos las session 
            header("location: ../login");// y lo mandamos de nuevo al login
        }
    }
    else{
        header("location: ../login");//si no nos trajo una de las 2 en post lo regramos 
    }
}// Alumno registar
elseif(isset( $_POST["Correo"],$_POST["Contrasena"],$_POST["Nombre"],$_POST["Paterno"],$_POST["Materno"],$_FILES["image"],$_POST["clave"])&& $claveAdmin == $_POST["clave"]){
    include_once("conexion.php");
    include_once("usuarios.php");
    $Correo = $_POST["Correo"];
    $Contrasena = $_POST["Contrasena"];
    $Nombre = $_POST["Nombre"];
    $Paterno = $_POST["Paterno"];
    $Materno = $_POST["Materno"];
    $imagenSize = $_FILES["image"]["size"];
    try{
        if(empty($_FILES["image"]["tmp_name"])){
            throw new Exception('Te ah faltado tu Fotografia ');
        }
        $ECorreo = usuario::CorreosExits($Correo);
        // print_r($ECorreo);
        // // echo $ECorreo["correo"];
        if($ECorreo != null){
            throw new Exception(' El Correo ya ha sido registrado ');
        }
        else{
            $imgenSubida = fopen($_FILES["image"]["tmp_name"],"r");
        $binario= fread($imgenSubida,$imagenSize);
        $conexion= new Conexion();
        $conexion->Conectar();
        $binario= mysqli_escape_string($conexion->con,$binario);
    
        usuario::RegistroUsuario($Nombre,$Paterno,$Materno,$Correo,$Contrasena,$binario,1);
        usuario::RegistroAdmins($Correo,$Contrasena);
        echo"<script>Swal.fire(
            'Bien Hecho!',
            'Te haz registrado correctamente!',
            'success'
          )</script>";
        }
    }
    catch(Exception $e){
        // echo $e;
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡". $e->getMessage()."!'
          })</script>";
    }

}
elseif(isset( $_POST["Correo"],$_POST["Contrasena"],$_POST["Nombre"],$_POST["Paterno"],$_POST["Materno"],$_POST["Grado"],$_FILES["image"],$_POST["clave"])&& $claveAlumno == $_POST["clave"]){
    include_once("conexion.php");
    include_once("usuarios.php");
    $Correo = $_POST["Correo"];
    $Contrasena = $_POST["Contrasena"];
    $Nombre = $_POST["Nombre"];
    $Paterno = $_POST["Paterno"];
    $Materno = $_POST["Materno"];
    $Grado = $_POST["Grado"];
    $imagenSize = $_FILES["image"]["size"];
    try{
        if(empty($_FILES["image"]["tmp_name"])){
            throw new Exception('imagen no cargada!');
        }
        $ECorreo = usuario::CorreosExits($Correo);
       
        if($ECorreo != null){
            throw new Exception(' El Correo ya ha sido registrado ');
        }
        $imgenSubida = fopen($_FILES["image"]["tmp_name"],"r");
        $binario= fread($imgenSubida,$imagenSize);
        $conexion= new Conexion();
        $conexion->Conectar();
        $binario= mysqli_escape_string($conexion->con,$binario);
    
        usuario::RegistroUsuario($Nombre,$Paterno,$Materno,$Correo,$Contrasena,$binario,3);
        usuario::RegistroAlumno($Correo,$Contrasena,$Grado);
        echo"<script>Swal.fire(
            'Bien Hecho!',
            'Te haz registrado correctamente!',
            'success'
          )</script>";
    }
    catch(Exception $e){
        // echo $e;
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡". $e->getMessage()."!'
          })</script>";
    }

}
// registro docente
elseif(isset( $_POST["Correo"],$_POST["Contrasena"],$_POST["Nombre"],$_POST["Paterno"],$_POST["Materno"],$_POST["Entrada"],$_POST["Salida"],$_POST["Atencion"],$_FILES["image"],$_POST["clave"] )&& $claveDocente == $_POST["clave"]){
    include_once("conexion.php");
    include_once("usuarios.php");
    $Correo = $_POST["Correo"];
    $Contrasena = $_POST["Contrasena"];
    $Nombre = $_POST["Nombre"];
    $Paterno = $_POST["Paterno"];
    $Materno = $_POST["Materno"];
    $Entrada = $_POST["Entrada"];
    $Salida = $_POST["Salida"];
    $Atencion = $_POST["Atencion"];
    $imagenSize = $_FILES["image"]["size"];
    try{
        if(empty($_FILES["image"]["tmp_name"])){
            throw new Exception('imagen no cargada!');
        }
        $ECorreo = usuario::CorreosExits($Correo);
     ;
        if($ECorreo != null){
            throw new Exception(' El Correo ya ha sido registrado ');
        }
        $imgenSubida = fopen($_FILES["image"]["tmp_name"],"r");
        $binario= fread($imgenSubida,$imagenSize);
        $conexion= new Conexion();
        $conexion->Conectar();
        $binario= mysqli_escape_string($conexion->con,$binario);
    
        usuario::RegistroUsuario($Nombre,$Paterno,$Materno,$Correo,$Contrasena,$binario,2);
        usuario::RegistroDocente($Correo,$Contrasena,$Entrada,$Salida,$Atencion);//corregir el id grado
        echo"<script>Swal.fire(
            'Bien Hecho!',
            'Te haz registrado correctamente!',
            'success'
          )</script>";
    }
    catch(Exception $e){
        // echo $e;
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡". $e->getMessage()."!'
          })</script>";
    }
}
//registro Administrador
elseif(isset($_REQUEST["UpdatePerfil"])){// actualizar usuarios
    session_start();
    if(isset($_SESSION["matricula"],$_SESSION["correo"],$_POST["Nombre"],$_POST["Paterno"],$_POST["Materno"],$_FILES["Foto"])){
        include_once("usuarios.php");
        include_once("conexion.php");
        $matricula = $_SESSION["matricula"];
        $Correo = $_SESSION["correo"];
        $Nombre = $_POST["Nombre"];
        $Paterno = $_POST["Paterno"];
        $Materno = $_POST["Materno"];
        if( $_FILES["Foto"]["tmp_name"] == ""){
            $binario = "";
        }
        else{
            $imagenSize = $_FILES["Foto"]["size"];
            $imgenSubida = fopen($_FILES["Foto"]["tmp_name"],"r");
            $binario= fread($imgenSubida,$imagenSize);
            $conexion= new Conexion();
            $conexion->Conectar();
            $binario= mysqli_escape_string($conexion->con,$binario);
        }
        usuario::UpdatePerfil($matricula,$Nombre,$Paterno,$Materno,$Correo,$binario);
        if(  $_SESSION["id_tipo"] == 3 && isset($_POST["idgrado"],$_POST["Grado"]) ){
            include_once("alumno.php");
            if(isset($_POST["checkbox"])&& $_POST["checkbox"]== "true"){
                echo"aca if ";
                Alumno::UpdateAlumno($_POST["idgrado"],$_SESSION["idalumno"]);
            }
            else{
                echo"aca ando else";
                Alumno::UpdateAlumno($_POST["Grado"],$_SESSION["idalumno"]);
            }
        }
        elseif($_SESSION["id_tipo"] ==2 && isset($_POST["Entrada"],$_POST["Dias"],$_POST["Salida"])){
            include_once("docente.php");
            Docente::UpdateDocente($_POST["Entrada"],$_POST["Dias"],$_POST["Salida"],$_SESSION["iddocente"]);
        }
        elseif($_SESSION["id_tipo"] ==1){
        }
        print_r($_POST);
        header("location: ../inicio?matricula=".$_SESSION['matricula']."&tools=Inicio");
    }
}

