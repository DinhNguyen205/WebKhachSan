<<<<<<< HEAD
<?php

session_start();
header('Content-Type: text/html; charset=utf-8');
if (!isset($_SESSION['username'])) {
    header('Location: dangnhap.php');
    exit();
}

$servername = 'localhost';
$dbname = 'webkhachsan';
$username = 'root';
$password = '';

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$user_id = $_SESSION['id'];
$message = "";

// Xử lý cập nhật thông tin khi submit form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $gioitinh = $_POST['gioitinh'];

    $stmt = $conn->prepare("UPDATE nguoidung SET fullname = ?, dob = ?, gioitinh = ? WHERE id = ?");
    $stmt->bind_param("sssi", $fullname, $dob, $gioitinh, $user_id);
    if ($stmt->execute()) {
        $_SESSION['fullname'] = $fullname;
        $message = "Cập nhật thông tin thành công!";
    } else {
        $message = "Lỗi cập nhật: " . $stmt->error;
    }
    $stmt->close();
}

// xu ly mat khau moi
if(!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
    $current_password = $_POST['current_password'];
    $new_password     = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $conn2 = new mysqli($servername, $username, $password, $dbname); 
    if ($conn2->connect_error) {
        die("Kết nối thất bại: " . $conn2->connect_error);
    }

    $stmt = $conn2->prepare("SELECT password FROM nguoidung WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    if ($row && password_verify($current_password, $row['password'])) {
        if ($new_password == $confirm_password) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $conn2->prepare("UPDATE nguoidung SET password = ? WHERE id = ?");
            $stmt->bind_param("si", $hashed_password, $user_id);
            if($stmt->execute()) {
                $message .= "<br>Đổi mật khẩu thành công!";
            } else {
                $message .= "<br>Lỗi khi đổi mật khẩu: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $message .= "<br>Mật khẩu mới và xác nhận không khớp!";
        }
    } else {
        $message .= "<br>Mật khẩu hiện tại không đúng!";
    }
    $conn2->close();
}

// Lấy thông tin người dùng hiện tại
$sql = "SELECT username, fullname, dob, gioitinh FROM nguoidung WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa thông tin cá nhân</title>
    <link rel="stylesheet" href="../css/thietkechinhsuathongtincanhan.css">
</head>
<body>
    <div class="edit-profile-container">
        <h2>Chỉnh sửa thông tin cá nhân</h2>
        <?php if ($message): ?>
            <p class="message"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>
        <form method="post">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" value="<?= htmlspecialchars($user['username']) ?>" disabled>

            <label for="fullname">Họ tên:</label>
            <input type="text" id="fullname" name="fullname" value="<?= htmlspecialchars($user['fullname']) ?>" required>

            <label for="dob">Ngày sinh:</label>
            <input type="date" id="dob" name="dob" value="<?= htmlspecialchars($user['dob']) ?>">

            <label for="gioitinh">Giới tính:</label>
            <select name="gioitinh" id="gioitinh" required>
                <option value="Nam" <?= $user['gioitinh'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
                <option value="Nữ" <?= $user['gioitinh'] == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
                <option value="Khác" <?= $user['gioitinh'] == 'Khác' ? 'selected' : '' ?>>Khác</option>
            </select>

            <label for="current_password">Mật khẩu hiện tại</label>
            <input type="password" id="current_password" name="current_password">

            <label for="new_password">Mật khẩu mới</label>
            <input type="password" id="new_password" name="new_password">

            <label for="confirm_password">Xác nhận mật khẩu mới:</label>
            <input type="password" id="confirm_password" name="confirm_password">

            <button type="submit">Lưu thay đổi</button>
        </form>
        <div style="display: flex; justify-content: space-between; margin-top: 20px;">
        <a href="../../../index.php"  style="text-decoration: none; padding: 10px 20px; background-color: #f1f1f1; color: #333; border: 1px solid #ccc; border-radius: 6px; font-weight: bold;">
            Quay về trang chủ</a>
        </div>
    </div>
</body>
</html>
=======
<?php

session_start();
header('Content-Type: text/html; charset=utf-8');
if (!isset($_SESSION['username'])) {
    header('Location: dangnhap.php');
    exit();
}

$servername = 'localhost';
$dbname = 'webkhachsan';
$username = 'root';
$password = '';

$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf8mb4");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$user_id = $_SESSION['id'];
$message = "";

// Xử lý cập nhật thông tin khi submit form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $dob = $_POST['dob'];
    $gioitinh = $_POST['gioitinh'];

    $stmt = $conn->prepare("UPDATE nguoidung SET fullname = ?, dob = ?, gioitinh = ? WHERE id = ?");
    $stmt->bind_param("sssi", $fullname, $dob, $gioitinh, $user_id);
    if ($stmt->execute()) {
        $_SESSION['fullname'] = $fullname;
        $message = "Cập nhật thông tin thành công!";
    } else {
        $message = "Lỗi cập nhật: " . $stmt->error;
    }
    $stmt->close();
}

