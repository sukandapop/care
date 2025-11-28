<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Connect - Simple Navbar</title>
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
        }

        .preview-container {
            max-width: 1200px;
            padding: 1rem;
            margin: 0 auto;
        }

        /* Navbar Styles */
        .navbar-custom {
            background: #ffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 12px 0;
            border-radius: 12px;
        }

        .navbar-brand-custom {
            color: var(--success);
            font-family: 'Kanit', sans-serif;
            font-weight: 600;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-decoration: none;
        }

        .navbar-brand-custom h1 {
            font-size: 1.8rem;
            margin: 0;
            line-height: 1;
            color: #4cc9f0;
        }

        .navbar-brand-custom h3 {
            font-size: 1rem;
            margin: 0;
            font-weight: 400;
            color: #5d98ff;
        }

        .nav-custom {
            display: flex;
            align-items: center;
        }

        .nav-custom .nav-item {
            margin: 0 5px;
        }

        .nav-custom .nav-link {
            color: #5d98ff;
            font-family: 'Kanit', sans-serif;
            font-size: 1rem;
            font-weight: 500;
            padding: 10px 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-custom .nav-link:hover {
            background: rgba(93, 152, 255, 0.1);
            color: #2d5fc5;
        }

        .appointment-btn-custom {
            margin-left: 10px;
        }

        .appointment-btn-custom .nav-link {
            background: #5d98ff;
            color: white !important;
            border-radius: 8px;
            font-weight: 600;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }

        .appointment-btn-custom .nav-link:hover {
            background: #2d5fc5;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Custom Toggler Button */
        .navbar-toggler-custom {
            border: none;
            padding: 8px 10px;
            border-radius: 6px;
            background: rgba(93, 152, 255, 0.1);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 44px;
            height: 44px;
        }

        .navbar-toggler-custom:focus {
            box-shadow: none;
        }

        .navbar-toggler-custom .icon-bar {
            display: block;
            width: 22px;
            height: 2px;
            border-radius: 1px;
            margin: 2px 0;
            transition: all 0.3s ease;
            background: #5d98ff;
        }

        .navbar-toggler-custom:hover {
            background: rgba(93, 152, 255, 0.2);
        }

        /* User Menu */
        .user-menu {
            display: flex;
            align-items: center;
            margin-left: 15px;
        }

        .user-menu a {
            color: #5d98ff;
            font-size: 1.2rem;
            margin-left: 15px;
            transition: all 0.3s ease;
        }

        .user-menu a:hover {
            color: #2d5fc5;
            transform: translateY(-2px);
        }

        /* Features Section */
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 40px;
        }

        .feature-card {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.12);
        }

        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #000000ff 0%, #f46868ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .feature-card h3 {
            font-family: 'Kanit', sans-serif;
            font-weight: 600;
            margin-bottom: 10px;
            color: #333;
        }

        .feature-card p {
            color: #666;
            line-height: 1.6;
        }

        /* Footer */
        .footer {
            text-align: center;
            margin-top: 50px;
            color: #5d98ff;
            font-size: 0.9rem;
            opacity: 0.8;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .nav-custom {
                text-align: center;
                padding-top: 15px;
            }

            .nav-custom .nav-item {
                margin: 5px 0;
            }

            .appointment-btn-custom {
                margin: 10px 0 0 0;
            }

            .user-menu {
                margin: 15px 0 0 0;
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .navbar-brand-custom h1 {
                font-size: 1.5rem;
            }
            
            .navbar-brand-custom h3 {
                font-size: 0.85rem;
            }
            
            .nav-custom .nav-link {
                padding: 8px 12px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
    <div class="preview-container">
        <!-- Care Connect Navbar -->
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container-fluid">
                <a class="navbar-brand-custom" href="index.php">
                    <h1>แคร์คอนเนค</h1>
                    <h3>care connect</h3>
                </a>

                <button class="navbar-toggler-custom" type="button" data-bs-toggle="collapse" data-bs-target="#topNavbar" aria-controls="topNavbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse navbar-collapse" id="topNavbar">
                    <ul class="navbar-nav ms-auto nav-custom">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">หน้าแรก</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="profile.php">โปรไฟล์</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="services.php">บริการ</a>
                        </li>
                        <li class="nav-item appointment-btn-custom">
                            <a class="nav-link" href="contact.php">ติดต่อ</a>
                        </li>
                    </ul>

                    <div class="user-menu">
                        <a href="settings.php" title="การตั้งค่า">
                            <i class="fa-solid fa-gear"></i>
                        </a>
                        <a href="logout.php" title="ออกจากระบบ">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

    

   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ฟังก์ชันสำหรับเพิ่มเอฟเฟกต์เมื่อเมนูเบอร์เกอร์ถูกคลิก
        document.querySelector('.navbar-toggler-custom').addEventListener('click', function() {
            this.classList.toggle('active');
            
            // เพิ่มอนิเมชันให้กับไอคอน
            const iconBars = this.querySelectorAll('.icon-bar');
            if (this.classList.contains('active')) {
                iconBars[0].style.transform = 'rotate(45deg) translate(5px, 5px)';
                iconBars[1].style.opacity = '0';
                iconBars[2].style.transform = 'rotate(-45deg) translate(7px, -6px)';
            } else {
                iconBars[0].style.transform = 'none';
                iconBars[1].style.opacity = '1';
                iconBars[2].style.transform = 'none';
            }
        });

        // ปิดเมนูเมื่อคลิกลิงก์ (สำหรับมือถือ)
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function() {
                const navbarToggler = document.querySelector('.navbar-toggler-custom');
                const navbarCollapse = document.querySelector('.navbar-collapse');
                
                if (window.innerWidth < 992) {
                    // ถ้าเป็นหน้าจอเล็ก ให้ปิดเมนู
                    navbarCollapse.classList.remove('show');
                    navbarToggler.classList.remove('active');
                    
                    // รีเซ็ตไอคอน
                    const iconBars = navbarToggler.querySelectorAll('.icon-bar');
                    iconBars[0].style.transform = 'none';
                    iconBars[1].style.opacity = '1';
                    iconBars[2].style.transform = 'none';
                }
            });
        });
    </script>
</body>

</html>