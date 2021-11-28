const $form = document.querySelector("#regiration_form");

function CargaImagen() {
    $image = document.querySelector("#image");
    $file = document.querySelector("#file");

    formDate = new FormData($form)
    file = formDate.get("image")
    image = URL.createObjectURL(file)
    $image.setAttribute("src", image)
}




$(function () {

    $("#regiration_form").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(document.getElementById("regiration_form"));
        formData.append("dato", "valor");
        //formData.append(f.attr("name"), $(this)[0].files[0]);
        $.ajax({
            url: "models/validar.php",
            type: "post",
            dataType: "html",
            data: formData,
            cache: false,
            contentType: false,
            processData: false
        })
            .done(function (res) {
                $("#mensaje").html(res);
                
            });

    });
});


$(document).ready(function () {

    var current = 1,
        current_step, next_step, steps;
    steps = $("fieldset").length;
    $(".next").click(function () {
        current_step = $(this).parent();
        next_step = $(this).parent().next();
        next_step.show();
        current_step.hide();
        setProgressBar(++current);
    });
    $(".previous").click(function () {
        current_step = $(this).parent();
        next_step = $(this).parent().prev();
        next_step.show();
        current_step.hide();
        setProgressBar(--current);
    });
    setProgressBar(current);
    // Change progress bar action
    function setProgressBar(curStep) {
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
            .css("width", percent + "%")
            .html(percent + "%");
    }
});

$(document).ready(function () {
    $('#clave').bind('input propertychange', function () {
        var cla = $("#clave").val()
        validar(cla)
    });



});



function validar(clave) {

    if (clave == 14789) {//ALUMNO
        document.getElementById("alumno_form").style.display = "block";

        document.getElementById("docente_form").style.display = "none";
        document.getElementById("admin_form").style.display = "none";
        // var esco = document.getElementById("inputGroupSelect01");
        // esco.setAttribute("name","Escolaridad");
        var grado = document.getElementById("inputGroupSelect02");
        // grado.setAttribute("name","Grado");

    } else if (clave == 12369) {//DOCENTE
        document.getElementById("docente_form").style.display = "block";

        document.getElementById("alumno_form").style.display = "none";
        document.getElementById("admin_form").style.display = "none";

        var entrada = document.getElementById("inputGroupSelect03");
        entrada.setAttribute("name", "Entrada")

        var atencion = document.getElementById("floatingatencion");
        atencion.setAttribute("name", "Atencion");
        var salida = document.getElementById("inputGroupSelect04");
        salida.setAttribute("name", "Salida");



    } else if (clave == 159753) {// ADMIN
        document.getElementById("admin_form").style.display = "block";

        document.getElementById("docente_form").style.display = "none";
        document.getElementById("alumno_form").style.display = "none";
    }

}


$(document).ready(function () {
    $('#inputGroupSelect01').val(0);
    recargarLista();

    $('#inputGroupSelect01').change(function () {
        recargarLista();
    });
})

function recargarLista() {
    $.ajax({
        type: "POST",
        url: "models/validar.php",
        data: "continente=" + $('#inputGroupSelect01').val(),
        success: function (r) {
            $('#inputGroupSelect0444').html(r);
        }
    });
}
