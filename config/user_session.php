<?php
    class User_session{
        public function __construct(){
            session_start();
        }

        public function setUsuarioActual($usuario){
            $_SESSION['usuario'] = $usuario;
        }
        public function getUsuarioActual(){
            return $_SESSION['usuario'];
        }
        public function closeSesion(){
            session_unset();
            session_destroy();
        }
    }

?>