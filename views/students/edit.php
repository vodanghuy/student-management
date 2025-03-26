<?php include '../views/shares/header.php'; ?>
<h2>Sửa sinh viên</h2>
<form method="POST">
    <div>
        <label>Mã SV:</label>
        <input type="text" name="MaSV" value="<?php echo $student['MaSV']; ?>" readonly>
    </div>
    <div>
        <label>Họ tên:</label>
        <input type="text" name="HoTen" value="<?php echo $student['HoTen']; ?>" required>
    </div>
    <div>
        <label>Giới tính:</label>
        <select name="GioiTinh">
            <option value="Nam" <?php echo $student['GioiTinh'] == 'Nam' ? 'selected' : ''; ?>>Nam</option>
            <option value="Nữ" <?php echo $student['GioiTinh'] == 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
        </select>
    </div>
    <div>
        <label>Ngày sinh:</label>
        <input type="date" name="NgaySinh" value="<?php echo $student['NgaySinh']; ?>" required>
    </div>
    <div>
        <label>Hình:</label>
        <input type="file" name="Hinh" value="<?php echo $student['Hinh']; ?>">
    </div>
    <div>
        <label>Mã ngành:</label>
        <select name="MaNganh">
            <option value="CNTT" <?php echo $student['MaNganh'] == 'CNTT' ? 'selected' : ''; ?>>Công nghệ thông tin</option>
            <option value="QTKD" <?php echo $student['MaNganh'] == 'QTKD' ? 'selected' : ''; ?>>Quản trị kinh doanh</option>
        </select>
    </div>
    <button type="submit">Cập nhật</button>
</form>
<a href="?controller=student&action=index">Quay lại</a>
<?php include '../views/shares/footer.php'; ?>