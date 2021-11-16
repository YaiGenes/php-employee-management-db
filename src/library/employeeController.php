<?php
session_start();

$dsn = "mysql:host=" . $_SERVER["SERVER_NAME"] . ";dbname=employeeMngmt";
$dbusername = "root";
$dbpassword = "";

$db = new PDO($dsn, $dbusername, $dbpassword);

var_dump($_POST);
echo '<br/>';

$name = $_POST["name"];
$name = $_POST["lastName"];
$email = $_POST["email"];
$city = $_POST["city"];
$state = $_POST["state"];
$postCode = $_POST["postalCode"];
$lastName = $_POST["lastName"];
$gender = $_POST["gender"][0];
$streetAddress = $_POST["streetAddress"];
$age = $_POST["age"];
$phoneNumber = $_POST["phoneNumber"];

$data = array(
    ':name' => $name,
    ':lastname' => $lastName,
    ':email' => $email,
    ':gender' => $gender,
    ':age' => $age,
    ':street' => $streetAddress,
    ':city' => $city,
    ':state' => $state,
    ':postalcode' => $postCode,
    ':phone' => $phoneNumber,
    ':userId' => $_SESSION['id']
);

$query = "INSERT INTO employee_edit_name (name, lastname, email, gender, age, street, city, state, postalcode, phone, userId)
    VALUES (:name, :lastname, :email, :gender, :age, :street, :city, :state, :postalcode, :phone, :userId)";

$getQuery = $db->prepare($query);
$getQuery->execute($data);

header("Location: ../dashboard.php");
