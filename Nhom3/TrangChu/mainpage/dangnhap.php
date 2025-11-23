<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Đăng Nhập</title>
        <link rel="stylesheet" href="../css/thietkedangnhap.css">
    </head>
<body>
    <div class="container">
        <h2>Đăng Nhập Tài Khoản</h2>
        <form action="../server/ketnoidangnhap.php" method="post" onsubmit="return validateForm()">
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" id="password" placeholder="Mật khẩu" required>
            <button type="submit">Đăng Nhập</button>
            <p style="margin-top: 15px;">
                Chưa có tài khoản? <a href="dangky.php" style="color: #2e91b3; text-decoration: none;">Đăng ký ngay</a>
                    <br><a href="../../../quenmatkhau.php" style="color: #2e91b3; text-decoration: none;"> Quên mật khẩu</a></br>
            </p>
        </form>
    </div>
</body>
</html>