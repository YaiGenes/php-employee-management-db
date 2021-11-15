<?php
session_start();

if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['pass']) && !empty($_POST['pass'])) {

    $username = $_POST["username"];
    $password = $_POST["pass"];
}

if (isset($_GET['logOut'])) {
    session_destroy();
    header('Location: ../../index.php?logOut=true');
}