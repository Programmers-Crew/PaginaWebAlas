<?php
    require_once "config/config.php";
    require_once "config/databases.php";
    require_once "controllers/UsuariosController.php";
    require_once "core/Routes.php";

    require_once "config/user_session.php";
    

    $usuarioSesion = new User_session();
    $usuario = new Usuarios();

    if(isset($_SESSION['usuario'])){
        $usuario -> setUsuario($usuarioSesion->getUsuarioActual());
        
        if($usuario->getTipo() == '1'){
            require_once "views/InicioAdministrador.php";
        }else{
            if($usuario->getTipo()=='2'){
                require_once "views/InicioMensajero.php";
            }else{
                require_once "views/InicioCliente.php";
            }
            
        }
    }else{
        if(isset($_POST['usuario']) && isset($_POST['contraseña'])){
            $usuarioForm =$_POST['usuario'];
            $contraseñaForm =$_POST['contraseña'];
            if($usuario->validarLogin($usuarioForm,$contraseñaForm)){ 
                $usuarioSesion ->setUsuarioActual($usuarioForm);
                if($usuario->getTipo() == '1'){
                    require_once "views/InicioAdministrador.php";
                }else{
                    if($usuario->getTipo()=='2'){
                        require_once "views/InicioMensajero.php";
                    }else{
                        require_once "views/InicioCliente.php";
                    }
                    
                }
            }else{
                $errorLogin = "El Usuario y/o  contraseña  no es correcto";    
                require_once "views/login.php";
            }

            
        }else{
            
            if(isset($_GET['c'])){
                $controller = cargarControlador($_GET['c']);
                if(isset($_GET['a'])){
                    if($_GET['a']== 'guardarUsuario'){
                        if($usuario->guardarUsuario()){
                            $registrarExito = "Se ha agregado con Exito tu Usuario. ¡Ingresa ya!";
                            include_once "views/Login.php";
                        }else{
                            $errorRegistrar = "Ha ocurrido un error al momento de agregar el usuario, (USUARIO DUPLICADO)";
                            include_once "views/registrarUser.php";
                        }
                    }else{
                        cargarAccion($controller,$_GET['a']);    
                    }
                    
                }else{
                    cargarAccion($controller,ACCION_PRINCIPAL);
                }
            }else{
                $controller = cargarControlador(CONTROLADOR_PRINCIPAL);
                $accionDefault = ACCION_PRINCIPAL;
                $controller->$accionDefault();
            }
        }
    }

    
    


?>