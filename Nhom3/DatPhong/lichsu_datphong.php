<?php
session_start();
require __DIR__ . '/connect.php';

if (!isset($_SESSION['id'])) {
    header("Location: ../TrangChu/mainpage/dangnhap.php");
    exit;
}

$user_id = $_SESSION['id'];

$stmt = $conn->prepare("
    SELECT *
    FROM datphong
    WHERE user_id = ?
    ORDER BY id DESC
");

$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Lịch sử đặt phòng</title>
    <link rel="stylesheet" href="datphong.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            font-size: 14px;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 6px 8px;
            text-align: center;
        }

        th {
            background: #e8ecff;
        }

        .status-0 {
            color: #e67e22;
            font-weight: 600;
        }

        .status-1 {
            color: #2e7d32;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="page-wrapper">
        <header class="header">
            <div class="hotel-name">Khách Sạn Quy Nhơn</div>
            <a href="timphong.php" class="btn-history">Đặt phòng mới</a>
            <a href="../../index.php" class="btn-index">Về Trang Chủ</a>
        </header>

        <div class="content single-column">
            <div class="history-box">
                <h2>LỊCH SỬ ĐẶT PHÒNG</h2>

                <?php if (!empty($_SESSION['thong_bao'])): ?>
                    <div style="
                        margin: 12px 0;
                        padding: 10px 14px;
                        background: #d4edda;
                        color: #155724;
                        border-left: 4px solid #28a745;
                        border-radius: 4px;
                        font-weight: 600;
                    ">
                        <?= htmlspecialchars($_SESSION['thong_bao']) ?>
                    </div>
                    <?php unset($_SESSION['thong_bao']); ?>
                <?php endif; ?>


                <?php if ($result && $result->num_rows > 0): ?>
                    <table>
                        <tr>
                            <th>ID</th>
                            <th>Tên</th>
                            <th>SĐT</th>
                            <th>Ngày nhận phòng</th>
                            <th>Ngày trả phòng</th>
                            <th>Số phòng</th>
                            <th>Số người</th>
                            <th>Dịch vụ</th>
                            <th>Trạng thái</th>
                            <th>Thời gian đặt</th>
                        </tr>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?= $row['id'] ?></td>
                                <td><?= htmlspecialchars($row['ten']) ?></td>
                                <td><?= htmlspecialchars($row['sodienthoai']) ?></td>
                                <td><?= htmlspecialchars($row['ngaydat']) ?></td>
                                <td><?= htmlspecialchars($row['ngaytra']) ?></td>
                                <td><?= htmlspecialchars($row['sophong']) ?></td>
                                <td><?= htmlspecialchars($row['songuoi']) ?></td>
                                <td><?= htmlspecialchars($row['dichvu']) ?></td>
                                <td>
                                    <?php if ($row['choxacnhan'] == 0): ?>
                                        <span class="status-0">Chờ xác nhận</span>
                                    <?php else: ?>
                                        <span class="status-1">Đã xác nhận</span>
                                    <?php endif; ?>
                                </td>
                                <td><?= htmlspecialchars($row['thoigian_dat']) ?></td>
                                <td>
                                    <?php if ($row['choxacnhan'] == 0): ?>
                                        <a href="huydatphong.php?id=<?= $row['id'] ?>"
                                            onclick="return confirm('Bạn có chắc muốn hủy đặt phòng ?');"
                                            style="color:red; font-weight:600;">
                                            Hủy
                                        </a>
                                    <?php else: ?>
                                        <span style="color:#999;">Không thể hủy</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                <?php else: ?>
                    <p>Chưa có đơn đặt phòng nào.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

</body>

</html>