<?php

require_once('Database.php');
require_once('CRUDInterface.php');


$db = new Database();
$dao = new UsersDAO($db);


//create
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = json_decode(file_get_contents("php://input"), true);
    $dao->create($data);
//read
} else if ($_SERVER["REQUEST_METHOD"] === "GET") {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        echo json_encode($dao->read($id));
    } else {
    }

//update
} else if ($_SERVER["REQUEST_METHOD"] === "PUT") {
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $_GET["id"];
    $dao->update($id, $data);

//delete
} else if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
    $id = $_GET["id"];
    $dao->delete($id);
}
