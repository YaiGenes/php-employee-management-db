<?php

require_once('../sql/dbh.php');

$dsn = "mysql:host=" . $_SERVER["SERVER_NAME"] . ";dbname=employeeMngmt";
$dsn = "mysql:host=";
$dbusername = "root";
$dbpassword = "";

$db = new PDO($dsn, $dbusername, $dbpassword);

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    $data = array(
        ':firstname' => "%" . $GET_['firstname'] . "%"
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
