<?php
session_start();
if (
    !isset($_SESSION['id']) ||
    !isset($_SESSION['role']) ||
    $_SESSION['role'] !== 'nhanvien'
) {
    header("Location: /webkhachsanhau/Nhom3/TrangChu/mainpage/dangnhap.php");
    exit;
}


require __DIR__ . "/connect.php";


// =================================================================
// 2. LOGIC XỬ LÝ AJAX (CẬP NHẬT THÔNG TIN NHÂN VIÊN)
// Đã thêm kiểm tra rowsAffected để tìm lỗi ID không khớp
// =================================================================

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update_employee') {
    header('Content-Type: application/json');

    $employeeId = $_SESSION['employee_id'];
    $name = filter_input(INPUT_POST, 'name', FILTER_DEFAULT);
    $position = filter_input(INPUT_POST, 'position', FILTER_DEFAULT);
    $phone = filter_input(INPUT_POST, 'phone', FILTER_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) ?: filter_input(INPUT_POST, 'email', FILTER_DEFAULT);
    
    $salary_input = filter_input(INPUT_POST, 'salary', FILTER_DEFAULT); 
    $salary = intval(preg_replace('/[^0-9]/', '', $salary_input)); 

    if (empty($employeeId) || empty($name) || empty($position)) {
        echo json_encode(['success' => false, 'message' => 'Lỗi: Vui lòng điền đầy đủ Mã NV, Tên và Chức vụ.']);
        exit;
    }

    try {
        $sql = "UPDATE employees SET name = ?, position = ?, phone = ?, email = ?, salary = ? WHERE employee_id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $position, $phone, $email, $salary, $employeeId]);

        // *************** KIỂM TRA SỐ LƯỢNG HÀNG BỊ ẢNH HƯỞNG ***************
        $rowsAffected = $stmt->rowCount(); 

        if ($rowsAffected > 0) {
            // Cập nhật thành công và có thay đổi
            $_SESSION['employee_name'] = $name;
            $_SESSION['employee_position'] = $position;
            
            echo json_encode([
                'success' => true, 
                'message' => "Cập nhật thành công! ($rowsAffected hàng bị ảnh hưởng).",
                'data' => [
                    'name' => $name,
                    'position' => $position,
                    'phone' => $phone,
                    'email' => $email,
                    'salary' => $salary
                ]
            ]);
        } else {
            // Không có lỗi SQL, nhưng không có bản ghi nào khớp với employee_id
            echo json_encode([
                'success' => false, 
                'message' => "Cảnh báo: Không tìm thấy nhân viên có Mã ID ($employeeId) hoặc dữ liệu không có gì thay đổi.",
            ]);
        }
        // *******************************************************************

    } catch (\PDOException $e) {
        // Phản hồi lỗi CSDL chi tiết (ví dụ: lỗi UNIQUE KEY, khóa ngoại)
        echo json_encode(['success' => false, 'message' => "Lỗi CSDL khi cập nhật: " . $e->getMessage() . " (Code: " . $e->getCode() . ")"]);
    }
    exit; 
}


// =================================================================
// 3. LOGIC LẤY THÔNG TIN NHÂN VIÊN (Hiển thị form)
// =================================================================

$employeeId = $_SESSION['employee_id'] ?? null;
if (!$employeeId) {
    die("Lỗi: Không xác định được nhân viên đang đăng nhập.");
}
$employeeInfo = null;
$error = null;

try {
    $stmt = $pdo->prepare("SELECT employee_id, name, position, phone, email, salary FROM employees WHERE employee_id = ?");
    $stmt->execute([$employeeId]);
    $employeeInfo = $stmt->fetch();
    
    if (!$employeeInfo) {
        $error = "Không tìm thấy thông tin nhân viên có Mã ID: " . htmlspecialchars($employeeId);
    }
    
} catch (\PDOException $e) {
    $error = "Lỗi CSDL khi truy vấn thông tin: " . $e->getMessage();
}

if ($employeeInfo) {
    $_SESSION['employee_name'] = $employeeInfo['name'];
    $_SESSION['employee_position'] = $employeeInfo['position'];
    $employeeInfo['salary_formatted'] = number_format($employeeInfo['salary'] ?? 0, 0, ',', '.') . ' VNĐ';
    $employeeInfo['name'] = $employeeInfo['name'] ?? '';
    $employeeInfo['position'] = $employeeInfo['position'] ?? '';
    $employeeInfo['phone'] = $employeeInfo['phone'] ?? '';
    $employeeInfo['email'] = $employeeInfo['email'] ?? '';
    $employeeInfo['salary'] = $employeeInfo['salary'] ?? 0;
}

