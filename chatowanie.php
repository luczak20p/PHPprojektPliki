<?php
session_start();
ob_start();
if ($_GET["mode"] == "get") {
    $file = file("chat.txt");
    $file =array_reverse($file);
    foreach($file as $line){
        echo "<p class=message>$line</p>";
    }
}
if ($_GET["mode"] == "update") {

    file_put_contents("chat.txt", PHP_EOL . $_SESSION["user"] . ":" . $_GET["tresc"], FILE_APPEND);
}