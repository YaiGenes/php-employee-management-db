<?php

// require_once('../sql/dbh.php');

$dsn = "mysql:host=" . $_SERVER["SERVER_NAME"] . ";dbname=employeeMngmt";
$dbusername = "root";
$dbpassword = "";

$db = new PDO($dsn, $dbusername, $dbpassword);

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    $data = array(
        ':firstname' => "%" . $_GET['firstname'] . "%"
    );

    $query = "SELECT * FROM test WHERE firstname LIKE :firstname ORDER BY id DESC";

    $getQuery = $db->prepare($query);
    $getQuery->execute($data);
    $result = $getQuery->fetchAll();

    foreach ($result as $row) {
        $output[] = array(
            'id' => $row['id'],
            'firstname' => $row['firstname']
        );
    }
    header("Content-Type: application/json");
    echo json_encode($output);
}

if ($method == 'POST') {
    $data = array(
        ':firstname' => $_POST['firstname'],
    );

    $query = "INSERT INTO test (firstname) VALUES (:firstname)";

    $getQuery = $db->prepare($query);
    $getQuery->execute($data);
}

if ($method == 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT); // Whats the php://input

    $data = array(
        ':id' => $_PUT['id'],
        ':firstname' => $_PUT['firstname'],
    );

    // change test to your database
    $query = "UPDATE test
    SET firstname = :firstname,
    WHERE id = :id
    ";

    $getQuery = $db->prepare($query);
    $getQuery->execute($data);
}

if ($method == "DELETE") {
    parse_str(file_get_contents("php://input"), $_DELETE);

    $query = "DELETE FROM test WHERE id = '" . $_DELETE["id"] . "'";
    $getQuery = $db->prepare($query);
    $getQuery->execute($data);
}
