<?php 
if(isset($_POST['submit'])){
    $to = "test@imperioiluminacao.com.br"; // this is your Email address
    $from = $_POST['test@imperioiluminacao.com.br']; // this is the sender's Email address
    $first_name = $_POST['name'];
    $phone = $_POST['phone'];
    $cont_email = $_POST['email'];
    $subject = "Form submission";
    $subject2 = "Copy of your form submission";
    $message = $first_name . " " . $cont_email . " wrote the following:" . "\n\n" . $_POST['message'] . "Telefone :" . $phone;
    $message2 = "Here is a copy of your message " . $first_name . "\n\n" . $_POST['message'];

    $headers = "From:" . $from;
    $headers2 = "From:" . $to;
    mail($to,$subject,$message,$headers);
    mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
    echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";a
