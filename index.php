<?php

require_once('dbConnect.php');
interface CRUDInterface
{
    public function create(array $data);
    public function read($id);
    public function update($id, $data);
    public function delete($id);
}

class User implements CRUDInterface
{
    private $db;

    public function __construct(DatabaseConnectionInterface $db)
    {
        $this->db = $db;
    }

    public function create(array $data)
    {
        // insert user data into database
        $sql = 'INSERT INTO users (name, email, phone) VALUES (:name, :email, :phone)';
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
    }

    public function read($id)
    {
        // retrieve user data from database
    }

    public function update($id, $data)
    {
        // update user data in database
    }

    public function delete($id)
    {
        // delete user data from database
    }
}

class API
{
    private $user;

    public function __construct(CRUDInterface $user)
    {
        $this->user = $user;
    }

    public function handleRequest()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        $data = json_decode(file_get_contents('php://input'), true);

        switch ($method) {
            case 'GET':
                if ($id) {
                    $response = $this->user->read($id);
                } else {
                    $response = $this->user->readAll();
                }
                break;

            case 'POST':
                $response = $this->user->create($data);

                break;

            case 'PUT':
                $response = $this->user->update($id, $data);
                break;

            case 'DELETE':
                $response = $this->user->delete($id);
                break;

            default:
                $response = 'Method not supported';
                break;
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}


// $user = new User();
// $user-> create();