<?php require_once 'Api.php';



header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: X-Requested-With');
header('Content-Type: application/json');

// Create object of Users class
$user = new Api();

// create a api variable to get HTTP method dynamically
$api = $_SERVER['REQUEST_METHOD'];

// get id from url
$id = intval($_GET['id'] ?? '');
// Get all or a single user from database
if ($api == 'GET') {
    if ($id != 0) {
        $data = $user->fetch($id);
    } else {
        $data = $user->fetch();
    }
    echo json_encode($data);
}


// Add user
if ($api == 'POST') {
    $name = $user->test_input($_POST['name']);
    $email = $user->test_input($_POST['email']);
    $phone = $user->test_input($_POST['phone']);

    if ($user->insert($name, $email, $phone)) {
        echo $user->message('User added successfully!', false);
    } else {
        echo $user->message('Failed to add an user!', true);
    }
}

// Update an user
if ($api == 'PUT') {
    parse_str(file_get_contents('php://input'), $post_input);

    $name = $user->test_input($post_input['name']);
    $email = $user->test_input($post_input['email']);
    $phone = $user->test_input($post_input['phone']);

    if ($id != null) {
        if ($user->update($name, $email, $phone, $id)) {
            echo $user->message('User updated successfully!', false);
        } else {
            echo $user->message('Failed to update an user!', true);
        }
    } else {
        echo $user->message('User not found!', true);
    }
}

// Delete an user
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
