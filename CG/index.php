<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก</title>
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
        background-image: url('../images/Gemini_Generated_Image_rbbsizrbbsizrbbs.png');
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
    
    /* สไตล์สำหรับส่วนแสดงรายชื่อผู้สูงอายุ */
    .elderly-section {
        margin: 2rem 0;
    }
    
    .elderly-card {
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    
    .elderly-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.15);
    }
    
    .elderly-image {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #fff;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    
    .elderly-name {
        font-weight: 600;
        color: #333;
        margin-bottom: 0.25rem;
    }
    
    .elderly-age {
        color: #666;
        font-size: 0.9rem;
    }
    
    .elderly-status {
        display: inline-block;
        padding: 0.25rem 0.75rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 500;
    }
    
    .status-normal {
        background-color: #e7f7ef;
        color: #0f9d58;
    }
    
    .status-care {
        background-color: #fff8e6;
        color: #f4b400;
    }
    
    .status-urgent {
        background-color: #fdeaea;
        color: #db4437;
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
</style>
<body style="font-family: 'Sarabun', sans-serif;">
    
  <?php include 'navbar.php' ?>

    <div class="container-fluid">
        <section class="text-center my-1 ">
          <br>
           <div class="profile-image mx-auto mb-3 bg-light rounded-circle d-flex align-items-center justify-content-center shadow-sm">
                <!-- <img src="https://scontent.futh1-1.fna.fbcdn.net/v/t39.30808-6/528889843_4242583999353614_5256576025221137006_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=BBrBNVObQwcQ7kNvwHSIbE6&_nc_oc=AdnlQDVvLAeELU93pF45r85npR-Wx1z3cBnAco_BLwdeN3iCDQOCZnszS-eJcRWrYms&_nc_zt=23&_nc_ht=scontent.futh1-1.fna&_nc_gid=sci9qHtLSTt9stDtyh1zqA&oh=00_AfigGgE63i5Vv59WSn3z2HesR9BKKjeoc9g-SgTKPZqhRQ&oe=692E539F" alt="ผู้ป่วยคนแรก"> -->
          </div>
            <h1 class="text-black fw-bold fs-3">สวัสดี อสม. สมร</h1>
        </section>

        <!-- เมนูหลัก -->
        <main class="container">
            <div class="row row-cols-2 row-cols-md-3 g-3">
                <!-- เมนูบันทึกข้อมูลผู้สูงอายุ - ปรับปรุงแล้ว -->
                <div class="col">
                    <a href="record_elderly.php" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
                        <i class="bi bi-person-badge fs-2 mb-2 text-primary"></i>
                        <div class="menu-label fw-normal">บันทึกข้อมูลผู้สูงอายุ</div>
                    </a>
                </div>
                
                <!-- เมนูอื่นๆ -->
                <div class="col">
                    <a href="record_visit.php" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
                        <i class="bi bi-house-door fs-2 mb-2 text-primary"></i> 
                        <div class="menu-label fw-normal">บันทึกเยี่ยมบ้าน</div>
                    </a>
                </div>
                <div class="col">
                    <a href="record_health.php" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
                        <i class="bi bi-heart-pulse fs-2 mb-2 text-primary"></i> 
                        <div class="menu-label fw-normal">บันทึกผลตรวจสุขภาพ</div>
                    </a>
                </div>
  
                <div class="col">
                    <a href="appointment.php" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
                        <i class="bi bi-calendar-check fs-2 mb-2 text-primary"></i> 
                        <div class="menu-label fw-normal">แจ้งปัญหา</div>
                    </a>
                </div>
                <div class="col">
                    <a href="take_medicine.php" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
                        <i class="bi bi-capsule fs-2 mb-2 text-primary"></i> 
                        <div class="menu-label fw-normal">แจ้งเตือนรับประทานยา</div>
                    </a>
                </div>
                <div class="col">
                    <a href="knowledge_base.php" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
                        <i class="bi bi-book fs-2 mb-2 text-primary"></i> 
                        <div class="menu-label fw-normal">คลังความรู้</div>
                    </a>
                </div>

                <div class="col">
                    <a href="health_report.php" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
                        <i class="bi bi-activity fs-2 mb-2 text-primary"></i>
                        <div class="menu-label fw-normal">รายงานสุขภาพ</div>
                    </a>
                </div>

                <div class="col">
                    <a href="communication.php" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
                        <i class="bi bi-chat-text fs-2 mb-2 text-primary"></i>
                        <div class="menu-label fw-normal">พูดคุยให้คำปรึกษา</div>
                    </a>
                </div>

                <div class="col">
                    <a href="manual.php" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
                        <i class="bi bi-question-circle fs-2 mb-2 text-primary"></i>
                        <div class="menu-label fw-normal">คู่มือการใช้งานระบบ</div>
                    </a>
                </div>
            </div>
        </main>

        <!-- ส่วนแสดงรายชื่อผู้สูงอายุที่ต้องดูแล - ย้ายมาอยู่ด้านล่าง -->
        <section class="elderly-section">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-dark">รายชื่อผู้สูงอายุที่ต้องดูแล (8 คน)</h2>
                    <a href="record_elderly.php" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>เพิ่มผู้สูงอายุ
                    </a>
                </div>
                
                <div class="row g-4">
                    <!-- ผู้สูงอายุคนที่ 1 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card elderly-card h-100">
                            <div class="card-body text-center p-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="สมชาย ใจดี" class="elderly-image mb-3">
                                <h5 class="elderly-name">สมชาย ใจดี</h5>
                                <p class="elderly-age">อายุ 72 ปี</p>
                                <span class="elderly-status status-normal">สุขภาพปกติ</span>
                                <div class="mt-3">
                                    <a href="elderly_detail.php?id=1" class="btn btn-sm view-details-btn">ดูรายละเอียด</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- ผู้สูงอายุคนที่ 2 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card elderly-card h-100">
                            <div class="card-body text-center p-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149072.png" alt="สมศรี เมืองดี" class="elderly-image mb-3">
                                <h5 class="elderly-name">สมศรี เมืองดี</h5>
                                <p class="elderly-age">อายุ 68 ปี</p>
                                <span class="elderly-status status-care">ต้องการดูแล</span>
                                <div class="mt-3">
                                    <a href="elderly_detail.php?id=2" class="btn btn-sm view-details-btn">ดูรายละเอียด</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- ผู้สูงอายุคนที่ 3 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card elderly-card h-100">
                            <div class="card-body text-center p-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="บุญมี รักดี" class="elderly-image mb-3">
                                <h5 class="elderly-name">บุญมี รักดี</h5>
                                <p class="elderly-age">อายุ 75 ปี</p>
                                <span class="elderly-status status-urgent">เร่งด่วน</span>
                                <div class="mt-3">
                                    <a href="elderly_detail.php?id=3" class="btn btn-sm view-details-btn">ดูรายละเอียด</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- ผู้สูงอายุคนที่ 4 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card elderly-card h-100">
                            <div class="card-body text-center p-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149072.png" alt="สำอาง งามดี" class="elderly-image mb-3">
                                <h5 class="elderly-name">สำอาง งามดี</h5>
                                <p class="elderly-age">อายุ 70 ปี</p>
                                <span class="elderly-status status-normal">สุขภาพปกติ</span>
                                <div class="mt-3">
                                    <a href="elderly_detail.php?id=4" class="btn btn-sm view-details-btn">ดูรายละเอียด</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- ผู้สูงอายุคนที่ 5 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card elderly-card h-100">
                            <div class="card-body text-center p-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="ขันทอง ใจงาม" class="elderly-image mb-3">
                                <h5 class="elderly-name">ขันทอง ใจงาม</h5>
                                <p class="elderly-age">อายุ 80 ปี</p>
                                <span class="elderly-status status-care">ต้องการดูแล</span>
                                <div class="mt-3">
                                    <a href="elderly_detail.php?id=5" class="btn btn-sm view-details-btn">ดูรายละเอียด</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- ผู้สูงอายุคนที่ 6 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card elderly-card h-100">
                            <div class="card-body text-center p-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149072.png" alt="สำราญ สบายดี" class="elderly-image mb-3">
                                <h5 class="elderly-name">สำราญ สบายดี</h5>
                                <p class="elderly-age">อายุ 65 ปี</p>
                                <span class="elderly-status status-normal">สุขภาพปกติ</span>
                                <div class="mt-3">
                                    <a href="elderly_detail.php?id=6" class="btn btn-sm view-details-btn">ดูรายละเอียด</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- ผู้สูงอายุคนที่ 7 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card elderly-card h-100">
                            <div class="card-body text-center p-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="บัวไข ฟ้าสวย" class="elderly-image mb-3">
                                <h5 class="elderly-name">บัวไข ฟ้าสวย</h5>
                                <p class="elderly-age">อายุ 78 ปี</p>
                                <span class="elderly-status status-care">ต้องการดูแล</span>
                                <div class="mt-3">
                                    <a href="elderly_detail.php?id=7" class="btn btn-sm view-details-btn">ดูรายละเอียด</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- ผู้สูงอายุคนที่ 8 -->
                    <div class="col-md-6 col-lg-3">
                        <div class="card elderly-card h-100">
                            <div class="card-body text-center p-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149072.png" alt="สายฝน ฝนตก" class="elderly-image mb-3">
                                <h5 class="elderly-name">สายฝน ฝนตก</h5>
                                <p class="elderly-age">อายุ 73 ปี</p>
                                <span class="elderly-status status-normal">สุขภาพปกติ</span>
                                <div class="mt-3">
                                    <a href="elderly_detail.php?id=8" class="btn btn-sm view-details-btn">ดูรายละเอียด</a>
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
</body>
</html>