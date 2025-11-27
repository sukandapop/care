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
         @import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Kanit", sans-serif;
            /* font-family: 'Noto Sans Thai', sans-serif; */
            background: linear-gradient(135deg, #f9faffff 0%, #ffffffff 100%);
            min-height: 100vh;
            color: #333;
        }

        .preview-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem;
        }

        .preview-header {
            text-align: center;
            margin-bottom: 50px;
            color: white;
        }

        .preview-header h1 {
            font-family: 'Kanit', sans-serif;
            font-weight: 600;
            font-size: 2.5rem;
            margin-bottom: 15px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        }

        .preview-header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .navbar-preview {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.15);
            margin-bottom: 40px;
        }

        /* Simple Navbar Styles */
        .navbar-simple {
            background: #ffffffff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 12px 0;
            border-radius: 12px;
        }

        .navbar-brand-simple {
            color: #2c87fdff !important;
            font-family: 'Kanit', sans-serif;
            font-weight: 600;
            font-size: 1.8rem;
            display: flex;
            align-items: center;
        }

        .navbar-brand-simple .fa {
            margin-right: 10px;
            font-size: 1.6rem;

        }

        .nav-simple {
            display: flex;
            align-items: center;
        }

        .nav-simple li {
            margin: 0 5px;
        }

        .nav-simple li a {
            color: #fff;
            font-family: 'Kanit', sans-serif;
            font-size: 1rem;
            font-weight: 500;
            padding: 10px 16px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-simple li a:hover {
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
        }

        .appointment-btn-simple {
            margin-left: 10px;
        }

        .appointment-btn-simple a {
            background: #fff;
            border-radius: 8px;
            color: #5d98ff !important;
            font-weight: 600;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }

        .appointment-btn-simple a:hover {
            background: #f8f9fa;
            color: #5d98ff !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar-toggler-simple {
            border: none;
            padding: 6px 8px;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .navbar-toggler-simple .icon-bar {
            display: block;
            width: 22px;
            height: 2px;
            border-radius: 1px;
            margin: 4px 0;
            transition: all 0.3s ease;
            background: #5d98ff;
        }

        .navbar-toggler-simple:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* User Menu */
        .user-menu {
            display: flex;
            align-items: center;
            margin-left: 15px;
        }

        .user-menu a {
            color: #ff0303ff;
            font-size: 1.2rem;
            margin-left: 15px;
            transition: all 0.3s ease;
        }

        .user-menu a:hover {
            color: #f8f9fa;
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
            color: white;
            font-size: 0.9rem;
            opacity: 0.8;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .nav-simple {
                text-align: center;
                padding-top: 15px;
            }

            .nav-simple li {
                margin: 5px 0;
            }

            .appointment-btn-simple {
                margin: 10px 0 0 0;
            }

            .user-menu {
                margin: 15px 0 0 0;
                justify-content: center;
            }
            
        }
        .nav-item .nav-link{
            color:#5d98ff ;
            font-weight: 800;
           
        }
    </style>
</head>

<body>
    <div class="preview-container">
        <!-- Care Connect Navbar (Updated Top Navbar) -->
        <nav class="navbar navbar-expand-lg navbar-simple ">
            <div class="container-fluid">
                <a class="navbar-brand navbar-brand-simple" href="#">
                    <i class="fa-solid "></i> แคร์คอนเนค
                </a>


                <button class="navbar-toggler navbar-toggler-simple" type="button" data-bs-toggle="collapse" data-bs-target="#topNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <div class="collapse navbar-collapse" id="topNavbar">
                    <ul class="navbar-nav ms-auto nav-simple">
                        <li class="nav-item"><a class="nav-link" href="index.php">หน้าแรก</a></li>
                        <li class="nav-item"><a class="nav-link" href="appointment.php">นัดหมาย</a></li>
                        <li class="nav-item"><a class="nav-link" href="profile.php">โปรไฟล์</a></li>
                        <li class="nav-item appointment-btn-simple"><a class="nav-link" href="contact.php">ติดต่อ</a></li>
                    </ul>


                    <div class="user-menu">
                        <a href="settings.php"><i class="fa-solid fa-gear"></i></a>
                        <a href="logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
                    </div>
                </div>
            </div>
        </nav>


    </div>


    <script>
        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    window.scrollTo({
                        top: target.offsetTop - 100,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>

</html>