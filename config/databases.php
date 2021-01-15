<?php

    class Conectar{

        public static function conexion(){
            $host="localhost";
            $port=3306;
            $socket="";
            $user="root";
            $password="ordonez2003";
            $dbname="dbalasgt";

            $con = new mysqli($host, $user, $password, $dbname, $port, $socket)
            or die ('error al conectar base de datos' . mysqli_connect_error());
            
            return $con;

        }

    }


?>