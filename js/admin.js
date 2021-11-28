const segurity = 159753;

function recargarLista2() {
    $.ajax({
        type: "POST",
        url: "models/validar.php",
        data: "gradosyescolaridad=" + $('#inputGroupSelect02').val(),
        success: function (r) {
            $('#inputGroupSelect04445').html(r);
        }
    });
}
$(document).ready(function () {
    $('#inputGroupSelect02').val(0);
    recargarLista2();

    $('#inputGroupSelect02').change(function () {
        recargarLista2();
    });
    if (($("#tabla_admins").length)) {
        TablaAdmins();
    }
    else if (($("#tabla_docentes").length)) {
        TablaDocentes();
    }
})
$( "#tablaAdmin" ).click(function() {
    TablaAdmins();
  });

$( "#tablaDocente" ).click(function() {
TablaDocentes();
});
$( "#tablaAlumnos" ).click(function() {
TablaAlumnos(idgra);
});
;

function TablaAdmins() {
    $.ajax({
        type: "POST",
        url: "models/ajax.php",
        data: { "tabla_admins": "ready" },
        success: function (i) {
            $('#tabla_admins').html(i);
        }
    });
}
function TablaDocentes() {
    $.ajax({
        type: "POST",
        url: "models/ajax.php",
        data: { "tabladocentes": "ready" },
        success: function (i) {
            $('#tabla_docentes').html(i);
        }
    });
}
var idgra;
function TablaAlumnos(idgrado) {
    idgra =idgrado;
    $.ajax({
        type: "POST",
        url: "models/ajax.php",
        data: { "tablaalumnos": idgrado },
        success: function (i) {
            $('#tabla_alumnos').html(i);
        }
    });
}
function validarclave() {
    clav = $("#claveAdmin").val();
    if (segurity == clav) {
        return true;
    }
    else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '¡Clave Invalida!'
        })
        return false;
    }
}

$("#checkbox1").change(function () {
    if ($('#checkbox1').is(":checked")) {
        document.getElementById('correo').disabled = true;
        $("#checkbox1").val(true);
    } else {
        document.getElementById('correo').disabled = false;
        $("#checkbox1").val(false);
    }
});
var idadministrador;
function EditarAdmin(idadmin) {
    idadministrador = idadmin;
    Swal.fire({
        title: '¿Quieres editarlo?',
        text: "Necesitas la clave de Seguridad",
        icon: 'warning',
        input: 'password',
        inputAttributes: {
            autocapitalize: 'off',
            id: "claveAdmin"
        },
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Editar ahora!'
    }).then((result) => {
        if (result.isConfirmed) {
            validarclave();

            var vali = validarclave();
            if (vali == true) {
                $("#udpateAdmin").modal("show");
                $("#checkbox1").prop('checked', true);
                $("#checkbox1").val(true);
                document.getElementById('correo').disabled = true;
                var matris = document.getElementById('matricula_' + idadmin).innerText;
                var noms = document.getElementById('nom_' + idadmin).innerText;
                var pater = document.getElementById('pat_' + idadmin).innerText;
                var mater = document.getElementById('mat_' + idadmin).innerText;
                var passo = document.getElementById('pass_' + idadmin).value;
                var correosDeMexico = document.getElementById('mail_' + idadmin).innerText;
                document.getElementById('matricula').value = matris;
                document.getElementById('nombre').value = noms;
                document.getElementById('paterno').value = pater;
                document.getElementById('materno').value = mater;
                document.getElementById('pass').value = passo;
                document.getElementById('correo').value = correosDeMexico;
            }
        }


    })
}
function EliminarAdmin(idadmin) {
    var matri = document.getElementById("matricula_" + idadmin).innerText;
    Swal.fire({
        title: '¿Quieres Eliminar al administrador?',
        text: "Necesitas la clave de Seguridad",
        icon: 'warning',
        input: 'password',
        inputAttributes: {
            autocapitalize: 'off',
            id: "claveAdmin"
        },
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Eliminar ahora!'
    }).then((result) => {
        if (result.isConfirmed) {
            validarclave();
            var vali = validarclave();
            if (vali == true) {

                $.ajax({
                    type: "POST",
                    url: "models/ajax_admin.php",
                    data: { "idadmin": idadmin, "matricula": matri },
                    success: function (r) {
                        $('#respuesta').html(r);
                        TablaAdmins();
                    }
                });
            }
        }

    })
}
function UpdateA() {

    matricula = $("#matricula").val();
    nombre = $("#nombre").val();
    paterno = $("#paterno").val();
    materno = $("#materno").val();
    correo = $("#correo").val();
    pass = $("#pass").val();
    check = $("#checkbox1").val();
    $.ajax({
        type: "POST",
        url: "models/ajax_admin.php",
        data: { "matricula": matricula, "nombre": nombre, "paterno": paterno, "materno": materno, "correo": correo, "pass": pass, "check": check },
        success: function (r) {
            $('#respuesta').html(r);
            TablaAdmins();
        }
    });
}

