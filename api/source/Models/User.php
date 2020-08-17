<?php
namespace Source\Models;

use Source\Models\Validations;
require "../../vendor/autoload.php";

class User{

    private $nome;
    private $sobrenome;
    private $email;
    private $telefone;
    private const FILE = "../../register/register.txt";
    
    public function __construct($args =[]){
        $this->nome = $args['nome'] ?? '';
        $this->sobrenome = $args['sobrenome'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->telefone = $args['telefone'] ?? '';
    }

    public function setNome(string $nome){
        $this->nome = $nome;
    }

    public function setSobrenome(string $sobrenome){
        $this->sobrenome = $sobrenome;
    }

    public function setEmail(string $email){
        $this->email = $email;
    }

    public function setTelefone(string $telefone){
        $this->telefone = $telefone;
    }

    public function getTelefone() : string
    {
        return $this->telefone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSobrenome(): string
    {
        return $this->sobrenome;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function createUser() : bool
    {
        $register = get_object_vars($this) ;

        if (Validations::validationAll($register)){       
            $file = self::FILE;
            $result = $this->getUser();
            $result[] = (object)  $register;
            $newRegister = json_encode($result);
            $handle = fopen($file , "w");
            fwrite($handle, $newRegister);
            fclose($handle);
            return true;
        }
        else{
            return false;
        }
    }

    public function getUser(): array
    {
        $arquivo = fopen (self::FILE, 'a+');
        $data = fgets($arquivo, 1024);
        $result = (array) json_decode($data);
        fclose($arquivo);
        return $result;
    }

    private function toArray(array $data) : array
    {
        foreach($data as $fields => $valueFields){
            $result[] = (array) $valueFields;
        }
        return $result;
    }   

    public function existeUser($args = []) : bool
    {
        $result = $this->getUser();

        if($result){
            foreach($args as $field => $valueField)
                    {
                        $found_key[] = gettype(array_search($valueField, array_column($this->toArray($result), $field)));
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

    public function updateUser(string $email) : bool
    {
        if ($this->existeUser(['email' => $email])){
            $register = get_object_vars($this);

            if (Validations::validationAll($register)){       
                $file = self::FILE;
                $result = $this->getUser();
                if($result){
                    $line = array_search($email, array_column($this->toArray($result), 'email'));
                    array_splice($result, $line, 1);
                    $result[] = (object)  $register;
                    $updateRegister = json_encode($result);      
                    $handle = fopen($file , "w");
                    fwrite($handle, $updateRegister);
                    fclose($handle);
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }

    public function deleteUser(string $email) : bool
    {
        $this->setEmail = $email;
        $register = get_object_vars($this);
        if (Validations::validationEmail($email)){       
            $file = self::FILE;
            $result = $this->getUser();
            if($result){
                $line = array_search($email, array_column($this->toArray($result), 'email'));
                array_splice($result, $line, 1);
                $updateRegister = json_encode($result);
                $handle = fopen($file , "w");
                fwrite($handle, $updateRegister);
                fclose($handle);
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
    }
}