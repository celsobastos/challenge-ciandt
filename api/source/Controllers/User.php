<?php

namespace Source\Controllers;

use Source\Models\User;
use Source\Models\Validations;

require "../../vendor/autoload.php";
require "../Config.php";


switch ($_SERVER["REQUEST_METHOD"]) {
    case "POST":
		
        $data = (array) json_decode(file_get_contents("php://input"), false);

        /**
         * data not sent
         */
        if (!$data) {
            header("HTTP/1.1 400 Bad Request");
            echo json_encode(array("response" => "Nenhum dados informado!"));
            exit;
        }


        $user = new User($data);

        /**
         * Existe user
         */
        
        $result = $user->existeUser(['email' => trim($data['email'])]);
        if($result){
            header("HTTP/1.1 401 Unauthorized");
            echo json_encode(array("response" => "O registro já existe."));  
            exit;  
        }

        /**
         * Save data
         */
        if(!$user->createUser()){
            header("HTTP/1.1 500 Internal Server Error");
            echo json_encode(array("response" => "Internal Server Error"));
            exit; 
        }

        header("HTTP/1.1 201 Created");
        echo json_encode(array("response" => "Usuário criado com sucesso!!!"));
        break;

    case "GET":
        
        $user = new User();
        $register = $user->getUser();
        if($register){
            header("HTTP/1.1 200 OK");
            echo json_encode(array("response" => $register));
        }
        else{
            header("HTTP/1.1 404 not found");
            echo json_encode(array("response" => "Nenhum registro foi encontrado."));
        }

    break;
    case "PUT":

        $data = (array) json_decode(file_get_contents('php://input'),false);
        if (!$data) {
            header("HTTP/1.1 400 Bad Request");
            echo json_encode(array("response" => "Nenhum dados informado!"));
            exit;
        }

        $user = new User($data);

        /**
         * Existe user
         */
        $result = $user->existeUser(['email' => trim($data['email'])]);
        if(!$result){
            header("HTTP/1.1 401 Unauthorized");
            echo json_encode(array("response" => "Usuario não existe."));  
            exit;  
        }

        /**
         * Update user
         */
        $result = $user->updateUser(trim($data['email']));
        if($result){
            header("HTTP/1.1 200 Update");
            echo json_encode(array("response"=>"Usuário atualizado com sucesso!"));
            exit;
        }

        header("HTTP/1.1 500 Internal Server Error");
        echo json_encode(array("response"=>"Internal Server Error"));
        exit;

    break;
    case "DELETE":
        $email = filter_input(INPUT_GET,"email");

        if(!$email){
            header("HTTP/1.1 400 Bad Request");
            echo json_encode(array("response" => "ID não informado!"));
            exit;
        }

        $user = new User();
        /**
         * Existe user
         */
        $result = $user->existeUser(['email' => trim($email)]);
        if(!$result){
            header("HTTP/1.1 401 Unauthorized");
            echo json_encode(array("response" => "Usuario não existe."));  
            exit;  
        }

        if($user->deleteUser(trim($email))){
            header("HTTP/1.1 200 OK");
            echo json_encode(array("response"=>"Usuário removido com sucesso!"));
        }
        else{
            header("HTTP/1.1 401 OK");
            echo json_encode(array("response" => "Nenhum usuário pode ser removido!"));
        }

    break;
    default:
        header("HTTP/1.1 401 Unauthorized");
        echo json_encode(array("response" => "Método não previsto na API"));
    break;
}
