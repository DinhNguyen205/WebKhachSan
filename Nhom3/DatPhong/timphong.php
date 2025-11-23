<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Tìm phòng khách sạn</title>
    <link rel="stylesheet" href="datphong.css">
</head>
<body>

<div class="page-wrapper">

    <!-- HEADER -->
    <header class="header">
        <div class="hotel-name">Khách Sạn Quy Nhơn</div>
        <a href="lichsu_datphong.php" class="btn-history">Lịch sử đặt phòng</a>
    </header>

    <!-- NỘI DUNG CHÍNH -->
    <div class="content">
        <!-- Cột giới thiệu -->
        <section class="intro-box">
            <h3>Vài nét về phòng của khách sạn</h3>
            <p>• Phòng sạch sẽ, đầy đủ tiện nghi.</p>
            <p>• Gần biển, gần trung tâm thành phố.</p>
            <p>• Phục vụ 24/7, wifi miễn phí.</p>
            <p>• Bãi đậu xe rộng rãi, an toàn.</p>
        </section>

                <!-- Danh sách phòng -->
        <section class="rooms">

            <!-- TẦNG 1: 101 - 104 -->
            <!-- PHÒNG 101 -->
            <div class="room-card"
                 data-sophong="101"
                 data-dichvu="Ăn sáng miễn phí, Wifi, Hồ bơi"
                 data-thietbi="Giường đôi, Máy lạnh, TV, Tủ lạnh nhỏ"
                 data-gia="900.000 VNĐ / đêm">
                <div class="room-header">Số phòng: 101</div>
                <div class="room-body">
                    <div class="room-image">Ảnh</div>
                    <div class="room-info">
                        <p><strong>Các dịch vụ:</strong> Ăn sáng miễn phí, Wifi, Hồ bơi</p>
                        <p><strong>Thiết bị trong phòng:</strong> Giường đôi, Máy lạnh, TV, Tủ lạnh nhỏ</p>
                        <p><strong>Giá:</strong> 900.000 VNĐ / đêm</p>
                        <button class="btn-book">Đặt phòng</button>
                    </div>
                </div>
            </div>

            <!-- PHÒNG 102 -->
            <div class="room-card"
                 data-sophong="102"
                 data-dichvu="Ăn sáng miễn phí, Wifi"
                 data-thietbi="2 Giường đơn, Máy lạnh, TV"
                 data-gia="850.000 VNĐ / đêm">
                <div class="room-header">Số phòng: 102</div>
                <div class="room-body">
                    <div class="room-image">Ảnh</div>
                    <div class="room-info">
                        <p><strong>Các dịch vụ:</strong> Ăn sáng miễn phí, Wifi</p>
                        <p><strong>Thiết bị trong phòng:</strong> 2 Giường đơn, Máy lạnh, TV</p>
                        <p><strong>Giá:</strong> 850.000 VNĐ / đêm</p>
                        <button class="btn-book">Đặt phòng</button>
                    </div>
                </div>
            </div>

            <!-- PHÒNG 103 -->
            <div class="room-card"
                 data-sophong="103"
                 data-dichvu="Ăn sáng, Wifi, Chỗ đậu xe miễn phí"
                 data-thietbi="Giường đôi, Máy lạnh, TV, Bàn làm việc"
                 data-gia="880.000 VNĐ / đêm">
                <div class="room-header">Số phòng: 103</div>
                <div class="room-body">
                    <div class="room-image">Ảnh</div>
                    <div class="room-info">
                        <p><strong>Các dịch vụ:</strong> Ăn sáng, Wifi, Chỗ đậu xe miễn phí</p>
                        <p><strong>Thiết bị trong phòng:</strong> Giường đôi, Máy lạnh, TV, Bàn làm việc</p>
                        <p><strong>Giá:</strong> 880.000 VNĐ / đêm</p>
                        <button class="btn-book">Đặt phòng</button>
                    </div>
                </div>
            </div>

            <!-- PHÒNG 104 -->
            <div class="room-card"
                 data-sophong="104"
                 data-dichvu="Ăn sáng, Wifi, Hồ bơi"
                 data-thietbi="2 Giường đơn, Máy lạnh, TV, Tủ lạnh nhỏ"
                 data-gia="900.000 VNĐ / đêm">
                <div class="room-header">Số phòng: 104</div>
                <div class="room-body">
                    <div class="room-image">Ảnh</div>
                    <div class="room-info">
                        <p><strong>Các dịch vụ:</strong> Ăn sáng, Wifi, Hồ bơi</p>
                        <p><strong>Thiết bị trong phòng:</strong> 2 Giường đơn, Máy lạnh, TV, Tủ lạnh nhỏ</p>
                        <p><strong>Giá:</strong> 900.000 VNĐ / đêm</p>
                        <button class="btn-book">Đặt phòng</button>
                    </div>
                </div>
            </div>

            <!-- TẦNG 2: 201 - 204 -->
            <!-- PHÒNG 201 -->
            <div class="room-card"
                 data-sophong="201"
                 data-dichvu="Ăn sáng, Spa, Hồ bơi"
                 data-thietbi="Giường đôi, Bồn tắm, Máy lạnh, TV"
                 data-gia="1.050.000 VNĐ / đêm">
                <div class="room-header">Số phòng: 201</div>
                <div class="room-body">
                    <div class="room-image">Ảnh</div>
                    <div class="room-info">
                        <p><strong>Các dịch vụ:</strong> Ăn sáng, Spa, Hồ bơi</p>
                        <p><strong>Thiết bị trong phòng:</strong> Giường đôi, Bồn tắm, Máy lạnh, TV</p>
                        <p><strong>Giá:</strong> 1.050.000 VNĐ / đêm</p>
                        <button class="btn-book">Đặt phòng</button>
                    </div>
                </div>
            </div>

            <!-- PHÒNG 202 -->
            <div class="room-card"
                 data-sophong="202"
                 data-dichvu="Ăn sáng, Spa, Đưa đón sân bay"
                 data-thietbi="Giường đôi, Bồn tắm, Máy lạnh, TV"
                 data-gia="1.200.000 VNĐ / đêm">
                <div class="room-header">Số phòng: 202</div>
                <div class="room-body">
                    <div class="room-image">Ảnh</div>
                    <div class="room-info">
                        <p><strong>Các dịch vụ:</strong> Ăn sáng, Spa, Đưa đón sân bay</p>
                        <p><strong>Thiết bị trong phòng:</strong> Giường đôi, Bồn tắm, Máy lạnh, TV</p>
                        <p><strong>Giá:</strong> 1.200.000 VNĐ / đêm</p>
                        <button class="btn-book">Đặt phòng</button>
                    </div>
                </div>
            </div>

            <!-- PHÒNG 203 -->
            <div class="room-card"
                 data-sophong="203"
                 data-dichvu="Ăn sáng, Spa, Sauna"
                 data-thietbi="Giường đôi, Bồn tắm, Máy lạnh, TV, Sofa"
                 data-gia="1.250.000 VNĐ / đêm">
                <div class="room-header">Số phòng: 203</div>
                <div class="room-body">
                    <div class="room-image">Ảnh</div>
                    <div class="room-info">
                        <p><strong>Các dịch vụ:</strong> Ăn sáng, Spa, Sauna</p>
                        <p><strong>Thiết bị trong phòng:</strong> Giường đôi, Bồn tắm, Máy lạnh, TV, Sofa</p>
                        <p><strong>Giá:</strong> 1.250.000 VNĐ / đêm</p>
                        <button class="btn-book">Đặt phòng</button>
                    </div>
                </div>
            </div>

            <!-- PHÒNG 204 -->
            <div class="room-card"
                 data-sophong="204"
                 data-dichvu="Ăn sáng, Hồ bơi, Phòng gym"
                 data-thietbi="2 Giường đơn, Máy lạnh, TV, Bàn làm việc"
                 data-gia="1.100.000 VNĐ / đêm">
                <div class="room-header">Số phòng: 204</div>
                <div class="room-body">
                    <div class="room-image">Ảnh</div>
                    <div class="room-info">
                        <p><strong>Các dịch vụ:</strong> Ăn sáng, Hồ bơi, Phòng gym</p>
                        <p><strong>Thiết bị trong phòng:</strong> 2 Giường đơn, Máy lạnh, TV, Bàn làm việc</p>
                        <p><strong>Giá:</strong> 1.100.000 VNĐ / đêm</p>
                        <button class="btn-book">Đặt phòng</button>
                    </div>
                </div>
            </div>

            <!-- TẦNG 3: 301 - 304 -->
            <!-- PHÒNG 301 -->
            <div class="room-card"
                 data-sophong="301"
                 data-dichvu="Ăn sáng, Wifi, View biển"
                 data-thietbi="Giường đôi, Ban công, Máy lạnh, TV"
                 data-gia="1.300.000 VNĐ / đêm">
                <div class="room-header">Số phòng: 301</div>
                <div class="room-body">
                    <div class="room-image">Ảnh</div>
                    <div class="room-info">
                        <p><strong>Các dịch vụ:</strong> Ăn sáng, Wifi, View biển</p>
                        <p><strong>Thiết bị trong phòng:</strong> Giường đôi, Ban công, Máy lạnh, TV</p>
                        <p><strong>Giá:</strong> 1.300.000 VNĐ / đêm</p>
                        <button class="btn-book">Đặt phòng</button>
                    </div>
                </div>
            </div>

            <!-- PHÒNG 302 -->
            <div class="room-card"
                 data-sophong="302"
                 data-dichvu="Ăn sáng, Wifi, View biển"
                 data-thietbi="2 Giường đơn, Ban công, Máy lạnh, TV"
                 data-gia="1.250.000 VNĐ / đêm">
                <div class="room-header">Số phòng: 302</div>
                <div class="room-body">
                    <div class="room-image">Ảnh</div>
                    <div class="room-info">
                        <p><strong>Các dịch vụ:</strong> Ăn sáng, Wifi, View biển</p>
                        <p><strong>Thiết bị trong phòng:</strong> 2 Giường đơn, Ban công, Máy lạnh, TV</p>
                        <p><strong>Giá:</strong> 1.250.000 VNĐ / đêm</p>
                        <button class="btn-book">Đặt phòng</button>
                    </div>
                </div>
            </div>

            <!-- PHÒNG 303 -->
            <div class="room-card"
                 data-sophong="303"
                 data-dichvu="Ăn sáng, Spa, View biển"
                 data-thietbi="Giường đôi, Ban công, Bồn tắm, Máy lạnh, TV"
                 data-gia="1.400.000 VNĐ / đêm">
                <div class="room-header">Số phòng: 303</div>
                <div class="room-body">
                    <div class="room-image">Ảnh</div>
                    <div class="room-info">
                        <p><strong>Các dịch vụ:</strong> Ăn sáng, Spa, View biển</p>
                        <p><strong>Thiết bị trong phòng:</strong> Giường đôi, Ban công, Bồn tắm, Máy lạnh, TV</p>
                        <p><strong>Giá:</strong> 1.400.000 VNĐ / đêm</p>
                        <button class="btn-book">Đặt phòng</button>
                    </div>
                </div>
            </div>

            <!-- PHÒNG 304 -->
            <div class="room-card"
                 data-sophong="304"
                 data-dichvu="Ăn sáng, Wifi, Hồ bơi, View biển"
                 data-thietbi="2 Giường đơn, Ban công, Máy lạnh, TV"
                 data-gia="1.350.000 VNĐ / đêm">
                <div class="room-header">Số phòng: 304</div>
                <div class="room-body">
                    <div class="room-image">Ảnh</div>
                    <div class="room-info">
                        <p><strong>Các dịch vụ:</strong> Ăn sáng, Wifi, Hồ bơi, View biển</p>
                        <p><strong>Thiết bị trong phòng:</strong> 2 Giường đơn, Ban công, Máy lạnh, TV</p>
                        <p><strong>Giá:</strong> 1.350.000 VNĐ / đêm</p>
                        <button class="btn-book">Đặt phòng</button>
                    </div>
                </div>
            </div>

            <!-- TẦNG 4: 401 - 404 -->
            <!-- PHÒNG 401 -->
            <div class="room-card"
                 data-sophong="401"
                 data-dichvu="Ăn sáng, Wifi, Phòng gym"
                 data-thietbi="Giường đôi, Máy lạnh, TV, Sofa"
                 data-gia="1.100.000 VNĐ / đêm">
                <div class="room-header">Số phòng: 401</div>
                <div class="room-body">
                    <div class="room-image">Ảnh</div>
                    <div class="room-info">
                        <p><strong>Các dịch vụ:</strong> Ăn sáng, Wifi, Phòng gym</p>
                        <p><strong>Thiết bị trong phòng:</strong> Giường đôi, Máy lạnh, TV, Sofa</p>
                        <p><strong>Giá:</strong> 1.100.000 VNĐ / đêm</p>
                        <button class="btn-book">Đặt phòng</button>
                    </div>
                </div>
            </div>

            <!-- PHÒNG 402 -->
            <div class="room-card"
                 data-sophong="402"
                 data-dichvu="Ăn sáng, Spa, Phòng gym"
                 data-thietbi="Giường đôi, Máy lạnh, TV, Bàn làm việc"
                 data-gia="1.200.000 VNĐ / đêm">
                <div class="room-header">Số phòng: 402</div>
                <div class="room-body">
                    <div class="room-image">Ảnh</div>
                    <div class="room-info">
                        <p><strong>Các dịch vụ:</strong> Ăn sáng, Spa, Phòng gym</p>
                        <p><strong>Thiết bị trong phòng:</strong> Giường đôi, Máy lạnh, TV, Bàn làm việc</p>
                        <p><strong>Giá:</strong> 1.200.000 VNĐ / đêm</p>
                        <button class="btn-book">Đặt phòng</button>
                    </div>
                </div>
            </div>

            <!-- PHÒNG 403 -->
            <div class="room-card"
                 data-sophong="403"
                 data-dichvu="Ăn sáng, Spa, Hồ bơi, Phòng gym"
                 data-thietbi="Giường đôi, Bồn tắm, Máy lạnh, TV"
                 data-gia="1.350.000 VNĐ / đêm">
                <div class="room-header">Số phòng: 403</div>
                <div class="room-body">
                    <div class="room-image">Ảnh</div>
                    <div class="room-info">
                        <p><strong>Các dịch vụ:</strong> Ăn sáng, Spa, Hồ bơi, Phòng gym</p>
                        <p><strong>Thiết bị trong phòng:</strong> Giường đôi, Bồn tắm, Máy lạnh, TV</p>
                        <p><strong>Giá:</strong> 1.350.000 VNĐ / đêm</p>
                        <button class="btn-book">Đặt phòng</button>
                    </div>
                </div>
            </div>

            <!-- PHÒNG 404 -->
            <div class="room-card"
                 data-sophong="404"
                 data-dichvu="Ăn sáng, Wifi, Phòng gym"
                 data-thietbi="2 Giường đơn, Máy lạnh, TV, Tủ lạnh nhỏ"
                 data-gia="1.150.000 VNĐ / đêm">
                <div class="room-header">Số phòng: 404</div>
                <div class="room-body">
                    <div class="room-image">Ảnh</div>
                    <div class="room-info">
                        <p><strong>Các dịch vụ:</strong> Ăn sáng, Wifi, Phòng gym</p>
                        <p><strong>Thiết bị trong phòng:</strong> 2 Giường đơn, Máy lạnh, TV, Tủ lạnh nhỏ</p>
                        <p><strong>Giá:</strong> 1.150.000 VNĐ / đêm</p>
                        <button class="btn-book">Đặt phòng</button>
                    </div>
                </div>
            </div>

            <!-- TẦNG 5: 501 - 504 -->
            <!-- PHÒNG 501 -->
            <div class="room-card"
                 data-sophong="501"
                 data-dichvu="Ăn sáng, Wifi, View biển, Spa"
                 data-thietbi="Giường đôi, Ban công lớn, Bồn tắm, Máy lạnh, TV"
                 data-gia="1.600.000 VNĐ / đêm">
                <div class="room-header">Số phòng: 501</div>
                <div class="room-body">
                    <div class="room-image">Ảnh</div>
                    <div class="room-info">
                        <p><strong>Các dịch vụ:</strong> Ăn sáng, Wifi, View biển, Spa</p>
                        <p><strong>Thiết bị trong phòng:</strong> Giường đôi, Ban công lớn, Bồn tắm, Máy lạnh, TV</p>
                        <p><strong>Giá:</strong> 1.600.000 VNĐ / đêm</p>
                        <button class="btn-book">Đặt phòng</button>
                    </div>
                </div>
            </div>

            <!-- PHÒNG 502 -->
            <div class="room-card"
                 data-sophong="502"
                 data-dichvu="Ăn sáng, Wifi, View biển, Hồ bơi"
                 data-thietbi="2 Giường đơn, Ban công, Máy lạnh, TV"
                 data-gia="1.500.000 VNĐ / đêm">
                <div class="room-header">Số phòng: 502</div>
                <div class="room-body">
                    <div class="room-image">Ảnh</div>
                    <div class="room-info">
                        <p><strong>Các dịch vụ:</strong> Ăn sáng, Wifi, View biển, Hồ bơi</p>
                        <p><strong>Thiết bị trong phòng:</strong> 2 Giường đơn, Ban công, Máy lạnh, TV</p>
                        <p><strong>Giá:</strong> 1.500.000 VNĐ / đêm</p>
                        <button class="btn-book">Đặt phòng</button>
                    </div>
                </div>
            </div>

            <!-- PHÒNG 503 -->
            <div class="room-card"
                 data-sophong="503"
                 data-dichvu="Ăn sáng, Wifi, View biển, Spa, Phòng gym"
                 data-thietbi="Giường đôi, Ban công, Bồn tắm, Máy lạnh, TV, Sofa"
                 data-gia="1.700.000 VNĐ / đêm">
                <div class="room-header">Số phòng: 503</div>
                <div class="room-body">
                    <div class="room-image">Ảnh</div>
                    <div class="room-info">
                        <p><strong>Các dịch vụ:</strong> Ăn sáng, Wifi, View biển, Spa, Phòng gym</p>
                        <p><strong>Thiết bị trong phòng:</strong> Giường đôi, Ban công, Bồn tắm, Máy lạnh, TV, Sofa</p>
                        <p><strong>Giá:</strong> 1.700.000 VNĐ / đêm</p>
                        <button class="btn-book">Đặt phòng</button>
                    </div>
                </div>
            </div>

            <!-- PHÒNG 504 -->
            <div class="room-card"
                 data-sophong="504"
                 data-dichvu="Ăn sáng, Wifi, View biển"
                 data-thietbi="2 Giường đơn, Ban công, Máy lạnh, TV"
                 data-gia="1.550.000 VNĐ / đêm">
                <div class="room-header">Số phòng: 504</div>
                <div class="room-body">
                    <div class="room-image">Ảnh</div>
                    <div class="room-info">
                        <p><strong>Các dịch vụ:</strong> Ăn sáng, Wifi, View biển</p>
                        <p><strong>Thiết bị trong phòng:</strong> 2 Giường đơn, Ban công, Máy lạnh, TV</p>
                        <p><strong>Giá:</strong> 1.550.000 VNĐ / đêm</p>
                        <button class="btn-book">Đặt phòng</button>
                    </div>
                </div>
            </div>

        </section>


    <!-- THÔNG BÁO ĐẶT THÀNH CÔNG -->
    <?php if (isset($_SESSION['thong_bao'])): ?>
        <div class="alert-success">
            <?php
            echo $_SESSION['thong_bao'];
            unset($_SESSION['thong_bao']);
            ?>
        </div>
    <?php endif; ?>

