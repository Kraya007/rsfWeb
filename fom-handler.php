<?php
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['email_sub'];
$message = $_POST['message'];

$email_from = "From:".$name."<".$email.">\r\n";

$to = 'kndubane23@gmail.com';

mail($to, $email_subject, $message, $headers) or die("Error");
echo"message send"; 

// Redirect to the contact page after submission
header("Location: Contact.html");
exit();
?>
