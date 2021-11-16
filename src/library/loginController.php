<?php
//Conditions to control the login and logout process
if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['pass']) && !empty($_POST['pass'])) {
    //Storing values from login form in variables
    $username = $_POST["username"];
    $password = $_POST["pass"];
}

if (isset($_GET['logOut'])) {
    //Destroying session
    session_destroy();
    //Redirecting to index page
    header('Location: ../../index.php');
}