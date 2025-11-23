<?php
session_start();
require '../connect/connect.php';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $email    = trim($_POST['email'] ?? '');

        if ($username === '' || $password === '' || $email ==='') {
        echo "Vui lòng nhập đầy đủ thông tin.";
        exit;
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        try {
            $stmt = $conn->prepare("SELECT * FROM nguoidung WHERE username = ?");
            $stmt->execute([$username]);

            if ($stmt->rowCount() > 0) {
            echo "Tên người dùng đã tồn tại.";
            exit;
            } else {
            $stmt = $conn->prepare("INSERT INTO nguoidung (username, password, email) VALUES (?, ?,?)");
            $stmt->execute([$username, $hashedPassword,$email]);

            $_SESSION['username'] = $username;
            $_SESSION['fullname'] = '';
            header("Location: ../mainpage/thongtincanhan.php");
            exit;
            }
        } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
        }
}
?>