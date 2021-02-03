
const formulario = document.getElementById('formMisDatos');
const inputs = document.querySelectorAll('#formMisDatos input');
const selects = document.querySelectorAll('#formMisDatos select');


const expresiones  ={
      nombre: /^[a-zA-ZÀ-ÿ]{1,40}$/,
      dpi: /^\d{13,13}$/,  
      placa: /^[a-zA-Z0-9]{7,7}$/,
      telefono: /^\d{8,8}$/, 
      direccion: /^[a-zA-ZÀ-ÿ0-9\-\s]{4,150}$/,
    
}


const campos ={
    nombre1:false,
    nombre2: false,
    apellido: false,
    apellido2:false,
    telefono: false,
    dpi: false,
    placa:false,
    telefono:false,
    direccion:false,
    estadoCivil:false   

}

const validarFormularioAlPrincipio = (inputs) =>{
    switch(inputs.name){
        case "nombre1":
            validarCampo(expresiones.nombre,inputs,'nombre1');
            break;
        case "nombre2":
            validarCampo(expresiones.nombre,inputs,'nombre2');
            break;
        case "apellido":
            validarCampo(expresiones.nombre,inputs,'apellido');
            break;
        case "apellido2":
            validarCampo(expresiones.nombre,inputs,'apellido2');
            break;
        case "dpi":
            validarCampo(expresiones.dpi,inputs,'dpi');
            break;
        case "placa":
            validarCampo(expresiones.placa,inputs,'placa');
            break;
        case "telefono":
            validarCampo(expresiones.telefono,inputs,'telefono')
            break;
        case "direccion":
            validarCampo(expresiones.direccion,inputs,'direccion')
            break;
        case "estadoCivil":
            validarSelect(inputs,"estadoCivil");
            break;
        }


}


const validarFormulario = (e) =>{
    switch(e.target.name){
        case "nombre1":
            validarCampo(expresiones.nombre,e.target,'nombre1');
            break;
        case "nombre2":
            validarCampo(expresiones.nombre,e.target,'nombre2');
            break;
        case "apellido":
            validarCampo(expresiones.nombre,e.target,'apellido');
            break;
        case "apellido2":
            validarCampo(expresiones.nombre,e.target,'apellido2');
            break;
        case "dpi":
            validarCampo(expresiones.dpi,e.target,'dpi');
            break;
        case "placa":
            validarCampo(expresiones.placa,e.target,'placa');
            break;
        case "telefono":
            validarCampo(expresiones.telefono,e.target,'telefono')
            break;
        case "direccion":
            validarCampo(expresiones.direccion,e.target,'direccion')
            break;
        }


}

const validarCampo= (expresion,input,campo)=>{
    if(expresion.test(input.value)){
        document.getElementById(campo).classList.remove('form-texto-incorrecto');
        document.getElementById(campo).classList.add('form-texto-correcto');
        document.getElementById(`alerta_${campo}`).classList.add('grupo-correcto');
        document.getElementById(`alerta_${campo}`).classList.remove('grupo-incorrecto');
        document.getElementById("errorGlobal").classList.remove('grupo-incorrecto');
        document.getElementById("errorGlobal").classList.add('grupo-correcto');
        campos[campo] = true;
    }else{
        document.getElementById(campo).classList.remove('form-texto-correcto');
        document.getElementById(campo).classList.add('form-texto-incorrecto');
        document.getElementById(`alerta_${campo}`).classList.add('grupo-incorrecto');
        document.getElementById(`alerta_${campo}`).classList.remove('grupo-correcto');
        campos[campo] = false;
    }
}


const validarSelect=(input,campo)=>{
    if(input.value == 0){
          document.getElementById(campo).classList.remove('form-texto-correcto');
          document.getElementById(campo).classList.add('form-texto-incorrecto');
          document.getElementById(`alerta_${campo}`).classList.add('grupo-incorrecto');
          document.getElementById(`alerta_${campo}`).classList.remove('grupo-correcto');
          campos[campo] = false;
          console.log("incorrecto")
    }else{
          document.getElementById(campo).classList.remove('form-texto-incorrecto');
          document.getElementById(campo).classList.add('form-texto-correcto');
          document.getElementById(`alerta_${campo}`).classList.add('grupo-correcto');
          document.getElementById(`alerta_${campo}`).classList.remove('grupo-incorrecto');
          document.getElementById("errorGlobal").classList.remove('grupo-incorrecto');
          document.getElementById("errorGlobal").classList.add('grupo-correcto');
          campos[campo] = true;
    }
}

inputs.forEach((input)=>{
    validarFormularioAlPrincipio(input);
    input.addEventListener('keyup', validarFormulario); 
    input.addEventListener('blur', validarFormulario); 
});

selects.forEach((select)=>{
    validarFormularioAlPrincipio(select);
});


formMisDatos.addEventListener('submit', (e) =>{
    
    if(campos.nombre1 && campos.nombre2 && campos.apellido && campos.apellido2 && campos.dpi && campos.placa && campos.telefono && campos.direccion){
        console.log("hola");
    }else{
        e.preventDefault();
        
        document.getElementById("errorGlobal").classList.add('grupo-incorrecto');
        document.getElementById("errorGlobal").classList.remove('grupo-correcto');
    }
});

function cambioEstadoCivil(){
    var selects = document.getElementById("estadoCivil");
    validarFormularioAlPrincipio(selects);
}
