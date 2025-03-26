<?php include '../views/shares/header.php'; ?>
<h2>Danh sách học phần</h2>
<table border="1">
    <tr>
        <th>Mã HP</th>
        <th>Tên HP</th>
        <th>Số tín chỉ</th>
        <th>Thao tác</th>
    </tr>
    <?php while ($row = $courses->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['MaHP']; ?></td>
        <td><?php echo $row['TenHP']; ?></td>
        <td><?php echo $row['SoTinChi']; ?></td>
        <td>
            <form method="POST" action="?controller=course&action=register">
                <input type="hidden" name="MaHP" value="<?php echo $row['MaHP']; ?>">
                <button type="submit">Đăng ký</button>
            </form>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
<a href="?controller=course&action=registered">Xem học phần đã đăng ký</a> |
<a href="?controller=auth&action=logout">Đăng xuất</a>
<?php include '../views/shares/footer.php'; ?>