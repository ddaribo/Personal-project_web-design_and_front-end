<?php

$errors = '';
$myemail = 'bozhidara.p@abv.bg';
if(empty($_POST['name'])  || 
   empty($_POST['emailForm']) || 
   empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}


if (isset($_POST['name'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
}

if (isset($_POST['emailForm'])) {
    $email_address = filter_var($_POST['emailForm'], FILTER_SANITIZE_STRING); 
}

if (isset($_POST['message'])) {
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING); 
}

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

echo $errors;

if( empty($errors))

{

    $to = $myemail;

    $email_subject = "Contact form submission: $name";

    $email_body = "You have received a new message from brodengineering.eu. ".

    " Here are the details:\n Name: $name \n ".
    
    "Email: $email_address\n Message: \n $message";
    
    $headers = 'MIME-Version: 1.0';
    $headers = 'Content-Type: text/plain; charset=utf-8' . "\r\n";
    $headers .= "From: $email_address\n";

    $headers .= "Reply-To: $email_address";


    mail($to,$email_subject,$email_body,$headers);

    header('Location: index.html');

}

?>
