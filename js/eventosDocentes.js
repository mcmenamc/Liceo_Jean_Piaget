//se crean variables globables para la escolaridad
let button1 = document.getElementById('btn1'); //recoge el id del boton prescolar
let button2 = document.getElementById('btn2'); //recoge el id del boton primaria
let button3 = document.getElementById('btn3'); //recoge el id del boton secundaria


let botones = [button1, button2, button3];
//se crea una función para crear clases en cada boton
function addClassButtonEsco()
{
    button1.classList.add('btn');
    button2.classList.add('btn');
    button3.classList.add('btn');   

    button1.classList.add('btn-outline-primary');
    button2.classList.add('btn-outline-success');
    button3.classList.add('btn-outline-danger');  
    
    button1.classList.add('btn-lg');
    button2.classList.add('btn-lg');
    button3.classList.add('btn-lg');

    button1.classList.add('mt-3');
    button2.classList.add('mt-3');
    button3.classList.add('mt-3');     
    
}//Fin de la función
addClassButtonEsco();

var fotoP;

function foto_charge(){
    fotoP = document.getElementById('fotoPerfil');
    document.getElementById('fotoPerfil').style.display = 'none';
    // document.getElementById('file').value = "";
    //return fotoP.parentNode.removeChild(fotoP);   

    //document.getElementById('fotoPerfil').style.display = 'none';
}

function fotoUpdateNull(){
    // var div = document.getElementById('imagePreview');
    // return div.parentNode.removeChild(div);   

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
            /(\.jpg|\.jpeg|\.png|\.gif)$/i;
      
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
            //document.getElementById("btn_sigu2").disabled = false;
            reader.readAsDataURL(fileInput.files[0]);
        }        
    }
}

