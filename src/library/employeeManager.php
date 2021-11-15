<?php

// require_once('../sql/dbh.php');
session_start();

$dsn = "mysql:host=" . $_SERVER["SERVER_NAME"] . ";dbname=employeeMngmt";
$dbusername = "root";
$dbpassword = "";

$db = new PDO($dsn, $dbusername, $dbpassword);

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    $data = array(
        ':name' => "%" . $_GET['name'] . "%",
        ':email' => "%" . $_GET['email'] . "%",
        ':gender' => "%" . $_GET['gender'] . "%",
        ':age' => "%" . $_GET['age'] . "%",
        ':street' => "%" . $_GET['street'] . "%",
        ':city' => "%" . $_GET['city'] . "%",
        ':state' => "%" . $_GET['state'] . "%",
        ':postalcode' => "%" . $_GET['postalcode'] . "%",
        ':phone' => "%" . $_GET['phone'] . "%",
        ':userId' => $_SESSION['id']
    );

    $query = "SELECT * FROM employee_edit_name WHERE
    userId = :userId
    AND name LIKE :name
    AND email LIKE :email
    AND gender LIKE :gender
    AND age LIKE :age
    AND street LIKE :street
    AND city LIKE :city
    AND state LIKE :state
    AND postalcode LIKE :postalcode
    AND phone LIKE :phone
    ORDER BY id DESC
    ";

    $getQuery = $db->prepare($query);
    $getQuery->execute($data);
    $result = $getQuery->fetchAll();

    foreach ($result as $row) {
        $output[] = array(
            'id' => intval($row['id']),
            'name' => $row['name'],
            'email' => $row['email'],
            'gender' => $row['gender'],
            'age' => $row['age'],
            'street' => $row['street'],
            'city' => $row['city'],
            'state' => $row['state'],
            'postalcode' => $row['postalcode'],
            'phone' => $row['phone']
        );
    }
    header("Content-Type: application/json");
    echo json_encode($output);
}

if ($method == 'POST') {

    var_dump($_POST);

    $data = array(
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':gender' => $_POST['gender'],
        ':age' => $_POST['age'],
        ':street' => $_POST['street'],
        ':city' => $_POST['city'],
        ':state' => $_POST['state'],
        ':postalcode' => $_POST['postalcode'],
        ':phone' => $_POST['phone'],
        ':userId' => $_SESSION['id']
    );

    $query = "INSERT INTO employee_edit_name (name, email, gender, age, street, city, state, postalcode, phone, userId)
    VALUES (:name, :email, :gender, :age, :street, :city, :state, :postalcode, :phone, :userId)";

    $getQuery = $db->prepare($query);
    $getQuery->execute($data);
}

if ($method == 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);
    $stor = $_PUT;
    $data = [
        ':id' => intval($stor['id']),
        ':name' => $stor['name'],
        ':email' => $stor['email'],
        ':gender' => $stor['gender'],
        ':age' => $stor['age'],
        ':street' => $stor['street'],
        ':city' => $stor['city'],
        ':state' => $stor['state'],
        ':postalcode' => $stor['postalcode'],
        ':phone' => $stor['phone']
    ];
    
    // change employee_edit_name to your database
    $query = "UPDATE employee_edit_name
    SET
    name = :name,
    email = :email,
    gender = :gender,
    age = :age,
    street = :street,
    city = :city,
    state = :state,
    postalcode = :postalcode,
    phone = :phone
    WHERE id = :id
    ";
    $getQuery = $db->prepare($query);
    $getQuery->execute($data);
    var_dump($getQuery);
}

if ($method == "DELETE") {
    parse_str(file_get_contents("php://input"), $_DELETE);
    $query = "DELETE FROM employee_edit_name WHERE id = '" . $_DELETE["id"] . "'";
    $getQuery = $db->prepare($query);
    $getQuery->execute($data);
}