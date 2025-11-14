<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Nhấn "Đăng nhập" -> sang login.php
  if (isset($_POST['goto_login'])) {
    header('Location: login.php');
    exit;
  }

  // Xử lý đăng ký tối thiểu (không hiển thị lỗi ra ngoài)
  $username = trim($_POST['username'] ?? '');
  $email    = trim($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';
  $confirm  = $_POST['confirm_password'] ?? '';

  if (
    $username !== '' &&
    preg_match('/^[A-Za-z0-9._%+\-]+@gmail\.com$/', $email) &&
    strlen($password) >= 8 &&
    $password === $confirm
  ) {
    header('Location: login.php');
    exit;
  }
}
?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <title>Đăng ký</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    :root { --primary:#3a8dff; --primary-hover:#3378d6; }
    * { box-sizing: border-box; }
    html, body { height: 100%; margin: 0; font-family: Arial, sans-serif; }

    /* Nền giữ nguyên */
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      background: url('https://vinaphuquoc.com/storage/photos/shares/khach-san/best-western-premier-sonasea-phu-quoc/anh-trong-bai-viet/best-western-premier-sonasea-phu-quoc-0.webp') no-repeat center center fixed;
      background-size: cover;
    }

    /* 🔧 Sửa hiệu ứng: trượt từ TRÊN xuống */
    @keyframes slideDown {
      0%   { transform: translateY(-100px); opacity: 0; }
      100% { transform: translateY(0);      opacity: 1; }
    }

    form {
      background: rgba(255, 255, 255, 0.88);
      padding: 30px 40px;
      border-radius: 15px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.25);
      text-align: center;
      width: 320px;
      backdrop-filter: blur(6px);
      animation: slideDown 0.8s ease forwards;
    }

    h2 { color: var(--primary); margin: 0 0 20px; }

    input {
      width: 100%;
      padding: 10px 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 14px;
      outline: none;
    }
    input:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 3px rgba(58,141,255,0.12);
    }

    button {
      background-color: var(--primary);
      color: #fff;
      border: none;
      padding: 12px 14px;
      font-size: 16px;
      border-radius: 8px;
      cursor: pointer;
      transition: 0.2s ease;
      width: 100%;
      margin-top: 4px;
    }
    button:hover { background-color: var(--primary-hover); }

    /* 🔧 Luôn hiển thị "Đã có tài khoản? Đăng nhập" trên 1 hàng */
    .links {
      margin-top: 16px;
      font-size: 14px;
      color: #333;
      display: inline-flex;          /* xếp cùng hàng */
      align-items: baseline;
      gap: 6px;                      /* khoảng cách nhỏ giữa text và nút */
      white-space: nowrap;           /* chống xuống dòng */
    }
    .links button {
      background: none;
      border: none;
      padding: 0;
      color: var(--primary);
      font-weight: bold;
      cursor: pointer;
      text-decoration: none;
      width: auto;                   /* chỉ vừa chữ */
    }
    .links button:hover { text-decoration: underline; }
  </style>
</head>
<body>
  <form id="registerForm" method="post" action="">
    <h2>Đăng Ký</h2>

    <input type="text" name="username" id="username" placeholder="Tên đăng nhập" required>

    <!-- Email bắt buộc @gmail.com -->
    <input type="email" name="email" id="email" placeholder="Email (@gmail.com)"
           pattern="^[a-zA-Z0-9._%+-]+@gmail\.com$"
           title="Email phải có dạng @gmail.com" required>

    <!-- Mật khẩu ≥ 8 ký tự -->
    <input type="password" name="password" id="password" placeholder="Mật khẩu (≥ 8 ký tự)" minlength="8" required>

    <input type="password" name="confirm_password" id="confirm_password" placeholder="Nhập lại mật khẩu" required>

    <button type="submit" name="register">Đăng ký</button>

    <div class="links">
      <span>Đã có tài khoản?</span>
      <!-- Giữ đúng 1 hàng, bấm là nhảy login.php -->
      <button type="submit" name="goto_login">Đăng nhập</button>
    </div>
  </form>

  <script>
    // Chỉ kiểm tra khớp mật khẩu khi nhấn nút "Đăng ký"
    const form = document.getElementById('registerForm');
    form.addEventListener('submit', function(e) {
      if (e.submitter && e.submitter.name === 'register') {
        const pass = document.getElementById('password').value;
        const confirm = document.getElementById('confirm_password').value;
        if (pass !== confirm) {
          e.preventDefault();
          alert('Mật khẩu xác nhận không khớp!');
        }
      }
    });
  </script>
</body>
</html>
