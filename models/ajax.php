<?php

if (isset($_POST["materia"])) {
    include_once("alumno.php");
    session_start();
    if ($_SESSION["tools"] == "Tareas") {
        $cadena = '<table class="table table-primary  table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tiulo</th>
                <th scope="col">Tema</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Publicado</th>
                <th scope="col">Entrega</th>
                <th scope="col">Calificación</th>
                <th scope="col">Comentario</th>
            </tr>
        </thead>
        <tbody>';
        $Tarea = Alumno::Tareas($_POST["materia"], $_SESSION["idalumno"]);
        $i = 1;
        foreach ($Tarea as $T) {
            $cadena = $cadena .
                '<tr>
                <td>' . $i . '</td>
                <td><input type="text" disabled value="' . $T["titulo"] . '" ></td>
                <td><input type="text" disabled value="' . $T["tema"] . '" ></td>
                <td><input type="text" disabled value="' . $T["descripcion"] . '" ></td>
                <td> <input disabled type="datetime"  value="' . $T["fecha_publicacion"] . '"></td>
                <td> <input disabled type="datetime" value="' . $T["fecha_publicacion"] . '"></td>
                <td><input type="text" disabled value="' . $T["calificacion"] . '" ></td>
                <td><input type="text" disabled value="' . $T["comentario"] . '" ></td>
                </tr>';
            $i++;
        }
    } elseif ($_SESSION["tools"] == "Asistencias") {
        $cadena = '<table class="table table-primary  table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Asistencia</th>
                <th scope="col">Observacion</th>
                <th scope="col">Fecha</th>
            </tr>
        </thead>
        <tbody>';
        $Asistencia = Alumno::Asistencias($_SESSION["idalumno"], $_POST["materia"]);
        $i = 1;
        foreach ($Asistencia as $A) {
            $cadena = $cadena .
                '<tr>
                <td>' . $i . '</td>
                <td><input type="text" disabled value="' . $A["asistencia"] . '" ></td>
                <td><input type="text" disabled value="' . $A["observacion"] . '" ></td>
                <td><input type="text" disabled value="' . $A["fecha"] . '" ></td>
                </tr>';
            $i++;
        }
    }
    echo $cadena . "</tbody>
    </table>";
    
} elseif (isset($_POST["escolaridad"], $_POST["esco"])) {
    include_once("usuarios.php");
    $Tarea = usuario::Grados($_POST["escolaridad"]);
    $g = '';
    echo '<p class="lead text-muted text-center">Selecciona un GRADO</p>';
    echo '<h6 class="card-title text-center">GRADOS: </h6>';
    foreach ($Tarea as $grados) {

        //Esto comprende de 1 año a 3 año de preescolar
        if (($grados["idgrado"] >= 1) && ($grados["idgrado"] <= 3)) {
            $g = $g . '<button id="gr' . $grados["idgrado"] . '" type="submit" class="col-8 m-4 col-sm-3 btn btn-outline-primary btn-lg mt-3" onclick="Materias(this.value)" value="' . $grados["idgrado"] . '" >' . $grados["grados"] . '</button>';
        }
        //Esto comprende de 1 año a 6 año de preescolar
        else if (($grados["idgrado"] >= 4) && ($grados["idgrado"] <= 9)) {
            $g = $g . '<button id="gr' . $grados["idgrado"] . '" type="submit" class="col-8 m-4 col-sm-3 btn btn-outline-success btn-lg mt-3" onclick="Materias(this.value)" value="' . $grados["idgrado"] . '" >' . $grados["grados"] . '</button>';
        }
        //Esto comprendo de 1 año a 3 año de secundaria
        else if (($grados["idgrado"] >= 10) && ($grados["idgrado"] <= 12)) {
            $g = $g . '<button id="gr' . $grados["idgrado"] . '" type="submit" class="col-8 m-4 col-sm-3 btn btn-outline-danger btn-lg mt-3" onclick="Materias(this.value)" value="' . $grados["idgrado"] . '" >' . $grados["grados"] . '</button>';
        }
    }
    echo $g;
} elseif (isset($_POST["grado"])) {
    session_start();
    $materia = '';
    echo '<p class="lead text-muted text-center">Selecciona una MATERIA</p>';
    echo '<h6 class="card-title text-center">MATERIAS: </h6>';
    if ($_SESSION["tools"] == "Asignar_Tarea") {
        include_once("docente.php");
        $Materias = Docente::Materiasdocente($_POST["grado"], $_SESSION["iddocente"]);
        foreach ($Materias as $ma) {
            if (($ma["idmaterias"] >= 11) && ($ma["idmaterias"] <= 36)) {
                $materia = $materia . '<button ondblclick="EliminarMaterias(this.value)"  id="mat' . $ma["idmaterias"] . '" type="submit" data-bs-toggle="modal" data-bs-target="#nueva_tarea"  class="col-8 m-4 col-sm-3 btn btn-outline-primary btn-lg mt-3"  onclick="idmateria(this.value,this.innerText )"  value="' . $ma["idmaterias"] . '" >' . $ma["materias"] . '</button>';
            } else if (($ma["idmaterias"] >= 41) && ($ma["idmaterias"] <= 99)) {
                $materia = $materia . '<button ondblclick="EliminarMaterias(this.value)"  id="mat' . $ma["idmaterias"] . '" type="submit" data-bs-toggle="modal" data-bs-target="#nueva_tarea"  class="col-8 m-4 col-sm-3 btn btn-outline-success btn-lg mt-3"  onclick="idmateria(this.value,this.innerText )"  value="' . $ma["idmaterias"] . '" >' . $ma["materias"] . '</button>';
            } else if (($ma["idmaterias"] >= 101) && ($ma["idmaterias"] <= 127)) {
                $materia = $materia . '<button ondblclick="EliminarMaterias(this.value)"  id="mat' . $ma["idmaterias"] . '" type="submit" data-bs-toggle="modal" data-bs-target="#nueva_tarea"  class="col-8 m-4 col-sm-3 btn btn-outline-danger btn-lg mt-3"  onclick="idmateria(this.value,this.innerText )"  value="' . $ma["idmaterias"] . '" >' . $ma["materias"] . '</button>';
            }
        }
    } elseif ($_SESSION["tools"] == "Revisar_Tarea") {
        include_once("docente.php");
        $Materias = Docente::Materiasdocente($_POST["grado"], $_SESSION["iddocente"]);
        foreach ($Materias as $ma) {
            if (($ma["idmaterias"] >= 11) && ($ma["idmaterias"] <= 36)) {
                $materia = $materia . '<button id="mat' . $ma["idmaterias"] . '" type="submit"  onclick="idmateria(this.value,this.innerText )" class="col-8 m-4 col-sm-3 btn btn-outline-primary btn-lg mt-3" value="' . $ma["idmaterias"] . '" >' . $ma["materias"] . '</button>';
            } else if (($ma["idmaterias"] >= 41) && ($ma["idmaterias"] <= 99)) {
                $materia = $materia . '<button id="mat' . $ma["idmaterias"] . '" type="submit"  onclick="idmateria(this.value,this.innerText )" class="col-8 m-4 col-sm-3 btn btn-outline-success btn-lg mt-3" value="' . $ma["idmaterias"] . '" >' . $ma["materias"] . '</button>';
            } else if (($ma["idmaterias"] >= 101) && ($ma["idmaterias"] <= 127)) {
                $materia = $materia . '<button id="mat' . $ma["idmaterias"] . '" type="submit"  onclick="idmateria(this.value,this.innerText )" class="col-8 m-4 col-sm-3 btn btn-outline-danger btn-lg mt-3" value="' . $ma["idmaterias"] . '" >' . $ma["materias"] . '</button>';
            }
        }
    } elseif ($_SESSION["tools"] == "Nueva_Materia") {
        include_once("usuarios.php");
        $TodasMaterias = usuario::Materias($_POST["grado"]);
        foreach ($TodasMaterias as $To) {
            if (($To["idmaterias"] >= 11) && ($To["idmaterias"] <= 36)) {
                $materia = $materia . '<button id="mat' . $To["idmaterias"] . '" type="submit"  onclick="idmateria(this.value,this.innerText )" data-bs-toggle="modal" data-bs-target="#nueva_materia" class="col-8 m-4 col-sm-3 btn btn-outline-primary btn-lg mt-3" value="' . $To["idmaterias"] . '" >' . $To["materias"] . '</button>';
            } else if (($To["idmaterias"] >= 41) && ($To["idmaterias"] <= 99)) {
                $materia = $materia . '<button id="mat' . $To["idmaterias"] . '" type="submit"  onclick="idmateria(this.value,this.innerText )" data-bs-toggle="modal" data-bs-target="#nueva_materia" class="col-8 m-4 col-sm-3 btn btn-outline-success btn-lg mt-3" value="' . $To["idmaterias"] . '" >' . $To["materias"] . '</button>';
            } else if (($To["idmaterias"] >= 101) && ($To["idmaterias"] <= 127)) {
                $materia = $materia . '<button id="mat' . $To["idmaterias"] . '" type="submit"  onclick="idmateria(this.value,this.innerText )" data-bs-toggle="modal" data-bs-target="#nueva_materia" class="col-8 m-4 col-sm-3 btn btn-outline-danger btn-lg mt-3" value="' . $To["idmaterias"] . '" >' . $To["materias"] . '</button>';
            }
        }
    } elseif ($_SESSION["tools"] == "Asistencia") {
        include_once("docente.php");
        $Materias = Docente::Materiasdocente($_POST["grado"], $_SESSION["iddocente"]);
        foreach ($Materias as $ma) {
            if (($ma["idmaterias"] >= 11) && ($ma["idmaterias"] <= 36)) {
                $materia = $materia . '<button id="mat' . $ma["idmaterias"] . '" type="submit"  onclick="asistenciaIdmateria(this.value,this.innerText )" class="col-8 m-4 col-sm-3 btn btn-outline-primary btn-lg mt-3" value="' . $ma["idmaterias"] . '" >' . $ma["materias"] . '</button>';
            } else if (($ma["idmaterias"] >= 41) && ($ma["idmaterias"] <= 99)) {
                $materia = $materia . '<button id="mat' . $ma["idmaterias"] . '" type="submit"  onclick="asistenciaIdmateria(this.value,this.innerText )" class="col-8 m-4 col-sm-3 btn btn-outline-success btn-lg mt-3" value="' . $ma["idmaterias"] . '" >' . $ma["materias"] . '</button>';
            } else if (($ma["idmaterias"] >= 101) && ($ma["idmaterias"] <= 127)) {
                $materia = $materia . '<button id="mat' . $ma["idmaterias"] . '" type="submit"  onclick="asistenciaIdmateria(this.value,this.innerText )" class="col-8 m-4 col-sm-3 btn btn-outline-danger btn-lg mt-3" value="' . $ma["idmaterias"] . '" >' . $ma["materias"] . '</button>';
            }
        }
    }
    echo ($materia);
} elseif (isset($_POST["tema"], $_POST["titulo"], $_POST["descripcion"], $_POST["fecha_entrega"], $_POST["fecha_publicacion"], $_POST["idmateria"])) {
    include_once("docente.php");
    $ti     = $_POST["titulo"];
    $te     = $_POST["tema"];
    $des    = $_POST["descripcion"];
    $pub    = $_POST["fecha_publicacion"];
    $en     = $_POST["fecha_entrega"];
    $mat    = $_POST["idmateria"];
    session_start();
    $idmateriadocente = Docente::iddocentemate($mat, $_SESSION["iddocente"]);
    
    Docente::Nueva_Tarea($ti, $te, $des, $pub, $en, $idmateriadocente["iddocentemateria"]);
    echo "<script>console.log('publicado');</script>";
} elseif (isset($_POST["T_idmateria"], $_POST["idtarea"])) {
    include_once("docente.php");
    $verTarea = Docente::Ver_Tarea($_POST["T_idmateria"], $_POST["idtarea"]);
    $cali =  array(0, 5, 6, 7, 8, 9, 10);
    $cadena = '<table class="table table-primary  table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
           
            <th scope="col">Nombre Del Alumno</th>
            <th scope="col">calificacion</th>
            <th scope="col">comentario</th>
            <th scope="col">Opciones</th>

        </tr>
    </thead>
    <tbody>';
    $op = '';
    $i = 1;
    foreach ($verTarea as $A) {
        for ($x = 0; $x < count($cali); $x++) {
            if ($cali[$x] == $A["calificacion"]) {
                $op = $op . '<option selected value="' . $cali[$x] . '">' . $cali[$x] . '</option>';
            } else {
                $op = $op . '<option value="' . $cali[$x] . '">' . $cali[$x] . '</option>';
            }
        }
        $cadena = $cadena .
            '<tr>
            <td>' . $i . '</td>

            <td>' . $A["nombre"] . ' ' . $A["paterno"] . ' ' . $A["materno"] . '</td>
            <td>    <select id="cali_' . $A["idalumno"] . '" class="form-select">
                        ' . $op . '
                    </select>' . '
            </td>
            <td> <input type="text" class="form-control-plaintext border border-success" id="coment_' . $A["idalumno"] . '" value="' . $A["comentario"]  . '"></td>
            <td> <button class="btn btn-warning far fa-edit" type="submit" onclick="CambiarCali(this.value)" value="' . $A["idalumno"]  . '"></button> <button class="btn btn-danger fas fa-trash-alt" type="submit" onclick="eliminarCali(this.value)" value="' . $A["idalumno"]  . '"></button> </td>
        </tr>';
        $i++;
        $op = "";
    }
    echo $cadena . "</tbody>
    </table>";
} elseif (isset($_POST["mate"])) {
    include_once("docente.php");
    session_start();
    echo '<p class="lead text-muted text-center">Selecciona una Tarea</p>';
    echo '<h6 class="card-title text-center">TAREAS: </h6>';
    $T = '';
    $cadena = '<table class="table table-primary  table-striped table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
               
                <th scope="col">Tema</th>
                <th scope="col">Titulo</th>
                <th scope="col">descripcion</th>
                <th scope="col">Fecha Entrega</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>';
    $i = 1;
    $Tareas = Docente::Tareas($_POST["mate"]);
    foreach ($Tareas as $ta) {
        $cadena = $cadena .
        '<tr>
            <td>' . $i . '</td>
            <td><span class="input-group-text rounded-pill"><input style="border-top-style: hidden; border-right-style: hidden; border-left-style: hidden;" type="text" disabled value="' . $ta["tema"] . '"></span></td>
            <td><span class="input-group-text rounded-pill"><input style="border-top-style: hidden; border-right-style: hidden; border-left-style: hidden;" type="text" disabled value="' . $ta["titulo"] . '"></span></td>
            <td><span class="input-group-text rounded-pill"><input style="border-top-style: hidden; border-right-style: hidden; border-left-style: hidden;" type="text" disabled value="' . $ta["descripcion"] . '"></span></td>
            <td><span class="input-group-text rounded-pill"><input style="border-top-style: hidden; border-right-style: hidden; border-left-style: hidden;" type="datetime" disabled value="' . $ta["fecha_entrega"] . '" ></span></td>
            <td><button class="btn btn-primary far fa-eye" type="submit" onclick="VerTareas(this.value)" value="' . $ta["idtarea"] . '" ></button> <button  class="btn btn-danger fas fa-trash-alt" type="submit" onclick="EliminarTarea(this.value)" value="' . $ta["idtarea"] . '" ></button></td>
        </tr>';
        $i++;
    }
    echo $cadena . "</tbody>";
} elseif (isset($_POST["NuevaMateria"])) {
    include_once("docente.php");
    session_start();
    Docente::NuevaMateria($_SESSION["iddocente"], $_POST["NuevaMateria"]);
    echo "<script>console.log('Se Agrego Nueva Materia')</script>";
} elseif (isset($_POST["caliidalumno"], $_POST["califi"], $_POST["comentario"], $_POST["IdTarea"])) {
    include_once("docente.php");
    Docente::AuctualizaCali($_POST["IdTarea"], $_POST["califi"], $_POST["comentario"], $_POST["caliidalumno"]);
} elseif (isset($_POST["idalumnoeliminar"], $_POST["IdTarea"])) {
    include_once("docente.php");
    Docente::EliminarCali($_POST["IdTarea"], $_POST["idalumnoeliminar"]);
} elseif (isset($_POST["EliminatareaId"])) {
    // echo $_POST["EliminatareaId"];
    include_once("docente.php");
    Docente::ElimnarTarea($_POST["EliminatareaId"]);
} elseif (isset($_POST["AlumnosGrados"], $_POST["nombremate"])) {
    include_once("docente.php");

    
    $cadena = '<table class="table table-primary  table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre Completo</th>
            <th scope="col">Observacion</th>
            <th scope="col">Asistencia</th>
            <th scope="col">Opciones</th>

        </tr>
    </thead>
    <tbody>';
    $i = 1;
    $Alumnos = Docente::AlumnosGrado($_POST["AlumnosGrados"]);
    foreach ($Alumnos as $ta) {
        $cadena = $cadena .
        '<tr>
            <td><span class="input-group-text rounded-pill">' . $i . '</span></td>
            <td ><span class="input-group-text rounded-pill">' . $ta["nombre"] . " " . $ta["paterno"] . " " . $ta["materno"] . '</span></td>
            <td><span><input class="input-group-text rounded-pill" style="border-top-style: hidden; border-right-style: hidden; border-left-style: hidden;" id="coment' . $ta["idalumno"] . '" type="text" ></span></td>
            <td><span><select class="input-group-text rounded-pill" style="border-top-style: hidden; border-right-style: hidden; border-left-style: hidden;" id="pase' . $ta["idalumno"] . '"><option value="Asistencia">Asistio</option><option value="Falta">Falta</option><option value="Justificado">Justificada</option></select></span></td>
            <td><button class="btn btn-success far fa-save"  type="submit" onclick="ActualizaAsistencia(this.value)"  value="' . $ta["idalumno"] . '" ></button> </td>
        </tr>';
        $i++;
    }
    echo $cadena . "</tbody>";
} elseif (isset($_POST["asistencia"], $_POST["comentario"], $_POST["idalumno"], $_POST["idmateria"], $_POST["fechaActual"])) {
    include_once("docente.php");
    session_start();
    $idmateriadocente = Docente::iddocentemate($_POST["idmateria"], $_SESSION["iddocente"]);
    $asistencia = $_POST["asistencia"];
    $comentario = $_POST["comentario"];
    $idalumno = $_POST["idalumno"];
    $fechaActual = $_POST["fechaActual"];
    Docente::NuevaAsistencia($asistencia, $comentario, $idalumno, $idmateriadocente["iddocentemateria"], $fechaActual);
} 
elseif (isset($_POST["tabla_admins"])) {
    $cadena = '<table class="table table-success table-striped text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Paterno</th>
                <th scope="col">Materno</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Correo electronico</th>
                <th scope="col">Fotografia</th>

                <th scope="col">Aciones</th>
    
    
            </tr>
        </thead>
        <tbody>';
    require_once("admin.php");
    $VerAdmin = Admin::VerAdmins();
    foreach ($VerAdmin as $A) {
        $cadena = $cadena .
            '<tr class="align-middle">
                <th id="matricula_'.$A["idadministrador"].'"><span class="input-group-text rounded-pill">' . $A["matricula"] . '</span></td>
                <td id="nom_'.$A["idadministrador"].'"><span class="input-group-text rounded-pill">' . $A["nombre"] . '</span></td>
                <td id="pat_'.$A["idadministrador"].'"><span class="input-group-text rounded-pill">' . $A["paterno"] . '</span></td>
                <td id="mat_'.$A["idadministrador"].'"><span class="input-group-text rounded-pill">' . $A["materno"] . '</span></td>
                <td><input disabled class="form-control rounded-pill"  id="pass_'.$A["idadministrador"].'" type="password" value="' . $A["contrasena"] . '"></td>
                <td id="mail_'.$A["idadministrador"].'"><span class="input-group-text rounded-pill">' . $A["correo"] . '</span></td>
                <td><img src="data:imagen/*;base64,'. base64_encode($A["foto"]) .'" width="75px" ></td>
                <td><button class="fas fa-edit btn btn-success" onclick="EditarAdmin(this.value)" value="' . $A["idadministrador"] . '"></button> <button class="btn btn-danger fas fa-trash-alt" onclick="EliminarAdmin(this.value)" value="' . $A["idadministrador"] . '"></button></td>
            </tr>';
    }
    echo $cadena . "</tbody>
    </table>";
} 
//tabla docente de administrador
elseif (isset($_POST["tabladocentes"])) {
    $cadena = '<table class="table table-success  table-hover table-striped text-center">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Paterno</th>
                <th scope="col">Materno</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Correo electronico</th>
                <th scope="col">Entrada</th>
                <th scope="col">Atención</th>
                <th scope="col">Salida</th>
                <th scope="col">Fotografia</th>
                <th scope="col">Aciones</th>
            </tr>
        </thead>
        <tbody>';
    require_once("admin.php");
    $VerAdmin = Admin::VerDocentes();
    foreach ($VerAdmin as $A) {
        $cadena = $cadena .
            '<tr class="align-middle font-monospace" >
                <th id="matricula_'.$A["iddocente"].'"><span class="input-group-text rounded-pill">' . $A["matricula"] . '</span></td>
                <td id="nom_'.$A["iddocente"].'"><span class="input-group-text rounded-pill">' . $A["nombre"] . '</span></td>
                <td id="pat_'.$A["iddocente"].'"><span class="input-group-text  rounded-pill">' . $A["paterno"] . '</span></td>
                <td id="mat_'.$A["iddocente"].'"><span class="input-group-text rounded-pill">' . $A["materno"] . '</span></td>
                <td><input disabled class="form-control rounded-pill" id="pass_'.$A["iddocente"].'" type="password" value="' . $A["contrasena"] . '"></td>
                <td id="mail_'.$A["iddocente"].'"><span class="input-group-text rounded-pill">' . $A["correo"] . '</span></td>
                <td id="entrada_'.$A["iddocente"].'"><span class="input-group-text rounded-pill">' . $A["entrada"] . '</span></td>
                <td ><input type="text" disabled id="dias_'.$A["iddocente"].'" class="input-group-text rounded-pill" value="' . $A["dias"] . '"></td>
                <td id="salida_'.$A["iddocente"].'"><span class="input-group-text rounded-pill"> ' . $A["salida"] . '</span></td>
                <td><img src="data:imagen/*;base64,'. base64_encode($A["foto"]) .'" width="77px" ></td>
                <td><button class="fas fa-edit m-1  btn btn-success" onclick="EditarDocente(this.value)" value="' . $A["iddocente"] . '">
                    </button> <button class="btn btn-danger m-1 rounded-3  fas fa-trash-alt" onclick="EliminarDocente(this.value)" value="' . $A["iddocente"] . '"></button>
                    </button> <button class="btn btn-primary m-1 rounded-3 fas  fa-chalkboard-teacher" onclick="DocenteMaterias(this.value)" value="' . $A["iddocente"] . '"></button>
                
                    </td>
            </tr>';
    }
    echo $cadena . "</tbody>
    </table>";
} 
elseif(isset($_POST["tablaalumnos"])){
    $cadena = '<table class="table table-success  table-hover table-striped text-center">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Paterno</th>
            <th scope="col">Materno</th>
            <th scope="col">Contraseña</th>
            <th scope="col">Correo electronico</th>
            <th scope="col">Escolaridad</th>
            <th scope="col">Entrada</th>
            <th scope="col">Grado</th>
            <th scope="col">Aciones</th>
        </tr>
    </thead>
    <tbody>';
require_once("admin.php");
$VerAlumnos = Admin::VerAlumnos($_POST["tablaalumnos"]);
foreach ($VerAlumnos as $A) {
    $cadena = $cadena .
        '<tr class="align-middle font-monospace" >
            <th id="matricula_'.$A["idalumno"].'"><span class="input-group-text rounded-pill">' . $A["matricula"] . '</span></td>
            <td id="nom_'.$A["idalumno"].'"><span class="input-group-text rounded-pill">' . $A["nombre"] . '</span></td>
            <td id="pat_'.$A["idalumno"].'"><span class="input-group-text  rounded-pill">' . $A["paterno"] . '</span></td>
            <td id="mat_'.$A["idalumno"].'"><span class="input-group-text rounded-pill">' . $A["materno"] . '</span></td>
            <td><input disabled class="form-control rounded-pill" id="pass_'.$A["idalumno"].'" type="password" value="' . $A["contrasena"] . '"></td>
            <td id="mail_'.$A["idalumno"].'"><span class="input-group-text rounded-pill">' . $A["correo"] . '</span></td>
            <td id="escolaridad_'.$A["idalumno"].'"><span class="input-group-text rounded-pill">' . $A["escolaridad"] . '</span></td>
            <td id="grado_'.$A["idalumno"].'"><span class="input-group-text rounded-pill"> ' . $A["grados"] . '</span></td>
            <td><img src="data:imagen/*;base64,'. base64_encode($A["foto"]) .'" width="77px" ></td>
            <td><button class="fas fa-edit m-1  btn btn-success" onclick="EditarAlumno(this.value)" value="' . $A["idalumno"] . '">
                </button> <button class="btn btn-danger m-1 rounded-3  fas fa-trash-alt" onclick="EliminarAlumno(this.value)" value="' . $A["idalumno"] . '"></button>
                </button> <button class="btn btn-dark m-1 rounded-3 fas  fa-tasks" onclick="Calificacion_T(this.value)" value="' . $A["idalumno"] . '"></button>
            
                </td>
        </tr>';
}
echo $cadena . "</tbody>
</table>";
}

else {
    echo "<script>window.location.href='../index'</script>";
}
// admin
