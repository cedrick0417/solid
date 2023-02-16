<?php
 header("Access-Control-Allow-Origin: *");
 header("Content-Type: application/json; charset=UTF-8");
 header("Access-Control-Allow-Methods: POST");
 header("Access-Control-Max-Age: 3600");
 header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


require_once('Database.php');
require_once('CRUDInterface.php');
$api = $_SERVER['REQUEST_METHOD'];


$database = new Database();
$db = $database->getConnection();

$item = new Users($db);

$data = json_decode(file_get_contents("php://input"));

// $item->id = $data->id;

    $item->name = $data->name;
    $item->email = $data->email;
    $item->phone = $data->phone;
//create
    if($item->create()){
        echo 'Employee created successfully.';
    } else{
        echo 'Employee could not be created.';
    }


// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     $data = json_decode(file_get_contents("php://input"), true);
//     $dao->create($data);
// //read
// } else if ($_SERVER["REQUEST_METHOD"] === "GET") {
//     if (isset($_GET["id"])) {
//         $id = $_GET["id"];
//         echo json_encode($dao->read($id));
//     } else {
//     }

// //update
// } else if ($_SERVER["REQUEST_METHOD"] === "PUT") {
//     $data = json_decode(file_get_contents("php://input"), true);
//     $id = $_GET["id"];
//     $dao->update($id, $data);

// //delete
// } else if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
//     $id = $_GET["id"];
//     $dao->delete($id);

if ($api == 'DELETE') {
    if ($id != null) {
        if ($user->delete($id)) {
            echo $user->message('User deleted successfully!', false);
        } else {
            echo $user->message('Failed to delete an user!', true);
        }
    } else {
        echo $user->message('User not found!', true);
    }
}
// }
?>