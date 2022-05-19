<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>

<body class='bg-dark text-light'>
    <form action=walidacja.php method=post class="m-3 d-flex flex-column align-items-center">
        <div class="mb-3">
            <label for=login class="form-label">Nazwa użytkownika<input id=login name=login class="form-control"></label>
        </div>
        <div class="mb-3">
            <label for=password class="form-label">Hasło<input type=password id=password name=password class="form-control"></label>
        </div>

        <input type=submit class="btn btn-success przycisk" value="Log In">


    </form>

</body>

<?php
session_start();
$_SESSION["user"]="";
if (isset($_SESSION["ErrorMassage"])) {
    echo "<div class=m-3> {$_SESSION["ErrorMassage"]} </div>";
    $_SESSION["ErrorMassage"] = "";
}

?>

</html>