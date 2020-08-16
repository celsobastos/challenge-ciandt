<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <title>Location</title>
    </head>
    <body>
        <header>
        </header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="location.php"> Atividade 1 </a>
            <a class="navbar-brand" href="joaozinho.php"> Atividade 2</a>
            <a class="navbar-brand" href="files.php">Atividade 3</a>
            <a class="navbar-brand" href="form/form.php">Atividade 4</a>
            <a class="navbar-brand" href="xml/parsexml.php"> Atividade 5</a>
            <a class="navbar-brand" href="formselectfield.php">Atividade 6</a>
            <a class="navbar-brand" href="apirest.php">Atividade 7</a>
        </nav>
        <section class="container p-3 my-3 text-lett">
            <div class="container">
                <h2>API Rest</h2>
                <p>Documentação</p>
                <p>
                <pre>
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


                </pre>
                </p>
            </div>
        </section>
    </body>
</html>
