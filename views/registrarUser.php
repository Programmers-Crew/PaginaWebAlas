<?php
    include_once 'controllers/UsuariosController.php';
    $usuarios2 = new Usuarios();
    $resultado = $usuarios2->getTiposDeCuenta();
?>


<!DOCTYPE html>

<html lang="es">
    <head>
        <title>AlasGT - Registrar Usuario</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.css.map" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-grid.min.css.map" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.css" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.css.map" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.min.css" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-reboot.min.css.map" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css.map" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css.map" type="text/css">
        <link rel="stylesheet" href="css/Login.css" type="text/css">
        <link rel="stylesheet" href="css/inicio.css" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

    </head>
    <body>
        <div class="imagen_derecha">
            <img src="assets/images/nube derecha.png" class="img-fluid" >
        </div>        
        <div class="imagen_izquierda">
            <img src="assets/images/nube izquierda.png" class="img-fluid" >
        </div>
       
        <section style="justify-content: center; align-items:center; margin:0;min-height:100%" id="data" class="w-100 row">
            <div class="col-lg-12 col-md-12   col-xs-12" style="margin-top:25px; margin-bottom:15px; padding-left:0">
                
                    <div class="inicio_sesion">
                        <div class="caja col-lg-7 col-md-9 col-xs-9">
                            <h2 class="titulos">Registrar Usuario</h2>
                            <form action="index.php?c=Usuarios&a=guardarUsuario" id="formRegistrarUsuario" class="formRegistrarUsuario" method="POST">
                                <?php
                                    if(isset($errorRegistrar)){
                                        echo "<p  class='error'>".$errorRegistrar."</p>";
                                    }
                                ?>
                                <div class="col-lg-12 row" style="margin:0">    
                                    <div class="col-lg-6 row"  style="padding:0; margin:0 !important">
                                        <div class="col-lg-12" style="display: flex; padding:0">
                                            <p class="iconoSolid" style="color: #432A90;"> </p> 
                                            <input class="form-control form-texto col-lg-9" style="margin-right: 2.5px;" placeholder="Ingrese su nombre" name="nombre" id="nombre" required  type="text">
                                        </div>
                                        <div class="col-lg-12">
                                            <span style="float: left;" class=" error grupo-correcto" id="alerta_nombre">El campo nombre no puede llevar signos ni espacios</span>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-6" style="padding:0;">
                                        <div class="col-lg-12" style="padding:0; display:flex">
                                            <p class="iconoSolid" style="color: #432A90;"> </p> 
                                            <input class="form-control form-texto" placeholder="Ingrese su Apellido" id="apellido" name="apellido"  type="text" style="margin-left: 2.5px;" required>
                                        </div>
                                        <div class="col-lg-12" style="padding:0;">
                                            <span  class=" error grupo-correcto" id="alerta_apellido">El campo apellido no puede llevar signos ni espacios</span>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="col-lg-12 row" style="margin:0">
                                    <div class="col-lg-12" style="display: flex; padding:0">
                                        <p class="icono" style="color: #432A90;"></p><input class="form-control form-texto" placeholder="Ingrese Un Usuario" name="usuarioAgregar"  id="usuarioAgregar" type="text" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <span id="alerta_usuarioAgregar" class="error grupo-correcto">El Usuario no puede llevar espacios y/o signos<br>debe llevar por lo menos 4 caracteres</span>
                                    </div>
                                </div>
                                <div class="col-lg-12 row" style="margin:0">
                                    <div class="col-lg-12" style="display: flex; padding:0">
                                        <p class="icono" style="color: #432A90;"></p><input class="form-control form-texto" placeholder="Ingrese su correo" name="correo"  id="correo" type="email" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <span id="alerta_correo" class="error grupo-correcto">El Email debe de llevar: '@','.'</span>
                                    </div>
                                </div>
                                <div class="col-lg-12 row" style="margin:0">
                                    <div class="col-lg-12" style="display: flex; padding:0">
                                        <p class="iconoSolid"> </p><input class="form-control form-texto" placeholder="Ingrese su Contraseña" name="contraseñaAgregar" id="contraseñaAgregar" type="password" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <span id="alerta_mayusculas" class="error grupo-correcto">Debe de tener por lo menos una mayuscula</span>    
                                        <span id="alerta_minuscula" class="error grupo-correcto">Debe de tener por lo menos una minuscula</span>
                                        <span id="alerta_rango" class="error grupo-correcto">Debe de tener de 5 a 15 caracteres.</span>
                                        <span id="alerta_numero" class="error grupo-correcto">Debe de tener por lo menos un número</span>
                                        <span id="alerta_signos" class="error grupo-correcto">La contraseña no puede llevar espacios ni signos</span>
                                    </div>
                                </div>
                                <div class="col-lg-12 row" style="margin:0">
                                    <div class="col-lg-12" style="display: flex;padding:0;">
                                        <p class="iconoSolid"> </p><input class="form-control form-texto" placeholder="Confirme su Contraseña" name="contraseña1" id="contraseña1" type="password" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <span id="alerta_contraseña1" class="error grupo-correcto">Las contraseñas deben de ser iguales</span>
                                    </div>
                                </div>    
                                <div class="col-lg-12 row" style="margin:0">
                                    <div class="col-lg-12" style="display: flex;padding:0;">
                                        <p class="iconoSolid"> </p><input class="form-control form-texto" placeholder="Nombre de la empresa que desea el servicio" name="nombreEmpresa" id="nombreEmpresa" type="text" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <span id="alerta_nombreEmpresa" class="error grupo-correcto">El nombre de empresa debe llevar de 4 a 20 caracteres y no debe de llevar signos</span>
                                    </div>
                                </div> 
                                <div class="col-lg-12 row" style="margin:0">
                                    <div class="col-lg-12" style="display: flex;padding:0;">
                                        <p class="iconoSolid"></p><input class="form-control form-texto" placeholder="No. de cuenta para depositar el monto de sus envios" name="numeroCuenta" id="numeroCuenta" type="number" required>
                                    </div>
                                    <div class="col-lg-12">
                                        <span id="alerta_numeroCuenta" class="error grupo-correcto">el número de cuenta no puede llevar signos,letras y/o espacios</span>
                                    </div>
                                </div> 
                                <div class="col-lg-12 row" style="margin:0">
                                    <div class="col-lg-12" style="display: flex;padding:0;">
                                        <p class="iconoSolid"></p>
                                        <select class="form-control form-texto" onchange="cambioTipoCuenta()" id="tipoCuenta" name="tipoCuenta" form="formRegistrarUsuario">
                                            <option selected disabled value="0">Seleccione el tipo de cuenta</option>
                                            <?php
                                                if($resultado->fetch_row()){
                                                    foreach($resultado as $resultadoActual){
                                                        ?> <option value="<?php echo $resultadoActual['tipoCuentaId']?>"><?php echo $resultadoActual['tipoCuentaDesc'] ?></option>
                                            <?php        
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-12">
                                        <span id="alerta_tipoCuenta" class="error grupo-correcto">Debe seleccionar el tipo de cuenta</span>
                                    </div>
                                </div>
                                <div class="col-lg-12 row" style="margin:0">
                                    <div class="col-lg-12" style="display: flex;padding:0;">
                                        <p class="iconoSolid"></p>
                                        <select class="form-control form-texto" id="banco" name="banco" form="formRegistrarUsuario" onchange="cambiobanco()">
                                            <option selected disabled value="0">Seleccione el banco de su cuenta</option>
                                            <?php
                                                $usuarios3 = new Usuarios();
                                                $resultado2 = $usuarios3->getbancos();
                                                if($resultado2->fetch_row()){
                                                    foreach($resultado2 as $resultadoActual){
                                                        ?> <option value="<?php echo $resultadoActual['bancoId']?>"><?php echo $resultadoActual['bancoDesc'] ?></option>
                                            <?php        
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-12">
                                        <span id="alerta_banco" class="error grupo-correcto">Debe seleccionar el banco de su cuenta</span>
                                    </div>
                                </div> 
                                <div>
                                    <span id="errorGlobal" class="error grupo-correcto">Hay campos incorrectos</span>
                                </div>         
                                <button type="submit" form="formRegistrarUsuario" class="custom-btn btn-3"><span>¡Registrarme!</span></button>
                            </form>
                        </div>

                    </div>
            </div>
        </section>
        <div class="logo" style="position: absolute; right:0; top:0">
           <a style="display:flex;justify-content:flex-end" href="index.php"><img style="width:70%; " src="assets/images/Logotipo sin fondo.png" class="img-fluid" ></a>
        </div>
        <footer class="w-100"  style="display: flex; justify-content:center">
            <div class="col-lg-12   col-xs-12 footer-background">
                <p class="footerText">Si necesitas más información de nuestros servicios<br>
                    nos puedes escribir en nuestras redes sociales:</p>
                <div>
                    <div  style="display:flex; justify-content:center">
                        <div style="padding-right: 5px;">
                            <p class="iconoBrands facebook"> +502 4860 7638  +502 3596 2610</p>
                        </div>
                        <div style="padding-right: 5px; padding-left:5px;">
                            <a href="https://www.facebook.com/Alasgt-693341821107003" class="iconoBrands facebook"> AlasGT</a>
                        </div>
                        <div style="padding-right: 5px; padding-left:5px;">
                            <p class="icono facebook"> alasentregas@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div style="display: flex; justify-content:center">
                    <form action="#" id="correo">
                        
                        <div style="display: flex;">
                            <input type="text" class="form-control" style="margin:7px;" required placeholder="Nombre completo" name="nombre">
                            <input type="email" class="form-control" style="margin:7px;" required placeholder="Email" name="email">
                        </div>
                        <div style="display: flex;">
                            <input type="number" class="form-control" style="margin:7px;" required placeholder="Teléfono" name="nombre">
                        </div>
                        <div style="display: flex;">
                            <textarea  class="form-control form-correo textarea1" style="margin:7px;" required placeholder="Escribe tu mensaje" name="mensaje" form="correo"></textarea>
                        </div>
                        <div style="display: flex; justify-content:center">
                            <input type="submit" class="boton-black  btn-lg" style="margin:7px;" required value="ENVIAR">
                        </div>
                    </form>
                </div>
            </div>
            
        </footer>
    </body>

    <script src="scripts/Formulario.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>