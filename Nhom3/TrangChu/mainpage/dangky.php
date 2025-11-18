<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Đăng Ký</title>
        <link rel="stylesheet" href="../css/thietkedangky.css">
    </head>
<body>
    <div class="container">
        <h2>Đăng Ký Tài Khoản</h2>
        <form action="../server/ketnoidangky.php" method="post" onsubmit="return validateForm()">
            <input type="text" name="username" id="username" placeholder="Tên đăng nhập" required>
            <input type="password" name="password" id="password" placeholder="Mật khẩu" required>
            <input type="password" name="repass" id="repass" placeholder="Nhập lại mật khẩu" required>
            <input type="email" name="email" id="email" placeholder="Nhập email của bạn" required>
            <button type="submit">Đăng ký</button>
        </form>
    </div>
    

<script>
    function validateForm() {
        var username = document.getElementById('username').value;
        var pass = document.getElementById('password').value;
        var repass = document.getElementById('repass').value;
        var email = document.getElementById('email').value;

        var usernameRegex = /^[a-zA-Z0-9]+$/;
        if(!usernameRegex.test(username)){
            alert("Tên Đăng Nhập chỉ được nhập chữ không dấu và số, không có khoảng cách" );
            return false;
        }

        if (pass.length < 8) {
            alert("Mật khẩu phải có ít nhất 8 ký tự!");
            return false;
        }

        if (pass !== repass) {
            alert("Mật khẩu nhập lại không đúng!");
            return false; 
        }

        var emailRegex = /^[^\s@]+@gmail\.com$/; 
        if (!emailRegex.test(email)) {
            alert("Email không đúng định dạng! Email phải có đuôi @gmail.com."); 
            return false;
        }
        
        return true;
    }
</script>

</body>
</html>
