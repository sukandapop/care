<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Connect - Modern Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&family=Noto+Sans+Thai:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Kanit", sans-serif;
            background: linear-gradient(135deg, #f9faffff 0%, #ffffffff 100%);
            min-height: 100vh;
            padding: 20px;
        }

        .preview-container {
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Modern Navbar Styles */
        .navbar-modern {
            background: linear-gradient(135deg, #ffffff 0%, #f8fbff 100%);
            padding: 15px 0;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            position: relative;
            z-index: 1000;
        }

        .navbar-modern::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #4cc9f0, #5d98ff, #7209b7);
        }

        .brand-container {
            display: flex;
            align-items: center;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #4cc9f0, #5d98ff);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            box-shadow: 0 4px 10px rgba(76, 201, 240, 0.3);
        }

        .logo-icon i {
            color: white;
            font-size: 1.5rem;
        }

        .navbar-brand-modern {
            display: flex;
            flex-direction: column;
            text-decoration: none;
        }

        .brand-title {
            font-family: 'Kanit', sans-serif;
            font-weight: 700;
            font-size: 1.8rem;
            background: linear-gradient(135deg, #4cc9f0, #5d98ff);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            line-height: 1;
            margin-bottom: 2px;
        }

        .brand-subtitle {
            font-family: 'Kanit', sans-serif;
            font-size: 0.9rem;
            color: #7e8c9e;
            font-weight: 400;
            letter-spacing: 1px;
        }

        .nav-modern {
            display: flex;
            align-items: center;
        }

        .nav-modern .nav-item {
            margin: 0 8px;
            position: relative;
        }

        .nav-modern .nav-link {
            color: #5a677d;
            font-family: 'Kanit', sans-serif;
            font-size: 1rem;
            font-weight: 500;
            padding: 10px 18px;
            border-radius: 10px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .nav-modern .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background: linear-gradient(90deg, #4cc9f0, #5d98ff);
            transition: width 0.3s ease;
            border-radius: 3px;
        }

        .nav-modern .nav-link:hover {
            color: #4cc9f0;
            background: rgba(93, 152, 255, 0.05);
        }

        .nav-modern .nav-link:hover::before {
            width: 100%;
        }

        .nav-modern .nav-link.active {
            color: #4cc9f0;
            background: rgba(93, 152, 255, 0.1);
        }

        .nav-modern .nav-link.active::before {
            width: 100%;
        }

        .nav-modern .nav-link i {
            margin-right: 8px;
            font-size: 1.1rem;
        }

        .appointment-btn-modern {
            margin-left: 15px;
        }

        /* ใช้ .nav-link แทน .appointment-btn-modern .nav-link */
        .nav-modern .appointment-btn-modern > a.nav-link {
            background: linear-gradient(135deg, #4cc9f0, #5d98ff);
            color: white !important;
            border-radius: 10px;
            font-weight: 600;
            padding: 10px 22px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(93, 152, 255, 0.3);
        }

        .nav-modern .appointment-btn-modern > a.nav-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(93, 152, 255, 0.4);
            background: linear-gradient(135deg, #3ab8e0, #4a87f5);
        }

        .appointment-btn-modern .nav-link i {
            margin-right: 8px;
        }

        /* User Menu Modern */
        .user-menu-modern {
            margin-left: 20px;
            position: relative;
        }

        @media (min-width: 992px) {
            /* สำหรับ Desktop ให้แสดง Dropdown ข้างๆ เมนูหลัก */
            .user-menu-modern {
                 /* ให้นำออกจาก ul เพื่อให้วางข้างๆ ul ได้ */
                 display: flex;
                 align-items: center;
                 margin-left: 20px;
            }
        }
        
        .user-menu-modern .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: linear-gradient(135deg, #4cc9f0, #5d98ff);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(93, 152, 255, 0.3);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .user-menu-modern .user-avatar:hover {
            transform: scale(1.05);
        }

        .user-menu-modern .dropdown-menu {
            border: none;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 10px;
            margin-top: 10px;
        }

        .user-menu-modern .dropdown-item {
            padding: 10px 15px;
            border-radius: 8px;
            font-family: 'Kanit', sans-serif;
            display: flex;
            align-items: center;
            transition: all 0.2s ease;
            color: #000000ff;
        }

        .user-menu-modern .dropdown-item i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .user-menu-modern .dropdown-item:hover {
            background: rgba(93, 152, 255, 0.1);
            color: #4cc9f0;
        }

        /* Custom Toggler Button Modern */
        .navbar-toggler-modern {
            border: none;
            padding: 10px;
            border-radius: 10px;
            background: rgba(93, 152, 255, 0.1);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 48px;
            height: 48px;
        }

        .navbar-toggler-modern:focus {
            box-shadow: none;
            background: rgba(93, 152, 255, 0.2);
        }

        .navbar-toggler-modern .icon-bar {
            display: block;
            width: 24px;
            height: 2.5px;
            border-radius: 2px;
            margin: 2.5px 0;
            transition: all 0.3s ease;
            background: #5d98ff;
        }

        .navbar-toggler-modern:hover {
            background: rgba(93, 152, 255, 0.2);
        }

        .navbar-toggler-modern.active .icon-bar:nth-child(1) {
            transform: rotate(45deg) translate(6px, 6px);
        }

        .navbar-toggler-modern.active .icon-bar:nth-child(2) {
            opacity: 0;
        }

        .navbar-toggler-modern.active .icon-bar:nth-child(3) {
            transform: rotate(-45deg) translate(6px, -6px);
        }

        /* Responsive */
        @media (max-width: 991px) {
            .nav-modern {
                text-align: center;
                padding-top: 20px;
                /* ปรับให้เมนูหลักเต็มพื้นที่ด้านบนเมนูผู้ใช้ */
            }

            .nav-modern .nav-item {
                margin: 5px 0;
            }
            
            .user-menu-wrapper {
                /* จัดให้ user menu อยู่ด้านล่างสุดและตรงกลางในมุมมองมือถือ */
                width: 100%;
                display: flex;
                justify-content: center;
                margin-top: 20px;
                padding-bottom: 10px;
                border-top: 1px solid #eee;
                padding-top: 15px;
            }

            .appointment-btn-modern {
                margin: 5px 0 0 0 !important;
            }
            
            .user-menu-modern {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
    <div class="preview-container">
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
                            <a class="nav-link active" href="index.php">
                                <i class="fa-solid fa-house"></i> หน้าแรก
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="take_medicine.php">
                                <i class="fa-solid fa-pills"></i> บันทึกข้อมูลผู้สูงอายุ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="take_medicine.php">
                                <i class="fa-solid fa-pills"></i> บันทึกเยี่ยมบ้าน
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="appointment.php">
                                <i class="fa-solid fa-hand-holding-medical"></i> แจ้งปัญหา
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="knowledge_base.php">
                                <i class="fa-solid fa-user-doctor"></i> แจ้งรับประทานยา
                            </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="health_report.php">
                                <i class="fa-solid fa-calendar-check"></i> บันทึกผลตรวจสุขภาพ
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

    </div>

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
    document.querySelectorAll('.nav-link, .dropdown-item').forEach(link => {
        link.addEventListener('click', function() {
            // ตรวจสอบเฉพาะเมื่ออยู่บนหน้าจอขนาดเล็ก
            if (window.innerWidth < 992) {
                // ปิดเมนูโดยใช้ Bootstrap Collapse API
                const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse) || new bootstrap.Collapse(navbarCollapse, {toggle: false});
                bsCollapse.hide();
                navbarToggler.classList.remove('active');
            }

            // อัพเดทสถานะ active สำหรับ nav-link เท่านั้น
            if (this.classList.contains('nav-link') && !this.classList.contains('appointment-btn-modern')) {
                document.querySelectorAll('.nav-link').forEach(item => {
                    item.classList.remove('active');
                });
                this.classList.add('active');
            }
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