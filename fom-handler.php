<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

if(isset($_POST['submit']))
{

    $name = $_POST['name']
    $email = $_POST['email']
    $email_sub = $_POST['email_sub']
    $message = $_POST['message']

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();  
        $mail->SMTPAuth   = true;                                          //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                                        //Enable SMTP authentication
        $mail->Username   = 'kndubane23@gmail.com';                     //SMTP username
        $mail->Password   = 'zyhffqzkdyxnpogs';        
                            //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            // 465Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('kndubane23@gmail.com', 'Kevin');
        $mail->addAddress('kndubane23@gmail.com', 'Joe User');     //Add a recipient


        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Here is the subject';
        $mail->Body    = '<h3> Hello you have received a new enquiry<h3>
        <h4> name: '.$name.'</h4>
        <h4> email: '.$email.'</h4>
        <h4> email_sub: '.$email_sub.'</h4>
        <h4> message: '.$message.'</h4>
        
        ';
    
        if($mail->send())
        {
            $_SESSION['status'] = "Thank you for contacting us"
            header("Location: {$_server["HTTP_REFERER"]}")
            exit(0);
        }
        else
        {

            $_SESSION['status'] = "Message has been sent"
            header('Location: index.html')
            exit(0);

        }
        
    } catch (Exception $e) {
        echo "Message could not be sent . Mailer Error: {$mail->ErrorInfo}";
    }
}
else{
    header('Location: index.html')
    exit(0);
}

?>
