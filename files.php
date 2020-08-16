<?php

/**
 * This function print in order all of the extensions of files
 * Autor: Celso Ricardo Bastos
 * Date : 2020/08/13
 * 
 */

/**
 * Return a list of the extensions 
 * @return String
 */
function getExtension(){
    define("FOLDER", __DIR__ . "/files");
    $extensionOrder = '';
    $extension = array();
    $i = 1;
    if ($handle = opendir(FOLDER)) {
        while (false !== ($file = readdir($handle))) 
        {
            $ext = pathinfo(FOLDER . "/$file")['extension'];
            if(!empty($ext) ){
                $extension []= $ext; 
            }
        }
        sort($extension);
        foreach($extension as $extOrdered)
        {
            $extensionOrder .= $i++ . " ." . $extOrdered . "<br />";
        }
        closedir($handle);
    }
    return $extensionOrder;
}
$extension = getExtension();
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
        <title>Files</title>
    </head>
    <body>
        <header>
        </header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <a class="navbar-brand" href="location.php">1) Location</a>
            <a class="navbar-brand" href="joaozinho.php">2) Joaozinho</a>
            <a class="navbar-brand" href="files.php">3) Files</a>
            <a class="navbar-brand" href="form/form.php">4) Form</a>
            <a class="navbar-brand" href="xml/parsexml.php">5) Parse XML and save CSV</a>
        </nav>
        <section class="container p-3 my-3 text-center">
            <div class="container">
                <h2>Files Extensions</h2>
                <p>List of Extensions</p>
                <p><?=$extension?></p>
            </div>
        </section>
    </body>
</html>