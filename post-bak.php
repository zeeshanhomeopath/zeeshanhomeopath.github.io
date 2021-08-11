<?php 

$to = "shoaibanjam@gmail.com"; // this is your Email address
$from = $_POST['email']; // this is the sender's Email address
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone_number = $_POST['phone_number'];
$message = $_POST['message'];
$subject = "Contact Form submission";
$email_message = "Hi Admin, You received a new email with following details". "<br>";
$email_message .= "First Name: ".$first_name."<br>";
$email_message .= "Last Name: ".$last_name."<br>";
$email_message .= "Email: ".$from."<br>";
$email_message .= "Telephone: ".$phone_number."<br>";
$email_message .= "Message: ".$message."<br>";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
// More headers
$headers .= 'From:' .$from . "\r\n";
mail($to,$subject,$email_message,$headers);
echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
// You can also use header('Location: thank_you.php'); to redirect to another page.

?>
