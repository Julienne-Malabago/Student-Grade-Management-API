<?php
require_once __DIR__ . '/../repositories/StudentRepository.php';

class StudentController {
    private $repository;

    public function __construct($db) {
        $this->repository = new StudentRepository($db);
    }

    public function handleRequest($method, $data) {
        switch ($method) {
            case 'GET':
                $id = isset($_GET['id']) ? $_GET['id'] : null;
                if ($id) {
                    echo json_encode($this->repository->getById($id));
                } else {
                    echo json_encode($this->repository->getAll());
                }
                break;
            case 'POST':
                echo json_encode($this->repository->create($data));
                break;
            case 'PUT':
                echo json_encode($this->repository->update($data['id'], $data));
                break;
            case 'DELETE':
                echo json_encode($this->repository->delete($data['id']));
                break;
            default:
                echo json_encode(["message" => "Invalid Request"]);
                break;
        }
    }
}
?>