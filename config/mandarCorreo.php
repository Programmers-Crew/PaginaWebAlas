<?php

    
    $sDestino = "davisrdln@gmail.com";
    $sAsunto = 'PREGUNTAS-INFORMACIÓN- ALASGT';
    $mensaje = $_POST['mensaje'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correoRemitente = $_POST['email'];
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
            $shtml = file_get_contents('config/Plantilla/informacion.php');
        //reemplazar sección de plantilla html con el css cargado y mensaje creado
            $incss  = str_replace('<style id="estilo"></style>',"<style>$scss</style>",$shtml);
            $mensajeEnviar1 = " 
                  <p>Hola Admin,<br>
                  ".$nombre." te ha enviado un correo diciendo lo siguiente:<br>
                  ".$mensaje."<br>
                  su correo es: ".$correoRemitente."<br>
                  su telefono es: ".$telefono."</p>
            ";
            $cuerpo = str_replace('<p id="solicitudmensaje"></p>',$mensajeEnviar1,$incss);
            
        $mail->Body = $cuerpo; //cuerpo del mensaje
        $mail->AltBody = '---';//Mensaje de sólo texto si el receptor no acepta HTML


    //ENVIAR MENSAJE
    if (!$mail->send()) {
        echo "Error al enviar: " . $mail->ErrorInfo;
    }
?>