<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: /webkhachsanhau/Nhom3/TrangChu/mainpage/dangnhap.php");
    exit;
}
header('Content-Type: text/html; charset=utf-8');

$employeeName = $_SESSION['employee_name'] ?? '';
$employeePosition = $_SESSION['employee_position'] ?? '';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Nhân Viên</title>
    <link rel="stylesheet" href="thietketrangchunhanvien.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>

<header>
    <div class="logo">Khách Sạn Quy Nhơn</div>

    <form action="logout.php" method="post" class="logout-form">
        <button type="submit" class="logout-btn">
        <a href="/webkhachsanhau/Nhom3/TrangChu/mainpage/logout.php" class="logout-btn">
            <i class="fas fa-sign-out-alt"></i> Đăng xuất
        </a>
        </button>
    </form>
</header>


<div class="container">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="profile">
            <img src="__" class="avatar">
            <h3><?= htmlspecialchars($employeeName) ?></h3>
            <p><?= htmlspecialchars($employeePosition) ?></p>
        </div>

        <nav class="menu">
            <a href="quanlydatphong.php">📘 Quản lý đặt phòng</a>
            <a href="quanlyphong.php">🏨 Quản lý phòng</a>
            <a href="quanlykhachhang.php">👥 Quản lý khách hàng</a>
            <a href="thongtinnhanvien.php">👤 Thông tin nhân viên</a>
        </nav>
    </aside>

    <!-- MAIN CONTENT -->
    <main class="content">
        <h1>
            Chào mừng bạn trở lại,
            <?= htmlspecialchars($employeeName) ?>
        </h1>

        <p class="subtitle">Dưới đây là thông tin tổng quan trong ngày làm việc.</p>

        <div class="grid">

                <!-- Tình trạng phòng -->
                <div class="card">
                    <h2>🏨 Tình trạng phòng</h2>

                </div>

                <!-- Đặt phòng hôm nay -->
                <div class="card">
                    <h2>📝 Đặt phòng</h2>

                </div>

                <!-- Thông tin nhân viên -->
                <div class="card">
                    <h2>👤 Thông tin nhân viên</h2>
 
                </div>
        </div>
    </main>

</div>

</body>
</html>
