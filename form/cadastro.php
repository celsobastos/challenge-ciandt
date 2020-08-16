<?php

/**
 * Autor: Celso Ricardo Bastos
 * Date: 2020/08/14
 * Create code procedural, which save data in file txt
 */
session_start();
$token = filter_input(INPUT_POST, 'token', FILTER_SANITIZE_SPECIAL_CHARS);
$_SESSION['alert'] = '';
define("FILE", "../register/registro.txt");

/**
 * Serach email and login 
 * @param args array 
 * @return boolean
 */
function existeData($args = [])
{
    if(file_exists(FILE)){
        $arquivo = fopen (FILE, 'r');
        $result = array();
        while(!feof($arquivo)){
            $fields = array('nome', 'sobrenome', 'email','telefone','login','pass');
            $txt = explode("|",fgets($arquivo));
            $result[] = array_combine($fields, $txt);
        }
        fclose($arquivo);
        foreach($args as $field => $valueField)
            {
                $found_key[] = gettype(array_search($valueField, array_column($result, $field)));
            }
        if(in_array('boolean',$found_key)){
            return false;
        }
        else{
            return true;
        }
    }   
    else{
        return false;
    }
}

/**
 * Form validate
 */
if($_SESSION['token'] === $token){
    $alert = array();
    $register = array();
    foreach($_POST as $field => $value){
        $value = trim(filter_input(INPUT_POST, $field, FILTER_SANITIZE_SPECIAL_CHARS));
        
        if($field === 'nome')
        {
            $lengthField = strlen($value);         
            if( $lengthField < 1 || $lengthField > 50)
            {
                $alert []= "The field <b> $field </b> is required. <br />";
            } 
            $register []= $value;
        } 

        if($field === 'sobrenome')
        {
            $lengthField = strlen($value);
            if( $lengthField < 1 || $lengthField > 50)
            {
                $alert []= "The field <b> $field </b> is required. <br />";
            }    
            $register []= $value;
        } 

        if ($field === 'email')
        {
            if (!filter_var($value, FILTER_VALIDATE_EMAIL))
            {      
                $alert []= "The field <b> $field </b> is required. <br />";
            }
            if(existeData([$field => $value])){
                $alert []= "The <b> $value </b>  exist in the DB. <br />";
            }
            $register []= $value;
        } 

        if($field === 'telefone')
        {
            $pattern = "/\([0-9]{2}\)\s?[0-9]?[0-9]{4}(-|\s)?[0-9]{4}/i";
            if (!preg_match($pattern, $value)) {
                $alert []= "The field <b> $field </b> is required. <br />";
            }
            $register []= $value;
        } 

        if($field === 'login')
        {
            $lengthField = strlen($value);
            if( $lengthField < 5 || $lengthField > 20)
            {
                $alert []= "The field <b> $field </b>required a valid Login. <br />";
            }    
            if(existeData([$field => $value])){
                $alert []= "The <b> $value </b> exist in the DB. <br />";
            }
            $register []= $value;
        } 

        if($field === 'password')
        {
            $lengthField = strlen($value);
            if( $lengthField < 6 || $lengthField > 8)
            {
                $alert []= "The field <b> $field </b> is required. <br />";
            }  
            else
            {
                $register []= password_hash($lengthField, PASSWORD_DEFAULT);
            }  
        }
    }

    if(empty($alert)){
        $_SESSION['alert'] = "<div class='alert alert-success text-left' role='alert'>Ow great! sucesss.</div>";
        $register = implode("|",$register) . "\n";

        /**
         * Save Fields
         */
        $myfile = fopen(FILE, "a");
        fwrite($myfile, $register);
        fclose($myfile);
    }
    else{
        array_unshift($alert, "<div class='alert alert-danger text-left' role='alert'>");
        $_SESSION['alert'] = implode("",$alert) . "</div>";
    }
}
else{

    $_SESSION['alert'] = "<div class='alert alert-danger text-left' role='alert'>Invalid Token</div>.";
}

header("Location: form.php");

?>