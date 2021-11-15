<?php
require_once("../sql/dbh.php");
require_once("./loginController.php");



$validationQuery = $db->prepare("
SELECT `id`, `fullname`,
`password`
FROM `user`
WHERE `fullname`= :fullname
AND `password`= :password");

$validationQuery->execute([
    'fullname'=>$username,
    'password'=>$password
]);

$isSuscribed = $validationQuery->rowCount()?$validationQuery:[];
$isSuscribed = $validationQuery->rowCount();
$result = $validationQuery->fetchAll();

$_SESSION['id'] = $result[0]['id'];
if ($isSuscribed) {
    $_SESSION["info"]="Login process succesful";
    //$_SESSION["issuscribed"]=true;
    header('Location: ../dashboard.php');
}else {
    header('Location: ../../index.php?error=The user is not suscribed');
    $_SESSION["info"] = "You are not registered, please SignUp";
    //$_SESSION["issuscribed"]=false;
}

// function login($a, $b)
// {

// get_uploaded_files("../../resources/users.json");


//     if ($a === $adEmail) {
//         //echo "somos el mismo correo<br>";
//         if (password_verify($b, $adPass)) {
//             //echo "somos la misma pass<br>";
//             $_SESSION["user"] = $admin['users'][0]['name'];
//         } else {
//             header("Location: ../../index.php?error=invalidpass");
//             exit();
//         }
//     } else {
//         header("Location: ../../index.php?error=userinvalid");
//         exit();
//     }
// }

function logOut()
{
    // destroySessions();
    exit();
}