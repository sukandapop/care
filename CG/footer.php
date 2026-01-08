<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Connect - Footer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&family=Noto+Sans+Thai:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/footer.css">

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