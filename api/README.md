# API Rest
> Desenvolvimento orientato a bojetos (POO), observando uma estrutura padrão de pastas.

O codigo para a construção da API foi feito em PHP puro, não foi utilizado nenhum tipo de framework;
Não houve preocupação em criar URLs Limpas, já que não havia tais exigencias
Os verbos usados na API são (POST, GET, PUT e DELETE).
Os registros desse projetos serão salvos na pasta ./api/register/register.txt

## Execução / Verbo: POST

Para executar as oporações siga os modelos abaixo.

### http:// "webserver"/api/source/Controllers/user.php
> Port: 80;
: 

```shell
{
	"nome" : "Mateus",
	"sobrenome" : "Silva",
	"email" : "test1@gmail.com",
	"telefone" : "(11) 95858-9658"
}  
"Request JSON" 
# prints 
```

## Execução / Verbo: PUT

Para executar as oporações siga os modelos abaixo.

### http:// "webserver"/api/source/Controllers/user.php
> Port: 80;
: 

```shell
{
	"nome" : "New Name",
	"sobrenome" : "New sobre nome",
	"email" : "test1@gmail.com",
	"telefone" : "(21) 8899-9658"	
}
"Request JSON" 
# prints 


{
  "response": "Usuário atualizado com sucesso!"
}
"Response JSON";
# prints 
```

## Execução / Verbo: DELETE

Para executar as oporações siga os modelos abaixo.

### http:// "webserver" /api/source/Controllers/user.php?email=test1@gmail.com
> Port: 80;
: 

```shell
{
  "response": "Usuário removido com sucesso!"
}
"Response JSON"
# prints 
```

## Execução / Verbo: GET

Para executar as oporações siga os modelos abaixo.

### http:// "webserver" /api/source/Controllers/user.php
> Port: 80;
: 

```shell
{
  "response": [
    {
      "nome": "Mateus",
      "sobrenome": "Bastos",
      "email": "test1@gmail.com",
      "telefone": "(11) 95858-9658"
    },
    {
      "nome": "Claudio",
      "sobrenome": "Silva",
      "email": "csss23@gmail.com",
      "telefone": "(11) 50000-0255"
    }
  ]
}
"Request JSON" 
# prints 
```

## Licensing

"The code in this project is open source."