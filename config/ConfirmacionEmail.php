<?php

    
    /*RECOGER VALORES ENVIADOS DESDE INDEX.PHP*/
    $sDestino = $_POST['correo'];
    $sAsunto = 'CONFIRMACIÓN DE CUENTA- ALASGT';
    $sMensaje = '¡DA CLIC AL BOTÓN PARA CONFIRMAR TU CUENTA!';
    include('PHPMailer/src/PHPMailer.php');
    include('PHPMailer/src/Exception.php');
    include('PHPMailer/src/SMTP.php');
    $mail = new PHPMailer\PHPMailer\PHPMailer();

        $mail->isSMTP(); //Indicar que se usará SMTP
        $mail->CharSet = 'UTF-8';//permitir envío de caracteres especiales (tildes y ñ)
    /*CONFIGURACIÓN DE DEBUG (DEPURACIÓN)*/
        $mail->SMTPDebug = 0; 
        $mail->Debugoutput = 'html'; //Mostrar mensajes (resultados) de depuración(debug) en html
    /*CONFIGURACIÓN DE PROVEEDOR DE CORREO QUE USARÁ EL EMISOR(GMAIL)*/

        $mail->Host = 'smtp.Live.com'; //Nombre de host
        // $mail->Host = gethostbyname('smtp.gmail.com'); // Si su red no soporta SMTP sobre IPv6
        $mail->Port = 587; //Puerto SMTP, 587 para autenticado TLS
        $mail->SMTPSecure = 'tls'; //Sistema de encriptación - ssl (obsoleto) o tls
        $mail->SMTPAuth = "true";//Usar autenticación SMTP
        $mail->SMTPOptions = array(
            'ssl' => array('verify_peer' => false,'verify_peer_name' => false,'allow_self_signed' => true)
        );//opciones para "saltarse" comprobación de certificados (hace posible del envío desde localhost)
    //CONFIGURACIÓN DEL EMISOR
        $mail->Username = "droldanGps@outlook.com";
        $mail->Password = "ordonez2003";
        $mail->setFrom("droldanGps@outlook.com", 'davis roldan');
        $mail ->addAddress($sDestino);
        $mail->Subject = $sAsunto; //asunto del mensaje
        

        //cargar archivo css para cuerpo de mensaje
            $rcss = "config/Plantilla/estilo.css";//ruta de archivo css
            $fcss = fopen ($rcss, "r");//abrir archivo css
            $scss = fread ($fcss, filesize ($rcss));//leer contenido de css
            fclose ($fcss);//cerrar archivo css
        //Cargar archivo html   
            $shtml = file_get_contents('config/Plantilla/mensaje.php');
        //reemplazar sección de plantilla html con el css cargado y mensaje creado
            $incss  = str_replace('<style id="estilo"></style>',"<style>$scss</style>",$shtml);
            $botonReemplazar = " <a style='margin: 10px;
             padding: 5px;
             height:fit-content;
            background-color: #432A90;
            text-decoration:none;
            border-radius: 10px;
            font-family: Berlin Sans FB;
            font-size:17px;
            color: white;' class='boton' href='localhost/paginawebalas/index.php?c=Usuarios&a=confirmarUsuarios&correo=".$sDestino."'>¡CONFIRMAR!</a>";
            $cuerpo = str_replace('<a id="boton"></a>',$botonReemplazar,$incss);
            
        $mail->Body = $cuerpo; //cuerpo del mensaje
        $mail->AltBody = '---';//Mensaje de sólo texto si el receptor no acepta HTML


    //ENVIAR MENSAJE
    if (!$mail->send()) {
        echo "Error al enviar: " . $mail->ErrorInfo;
    }
?>