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
      <a href="WebKhachSan/Nhom3/DatPhong/DatPhong.php">Đặt phòng</a>
      <a href="#lienhe">Liên hệ hỗ trợ</a>
    </nav>
    <div class="auth-buttons">
      <?php if (isset($_SESSION['fullname']) && !empty($_SESSION['fullname'])): ?> 
        <span style="font-weight: bold; color:#e6b478; padding: 8px; background-color:white; border: 2px solid transparent; border-radius: 8px;">
          <a href="Nhom3/TrangChu/mainpage/profile_edit.php" style="color: #e6b478; text-decoration: none;">
          <i class="fa-solid fa-user" style="color: #55abf7;"></i>
          <?= htmlspecialchars($_SESSION['fullname']) ?></span> 
       <a href="WebKhachSan/Nhom3/TrangChu/main page/logout.php" class="dangxuat">Đăng xuất</a>
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
        <h3>🌆 Khám Phá Thành Phố Biển Quy Nhơn:</h3>
        <p><strong>Quy Nhơn</strong> – viên ngọc xanh của miền Trung, là thành phố biển tuyệt đẹp thuộc tỉnh Bình Định. Với vẻ đẹp hoang sơ, nước biển xanh biếc, bãi cát trắng mịn và nhịp sống thanh bình, nơi đây đang dần trở thành điểm đến yêu thích của du khách trong và ngoài nước.</p>
        <p>Tọa lạc tại vị trí lý tưởng giữa miền Trung, Quy Nhơn cách Hà Nội khoảng 1.065 km, cách TP. Hồ Chí Minh 650 km, Đà Nẵng 323 km và chỉ 165 km từ thành phố Pleiku. Dù bạn đến từ đâu, hành trình khám phá Quy Nhơn luôn đáng giá từng khoảnh khắc.</p>
        <p>Với bề dày lịch sử, Quy Nhơn từng là vùng đất của vương quốc Champa cổ đại. Ngày nay, dấu ấn văn hóa Chăm vẫn hiện diện qua những đền tháp, di tích cổ kính. Sau năm 1975, Quy Nhơn được nâng cấp thành thành phố vào năm 1986, và đến năm 2010 chính thức trở thành đô thị loại I. Năm 2015, tạp chí Rough Guides (Anh) bình chọn Quy Nhơn là điểm đến hàng đầu Đông Nam Á, và năm 2020 tiếp tục góp mặt trong top 20 điểm đến hấp dẫn nhất thế giới do Hostelworld bình chọn.</p>
        <div style="text-align: center;">
          <img class="anhthuhai" src="https://reviewnhatrang.com.vn/wp-content/uploads/2022/12/15-1024x576.jpg" alt="Quy Nhơn biển đẹp">
        </div>
        <h3>🌤️ Địa Hình & Khí Hậu – Món Quà Từ Thiên Nhiên:</h3>
        <p>Quy Nhơn sở hữu địa hình đa dạng với sự kết hợp hài hòa giữa núi, đồi, đồng bằng, biển cả và các đảo nhỏ. Bạn có thể khám phá <strong>núi Đen</strong> hùng vĩ, <strong>rừng nguyên sinh đèo Cù Mông</strong>, <strong>Đầm Thị Nại</strong> thơ mộng, <strong>Hồ Sinh Thái</strong> hay <strong>bán đảo Phương Mai</strong> nổi bật bên biển xanh. Đặc biệt, <strong>đảo Nhơn Châu (Cù lao Xanh)</strong> như một bức tranh thiên nhiên kỳ vĩ, là điểm đến không thể bỏ lỡ.</p>
        <p>Với đường bờ biển dài hơn 70km và hệ sinh thái biển phong phú, Quy Nhơn không chỉ nổi tiếng về cảnh quan mà còn là nơi phát triển mạnh về nuôi trồng, đánh bắt thủy sản và du lịch sinh thái biển.</p>
        <p>Khí hậu nơi đây chia làm hai mùa rõ rệt: <strong>mùa khô</strong> từ tháng 3 đến tháng 9, lý tưởng cho các hoạt động du lịch, và <strong>mùa mưa</strong> từ tháng 10 đến tháng 2 năm sau. Nhiệt độ trung bình quanh năm khoảng 28°C, thời tiết dễ chịu, nắng vàng rực rỡ – lý tưởng cho chuyến đi nghỉ dưỡng hoặc khám phá.</p>  
       </section>

        <section class="section-diemnoibat" id="diemnoibat">
        <h2>🗺️Những điểm nổi bật của khách sạn Quy Nhơn</h2>
            <h3>🏝️1. Kỳ Co – Thiên đường biển đảo</h3>
            <div style="text-align: center;">
              <img class="anhthuba" src="https://daivietourist.vn/wp-content/uploads/2025/07/khach-san-da-nang-co-an-buffet-sang-1.jpg" alt="Quy Nhơn biển đẹp">
            </div>
            <p><strong>&bull;</strong> Được mệnh danh là “Maldives của Việt Nam”, bãi Kỳ Co với làn nước xanh ngọc, bãi cát trắng mịn và những rạn san hô rực rỡ là điểm check-in hàng đầu khi đến Quy Nhơn.</p>
            <p><strong>&bull;</strong> Kỳ Co nằm cách trung tâm thành phố Quy Nhơn khoảng 25km, thuộc xã Nhơn Lý, là một trong những bãi biển đẹp nhất miền Trung. Với nước biển trong xanh hai màu rõ rệt, cát trắng mịn và những ghềnh đá kỳ vĩ, Kỳ Co được ví như “Maldives của Việt Nam”.</p>
            <h4><strong>🌊 Điều gì khiến Kỳ Co trở thành điểm đến không thể bỏ lỡ?</strong></h4>
            <p><strong>&bull; Bãi biển hoang sơ tuyệt đẹp </strong>với màu nước chuyển từ xanh ngọc đến xanh đậm.</p>
            <p><strong>&bull; Những hồ nước tự nhiên</strong> giữa các ghềnh đá độc đáo.</p>
            <p><strong>&bull; Thích hợp cho các hoạt động như:</strong> tắm biển, lặn ngắm san hô, chèo kayak, flycam, check-in sống ảo.</p>
            <p><strong>&bull; Nhiều tour kết hợp Eo Gió – Kỳ Co</strong> trong ngày, có cả đi ca nô hoặc đường bộ</p>
            <h4><strong>🚤 Cách đi Kỳ Co:</strong></h4>
            <p><strong>&bull; Từ TP. Quy Nhơn → đến bến Nhơn Lý → đi ca nô ra đảo (15 phút)</strong> hoặc đi đường bộ bằng xe trung chuyển qua đèo Eo Gió (đường mới, đẹp)</p>
            <p><strong>&bull;</strong> Nên đi từ sáng sớm để tận hưởng trọn vẹn vẻ đẹp trong lành của biển.</p>
        </section>
      <section class="section-tiennghi" id="tiennghi">
    <h2>Tiện Nghi & Dịch Vụ Tại Khách Sạn Quy Nhơn</h2>

    <h3>Phòng Nghỉ Hiện Đại – Tiện Nghi Đầy Đủ</h3>
    <p>
        Hệ thống phòng nghỉ tại Khách Sạn Quy Nhơn được thiết kế theo phong cách sang trọng và ấm cúng,
        phù hợp cho gia đình, cặp đôi và khách công tác. Mỗi phòng đều được trang bị:
    </p>
    <ul>
        <li>Giường nệm cao cấp, mềm mại và sạch sẽ</li>
        <li>Điều hòa 2 chiều hiện đại</li>
        <li>Smart TV màn hình lớn</li>
        <li>Wi-Fi tốc độ cao miễn phí</li>
        <li>Tủ lạnh mini – nước uống miễn phí</li>
        <li>Phòng tắm riêng với nước nóng 24/7</li>
        <li>Ban công view biển (tùy loại phòng)</li>
    </ul>

    <h3>Dịch Vụ Cho Kỳ Nghỉ Hoàn Hảo</h3>
    <ul>
        <li>Dọn phòng hằng ngày, đảm bảo không gian luôn sạch sẽ</li>
        <li>Giặt ủi theo yêu cầu</li>
        <li>Đưa đón sân bay Quy Nhơn</li>
        <li>Thuê xe máy – xe ô tô thuận tiện khám phá thành phố</li>
        <li>Đặt tour Kỳ Co, Eo Gió, Hòn Khô trực tiếp tại lễ tân</li>
        <li>Hỗ trợ 24/7 tại quầy lễ tân</li>
    </ul>

    <h3>Nhà Hàng & Ẩm Thực</h3>
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
