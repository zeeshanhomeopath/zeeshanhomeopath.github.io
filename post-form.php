<?php

$curl = curl_init();

$to = "zeeshan.homeopath@gmail.com"; // this is your Email address
$from = $_POST['email']; // this is the sender's Email address
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$phone_number = $_POST['phone_number'];
$message = $_POST['message'];
$subject = "Contact Form submission";
$email_message = "<p>Hi Admin, You received a new email with following details </p>";
$email_message .= "<p>First Name: <b>".$first_name."</b></p>";
$email_message .= "<p>Last Name: <b>".$last_name."</b></p>";
$email_message .= "<p>Email: <b>".$from."</b></p>";
$email_message .= "<p>Telephone: <b>".$phone_number."</b></p>";
$email_message .= "<p>Message: <b>".$message."</b></p>";

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.sendgrid.com/v3/mail/send",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"personalizations\": [{\"to\": [{\"email\": \"".$to."\"}]}],\"from\": {\"email\": \"Admin - TRC <admin@therapidcure.com>\"},\"subject\": \"Contact form has been submitted\",\"content\": [{\"type\": \"text/html\", \"value\": \"".$email_message."\"}]}",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer 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",
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
