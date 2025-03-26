<?php
class Student {
    public $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT s.*, n.TenNganh FROM SinhVien s 
                 LEFT JOIN NganhHoc n ON s.MaNganh = n.MaNganh";
        return $this->conn->query($query);
    }

    public function getById($maSV) {
        $query = "SELECT s.*, n.TenNganh FROM SinhVien s 
                 LEFT JOIN NganhHoc n ON s.MaNganh = n.MaNganh 
                 WHERE s.MaSV = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $maSV);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function create($data) {
        $query = "INSERT INTO SinhVien (MaSV, HoTen, GioiTinh, NgaySinh, Hinh, MaNganh) 
                 VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssss", $data['MaSV'], $data['HoTen'], $data['GioiTinh'], 
                         $data['NgaySinh'], $data['Hinh'], $data['MaNganh']);
        return $stmt->execute();
    }

    public function update($data) {
        $query = "UPDATE SinhVien SET HoTen = ?, GioiTinh = ?, NgaySinh = ?, 
                 Hinh = ?, MaNganh = ? WHERE MaSV = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssss", $data['HoTen'], $data['GioiTinh'], 
                         $data['NgaySinh'], $data['Hinh'], $data['MaNganh'], 
                         $data['MaSV']);
        return $stmt->execute();
    }

    public function delete($maSV) {
        $query = "DELETE FROM SinhVien WHERE MaSV = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $maSV);
        return $stmt->execute();
    }
}
?>