<?php
require ('phpmailer/Exception.php');
require ('phpmailer/PHPMailer.php');
require ('phpmailer/SMTP.php');

    $host = "localhost";
    $user = "root";
    $db = "taller_standup";
    $pass = "root";

    // $host = "localhost";
    // $user = "usrTallerStandUp";
    // $db = "taller_standup";
    // $pass = "t4ll3r5t4ndup";

    // Conectar a la base
    //  la variable $myslqi contendrá el objeto con la conexión
    $mysqli = mysqli_connect($host, $user, $pass, $db);
    if (mysqli_connect_errno($mysqli)) {
        die( "Error al conectar a MySQL: " . mysqli_connect_error() );
    }
    

    if(isset($_POST['nombre']) && isset($_POST['email']) &&
      isset($_POST['telefono']) && isset($_POST['curso'])){
        
        $nombre = $_POST['nombre'];     
        $email = $_POST['email'];     
        $telefono = $_POST['telefono'];     
        $ventas = $_POST['curso'];
 
    //insert en la base
    $query = "INSERT INTO `registro`(`id`, `nombre`, `email`, `telefono`, `curso`) VALUES (0, '".$nombre."', '".$email."', '".$telefono."', '".$curso."')";
    mysqli_query($mysqli, $query);
    // $res=['succesfull' => true];
    // echo json_encode($res);
    $mailTosend = "gotiel.orm@gmail.com";
    // $mailTosend = "curso@beastcomedy.com";
    $mail = new PHPMailer\PHPMailer\PHPMailer();
//    $mail->IsSMTP(); // enable SMTP
//    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
//    $mail->SMTPAuth = true; // authentication enabled
//    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
//    $mail->Host = "smtp.gmail.com";
//    $mail->Port = 465; // or 587
    $mail->IsHTML(true);
//    $mail->Username = "gotiel.orm@gmail.com";
//    $mail->Password = "RaKman1493";
    $mail->SetFrom("oscar.rangel@lunave.com");
    $mail->Subject = "Nuevo Usuario de sitio Web";
    $mail->Body = "<b>Hola tenemos un nuevo registro de usuario desde el sitio web para";
    $mail->AddAddress($mailTosend);


    $mail2 = new PHPMailer\PHPMailer\PHPMailer();
//    $mail->IsSMTP(); // enable SMTP
//    $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
//    $mail->SMTPAuth = true; // authentication enabled
//    $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
//    $mail->Host = "smtp.gmail.com";
//    $mail->Port = 465; // or 587
    $mail2->IsHTML(true);
//    $mail->Username = "gotiel.orm@gmail.com";
//    $mail->Password = "RaKman1493";
    $mail2->SetFrom("curso@beastcomedy.com");
    $mail2->Subject = "Registro al taller de Stand Up";
    $mail2->Body = "<b>Hola tenemos un nuevo registro de usuario desde el sitio web para";
    $mail2->AddAddress($mailTosend);

     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        $res=['succesfull' => true];
        echo json_encode($res);
     }    
        
    }else{
        $res=['succesfull' => 'incompleto'];
        echo json_encode($res);
    }

?>