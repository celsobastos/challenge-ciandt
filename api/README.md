- API Rest;

- Descrição;

- O codigo para a construção da API foi feito eu PHP puro, não foi usado nem tipo de framework;
- Não houve preocupação em criar URLs Limpas, já que não havia tais exigencias;

- Os verbos usados na API (POST, GET , PUT e DELETE)

- Para cadastrar um novo usuario use o request abaixo;

- Verbo: POST;
http://"localhost"/api/source/Controllers/user.php;
Porta: 80;
Request "JSON": 

{
	"nome" : "Mateus",
	"sobrenome" : "Bastos",
	"email" : "werttyeerer@gmail.com",
	"telefone" : "(11) 95858-9658"
}
