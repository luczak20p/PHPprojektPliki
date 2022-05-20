<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Edycaj Plików</title>
    <link rel=stylesheet href=style.css>
</head>
<body class='bg-dark text-light '>
<nav class='bg-info d-flex'>
<p class='m-3 me-auto p-2 fs-2'>PocketBook</p>
<p class='m-3 me-auto p-2 fs-2'><a href=stronaGowna.php class='text-decoration-none text-light'>Strona główna</a></p>
<p class='m-3 p-2 fs-3'>Witaj <?php  echo $_SESSION["user"]?></p>
<?php 
echo "<form action=index.php method=post class='m-3 p-2'>";
echo "<button class='btn btn-info text-light border'>Wyloguj</button>";
echo "</form>";
?>
</nav>
    
</body>
</html>

<?php

$pliki = scandir("pliki/{$_SESSION["user"]}");
        foreach ($pliki as $key => $value) {
            if (!in_array($value, array(".", ".."))) {
                $plikiWyniki[$key] = $pliki[$key];
            }
        };

        if(isset($_POST["nazwa"])){
            $_SESSION["nazwa"]=$_POST["nazwa"];
        }

        
        
        foreach($plikiWyniki as $key=>$value){
           if($_SESSION["nazwa"]+2==$key){
            if(isset($_POST["wiadomo"])){
                fwrite(fopen("pliki/{$_SESSION["user"]}/{$value}", "w+"), "{$_POST["wiadomo"]}");
            }
            echo "<h2 class=m-3>Zawartość pliku {$value}:</h2>";
            ?>
            <form action=wyswietl.php method=post class='m-3'>
            <textarea class='d-block mb-3 bobo' name=wiadomo><?php echo file_get_contents( "./pliki/{$_SESSION["user"]}/{$value}")?></textarea>
            <button class='btn btn-info' type=submit>Edytuj plik</button>
           </form>
            <?php
           
           }
        };



echo "<form action=testuje.php method=post class='m-3'>";

echo "<button type=submit class='btn btn-primary'>Powrót do plików</button>";

echo "</form>";

?>