?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Phòng - Khách Sạn Quy Nhơn</title>
    <link rel="stylesheet" href="thietkethongtinnhanvien.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

<header>
    <div class="logo">Khách Sạn Quy Nhơn</div>

    <form action="logout.php" method="post" class="logout-form">
        <button type="submit" class="logout-btn">
            <i class="fas fa-sign-out-alt"></i> Đăng xuất
        </button>
    </form>
</header>


<div class="container">
    <aside class="sidebar">
        <div class="profile">
            <img src="avatar-default.png" class="avatar">
    <h3>
        <?php echo htmlspecialchars($_SESSION['employee_name'] ?? ''); ?>
    </h3>

    <p>
        <?php echo htmlspecialchars($_SESSION['employee_position'] ?? ''); ?>
    </p>

        </div>


        <nav class="menu">
            <a href="trangchunhanvien.php">🏠 Trang Chủ</a>
            <a href="quanlydatphong.php">📘 Quản lý đặt phòng</a>
            <a href="quanlyphong.php" class="active">🏨 Quản lý phòng</a>
            <a href="quanlykhachhang.php">👥 Quản lý khách hàng</a>
            <a href="#">👤 Thông tin nhân viên</a>
        </nav>
    </aside>

    <main class="content">
        <h1>👤 Thông Tin Nhân Viên</h1>
        
        <?php if ($error): ?>
            <div class="error-message">
                <i class="fas fa-exclamation-triangle"></i> <?php echo $error; ?>
            </div>
        <?php else: ?>
            <div class="info-card">
                <div class="info-header">
                    <div class="info-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <h3 id="display_name"><?php echo htmlspecialchars($employeeInfo['name']); ?></h3>
                    <p id="display_position_small" style="color: #6c757d; font-style: italic;"><?php echo htmlspecialchars($employeeInfo['position']); ?></p>
                </div>
                
                <div class="info-details">
                    <h2>Chi Tiết Cá Nhân & Công Việc</h2>
                    
                    <div class="detail-item">
                        <i class="fas fa-id-card"></i> 
                        <strong>Mã NV:</strong> 
                        <span id="display_id"><?php echo htmlspecialchars($employeeInfo['employee_id']); ?></span>
                    </div>
                    
                    <div class="detail-item">
                        <i class="fas fa-phone"></i> 
                        <strong>Điện thoại:</strong> 
                        <span id="display_phone"><?php echo htmlspecialchars($employeeInfo['phone']); ?></span>
                    </div>
                    
                    <div class="detail-item">
                        <i class="fas fa-envelope"></i> 
                        <strong>Email:</strong> 
                        <span id="display_email"><?php echo htmlspecialchars($employeeInfo['email']); ?></span>
                    </div>
                    
                    <div class="detail-item">
                        <i class="fas fa-briefcase"></i> 
                        <strong>Chức vụ:</strong> 
                        <span id="display_position"><?php echo htmlspecialchars($employeeInfo['position']); ?></span>
                    </div>
                    
                    <div class="detail-item">
                        <i class="fas fa-money-bill-wave"></i> 
                        <strong>Mức Lương:</strong> 
                        <span id="display_salary" style="font-weight: bold; color: #28a745;"><?php echo htmlspecialchars($employeeInfo['salary_formatted']); ?></span>
                    </div>
                    
                    <div class="detail-item" style="margin-top: 20px;">
                        <button class="action-btn edit-trigger" id="editEmployeeBtn">
                            <i class="fas fa-edit" style="color: white;"></i> Chỉnh Sửa Thông Tin
                        </button>
                    </div>
                </div>
            </div>
            
            <div id="editEmployeeModal" class="modal">
                <div class="modal-content">
                    <span class="close-btn">&times;</span>
                    <h2>Cập Nhật Thông Tin Nhân Viên</h2>
                    
                    <form id="editEmployeeForm">
                        <input type="hidden" name="action" value="update_employee">

                        <div class="form-group">
                            <label for="edit_name">Tên Nhân Viên:</label>
                            <input type="text" id="edit_name" name="name" value="<?php echo htmlspecialchars($employeeInfo['name']); ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="edit_position">Chức Vụ:</label>
                            <input type="text" id="edit_position" name="position" value="<?php echo htmlspecialchars($employeeInfo['position']); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="edit_phone">Điện Thoại:</label>
                            <input type="text" id="edit_phone" name="phone" value="<?php echo htmlspecialchars($employeeInfo['phone']); ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="edit_email">Email:</label>
                            <input type="email" id="edit_email" name="email" value="<?php echo htmlspecialchars($employeeInfo['email']); ?>">
                        </div>

                        <div class="form-group">
                            <label for="edit_salary">Mức Lương (Chỉ nhập số):</label>
                            <input type="number" id="edit_salary" name="salary" value="<?php echo htmlspecialchars($employeeInfo['salary']); ?>" min="0">
                        </div>
                        
                        <button type="submit" class="save-btn"><i class="fas fa-save"></i> Lưu Thay Đổi</button>
                    </form>
                </div>
            </div>
        <?php endif; ?>
    </main>
