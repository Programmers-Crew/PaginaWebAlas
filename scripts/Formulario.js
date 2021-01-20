
const formulario = document.getElementById('formRegistrarUsuario');
const inputs = document.querySelectorAll('#formRegistrarUsuario input');

const expresiones  ={
    usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
	nombre: /^[a-zA-ZÀ-ÿ]{1,40}$/, // Letras y espacios, pueden llevar acentos.
    contraseñalowerCase: /^(?=.*[a-z])/,
    contraseñaUpperCase: /^(?=.*[A-Z])/,
    contraseñaNum: /^(?=.*[0-9])/,
    contraseñaSignos: /^(?:.*[@$?¡!"#%&/()=¿'\-_])/,
    rango: /^[\s\S]{5,15}$/,
    correo : /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/,
    telefono: /^\d{7,14}$/ // 7 a 14 numeros.
}


const campos ={
    usuarioAgregar:false,
    nombre:false,
    apellido: false,
    contraseñaAgregar:false,
    telefono: false,
    correo: false
}

const validarFormularioAlPrincipio = (inputs) =>{
    switch(inputs.name){
        case "nombre":
    
            validarCampo(expresiones.nombre,inputs,'nombre');
            break;
        case "apellido":
    
            validarCampo(expresiones.nombre,inputs,'apellido');
            break;
        case "usuarioAgregar":
    
            validarCampo(expresiones.usuario,inputs,'usuarioAgregar');
            break;
        case "contraseñaAgregar":
    
            validarContraseña(inputs,'contraseñaAgregar');
            validarContraseña1();
            break;
        case "contraseña1":
    
            validarContraseña1();
            break;

        case "correo":
    
            validarCampo(expresiones.correo,inputs,'correo');
        }


}


const validarFormulario = (e) =>{
    switch(e.target.name){
        case "nombre":
    
            validarCampo(expresiones.nombre,e.target,'nombre');
            break;
        case "apellido":
    
            validarCampo(expresiones.nombre,e.target,'apellido');
            break;
        case "usuarioAgregar":
    
            validarCampo(expresiones.usuario,e.target,'usuarioAgregar');
            break;
        case "contraseñaAgregar":
    
            validarContraseña(e.target,'contraseñaAgregar');
            validarContraseña1();
            break;
        case "contraseña1":
    
            validarContraseña1();
            break;

        case "correo":
            console.log("correo");
            validarCampo(expresiones.correo,e.target,'correo');
        }


}

const validarContraseña1 = () =>{
    const contraseña1 = document.getElementById("contraseñaAgregar");
    const contraseña2  = document.getElementById("contraseña1");
    if(contraseña1.value == contraseña2.value){
        campos['contraseñaAgregar'] = true;
        
        document.getElementById("contraseña1").classList.remove("form-texto-incorrecto");
        document.getElementById("contraseña1").classList.add("form-texto-correcto");        
        
        document.getElementById("alerta_contraseña1").classList.remove('grupo-incorrecto');
        document.getElementById("alerta_contraseña1").classList.add('grupo-correcto');
        
        document.getElementById("errorGlobal").classList.remove('grupo-incorrecto');
        document.getElementById("errorGlobal").classList.add('grupo-correcto');
    }else{
        campos['contraseñaAgregar'] = false;
        document.getElementById("contraseña1").classList.add("form-texto-incorrecto");
        document.getElementById("contraseña1").classList.remove("form-texto-correcto");        
        document.getElementById("alerta_contraseña1").classList.remove('grupo-correcto');
        document.getElementById("alerta_contraseña1").classList.add('grupo-incorrecto');
    }
}

const validarContraseña =(input,campo) =>{
    if(expresiones.contraseñaNum.test(input.value) && expresiones.contraseñaUpperCase.test(input.value) && expresiones.contraseñalowerCase.test(input.value) && expresiones.rango.test(input.value) && !expresiones.contraseñaSignos.test(input.value)){
        document.getElementById(campo).classList.remove('form-texto-incorrecto');
        document.getElementById(campo).classList.add('form-texto-correcto');
        campos['contraseñaAgregar'] = true;
        document.getElementById("alerta_mayusculas").classList.remove('grupo-incorrecto');
        document.getElementById("alerta_mayusculas").classList.add('grupo-correcto');
        document.getElementById("errorGlobal").classList.remove('grupo-incorrecto');
        document.getElementById("errorGlobal").classList.add('grupo-correcto');
        document.getElementById("alerta_minuscula").classList.remove('grupo-incorrecto');
        document.getElementById("alerta_minuscula").classList.add('grupo-correcto');
        
        document.getElementById("alerta_numero").classList.remove('grupo-incorrecto');
        document.getElementById("alerta_numero").classList.add('grupo-correcto');
        
        document.getElementById("alerta_rango").classList.remove('grupo-incorrecto');
        document.getElementById("alerta_rango").classList.add('grupo-correcto');

        document.getElementById("alerta_signos").classList.remove('grupo-incorrecto');
            document.getElementById("alerta_signos").classList.add('grupo-correcto');

    }else{
        document.getElementById(campo).classList.add('form-texto-incorrecto');
        document.getElementById(campo).classList.remove('form-texto-correcto');
        campos['contraseñaAgregar'] = false;
        if(expresiones.contraseñaUpperCase.test(input.value)){
            document.getElementById("alerta_mayusculas").classList.remove('grupo-incorrecto');
            document.getElementById("alerta_mayusculas").classList.add('grupo-correcto');
        }else{
            document.getElementById("alerta_mayusculas").classList.remove('grupo-correcto');
            document.getElementById("alerta_mayusculas").classList.add('grupo-incorrecto');
        }
        
        if(expresiones.contraseñalowerCase.test(input.value)){
            document.getElementById("alerta_minuscula").classList.remove('grupo-incorrecto');
            document.getElementById("alerta_minuscula").classList.add('grupo-correcto');
        }else{
            document.getElementById("alerta_minuscula").classList.remove('grupo-correcto');
            document.getElementById("alerta_minuscula").classList.add('grupo-incorrecto');
        }
        
        if(expresiones.contraseñaNum.test(input.value)){
            document.getElementById("alerta_numero").classList.remove('grupo-incorrecto');
            document.getElementById("alerta_numero").classList.add('grupo-correcto');
        }else{
            document.getElementById("alerta_numero").classList.remove('grupo-correcto');
            document.getElementById("alerta_numero").classList.add('grupo-incorrecto');
        }

        if(expresiones.rango.test(input.value)){
            document.getElementById("alerta_rango").classList.remove('grupo-incorrecto');
            document.getElementById("alerta_rango").classList.add('grupo-correcto');
        }else{
            document.getElementById("alerta_rango").classList.remove('grupo-correcto');
            document.getElementById("alerta_rango").classList.add('grupo-incorrecto');
        }


        if(expresiones.contraseñaSignos.test(input.value)){
            
            document.getElementById("alerta_signos").classList.remove('grupo-correcto');
            document.getElementById("alerta_signos").classList.add('grupo-incorrecto');
        }else{
            document.getElementById("alerta_signos").classList.remove('grupo-incorrecto');
            document.getElementById("alerta_signos").classList.add('grupo-correcto');
        }

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
    validarFormularioAlPrincipio(input);
    input.addEventListener('keyup', validarFormulario); 
    input.addEventListener('blur', validarFormulario); 
});

formRegistrarUsuario.addEventListener('submit', (e) =>{
    
    if(campos.contraseñaAgregar && campos.nombre  && campos.usuarioAgregar && campos.apellido && campos.correo){

    }else{
        e.preventDefault();
        document.getElementById("errorGlobal").classList.add('grupo-incorrecto');
        document.getElementById("errorGlobal").classList.remove('grupo-correcto');
    }
});


