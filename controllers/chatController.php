<?php

      class Chat{
            private $receptorId;
            public function __construct(){
                  $this->db= Conectar::conexion();
            } 

            public function listarUsuario(){
                  $sql ="call Sp_ListarUsuario()";
                  $resultado = $this->db->query($sql);
                  return $resultado;
            }

            public function listarUsuarioChat($id){
                  $sql ="call Sp_ListarChatsUsuario('$id')";
                  $resultado = $this->db->query($sql);
                  return $resultado;
            }

            public function nuevoChat(){
                  $idSendUsuario = $_POST['idUsuarioSend'];
                  $idReceiverUsuario = $_POST['idUsuarioReceiver'];
                  $sql = "call Sp_CrearSala('$idSendUsuario','$idReceiverUsuario')";
                  $resultado = $this->db->query($sql);
                  return $resultado;
            }

            public function buscarSala($send, $receiver){
                  $sql = "call SpBuscarSala('$send','$receiver')";
                  $resultado = $this->db->query($sql);
                  foreach($resultado as $resultadoActual3){
                        $sala = $resultadoActual3['salaId'];
                    }
                  return $sala;
            }

            public function listarMensajes(){
                  $receiver = $_POST['receiver'];
                  $send = $_POST['send'];
                  $this->receptorId = $receiver;
                  $sql = "call Sp_ListarMensajes('$receiver','$send')";
                  $resultado = $this->db->query($sql);
                  return $resultado;
            }

            public function agregarMensaje(){
                  $mensaje = $_POST['mensaje'];
                  $sala = $_POST['sala'];
                  $send  = $_POST['send'];
                  $receiver = $_POST['receiver'];
                  $sql = "call Sp_AgregarMensaje('$mensaje','$sala','$send','$receiver')";
                  $resultado = $this->db->query($sql);
                  return $resultado;
            }

            public function getReceptorId(){
                  return $this->receptorId;
            }
            
            public function buscarUsuarioChat(){
                  $username = $_POST['userNamePost'];
                  $sql = "call Sp_BuscarUsuarioChat('$username')";
                  $resultado = $this->db->query($sql);
                  return $resultado;
            }
      }

?>