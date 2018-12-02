<?php
if(isset($_POST['email'])) {
    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "webmaster@luveragbymika.com";
    $email_subject = "Contacto Rapido";
 
    function died($error) {
        // your error code can go here
        echo "Lo sentimos mucho, pero, existen errores en la información enviada.";
        echo "Estos errores aparecen a continuación.<br /><br />";
        echo $error."<br /><br />";
        echo "Por favor regregresase e intenta corregir estos errores.<br /><br />";
        die();
    }
 
 
    // validation expected data exists
    if(!isset($_POST['name']) ||
        !isset($_POST['email']) ||
        !isset($_POST['phone']) ||
        !isset($_POST['message'])) {
        died('Lo sentimos, pero, parece haber un problema con la información enviada.');       
    }
 
     
 
    $name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $phone = $_POST['phone']; // not required
    $message = $_POST['message']; // required
 
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'Direción de correo invalida.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
    $error_message .= 'Nombre parece invalido.<br />';
  }
 
 
  if(strlen($message) < 2) {
    $error_message .= 'El mensaje parece invalido.<br />';
  }
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Detalles del Cotacto a continuación.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
     
 
    $email_message .= "Nombre: ".clean_string($name)."\n";
    $email_message .= "Correo: ".clean_string($email_from)."\n";
    $email_message .= "Teléfono: ".clean_string($phone)."\n";
    $email_message .= "Mensaje: ".clean_string($message)."\n";
 
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>
 
<!-- include your own success html here -->
 
<p>Thank you for contacting us. We will be in touch with you very soon.</p>

<?php
 
}
?>