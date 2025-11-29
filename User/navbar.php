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

        .appointment-btn-modern .nav-link {
            background: linear-gradient(135deg, #4cc9f0, #5d98ff);
            color: white !important;
            border-radius: 10px;
            font-weight: 600;
            padding: 10px 22px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(93, 152, 255, 0.3);
        }

        .appointment-btn-modern .nav-link:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(93, 152, 255, 0.4);
            background: linear-gradient(135deg, #3ab8e0, #4a87f5);
        }

        .appointment-btn-modern .nav-link i {
            margin-right: 8px;
        }

        /* User Menu Modern */
        .user-menu-modern {
            display: flex;
            align-items: center;
            margin-left: 20px;
            position: relative;
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
            margin-right: 10px;
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

        /* Custom Toggler Button Modern - แก้ไขแล้ว */
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

        /* Content Area */
        .content-area {
            padding: 40px;
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }

        .content-title {
            font-family: 'Kanit', sans-serif;
            font-weight: 600;
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        .content-subtitle {
            font-family: 'Kanit', sans-serif;
            font-size: 1.2rem;
            color: #7e8c9e;
            max-width: 600px;
            line-height: 1.6;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .nav-modern {
                text-align: center;
                padding-top: 20px;
            }

            .nav-modern .nav-item {
                margin: 5px 0;
            }

            .appointment-btn-modern {
                margin: 15px 0 0 0;
            }

            .user-menu-modern {
                margin: 20px 0 0 0;
                justify-content: center;
                flex-direction: column;
            }

            .user-menu-modern .user-avatar {
                margin-right: 0;
                margin-bottom: 10px;
            }
        }

        @media (max-width: 576px) {
            .brand-title {
                font-size: 1.5rem;
            }
            
            .brand-subtitle {
                font-size: 0.8rem;
            }
            
            .nav-modern .nav-link {
                padding: 8px 15px;
                font-size: 0.95rem;
            }

            .content-title {
                font-size: 2rem;
            }

            .content-subtitle {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="preview-container">
        <!-- Modern Care Connect Navbar -->
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

                <!-- เพิ่ม class "navbar-toggler" เพื่อให้ Bootstrap ทำงานได้ถูกต้อง -->
                <button class="navbar-toggler navbar-toggler-modern" type="button" data-bs-toggle="collapse" data-bs-target="#modernNavbar" aria-controls="modernNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse" id="modernNavbar">
                    <ul class="navbar-nav ms-auto nav-modern">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">
                                <i class="fa-solid fa-house"></i>
                                หน้าแรก
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">
                                <i class="fa-solid fa-user"></i>
                                โปรไฟล์
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services.php">
                                <i class="fa-solid fa-hand-holding-medical"></i>
                                บริการ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="doctors.php">
                                <i class="fa-solid fa-user-doctor"></i>
                                แพทย์
                            </a>
                        </li>
                        <li class="nav-item appointment-btn-modern">
                            <a class="nav-link" href="appointment.php">
                                <i class="fa-solid fa-calendar-check"></i>
                                นัดหมาย
                            </a>
                        </li>
                    </ul>

                    <div class="user-menu-modern">
                        <div class="user-avatar" data-bs-toggle="dropdown" aria-expanded="false">
                            <span>ส</span>
                        </div>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="profile.php"><i class="fa-solid fa-user"></i> โปรไฟล์ของฉัน</a></li>
                            <li><a class="dropdown-item" href="appointments.php"><i class="fa-solid fa-calendar-days"></i> การนัดหมาย</a></li>
                            <li><a class="dropdown-item" href="medical-history.php"><i class="fa-solid fa-file-medical"></i> ประวัติการรักษา</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="settings.php"><i class="fa-solid fa-gear"></i> การตั้งค่า</a></li>
                            <li><a class="dropdown-item text-danger" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> ออกจากระบบ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Content Area -->
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ฟังก์ชันสำหรับจัดการการเปิดปิดเมนู
        document.addEventListener('DOMContentLoaded', function() {
            const navbarToggler = document.querySelector('.navbar-toggler-modern');
            const navbarCollapse = document.getElementById('modernNavbar');
            
            // ฟังก์ชันสำหรับอัพเดทสถานะของปุ่ม toggler
            function updateTogglerState() {
                if (navbarCollapse.classList.contains('show')) {
                    navbarToggler.classList.add('active');
                } else {
                    navbarToggler.classList.remove('active');
                }
            }
            
            // เพิ่ม event listener สำหรับการแสดงและซ่อนเมนู
            navbarCollapse.addEventListener('show.bs.collapse', function() {
                navbarToggler.classList.add('active');
            });
            
            navbarCollapse.addEventListener('hide.bs.collapse', function() {
                navbarToggler.classList.remove('active');
            });
            
            // ปิดเมนูเมื่อคลิกลิงก์ (สำหรับมือถือ)
            document.querySelectorAll('.nav-link, .dropdown-item').forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 992) {
                        // ถ้าเป็นหน้าจอเล็ก ให้ปิดเมนูโดยใช้ Bootstrap Collapse API
                        const bsCollapse = new bootstrap.Collapse(navbarCollapse, {
                            toggle: false
                        });
                        bsCollapse.hide();
                    }
                    
                    // อัพเดทสถานะ active สำหรับ nav-link เท่านั้น
                    if (this.classList.contains('nav-link')) {
                        document.querySelectorAll('.nav-link').forEach(item => {
                            item.classList.remove('active');
                        });
                        this.classList.add('active');
                    }
                });
            });
            
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