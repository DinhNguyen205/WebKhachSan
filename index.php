<?php
  session_start();
  header('Content-Type: text/html; charset=utf-8');
?>

<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Khám phá du lịch Quy Nhơn: địa điểm nổi bật, khách sạn, phương tiện di chuyển, thời điểm lý tưởng để ghé thăm.">
  <title>Khám Phá Du Lịch Quy Nhơn</title>
  <link rel="stylesheet" href="Nhom3/TrangChu/css/thietketrangchu.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>
<body>
  <header>  
    <div class="logo"><strong>Khách Sạn Quy Nhơn</strong></div>
   <nav>
		<a href="Nhom3/DatPhong/datphong.php" class="link-transition">Đặt phòng</a>
		<a href="#lienhe">Liên hệ hỗ trợ</a>
	</nav>
    <div class="auth-buttons">
      <?php if (isset($_SESSION['fullname']) && !empty($_SESSION['fullname'])): ?> 
        <span style="font-weight: bold; color:#e6b478; padding: 8px; background-color:white; border: 2px solid transparent; border-radius: 8px;">
          <a href="Nhom3/TrangChu/mainpage/profile_edit.php" style="color: #e6b478; text-decoration: none;">
          <i class="fa-solid fa-user" style="color: #55abf7;"></i>
          <?= htmlspecialchars($_SESSION['fullname']) ?></span> 
       <a href="Nhom3/TrangChu/mainpage/logout.php" class="dangxuat">Đăng xuất</a>
      <?php else: ?>
        <a href="Nhom3/TrangChu/mainpage/dangky.php" class="dangky"> <i class="fa-solid fa-user" style="color: white;"></i> Đăng ký</a>
        <a href="Nhom3/TrangChu/mainpage/dangnhap.php" class="dangnhap"><i class="fa-solid fa-user" style="color: black;"></i>Đăng nhập</a>
      <?php endif; ?>
    </div>
  </header>

  <div class="container">
    <div class="content">
      <h1>Chào mừng đến với trang Khách Sạn Quy Nhơn năm 2025-2026</h1>
        <div style="text-align: center;">
          <img class="anhdautien" src="https://statics.vinpearl.com/khach-san-nha-trang-gan-bien-01_1648658145.jpg" alt="Quy Nhơn biển đẹp">
        </div>

      <section class="section-gioithieu" id="gioithieu">
        <h2>✨ Giới thiệu về khách sạn quy nhơn</h2>
        <p><strong>Khách Sạn Quy Nhơn</strong> là điểm dừng chân lý tưởng dành cho du khách muốn tận hưởng kỳ nghỉ trọn vẹn giữa lòng thành phố biển xinh đẹp. Với vị trí đắc địa gần biển, gần trung tâm và các địa điểm du lịch nổi tiếng, khách sạn mang đến không gian lưu trú sang trọng, tiện nghi và thân thiện.</p>
        <p>Khách sạn được thiết kế theo phong cách hiện đại kết hợp tinh tế với nét đẹp miền biển, tạo cảm giác thư giãn và thoải mái ngay từ khi du khách đặt chân đến. Mỗi phòng đều được trang bị đầy đủ tiện nghi cao cấp, hướng đến sự thoải mái tối đa cho khách lưu trú.</p>
        <div style="text-align: center;">
          <img class="anhthuhai" src="https://reviewnhatrang.com.vn/wp-content/uploads/2022/12/15-1024x576.jpg" alt="Quy Nhơn biển đẹp">
        </div>
        <p>Chúng tôi luôn đặt trải nghiệm của khách hàng làm ưu tiên hàng đầu: từ phòng ốc sạch sẽ, tiện nghi đến đội ngũ nhân viên chuyên nghiệp, tận tâm, sẵn sàng hỗ trợ 24/7.</p>
       </section>

        <section class="section-diemnoibat" id="diemnoibat">
        <h2>Những điểm nổi bật của khách sạn Quy Nhơn</h2>
            <h3>1. Vị trí tuyệt vời – Gần biển & trung tâm</h3>
            <div style="text-align: center;">
              <img class="anhthuba" src="https://daivietourist.vn/wp-content/uploads/2025/07/khach-san-da-nang-co-an-buffet-sang-1.jpg" alt="Quy Nhơn biển đẹp">
            </div>
            <p><strong>&bull;</strong> Chỉ vài phút đi bộ đến bãi biển Quy Nhơn.</p>
            <p><strong>&bull;</strong>  Gần chợ đêm, quảng trường, và khu ẩm thực hải sản.</p>
            <p><strong>&bull;</strong>  Thuận tiện di chuyển đến các điểm du lịch nổi tiếng như Kỳ Co, Eo Gió, Hòn Khô,…</p>
        
            <h3>2. Phòng nghỉ hiện đại – Sang trọng – Sạch sẽ</h3>
             <div style="text-align: center;">
              <img class="anhthuba" src="https://kenh14cdn.com/203336854389633024/2021/9/4/photo-1-16307465965921119690780.jpg" alt="Quy Nhơn biển đẹp">
            </div>
            <p><strong>&bull;</strong> Phòng rộng rãi, nội thất mới.</p>
            <p><strong>&bull;</strong> Giường nệm êm ái, máy lạnh, TV thông minh, minibar, Wi-Fi tốc độ cao..</p>
            <p><strong>&bull;</strong> Nhiều phòng có ban công ngắm biển hoặc view thành phố.</p>
        </section>
      <section class="section-tiennghi" id="tiennghi">
    <h3>Dịch Vụ Cho Kỳ Nghỉ Hoàn Hảo</h3>
    <ul>
           <div style="text-align: center;">
              <img class="anhthuba" src="https://deltech.vn/upload/images/laundry-la-gi%20(1).jpg" alt="Quy Nhơn biển đẹp">
            </div>
        <li>Dọn phòng hằng ngày, đảm bảo không gian luôn sạch sẽ</li>
        <li>Giặt ủi theo yêu cầu</li>
        <li>Hỗ trợ 24/7 tại quầy lễ tân</li>
    </ul>

    <h3>Nhà Hàng & Ẩm Thực</h3>
            <div style="text-align: center;">
              <img class="anhthuba" src="https://decoxdesign.com/upload/images/thiet-ke-noi-that-nha-hang-khach-san-02-decox-design.jpg" alt="Quy Nhơn biển đẹp">
            </div>
    <p>
        Khách sạn có khu vực nhà hàng phục vụ bữa sáng buffet và các món ăn đặc sản Bình Định.
        Không gian rộng rãi, thoáng mát, phù hợp cho gia đình, nhóm bạn và khách công tác.
    </p>
