
<?php
ob_start();
session_start();
$_SESSION["ErrorMassage"] = "";
$uzytkownicy = explode(",", file_get_contents("uzytkownicy.txt"));


if (isset($_POST["login"]) && isset($_POST["password"])) {
    if (!preg_match('/^([A-Za-z0-9-_]+)$/', $_POST["login"]) || !preg_match('/^([A-Za-z0-9-_]+)$/', $_POST["password"])) {
        $_SESSION["ErrorMassage"] = "Błędne hasło lub nazwa użytkownika";
        header("Location: index.php");
    } else {
        if (is_writable("uzytkownicy.txt")) {

            if(in_array($_POST["login"], $uzytkownicy)){
                $_SESSION["ErrorMassage"] = "Użytkownik już istnieje.";
                header("Location: index.php");
            }
            else{

                
                fwrite(fopen("uzytkownicy.txt", "a+"), "{$_POST["login"]},{$_POST["password"]},");
                $testujeee ="pliki\\{$_POST['login']}";
                mkdir($testujeee);
                $_SESSION["ErrorMassage"] = "";
                $_SESSION["user"] = $_POST["login"];
                $_SESSION["ErrorMassage"] = "Zarejestrowano. Możesz się teraz zalogować";
                header("Location: index.php");
            }
            }
           
        }
    }












?>