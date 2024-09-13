<?php
$name = $_POST['name'];
$visitor_email = $_POST['email'];
$subject = $_POST['email_sub'];
$message = $_POST['message'];

$email_from = 'noreply@rsftutorials.academy';
$email_subject = 'New Form Submission';
$email_body = "User Name: $name.\n".
              "User Email: $visitor_email.\n".
              "Subject: $subject.\n".
              "User Message: $message.\n";

$to = 'kndubane23@gmail.com';
//added
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";

mail($to, $email_subject, $email_body, $headers);

// Redirect to the contact page after submission
header("Location: Contact.html");
exit();
?>