function Updatedoce() {
    matricula = $("#matricula").val();
    nombre = $("#nombre").val();
    paterno = $("#paterno").val();
    materno = $("#materno").val();
    correo = $("#correo").val();
    pass = $("#pass").val();
    check = $("#checkbox1").val();
    entrada = $("#entrada").val();
    atencion = $("#atencion").val();
    salida = $("#salida").val();
    $.ajax({
        type: "POST",
        url: "models/ajax_admin.php",
        data: { "matriculad": matricula, "nombre": nombre, "paterno": paterno, "materno": materno, "correo": correo, "pass": pass, "check": check, "entrada": entrada, "atencion": atencion, "salida": salida, "iddoce": iddoce },
        success: function (r) {
            $('#respuesta').html(r);
            TablaDocentes();
        }
    });
}
function UpdateAlumno() {
    matricula = $("#matricula").val();
    nombre = $("#nombre").val();
    paterno = $("#paterno").val();
    materno = $("#materno").val();
    correo = $("#correo").val();
    pass = $("#pass").val();
    check = $("#checkbox1").val();
    check2 = $("#checkbox2").val();
    idgrado = $("#grado").val();
    Grado = $("#inputGroupSelect03").val();

    $.ajax({
        type: "POST",
        url: "models/ajax_admin.php",
        data: { "matriculaA": matricula, "nombre": nombre, "paterno": paterno, "materno": materno
        , "correo": correo, "pass": pass, "check": check, "check2": check2, "Grado": Grado
        , "idgrado": idgrado, "idalumno": idA },
        success: function (r) {
            $('#respuesta').html(r);
            TablaAlumnos(idgra);
        }
    });
}
var iddoce;
function EditarDocente(iddocente) {

    iddoce = iddocente;
    Swal.fire({
        title: '¿Quieres editarlo?',
        text: "Necesitas la clave de Seguridad",
        icon: 'warning',
        input: 'password',
        inputAttributes: {
            autocapitalize: 'off',
            id: "claveAdmin"
        },
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Editar ahora!'
    }).then((result) => {
        if (result.isConfirmed) {
            validarclave();

            var vali = validarclave();
            if (vali == true) {
                $("#udpateDocente").modal("show");
                $("#checkbox1").prop('checked', true);
                $("#checkbox1").val(true);
                document.getElementById('correo').disabled = true;
                var matris = document.getElementById('matricula_' + iddocente).innerText;
                var noms = document.getElementById('nom_' + iddocente).innerText;
                var pater = document.getElementById('pat_' + iddocente).innerText;
                var mater = document.getElementById('mat_' + iddocente).innerText;
                var passo = document.getElementById('pass_' + iddocente).value;
                var correosDeMexico = document.getElementById('mail_' + iddocente).innerText;
                var entrada = document.getElementById('entrada_' + iddocente).innerText;
                var dias = document.getElementById('dias_' + iddocente).value;
                var salida = document.getElementById('salida_' + iddocente).innerText;
                document.getElementById('matricula').value = matris;
                document.getElementById('nombre').value = noms;
                document.getElementById('paterno').value = pater;
                document.getElementById('materno').value = mater;
                document.getElementById('pass').value = passo;
                document.getElementById('correo').value = correosDeMexico;
                document.getElementById('entrada').value = entrada;
                document.getElementById('atencion').value = dias;
                document.getElementById('salida').value = salida;
            }
        }
    })
}
function EliminarDocente(iddocente) {
    var matri = document.getElementById("matricula_" + iddocente).innerText;
    Swal.fire({
        title: '¿Quieres Eliminar al docente?',
        text: "Necesitas la clave de Seguridad",
        icon: 'warning',
        input: 'password',
        inputAttributes: {
            autocapitalize: 'off',
            id: "claveAdmin"
        },
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Eliminar ahora!'
    }).then((result) => {
        if (result.isConfirmed) {
            validarclave();
            var vali = validarclave();
            if (vali == true) {

                $.ajax({
                    type: "POST",
                    url: "models/ajax_admin.php",
                    data: { "iddocenteDelete": iddocente, "matricula": matri },
                    success: function (r) {
                        $('#respuesta').html(r);
                        TablaDocentes();

                    }
                });
            }
        }
    })
}

