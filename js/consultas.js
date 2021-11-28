
function tabla(materia) {
    $.ajax({
        type: "POST",
        url: "models/ajax.php",
        data: "materia=" + materia,
        success: function (r) {
            $('#tabla').html(r);
        }
    });
}

function Escolaridad(idescolaridad, esco) {
    $.ajax({
        type: "POST",
        url: "models/ajax.php",
        data: { "escolaridad": idescolaridad, "esco": esco },
        success: function (r) {
            $('#grados').html(r);

        }
    });
}
var IDGRADOS;
function Materias(idgrado) {
    IDGRADOS= idgrado; 
    $.ajax({
        type: "POST",
        url: "models/ajax.php",
        data: "grado=" + idgrado,
        success: function (i) {
            $('#materias').html(i);
        }
    });
}

var ids;
var nombrem;
function idmateria(id, nombre) {
    ids = id;
    nombrem =nombre;
    $.ajax({
        type: "POST",
        url: "models/ajax.php",
        data: { "mate": ids },
        success: function (i) {
            $('#Tareas').html(i);
        }
    });
    if ( $( "#nombremateria" ).length ) {
        $('#nombremateria').val(nombre);
    }
}
function asistenciaIdmateria(id, nombre) {
    ids = id;
    nombrem =nombre;
    $.ajax({
        type: "POST",
        url: "models/ajax.php",
        data: { "AlumnosGrados": IDGRADOS , "nombremate":nombre},
        success: function (i) {
            $('#Asistencia').html(i);
        }
    });
    console.log(IDGRADOS);
}

function Tarea() {
    tema = document.getElementById("tema").value;
    titulo = document.getElementById("titulo").value;
    descripcion = document.getElementById("descripcion").value;
    fecha_entrega = document.getElementById("entrega").value;
    var tiempo = new Date();
    fecha_entrega = tiempo.toISOString().slice(0, 16);
    fecha_publicacion = tiempo.getFullYear() + '-' + (tiempo.getMonth() + 1) + '-' + tiempo.getDate() + ' ' + tiempo.getHours() + ':' + tiempo.getMinutes() + ':' + tiempo.getSeconds();
    // cerrar el modal manualmente
    $('#nueva_tarea').modal('hide')
    $.ajax({
        type: "POST",
        url: "models/ajax.php",
        data: { "tema": tema, "titulo": titulo, "descripcion": descripcion, "fecha_entrega": fecha_entrega, "fecha_publicacion": fecha_publicacion, "idmateria": ids },
        success: function (i) {
            $('#AJAXtarea').html(i);
            Swal.fire(
                'Buen trabajo!',
                'Nueva Tarea Publicada  !',
                'success'
            )
        }
    });
}

function EliminarTarea(idtarea){
    $.ajax({
        type: "POST",
        url: "models/ajax.php",
        data: { "EliminatareaId": idtarea },
        success: function (i) {
            $('#Tareas').html(i);
            Swal.fire(
                'Buen trabajo!',
                'Tarea Elimina  !',
                'success'
            )
            idmateria(ids,nombrem);
        }
    });
}

var IdTarea;
function VerTareas(idtarea) {
    IdTarea = idtarea;
    $.ajax({
        type: "POST",
        url: "models/ajax.php",
        data: { "T_idmateria": ids, "idtarea": idtarea },
        success: function (i) {
            $('#Tareas').html(i);
        }
    });
}
function guardamateria() {
    event.preventDefault();
    $.ajax({
        type: "POST",
        url: "models/ajax.php",
        data: { "NuevaMateria": ids},
        success: function () {
            // $('#nueva_materia').html(i);
            $('#nueva_materia').modal('hide')
            Swal.fire(
                'Buen Trabajo!',
                'Se Guardo Exitosamente!',
                'success'
              )
        }
    });
    Materias(IDGRADOS);
}

function CambiarCali(idalumno){
    var califi= $( "#cali_"+idalumno+" option:selected" ).text();
    var comentario=  $("#coment_"+idalumno).val();
    $.ajax({
        type: "POST",
        url: "models/ajax.php",
        data: { "caliidalumno": idalumno,"califi":califi,"comentario":comentario,"IdTarea":IdTarea},
        success: function (i) {
            $('#nombremateria').html(i);
            VerTareas(IdTarea);
            Swal.fire(
                'Se Actulizo!',
                'Se Guardo Exitosamente!',
                'success'
              )
        }
    });
}


function eliminarCali(idalumno){
    $.ajax({
        type: "POST",
        url: "models/ajax.php",
        data: { "idalumnoeliminar": idalumno,"IdTarea":IdTarea},
        success: function (i) {
            $('#nombremateria').html(i);
            VerTareas(IdTarea);
            Swal.fire(
                'Se Actulizo!',
                'Se Elimno Exitosamente!',
                'success'
              )
        }
    });
}

function ActualizaAsistencia(idalumno){
    asistencia = document.getElementById("pase"+idalumno).value;
    coment = document.getElementById("coment"+idalumno).value;
    var tiempo = new Date();
    fecha_publicacion = tiempo.getFullYear() + '-' + (tiempo.getMonth() + 1) + '-' + tiempo.getDate() + ' ' + tiempo.getHours() + ':' + tiempo.getMinutes() + ':' + tiempo.getSeconds();
    $.ajax({
        type: "POST",
        url: "models/ajax.php",
        data: { "asistencia": asistencia,"comentario":coment, "idalumno": idalumno,"idmateria":ids,"fechaActual":fecha_publicacion},
        success: function (i) {
            $('#asistencia').html(i);
            VerTareas(IdTarea);
            Swal.fire(
                'Se Actulizo!',
                'Asistencia Guardada!',
                'success'
            )
        }
    });
}
