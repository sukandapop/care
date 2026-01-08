<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Connect - Modern Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&family=Noto+Sans+Thai:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/navbar.css">
</head>

<body>
   <?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>

        <nav class="navbar navbar-expand-lg navbar-modern">
            <div class="container-fluid">
                <div class="brand-container">
                    <div class="logo-icon">
                        <i class="fa-solid fa-heart-pulse"></i>
                    </div>
                    <a class="navbar-brand-modern" href="index.php">
                        <span class="brand-title">แคร์คอนเนค</span>
                        <span class="brand-subtitle">CARE CONNECT</span>
                    </a>
                </div>

                <button class="navbar-toggler navbar-toggler-modern" type="button" data-bs-toggle="collapse" data-bs-target="#modernNavbar" aria-controls="modernNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse" id="modernNavbar">
                    <ul class="navbar-nav ms-auto nav-modern">
                        <li class="nav-item">
                            <a class="nav-link <?= $currentPage == 'index.php' ? 'active' : '' ?>" href="index.php">
    <i class="fa-solid fa-house"></i> หน้าแรก
</a>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $currentPage == 'take_medicine.php' ? 'active' : '' ?>" href="take_medicine.php">
                                <i class="fa-solid fa-pills"></i> รับประทานยา
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $currentPage == 'appointment.php' ? 'active' : '' ?>" href="appointment.php">
                                <i class="bi bi-calendar-check"></i> นัดหมาย
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= $currentPage == 'knowledge_base.php' ? 'active' : '' ?>" href="knowledge_base.php">
                                <i class=" bi bi-book"></i> คลังความรู้
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= $currentPage == 'health_report.php' ? 'active' : '' ?>" href="health_report.php">
                                <i class="bi bi-activity"></i> รายงานสุขภาพ
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link <?= $currentPage == 'communication.php' ? 'active' : '' ?>" href="communication.php">
                                <i class="bi bi-chat-text"></i> พูดคุยให้คำปรึกษา
                            </a>
                        </li>
                    </ul>

                    <div class="user-menu-wrapper d-lg-none">
                        <ul class="navbar-nav w-100">
                            
                            <li class="nav-item">
                                <a class="nav-link text-danger" href="logout.php">
                                    <i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="user-menu-modern dropdown d-none d-lg-block">
                        
                        <div class="user-avatar" id="userDropdownDesktop" data-bs-toggle="dropdown" aria-expanded="false">
                            <span>ส</span>
                            
                        </div>
                        
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdownDesktop">
                            <li><a class="dropdown-item text-danger" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // ฟังก์ชันสำหรับจัดการการเปิดปิดเมนู
document.addEventListener('DOMContentLoaded', function() {
    const navbarToggler = document.querySelector('.navbar-toggler-modern');
    const navbarCollapse = document.getElementById('modernNavbar');

    // จัดการการคลิกปุ่ม toggler โดยตรง
    navbarToggler.addEventListener('click', function() {
        // Bootstrap จะจัดการแสดง/ซ่อนเมนูให้อัตโนมัติ
        // เราแค่ต้องอัพเดทสถานะของปุ่ม toggler
        setTimeout(() => {
            if (navbarCollapse.classList.contains('show')) {
                navbarToggler.classList.add('active');
            } else {
                navbarToggler.classList.remove('active');
            }
        }, 10); // รอสักครู่ให้ Bootstrap อัพเดทคลาสก่อน
    });

    // ปิดเมนูเมื่อคลิกลิงก์ (สำหรับมือถือ)
    document.querySelectorAll('.nav-modern .nav-link').forEach(link => {
    link.addEventListener('click', function() {

        if (this.closest('.appointment-btn-modern')) return;

        document.querySelectorAll('.nav-modern .nav-link').forEach(item => {
            item.classList.remove('active');
        });

        this.classList.add('active');
    });
});


    // ฟังก์ชันสำหรับตรวจสอบและอัพเดทสถานะเริ่มต้น
    function updateTogglerState() {
        if (navbarCollapse.classList.contains('show')) {
            navbarToggler.classList.add('active');
        } else {
            navbarToggler.classList.remove('active');
        }
    }

    // ตรวจสอบสถานะเริ่มต้น
    updateTogglerState();
});
        // เพิ่มเอฟเฟกต์เมื่อสกอร์ลง
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar-modern');
            if (window.scrollY > 50) {
                navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.12)';
            } else {
                navbar.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.08)';
            }
        });
    </script>
</body>

</html>