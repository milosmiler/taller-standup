<?php
require ('phpmailer/Exception.php');
require ('phpmailer/PHPMailer.php');
require ('phpmailer/SMTP.php');

    // $host = "localhost";
    // $user = "root";
    // $db = "taller_standup";
    // $pass = "root";

    // // $host = "localhost";
    // // $user = "usrTallerStandUp";
    // // $db = "taller_standup";
    // // $pass = "t4ll3r5t4ndup";

    // // Conectar a la base
    // //  la variable $myslqi contendrá el objeto con la conexión
    // $mysqli = mysqli_connect($host, $user, $pass, $db);
    // if (mysqli_connect_errno($mysqli)) {
    //     die( "Error al conectar a MySQL: " . mysqli_connect_error() );
    // }
    

    if(isset($_POST['nombre']) && isset($_POST['email']) &&
      isset($_POST['telefono']) && isset($_POST['curso'])){
        
        $nombre = $_POST['nombre'];     
        $email = $_POST['email'];     
        $telefono = $_POST['telefono'];     
        $curso = $_POST['curso'];
    
    // //insert en la base
    // $query = "INSERT INTO `registro`(`id`, `nombre`, `email`, `telefono`, `curso`) VALUES (0, '".$nombre."', '".$email."', '".$telefono."', '".$curso."')";
    // mysqli_query($mysqli, $query);
    // $res=['succesfull' => true];
    // echo json_encode($res);
    if($curso != 'Tallereo'){  
        $bodyMail = '<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>standup</title>
</head>
<body>

<!--Copia desde aquí-->
<table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse; background: #fff;">

  <tr>
    <td colspan="2">
    <center>
      <a href="">
        <img width="50%" style="display:block; margin: 1.5% 3%" src="http://beastcomedy.com/images/logo.svg">
      </a>
    </center>
    </td>
  </tr>

  <tr style="border-bottom: 1px solid rgba(112, 112, 112, 0.18)">
    <td colspan="2">
      <center>
        <h2 style="padding: 0; font-family: ´Trebuchet MS´;font-size: 17px; color: #6E6666;">GRACIAS POR TU REGISTRO</h2>
      </center>
    </td>
  </tr>
  <tr>
    <td style="width: 50%; padding-left: 20px;">
      <h2 style="color: #E02D86; font-family: ´Trebuchet MS´; ">TEMARIO DEL CURSO.</h2>
      <ul style="font-size: 12px; color: #6E6666; font-family: ´Trebuchet MS´; list-style: none; padding:0; border-right: 1px solid rgba(112, 112, 112, 0.18)">
        <li> - Que es el Stand up Comedy?</li>
        <li> - Que NO es el Stand Up comedy?</li>
        <li> - Reto en el Stand Up </li>
        <li> - Creación de tu Material </li>
        <li> - Ejercicio 1 </li>
        <li>- Proceso en el creación de una rutina cómica </li>
        <li>- Ejercicio 2 </li>
        <li>- Como hacer para que tenga chiste </li>
        <li>- Formulas </li>
        <li>- Preparaciones o Premisas </li>
        <li>- Punch Line o remate </li>
        <li>- De 3 en todo </li>
        <li> - Tipos de Chiste </li>
        <li>- Delivery </li>
        <li> - Personaje </li>
        <li>- Ejecución en escena </li>
        <li>- Como mejorar </li>
        <li>- Ejercicios, Tallereo y mejorar todo el tiempo</li>
      </ul>
    </td>
    <td style="width: 50%;padding-left: 30px; vertical-align: top;">
      <h2 style="color: #E02D86; font-family: ´Trebuchet MS´;">DIAS DE CLASE</h2>
      <h3 style="font-size: 11px; color:#6E6666;"> Sesiones: 8 </h3>
      <p  style=" font-size: 11px;"> Fechas </p>
      <ul style="font-size: 12px; color: #6E6666;font-family: ´Trebuchet MS´;list-style: none; padding:0;">
        <li>- 21 enero</li>
        <li>- 28 enero</li>
        <li>- 4 febrero</li>
        <li>- 11 febrero</li>
        <li>- 18 febrero </li>
        <li>- 19 febrero </li>
        <li>- 4 marzo </li>
        <li>- 5 marzo </li>
      </ul>
      <p style="font-size: 12px; color: #E02D86; font-family: ´Trebuchet MS´;">Horario 19:00 – 22:00</p>
      <p style="color: #E02D86; font-size: 17px;font-family: ´Trebuchet MS´;">DUDAS AL WHATSAPP</p> 
      <p style="font-size: 17px; color: #585456; font-family: ´Trebuchet MS´;">55-4343-8434</p>  
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <p style="color: #E02D86; text-align: center;font-size: 11px;font-family: ´Trebuchet MS´;">Curso impartido por el maestro Julio Sandoval, la sede es el Beer Hall</p>
    </td>
  </tr>
</table>
<!--hasta aquí-->

</body>';
}else{
     $bodyMail = '<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>standup</title>
</head>
<body>

<!--Copia desde aquí-->
<table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse; background: #fff;">

  <tr>
    <td colspan="2">
    <center>
      <a href="">
        <img width="50%" style="display:block; margin: 1.5% 3%" src="http://beastcomedy.com/images/logo.svg">
      </a>
    </center>
    </td>
  </tr>

  <tr style="border-bottom: 1px solid rgba(112, 112, 112, 0.18)">
    <td colspan="2">
      <center>
        <h2 style="padding: 0; font-family: ´Trebuchet MS´;font-size: 17px; color: #6E6666;">GRACIAS POR TU REGISTRO</h2>
      </center>
    </td>
  </tr>
  <tr>
    <td style="width: 50%; padding-left: 20px;vertical-align: text-bottom;">
      <h2 style="color: #E02D86; font-family: ´Trebuchet MS´; ">TEMARIO DEL CURSO.</h2>
      <ul style="font-size: 12px; color: #6E6666; font-family: ´Trebuchet MS´; list-style: none; padding:0; border-right: 1px solid rgba(112, 112, 112, 0.18)">
        <li> - Contar con una rutina de mínimo 5 min </li>
        <li> - Ejercicios, Tallereo y mejorar todo el tiempo </li>
       
      </ul>
    </td>
    <td style="width: 50%;padding-left: 30px; vertical-align: top;">
      <h2 style="color: #E02D86; font-family: ´Trebuchet MS´;">DIAS DE CLASE</h2>
      <h3 style="font-size: 11px; color:#6E6666;"> Sesiones: 4 </h3>
      <p  style=" font-size: 11px;"> Fechas </p>
      <ul style="font-size: 12px; color: #6E6666;font-family: ´Trebuchet MS´;list-style: none; padding:0;">
        <li>- 22 enero</li>
        <li>- 29 enero</li>
        <li>- 5 febrero</li>
        <li>- 12 febrero</li>
      </ul>
      <p style="font-size: 12px; color: #E02D86; font-family: ´Trebuchet MS´;">Horario 19:00 – 22:00</p>
      <p style="color: #E02D86; font-size: 17px;font-family: ´Trebuchet MS´;">DUDAS AL WHATSAPP</p> 
      <p style="font-size: 17px; color: #585456; font-family: ´Trebuchet MS´;">55-4343-8434</p>  
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <p style="color: #E02D86; text-align: center;font-size: 11px;font-family: ´Trebuchet MS´;">Curso impartido por el maestro Julio Sandoval, la sede es el Beer Hall</p>
    </td>
  </tr>
</table>
<!--hasta aquí-->

</body>';
}
        $mailTosend = "curso@beastcomedy.com";
        // $mailTosend = "gotiel.orm@gmail.com";
        $bodyMail2 = "Nombre: ".$nombre."<br> Email: ".$email."<br>Teléfono: ".$telefono."<br> Curso: ".$curso;
        // $mailTosend = "curso@beastcomedy.com";
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsHTML(true);
        $mail->SetFrom("curso@beastcomedy.com");
        $mail->Subject = "Nuevo registro desde sitio web Beast Comedy";
        $mail->Body = $bodyMail2;
        $mail->AddAddress($mailTosend);

        $mail2 = new PHPMailer\PHPMailer\PHPMailer();
        $mail2->IsHTML(true);
        $mail2->SetFrom("curso@beastcomedy.com");
        $mail2->Subject = "Registro al taller de Stand Up";
        $mail2->Body = $bodyMail;
        $mail2->AddAddress($email);
        $mail2->Send();
         if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
         } else {
            $res=['succesfull' => true];
            echo json_encode($res);
         }    
        
    }else{
        $res=['succesfull' => false];
        echo json_encode($res);
    }

?>