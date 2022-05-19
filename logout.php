<?php
ob_start();
session_start();
$_SESSION["ErrorMassage"] = "Wylogowano";
header("Location: index.php");
?>