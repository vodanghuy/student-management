<h2>Học phần đã đăng ký</h2>
<div>
    <h3>Thông tin sinh viên</h3>
    <p>Mã SV: <?php echo $student['MaSV']; ?></p>
    <p>Họ tên: <?php echo $student['HoTen']; ?></p>
    <p>Ngày đăng ký: <?php echo date('d/m/Y'); ?></p>
</div>

<table border="1">
    <tr>
        <th>Mã HP</th>
        <th>Tên HP</th>
        <th>Số tín chỉ</th>
        <th>Thao tác</th>
    </tr>
    <?php while ($row = $registeredCourses->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['MaHP']; ?></td>
        <td><?php echo $row['TenHP']; ?></td>
        <td><?php echo $row['SoTinChi']; ?></td>
        <td>
            <form method="POST" action="?controller=course&action=delete">
                <input type="hidden" name="MaDK" value="<?php echo $row['MaDK']; ?>">
                <input type="hidden" name="MaHP" value="<?php echo $row['MaHP']; ?>">
                <button type="submit">Xóa</button>
            </form>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<form method="POST" action="?controller=course&action=deleteAll">
    <button type="submit">Xóa tất cả</button>
</form>
<a href="?controller=course&action=list">Quay lại đăng ký</a> |
<a href="?controller=auth&action=logout">Đăng xuất</a>