<?php
    if(isset($_GET['a'])){
        switch($_GET['a']){
            case 'pedidos':
                include_once 'views/pedidos.php';
                break;
            case 'chat':
                include_once 'views/chat.php';
                break;
            case 'datos':
                include_once 'views/MisDatos.php';
                break;
            case 'editarCuenta':
                include_once 'views/editarCuenta.php';
                break;
            case 'entregar':
                include_once 'views/pedidoEntregar.php';
                break;
            case 'entregarPedido':
                include_once 'controllers/PedidosController.php';
                $pedidos = new Pedidos();
                $resultado = $pedidos->entregarPedido();
                if($resultado){
                    $registrarExito = "¡Se ha entregado con exito!";
                }else{
                    $errorRegistrar = "Ha ocurrido un error, intenta de nuevo";
                }
                include_once 'views/pedidos.php';
                break;
            case 'actualizarCuentaMensajero':
                if($usuario->editarCuentaAdmin()){
                    $registrarExito = "Se ha editado su Cuenta actualice la página";
                }else{
                    $errorRegistrar = "No se ha podido Editar su cuenta Intente de nuevo";
                }
                include_once 'views/inicioMensajero.php';
                break;
            case 'cerrarSesion':
                include_once 'config/cerrarSesion.php';
                break;
            case 'agregarDatos':
                include_once 'controllers/mensajeroController.php';
                $mensajero = new Mensajero();
                $resultado = $mensajero->agregarDatos();
                if($resultado){
                    $registrarExito = "Se Han guardado tus datos correctamente.";
                    include_once 'views/inicioMensajero.php'; 
                }else{
                    $errorRegistrar = "Ha ocurrido un error, intentelo de nuevo (Posibles datos Duplicados)";
                    include_once 'views/MisDatos.php';
                }
                break;
            case 'editarDatos':
                include_once 'controllers/mensajeroController.php';
                $mensajero = new Mensajero();
                $resultado = $mensajero->editarDatos();
                if($resultado){
                    $registrarExito = "Se Han guardado tus datos correctamente.";
                    include_once 'views/inicioMensajero.php';
                }else{
                    $errorRegistrar = "Ha ocurrido un error, intentelo de nuevo";
                    include_once 'views/MisDatos.php';                    
                }
                break;
        }
    }else{
        include_once 'views/inicioMensajero.php';
    }




?>