</section>

<section class="section-loaiphong" id="loaiphong">
    <h2>Các Loại Phòng Tại Khách Sạn Quy Nhơn</h2>

    <h3>Phòng Tiêu Chuẩn</h3>
    <p>
        Phù hợp cho 1–2 khách, được trang bị đầy đủ tiện nghi cơ bản, thiết kế đơn giản, ấm cúng,
        thích hợp cho chuyến công tác ngắn ngày hoặc du lịch tiết kiệm.
    </p>

    <h3>Phòng Gia Đình</h3>
    <p>
        Diện tích rộng rãi, có thể ở 3–4 người, không gian thoáng mát, mang lại sự thoải mái cho các gia đình
        hoặc nhóm bạn khi lưu trú tại Quy Nhơn.
    </p>

    <h3>Phòng Suite View Biển</h3>
    <p>
        Là hạng phòng cao cấp với tầm nhìn hướng biển, nội thất hiện đại, sang trọng. Đây là lựa chọn lý tưởng
        cho các cặp đôi hoặc những khách hàng muốn tận hưởng kỳ nghỉ đẳng cấp.
    </p>
</section>

<section class="section-uudai" id="uudai">
    <h2>Ưu Đãi & Khuyến Mãi</h2>
    <ul>
        <li>Giảm giá cho khách đặt phòng sớm trước ngày nhận phòng từ 14–30 ngày.</li>
        <li>Chương trình ưu đãi dành cho khách lưu trú từ 3 đêm trở lên.</li>
        <li>Combo phòng nghỉ kèm tour tham quan Kỳ Co – Eo Gió với giá ưu đãi.</li>
        <li>Giảm giá đặc biệt cho khách đoàn, công ty và khách tổ chức sự kiện.</li>
    </ul>
</section>

<section class="section-danhgia" id="danhgia">
    <h2>Vì Sao Nên Chọn Khách Sạn Quy Nhơn?</h2>
    <ul>
        <li>Vị trí đẹp – gần biển và trung tâm thành phố, thuận tiện di chuyển.</li>
        <li>Không gian sạch sẽ, hiện đại – phù hợp cho gia đình, cặp đôi và khách công tác.</li>
        <li>Nhân viên thân thiện, hỗ trợ tận tâm trong suốt thời gian lưu trú.</li>
        <li>Giá phòng hợp lý, thường xuyên có ưu đãi theo mùa.</li>
        <li>Dễ dàng kết nối các điểm du lịch nổi tiếng như Kỳ Co, Eo Gió, Hòn Khô, Cù Lao Xanh…</li>
    </ul>
</section>

<section class="section-faq" id="faq">
    <h2>Câu Hỏi Thường Gặp</h2>

    <h3>Giờ nhận phòng và trả phòng như thế nào?</h3>
    <p>Giờ nhận phòng từ 14:00 và trả phòng trước 12:00 trưa ngày hôm sau. Có thể linh hoạt tùy tình trạng phòng.</p>

    <h3>Khách sạn có bãi đỗ xe không?</h3>
    <p>Khách sạn có khu vực đỗ xe dành cho xe máy và ô tô nhỏ, miễn phí cho khách lưu trú.</p>

    <h3>Có phục vụ ăn sáng không?</h3>
    <p>Khách sạn phục vụ bữa sáng hằng ngày tại nhà hàng với các món ăn nhẹ, món Việt và đặc sản địa phương.</p>

    <h3>Có hỗ trợ đặt tour tham quan không?</h3>
    <p>Lễ tân hỗ trợ đặt tour tham quan Kỳ Co, Eo Gió, Hòn Khô và các điểm đến khác theo nhu cầu của khách.</p>
</section>
  </div>

  <div class="sidebar">
      <div class="sidebar-box">
        <h3>Trong bài viết này</h3>
        <ul>
          <li><a href="#gioithieu">1. Giới thiệu về Khách Sạn Quy Nhơn</a></li>
          <li><a href="#diemnoibat">2. Những điểm nổi bật ở Khách Sạn Quy Nhơn</a></li>
        </ul>
      </div>
    </div>

  </div>
   
<footer id="lienhe">
  <p>Liên hệ: Nhom3@gmail.com | SĐT: 0812301905</p>
  <p>&copy; 2025 Khách Sạn Quy Nhơn. Thiết kế bởi Nhóm 3.</p>
</footer>

</body>

</html>
