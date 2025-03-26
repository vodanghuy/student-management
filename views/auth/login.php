<?php include '../views/shares/header.php'; ?>
<h2>Đăng nhập</h2>
<?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
<form method="POST">
    <div>
        <label>Mã sinh viên:</label>
        <input type="text" name="MaSV" required>
    </div>
    <button type="submit">Đăng nhập</button>
</form>
<?php include '../views/shares/footer.php'; ?>