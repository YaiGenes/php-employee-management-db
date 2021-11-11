<?php

session_start();

$_SESSION["username"] = $username;
$_SESSION["pass"] = $password;


print_r userGet();




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
