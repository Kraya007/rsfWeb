<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Sanitize input
$name = htmlspecialchars($_POST['name']);
$visitor_email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$subject = htmlspecialchars($_POST['email_sub']);
$message = htmlspecialchars($_POST['message']);

// Check if email is valid
if (!$visitor_email) {
    echo "Invalid email format";
    exit();
}

$email_from = 'noreply@rsftutorials.academy'; // Use a valid email address
$email_subject = 'New Form Submission';
$email_body = "User Name: $name.\n".
              "User Email: $visitor_email.\n".
              "Subject: $subject.\n".
              "User Message: $message.\n";

$to = 'rsfmanagement2@gmail.com';
// Added headers
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";

// Send email and check if it's successful
if(mail($to, $email_subject, $email_body, $headers)) {
    // Redirect to the contact page after submission
    header("Location: Contact.html");
    exit();
} else {
    echo "Failed to send the email.";
}
?>
