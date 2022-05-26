<?php
session_start();
ob_start();
if ($_GET["mode"] == "get") {

    
    $file = file("posty.txt");
    $file =array_reverse($file);
    foreach($file as $line){
        echo "<p class=message>$line</p>";
    }

}
if ($_GET["mode"] == "update") {

    file_put_contents("posty.txt", PHP_EOL . $_SESSION["user"] ."(<span>".date("j F Y h:i:s A")."</span>)". ": " . $_GET["tresc"], FILE_APPEND);
}