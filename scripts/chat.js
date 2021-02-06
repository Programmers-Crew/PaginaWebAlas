

    $(document).ready(function(){
        setInterval(function(){
            if($('#valido').length){
            }else{
                if($('#validoMensaje').length){

                }else{
                   
                    actualizarMensaje(); 
                }
                
            }
        }, 7000);
    }); 


    function actualizarMensaje(){
        var receiver =getReciever();
        var recepNombre = getrecepNombre();
        var sendNombre = getSendNombre();
        var idSend = $("#idSend").val();
        var parametros = {"receiver":receiver,"send":idSend,"receptorName":recepNombre,"sendNombre":sendNombre};
      $.ajax({
        data:parametros,
        url:'index.php?a=listarMensaje',
        type: 'POST',
        success: function(response){
            $("#contenedorMensaje1").html(response);
            var div = document.getElementById('totalMensajes');
            var yPos = getScroll();
            div.scrollTop = yPos+20;
        }

      });  
    }
    var scroll;
    
    function setScroll(){
        scroll = $("#totalMensajes").scrollTop();
    }
    function getScroll(){
        return scroll;
    }
  function nuevoUsuario(receptor,Send,nombre,sendNombre){
        setReciever(receptor);
        setrecepNombre(nombre);
        setSendNombre(sendNombre);
        var divChat = document.getElementById("sidebar");
      if(divChat.style.display == "none"){
          divChat.style.display="block";
      }else{
          divChat.style.display="none";
      }
      var parametros = {"receiver":receptor,"send":Send,"receptorName":nombre,"sendNombre":sendNombre};
      $.ajax({
        data:parametros,
        url:'index.php?a=listarMensaje',
        type: 'POST',
        beforeSend: function(){
            $("#contenedorMensaje1").html("Cargando Conversación...")
        },
        success: function(response){   
            $("#contenedorMensaje1").html(response);
            var div = document.getElementById('totalMensajes');
            div.scrollTop = '9999';
        }

      });
  }
  var recepID;

  function setReciever(reciever){
    recepID = reciever;
  }
  function getReciever(){
      return recepID;
  }

  var recepNombre;
  function setrecepNombre(reciever){
    recepNombre = reciever;
  }
  function getrecepNombre(){
      return recepNombre;
  }
  var sendNombre;
  function setSendNombre(send){
    sendNombre = send;
  }
  function getSendNombre(){
      return sendNombre;
  }
  function nuevoMensaje(mensaje,sala,send,receiver){
      var nombreReceptor = getrecepNombre();
      var sendNombre = getSendNombre();
      var receiverId = getReciever();
      console.log(receiverId);
    if(mensaje != ""){
        var parametros = {"mensaje":mensaje, "sala":sala,"send":send,"receiver":receiverId,"receptorName":nombreReceptor,"sendNombre":sendNombre};
        $.ajax({
            data:parametros,
            url:'index.php?a=nuevoMensaje',
            type: 'POST',
            beforeSend: function(){
                $("#contenedorMensaje1").html("Enviando Mensaje...")
            },
            success: function(response){
                $("#contenedorMensaje1").html(response);
                var div = document.getElementById('totalMensajes');
                div.scrollTop = '9999';
                $("#mensaje").val("");
            }
        });
    }
  }

  function buscarUserName(){
      var userName = document.getElementById('userNameBuscar');
      if(userName.value != ''){
        var parametros = {"userNamePost":userName.value};
        $.ajax({
            data: parametros,
            url: 'index.php?a=buscarUserChat',
            type: 'POST',
            beforeSend: function(){
                $('#contenedorPosiblesChat').html("cargando busqueda")
            },
            success: function(response){
                $('#contenedorPosiblesChat').html(response);
                $('#userNameBuscar').val("");
            }
        });
      }
  }
 