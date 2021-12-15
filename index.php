<?php
session_start();
if($_SESSION['zalogowany']!=true) {
    header("Location: login.php");
    exit();
}
?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Naprawa Automatyczna środowiska</title>
</head>
<body>
<a href="logout.php">Wyloguj się</a><br>
<?php
require_once "config.php";
echo "<b>Scaned dir: </b>".$wpPath . "/wp-content/plugins<br>";
foreach (scandir($wpPath . "/wp-content/plugins") as $obj){
    if(substr($obj,0,1)!="."){
        if(!strpos($obj,".")){
            echo "<a href='fix.php?ext=".$obj."'>".$obj."</a><br>";
        }
    }
}
?>
</body>
</html>
<?php
