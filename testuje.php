<?php 
ob_start();
session_start();
$plikiWyniki = array();
$pliki = scandir("pliki/{$_SESSION["user"]}");
    foreach ($pliki as $key => $value) {
        if (!in_array($value, array(".", ".."))) {
            $plikiWyniki[$key] = $pliki[$key];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body class='bg-dark text-light'>

<h1 class=m-3>Witaj <?php  echo $_SESSION["user"]?></h1>

    <form action=testuje.php method=post class="m-3">
        <div class="mb-3">
            <label for=tytul class="form-label">Tytuł pliku<input name=tytul id=tytul class="form-control"></label>
        </div>
        <div class="mb-3">
            <label for=wiado class="form-label">Zawartość pliku<textarea name=wiado id=wiado class="form-control"></textarea></label>
        </div>
        <input type=submit value="Utwórz plik" class="btn btn-success">

    </form>

    <!-- <form action=testuje.php method=post class="m-3">
        <div class="mb-3">
            <label for=tytul3 class="form-label">Tytuł pliku
            <select name=tytul3 id=tytul3 class="form-select">
            <?php 
            foreach($plikiWyniki as $key=>$value){
                echo "<option class='ms-3'>{$plikiWyniki[$key]}</option>";
            }
            
            ?>
            </select>
            </label>
            <button>Wybierz plik</button>

        </div>
        <div class="mb-3">
            <label for=wiado2 class="form-label">Pliki użytkownika<textarea name=wiado2 id=wiado2 class="form-control"></textarea></label>
        </div>
        <input type=submit value="Edytuj plik" class="btn btn-primary">

    </form> -->

    <form action=testuje.php method=post class="m-3">
        <div class="mb-3">
            <label for=tytul2 class="form-label">Tytuł pliku<input name=usun id=tytul2 class="form-control"></label>
        </div>
        <input type=submit value="Usuń plik" class="btn btn-danger">

    </form>

</body>

</html>

<?php

$_SESSION["ErrorMassage"] = "Błędne hasło lub nazwa użytkownika";

//logowanie do osobnego

// if (isset($_POST["login"]) && isset($_POST["password"])) {
//     if (!preg_match('/^([A-Za-z0-9-_]+)$/', $_POST["login"]) || !preg_match('/^([A-Za-z0-9-_]+)$/', $_POST["password"])) {
//         header("Location: logowanie.php");
//     } else {
//         if (is_writable("uzytkownicy.txt")) {

//             fwrite(fopen("uzytkownicy.txt", "a+"), "{$_POST["login"]},{$_POST["password"]},\n");
//             $_SESSION["user"] = $_POST["login"];
//         }
//     }
// }

$aaaaaaaaaa = file_get_contents("uzytkownicy.txt");

$c = array_filter(explode(",", $aaaaaaaaaa));

if (isset($_POST["wiado"]) && isset($_POST["tytul"]) && preg_match('/^([A-Za-z0-9-_]+)$/', $_POST["tytul"])) {
    fwrite(fopen("pliki/{$_SESSION["user"]}/{$_POST["tytul"]}.txt", "w+"), "{$_POST["wiado"]}");
    header("Refresh:0");
    
}

$licznik=0;

echo "<form action=wyswietl.php method=post class='m-3'>";
echo "<div><h2 class='ms-3'>Pliki użytkownika:</h2>";
foreach($plikiWyniki as $key=>$value){
    echo "<h3 class='ms-3'>{$plikiWyniki[$key]}</h3>";
    echo "<button type=submit name='nazwa' value='{$licznik}' class='btn btn-primary'>Wyświetl plik</button>";
    $licznik++;
}
echo "</div>";
echo "</form>";

if (isset($_POST["usun"]) && preg_match('/^([A-Za-z0-9-_]+)$/', $_POST["usun"])) {
    if (is_writable("pliki/{$_SESSION["user"]}/{$_POST["usun"]}.txt")) {
        unlink("pliki/{$_SESSION["user"]}/{$_POST["usun"]}.txt");
        $pliki = scandir("pliki/{$_SESSION["user"]}");
        foreach ($pliki as $key => $value) {
            if (!in_array($value, array(".", ".."))) {
                $plikiWyniki[$key] = $pliki[$key];
            }
        }
        header("Refresh:0");
    } else {
        echo "nie ma takiego pliku";
    }
} else if (isset($_POST["usun"]) && !preg_match('/^([A-Za-z0-9-_]+)$/', $_POST["usun"]) && $_POST["usun"] != "") {
    echo "nie ma takiego pliku";
}





?>
