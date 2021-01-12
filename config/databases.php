<?php

    class Conectar{

        public function conexion(){
            $conexion = new mysqli("localhost","root","ordonez2003","dbalasgt");
            return $conexion;


        }

    }


?>