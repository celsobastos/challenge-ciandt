<?php

namespace form;

class User{

    private $nome;
    private $sobrenome;
    private $email;
    private $telefone;
    private $login;
    private $pass;
    private const FILE = "register/registro.txt";
    
    public function __construct($args =[]){
        $this->nome = $args['nome'] ?? '';
        $this->sobrenome = $args['sobrenome'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefone = $args['telefone'] ?? '';
        $this->pass = $args['pass'] ?? '';
        $this->login = $args['login'] ?? '';
    }

    public function existeData($field = '', $value = '')
    {
        $register = array_keys(get_object_vars($this));
        $file = self::FILE;

        if(file_exists($file)){
            $arquivo = fopen ($file, 'r');
            $result = [];

            $lines = 0 ;
            while(!feof($arquivo)){
                if(count(file($file)) == $lines ){
                    break;
                }
                $fields = $register;
                $txt = explode("|",fgets($arquivo));
                $result[] = array_combine($fields, $txt);
                $lines++ ;
            }

            fclose($arquivo);
            $found_key[] = gettype(array_search($value , array_column($result, $field )));
                
            if(in_array('boolean', $found_key)){
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

    public static function validateString(string $string) : bool
    {
        $string = htmlspecialchars(trim($string));
        return (strlen($string) > 0 && strlen($string) <= 30) && !is_numeric($string);
    }

    public static function validationEmail(string $email): bool
    {
        $email = htmlspecialchars(trim($email));
        return filter_var($email,FILTER_VALIDATE_EMAIL);
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

    public static function validateLogin(string $string) : bool
    {
        $string = htmlspecialchars(trim($string));
        return (strlen($string) >= 5 && strlen($string) <= 20);
    }

    public static function validatePassword(string $string) : bool
    {
        $string = htmlspecialchars(trim($string));
        return (strlen($string) >= 6 && strlen($string) <= 8);
    }

    public function saveUser($data = []) : bool
    {
        unset($data['user']['token']);
        $data = implode("|",$data['user']) . "\n";
        $myfile = fopen(self::FILE, "a");
        fwrite($myfile, $data);
        fclose($myfile);

        return true;
    }
}