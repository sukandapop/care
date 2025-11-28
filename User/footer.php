<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Connect - Footer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&family=Noto+Sans+Thai:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Noto Sans Thai', sans-serif;
            background: linear-gradient(135deg, #f9faffff 0%, #47a6ffff 100%);
            min-height: 100vh;
            color: #333;
            display: flex;
            flex-direction: column;
        }
        /* Footer Styles */
        .footer-premium {
            background: linear-gradient(135deg, #1a3a8f 0%, #2d5fc5 100%);
            color: #fff;
            padding: 60px 0 20px;
            margin-top: 60px;
            position: relative;
            overflow: hidden;
        }

        .footer-premium:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #ff9a9e, #fad0c4, #a1c4fd, #c2e9fb);
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }


        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-links a {
            color: #e0e0e0;
            text-decoration: none;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }

        .footer-links a:hover {
            color: #fff;
            transform: translateX(5px);
        }

        .footer-links a i {
            margin-right: 10px;
            font-size: 0.9rem;
            color: #ff9a9e;
        }

        .footer-contact {
            list-style: none;
            padding: 0;
        }

        .footer-contact li {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
        }

        .footer-contact i {
            margin-right: 15px;
            font-size: 1.2rem;
            color: #ff9a9e;
            margin-top: 3px;
        }

        .footer-contact div {
            flex: 1;
        }

        .footer-contact h4 {
            font-size: 1rem;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .footer-contact p {
            margin: 0;
            opacity: 0.9;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }

        .social-links a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: #fff;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: #ff9a9e;
            transform: translateY(-5px);
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            text-align: center;
        }

        .footer-bottom p {
            margin: 0;
            opacity: 0.8;
            font-size: 0.9rem;
        }

        .newsletter-form {
            display: flex;
            gap: 10px;
        }

        .newsletter-form input {
            flex: 1;
            padding: 12px 15px;
            border: none;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            font-family: 'Noto Sans Thai', sans-serif;
        }

        .newsletter-form input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .newsletter-form button {
            background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
            color: #1a3a8f;
            border: none;
            border-radius: 6px;
            padding: 12px 20px;
            font-family: 'Kanit', sans-serif;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .newsletter-form button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 154, 158, 0.4);
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
            
            .newsletter-form {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    
    <!-- Footer Section -->
    <footer class="footer-premium">
        <div class="footer-content">
            <div class="footer-row">
                <div class="footer-col">
                    <h3>Care Connect</h3>
                    <p>แพลตฟอร์มดูแลสุขภาพที่ทันสมัย ออกแบบมาเพื่อให้คุณเข้าถึงบริการทางการแพทย์ได้ง่ายและรวดเร็วที่สุด</p>
                    <div class="social-links">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="footer-col">
                    <h3>ลิงก์ด่วน</h3>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-chevron-right"></i> หน้าแรก</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> บริการของเรา</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> นัดหมายแพทย์</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> บทความสุขภาพ</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> ติดต่อเรา</a></li>
                    </ul>
                </div>
                
                
                <div class="footer-col">
                    <h3>ติดต่อเรา</h3>
                    <ul class="footer-contact">
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <h4>ที่อยู่</h4>
                                <p>123 ถนนสุขาภิบาล แขวงบางซื่อ เขตบางซื่อ กรุงเทพฯ 10800</p>
                            </div>
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            <div>
                                <h4>โทรศัพท์</h4>
                                <p>0-2123-4567</p>
                            </div>
                        </li>
                        <li>
                            <i class="fas fa-envelope"></i>
                            <div>
                                <h4>อีเมล</h4>
                                <p>info@careconnect.com</p>
                            </div>
                        </li>
                    </ul>
                    
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2023 Care Connect. สงวนลิขสิทธิ์ทุกประการ | ออกแบบด้วย <i class="fas fa-heart" style="color: #ff9a9e;"></i> เพื่อสุขภาพที่ดีของคุณ</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Smooth scroll for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
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