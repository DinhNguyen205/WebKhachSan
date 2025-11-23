<?php


require '../connect/connect.php';
session_start();
header('Content-Type: text/html; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        echo "Vui lòng nhập đầy đủ thông tin.";
        exit;
    }

    try {
        $stmt = $conn->prepare("SELECT * FROM nguoidung WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) { 
            echo "Tên đăng nhập không tồn tại. Vui lòng kiểm tra lại hoặc đăng ký.";
            exit; 
        }

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id']; 
            $_SESSION['username'] = $user['username'];
            $_SESSION['fullname'] = $user['fullname'];
            header("Location: ../../../index.php");
            exit;
        } else {
            echo "Sai tên đăng nhập hoặc mật khẩu.";
        }
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}
?>
