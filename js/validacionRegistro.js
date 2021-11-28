document.getElementById("btn_sigu1").disabled = true;
document.getElementById("btn_sigu2").disabled = true;


const forms = document.getElementById('regiration_form');
const inputs = document.querySelectorAll('#regiration_form input')

// const fieldSet1 = document.getElementById('field_1');
// const fieldSet2 = document.getElementById('field_2');

// const inputs_1 = document.querySelectorAll('#field_1 input');
// const inputs_2 = document.querySelectorAll('#field_2 input');

//Declaramos un objeto para validar expresiones
const expresiones = {
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/, 
    password: /^.{8,45}$/,
    nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
    apellido_pat: /^[a-zA-ZÀ-ÿ\s]{1,40}$/,
    apellido_mat: /^[a-zA-ZÀ-ÿ\s]{1,40}$/
}

const validarFormualrio = (e) =>{
    switch(e.target.name){
        case "Correo":   
            validarCampo(expresiones.correo, e.target, 'matricula');  
        break;
        case "Contrasena":
            validarCampo(expresiones.password, e.target, 'contrasena')                  
        break;
        case "Nombre":
            validarCampo(expresiones.nombre, e.target, 'nombre')
        break;
        case "Paterno":
            validarCampo(expresiones.apellido_pat, e.target, 'paterno')
        break;
        case "Materno":
            validarCampo(expresiones.apellido_mat, e.target, 'materno')
        break;
    }
}

const validarCampo = (expresion, input, campo) =>{ 

    //console.log(email);

    
    if(expresion.test(input.value))
    {
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');                             
        ValidarEmpty_1();
        ValidarEmpty_2();
        console.log('Aquí estoy');
    }         
       
    else
    {
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        document.getElementById("btn_sigu1").disabled = true;
        document.getElementById("btn_sigu2").disabled = true; 

        
    }
}

inputs.forEach((input)=>{
    input.addEventListener('keyup', validarFormualrio);
    input.addEventListener('blur', validarFormualrio);
});

function btn_dissable2(){
    document.getElementById("btn_sigu2").disabled = true;
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




function ValidarEmpty_1(){
    var email =document.getElementById("email").value;
    var contra =document.getElementById("password").value;    
    if((email == "" || contra == "") && (contra.length < 8))
    {        
        document.getElementById("btn_sigu1").disabled = true;
    }
    else if(email != "" || contra != "")
    {
        document.getElementById("btn_sigu1").disabled = false;
    }    
}

function ValidarEmpty_2(){
    var nom = document.getElementById("nombre").value;
    var pat = document.getElementById("paterno").value;
    var mat = document.getElementById("materno").value;
    var file_f = document.getElementById("file");

    console.log(file);        
    // if((file_f.files.length == 0  || file_f.files.length == null) || nom == "" || pat == "" || mat == ""){
    //     document.getElementById("btn_sigu2").disabled = true;
    // }
    // else if((file_f.files.length != 0  || file_f.files.length != null) || (nom != "") || (pat != "") || (mat != "")){
    //     document.getElementById("btn_sigu2").disabled = false;
    // }

    if(nom == "" || pat == "" || mat == ""){
        document.getElementById("btn_sigu2").disabled = true;
    }
    else if((nom != "") && (pat != "") && (mat != "")){
        document.getElementById("btn_sigu2").disabled = false;
    }    
}

function ValidarFinarl(){
    var btnF1 = document.getElementById("btnFINAL_1").disabled = true;
    var btnF2 = document.getElementById("btnFINAL_2").disabled = true;
    var btnF3 = document.getElementById("btnFINAL_3").disabled = true;

    var entrada = document.getElementById("inputGroupSelect03");
    var salida = document.getElementById("inputGroupSelect04");
    if((entrada.value != "") && (salida.value != ""))
    {
        //var btnF1 = document.getElementById("btnFINAL_1").dissabled = false;
        btnF2.disabled = false;
        //var btnF3 = document.getElementById("btnFINAL_3").dissabled = false;
    }
}

ValidarFinarl();