<?php
    include_once 'user_session.php';

    $usuarioSesion1 = new User_session();
    
    $usuarioSesion1 -> closeSesion();

    header("location: ../index.php");


?>