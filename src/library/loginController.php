<?php
require_once('./loginManager.php');
session_start();

if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pass']) && !empty($_POST['pass'])) {

    $username = $_POST["email"];
    $password = $_POST["pass"];

    $_SESSION["username"] = $username;
    $_SESSION["pass"] = $password;
}





if (isset($_GET['logOut'])) {
    session_destroy();
    header('Location: ../../index.php?logOut=true');
}
