<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body class='bg-dark text-light'>
    
</body>
</html>

<?php
ob_start();
session_start();

$pliki = scandir("pliki/{$_SESSION["user"]}");
        foreach ($pliki as $key => $value) {
            if (!in_array($value, array(".", ".."))) {
                $plikiWyniki[$key] = $pliki[$key];
            }
        };

        
        foreach($plikiWyniki as $key=>$value){
           if($_POST["nazwa"]+2==$key){
            echo "<h2 class=m-3>Zawartość pliku {$value}:</h2>";
            echo "<div class=m-3>".file_get_contents( "./pliki/{$_SESSION["user"]}/{$value}")."</div>";
           }
        };



echo "<form action=testuje.php method=post class='m-3'>";

echo "<button type=submit class='btn btn-primary'>Powrót do strony głównej</button>";

echo "</form>";

?>