<?php
// ================= KẾT NỐI DATABASE =================
$conn = new mysqli("localhost", "root", "", "webkhachsan");
if ($conn->connect_error) die("Lỗi kết nối CSDL");

// ================= XÁC NHẬN =================
if (isset($_GET['xacnhan'])) {
    $id = (int)$_GET['xacnhan'];
    $conn->query("UPDATE datphong SET choxacnhan = 1 WHERE id = $id");
    header("Location: index.php?page=datphong");
    exit;
}

// ================= XÓA =================
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conn->query("DELETE FROM datphong WHERE id = $id");
    header("Location: index.php?page=datphong");
    exit;
}

// ================= THÊM ĐẶT PHÒNG =================
if (isset($_POST['add'])) {
    $ten     = $_POST['ten'];
    $sdt     = $_POST['sdt'];
    $ngay    = $_POST['ngaydat'];
    $phong   = $_POST['sophong'];
    $songuoi = $_POST['songuoi'];
    $dichvu  = $_POST['dichvu'];
    $user    = 1;

    $conn->query("
        INSERT INTO datphong
        (ten, sodienthoai, ngaydat, sophong, songuoi, dichvu, choxacnhan, user_id)
        VALUES
        ('$ten','$sdt','$ngay','$phong','$songuoi','$dichvu',0,'$user')
    ");

    header("Location: index.php?page=datphong");
    exit;
}

// ================= LẤY DANH SÁCH =================
$rs = $conn->query("SELECT * FROM datphong ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="UTF-8">
<title>Quản lý đặt phòng</title>

<style>
body { font-family: Arial; }
table { width: 100%; border-collapse: collapse; margin-top: 20px; }
th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
th { background: #f2f2f2; }
button { padding: 5px 10px; cursor: pointer; }
</style>
</head>

<body>

<h2>QUẢN LÝ ĐẶT PHÒNG KHÁCH SẠN</h2>

<!-- ================= FORM THÊM ================= -->
<form method="post">
    <input type="text" name="ten" placeholder="Tên khách" required>
    <input type="text" name="sdt" placeholder="SĐT" required>
    <input type="date" name="ngaydat" required>
    <input type="text" name="sophong" placeholder="Số phòng" required>
    <input type="number" name="songuoi" placeholder="Số người" required>
    <input type="text" name="dichvu" placeholder="Dịch vụ">
    <button type="submit" name="add">➕ Thêm đặt phòng</button>
</form>

<!-- ================= DANH SÁCH ================= -->
<table>
<tr>
    <th>ID</th>
    <th>Khách</th>
    <th>Số Điện Thoại</th>
    <th>Ngày nhận</th>
    <th>Phòng</th>
    <th>Số người</th>
    <th>Dịch vụ</th>
    <th>Trạng thái</th>
    <th>Thao tác</th>
</tr>

<?php while ($r = $rs->fetch_assoc()) { ?>
<tr>
    <td><?= $r['id'] ?></td>
    <td><?= $r['ten'] ?></td>
    <td><?= $r['sodienthoai'] ?></td>
    <td><?= $r['ngaydat'] ?></td>
    <td><?= $r['sophong'] ?></td>
    <td><?= $r['songuoi'] ?></td>
    <td><?= $r['dichvu'] ?></td>
    <td>
        <?php if ($r['choxacnhan'] == 0) { ?>
            <span style="color:orange">Chờ xác nhận</span>
        <?php } else { ?>
            <span style="color:green">Đã xác nhận</span>
        <?php } ?>
    </td>

    <!-- ================= THAO TÁC (ĐÃ SỬA) ================= -->
    <td>
        <?php if ($r['choxacnhan'] == 0) { ?>
            <form method="get" style="display:inline;">
                <input type="hidden" name="page" value="datphong">
                <input type="hidden" name="xacnhan" value="<?= $r['id'] ?>">
                <button type="submit">✔ Xác nhận</button>
            </form>
        <?php } ?>

        <form method="get" style="display:inline;"
              onsubmit="return confirm('Xóa đặt phòng này?')">
            <input type="hidden" name="page" value="datphong">
            <input type="hidden" name="delete" value="<?= $r['id'] ?>">
            <button type="submit">❌ Xóa</button>
        </form>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>


