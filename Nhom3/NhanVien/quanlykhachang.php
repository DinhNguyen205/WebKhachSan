<?php 
session_start();
require __DIR__ . "/connect.php";

if(!isset($_SESSION['id'])){
    header("Location:../TrangChu/mainpgae/dangnhap.php");
    exit;
}


// =================================================================
// 2. LOGIC XỬ LÝ AJAX (THÊM, SỬA, XÓA)
// =================================================================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    header('Content-Type: application/json');

    // --- XỬ LÝ XÓA KHÁCH HÀNG (DELETE) ---
    if ($_POST['action'] === 'delete_customer') {
        $customerId = $_POST['customer_id'] ?? null;
        try {
            $stmt = $pdo->prepare("DELETE FROM customers WHERE customer_id = ?");
            $stmt->execute([$customerId]);
            if ($stmt->rowCount()) {
                 echo json_encode(['success' => true, 'message' => "Đã xóa khách hàng $customerId thành công."]);
            } else {
                 echo json_encode(['success' => false, 'message' => "Không tìm thấy khách hàng $customerId để xóa."]);
            }
        } catch (\PDOException $e) {
            echo json_encode(['success' => false, 'message' => "Lỗi CSDL khi xóa: " . $e->getMessage()]);
        }
        exit;
    }

    // --- XỬ LÝ CẬP NHẬT/SỬA KHÁCH HÀNG (UPDATE) ---
    if ($_POST['action'] === 'edit_customer') {
        $customerId = $_POST['customer_id'] ?? null;
        $name = $_POST['name'] ?? null;
        $phone = $_POST['phone'] ?? null;
        $email = $_POST['email'] ?? null;

        if (empty($customerId) || empty($name) || empty($phone) || empty($email)) {
             echo json_encode(['success' => false, 'message' => 'Lỗi: Vui lòng điền đủ thông tin.']);
             exit;
        }

        try {
            $stmt = $pdo->prepare("UPDATE customers SET name = ?, phone = ?, email = ? WHERE customer_id = ?");
            $stmt->execute([$name, $phone, $email, $customerId]);

            echo json_encode(['success' => true, 'message' => "Đã cập nhật thông tin khách hàng $customerId thành công."]);
        } catch (\PDOException $e) {
            if ($e->getCode() == 23000) { 
                echo json_encode(['success' => false, 'message' => "Lỗi: Số điện thoại hoặc Email đã tồn tại ở khách hàng khác."]);
            } else {
                 echo json_encode(['success' => false, 'message' => "Lỗi CSDL khi cập nhật: " . $e->getMessage()]);
            }
        }
        exit;
    }
    
    // --- XỬ LÝ THÊM KHÁCH HÀNG MỚI (INSERT) ---
    if ($_POST['action'] === 'add_customer') {
        $customerId = $_POST['customer_id'] ?? null;
        $name = $_POST['name'] ?? null;
        $phone = $_POST['phone'] ?? null;
        $email = $_POST['email'] ?? null;
        $totalBookings = 0; 

        if (empty($customerId) || empty($name) || empty($phone) || empty($email)) {
             echo json_encode(['success' => false, 'message' => 'Lỗi: Vui lòng điền đủ thông tin khách hàng.']);
             exit;
        }

        try {
            $stmt = $pdo->prepare("INSERT INTO customers (customer_id, name, phone, email, total_bookings) 
                                   VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$customerId, $name, $phone, $email, $totalBookings]);

            echo json_encode(['success' => true, 'message' => "Đã thêm khách hàng $customerId thành công và lưu vào CSDL."]);
        } catch (\PDOException $e) {
            if ($e->getCode() == 23000) { 
                echo json_encode(['success' => false, 'message' => "Lỗi: Mã KH, Số điện thoại hoặc Email đã tồn tại."]);
            } else {
                echo json_encode(['success' => false, 'message' => "Lỗi CSDL khi thêm: " . $e->getMessage()]);
            }
        }
        exit;
    }
}


