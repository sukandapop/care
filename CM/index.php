<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลักเจ้าหน้าที่สาธารณสุข</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&family=Noto+Sans+Thai:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="custom-styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../css/index.css">
</head>
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    :root {
        --primary: #4361ee;
        --secondary: #3f37c9;
        --success: #4cc9f0;
        --info: #36b9cc;
        --warning: #f6c23e;
        --danger: #e74a3b;
        --light: #f8f9fa;
        --dark: #212529;
        --purple: #7209b7;
        --teal: #20c997;
        --pink: #e83e8c;
        --cyan: #0dcaf0;
        --mango: #FFC107;
        --mango-dark: #E6A000;
    }

    .body  {
        background: linear-gradient(135deg, rgb(34, 171, 250) 0%, #ffffffff 100%);
        font-family: 'Kanit', sans-serif;
    }

    /* ลบขีดเส้นใต้และกำหนดรูปแบบลิงก์สำหรับเมนู */
    .menu-item {
        text-decoration: none;
        color: #000;
        transition: transform 0.2s, box-shadow 0.2s;
        border: none;
    }

    /* Effect เมื่อวางเมาส์เหนือปุ่ม */
    .menu-item:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2) !important;
    }

    /* ปรับสีพื้นหลังหลัก */
    .bg-primary {
        background-color: var(--info);
    }

    .profile-image {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        background-image: url('../images/HP.png');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        margin: 0 auto 3px auto;
        background-color: lightblue;
        box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    /* สไตล์สำหรับส่วนแสดงรายชื่ออสม. */
    .vhw-section {
        margin: 2rem 0;
    }
    
    .vhw-card {
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .vhw-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.15);
    }
    
    .vhw-image {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #fff;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .vhw-name {
        font-weight: 600;
        color: #333;
        margin-bottom: 0.25rem;
    }
    
    .vhw-code {
        color: #666;
        font-size: 0.9rem;
    }
    
    .vhw-status {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }
    
    .status-active {
        background-color: #e7f7ef;
        color: #0f9d58;
    }
    
    .status-inactive {
        background-color: #fff8e6;
        color: #f4b400;
    }
    
    /* ปรับปรุงสไตล์ปุ่ม view-details-btn */
    .view-details-btn {
        background-color: #002efa !important;
        border: none !important;
        border-radius: 20px !important;
        padding: 0.4rem 1rem !important;
        font-size: 0.85rem !important;
        transition: all 0.3s ease !important;
        color: white !important;
    }
    
    .view-details-btn:hover {
        background-color: #0020c0 !important;
        transform: translateY(-2px) !important;
    }
    
    /* สไตล์สำหรับรายชื่อผู้ป่วยในอสม. */
    .patients-list {
        margin-top: 1rem;
        padding: 0.5rem;
        background-color: #f8f9fa;
        border-radius: 8px;
        max-height: 150px;
        overflow-y: auto;
    }
    
    .patient-item {
        display: flex;
        align-items: center;
        padding: 0.5rem;
        border-bottom: 1px solid #e9ecef;
    }
    
    .patient-item:last-child {
        border-bottom: none;
    }
    
    .patient-avatar {
        width: 35px;
        height: 35px;
        border-radius: 50%;
        background-color: #dee2e6;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.8rem;
        color: #495057;
        margin-right: 0.5rem;
    }
    
    .patient-info {
        flex: 1;
    }
    
    .patient-name {
        font-size: 0.85rem;
        font-weight: 500;
        margin-bottom: 0.1rem;
    }
    
    .patient-age {
        font-size: 0.75rem;
        color: #6c757d;
    }
    
    .patient-health {
        font-size: 0.7rem;
        color: #dc3545;
        font-weight: 500;
    }
    
    /* สไตล์สำหรับสถิติอสม. */
    .vhw-stats {
        display: flex;
        justify-content: space-between;
        margin: 1rem 0;
        padding: 0.5rem 0;
        border-top: 1px solid #e9ecef;
        border-bottom: 1px solid #e9ecef;
    }
    
    .stat-item {
        text-align: center;
        flex: 1;
    }
    
    .stat-number {
        font-weight: 700;
        font-size: 1.2rem;
        color: var(--primary);
    }
    
    .stat-label {
        font-size: 0.7rem;
        color: #6c757d;
    }
