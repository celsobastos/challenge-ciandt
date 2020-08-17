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
        <title>API Rest</title>
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
                <p>Para testar modifique a sua url conforme seu servidor.</p>
                <h4>Exemplo: http://<b>seu servidor</b>/api/source/Controllers/user.php</h4>
                <div><input type="text" id='server' class="form-control"  placeholder="Digite a URL do seu servidor" /></div>

                <div class="alert alert-primary" role="alert">
                    <p class="" id="data-customer"></p>
                </div>
                    <button type="button" onclick="myasyncAwait()" class="btn btn-primary" name="create">Clique para testar?</button>
                <p>
                <pre>
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

                </pre>
                </p>
            </div>
        </section>

        <script>
            function customerRest(){
                    let server = document.getElementById("server").value;
                    if(server == ""){
                        document.getElementById("data-customer").innerHTML = "Digite a URL do seu servidor no campo acima.";
                    }
                    else{
                        let url = document.getElementById("server").value;
                        let resposta =  {};
                        return fetch(url);
                    }
                }
                async function myasyncAwait(){
                    try{
                        const response = await customerRest();
                        const data = await response.json();

                        if(data.response.length == 0){
                            document.getElementById("data-customer").innerHTML = 'Não hpa dados'; 
                        }else{
                            let $data = ''
                            
                            let i = 0;
                            while( i < data.response.length){

                                $data += "<h5<b>nome:</b> " + data.response[i].nome + ' ';
                                $data += "<b>sobrenome:</b> " + data.response[i].sobrenome + ' ';
                                $data += "<b>email:</b> " + data.response[i].email + ' ';
                                $data += "<b>telefone:</b> " + data.response[i].telefone + ' ';
                                $data += '</h5><br />';

                                document.getElementById("data-customer").innerHTML = $data;
                                i++;
                            }
                        }

                    }
                    catch(err){
                        console.log(err);
                    }
                }
                
        </script>
    </body>
</html>
