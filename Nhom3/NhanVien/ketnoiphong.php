<?php 
session_start();
require __DIR__ . "/connect.php";

if(!isset($_SESSION['id'])){
    header("Location:../TrangChu/mainpgae/dangnhap.php");
    exit;
}

/* ================= THÊM PHÒNG ================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_new_room') {
    header('Content-Type: application/json');

    $so_phong   = $_POST['so_phong'] ?? null;
    $so_nguoi   = $_POST['so_nguoi'] ?? null;
    $gia        = filter_var($_POST['gia'], FILTER_SANITIZE_NUMBER_INT) ?? null;
    $dich_vu    = $_POST['dich_vu'] ?? null;
    $thiet_bi   = $_POST['thiet_bi'] ?? null;
    $trang_thai = "có sẵn";

    if (empty($so_phong) || empty($so_nguoi) || empty($gia)) {
        echo json_encode(['success' => false, 'message' => "Vui lòng nhập đầy đủ thông tin."]);
        exit;
    }

    try {
        $stmt_check = $pdo->prepare("SELECT so_phong FROM phong WHERE so_phong = ?");
        $stmt_check->execute([$so_phong]);
        if ($stmt_check->fetch()) {
             echo json_encode(['success' => false, 'message' => "Lỗi: Số phòng $so_phong đã tồn tại."]);
             exit;
        }

        $stmt = $pdo->prepare("
            INSERT INTO phong (so_phong, so_nguoi, gia, dich_vu, thiet_bi, trang_thai) 
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([$so_phong, $so_nguoi, $gia, $dich_vu, $thiet_bi, $trang_thai]);

        echo json_encode(['success' => true, 'message' => "Đã thêm phòng $so_phong thành công."]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => "Lỗi CSDL: " . $e->getMessage()]);
    }
    exit; 
}


/* ================= CẬP NHẬT TRẠNG THÁI ================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_room_status') {
    header('Content-Type: application/json');

    $so_phong = $_POST['so_phong'] ?? null;
    $trang_thai = $_POST['trang_thai'] ?? null;

    try {
        $stmt = $pdo->prepare("UPDATE phong SET trang_thai = ? WHERE so_phong = ?");
        $stmt->execute([$trang_thai, $so_phong]);

        echo json_encode(['success' => true, 'message' => "Đã cập nhật trạng thái phòng $so_phong thành $trang_thai"]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => "Lỗi CSDL khi cập nhật: " . $e->getMessage()]);
    }
    exit; 
}


/* ================= LẤY DANH SÁCH PHÒNG ================= */
try {
    $stmt = $pdo->query("
        SELECT so_phong, so_nguoi, gia, dich_vu, thiet_bi, trang_thai 
        FROM phong 
        ORDER BY so_phong ASC
    ");
    $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    $rooms = [];
}
?>
