<?php
//Import $db setting to prepare the request for the database
require_once("../sql/dbh.php");

//Getting variables from Login controller
require_once("./loginController.php");

//Getting session destroy
require_once("./sessionHelper.php");

//Starting session to store userId and pass it into the app to query porpouses
session_start();

//Prepare the SQL call
$query = "SELECT id, fullname,
password
FROM user
WHERE fullname= :fullname
AND password = :password";

//Storing values into an array of objects to make a further bind process
$data = [
    ':fullname' => $username,
    ':password' => $password
];

//Preparing and executing the PDO statement to post the data into the database
$validationQuery = $db->prepare($query);
$validationQuery->execute($data);

//Conditions to user validation
$isSuscribed = $validationQuery->rowCount() ? $validationQuery : [];
$isSuscribed = $validationQuery->rowCount();
$result = $validationQuery->fetchAll();

//Storing the userId for further queries in dashboard page
$_SESSION['id'] = $result[0]['id'];


//Redirecting to dashboard page after new employee post
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

//End session and delete userId
function logOut()
{
    destroySession();
    exit();
}