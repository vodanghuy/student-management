<?php
require_once '../models/Student.php';
class AuthController {
    private $student;
    
    public function __construct() {
        $db = new Database();
        $this->student = new Student($db->getConnection());
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $maSV = $_POST['MaSV'];
            $query = "SELECT * FROM SinhVien WHERE MaSV = ?";
            $stmt = $this->student->conn->prepare($query);
            $stmt->bind_param("s", $maSV);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $_SESSION['student_id'] = $maSV;
                header("Location: index.php?controller=course&action=list");
            } else {
                $error = "Mã sinh viên không tồn tại";
            }
        }
        require_once '../views/auth/login.php';
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?controller=auth&action=login");
    }
}
?>