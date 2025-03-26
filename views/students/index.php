<?php include '../views/shares/header.php'; ?>
<h2>Danh sách sinh viên</h2>
<a href="?controller=student&action=create">Thêm mới</a>
<table border="1">
    <tr>
        <th>Mã SV</th>
        <th>Họ tên</th>
        <th>Giới tính</th>
        <th>Ngày sinh</th>
        <th>Ngành học</th>
        <th>Hình</th>
        <th>Thao tác</th>
    </tr>
    <?php while ($row = $students->fetch_assoc()): ?>
    <tr>
        <td><?php echo $row['MaSV']; ?></td>
        <td><?php echo $row['HoTen']; ?></td>
        <td><?php echo $row['GioiTinh']; ?></td>
        <td><?php echo $row['NgaySinh']; ?></td>
        <td><?php echo $row['TenNganh']; ?></td>
        <td><img class="hinh" src="/assets/images/<?php echo $row['Hinh']; ?>"></td>
        <td>
            <a href="?controller=student&action=detail&id=<?php echo $row['MaSV']; ?>">Chi tiết</a> |
            <a href="?controller=student&action=edit&id=<?php echo $row['MaSV']; ?>">Sửa</a> |
            <a href="?controller=student&action=delete&id=<?php echo $row['MaSV']; ?>" 
               onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
<?php include '../views/shares/footer.php'; ?>