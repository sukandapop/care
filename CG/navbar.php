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
    <!-- Navbar ที่เต็มหน้าจอ -->
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

            <!-- เปลี่ยนเป็นใช้ Bootstrap toggler มาตรฐาน -->
            <button class="navbar-toggler navbar-toggler-modern" type="button" data-bs-toggle="collapse" data-bs-target="#modernNavbar" aria-controls="modernNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <div class="collapse navbar-collapse" id="modernNavbar">
                <ul class="navbar-nav ms-auto nav-modern">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">
                            <i class="fa-solid fa-house"></i> หน้าแรก
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="bedridden_data_record.php">
                            <i class="fa-solid fa-user-plus"></i> บันทึกข้อมูลผู้สูงอายุ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Home_Visit_Record.php">
                            <i class="fa-solid fa-house-user"></i> บันทึกเยี่ยมบ้าน
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="problem_notification.php">
                            <i class="fa-solid fa-exclamation-triangle"></i> แจ้งปัญหา
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="take_medicine.php">
                            <i class="fa-solid fa-pills"></i> แจ้งรับประทานยา
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="record_health.php">
                            <i class="fa-solid fa-heartbeat"></i> บันทึกผลตรวจสุขภาพ
                        </a>
                    </li>
                </ul>

                <div class="user-menu-wrapper d-lg-none">
                    <ul class="navbar-nav w-100">
                         <li class="nav-item">
                            <a class="nav-link" href="settings.php">
                                <i class="fa-solid fa-gear"></i> การตั้งค่า
                            </a>
                        </li>
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
                        <li><a class="dropdown-item" href="settings.php"><i class="fa-solid fa-gear"></i> การตั้งค่า</a></li>
                        <li><a class="dropdown-item text-danger" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ใช้ Bootstrap event แทนการจัดการด้วย JavaScript โดยตรง
        document.addEventListener('DOMContentLoaded', function() {
            const navbarToggler = document.querySelector('.navbar-toggler-modern');
            const navbarCollapse = document.getElementById('modernNavbar');
            
            // ใช้ Bootstrap event เพื่ออัพเดทสถานะ toggler
            navbarCollapse.addEventListener('show.bs.collapse', function() {
                navbarToggler.classList.add('active');
            });
            
            navbarCollapse.addEventListener('hide.bs.collapse', function() {
                navbarToggler.classList.remove('active');
            });
            
            // ปิดเมนูเมื่อคลิกลิงก์ (สำหรับมือถือ)
            document.querySelectorAll('.nav-link, .dropdown-item').forEach(link => {
                link.addEventListener('click', function() {
                    // ตรวจสอบเฉพาะเมื่ออยู่บนหน้าจอขนาดเล็กและเมนูเปิดอยู่
                    if (window.innerWidth < 992 && navbarCollapse.classList.contains('show')) {
                        // ใช้ Bootstrap Collapse API เพื่อปิดเมนู
                        const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                        if (bsCollapse) {
                            bsCollapse.hide();
                        }
                    }
                    
                    // อัพเดทสถานะ active สำหรับ nav-link
                    if (this.classList.contains('nav-link') && !this.parentElement.classList.contains('appointment-btn-modern')) {
                        document.querySelectorAll('.nav-link').forEach(item => {
                            item.classList.remove('active');
                        });
                        this.classList.add('active');
                    }
                });
            });
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