<?php include '../views/shares/header.php'; ?>
<h2>Thêm sinh viên</h2>
<form method="POST">
    <div>
        <label>Mã SV:</label>
        <input type="text" name="MaSV" required>
    </div>
    <div>
        <label>Họ tên:</label>
        <input type="text" name="HoTen" required>
    </div>
    <div>
        <label>Giới tính:</label>
        <select name="GioiTinh">
            <option value="Nam">Nam</option>
            <option value="Nữ">Nữ</option>
        </select>
    </div>
    <div>
        <label>Ngày sinh:</label>
        <input type="date" name="NgaySinh" required>
    </div>
    <div>
        <label>Hình:</label>
        <input type="file" name="Hinh" placeholder="/Content/images/sv.jpg">
    </div>
    <div>
        <label>Mã ngành:</label>
        <select name="MaNganh">
            <option value="CNTT">Công nghệ thông tin</option>
            <option value="QTKD">Quản trị kinh doanh</option>
        </select>
    </div>
    <button type="submit">Thêm</button>
</form>
<a href="?controller=student&action=index">Quay lại</a>
<?php include '../views/shares/footer.php'; ?>