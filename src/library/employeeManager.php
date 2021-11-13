<?php

// require_once('../sql/dbh.php');

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
        // ':state' => "%" . $_GET['state'] . "%",
        ':postalcode' => "%" . $_GET['postalcode'] . "%",
        ':phone' => "%" . $_GET['phone'] . "%"
    );

    $query = "SELECT * FROM employee_edit_name WHERE
    name LIKE :name
    AND email LIKE :email
    AND gender LIKE :gender
    AND age LIKE :age
    AND street LIKE :street
    AND city LIKE :city
    -- AND state LIKE :state
    AND postalcode LIKE :postalcode
    AND phone LIKE :phone
    ORDER BY id DESC
    ";

    $getQuery = $db->prepare($query);
    $getQuery->execute($data);
    $result = $getQuery->fetchAll();

    foreach ($result as $row) {
        $output[] = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'email' => $row['email'],
            'gender' => $row['gender'],
            'age' => $row['age'],
            'street' => $row['street'],
            'city' => $row['city'],
            // 'state' => $row['state'],
            'postalcode' => $row['postalcode'],
            'phone' => $row['phone']
        );
    }
    header("Content-Type: application/json");
    echo json_encode($output);
}

if ($method == 'POST') {
    $data = array(
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':gender' => $_POST['gender'],
        ':age' => $_POST['age'],
        ':street' => $_POST['street'],
        ':city' => $_POST['city'],
        // ':state' => $_POST['state'],
        ':postalcode' => $_POST['postalcode'],
        ':phone' => $_POST['phone']
    );

    $query = "INSERT INTO employee_edit_name 
    (name, email, gender, age, street, city, postalcode, phone) 
    VALUES (:name, :email, :gender, :age, :street, :city, :postalcode, :phone)";

    $getQuery = $db->prepare($query);
    $getQuery->execute($data);
}

if ($method == 'PUT') {
    parse_str(file_get_contents("php://input"), $_PUT);

    $data = array(
        ':id' => $_PUT['id'],
        ':name' => $_PUT['name'],
        ':email' => $_PUT['email'],
        // ':gender' => $_PUT['gender'],
        // ':age' => $_PUT['age'],
        // ':street' => $_PUT['street'],
        // ':city' => $_PUT['city'],
        // ':state' => $_PUT['state'],
        // ':postalcode' => $_PUT['postalcode'],
        // ':phone' => $_PUT['phone']
    );

    // change employee_edit_name to your database
    $query = "UPDATE employee_edit_name
    SET name = :name,
    email = :email,
    -- gender = :gender,
    -- age = :age,
    -- street = :street,
    -- city = :city,
    -- -- state = :state,
    -- postalcode = :postalcode,
    -- phone = :phone,
    WHERE id = :id
    ";

    $getQuery = $db->prepare($query);
    $getQuery->execute($data);
}

if ($method == "DELETE") {
    parse_str(file_get_contents("php://input"), $_DELETE);

    $query = "DELETE FROM employee_edit_name WHERE id = '" . $_DELETE["id"] . "'";
    $getQuery = $db->prepare($query);
    $getQuery->execute($data);
}
