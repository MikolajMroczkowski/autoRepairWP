<?php
session_start();
if($_SESSION['zalogowany']==true){
header("Location: index.php");
exit();
}
if($_POST){
    echo "Checking...";
    require "config.php";
    if($_POST['pass']==$pass&&$_POST['user']==$user){
        $_SESSION['zalogowany'] = true;
        header("Location: index.php");
        exit();
    }
}

?>
<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login To Fixer</title>
</head>
<body>
<form method="POST">
    <input type="text" name="user" placeholder="Login..."><br>
    <input type="password" name="pass" placeholder="Password..."><br>
    <input type="submit">
</form>
</body>
</html>

