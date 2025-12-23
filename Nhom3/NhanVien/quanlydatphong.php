<?php
// ================== KẾT NỐI DATABASE ==================
$conn = new mysqli("localhost", "root", "", "webkhachsan");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// ================== HÀM KIỂM TRA PHÒNG TRỐNG ==================
function phongTrong($conn, $phong, $ngayNhan, $ngayTra, $id = null) {
    $sql = "SELECT * FROM datphong WHERE so_phong = '$phong'
            AND NOT (ngay_tra < '$ngayNhan' OR ngay_nhan > '$ngayTra')";
    if ($id) $sql .= " AND id != $id";
    $rs = $conn->query($sql);
    return $rs->num_rows == 0;
}

// ================== THÊM ĐẶT PHÒNG ==================
$thongbao = "";
if (isset($_POST['add'])) {
    $ten = $_POST['ten'];
    $sdt = $_POST['sdt'];
    $phong = $_POST['phong'];
    $ngayNhan = $_POST['ngayNhan'];
    $ngayTra = $_POST['ngayTra'];

    if ($ngayTra < $ngayNhan) {
        $thongbao = "❌ Ngày trả phải sau hoặc bằng ngày nhận";
    } elseif (!phongTrong($conn, $phong, $ngayNhan, $ngayTra)) {
        $thongbao = "❌ Phòng đã được đặt trong khoảng thời gian này";
    } else {
        $sql = "INSERT INTO datphong(ten_kh, sdt, so_phong, ngay_nhan, ngay_tra)
                VALUES('$ten','$sdt','$phong','$ngayNhan','$ngayTra')";
        $conn->query($sql);
        $thongbao = "✅ Đặt phòng thành công";
    }
}

// ================== LẤY DỮ LIỆU CẦN SỬA ==================
$editRow = null;
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $editRow = $conn->query("SELECT * FROM datphong WHERE id=$id")->fetch_assoc();
}

// ================== CẬP NHẬT ĐẶT PHÒNG ==================
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $ten = $_POST['ten'];
    $sdt = $_POST['sdt'];
    $phong = $_POST['phong'];
    $ngayNhan = $_POST['ngayNhan'];
    $ngayTra = $_POST['ngayTra'];

    if ($ngayTra < $ngayNhan) {
        $thongbao = "❌ Ngày trả không hợp lệ";
    } elseif (!phongTrong($conn, $phong, $ngayNhan, $ngayTra, $id)) {
        $thongbao = "❌ Phòng bị trùng lịch";
    } else {
        $sql = "UPDATE datphong SET ten_kh='$ten', sdt='$sdt', so_phong='$phong',
                ngay_nhan='$ngayNhan', ngay_tra='$ngayTra' WHERE id=$id";
        $conn->query($sql);
        header("Location: datphong.php");
    }
}

// ================== XÓA ĐẶT PHÒNG ==================
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM datphong WHERE id=$id");
}

// ================== TÌM KIẾM ==================
$keyword = isset($_GET['search']) ? $_GET['search'] : "";
$result = $conn->query("SELECT * FROM datphong WHERE ten_kh LIKE '%$keyword%' OR sdt LIKE '%$keyword%'");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý đặt phòng</title>
</head>
<body>
<h2>QUẢN LÝ ĐẶT PHÒNG KHÁCH SẠN</h2>
<p style="color:red"><?= $thongbao ?></p>

<!-- FORM THÊM / SỬA -->
<form method="post">
<input type="hidden" name="id" value="<?= $editRow['id'] ?? '' ?>">
    <input type="text" name="ten" placeholder="Tên khách hàng" required value="<?= $editRow['ten_kh'] ?? '' ?>">
    <input type="text" name="sdt" placeholder="Số điện thoại" required value="<?= $editRow['sdt'] ?? '' ?>">
    <input type="number" name="phong" placeholder="Số phòng" required value="<?= $editRow['so_phong'] ?? '' ?>">
    <input type="date" name="ngayNhan" required value="<?= $editRow['ngay_nhan'] ?? '' ?>">
    <input type="date" name="ngayTra" required value="<?= $editRow['ngay_tra'] ?? '' ?>">
    <?php if ($editRow) { ?>
        <button name="update">Cập nhật</button>
        <a href="datphong.php">Hủy</a>
    <?php } else { ?>
        <button name="add">Đặt phòng</button>
    <?php } ?>
</form>

<hr>

<!-- TÌM KIẾM -->
<form method="get">
    <input type="text" name="search" placeholder="Tìm theo tên / SĐT" value="<?= $keyword ?>">
    <button>Tìm</button>
</form>

<!-- DANH SÁCH -->
<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Tên KH</th>
        <th>SĐT</th>
        <th>Phòng</th>
        <th>Ngày nhận</th>
        <th>Ngày trả</th>
        <th>Hành động</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['ten_kh'] ?></td>
        <td><?= $row['sdt'] ?></td>
        <td><?= $row['so_phong'] ?></td>
        <td><?= $row['ngay_nhan'] ?></td>
        <td><?= $row['ngay_tra'] ?></td>
        <td>
            <a href="?edit=<?= $row['id'] ?>">Sửa</a> |
            <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Xóa đặt phòng?')">Xóa</a>
        </td>
    </tr>
    <?php } ?>
</table>
</body>
</html>
