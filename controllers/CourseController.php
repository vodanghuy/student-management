<?php
require_once '../models/Course.php';
require_once '../models/Registration.php';
class CourseController {
    private $course;
    private $registration;
    
    public function __construct() {
        $db = new Database();
        $this->course = new Course($db->getConnection());
        $this->registration = new Registration($db->getConnection());
    }

    public function list() {
        if (!isset($_SESSION['student_id'])) {
            header("Location: index.php?controller=auth&action=login");
        }
        $courses = $this->course->getAll();
        require_once '../views/courses/list.php';
    }

    public function registered() {
        if (!isset($_SESSION['student_id'])) {
            header("Location: index.php?controller=auth&action=login");
        }
        $maSV = $_SESSION['student_id'];
        $registeredCourses = $this->registration->getRegisteredCourses($maSV);
        
        $query = "SELECT * FROM SinhVien WHERE MaSV = '$maSV'";
        $student = $this->course->conn->query($query)->fetch_assoc();
        
        require_once '../views/courses/registered.php';
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $maSV = $_SESSION['student_id'];
            $maHP = $_POST['MaHP'];
            if ($this->course->register($maSV, $maHP)) {
                echo "<script>alert('Đã lưu học phần'); window.location='index.php?controller=course&action=registered';</script>";
            }
        }
    }

    public function delete() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $maDK = $_POST['MaDK'];
            $maHP = $_POST['MaHP'];
            $this->registration->deleteCourse($maDK, $maHP);
            header("Location: index.php?controller=course&action=registered");
        }
    }

    public function deleteAll() {
        $maSV = $_SESSION['student_id'];
        $this->registration->deleteAll($maSV);
        header("Location: index.php?controller=course&action=registered");
    }
}
?>