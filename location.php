<?php

/**
 * Autor: Celso Ricardo Bastos
 * Date: 2020/08/13
 * This function print in order all the data of the a array in order
 */

$location = array
(
    array("pais" => "Portugal", "capital" => "Lisboa"),
    array("pais" => "Brasil", "capital" => "Brasilia"),
    array("pais" => "Argentina", "capital" => "Buenos Aires"),
    array("pais" => "Italia", "capital" => "Roma"),
    array("pais" => "Bolívia", "capital" => "Quito"),
    array("pais" => "Uruguai", "capital" => "Montevidéu"),
    array("pais" => "Venezuela", "capital" => "Caracas"),
);

/**
 * Return a string in order for capital or Pais
 * @param Array
 * @param Field
 * @param Booleano
 * @return String
 */
function location_sort($records = [], $field = "capital", $reverse = false)
{
    try{
        if (!is_array($records)){
            throw new Exception('Array not found');
        }
        $field = (strtolower($field));    
        $hash = array();
        foreach($records as $record)
        {
            $hash[$record[$field]] = $record;
        }
        ($reverse) ? krsort($hash) : ksort($hash);
        
        $records = array();
        foreach($hash as $record)
        {
            $records  []= "A capital do <b>" . $record['pais'] . "</b> é <b>" . $record['capital'] . "</b>" ;
        }
        return $records;
    }catch(Exception $e){
        echo 'Error: ',  $e->getMessage();
    }
}

/**
 * View array before
 */
$table = "<table  class='table table-bordered table-sm'><tr><th>Pais</th><th>Capital</th></tr>";
foreach($location as $record)
{
    $table .= "<tr><td>" . $record['pais'] . "</td><td>" .   $record['capital'] . '</td></tr>';
}
$table .= "</table>";

/**
 * View array AFTER
 */
$results =  (array) location_sort($location, "Capital");
$readyPrinter = implode("<br />", $results);    

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
            <a class="navbar-brand" href="form/form.php">4) Form Save .txt</a>
            <a class="navbar-brand" href="xml/parsexml.php">5) Parse XML and save CSV</a>
            <a class="navbar-brand" href="formselectfield.php">5) Form Select Field</a>
        </nav>
        <section class="container p-3 my-3 text-center">
            <div class="container">
                <h2>Before Table</h2>
                <p>List of countries</p>
                <p><?=$table ?></p>
            </div>
            <h2> After </h2>
            <p><?=$readyPrinter?></p>
        </section>
    </body>
</html>
