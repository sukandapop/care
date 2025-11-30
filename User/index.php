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
    /* ใช้ฟอนต์ Kanit สำหรับทั้งเว็บไซต์ */
   
}

/* ลบขีดเส้นใต้และกำหนดรูปแบบลิงก์สำหรับเมนู */
.menu-item {
    text-decoration: none;
    color: #000;
    /* สีข้อความดำ */
    transition: transform 0.2s, box-shadow 0.2s;
    border: none;
    /* ลบขอบ card */
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
    /* ควรเปลี่ยน path ให้เป็น relative path */
    background-image: url('../images/Gemini_Generated_Image_50c2mb50c2mb50c2.png');
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


</style>
<body  style="font-family: 'Sarabun', sans-serif;">
    
  <?php include 'navbar.php'   ?>

    <div class="container-fluid">
        <section class="text-center my-1 ">
          <br>
           <div class="profile-image mx-auto mb-3 bg-light rounded-circle d-flex align-items-center justify-content-center shadow-sm">
                <!-- <img src="https://scontent.futh1-1.fna.fbcdn.net/v/t39.30808-6/528889843_4242583999353614_5256576025221137006_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=BBrBNVObQwcQ7kNvwHSIbE6&_nc_oc=AdnlQDVvLAeELU93pF45r85npR-Wx1z3cBnAco_BLwdeN3iCDQOCZnszS-eJcRWrYms&_nc_zt=23&_nc_ht=scontent.futh1-1.fna&_nc_gid=sci9qHtLSTt9stDtyh1zqA&oh=00_AfigGgE63i5Vv59WSn3z2HesR9BKKjeoc9g-SgTKPZqhRQ&oe=692E539F" alt="ผู้ป่วยคนแรก"> -->
          </div>
            <h1 class="text-black fw-bold fs-3">สวัสดีคุณสมหวัง</h1>
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
    </div>
        <?php include 'footer.php'   ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        
    

</body>
</html>