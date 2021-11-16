<?php
//Import $db setting to prepare the request for the database
require_once('../sql/dbh.php');
//Session to get the user id passed from login page
session_start();

//Getting the method request from the ajax call in the dashboard page
$method = $_SERVER['REQUEST_METHOD'];

//Getting values generated from the ajax get method
if ($method == 'GET') {
    //Storing values into an array of objects to make a further bind process
    $data = [
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
    ];

    //Prepare the SQL call
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

    //Preparing and executing the PDO statement to fetch the data into the database
    $getQuery = $db->prepare($query);
    $getQuery->execute($data);
    $result = $getQuery->fetchAll();

    //Printing the data into the dashboard table
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

//Getting values generated from the ajax post method
if ($method == 'POST') {
    //Storing values into an array of objects to make a further bind process
    $data = [
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
    ];

    //Prepare the SQL call
    $query = "INSERT INTO employee_edit_name (name, email, gender, age, street, city, state, postalcode, phone, userId)
    VALUES (:name, :email, :gender, :age, :street, :city, :state, :postalcode, :phone, :userId)";

    //Preparing and executing the PDO statement to post the data into the database
    $getQuery = $db->prepare($query);
    $getQuery->execute($data);
}

//Getting values generated from the ajax put method
if ($method == 'PUT') {
    //Storing values into an array of objects to make a further bind process
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
    //Prepare the SQL call
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
    //Preparing and executing the PDO statement to post the data into the database
    $getQuery = $db->prepare($query);
    $getQuery->execute($data);
}

//Getting values generated from the ajax delete method
if ($method == "DELETE") {
    parse_str(file_get_contents("php://input"), $_DELETE);
    //Storing value into an array of objects to make a further bind process
    $data = [':id' => $_DELETE["id"]];
    //Prepare the SQL call
    $query = "DELETE FROM employee_edit_name WHERE id = :id";
    //Preparing and executing the PDO statement to delete the data into the database
    $getQuery = $db->prepare($query);
    $getQuery->execute($data);
}