<?php
ob_start();
session_start();
$_SESSION["ErrorMassage"] = "Błędne hasło lub nazwa użytkownika";

//logowanie do osobnego

if (isset($_POST["login"]) && isset($_POST["password"])) {
    if (!preg_match('/^([A-Za-z0-9-_]+)$/', $_POST["login"]) || !preg_match('/^([A-Za-z0-9-_]+)$/', $_POST["password"])) {
        header("Location: logowanie.php");
    } else {
        if (is_writable("uzytkownicy.txt")) {

            fwrite(fopen("uzytkownicy.txt", "a+"), "{$_POST["login"]},{$_POST["password"]},\n");
            $_SESSION["user"] = $_POST["login"];
            header("Location: testuje.php");
        }
    }
}
