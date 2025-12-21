<?php
require '../connect/connect.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($username === '' || $password === '') {
        echo "Vui lòng nhập đầy đủ thông tin.";
        exit;
    }

    try {
        $sql = "
            SELECT 
                nd.id,
                nd.username,
                nd.password,
                nd.role,
                nd.employee_id,
                nv.name AS employee_name,
                nv.position AS employee_position
            FROM nguoidung nd
            LEFT JOIN employees nv
                ON nd.employee_id = nv.employee_id
            WHERE nd.username = ?
            LIMIT 1
        ";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) { 
            echo "Tên đăng nhập không tồn tại. Vui lòng kiểm tra lại hoặc đăng ký.";
            exit; 
        }

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id']; 
            $_SESSION['username'] = $user['username'];
            $_SESSION['role']     = $user['role'];
            $_SESSION['employee_id']     = $user['employee_id'];

            $_SESSION['employee_name'] = $user['employee_name'] ?? '';
            $_SESSION['employee_position'] = $user['employee_position'] ?? '';
            if ($user['role'] === 'nhanvien') {
                // Nhân viên
                header("Location: ../../NhanVien/trangchunhanvien.php");
                exit;
            } else {
                // Khách hàng (role = khachhang)
                header("Location: ../../../index.php");
                exit;
            }
        } else {
            echo "Sai tên đăng nhập hoặc sai mật khẩu.";
        }
    } catch (PDOException $e) {
        echo "Lỗi: " . $e->getMessage();
    }
}
?>