// xu ly mat khau moi
if(!empty($_POST['current_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])) {
    $current_password = $_POST['current_password'];
    $new_password     = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $conn2 = new mysqli($servername, $username, $password, $dbname); 
    if ($conn2->connect_error) {
        die("Kết nối thất bại: " . $conn2->connect_error);
    }

    $stmt = $conn2->prepare("SELECT password FROM nguoidung WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();

    if ($row && password_verify($current_password, $row['password'])) {
        if ($new_password == $confirm_password) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $conn2->prepare("UPDATE nguoidung SET password = ? WHERE id = ?");
            $stmt->bind_param("si", $hashed_password, $user_id);
            if($stmt->execute()) {
                $message .= "<br>Đổi mật khẩu thành công!";
            } else {
                $message .= "<br>Lỗi khi đổi mật khẩu: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $message .= "<br>Mật khẩu mới và xác nhận không khớp!";
        }
    } else {
        $message .= "<br>Mật khẩu hiện tại không đúng!";
    }
    $conn2->close();
}

// Lấy thông tin người dùng hiện tại
$sql = "SELECT username, fullname, dob, gioitinh FROM nguoidung WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chỉnh sửa thông tin cá nhân</title>
    <link rel="stylesheet" href="../css/thietkechinhsuathongtincanhan.css">
</head>
<body>
    <div class="edit-profile-container">
        <h2>Chỉnh sửa thông tin cá nhân</h2>
        <?php if ($message): ?>
            <p class="message"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>
        <form method="post">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" value="<?= htmlspecialchars($user['username']) ?>" disabled>

            <label for="fullname">Họ tên:</label>
            <input type="text" id="fullname" name="fullname" value="<?= htmlspecialchars($user['fullname']) ?>" required>

            <label for="dob">Ngày sinh:</label>
            <input type="date" id="dob" name="dob" value="<?= htmlspecialchars($user['dob']) ?>">

            <label for="gioitinh">Giới tính:</label>
            <select name="gioitinh" id="gioitinh" required>
                <option value="Nam" <?= $user['gioitinh'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
                <option value="Nữ" <?= $user['gioitinh'] == 'Nữ' ? 'selected' : '' ?>>Nữ</option>
                <option value="Khác" <?= $user['gioitinh'] == 'Khác' ? 'selected' : '' ?>>Khác</option>
            </select>

            <label for="current_password">Mật khẩu hiện tại</label>
            <input type="password" id="current_password" name="current_password">

            <label for="new_password">Mật khẩu mới</label>
            <input type="password" id="new_password" name="new_password">

            <label for="confirm_password">Xác nhận mật khẩu mới:</label>
            <input type="password" id="confirm_password" name="confirm_password">

            <button type="submit">Lưu thay đổi</button>
        </form>
        <div style="display: flex; justify-content: space-between; margin-top: 20px;">
        <a href="../../../index.php"  style="text-decoration: none; padding: 10px 20px; background-color: #f1f1f1; color: #333; border: 1px solid #ccc; border-radius: 6px; font-weight: bold;">
            Quay về trang chủ</a>
        </div>
    </div>
</body>
</html>
>>>>>>> phong
