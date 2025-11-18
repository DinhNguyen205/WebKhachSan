<?php
  session_start();
  header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Khách sạn Quy Nhơn">
    <title>Khách Sạn Quy Nhơn</title>
    <link rel="stylesheet" href="WebKhachSan/Nhom3/TrangChu/css/thietketrangchu.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        <a href="WebKhachSan/Nhom3/TrangChu/dangky.php" class="dangky"> <i class="fa-solid fa-user" style="color: white;"></i> Đăng ký</a>
        <a href="DangNhap.php" class="dangnhap"><i class="fa-solid fa-user" style="color: black;"></i>Đăng nhập</a>
      <?php endif; ?>
    </div>
    </header>
  
    <div class="container">
      <div class="content">
      <h1>Chào mừng đến với trang khách sạn Quy Nhơn năm 2025-2026</h1>
        <div style="text-align: center;">
          <img class="anhdautien" src="https://cdn.xanhsm.com/2024/12/fc11ee11-quy-nhon-ve-dem-thumbnail.jpg" alt="Quy Nhơn biển đẹp">
        </div>
      </div>
    </div>

<footer id="lienhe">
  <p>Liên hệ: Nhom3@gmail.com | SĐT: 0812301905</p>
  <p>&copy; 2025 Khách Sạn Quy Nhơn. Thiết kế bởi Nhóm 3.</p>
</footer>

</body>
</html>