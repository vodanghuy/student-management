<?php
class Registration {
    public $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    public function getRegisteredCourses($maSV) {
        $query = "SELECT h.*, d.MaDK FROM HocPhan h
                 JOIN ChiTietDangKy c ON h.MaHP = c.MaHP
                 JOIN DangKy d ON c.MaDK = d.MaDK
                 WHERE d.MaSV = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $maSV);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function deleteCourse($maDK, $maHP) {
        $query = "DELETE FROM ChiTietDangKy WHERE MaDK = ? AND MaHP = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("is", $maDK, $maHP);
        return $stmt->execute();
    }

    public function deleteAll($maSV) {
        $query = "DELETE c FROM ChiTietDangKy c
                 JOIN DangKy d ON c.MaDK = d.MaDK
                 WHERE d.MaSV = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $maSV);
        $stmt->execute();
        
        $query = "DELETE FROM DangKy WHERE MaSV = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $maSV);
        return $stmt->execute();
    }
}
?>