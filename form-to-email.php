<?php
    $name = $_POST['name'];
    $visitor_email = $_POST['email'];
    $visitor_phone = $_POST['phone'];
    $message = $_POST['message'];
?>

<?php
    $email_from = "michael.jeremy.potts@gmail.com";
    $email_subject = "New Email";
    $email_body = "New message from $name \n $visitor_email.\n\n". "$message";
    ?>

<?php
    $to = "michael.jeremy.potts@gmail.com";
    mail($to, $email_subject, $email_body);
?>

<?php
function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
               
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}
?>