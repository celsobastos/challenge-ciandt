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
        echo 'Error: ',  $e->getMessage(), "\n";
    }
}

/**
 * ----------------------------------------------------------------
 */

/**
 * View array before
 */
$table = "<table border='1'><tr><th>Pais</th><th>Capital</th></tr>";
foreach($location as $record)
{
    $table .= "<tr><td>" . $record['pais'] . "</td><td>" .   $record['pais'] . '</td></tr>';
}
$table .= "</table>";
echo $table;
echo "<br /><br />";


/**
 * View array AFTER
 */
$results =  (array) location_sort($location, "Capital");

$readyPrinter = implode("<br />", $results);    
echo $readyPrinter;
