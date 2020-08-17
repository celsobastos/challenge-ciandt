<?php

/**
 * Autor: Celso Ricardo Bastos
 * Date: 2020/08/13
 *
 */

function foiMordido()
{
    $messages = array('Foi Mordido', 'Não foi mordido');
    $show = $messages[mt_rand(0, 1)];
    return $show;
}
$result = foiMordido();

?>

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
        <title>Joãozinho</title>
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
        <section class="container p-3 my-3 text-center">
            <div class="container">
                <h2>Algoritmo de Joãozinho</h2>
                <p>Foi mordido ou não?</p>
                <div class="alert alert-primary" role="alert">
                    <p class="display-1"><?= $result ?></p>
                </div>
                <form action="" method="post">
                    <button type="submit" class="btn btn-primary" name="create">Clique para testar?</button>
                </form>
            </div>
        </section>
    </body>

</html>