// --- Lấy Dữ liệu Khách Hàng để hiển thị (SELECT) ---
try {
    $stmt = $pdo->query("SELECT customer_id, name, phone, email, total_bookings FROM customers ORDER BY name ASC");
    $customers = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (\PDOException $e) {
    // Nếu lỗi SELECT, hiển thị mảng rỗng
    $customers = []; 
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Phòng - Khách Sạn Quy Nhơn</title>
    <link rel="stylesheet" href="thietkequanlyphong.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body>

<header>
    <div class="logo">Khách Sạn Quy Nhơn</div>
</header>

<div class="container">
    <aside class="sidebar">
        <div class="profile">
            <img src="__" class="avatar">
            <h3>___</h3>
            <p>___</p>
        </div>

        <nav class="menu">
            <a href="trangchunhanvien.php">🏠 Trang Chủ</a>
            <a href="quanlydatphong.php">📘 Quản lý đặt phòng</a>
            <a href="quanlyphong.php" class="active">🏨 Quản lý phòng</a>
            <a href="quanlykhachhang.php">👥 Quản lý khách hàng</a>
            <a href="calamviec.php">📅 Ca làm việc</a>
            <a href="#">👤 Thông tin nhân viên</a>
        </nav>
    </aside>

    <main class="content">
        <h1>👥 Quản Lý Khách Hàng</h1>
        <p class="subtitle">Xem danh sách, thông tin chi tiết và lịch sử đặt phòng của khách hàng.</p>
        
        <div class="controls-bar">
             <button class="add-btn add-customer-trigger"><i class="fas fa-user-plus"></i> Thêm Khách Hàng Mới</button>
             <div class="search-group">
                <input type="text" id="searchInput" placeholder="Tìm kiếm theo Tên, SĐT hoặc Email">
                <button id="searchButton" class="action-btn" style="margin-right: 0;"><i class="fas fa-search"></i></button>
            </div>
        </div>

        <div class="customer-table-container">
            <table>
                <thead>
                    <tr>
                        <th>Mã KH</th>
                        <th>Tên Khách Hàng</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Tổng số lần đặt</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody id="customer-list">
                    <?php 
                    if (!empty($customers)):
                        foreach ($customers as $customer): 
                        ?>
                        <tr data-id="<?php echo $customer['customer_id']; ?>" 
                            data-name="<?php echo htmlspecialchars($customer['name']); ?>"
                            data-phone="<?php echo $customer['phone']; ?>"
                            data-email="<?php echo $customer['email']; ?>">
                            <td><?php echo $customer['customer_id']; ?></td>
                            <td><?php echo $customer['name']; ?></td>
                            <td><?php echo $customer['phone']; ?></td>
                            <td><?php echo $customer['email']; ?></td>
                            <td><?php echo $customer['total_bookings']; ?></td>
                            <td>
                                <button class="action-btn edit-customer">Sửa</button>
                                <button class="action-btn delete-btn delete-customer">Xóa</button>
                            </td>
                        </tr>
                        <?php 
                        endforeach; 
                    else: ?>
                        <tr><td colspan='6' style='text-align: center; color: gray;'>Hiện chưa có dữ liệu khách hàng nào.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</div>

<div id="editCustomerModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>✏️ Cập nhật Khách Hàng</h2>
        
        <form id="editCustomerForm">
            <div class="form-group">
                <label for="edit_customer_id">Mã Khách Hàng:</label>
                <input type="text" id="edit_customer_id" name="customer_id" readonly>
            </div>
            <div class="form-group">
                <label for="edit_name">Tên Khách Hàng:</label>
                <input type="text" id="edit_name" name="name" required>
            </div>
            <div class="form-group">
                <label for="edit_phone">Điện thoại:</label>
                <input type="text" id="edit_phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="edit_email">Email:</label>
                <input type="email" id="edit_email" name="email" required>
            </div>
            
            <button type="submit" id="saveEditBtn" class="action-btn save-btn">Lưu Thay Đổi</button>
        </form>
    </div>
</div>

<div id="addCustomerModal" class="modal">
    <div class="modal-content">
        <span class="close-add-btn">&times;</span>
        <h2>➕ Thêm Khách Hàng Mới</h2>
        
        <form id="addCustomerForm">
            <div class="form-group">
                <label for="new_customer_id">Mã Khách Hàng (Ví dụ: KH004):</label>
                <input type="text" id="new_customer_id" name="customer_id" required>
            </div>
            <div class="form-group">
                <label for="new_name">Tên Khách Hàng:</label>
                <input type="text" id="new_name" name="name" required>
            </div>
            <div class="form-group">
                <label for="new_phone">Điện thoại:</label>
                <input type="text" id="new_phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="new_email">Email:</label>
                <input type="email" id="new_email" name="email" required>
            </div>
            
            <button type="submit" id="saveNewCustomerBtn" class="action-btn save-btn">Lưu Khách Hàng Mới</button>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const customerList = document.getElementById('customer-list');
        const searchInput = document.getElementById('searchInput');
        const allRows = Array.from(customerList.querySelectorAll('tr'));
        
        // Modal Sửa
        const editCustomerModal = document.getElementById('editCustomerModal');
        const closeEditBtn = editCustomerModal.querySelector('.close-btn');
        const editCustomerForm = document.getElementById('editCustomerForm');
        const editId = document.getElementById('edit_customer_id');
        const editName = document.getElementById('edit_name');
        const editPhone = document.getElementById('edit_phone');
        const editEmail = document.getElementById('edit_email');
        
        // Modal Thêm Mới
        const addCustomerModal = document.getElementById('addCustomerModal');
        const closeAddBtn = addCustomerModal.querySelector('.close-add-btn');
        const addCustomerTrigger = document.querySelector('.add-customer-trigger');
        const addCustomerForm = document.getElementById('addCustomerForm');


        // --- Hàm tìm kiếm và lọc ---
        function filterCustomers() {
            const searchText = searchInput.value.toLowerCase().trim();

            // Cần lấy lại allRows vì dữ liệu giả lập không lưu data-phone/data-email trên <tr>
            const currentRows = Array.from(customerList.querySelectorAll('tr')); 

            currentRows.forEach(row => {
                // Đảm bảo hàng đó có dữ liệu
                if (!row.dataset.id) return; 
                
                // Lấy dữ liệu trực tiếp từ ô (td) nếu data-* chưa được thiết lập chính xác
                const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                const phone = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                const email = row.querySelector('td:nth-child(4)').textContent.toLowerCase();

                if (name.includes(searchText) || phone.includes(searchText) || email.includes(searchText)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
        
        document.getElementById('searchButton').addEventListener('click', filterCustomers);
        searchInput.addEventListener('keyup', filterCustomers);

        // --- HÀM XÓA KHÁCH HÀNG (AJAX) ---
        function deleteCustomer(customerId, row) {
            if (!confirm(`Bạn có chắc chắn muốn XÓA khách hàng ${customerId} không? Hành động này không thể hoàn tác.`)) {
                return;
            }

            fetch('quanlykhachhang.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({
                    action: 'delete_customer',
                    customer_id: customerId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    row.remove(); // Xóa hàng khỏi DOM
                    
                    // Cập nhật lại danh sách hàng sau khi xóa
                    // allRows = Array.from(customerList.querySelectorAll('tr')); // Nếu cần cập nhật lại list
                } else {
                    alert('Lỗi xóa: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Lỗi khi gửi AJAX:', error);
                alert('Đã xảy ra lỗi kỹ thuật khi xóa khách hàng.');
            });
        }
        
        // --- HÀM MỞ/ĐÓNG MODAL SỬA ---
        function openEditModal(row) {
            // Lấy dữ liệu từ data attributes
            const currentId = row.dataset.id;
            const currentName = row.dataset.name;
            const currentPhone = row.dataset.phone;
            const currentEmail = row.dataset.email;

            // Đổ dữ liệu vào Form
            editId.value = currentId;
            editName.value = currentName;
            editPhone.value = currentPhone;
            editEmail.value = currentEmail;
            
            editCustomerModal.style.display = 'block';
        }
        
        function closeEditModal() {
            editCustomerModal.style.display = 'none';
        }
        
        // --- HÀM MỞ/ĐÓNG MODAL THÊM MỚI ---
        function closeAddModal() {
            addCustomerModal.style.display = 'none';
            addCustomerForm.reset(); 
        }

        addCustomerTrigger.addEventListener('click', function() {
            closeEditModal(); 
            addCustomerModal.style.display = 'block';
        });

        // --- Xử lý sự kiện nút Sửa/Xóa trong bảng ---
        customerList.addEventListener('click', function(event) {
            const row = event.target.closest('tr');
            if (!row || !row.dataset.id) return;

            const customerId = row.dataset.id;
            
            if (event.target.classList.contains('edit-customer')) {
                openEditModal(row);
            } else if (event.target.classList.contains('delete-customer')) {
                deleteCustomer(customerId, row);
            }
        });
        
        // --- Xử lý nút LƯU (SỬA) trong Modal ---
        editCustomerForm.addEventListener('submit', function(event) {
            event.preventDefault();
            
            const customerId = editId.value;
            const updatedName = editName.value;
            const updatedPhone = editPhone.value;
            const updatedEmail = editEmail.value;

            fetch('quanlykhachhang.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({
                    action: 'edit_customer',
                    customer_id: customerId,
                    name: updatedName,
                    phone: updatedPhone,
                    email: updatedEmail
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    closeEditModal();
                    
                    // Cập nhật DOM
                    const updatedRow = document.querySelector(`tr[data-id="${customerId}"]`);
                    if (updatedRow) {
                        // Cập nhật các ô (td)
                        updatedRow.querySelector('td:nth-child(2)').textContent = updatedName;
                        updatedRow.querySelector('td:nth-child(3)').textContent = updatedPhone;
                        updatedRow.querySelector('td:nth-child(4)').textContent = updatedEmail;

                        // Cập nhật data attributes (Quan trọng cho lần Sửa tiếp theo)
                        updatedRow.dataset.name = updatedName;
                        updatedRow.dataset.phone = updatedPhone;
                        updatedRow.dataset.email = updatedEmail;
                    }

                } else {
                    alert('Lỗi cập nhật: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Lỗi khi gửi AJAX:', error);
                alert('Đã xảy ra lỗi kỹ thuật khi cập nhật khách hàng.');
            });
        });

        // --- XỬ LÝ NÚT LƯU TRONG MODAL THÊM MỚI (INSERT AJAX) ---
        addCustomerForm.addEventListener('submit', function(event) {
            event.preventDefault(); 

            const newCustomerData = {
                action: 'add_customer', 
                customer_id: document.getElementById('new_customer_id').value.trim(),
                name: document.getElementById('new_name').value.trim(),
                phone: document.getElementById('new_phone').value.trim(),
                email: document.getElementById('new_email').value.trim(),
            };

            fetch('quanlykhachhang.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams(newCustomerData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    closeAddModal();
                    // Tải lại trang để lấy dữ liệu mới từ Database
                    window.location.reload(); 
                } else {
                    alert('Lỗi thêm khách hàng: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Lỗi khi gửi AJAX:', error);
                alert('Đã xảy ra lỗi kỹ thuật khi thêm khách hàng.');
            });
        });


        // --- Đóng Modal bằng nút X ---
        closeEditBtn.addEventListener('click', closeEditModal);
        closeAddBtn.addEventListener('click', closeAddModal);
        
        // --- Đóng Modal khi click ra ngoài ---
        window.addEventListener('click', function(event) {
            if (event.target === editCustomerModal) {
                closeEditModal();
            }
            if (event.target === addCustomerModal) {
                closeAddModal();
            }
        });
    });
</script>

</body>
</html>