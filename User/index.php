<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="custom-styles.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  
       <link rel="stylesheet" href="../css/index.css">

</head>
<body class="bg-primary text-black" style="font-family: 'Sarabun', sans-serif;">
    
  <?php include 'navbar.php'   ?>

    <div class="container-fluid" style="background-color: #367fffff; min-height: 100vh; padding-bottom: 70px; ">
        <section class="text-center my-1 ">
          <br>
            <div class="profile-image mx-auto mb-3   bg-light rounded-circle d-flex align-items-center justify-content-center shadow-sm">
                <span class="fw-bold fs-5">Images</span>
            </div>
            <h1 class="text-white fw-bold fs-3">สวัสดีคุณName</h1>
        </section>

        <main class="container">
            <div class="row row-cols-2 row-cols-md-3 g-3">
                
                <div class="col">
                    <a href="#" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
                        <i class="bi bi-capsule fs-2 mb-2 text-primary"></i> 
                        <div class="menu-label fw-normal">รับประทานยา</div>
                    </a>
                </div>

                <div class="col">
                    <a href="#" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
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
                    <a href="#" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
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
                    <a href="#" class="menu-item card bg-light text-center p-3 h-100 shadow-sm">
                        <i class="bi bi-question-circle fs-2 mb-2 text-primary"></i>
                        <div class="menu-label fw-normal">คู่มือการใช้ระบบ</div>
                    </a>
                </div>
            </div>
        </main>
    </div>

    <footer class="fixed-bottom bg-dark" style="height: 60px;">
        </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>