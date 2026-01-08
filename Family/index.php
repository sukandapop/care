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
    <link rel="stylesheet" href="./css/index.css">

</head>
<style>

  
</style>
<body  style="font-family: 'Sarabun', sans-serif;">
    
  <?php include 'navbar.php'   ?> 

    <div class="container-fluid">
        <section class="text-center my-1 ">
          <br>
           <div class="profile-image mx-auto mb-3 bg-light rounded-circle d-flex align-items-center justify-content-center shadow-sm">
                <!-- <img src="https://scontent.futh1-1.fna.fbcdn.net/v/t39.30808-6/528889843_4242583999353614_5256576025221137006_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=BBrBNVObQwcQ7kNvwHSIbE6&_nc_oc=AdnlQDVvLAeELU93pF45r85npR-Wx1z3cBnAco_BLwdeN3iCDQOCZnszS-eJcRWrYms&_nc_zt=23&_nc_ht=scontent.futh1-1.fna&_nc_gid=sci9qHtLSTt9stDtyh1zqA&oh=00_AfigGgE63i5Vv59WSn3z2HesR9BKKjeoc9g-SgTKPZqhRQ&oe=692E539F" alt="ผู้ป่วยคนแรก"> -->
          </div>
            <h4 class="text-black ">ผู้ดูแลในครอบครัว</h4>
            <h3 class="text-black fw-bold ">สวัสดีคุณดวงฤดี ชลปัญญา</h3>
        </section>

        <main class="container">
            <div class="row row-cols-2 row-cols-md-3 g-3">
                
                <div class="col">
                    <a href="take_medicine.php" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
                        <i class="bi bi-capsule fs-2 mb-2 text-primary"></i> 
                        <div class="menu-label fw-normal">รับประทานยา</div>
                    </a>
                </div>

                <div class="col">
                    <a href="appointment.php" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
                        <i class="bi bi-calendar-check fs-2 mb-2 text-primary"></i> 
                        <div class="menu-label fw-normal">นัดหมาย</div>
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

        <!-- ส่วนแสดงรายชื่อผู้สูงอายุที่ดูแล -->
        <section class="elderly-section">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h2 class="fw-bold text-dark">ผู้สูงอายุที่คุณดูแล (2 คน)</h2>
                    <div class="text-muted">
                        <i class="bi bi-info-circle me-1"></i>คุณสามารถดูข้อมูลได้เฉพาะผู้สูงอายุที่คุณดูแลเท่านั้น
                    </div>
                </div>
                
                <div class="row g-4">
                    <!-- ผู้สูงอายุคนที่ 1 -->
                    <div class="col-md-6">
                        <div class="card elderly-card h-100">
                            <div class="card-body text-center p-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="สมชาย ใจดี" class="elderly-image mb-3">
                                <h5 class="elderly-name">สมชาย ใจดี</h5>
                                <p class="elderly-age">อายุ 72 ปี</p>
                                <span class="elderly-relationship mb-2">บิดา</span>
                                <div class="mt-2 mb-3">
                                    <span class="elderly-status status-normal">สุขภาพปกติ</span>
                                </div>
                                <div class="mt-3">
                                    <a href="elderly_detail.php?id=1" class="btn btn-sm view-details-btn">ดูข้อมูลผู้สูงอายุ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- ผู้สูงอายุคนที่ 2 -->
                    <div class="col-md-6">
                        <div class="card elderly-card h-100">
                            <div class="card-body text-center p-4">
                                <img src="https://cdn-icons-png.flaticon.com/512/149/149072.png" alt="สมศรี เมืองดี" class="elderly-image mb-3">
                                <h5 class="elderly-name">สมศรี เมืองดี</h5>
                                <p class="elderly-age">อายุ 68 ปี</p>
                                <span class="elderly-relationship mb-2">มารดา</span>
                                <div class="mt-2 mb-3">
                                    <span class="elderly-status status-care">ต้องการดูแลเป็นพิเศษ</span>
                                </div>
                                <div class="mt-3">
                                    <a href="elderly_detail.php?id=2" class="btn btn-sm view-details-btn">ดูข้อมูลผู้สูงอายุ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- ข้อมูลสรุป -->
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="card bg-light border-0">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3"><i class="bi bi-heart-pulse text-primary me-2"></i>สถานะสุขภาพโดยรวม</h6>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>สุขภาพปกติ</span>
                                    <span class="fw-bold">1 คน</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span>ต้องการดูแลเป็นพิเศษ</span>
                                    <span class="fw-bold">1 คน</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span>เร่งด่วน</span>
                                    <span class="fw-bold">0 คน</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card bg-light border-0">
                            <div class="card-body">
                                <h6 class="fw-bold mb-3"><i class="bi bi-calendar-check text-primary me-2"></i>นัดหมายล่าสุด</h6>
                                <div class="mb-2">
                                    <div class="small text-muted">20 พ.ย. 2023</div>
                                    <div class="fw-medium">สมชาย ใจดี - นัดตรวจสุขภาพประจำปี</div>
                                </div>
                                <div>
                                    <div class="small text-muted">22 พ.ย. 2023</div>
                                    <div class="fw-medium">สมศรี เมืองดี - เยี่ยมบ้านโดยอสม.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    
    <?php include 'footer.php'   ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        
    

</body>
</html>