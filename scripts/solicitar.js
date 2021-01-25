
const formulario = document.getElementById('formSolicitarPedido');
const inputs = document.querySelectorAll('#formSolicitarPedido input');
const text = document.querySelectorAll('#formSolicitarPedido textArea');
const selects = document.querySelectorAll('#formSolicitarPedido select');

const expresiones  ={
      
      nombre: /^([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\']+[\s])+([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])+[\s]?([A-Za-zÁÉÍÓÚñáéíóúÑ]{0}?[A-Za-zÁÉÍÓÚñáéíóúÑ\'])?$/,
      telefono: /^\d{8,8}$/, 
      descripcionInicial: /^[\s\S]{5,150}$/,
      descripcionFinal: /^[\s\S]{5,150}$/
}


const campos ={
      nombre:false,
      telefono: false,
      puntoInicio:false,
      puntoFinal:false,
      descripcionInicial:false,
      descripcionFinal:false
}

const validarFormularioAlPrincipio = (inputs) =>{
      switch(inputs.name){
        case "nombre":
    
            validarCampo(expresiones.nombre,inputs,'nombre');
            break;
        case "telefono":
    
            validarCampo(expresiones.telefono,inputs,'telefono');
            break;
       
        case "descripcionInicial":
           
            validarCampo(expresiones.descripcionInicial,inputs,'descripcionInicial');
            break;

        case "descripcionFinal":
           
            validarCampo(expresiones.descripcionInicial,inputs,'descripcionFinal');
            break;
        case "puntoInicio":
              validarSelect(inputs,"puntoInicio");
              break;
        case "puntoFinal":
                  validarSelect(inputs,"puntoFinal");
            break;
      }


}


const validarFormulario = (e) =>{
    switch(e.target.name){
        case "nombre":
    
            validarCampo(expresiones.nombre,e.target,'nombre');
            break;
        case "telefono":
            validarCampo(expresiones.telefono,e.target,'telefono');
            break;
        case "descripcionInicial":
    
            validarCampo(expresiones.descripcionInicial,e.target,'descripcionInicial');
            break;

        case "descripcionFinal":
            console.log("textarea");
            validarCampo(expresiones.descripcionFinal,e.target,'descripcionFinal');
            break;
            case "puntoInicio":
                  validarSelect(inputs,"puntoInicio");
             break;
            case "puntoFinal":
                      validarSelect(inputs,"puntoFinal");
            break;
        }


}

const validarSelect=(input,campo)=>{
      if(input.value == 0){
            document.getElementById(campo).classList.remove('form-texto-correcto');
            document.getElementById(campo).classList.add('form-texto-incorrecto');
            document.getElementById(`alerta_${campo}`).classList.add('grupo-incorrecto');
            document.getElementById(`alerta_${campo}`).classList.remove('grupo-correcto');
            campos[campo] = false;
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

inputs.forEach((input)=>{
    input.addEventListener('keyup', validarFormulario); 
    input.addEventListener('blur', validarFormulario);
});


formSolicitarPedido.addEventListener('submit', (e) =>{
    
    if(campos.telefono && campos.nombre  && campos.puntoInicio && campos.puntoFinal && campos.descripcionInicial && campos.descripcionFinal){
    }else{
        
        e.preventDefault();
        document.getElementById("errorGlobal").classList.add('grupo-incorrecto');
        document.getElementById("errorGlobal").classList.remove('grupo-correcto');
    }
});


function cambio(){
      var selects = document.getElementById("puntoInicio");

      validarFormularioAlPrincipio(selects);
}

function cambioFinal(){
      var selects = document.getElementById("puntoFinal");

      validarFormularioAlPrincipio(selects);
}

function descInicio(){
      var text = document.getElementById("descripcionInicial");
      validarFormularioAlPrincipio(text);
}

function descFinal(){
      var text = document.getElementById("descripcionFinal");
      
      validarFormularioAlPrincipio(text);
}