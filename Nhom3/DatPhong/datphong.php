<?php
require __DIR__ . '/conect/connect.php';

$errors = [];
$thong_bao = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ten         = trim($_POST['ten'] ?? '');
    $sodienthoai = trim($_POST['sodienthoai'] ?? '');
    $ngaydat     = $_POST['ngaydat'] ?? '';
    $sophong     = (int)($_POST['sophong'] ?? 0);
    $songuoi     = (int)($_POST['songuoi'] ?? 0);
    $dichvu_arr  = $_POST['dichvu'] ?? [];

    $dichvu = implode(", ", $dichvu_arr);

    if ($ten === '')         $errors[] = "Vui lòng nhập họ tên người đặt.";
    if ($sodienthoai === '') $errors[] = "Vui lòng nhập số điện thoại.";
    if ($ngaydat === '')     $errors[] = "Vui lòng chọn ngày đặt.";
    if ($sophong <= 0)       $errors[] = "Số phòng không hợp lệ.";
    if ($songuoi <= 0)       $errors[] = "Số người không hợp lệ.";

    if (empty($errors)) {
        $sql = "INSERT INTO datphong (ten, sodienthoai, ngaydat, sophong, songuoi, dichvu)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("sssiss", $ten, $sodienthoai, $ngaydat, $sophong, $songuoi, $dichvu);
            if ($stmt->execute()) {
                echo "<script>
                        alert('Đặt phòng thành công!');
                        window.location.href='../../index.php';
                      </script>";
                exit;
            } else {
                $errors[] = "Lỗi khi lưu dữ liệu: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $errors[] = "Không chuẩn bị được câu lệnh SQL: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt Phòng</title>
    <link rel="stylesheet" href="datphong.css">
    <script>
      window.addEventListener("DOMContentLoaded", function () {
        document.body.classList.add("page-loaded");
      });
    </script>
</head>

<body>
<div class="container">

    <h2>ĐẶT PHÒNG KHÁCH SẠN</h2>

    <?php if ($thong_bao): ?>
        <div class="alert-success"><?= $thong_bao ?></div>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
        <div class="alert-error">
            <?php foreach ($errors as $e): ?>
                <div>• <?= htmlspecialchars($e) ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST">

        <div class="form-row">
            <div class="form-group">
                <label>Họ tên người đặt</label>
                <input type="text" name="ten" required>
            </div>

            <div class="form-group">
                <label>Số điện thoại</label>
                <input type="text" name="sodienthoai" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label>Ngày đặt</label>
                <input type="date" name="ngaydat" required>
            </div>

            <div class="form-group">
                <label>Số phòng</label>
                <input type="number" name="sophong" min="1" required>
            </div>
        </div>

        <div class="form-group">
            <label>Số người</label>
            <input type="number" name="songuoi" min="1" required>
        </div>

        <div class="form-group">
            <label>Dịch vụ đi kèm:</label>
            <div class="services-box">
                <label><input type="checkbox" name="dichvu[]" value="Ăn sáng"> Ăn sáng</label>
                <label><input type="checkbox" name="dichvu[]" value="Đưa đón sân bay"> Đưa đón sân bay</label>
                <label><input type="checkbox" name="dichvu[]" value="Spa"> Spa</label>
                <label><input type="checkbox" name="dichvu[]" value="Giặt ủi"> Giặt ủi</label>
            </div>
        </div>

        <button type="submit" class="btn">Đặt phòng</button>

    </form>
</div>
</body>
</html>
