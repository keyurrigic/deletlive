<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'vendor/autoload.php';

$json = file_get_contents('php://input');
if(empty($json))
{
    $data = array('success'=>false,"message"=>"Please enter Serial Number");
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
    die;
}

$data = json_decode($json);
$name=$data->name;
$email=$data->email;
$applyUrl=$data->applyUrl;
$address=$data->address;
if(empty($name) || empty($email) || empty($address))
{
    $data = array('success'=>false,"message"=>"Invalid Data Entered");
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
    die;
}

if(empty($applyUrl) || $applyUrl==""){
    $body='If you would like to apply please follow the link below.<br/>
    Along with your application please provide the following:<br/>
    Thank you!';
}
else{
    $body='If you would like to apply please follow the link below.<br/>
    <a href="'.$applyUrl.'">Click Here</a><br/>
    Thank you!';
}

$params = array(
    'to'        => $email,
    'toname'    => $name,
    'from'      => "noreply@delet.com",
    'fromname'  => "EavlyLA",
    'subject'   => "Address: ".$address. ' Rental Application',
    'text'      => "",
    'html'      => $body,
  );
$url = 'https://api.sendgrid.com/';
$request =  $url.'api/mail.send.json';

// Generate curl request
$session = curl_init($request);
// Tell PHP not to use SSLv3 (instead opting for TLS)
curl_setopt($session, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);
curl_setopt($session, CURLOPT_HTTPHEADER, array('Authorization: Bearer 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'));
// Tell curl to use HTTP POST
curl_setopt ($session, CURLOPT_POST, true);
// Tell curl that this is the body of the POST
curl_setopt ($session, CURLOPT_POSTFIELDS, $params);
// Tell curl not to return headers, but do return the response
curl_setopt($session, CURLOPT_HEADER, false);
curl_setopt($session, CURLOPT_RETURNTRANSFER, true);

// obtain response
$response = curl_exec($session);
curl_close($session);

// print everything out
//print_r($response);

$data = array('success'=>true,"message"=>"Email Sent");
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);
die;
$mail = new PHPMailer(true);

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'mail.rigicgspl.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'delet@rigicgspl.com';                     //SMTP username
    $mail->Password   = 'c,1b*4R13n%2';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('deletall@rigicgspl.com', 'Delet App');
    $mail->addAddress($email, $name);     //Add a recipient
   // $mail->addAddress('ellen@example.com');               //Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
   // $mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "Address: ".$address. ' Rental Application';
    if(empty($applyUrl) || $applyUrl==""){
        $body='If you would like to apply please follow the link below.<br/>
        Along with your application please provide the following:<br/>
        Three full bank statements for most recents months<br/>
        Proof of Income (three most recent pay stubs or tax returns)<br/>
        Photo of ID<br/>
        Thank you!';
    }
    else{
        $body='If you would like to apply please follow the link below.<br/>
        <a href="'.$applyUrl.'">Click Here</a><br/>
        Along with your application please provide the following:<br/>
        Three full bank statements for most recents months<br/>
        Proof of Income (three most recent pay stubs or tax returns)<br/>
        Photo of ID<br/>
        Thank you!';
    }
    
    $mail->Body    = $body;

    $mail->send();
    $data = array('success'=>true,"message"=>"Email Sent");
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
    die;
} catch (Exception $e) {
    $data = array('success'=>false,"message"=>"Email Could not be Sent");
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
    die;
}
die;