</div>

<!-- POPUP ĐẶT PHÒNG -->
<div id="modalOverlay" class="modal-overlay">
    <div class="modal-box">
        <h3>Đặt Phòng</h3>

        <form action="datphong.php" method="post">
            <div class="form-group">
                <label>Họ và tên:</label>
                <input type="text" name="ten" required>
            </div>

            <div class="form-group">
                <label>Số điện thoại:</label>
                <input type="text" name="sodienthoai" required>
            </div>

            <div class="form-group">
                <label>Số lượng (phòng):</label>
                <input type="number" name="songuoi" min="1" value="1" required>
            </div>

            <div class="form-group">
                <label>Thời gian (ngày nhận phòng):</label>
                <input type="date" name="ngaydat" required>
            </div>

            <div class="form-group">
                <label>Các dịch vụ:</label>
                <input type="text" name="dichvu" id="inputDichVu" readonly>
            </div>

            <div class="form-group">
                <label>Giá phòng:</label>
                <input type="text" id="inputGiaPhong" readonly>
            </div>

            <!-- ẨN: số phòng để lưu vào DB -->
            <input type="hidden" name="sophong" id="inputSoPhong">

            <div class="modal-actions">
                <button type="button" id="btnCloseModal" class="btn-cancel">Hủy</button>
                <button type="submit" class="btn-submit">Đặt</button>
            </div>
        </form>
    </div>
</div>

<script>
// Mở popup và đổ dữ liệu phòng
document.querySelectorAll('.btn-book').forEach(function(btn) {
    btn.addEventListener('click', function () {
        const card   = this.closest('.room-card');
        const sophong = card.dataset.sophong;
        const dichvu  = card.dataset.dichvu;
        const gia     = card.dataset.gia;

        document.getElementById('inputSoPhong').value  = sophong;
        document.getElementById('inputDichVu').value   = dichvu;
        document.getElementById('inputGiaPhong').value = gia;

        document.getElementById('modalOverlay').style.display = 'flex';
    });
});

// Đóng popup
document.getElementById('btnCloseModal').addEventListener('click', function () {
    document.getElementById('modalOverlay').style.display = 'none';
});

// Click ra ngoài cũng đóng popup
document.getElementById('modalOverlay').addEventListener('click', function (e) {
    if (e.target === this) {
        this.style.display = 'none';
    }
});
</script>

</body>
</html>
