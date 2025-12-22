<?php  
session_start();
include "connect.php";

try {
    $stmt = $pdo->prepare("SELECT * FROM phong ORDER BY so_phong ASC");
    $stmt->execute();
    $rooms = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Lỗi truy vấn SQL: " . $e->getMessage());
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
            <a href="#">👤 Thông tin nhân viên</a>
        </nav>
    </aside>

    <main class="content">
        <h1>🏨 Quản Lý Phòng</h1>

        <div class="controls-bar">
            <div class="filter-group">
                <label for="room-status">Trạng thái:</label>
                <select id="room-status">
                    <option value="All">Tất cả</option>
                    <option value="Có sẵn">Có sẵn</option>
                    <option value="Đang sử dụng">Đang sử dụng</option>
                    <option value="Dọn dẹp">Đang dọn</option>
                    <option value="Bảo trì">Bảo trì</option>
                </select>
            </div>

            <div class="search-group">
                <input type="text" id="searchInput" placeholder="Tìm kiếm số phòng...">
                <button id="searchButton"><i class="fas fa-search"></i></button>
            </div>
            <button class="add-room-btn add-room-trigger"><i class="fas fa-plus"></i> Thêm phòng mới</button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Số phòng</th>
                    <th>Số người</th>
                    <th>Giá (VNĐ)</th>
                    <th>Dịch vụ</th>
                    <th>Thiết bị</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>

            <tbody id="room-list">
                <?php if (!empty($rooms)): ?>
                    <?php foreach ($rooms as $room): ?>
                        <tr data-number="<?= $room['so_phong']; ?>" data-status="<?= $room['trang_thai']; ?>">
                            <td><?= $room['so_phong']; ?></td>
                            <td><?= $room['so_nguoi']; ?></td>
                            <td><?= number_format($room['gia'], 0, ',', '.'); ?></td>
                            <td><?= $room['dich_vu']; ?></td>
                            <td><?= $room['thiet_bi']; ?></td>
                            <td class="status"><?= $room['trang_thai']; ?></td>
                            <td><button class="action-btn change-status">Cập nhật</button></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="7" style="text-align:center;">Không có dữ liệu</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </main>
</div>

<!-- MODAL CẬP NHẬT TRẠNG THÁI -->
<div id="statusUpdateModal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>Cập nhật trạng thái phòng</h2>
        <p>Phòng: <strong id="modalRoomNumber"></strong></p>

        <select id="newStatusSelect">
            <option value="Có sẵn">Có sẵn</option>
            <option value="Đang sử dụng">Đang sử dụng</option>
            <option value="Dọn dẹp">Đang dọn</option>
            <option value="Bảo trì">Bảo trì</option>
        </select>

        <button id="saveStatusBtn" class="add-room-btn" style="width:100%;margin-top:15px;">Lưu</button>
    </div>
</div>

<!-- MODAL THÊM PHÒNG -->
<div id="addRoomModal" class="modal">
    <div class="modal-content">
        <span class="close-add-btn">&times;</span>
        <h2>➕ Thêm Phòng</h2>

        <form id="addRoomForm">
            <label>Số phòng:</label>
            <input type="text" name="so_phong" required>

            <label>Số người:</label>
            <input type="text" name="so_nguoi" required>

            <label>Dịch vụ:</label>
            <input type="text" name="dich_vu">

            <label>Thiết bị:</label>
            <input type="text" name="thiet_bi">

            <label>Giá:</label>
            <input type="text" name="gia" required>

            <button type="submit" class="add-room-btn" style="margin-top:15px;width:100%;">Lưu</button>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const roomList = document.getElementById('room-list');
    const roomStatusFilter = document.getElementById('room-status');
    const searchInput = document.getElementById('searchInput');
    const searchButton = document.getElementById('searchButton');

    const allRooms = Array.from(roomList.querySelectorAll('tr'));

    /* =======================
         HÀM LỌC & TÌM KIẾM
       ======================= */
    function filterRooms() {
        const selectedStatus = roomStatusFilter.value;
        const searchText = searchInput.value.toLowerCase().trim();

        allRooms.forEach(room => {
            if (!room.dataset.number) return;

            const roomNumber = room.dataset.number.toLowerCase();
            const roomStatus = room.dataset.status;

            const matchStatus = selectedStatus === "all" || roomStatus === selectedStatus;
            const matchSearch = roomNumber.includes(searchText);

            room.style.display = (matchStatus && matchSearch) ? "" : "none";
        });
    }

    roomStatusFilter.addEventListener('change', filterRooms);
    searchButton.addEventListener('click', filterRooms);
    searchInput.addEventListener('keyup', filterRooms);


    /* ======================
         MODAL CẬP NHẬT TRẠNG THÁI
       ====================== */
    const statusModal = document.getElementById('statusUpdateModal');
    const closeStatusBtn = statusModal.querySelector('.close-btn');
    const modalRoomNumber = document.getElementById('modalRoomNumber');
    const saveStatusBtn = document.getElementById('saveStatusBtn');
    let currentRoomRow = null;

    // Mở modal cập nhật
    roomList.addEventListener('click', function (e) {
        const btn = e.target.closest('.change-status');
        if (!btn) return;

        currentRoomRow = btn.closest("tr");
        const number = currentRoomRow.dataset.number;

        modalRoomNumber.textContent = number;
        statusModal.style.display = "block";
    });

    // Đóng modal
    closeStatusBtn.addEventListener('click', () => statusModal.style.display = "none");


    // Lưu cập nhật trạng thái
    saveStatusBtn.addEventListener('click', function () {
        const newStatus = document.getElementById('newStatusSelect').value;
        const roomNumber = currentRoomRow.dataset.number;

        fetch("ketnoiphong.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: new URLSearchParams({
                action: "update_room_status",
                so_phong: roomNumber,
                trang_thai: newStatus
            })
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {

                // Cập nhật giao diện
                currentRoomRow.dataset.status = newStatus;
                currentRoomRow.querySelector(".status").textContent = newStatus;

                alert(data.message);
                statusModal.style.display = "none";
                filterRooms();
            } else {
                alert("Lỗi: " + data.message);
            }
        })
        .catch(() => alert("Lỗi kết nối server!"));
    });


    /* ======================
         MODAL THÊM PHÒNG
       ====================== */
    const addRoomModal = document.getElementById('addRoomModal');
    const addRoomBtn = document.querySelector('.add-room-trigger');
    const closeAddBtn = document.querySelector('.close-add-btn');
    const addRoomForm = document.getElementById('addRoomForm');

    addRoomBtn.addEventListener('click', () => addRoomModal.style.display = "block");
    closeAddBtn.addEventListener('click', () => addRoomModal.style.display = "none");


    // Lưu phòng mới (INSERT)
    addRoomForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const formData = new FormData(addRoomForm);
        formData.append("action", "add_new_room");

        fetch("ketnoiphong.php", {
            method: "POST",
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert("Thêm phòng thành công");
                addRoomModal.style.display = "none";

                // Tải lại để lấy dữ liệu mới từ SQL
                window.location.reload();
            } else {
                alert("Lỗi thêm phòng: " + data.message);
            }
        })
        .catch(() => alert("Lỗi kết nối server!"));
    });


    /* ======================
        ĐÓNG MODAL KHI CLICK RA NGOÀI
       ====================== */
    window.addEventListener('click', function(e) {
        if (e.target === statusModal) statusModal.style.display = "none";
        if (e.target === addRoomModal) addRoomModal.style.display = "none";
    });

});
</script>

</body>
</html>
