<?php
// an email address that will be in the From field of the email.
$from = 'test@imperioiluminacao.com.br';

// an email address that will receive the email with the output of the form
$sendTo = 'test@imperioiluminacao.com.br';

// subject of the email
$subject = 'Nova mensagem vinda do site';

// form field names and their translations.
// array variable name => Text to appear in the email
$fields = array('name' => 'Name', 'phone' => 'Phone', 'need' => 'Need', 'email' => 'Email', 'message' => 'Message');

// if you are not debugging and don't need error reporting, turn this off by error_reporting(0);
error_reporting(E_ALL & ~E_NOTICE);

try
{

    if(count($_POST) == 0) throw new \Exception('Form is empty');

    $emailText = "Você tem uma mensagem do site" . $message  . "\n=============================\n";

    foreach ($_POST as $key => $value) {
        // If the field exists in the $fields array, include it in the email
        if (isset($fields[$key])) {
            $emailText .= "$fields[$key]: $value\n";
        }
    }

    // All the neccessary headers for the email.
    $headers = array('Content-Type: text/plain; charset="UTF-8";',
        'From: ' . $from,
        'Reply-To: ' . $from,
        'Return-Path: ' . $from,
    );

    // Send email
    mail($sendTo, $subject, $emailText, implode("\n", $headers));

    echo "<script>window.alert('Sua mensagem foi enviada!Muito Obrigado.');window.location.href='https://imperioiluminacao.com.br/tests'</script>";
}
catch (\Exception $e)
{
    echo "<script>window.alert('Sua mensagem não foi enviada.Tente novamente.');window.location.href='https://imperioiluminacao.com.br/tests'</script>";
}


// if requested by AJAX request return JSON response
if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    $encoded = json_encode($responseArray);

    header('Content-Type: application/json');

    echo $encoded;
}
// else just display the message
else {
    echo $responseArray['message'];
}