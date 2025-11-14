<?php
// Nếu muốn hiển thị lỗi dễ debug, bỏ comment 3 dòng dưới:
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$error = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <title>Đăng nhập</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    :root {
      --primary: #3a8dff;
      --primary-hover: #3378d6;
    }
    * { box-sizing: border-box; }
    html, body {
      height: 100%;
      margin: 0;
      font-family: Arial, sans-serif;
    }

    /* --- ẢNH NỀN --- */
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      background: url('https://vinaphuquoc.com/storage/photos/shares/khach-san/best-western-premier-sonasea-phu-quoc/anh-trong-bai-viet/best-western-premier-sonasea-phu-quoc-0.webp') no-repeat center center fixed;
      background-size: cover;
    }

    /* --- HIỆU ỨNG FORM --- */
    @keyframes slideDown {
      0% { transform: translateY(-100px); opacity: 0; }
      100% { transform: translateY(0); opacity: 1; }
    }

    /* --- FORM --- */
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

    h2 {
      color: var(--primary);
      margin: 0 0 20px;
    }

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

    .error {
      color: #d32f2f;
      font-weight: bold;
      margin: 10px 0;
    }

    /* --- LIÊN KẾT --- */
    .links {
      margin-top: 16px;
      font-size: 14px;
      color: #333;
      display: flex;
      justify-content: space-between;
    }

    .links a {
      color: var(--primary);
      text-decoration: none;
      font-weight: bold;
      cursor: pointer;
    }

    .links a:hover { text-decoration: underline; }
  </style>
</head>
<body>

  <form method="post" action="check_login.php" novalidate>
    <h2>Đăng Nhập</h2>

    <input type="text" name="username" placeholder="Tên đăng nhập" required>
    <input type="password" name="password" placeholder="Mật khẩu" required>

    <?php if ($error): ?>
      <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <button type="submit">Đăng nhập</button>

    <div class="links">
      <!-- 🔹 Khi bấm Đăng ký -> chuyển sang trang dangki.php -->
      <a href="dangki.php">Đăng ký</a>
      <a href="forgot_password.php">Quên mật khẩu?</a>
    </div>
  </form>

</body>
</html>
      