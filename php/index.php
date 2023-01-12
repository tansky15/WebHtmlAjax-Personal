<?php
header('Access-Control-Allow-Origin: *');
if(isset($_POST['email']) AND isset($_POST['subject']) AND isset($_POST['message'])){
    if(!empty($_POST["email"])){
        if( !empty($_POST["subject"])){
            if(!empty($_POST["message"])){
                $email = htmlspecialchars($_POST["email"]);
                $subject = htmlspecialchars($_POST["subject"]);
                $phone = htmlspecialchars($_POST["phone"]);
                $message = htmlspecialchars($_POST["message"]);
                $msg_confirmation = "Merci de m'avoir laisser votre message, je vous repondrai sous-peu";
                ConfirmationMessage($email, $msg_confirmation);
                SendMessageToAdmin($phone,$email, $subject, $message);
            }else{
                echo $res = "warning.N'oubliez pas de nous laisser votre message avant de soumettre le formulaire.";
            }
        }else{
        echo $res = "warning.Vueillez s'il vous plait indiquer votre sujet de conversation pour mieux vous servir. ";
        }
    }else{
        echo $res = "warning.Vueillez s'il vous plait entrer votre adresse courriel.";
    }
}
function ConfirmationMessage($email,$msg){
    error_reporting(0);
    ini_set('display_errors', 0);

    $from = "marctanskylarochelle@ymail.com";
    $to = $email;
    $subject = "Confirmation de l'envoie";
    $message = $msg;
    $headers = "From:" . $from;
    try {
        mail($to, $subject, $message, $headers);
    } catch (Exception $e) {
    }
}
function SendMessageToAdmin($_phone,$_email,$_subject,$_msg){
    error_reporting(0);
    ini_set('display_errors', 0);

    $from = $_email;
    $to = "tanskymanagement@gmail.com";
    $subject = $_subject;
    $message = $_msg."   Numero de telephone :".$_phone;
    $headers = "De la part de: " . $from;
    try {
        mail($to, $subject, $message, $headers);
        echo "success.Message envoyer avec success";
    } catch (Exception $e) {
    }
}
?>