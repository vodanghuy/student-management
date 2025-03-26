<?php include '../views/shares/header.php'; ?>
<h2>Chi tiết sinh viên</h2>
<p><strong>Mã SV:</strong> <?php echo $student['MaSV']; ?></p>
<p><strong>Họ tên:</strong> <?php echo $student['HoTen']; ?></p>
<p><strong>Giới tính:</strong> <?php echo $student['GioiTinh']; ?></p>
<p><strong>Ngày sinh:</strong> <?php echo $student['NgaySinh']; ?></p>
<p><strong>Hình:</strong> <img class="hinh" src="/assets/images/<?php echo $student['Hinh']; ?>"></p>
<p><strong>Ngành học:</strong> <?php echo $student['TenNganh']; ?></p>
<a href="?controller=student&action=index">Quay lại</a>
<?php include '../views/shares/footer.php'; ?>