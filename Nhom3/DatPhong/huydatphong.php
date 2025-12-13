<?php 
session_start();
require __DIR__ . "/connect.php";

if(!isset($_SESSION['id'])){
    header("Location:../TrangChu/mainpgae/dangnhap.php");
    exit;
}

$user_id = $_SESSION['id'];
if(!isset($_GET['id'])){
    header("Loacation: lichsu_datphong.php");
    exit;
}

$datphong_id = (int)$_GET['id'];

$stmt = $conn->prepare("Delete from datphong where id = ? and user_id = ? and choxacnhan = 0");
$stmt->bind_param("ii",$datphong_id, $user_id);
$stmt->execute();

if($stmt->affected_rows > 0){
    $_SESSION['thong_bao'] = "Đã hủy đặt phòng";
} else {
    $_SESSION['thong_bao'] = "Không thể hủy đơn này";
}

header("loacation: lichsudatphong.php");
exit;