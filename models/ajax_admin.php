<?php
if (isset($_POST["idadmin"], $_POST["matricula"])) {
    include_once("admin.php");
    Admin::EliminarAdmin($_POST["idadmin"]);
    Admin::EliminarUs($_POST["matricula"]);
    echo "  <script>Swal.fire(
        'Se Elimino!',
        'Exitosamente!',
        'success'
      )</script>";
}
// editar administrador
elseif (isset($_POST["matricula"], $_POST["nombre"], $_POST["paterno"], $_POST["materno"], $_POST["correo"], $_POST["pass"], $_POST["check"])) {
    try {
        include_once("admin.php");
        if ($_POST["check"] ==  "false") {
            include_once("usuarios.php");
            $ECorreo = usuario::CorreosExits($_POST["correo"]);
            if ($ECorreo != null) {
                throw new Exception(' El Correo ya ha sido registrado ');
            }
        }
        Admin::EditUs($_POST["matricula"], $_POST["nombre"], $_POST["paterno"], $_POST["materno"], $_POST["pass"], $_POST["correo"]);

        echo "  <script>Swal.fire(
            'Se Actulizo!',
            'Exitosamente!',
            'success'
          )</script>";
        echo "<script>$('#udpateAdmin').modal('hide');</script>";
    } catch (Exception $e) {
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡" . $e->getMessage() . "!'
          })</script>";
    }
} elseif (isset($_POST["matriculad"], $_POST["nombre"], $_POST["paterno"], $_POST["materno"], $_POST["correo"], $_POST["pass"], $_POST["check"], $_POST["entrada"], $_POST["atencion"], $_POST["salida"], $_POST["iddoce"])) {
    try {
        include_once("admin.php");
        if ($_POST["check"] ==  "false") {
            include_once("usuarios.php");
            $ECorreo = usuario::CorreosExits($_POST["correo"]);
            if ($ECorreo != null) {
                throw new Exception(' El Correo ya ha sido registrado ');
            }
        }
        include_once("docente.php");
        Admin::EditUs($_POST["matriculad"], $_POST["nombre"], $_POST["paterno"], $_POST["materno"], $_POST["pass"], $_POST["correo"]);
        Docente::UpdateDocente($_POST["entrada"], $_POST["atencion"], $_POST["salida"], $_POST["iddoce"]);
        echo "  <script>Swal.fire(
            'Se Actulizo!',
            'Exitosamente!',
            'success'
          )</script>";
        echo "<script>$('#udpateDocente').modal('hide');</script>";
    } catch (Exception $e) {
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡" . $e->getMessage() . "!'
          })</script>";
    }
}
// editar alumnos 
elseif (isset($_POST["matriculaA"], $_POST["nombre"], $_POST["paterno"], $_POST["materno"], $_POST["correo"], $_POST["pass"], $_POST["check"], $_POST["check2"], $_POST["Grado"], $_POST["idgrado"], $_POST["idalumno"])) {
    try{
        include_once("admin.php");
        if($_POST["check"]==  "false"){
            include_once("usuarios.php");
            $ECorreo = usuario::CorreosExits($_POST["correo"]);
            if($ECorreo != null){
                throw new Exception(' El Correo ya ha sido registrado ');
            }
        }
        include_once("alumno.php");
        Admin::EditUs($_POST["matriculaA"],$_POST["nombre"],$_POST["paterno"],$_POST["materno"],$_POST["pass"],$_POST["correo"]);
        if($_POST["check2"] == "true"){
            Alumno::UpdateAlumno($_POST["Grado"], $_POST["idalumno"]);
        }
        else{
            Alumno::UpdateAlumno($_POST["idgrado"], $_POST["idalumno"]);
        }
        echo"<script>Swal.fire(
            'Se Actulizo!',
            'Exitosamente!',
            'success'
          )</script>";
        echo "<script>$('#updateAlumno').modal('hide');</script>";

    }
    catch(Exception $e){
        echo "<script>Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡". $e->getMessage()."!'
          })</script>";
    }
    
}
elseif (isset($_POST["iddocenteDelete"], $_POST["matricula"])) {
    include_once("admin.php");
    Admin::EliminarDocente($_POST["iddocenteDelete"]);
    Admin::EliminarUs($_POST["matricula"]);
    echo "  <script>Swal.fire(
        'Se Elimino!',
        'Exitosamente!',
        'success'
      )</script>";
} elseif (isset($_POST["VerDocenteMateriaId"])) {
    include_once("admin.php");
    $cadena = '<table class="table table-success  table-hover table-striped text-center">
    <thead>
        <tr>
            <th scope="col">Id Materia</th>
            <th scope="col">Materia</th>
            <th scope="col">Escolaridad</th>
            <th scope="col">Grado</th>
            <th scope="col">Aciones</th>
        </tr>
    </thead>
    <tbody>';
    require_once("admin.php");
    $DocenteMateria = Admin::VerDocenteMateria($_POST["VerDocenteMateriaId"]);
    foreach ($DocenteMateria as $A) {
        $cadena = $cadena .
            '<tr class="align-middle font-monospace" >
            <th id="matricula_' . $A["iddocente"] . '"><span class="input-group-text rounded-pill">' . $A["iddocentemateria"] . '</span></td>
            <td id="nom_' . $A["iddocente"] . '"><span class="input-group-text rounded-pill">' . $A["materias"] . '</span></td>
            <td id="pat_' . $A["iddocente"] . '"><span class="input-group-text  rounded-pill">' . $A["escolaridad"] . '</span></td>
            <td id="mat_' . $A["iddocente"] . '"><span class="input-group-text rounded-pill">' . $A["grados"] . '</span></td>
            <td>
                </button> <button class="btn btn-danger m-1 rounded-3  fas fa-trash-alt" onclick="DeleteMateriaDocente(this.value)" value="' . $A["iddocentemateria"] . '"></button>
            </td>
        </tr>';
    }
    echo $cadena . "</tbody>
</table>";
} elseif (isset($_POST["idmateriadocente"])) {
    include_once("docente.php");
    Docente::deleteMateriaDocente($_POST["idmateriadocente"]);
}
// eliminar alumno
elseif (isset($_POST["idalumnoDelete"], $_POST["matriculaA"])) {
    include_once("admin.php");
    Admin::EliminarAlumno($_POST["idalumnoDelete"]);
    Admin::EliminarUs($_POST["matriculaA"]);
    echo "  <script>Swal.fire(
        'Se Elimino!',
        'Exitosamente!',
        'success'
      )</script>";
}
elseif (isset($_POST["VerCalificacionAlumno"],$_POST["idgrado"])) {
    include_once("admin.php");
    $cadena = '<table class="table table-success  table-hover table-striped text-center">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Materias</th>
            <th scope="col">Calificacion</th>

        </tr>
    </thead>
    <tbody>';
    include_once("alumno.php");
    include_once("admin.php");
    $materia = Alumno::Materias($_POST["idgrado"]);
    session_start();
    $_SESSION["idalumno"]=$_POST["VerCalificacionAlumno"];
    $_SESSION["idgrado"]=$_POST["idgrado"];
    $datos = Admin::DatosPdf($_POST["VerCalificacionAlumno"],3);
    if ($datos == null) {
        header("location: inicio?matricula=" . $_SESSION['matricula'] . "&tools=Inicio");
    }
    $calificacion = array();
    for ($i = 0; $i < count($materia); $i++) {
        $wf = Alumno::CaliMateria($_POST["VerCalificacionAlumno"], $materia[$i]["idmaterias"]);
        array_push($calificacion, $wf);
    }
    $total = 0;
    if ($datos["escolaridad"] == "Preescolar") {
        $Clave = "21PJN0475K";
    } elseif ($datos["escolaridad"] == "Primaria") {
        $Clave = "21PPR00794M";
    } elseif ($datos["escolaridad"] == "Secundaria") {
        $Clave = "21PES0492K";
    } else {
        $Clave = "";
    }
    $i=0;
    foreach ($calificacion as $A) {
        $cadena = $cadena .
        '<tr class="align-middle font-monospace" >
            <th><span class="input-group-text rounded-pill">' . $i+1 . '</span></td>
            <td><span class="input-group-text rounded-pill">' . $materia[$i]["materias"] . '</span></td>
            <td><span class="input-group-text  rounded-pill">' . $A["cali"] . '</span></td>
            
        </tr>';
        $i++;
    }
    echo $cadena . "</tbody>
</table>";

}
elseif(isset($_POST["databaseReiniciar"])){
    include_once("admin.php");
    Admin::ReiniciarDatabase();

}