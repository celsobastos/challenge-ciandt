<?php

/**
 * Autor: Celso Ricardo Bastos
 * Date: 2020/08/14
 */
require_once "User.php";
use form\User;

session_start();
$token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_SPECIAL_CHARS);
$_SESSION['alert'] = '';

$user = new User();

$register ['user']= $_POST; // register data
$error = []; //Error messages

$nome = trim(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS));
$sobrenome = trim(filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_SPECIAL_CHARS));
$email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS));
$telefone = trim(filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_SPECIAL_CHARS));
$login = trim(filter_input(INPUT_POST, 'login', FILTER_SANITIZE_SPECIAL_CHARS));
$password = trim(filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS));

//Valid Token
if($_SESSION['token'] !== $token){
    $error []= "<strong>Ops! Invalid Token </strong><br />";
}

//validate name
if(!user::validateString($nome)){
    $error []= "The field <b> nome </b> is required. <br />";
}

//validate Sobrenome
if(!user::validateString($sobrenome)){
    $error []= "The field <b> sobrenome </b> is required. <br />";
}    

//validate Email
if (!user::validationEmail($email)){      
    $error []= "The field <b>email</b> is required. <br />";
}

if($user->existeData('email' , $email)){
    $error []= "The <b>email</b>  already exist. <br />";
}

//validate phone number
if (!user::validationTelefone($telefone)) {
    $error []= "The field <b>telefone</b> is required. <br />";
}

//validate Login
if(!user::validateLogin($login)){
    $error []= "The field <b>login</b> is not valid. <br />";
}    
if($user->existeData('login',$login)){
    $error []= "The <b>login</b> already exist. <br />";
}

//validate Password
if(!$user::validatePassword($password)){
    $error []= "The field <b>senha</b> is required. <br />";
}  
else{
    $register ['user']['password']= password_hash($password, PASSWORD_DEFAULT);
}

if(count($error) > 0){
    array_unshift($error, "<div class='alert alert-danger text-left' role='alert'>");
    $_SESSION['alert'] = implode("",$error) . "</div>";
}
else{
    $user->saveUser($register);
    $_SESSION['alert'] = "<div class='alert alert-success text-left' role='alert'>Ow great! sucesss.</div>";

}

header("Location: form.php");

?>