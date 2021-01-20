<?php
    require_once "config/config.php";
    require_once "config/databases.php";
    require_once "controllers/UsuariosController.php";
    require_once "controllers/PedidosController.php";
    require_once "core/Routes.php";

    require_once "config/user_session.php";
    

    $usuarioSesion = new User_session();
    $usuario = new Usuarios();

    if(isset($_SESSION['usuario'])){
        $usuario -> setUsuario($usuarioSesion->getUsuarioActual());
        $pedidos = new Pedidos();
        if(isset($_GET['a'])){
            switch($_GET['a']){
                case 'agregarUsuario':
                    include_once 'views/AgregarUsuario.php';
                    break;
                case 'chat':
                    include_once 'views/chat.php';
                    break;
                case 'editarCuenta':
                    include_once 'views/editarCuenta.php';
                    break;
                case 'confirmar':
                    include_once 'views/confirmarPedido.php';
                    break;
                case 'guardarUsuarioAdmin':
                    if($usuario->guardarUsuarioAdmin()){
                        $errorRegistrar = "Usuario Duplicado, Por favor Intente de nuevo";
                    }else{
                        $registrarExito = "Su Usuario se ha agregado con exito, pidale al usuario que confirme su correo";
                    }
                    include_once 'views/AgregarUsuario.php';
                    break;
                case 'confirmarPedido':
                    if($pedidos->confirmarPedido()){
                        $errorRegistrar = "No se ha podido Confirmar su pedido Intente de nuevo";
                    }else{
                        $registrarExito = "Se ha Confirmado su pedido";
                    }
                    include_once 'views/inicioAdministrador.php';
                    
                    break;
                case 'actualizarCuenta':
                    if($usuario->editarCuenta()){
                        $registrarExito = "Se ha editado su Cuenta actualice la página";
                    }else{
                        $errorRegistrar = "No se ha podido Editar su cuenta Intente de nuevo";
                    }
                    include_once 'views/inicioAdministrador.php';
                    break;
            }
        }else{
        
            if($usuario->getTipo() == '1'){
                require_once "views/InicioAdministrador.php";
            }else{
                if($usuario->getTipo()=='2'){
                    require_once "views/InicioMensajero.php";
                }else{
                    if($usuario->getTipo() == '3'){
                        require_once "views/InicioCliente.php";
                    }else{
                        $errorLogin = "El Usuario y/o  contraseña  no existen";    
                        require_once "config/cerrarSesion.php";
                        require_once "views/login.php";
                        
                    }
                }
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
                        if($usuario->getTipo() == '3'){
                            require_once "views/InicioCliente.php";
                        }else{
                            $errorLogin = "El Usuario y/o  contraseña  no existen";    
                            require_once "views/login.php";
                        }
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
                    if(isset($_GET['correo'])){
                        if($usuario->confirmarCorreo($_GET['correo'])){
                            $registrarExito = "Su cuenta se ha confirmado Correctamente";
                            include_once "views/Login.php";
                        }else{
                            $errorRegistrar = "Ha ocurrido un error al confirmar su cuenta, intentelo de nuevo";
                            include_once "views/Login.php";
                        }
                    }else{
                        if($_GET['a']== 'guardarUsuario'){
                            if($usuario->guardarUsuario()){
                                $registrarExito = "Por Favor revise y confirme su correo Eléctronico (REVISE CARPETA DE SPAM)";
                                include_once "views/Login.php";
                            }else{
                                $errorRegistrar = "Ha ocurrido un error al momento de agregar el usuario, (USUARIO DUPLICADO)";
                                include_once "views/registrarUser.php";
                            }
                        }else{
                            cargarAccion($controller,$_GET['a']);    
                        }
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