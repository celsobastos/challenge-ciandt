<?php

namespace Source\Models;

final class Validations{

    public static function validationString(string $string) : bool
    {
        $string = htmlspecialchars(trim($string));
        return (strlen($string) > 0 && strlen($string) < 30) && !is_numeric($string);
    }

    public static function validationEmail(string $email): bool
    {
        $email = htmlspecialchars(trim($email));
        return filter_var($email,FILTER_VALIDATE_EMAIL);
    }

    public static function validationInteger(string $integer) : bool
    {
        $integer = htmlspecialchars(trim($integer));
        return filter_var($integer, FILTER_VALIDATE_INT) && $integer > 0;
    }

    public static function validationTelefone(string $telefone) : bool
    {
        $telefone = htmlspecialchars(trim($telefone));
        $pattern = "/\([0-9]{2}\)\s?[0-9]?[0-9]{4}(-|\s)?[0-9]{4}/i";
        if (!preg_match($pattern, $telefone)) {
            return false;
        }
        else{
            return true;
        }
    }

    public static function validationAll(array $data) : bool
    {   

        $test = [];
        $test []= SELF::validationString($data['nome']);
        $test []= SELF::validationString($data['sobrenome']);
        $test []= SELF::validationEmail($data['email']);
        $test []= SELF::validationTelefone($data['telefone']);
        
        if(in_array(false, $test)){
            return false;
        }
        else{
            return true;
        }
        
    }


}