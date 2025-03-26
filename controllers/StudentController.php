<?php
require_once '../models/Student.php';
class StudentController {
    private $student;
    
    public function __construct() {
        $db = new Database();
        $this->student = new Student($db->getConnection());
    }

    public function index() {
        $students = $this->student->getAll();
        require_once '../views/students/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'MaSV' => $_POST['MaSV'],
                'HoTen' => $_POST['HoTen'],
                'GioiTinh' => $_POST['GioiTinh'],
                'NgaySinh' => $_POST['NgaySinh'],
                'Hinh' => $_POST['Hinh'],
                'MaNganh' => $_POST['MaNganh']
            ];
            if ($this->student->create($data)) {
                header("Location: index.php?controller=student&action=index");
            }
        }
        require_once '../views/students/create.php';
    }

    public function edit($maSV = null) {
        $maSV = $_GET['id'] ?? $maSV;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'MaSV' => $maSV,
                'HoTen' => $_POST['HoTen'],
                'GioiTinh' => $_POST['GioiTinh'],
                'NgaySinh' => $_POST['NgaySinh'],
                'Hinh' => $_POST['Hinh'],
                'MaNganh' => $_POST['MaNganh']
            ];
            if ($this->student->update($data)) {
                header("Location: index.php?controller=student&action=index");
            }
        }
        $student = $this->student->getById($maSV);
        require_once '../views/students/edit.php';
    }

    public function delete($maSV = null) {
        $maSV = $_GET['id'] ?? $maSV;
        $Relatively = $this->student->delete($maSV);
        header("Location: index.php?controller=student&action=index");
    }

    public function detail($maSV = null) {
        $maSV = $_GET['id'] ?? $maSV;
        $student = $this->student->getById($maSV);
        require_once '../views/students/detail.php';
    }
}
?>