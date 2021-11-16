<?php
//Import $db setting to prepare the request for the database
require_once('../sql/dbh.php');

//Session to get the user id passed from login page
session_start();

//Getting values generated from the employee form
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


//Storing values into an array of objects to make a further bind process
$data = [
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
];

//Prepare the SQL call
$query = "INSERT INTO employee_edit_name (name, lastname, email, gender, age, street, city, state, postalcode, phone, userId)
    VALUES (:name, :lastname, :email, :gender, :age, :street, :city, :state, :postalcode, :phone, :userId)";

//Preparing and executing the PDO statement to post the data into the database
$getQuery = $db->prepare($query);
$getQuery->execute($data);

//Redirecting to dashboard page after new employee post
header("Location: ../dashboard.php");