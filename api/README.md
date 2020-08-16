- API Rest;

- Descrição;

O codigo para a construção da API foi feito em PHP puro, não foi utilizado nenhum tipo de framework;
Não houve preocupação em criar URLs Limpas, já que não havia tais exigencias;
Os verbos usados na API são (POST, GET , PUT e DELETE);

- Para executar as oporações siga os modelos abaixo;

- POST -----------------------------------------------------------------
- Verbo: POST;

http://"localhost"/api/source/Controllers/user.php;
Port: 80;
Request "JSON": 
{
	"nome" : "Mateus",
	"sobrenome" : "Bastos",
	"email" : "werttyeerer@gmail.com",
	"telefone" : "(11) 95858-9658"
}

- GET -----------------------------------------------------------------;
- Verbo: GET;

http://"localhost"/api/source/Controllers/user.php;
Port: 80;
Request; 
Response;
{
  "response": [
    {
      "nome": "Mateus",
      "sobrenome": "Bastos",
      "email": "werttyeerer@gmail.com",
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

- PUT -----------------------------------------------------------------;
- Verbo: PUT;

http://"localhost"/api/source/Controllers/user.php;
Port: 80;
Request "JSON";
{
	"nome" : "New Name",
	"sobrenome" : "New sobre nome",
	"email" : "werttyeerer@gmail.com",
	"telefone" : "(21) 8899-9658"	
}
Response "JSON";
{
  "response": "Usuário atualizado com sucesso!"
}

- DELETE -----------------------------------------------------------------;
- Verbo: DELETE;

http://"localhost"/api/source/Controllers/user.php?email=werttyeerer@gmail.com;
Port: 80;
Response: "JSON";
{
  "response": "Usuário removido com sucesso!"
}
