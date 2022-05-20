<?php
ob_start();
session_start();
$_SESSION["ErrorMassage"] = "";
$uzytkownicy = explode(",", file_get_contents("uzytkownik/uzytkownicy.txt"));


function testowanie($uzytkownicy){

    for($i=0;$i<count($uzytkownicy);$i++){

        if($_POST["login"]==$uzytkownicy[$i]&&$_POST["password"]==$uzytkownicy[$i+1]){
            echo "O";
            return true;
        }
    
    }

    return false;
}


if (isset($_POST["login"]) && isset($_POST["password"])) {
    if (!preg_match('/^([A-Za-z0-9-_]+)$/', $_POST["login"]) || !preg_match('/^([A-Za-z0-9-_]+)$/', $_POST["password"])) {
        $_SESSION["ErrorMassage"] = "Błędne hasło lub nazwa użytkownika";
        header("Location: index.php");
    } else {
        if (is_writable("uzytkownik/uzytkownicy.txt")) {

            if(in_array($_POST["login"], $uzytkownicy)){
                if(testowanie($uzytkownicy)){
                    $_SESSION["user"] = $_POST["login"];
                    header("Location: stronaGowna.php");
                }
                else{
                    $_SESSION["ErrorMassage"] = "Złe hasło lub login ";
                    header("Location: index.php");
                }

            }
            else{
                //trzeba zrobić osobno userów i osobno hasła
                $_SESSION["ErrorMassage"] = "Użytkownik nie istnieje. Zarejestruj się.";
                header("Location: index.php");

            }
           
        }
    }





}





