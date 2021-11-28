const formulario = document.getElementById('formuBAS');
const inputs = document.querySelectorAll('#formuBAS input');


//Declaramos un objeto para validar expresiones
const expresiones = {
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/, 
    password: /^.{8,45}$/
}

const validarFormualrio = (e) => {
    switch (e.target.name)
    {
        case "Matricula":   
            validarCampo(expresiones.correo, e.target, 'matricula');  
        break;
        case "Contrasena":
            validarCampo(expresiones.password, e.target, 'contrasena')                  
        break;
    }
}

const validarCampo = (expresion, input, campo) =>{
    if(expresion.test(input.value))
    {
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        document.getElementById("acceder").disabled = false;
    }            
    else
    {
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        document.getElementById("acceder").disabled = true;
    }
}

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormualrio);
    input.addEventListener('blur', validarFormualrio);
});


formulario.addEventListener('submit', (e) => {
    //e.preventDefault(); 
});