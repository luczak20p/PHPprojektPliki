<?php
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Strona główna</title>
</head>

<body class='bg-dark text-light'> 
<nav class='bg-info d-flex'>
<p class='m-3 me-auto p-2 fs-2'>PocketBook</p>
<p class='m-3 me-auto p-2 fs-2'><a href=testuje.php class='text-decoration-none text-light'>Edycja plików</a></p>
<p class='m-3 p-2 fs-3'>Witaj <?php  echo $_SESSION["user"]?></p>
<?php 
echo "<form action=logout.php method=post class='m-3 p-2'>";
echo "<button class='btn btn-info text-light border'>Wyloguj</button>";
echo "</form>";
?>
</nav>
<div class="d-flex justify-content-center flex-column">
<h2><b>Witaj na Pocketbook - internetowym notatniku</b></h2>
<h3>By tworzyć i edytować pliki naciśnij napis "Edycja plików" na pasku powyżej</h3>
</div>
</body>
</html>

<?php
?>