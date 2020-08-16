<?php

class ParseXML{

    private $fileXML = NULL; 

	public function __construct($xml){
		$this->fileXML = $xml ?? NULL;		
    }
    
	private function loadFileXML(){

        if (file_exists($this->fileXML)) {
            return simplexml_load_file($this->fileXML);
        }
        else{
            return false;
        }
    }

    public function createCSV(){
        $xml = $this->loadFileXML();
        $handle = fopen('food.csv', 'w');
        foreach ($xml->children() as $item) 
            {
                    $line  = (array) $item->children();
                    fputcsv($handle, $line);
            }
            fclose($handle);
        }
        
}

$var = $_POST['create'] ?? null;
$message = '';
if(!is_null($var)){

    $file = new ParseXML("breakfast.xml");
    $file->createCSV();

    $message = "<div class='alert alert-success text-left' role='alert'>Ow great! sucesss. '/xml/food.csv'</div>";
}

/*
*/
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
            <a class="navbar-brand" href="../form/form.php">4) Form Save .txt</a>
            <a class="navbar-brand" href="parsexml.php">5) Parse XML and save CSV</a>
        </nav>
        <section class="container p-3 my-3 text-center">
            <div class="container">
                <h2>Parse XML</h2>
                <p>Click to create CSV</p>
                <p><?= $message ?>
                <form action="" method="post">
                    <button type="submit" class="btn btn-primary" name="create">Create CSV</button>
                </form>
            </div>
        </section>
    </body>
</html>
