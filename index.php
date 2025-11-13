<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Khách sạn Quy Nhơn">
    <title>Khách Sạn Quy Nhơn</title>
</head>
<body>
    <header>
        <div class = "logo"><strong>Khách Sạn Quy Nhơn</strong></div>
        <nav>
            <a href="">Đặt Phòng</a>
            <a href="#lienhe">Liên hệ hỗ trợ</a>
        </nav>
        <div class="auth-buttons">
      <?php if (isset($_SESSION['fullname']) && !empty($_SESSION['fullname'])): ?> 
        <span style="font-weight: bold; color:#e6b478; padding: 8px; background-color:white; border: 2px solid transparent; border-radius: 8px;">
          <a href="profile_edit.php" style="color: #e6b478; text-decoration: none;">
          <i class="fa-solid fa-user" style="color: #55abf7;"></i>
          <?= htmlspecialchars($_SESSION['fullname']) ?></span> 
       <a href="logout.php" class="dangxuat">Đăng xuất</a>
      <?php else: ?>
        <a href="DangKy.php" class="dangky"> <i class="fa-solid fa-user" style="color: white;"></i> Đăng ký</a>
        <a href="DangNhap.php" class="dangnhap"><i class="fa-solid fa-user" style="color: black;"></i>Đăng nhập</a>
      <?php endif; ?>
    </div>
    </header>

    <div></div>
</body>
</html>