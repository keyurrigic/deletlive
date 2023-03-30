<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, access-control-allow-methods, Access-Control-Allow-Headers, X-Requested-With, Authorization");
header('Content-Type: application/json; charset=utf-8');
//include("../src/RtcTokenBuilder.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once '../deletapi/vendor/autoload.php';

$data = json_decode(file_get_contents('php://input'), true);
$propertyid=$data['propertyid'];
$email=$data['email'];
$address=$data['address'];
if(!empty($propertyid) && !empty($email) && !empty($address)){
    //echo "Hello";
    //$to = 'sendto@example.com';
    $mail = new PHPMailer(true);

    $to = $email;
    $subject = "Buzzer request at ".$address;
    $link="https://app.delet.com/#!/property/view/".$propertyid;

    $message = "<p>A buzzer request was just made on the application.</p>
    <p>Property Link: <a href='".$link."'>".$link."</a></p>
    </body>";

    // Always set content-type when sending HTML email
    /*$headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: <delet@rigicgspl.com>' . "\r\n";
    mail($to,$subject,$message,$headers);*/

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
        $mail->addAddress($to);     //Add a recipient
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $subject;
        
        
        $mail->Body    =  $message;
    
        $mail->send();
    } catch (Exception $e) {
        $data = array('success'=>false,"message"=>"Email Could not be Sent");
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data);
        die;
    }
   
}
$response=[
    'success'=>true,
];
echo json_encode($response);