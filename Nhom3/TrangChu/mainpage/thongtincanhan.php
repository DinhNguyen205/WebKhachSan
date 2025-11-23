<<<<<<< HEAD
<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
if (!isset($_SESSION['username'])) {
    header("Location: dangky.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Cá Nhân</title>
    <link rel="stylesheet" href="../css/thietkethongtincanhan.css">
</head>
<body>
    <div class="container">
        <h2>Thông Tin Cá Nhân</h2>
        <form action="../server/luuthongtincanhan.php" method="post" onsubmit="return validateDOB()">
            <input type="text" name="fullname" placeholder="Họ và tên" required>
            <input type="date" name="dob" required>
            <div class="gender-group">
                <label><input type="radio" name="gioitinh" value="nam" checked> Nam</label>
                <label><input type="radio" name="gioitinh" value="nu"> Nữ</label>
            </div>
            <button type="submit">Đăng ký</button>
        </form>
    </div>

<script>
    function validateDOB() {
    var dobInput = document.querySelector('input[name="dob"]').value;  
    if (!dobInput) return true; 

    var dobDate = new Date(dobInput);
    var today   = new Date();

    if(dobDate > today)
    {
        alert("Ngày sinh không được lớn hơn ngày hiện tại");
        return false;
    }

    if (dobDate.getFullYear() < 1800) 
    {
        alert("Năm sinh phải từ 1800 trở đi!");
        return false;
    }

    return true; 
}

</script>

</body>
=======
<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
if (!isset($_SESSION['username'])) {
    header("Location: dangky.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông Tin Cá Nhân</title>
    <link rel="stylesheet" href="../css/thietkethongtincanhan.css">
</head>
<body>
    <div class="container">
        <h2>Thông Tin Cá Nhân</h2>
        <form action="../server/luuthongtincanhan.php" method="post">
            <input type="text" name="fullname" placeholder="Họ và tên" required>
            <input type="date" name="dob" required>
            <div class="gender-group">
                <label><input type="radio" name="gioitinh" value="nam" checked> Nam</label>
                <label><input type="radio" name="gioitinh" value="nu"> Nữ</label>
            </div>
            <button type="submit">Đăng ký</button>
        </form>
    </div>
</body>
>>>>>>> phong
</html>