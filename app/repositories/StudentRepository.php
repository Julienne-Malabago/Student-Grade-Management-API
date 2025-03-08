<?php
require_once __DIR__ . '/../models/Student.php';
require_once __DIR__ . '/../contracts/IBaseRepository.php';
require_once __DIR__ . '/../services/StudentServices.php';

class StudentRepository implements IBaseRepository {
    private $student;
    private $studentService;

    public function __construct($db) {
        $this->student = new Student($db);
        $this->studentService = new StudentServices();
    }

    public function getAll() {
        return $this->student->getAllStudents();
    }

    public function getById($id) {
        return $this->student->getStudentById($id);
    }

    public function create($data) {
        list($final_grade, $status) = $this->studentService->calculateFinalGrade($data['midterm_score'], $data['finals_score']);
        return $this->student->addStudent($data['name'], $data['midterm_score'], $data['finals_score'], $final_grade, $status);
    }

    public function update($id, $data) {
        list($final_grade, $status) = $this->studentService->calculateFinalGrade($data['midterm_score'], $data['finals_score']);
        return $this->student->updateStudent($id, $data['midterm_score'], $data['finals_score'], $final_grade, $status);
    }

    public function delete($id) {
        return $this->student->deleteStudent($id);
    }
}
?>