var matridocente;
function DocenteMaterias(iddocente) {
    matridocente = iddocente
    Swal.fire({
        title: '¿Quieres Ver las materias del docente?',
        text: "Necesitas la clave de Seguridad",
        icon: 'warning',
        input: 'password',
        inputAttributes: {
            autocapitalize: 'off',
            id: "claveAdmin"
        },
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Ver ahora!'
    }).then((result) => {
        if (result.isConfirmed) {
            validarclave();
            var vali = validarclave();
            if (vali == true) {

                $.ajax({
                    type: "POST",
                    url: "models/ajax_admin.php",
                    data: { "VerDocenteMateriaId": iddocente },
                    success: function (r) {

                        Swal.fire({
                            title: 'Materias del docente',
                            text: 'ZY',
                            width: '85%',
                            html: r,

                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Descargar PDF'
                        }).then((result) => {
                            //descargando el pdf
                            if (result.value) {

                                let timerInterval
                                Swal.fire({
                                    title: '!Preparando PDF!',
                                    html: 'Espero un momento Por favor',
                                    timer: 2000,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading()
                                        const b = Swal.getHtmlContainer().querySelector('b')
                                        timerInterval = setInterval(() => {
                                            b.textContent = Swal.getTimerLeft()
                                        }, 100)
                                    },
                                    willClose: () => {
                                        clearInterval(timerInterval)
                                    }
                                }).then((result) => {
                                    /* Read more about handling dismissals below */
                                    if (result.dismiss === Swal.DismissReason.timer) {
                                        console.log('I was closed by the timer')
                                    }
                                })
                                window.location.href = "pdf?PDF_Download=" + 2 + "&id=" + iddocente;

                            }
                        })

                    }
                });
            }
        }
    })
}

function DeleteMateriaDocente(idmateria) {
    $.ajax({
        type: "POST",
        url: "models/ajax_admin.php",
        data: { "idmateriadocente": idmateria },
        success: function (r) {
            $('#respuesta').html(r);
            $.ajax({
                type: "POST",
                url: "models/ajax_admin.php",
                data: { "VerDocenteMateriaId": matridocente },
                success: function (r) {
                    Swal.fire({
                        title: 'Materias del docente',
                        text: 'ZY',
                        width: '85%',
                        html: r,

                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.value) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                        }
                    })
                }
            });
        }
    });
}

function EliminarAlumno(idalumno){
    var matri = document.getElementById("matricula_" + idalumno).innerText;
    Swal.fire({
        title: '¿Quieres Eliminar este Alumno?',
        text: "Necesitas la clave de Seguridad",
        icon: 'warning',
        input: 'password',
        inputAttributes: {
            autocapitalize: 'off',
            id: "claveAdmin"
        },
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Eliminar ahora!'
    }).then((result) => {
        if (result.isConfirmed) {
            validarclave();
            var vali = validarclave();
            if (vali == true) {
                $.ajax({
                    type: "POST",
                    url: "models/ajax_admin.php",
                    data: { "idalumnoDelete": idalumno, "matriculaA": matri },
                    success: function (r) {
                        $('#respuesta').html(r);
                        TablaAlumnos(idgra);
                    }
                });
            }
        }
    })
}
var idA;
function EditarAlumno (idalumno) {
    idA = idalumno;
    Swal.fire({
        title: '¿Quieres editarlo?',
        text: "Necesitas la clave de Seguridad",
        icon: 'warning',
        input: 'password',
        inputAttributes: {
            autocapitalize: 'off',
            id: "claveAdmin"
        },
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Editar ahora!'
    }).then((result) => {
        if (result.isConfirmed) {
            validarclave();
            var vali = validarclave();
            if (vali == true) {
                $("#updateAlumno").modal("show");
                $("#checkbox1").prop('checked', true);
                $("#checkbox1").val(true);
                $("#checkbox2").prop('checked', true);
                $("#checkbox2").val(true);
                document.getElementById('correo').disabled = true;
                var matris = document.getElementById('matricula_' + idalumno).innerText;
                var noms = document.getElementById('nom_' + idalumno).innerText;
                var pater = document.getElementById('pat_' + idalumno).innerText;
                var mater = document.getElementById('mat_' + idalumno).innerText;
                var passo = document.getElementById('pass_' + idalumno).value;
                var correosDeMexico = document.getElementById('mail_' + idalumno).innerText;
                var escolaridad = document.getElementById('escolaridad_' + idalumno).innerText;
                var grado = document.getElementById('grado_' + idalumno).innerText;
                document.getElementById('matricula').value = matris;
                document.getElementById('nombre').value = noms;
                document.getElementById('paterno').value = pater;
                document.getElementById('materno').value = mater;
                document.getElementById('pass').value = passo;
                document.getElementById('correo').value = correosDeMexico;
                document.getElementById('escolaridad').value = escolaridad;
                document.getElementById('escolaridad').innerText = escolaridad;
                document.getElementById('grado').value = idgra;
                document.getElementById('grado').innerText = grado;
            }
        }
    })
}
var fotoP;
function foto_charge(){
    fotoP = document.getElementById('fotoPerfil');
    document.getElementById('fotoPerfil').style.display = 'none';
}
function fotoUpdateNull(){
    document.getElementById('imagePreview').style.display = 'none';
    $("#file").val('');
}
function returnDivImage()
{
    fotoP = document.getElementById('fotoPerfil');
    fotoP.style.display = 'block';
}
function fileValidation() {
    var fileInput = 
        document.getElementById('file');
    var filePath = fileInput.value;
    // Allowing file type
    var allowedExtensions = 
            /(.jpg|.jpeg|.png|.gif)$/i;
    if (!allowedExtensions.exec(filePath)) {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Imágen o archivo invalido!'
          })
        fileInput.value = ''; 
        return false;
    } 
    else 
    {
        // Image preview
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById(
                    'imagePreview').innerHTML = 
                    '<img width="100%" src="' + e.target.result
                    + '"/>';
            };
            Swal.fire(
                'MUY BIEN!',
                'Imágen cargada!',
                'EXITOSAMENTE'
              )
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}

