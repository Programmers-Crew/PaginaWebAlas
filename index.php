<?php
    require_once "config/config.php";
    require_once "config/databases.php";
    require_once "controllers/UsuariosController.php";
    require_once "core/Routes.php";

    

    
    if(isset($_GET['c'])){
        $controller = cargarControlador($_GET['c']);
        if(isset($_GET['a'])){
            cargarAccion($controller,$_GET['a']);
        }else{
            cargarAccion($controller,ACCION_PRINCIPAL);
        }
    }else{
        $controller = cargarControlador(CONTROLADOR_PRINCIPAL);
        $accionDefault = ACCION_PRINCIPAL;
        $controller->$accionDefault();
    }


?>