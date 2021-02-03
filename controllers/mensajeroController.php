<?php

      class Mensajero{
            public function __construct(){
                  $this->db= Conectar::conexion();
            } 

            public function consultarDatosMensajero($id){
                  $sql = "call Sp_BuscarDatosMensajero('$id')";
                  $resultado = $this->db->query($sql);
                  return $resultado;
            }


            public function listarEstadoCivil(){
                  $sql = "call Sp_listarEstadoCivil()";
                  $resultado = $this->db->query($sql);
                  return $resultado;
            }
            public function agregarDatos(){
                  $primerNombre = $_POST['nombre1'];
                  $segundoNombre = $_POST['nombre2'];
                  $primerApellido = $_POST['apellido'];
                  $segundoApellido = $_POST['apellido2'];
                  $usuario = $_POST['idUsuario'];
                  $dpi = $_POST['dpi'];
                  $placas = $_POST['placa'];
                  $telefono = $_POST['telefono'];
                  $direccion = $_POST['direccion'];
                  $estadoCivil = $_POST['estadoCivil'];
                  $sql = "call Sp_AgregarDatos('$primerNombre','$segundoNombre','$primerApellido','$segundoApellido','$usuario','$dpi','$placas','$telefono','$direccion','$estadoCivil');";
                  $resultado = $this->db->query($sql);
                  return $resultado;
            }

            public function editarDatos(){
                  $primerNombre = $_POST['nombre1'];
                  $segundoNombre = $_POST['nombre2'];
                  $primerApellido = $_POST['apellido'];
                  $segundoApellido = $_POST['apellido2'];
                  $usuario = $_POST['idUsuario'];
                  $dpi = $_POST['dpi'];
                  $placas = $_POST['placa'];
                  $telefono = $_POST['telefono'];
                  $direccion = $_POST['direccion'];
                  $estadoCivil = $_POST['estadoCivil'];
                  $sql = "call Sp_ActualizarDatos('$primerNombre','$segundoNombre','$primerApellido','$segundoApellido','$usuario','$dpi','$placas','$telefono','$direccion','$estadoCivil');";
                  $resultado = $this->db->query($sql);
                  return $resultado;
            }

      }

?>