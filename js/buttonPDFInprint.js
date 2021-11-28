$("#imprimirPDF").on("click", function () {
  Swal.fire({
    title: "¿Quíeres descargar el promedio general en PDF?",
    showDenyButton: true,
    showCancelButton: true,
    confirmButtonText: `Descargar`,
    denyButtonText: `Esperar`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      
      window.location.href = "pdf?PDF_Download=" + 3 + "&id=" + $("#idalumno").val();
      let timerInterval;
      Swal.fire({
        title: "¡Prepatando PDF!",
        html: "Se cargará en menos de lo que canta un gallo <b></b> milisegundos.",
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
          Swal.showLoading();
          const b = Swal.getHtmlContainer().querySelector("b");
          timerInterval = setInterval(() => {
            b.textContent = Swal.getTimerLeft();
          }, 100);
        },
        willClose: () => {
          clearInterval(timerInterval);
        },
      }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
          console.log("I was closed by the timer");
        Swal.fire('Descargado!', '', 'Exitosamente');

        }
      });
    } else if (result.isDenied) {
      Swal.fire("La descarga ha sido cancelada", "", "info");
    }
  });
});

function CalifiReal() {
  var PromedioStyle = document.getElementById("promedio");
  var CaraClass = document.getElementById("cara");
  var valorPromedio = parseFloat(document.getElementById("promedio").innerHTML);
  if (valorPromedio >= 0 && valorPromedio < 6) {
    PromedioStyle.style.color = "red";
    CaraClass.classList.add("fa-sad-cry");

    CaraClass.classList.remove("fa-meh");
    CaraClass.classList.remove("fa-grin-wink");
    CaraClass.classList.remove("fa-grin-stars");
  } else if (valorPromedio >= 6 && valorPromedio <= 8.9) {
    PromedioStyle.style.color = "orange";
    CaraClass.classList.add("fa-meh");

    CaraClass.classList.remove("fa-sad-cry");
    CaraClass.classList.remove("fa-grin-wink");
    CaraClass.classList.remove("fa-grin-stars");
  } else if (valorPromedio >= 9 && valorPromedio <= 9.5) {
    PromedioStyle.style.color = "blue";
    CaraClass.classList.add("fa-grin-wink");

    CaraClass.classList.remove("fa-sad-cry");
    CaraClass.classList.remove("fa-meh");
    CaraClass.classList.remove("fa-grin-stars");
  } else if (valorPromedio >= 9.6 && valorPromedio <= 10) {
    PromedioStyle.style.color = "green";
    CaraClass.classList.add("fa-grin-stars");

    CaraClass.classList.remove("fa-sad-cry");
    CaraClass.classList.remove("fa-meh");
    CaraClass.classList.remove("fa-grin-wink");
  }
}

CalifiReal();


var fotoP;

function foto_charge() {
  fotoP = document.getElementById('fotoPerfil');
  document.getElementById('fotoPerfil').style.display = 'none';
  // document.getElementById('file').value = "";
  //return fotoP.parentNode.removeChild(fotoP);

  //document.getElementById('fotoPerfil').style.display = 'none';
}

function fotoUpdateNull() {
  // var div = document.getElementById('imagePreview');
  // return div.parentNode.removeChild(div);

  document.getElementById('imagePreview').style.display = 'none';
  $("#file").val('');
}

function returnDivImage() {
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
    //document.getElementById("btn_sigu2").disabled = true;
    fileInput.value = '';
    return false;
  }
  else {

    // Image preview
    if (fileInput.files && fileInput.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
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
      //document.getElementById("btn_sigu2").disabled = false;
      reader.readAsDataURL(fileInput.files[0]);
    }
  }
}