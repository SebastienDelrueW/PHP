<?php
// print_r($_POST);
if(!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && !empty($_POST['nom'])&& !empty($_POST['message'])){

    $message = '<span style="color: blue">Merci pour votre message</span>';
}else{
    $message = '<span style="color: red">Veuillez vérifier votre message</span>';
}
echo $message;