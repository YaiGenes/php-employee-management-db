<?php
require_once('./loginManager.php');

session_start();


function destroySession()
{
    session_destroy();
    header('Location: ./index.php');
}

function checkExpired()
{
    if (isset($_SESSION['timeout'])) {
        $sessionTime = time() - $_SESSION['timeout'];
        if ($sessionTime > 150) {
            logOut();
        }
    }
}

function sessionTime()
{
    $_SESSION['timeout'] = time();
    header('Location: ../dashboard.php');
}
