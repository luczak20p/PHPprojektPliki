<?php
session_start();
ob_start();
if ($_GET["praca"] == "get") {
    $file = file("chat.txt");
    $file =array_reverse($file);
    foreach($file as $line){
        echo "<p class=message>$line</p>";
    }
}
if ($_GET["praca"] == "nowe") {

    file_put_contents("chat.txt", PHP_EOL . $_SESSION["user"] . ":" . $_GET["zawartosc"], FILE_APPEND);
}