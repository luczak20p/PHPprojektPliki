<?php
ob_start();
if (!preg_match('/^([A-Za-z0-9-_]+)$/', $_POST["login"]) || !preg_match('/^([A-Za-z0-9-_]+)$/', $_POST["password"])) {
    echo "BEZ SPACJI AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA 😡";
} else {
    if (is_writable("uzytkownicy.txt")) {

        fwrite(fopen("uzytkownicy.txt", "a+"), "{$_POST["login"]},{$_POST["password"]},");
    }
}
$aaaaaaaaaa = file_get_contents("uzytkownicy.txt");
$b = explode(",", $aaaaaaaaaa);
var_dump($b);