function Calificacion_T(idalumno){
    Swal.fire({
        title: '¿Quieres Ver la calificacion del alumno?',
        text: "Necesitas la clave de Seguridad",
        icon: 'warning',
        input: 'password',
        inputAttributes: {
            autocapitalize: 'off',
            id: "claveAdmin"
        },
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Ver ahora!'
    }).then((result) => {
        if (result.isConfirmed) {
            validarclave();
            var vali = validarclave();
            if (vali == true) {


                $.ajax({
                    type: "POST",
                    url: "models/ajax_admin.php",
                    data: { "VerCalificacionAlumno": idalumno, "idgrado":idgra },
                    success: function (r) {

                        Swal.fire({
                            title: 'Calificacion del alumno',
                            text: 'ZY',
                            width: '85%',
                            html: r,

                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Descargar PDF'
                        }).then((result) => {
                            //descargando el pdf
                            if (result.value) {

                                let timerInterval
                                Swal.fire({
                                    title: '!Preparando PDF!',
                                    html: 'Espero un momento Por favor',
                                    timer: 2000,
                                    timerProgressBar: true,
                                    didOpen: () => {
                                        Swal.showLoading()
                                        const b = Swal.getHtmlContainer().querySelector('b')
                                        timerInterval = setInterval(() => {
                                            b.textContent = Swal.getTimerLeft()
                                        }, 100)
                                    },
                                    willClose: () => {
                                        clearInterval(timerInterval)
                                    }
                                }).then((result) => {
                                    /* Read more about handling dismissals below */
                                    if (result.dismiss === Swal.DismissReason.timer) {
                                        console.log('I was closed by the timer')
                                    }
                                })
                                window.location.href = "pdf?PDF_Download=" + 3 + "&id=" + idalumno;
                            }
                        })
                    }
                });
            }
        }
    })
}
$(document).ready(function () {
    $("#checkbox2").change(function (e) { 
        if(!this.checked){
            $("#inputGroupSelect02").fadeIn('slow');
            $("#inputGroupSelect04445").fadeIn('slow'),
            $("#escobar1").fadeOut('slow'),
            $("#escobar2").fadeOut('slow');
        }
        else{
            $("#inputGroupSelect02").fadeOut('slow'),
            $("#inputGroupSelect04445").fadeOut('slow'),
            $("#escobar1").fadeIn('slow'),
            $("#escobar2").fadeIn('slow');
        }
    });
});

function ReiniciaDatabase() {
    Swal.fire({
        title: '¿Quieres Eliminar al administrador?',
        text: "Necesitas la clave de Seguridad",
        icon: 'warning',
        input: 'password',
        inputAttributes: {
            autocapitalize: 'off',
            id: "claveAdmin"
        },
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Eliminar ahora!'
    }).then((result) => {
        if (result.isConfirmed) {
            validarclave();
            var vali = validarclave();
            if (vali == true) {
                $.ajax({
                    type: "POST",
                    url: "models/ajax_admin.php",
                    data: { "databaseReiniciar": "ready"},
                    success: function (r) {
                        $('#respuesta').html(r);
                        Swal.fire(
                            '¡Buen Trabajo!',
                            '¡Se Reinicio la base de datos!',
                            'success'
                          )
                    }
                });
            }
        }
    })
}