</div>

<script>
    function formatCurrency(amount) {
        amount = isNaN(amount) ? 0 : amount;
        return new Intl.NumberFormat('vi-VN', { 
            style: 'currency', 
            currency: 'VND',
            minimumFractionDigits: 0
        }).format(amount).replace('₫', ' VNĐ'); 
    }

    document.addEventListener('DOMContentLoaded', function() {
        const modal = document.getElementById('editEmployeeModal');
        const btn = document.getElementById('editEmployeeBtn');
        const span = modal ? modal.querySelector('.close-btn') : null;
        const form = document.getElementById('editEmployeeForm');

        // Logic mở/đóng Modal
        if (btn) {
            btn.onclick = function() { modal.style.display = 'block'; }
        }
        if (span) {
            span.onclick = function() { modal.style.display = 'none'; }
        }
        window.onclick = function(event) {
            if (event.target == modal) { modal.style.display = 'none'; }
        }
        
        // --- XỬ LÝ CẬP NHẬT AJAX ---
        if (form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                const saveButton = form.querySelector('.save-btn');
                
                saveButton.disabled = true;
                saveButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Đang Cập Nhật...';

                const formData = new FormData(form);

                fetch('thongtinnhanvien.php', {
                    method: 'POST',
                    body: new URLSearchParams(formData)
                })
                .then(response => {
                    if (!response.ok) {
                        return response.text().then(text => {
                            console.error('LỖI SERVER HTTP STATUS:', response.status, text);
                            throw new Error('Phản hồi HTTP lỗi: ' + response.statusText);
                        });
                    }
                    return response.json(); 
                })
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        
                        // CẬP NHẬT GIAO DIỆN TRỰC TIẾP
                        if (data.data) {
                            const newInfo = data.data;
                            
                            // Cập nhật các trường hiển thị
                            document.getElementById('display_name').textContent = newInfo.name;
                            document.getElementById('display_position_small').textContent = newInfo.position;
                            document.getElementById('display_position').textContent = newInfo.position;
                            document.getElementById('display_phone').textContent = newInfo.phone;
                            document.getElementById('display_email').textContent = newInfo.email;
                            document.getElementById('display_salary').textContent = formatCurrency(newInfo.salary);
                            
                            // Cập nhật giá trị trong form để lần sau mở lên thấy dữ liệu mới nhất
                            document.getElementById('edit_name').value = newInfo.name;
                            document.getElementById('edit_position').value = newInfo.position;
                            document.getElementById('edit_phone').value = newInfo.phone;
                            document.getElementById('edit_email').value = newInfo.email;
                            document.getElementById('edit_salary').value = newInfo.salary;

                        }
                        
                        modal.style.display = 'none'; 

                    } else {
                        // Trường hợp thất bại (Lỗi CSDL hoặc ID không khớp)
                        alert("CẬP NHẬT THẤT BẠI: " + data.message);
                    }
                    
                    // Khôi phục nút
                    saveButton.disabled = false;
                    saveButton.innerHTML = '<i class="fas fa-save"></i> Lưu Thay Đổi';
                })
                .catch(error => {
                    console.error('LỖI AJAX:', error);
                    alert('Đã xảy ra lỗi kỹ thuật khi cập nhật thông tin. Vui lòng xem tab Console (F12) để biết chi tiết.');
                    
                    saveButton.disabled = false;
                    saveButton.innerHTML = '<i class="fas fa-save"></i> Lưu Thay Đổi';
                });
            });
        }
    });
</script>

</body>
</html>