</style>
<body style="font-family: 'Sarabun', sans-serif;">
    
<?php include 'navbar.php'; ?>

    <div class="container-fluid">
        <section class="text-center my-1 ">
          <br>
           <div class="profile-image mx-auto mb-3 bg-light rounded-circle d-flex align-items-center justify-content-center shadow-sm">
                <!-- <img src="https://scontent.futh1-1.fna.fbcdn.net/v/t39.30808-6/528889843_4242583999353614_5256576025221137006_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=BBrBNVObQwcQ7kNvwHSIbE6&_nc_oc=AdnlQDVvLAeELU93pF45r85npR-Wx1z3cBnAco_BLwdeN3iCDQOCZnszS-eJcRWrYms&_nc_zt=23&_nc_ht=scontent.futh1-1.fna&_nc_gid=sci9qHtLSTt9stDtyh1zqA&oh=00_AfigGgE63i5Vv59WSn3z2HesR9BKKjeoc9g-SgTKPZqhRQ&oe=692E539F" alt="ผู้ป่วยคนแรก"> -->
          </div>
            <h1 class="text-black fw-bold fs-3">สวัสดี นายแพทย์ สมชาย ใจดี</h1>
            <p class="text-muted">เจ้าหน้าที่สาธารณสุข (CM)</p>
        </section>

        <!-- เมนูหลักสำหรับ CM -->
        <main class="container">
            <div class="row row-cols-2 row-cols-md-3 g-3">
                <!-- เมนูจัดการอสม. -->
                <div class="col">
                    <a href="cm_manage_vhw.php" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
                        <i class="bi bi-people fs-2 mb-2 text-primary"></i>
                        <div class="menu-label fw-normal">จัดการอสม.</div>
                    </a>
                </div>
                
                <!-- เมนูดูรายงาน -->
                <div class="col">
                    <a href="cm_reports.php" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
                        <i class="bi bi-bar-chart fs-2 mb-2 text-primary"></i> 
                        <div class="menu-label fw-normal">ดูรายงาน</div>
                    </a>
                </div>
                <div class="col">
                    <a href="cm_health_data.php" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
                        <i class="bi bi-clipboard-data fs-2 mb-2 text-primary"></i> 
                        <div class="menu-label fw-normal">ข้อมูลสุขภาพ</div>
                    </a>
                </div>
  
                <div class="col">
                    <a href="cm_problems.php" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
                        <i class="bi bi-exclamation-triangle fs-2 mb-2 text-primary"></i> 
                        <div class="menu-label fw-normal">ปัญหาที่รายงาน</div>
                    </a>
                </div>
                <div class="col">
                    <a href="cm_medications.php" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
                        <i class="bi bi-capsule fs-2 mb-2 text-primary"></i> 
                        <div class="menu-label fw-normal">การให้ยา</div>
                    </a>
                </div>
                <div class="col">
                    <a href="cm_knowledge.php" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
                        <i class="bi bi-journal-text fs-2 mb-2 text-primary"></i> 
                        <div class="menu-label fw-normal">คลังความรู้</div>
                    </a>
                </div>

                <div class="col">
                    <a href="cm_appointments.php" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
                        <i class="bi bi-calendar-check fs-2 mb-2 text-primary"></i>
                        <div class="menu-label fw-normal">นัดหมาย</div>
                    </a>
                </div>

                <div class="col">
                    <a href="cm_chat.php" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
                        <i class="bi bi-chat-dots fs-2 mb-2 text-primary"></i>
                        <div class="menu-label fw-normal">พูดคุยกับอสม.</div>
                    </a>
                </div>

                <div class="col">
                    <a href="cm_settings.php" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
                        <i class="bi bi-gear fs-2 mb-2 text-primary"></i>
                        <div class="menu-label fw-normal">ตั้งค่าระบบ</div>
                    </a>
                </div>
            </div>
        </main>

        <!-- ส่วนแสดงรายชื่ออสม. ที่ดูแลอยู่ -->
        <section class="vhw-section">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-dark">รายชื่ออสม. ที่ดูแล (8 คน)</h2>
                    <a href="cm_add_vhw.php" class="btn btn-primary">
                        <i class="bi bi-person-plus me-2"></i>เพิ่มอสม.
                    </a>
                </div>
                
                <div class="row g-4">
                    <!-- อสม. คนที่ 1 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card vhw-card h-100">
                            <div class="card-body text-center p-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="สมร นามสมมติ" class="vhw-image mb-3">
                                <h5 class="vhw-name">สมร นามสมมติ</h5>
                                <p class="vhw-code">รหัส: VHW001</p>
                                <span class="vhw-status status-active">กำลังปฏิบัติงาน</span>
                                
                                <div class="vhw-stats">
                                    <div class="stat-item">
                                        <div class="stat-number">8</div>
                                        <div class="stat-label">ผู้ดูแล</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-number">12</div>
                                        <div class="stat-label">เยี่ยมบ้าน</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-number">1</div>
                                        <div class="stat-label">ปัญหา</div>
                                    </div>
                                </div>
                                
                                <div class="patients-list">
                                    <div class="patient-item">
                                        <div class="patient-avatar">ส</div>
                                        <div class="patient-info">
                                            <div class="patient-name">สมชาย ใจดี</div>
                                            <div class="patient-age">72 ปี</div>
                                        </div>
                                        <div class="patient-health">ปกติ</div>
                                    </div>
                                    <div class="patient-item">
                                        <div class="patient-avatar">ส</div>
                                        <div class="patient-info">
                                            <div class="patient-name">สมศรี เมืองดี</div>
                                            <div class="patient-age">68 ปี</div>
                                        </div>
                                        <div class="patient-health">ดูแล</div>
                                    </div>
                                    <div class="patient-item">
                                        <div class="patient-avatar">บ</div>
                                        <div class="patient-info">
                                            <div class="patient-name">บุญมี รักดี</div>
                                            <div class="patient-age">75 ปี</div>
                                        </div>
                                        <div class="patient-health">ด่วน</div>
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <a href="vhw_detail.php?id=1" class="btn btn-sm view-details-btn">ดูรายละเอียด</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- อสม. คนที่ 2 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card vhw-card h-100">
                            <div class="card-body text-center p-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149072.png" alt="กาญจน์ ดีพร้อม" class="vhw-image mb-3">
                                <h5 class="vhw-name">กาญจน์ ดีพร้อม</h5>
                                <p class="vhw-code">รหัส: VHW002</p>
                                <span class="vhw-status status-active">กำลังปฏิบัติงาน</span>
                                
                                <div class="vhw-stats">
                                    <div class="stat-item">
                                        <div class="stat-number">6</div>
                                        <div class="stat-label">ผู้ดูแล</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-number">8</div>
                                        <div class="stat-label">เยี่ยมบ้าน</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-number">0</div>
                                        <div class="stat-label">ปัญหา</div>
                                    </div>
                                </div>
                                
                                <div class="patients-list">
                                    <div class="patient-item">
                                        <div class="patient-avatar">ส</div>
                                        <div class="patient-info">
                                            <div class="patient-name">สำอาง งามดี</div>
                                            <div class="patient-age">70 ปี</div>
                                        </div>
                                        <div class="patient-health">ปกติ</div>
                                    </div>
                                    <div class="patient-item">
                                        <div class="patient-avatar">ข</div>
                                        <div class="patient-info">
                                            <div class="patient-name">ขันทอง ใจงาม</div>
                                            <div class="patient-age">80 ปี</div>
                                        </div>
                                        <div class="patient-health">ดูแล</div>
                                    </div>
                                    <div class="patient-item">
                                        <div class="patient-avatar">ส</div>
                                        <div class="patient-info">
                                            <div class="patient-name">สำราญ สบายดี</div>
                                            <div class="patient-age">65 ปี</div>
                                        </div>
                                        <div class="patient-health">ปกติ</div>
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <a href="vhw_detail.php?id=2" class="btn btn-sm view-details-btn">ดูรายละเอียด</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- อสม. คนที่ 3 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card vhw-card h-100">
                            <div class="card-body text-center p-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="บุญมี รักงาน" class="vhw-image mb-3">
                                <h5 class="vhw-name">บุญมี รักงาน</h5>
                                <p class="vhw-code">รหัส: VHW003</p>
                                <span class="vhw-status status-active">กำลังปฏิบัติงาน</span>
                                
                                <div class="vhw-stats">
                                    <div class="stat-item">
                                        <div class="stat-number">5</div>
                                        <div class="stat-label">ผู้ดูแล</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-number">10</div>
                                        <div class="stat-label">เยี่ยมบ้าน</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-number">2</div>
                                        <div class="stat-label">ปัญหา</div>
                                    </div>
                                </div>
                                
                                <div class="patients-list">
                                    <div class="patient-item">
                                        <div class="patient-avatar">บ</div>
                                        <div class="patient-info">
                                            <div class="patient-name">บัวไข ฟ้าสวย</div>
                                            <div class="patient-age">78 ปี</div>
                                        </div>
                                        <div class="patient-health">ดูแล</div>
                                    </div>
                                    <div class="patient-item">
                                        <div class="patient-avatar">ส</div>
                                        <div class="patient-info">
                                            <div class="patient-name">สายฝน ฝนตก</div>
                                            <div class="patient-age">73 ปี</div>
                                        </div>
                                        <div class="patient-health">ปกติ</div>
                                    </div>
                                    <div class="patient-item">
                                        <div class="patient-avatar">ช</div>
                                        <div class="patient-info">
                                            <div class="patient-name">ชัยชนะ มีดี</div>
                                            <div class="patient-age">69 ปี</div>
                                        </div>
                                        <div class="patient-health">ปกติ</div>
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <a href="vhw_detail.php?id=3" class="btn btn-sm view-details-btn">ดูรายละเอียด</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- อสม. คนที่ 4 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card vhw-card h-100">
                            <div class="card-body text-center p-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149072.png" alt="รุ่งโรจน์ ใสสะอาด" class="vhw-image mb-3">
                                <h5 class="vhw-name">รุ่งโรจน์ ใสสะอาด</h5>
                                <p class="vhw-code">รหัส: VHW004</p>
                                <span class="vhw-status status-inactive">พักงานชั่วคราว</span>
                                
                                <div class="vhw-stats">
                                    <div class="stat-item">
                                        <div class="stat-number">7</div>
                                        <div class="stat-label">ผู้ดูแล</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-number">15</div>
                                        <div class="stat-label">เยี่ยมบ้าน</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-number">1</div>
                                        <div class="stat-label">ปัญหา</div>
                                    </div>
                                </div>
                                
                                <div class="patients-list">
                                    <div class="patient-item">
                                        <div class="patient-avatar">พ</div>
                                        <div class="patient-info">
                                            <div class="patient-name">พร้อมพงษ์ สมหวัง</div>
                                            <div class="patient-age">71 ปี</div>
                                        </div>
                                        <div class="patient-health">ปกติ</div>
                                    </div>
                                    <div class="patient-item">
                                        <div class="patient-avatar">ส</div>
                                        <div class="patient-info">
                                            <div class="patient-name">สายสมร ใจดี</div>
                                            <div class="patient-age">67 ปี</div>
                                        </div>
                                        <div class="patient-health">ดูแล</div>
                                    </div>
                                    <div class="patient-item">
                                        <div class="patient-avatar">อ</div>
                                        <div class="patient-info">
                                            <div class="patient-name">อารี หวังดี</div>
                                            <div class="patient-age">74 ปี</div>
                                        </div>
                                        <div class="patient-health">ปกติ</div>
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <a href="vhw_detail.php?id=4" class="btn btn-sm view-details-btn">ดูรายละเอียด</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- อสม. คนที่ 5 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card vhw-card h-100">
                            <div class="card-body text-center p-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="วิไล รักดี" class="vhw-image mb-3">
                                <h5 class="vhw-name">วิไล รักดี</h5>
                                <p class="vhw-code">รหัส: VHW005</p>
                                <span class="vhw-status status-active">กำลังปฏิบัติงาน</span>
                                
                                <div class="vhw-stats">
                                    <div class="stat-item">
                                        <div class="stat-number">4</div>
                                        <div class="stat-label">ผู้ดูแล</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-number">6</div>
                                        <div class="stat-label">เยี่ยมบ้าน</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-number">0</div>
                                        <div class="stat-label">ปัญหา</div>
                                    </div>
                                </div>
                                
                                <div class="patients-list">
                                    <div class="patient-item">
                                        <div class="patient-avatar">น</div>
                                        <div class="patient-info">
                                            <div class="patient-name">นพดล ใจเย็น</div>
                                            <div class="patient-age">76 ปี</div>
                                        </div>
                                        <div class="patient-health">ปกติ</div>
                                    </div>
                                    <div class="patient-item">
                                        <div class="patient-avatar">ส</div>
                                        <div class="patient-info">
                                            <div class="patient-name">สุนีย์ สวยงาม</div>
                                            <div class="patient-age">64 ปี</div>
                                        </div>
                                        <div class="patient-health">ปกติ</div>
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <a href="vhw_detail.php?id=5" class="btn btn-sm view-details-btn">ดูรายละเอียด</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- อสม. คนที่ 6 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card vhw-card h-100">
                            <div class="card-body text-center p-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149072.png" alt="สมหมาย ตั้งใจ" class="vhw-image mb-3">
                                <h5 class="vhw-name">สมหมาย ตั้งใจ</h5>
                                <p class="vhw-code">รหัส: VHW006</p>
                                <span class="vhw-status status-active">กำลังปฏิบัติงาน</span>
                                
                                <div class="vhw-stats">
                                    <div class="stat-item">
                                        <div class="stat-number">6</div>
                                        <div class="stat-label">ผู้ดูแล</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-number">9</div>
                                        <div class="stat-label">เยี่ยมบ้าน</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-number">1</div>
                                        <div class="stat-label">ปัญหา</div>
                                    </div>
                                </div>
                                
                                <div class="patients-list">
                                    <div class="patient-item">
                                        <div class="patient-avatar">ป</div>
                                        <div class="patient-info">
                                            <div class="patient-name">ประเสริฐ ดีเด่น</div>
                                            <div class="patient-age">79 ปี</div>
                                        </div>
                                        <div class="patient-health">ดูแล</div>
                                    </div>
                                    <div class="patient-item">
                                        <div class="patient-avatar">ส</div>
                                        <div class="patient-info">
                                            <div class="patient-name">สมบูรณ์ แข็งแรง</div>
                                            <div class="patient-age">66 ปี</div>
                                        </div>
                                        <div class="patient-health">ปกติ</div>
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <a href="vhw_detail.php?id=6" class="btn btn-sm view-details-btn">ดูรายละเอียด</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- อสม. คนที่ 7 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card vhw-card h-100">
                            <div class="card-body text-center p-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="อำนวย สบายดี" class="vhw-image mb-3">
                                <h5 class="vhw-name">อำนวย สบายดี</h5>
                                <p class="vhw-code">รหัส: VHW007</p>
                                <span class="vhw-status status-active">กำลังปฏิบัติงาน</span>
                                
                                <div class="vhw-stats">
                                    <div class="stat-item">
                                        <div class="stat-number">5</div>
                                        <div class="stat-label">ผู้ดูแล</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-number">7</div>
                                        <div class="stat-label">เยี่ยมบ้าน</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-number">0</div>
                                        <div class="stat-label">ปัญหา</div>
                                    </div>
                                </div>
                                
                                <div class="patients-list">
                                    <div class="patient-item">
                                        <div class="patient-avatar">ว</div>
                                        <div class="patient-info">
                                            <div class="patient-name">วาสนา มีสุข</div>
                                            <div class="patient-age">77 ปี</div>
                                        </div>
                                        <div class="patient-health">ปกติ</div>
                                    </div>
                                    <div class="patient-item">
                                        <div class="patient-avatar">พ</div>
                                        <div class="patient-info">
                                            <div class="patient-name">พงษ์ศักดิ์ ใหญ่โต</div>
                                            <div class="patient-age">81 ปี</div>
                                        </div>
                                        <div class="patient-health">ดูแล</div>
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <a href="vhw_detail.php?id=7" class="btn btn-sm view-details-btn">ดูรายละเอียด</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- อสม. คนที่ 8 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card vhw-card h-100">
                            <div class="card-body text-center p-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149072.png" alt="รัตนา ใสสะอาด" class="vhw-image mb-3">
                                <h5 class="vhw-name">รัตนา ใสสะอาด</h5>
                                <p class="vhw-code">รหัส: VHW008</p>
                                <span class="vhw-status status-active">กำลังปฏิบัติงาน</span>
                                
                                <div class="vhw-stats">
                                    <div class="stat-item">
                                        <div class="stat-number">5</div>
                                        <div class="stat-label">ผู้ดูแล</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-number">8</div>
                                        <div class="stat-label">เยี่ยมบ้าน</div>
                                    </div>
                                    <div class="stat-item">
                                        <div class="stat-number">1</div>
                                        <div class="stat-label">ปัญหา</div>
                                    </div>
                                </div>
                                
                                <div class="patients-list">
                                    <div class="patient-item">
                                        <div class="patient-avatar">ร</div>
                                        <div class="patient-info">
                                            <div class="patient-name">รุ่งเรือง ก้าวหน้า</div>
                                            <div class="patient-age">70 ปี</div>
                                        </div>
                                        <div class="patient-health">ปกติ</div>
                                    </div>
                                    <div class="patient-item">
                                        <div class="patient-avatar">ธ</div>
                                        <div class="patient-info">
                                            <div class="patient-name">ธนากร มีเงิน</div>
                                            <div class="patient-age">85 ปี</div>
                                        </div>
                                        <div class="patient-health">ด่วน</div>
                                    </div>
                                </div>
                                
                                <div class="mt-3">
                                    <a href="vhw_detail.php?id=8" class="btn btn-sm view-details-btn">ดูรายละเอียด</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <?php include 'footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // เพิ่มฟังก์ชัน JavaScript สำหรับ CM
        document.addEventListener('DOMContentLoaded', function() {
            // เพิ่มเอฟเฟกต์เมื่อ hover บนการ์ดอสม.
            const vhwCards = document.querySelectorAll('.vhw-card');
            vhwCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                    this.style.boxShadow = '0 8px 16px rgba(0,0,0,0.15)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                    this.style.boxShadow = '0 4px 8px rgba(0,0,0,0.1)';
                });
            });
            
            // จำลองการอัพเดตสถานะอสม.
            function updateVHWStatus() {
                // ในระบบจริงจะดึงข้อมูลจาก API
                console.log('อัพเดตสถานะอสม...');
            }
            
            // อัพเดตสถานะทุก 60 วินาที
            setInterval(updateVHWStatus, 60000);
            
            // เพิ่มการคลิกที่ปุ่มดูรายละเอียด
            const viewButtons = document.querySelectorAll('.view-details-btn');
            viewButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    // ในระบบจริงจะนำไปยังหน้าข้อมูลอสม.
                    console.log('ไปยังหน้ารายละเอียดอสม.');
                });
            });
        });
    </script>
</body>
</html>