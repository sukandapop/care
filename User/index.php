<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&family=Noto+Sans+Thai:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="custom-styles.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  
       <link rel="stylesheet" href="../css/index.css">

</head>
<body class="bg-primary text-black" style="font-family: 'Sarabun', sans-serif;">
    
  <?php include 'navbar.php'   ?>

    <div class="container-fluid"  min-height: 100vh; padding-bottom: 70px; >
        <section class="text-center my-1 ">
          <br>
           <div class="profile-image mx-auto mb-3 bg-light rounded-circle d-flex align-items-center justify-content-center shadow-sm">
                <!-- <img src="https://scontent.futh1-1.fna.fbcdn.net/v/t39.30808-6/528889843_4242583999353614_5256576025221137006_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=BBrBNVObQwcQ7kNvwHSIbE6&_nc_oc=AdnlQDVvLAeELU93pF45r85npR-Wx1z3cBnAco_BLwdeN3iCDQOCZnszS-eJcRWrYms&_nc_zt=23&_nc_ht=scontent.futh1-1.fna&_nc_gid=sci9qHtLSTt9stDtyh1zqA&oh=00_AfigGgE63i5Vv59WSn3z2HesR9BKKjeoc9g-SgTKPZqhRQ&oe=692E539F" alt="ผู้ป่วยคนแรก"> -->
          </div>
            <h1 class="text-white fw-bold fs-3">สวัสดีคุณหนึ่งเดียว</h1>
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
                    <a href="#" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
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
                    <a href="#" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <?php include 'footer.php'   ?>

</body>
</html>