<?php
require_once("../sql/dbh.php");
require_once("./loginController.php");
require_once("./sessionHelper.php");

$validationQuery = $db->prepare("
SELECT `id`, `fullname`,
`password`
FROM `user`
WHERE `fullname`= :fullname
AND `password`= :password");

$validationQuery->execute([
    'fullname' => $username,
    'password' => $password
]);

$isSuscribed = $validationQuery->rowCount() ? $validationQuery : [];
$isSuscribed = $validationQuery->rowCount();
$result = $validationQuery->fetchAll();

$_SESSION['id'] = $result[0]['id'];


if ($isSuscribed) {
    $_SESSION["info"] = "Login process succesful";
    $_SESSION["id"] = $result[0]['id'];
    sessionTime();
} else {
    header('Location: ../../index.php');
    $_SESSION["info"] = "You are not registered, please SignUp";
    exit();
    //$_SESSION["issuscribed"]=false;
}

function logOut()
{
    destroySession();
    exit();
}
