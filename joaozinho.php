<?php

/**
 * Autor: Celso Ricardo Bastos
 * Date: 2020/08/13
 *
 */

function foiMordido(){

    $array = array(0,0);


    for ($x = 0; $x < 10; $x++) {
        $array[mt_rand(0,1)] ++;
        echo $x;
    }
    echo '<pre>';
    print_r($array);

}


foiMordido();

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
        <title>Location</title>
    </head>
    <body>
        <header>
        </header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="../location.php">1) Location</a>
            <a class="navbar-brand" href="../joaozinho.php">2) Joaozinho</a>
            <a class="navbar-brand" href="../files.php">3) Files</a>
            <a class="navbar-brand" href="form.php">4) Form Save .txt</a>
            <a class="navbar-brand" href="xml/parsexml.php">5) Parse XML and save CSV</a>
        </nav>
        <section class="container p-3 my-3 text-center">
            <div class="container">
                <h2></h2>
                <p></p>
                <p><?=$table ?></p>
            </div>
        </section>
    </body>
</html>

