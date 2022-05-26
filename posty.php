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
    <title>Posty</title>
    <link rel=stylesheet href=style.css>
</head>

<body class='bg-dark text-light'> 
<nav class='bg-info d-flex'>
<p class='m-3 me-auto p-2 fs-2'><a href=stronaGowna.php class='text-decoration-none text-light'>PocketBook</a></p>
<p class='m-3 me-auto p-2 fs-2'><a href=testuje.php class='text-decoration-none text-light'>Edycja plików</a></p>
<p class='m-3 me-auto p-2 fs-2'><a href=stronaGowna.php class='text-decoration-none text-light'>Strona Główna</a></p>
<p class='m-3 p-2 fs-3'>Witaj <?php  echo $_SESSION["user"]?></p>
<?php 
echo "<form action=logout.php method=post class='m-3 p-2'>";
echo "<button class='btn btn-info text-light border'>Wyloguj</button>";
echo "</form>";
?>
</nav>
<div class="d-flex justify-content-center flex-column align-items-center flex-wraps">
<div class=postyTu>

<div>
<p><label for=postu>Post:</label></p> 
<textarea name=zawartosc id=zawartosc class=oknoPost></textarea></div>
<input id=sendMsg value="Wyślij" class="btn btn-primary" >

<div class=wololo2>

</div>

<script>
document.querySelector("#sendMsg").addEventListener("click", konwersuj);


function wyswietlChat() {
            let request = new XMLHttpRequest();
            request.open("GET", "postowanie.php?"+ "&praca=get", true);
            request.onload = () => {
                
                document.querySelector(".wololo2").innerHTML = request.response;
                   

                


            }
            request.send();
        }
        
    
function konwersuj() {
            zawartosc = document.querySelector("#zawartosc").value;
            console.log("postowanie.php?" +"&praca=nowe" + "&zawartosc=" + zawartosc)
            let request = new XMLHttpRequest();
            request.open("GET", "postowanie.php?" +"&praca=nowe" + "&zawartosc=" + zawartosc, true);
            request.send();

            wyswietlChat();

        }


        setInterval(wyswietlChat, 1000)
</script>
</body>
</html>

