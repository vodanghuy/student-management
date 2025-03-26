<?php
class Course {
    public $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM HocPhan";
        return $this->conn->query($query);
    }

    public function register($maSV, $maHP) {
        // Tạo mới đăng ký
        $query = "INSERT INTO DangKy (NgayDK, MaSV) VALUES (CURDATE(), ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $maSV);
        $stmt->execute();
        $maDK = $this->conn->insert_id;

        // Thêm chi tiết đăng ký
        $query = "INSERT INTO ChiTietDangKy (MaDK, MaHP) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("is", $maDK, $maHP);
        return $stmt->execute();
    }
}
?>