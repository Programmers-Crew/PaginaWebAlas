<?php
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
                        require_once "views/InicioAdministrador.php";
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
                include_once 'views/InicioAdministrador.php';
            }
?>