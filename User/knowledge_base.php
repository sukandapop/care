<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คลังความรู้</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/knowledge_base.css">
    <style>

    </style>
</head>
<body>

<?php include 'navbar.php'   ?>
    
    <div class="container">
        <!-- ส่วนค้นหา -->
        <section class="search-section">
            <h1 class="search-title">คลังความรู้</h1>
            <p class="search-subtitle">แหล่งความรู้สำหรับการดูแลสุขภาพและคุณภาพชีวิต</p>
            <div class="search-box">
                <input type="text" class="search-input" placeholder="ค้นหาความรู้เกี่ยวกับการดูแลผู้สูงอายุ...">
                <button class="search-button">
                    <i class="fas fa-search"></i> ค้นหา
                </button>
            </div>
            <div class="hot-topics">
                <span class="topic-tag">การป้องกันแผลกดทับ</span>
                <span class="topic-tag">อาหารสำหรับผู้สูงอายุ</span>
                <span class="topic-tag">การทำกายภาพบำบัด</span>
                <span class="topic-tag">การดูแลสุขภาพจิต</span>
            </div>
        </section>
        
        <!-- ส่วนกรอง -->
        <section class="filter-section">
            <button class="filter-button active">
                <i class="fas fa-th-large"></i> ทั้งหมด
            </button>
            <button class="filter-button">
                <i class="fas fa-procedures"></i> การดูแลทั่วไป
            </button>
            <button class="filter-button">
                <i class="fas fa-hand-holding-heart"></i> การพยาบาล
            </button>
            <button class="filter-button">
                <i class="fas fa-utensils"></i> อาหารและโภชนาการ
            </button>
            <button class="filter-button">
                <i class="fas fa-brain"></i> สุขภาพจิต
            </button>
            <button class="filter-button">
                <i class="fas fa-pills"></i> การใช้ยา
            </button>
        </section>
        
        <!-- ส่วนเนื้อหา -->
        <section class="content-section">
            <!-- บัตรความรู้ 1 -->
            <div class="knowledge-card">
                <div class="card-image">
                    <i class="fas fa-bed"></i>
                </div>
                <div class="card-content">
                    <span class="card-category">การดูแลทั่วไป</span>
                    <h3 class="card-title">การป้องกันและดูแลแผลกดทับในผู้ป่วยติดเตียง</h3>
                    <p class="card-description">เรียนรู้เทคนิคการพลิกตัวผู้ป่วย การใช้เบาะรองกันแผล และการสังเกตอาการเริ่มต้นของแผลกดทับ</p>
                    <div class="card-meta">
                        <span><i class="far fa-clock"></i> อ่านเวลา: 8 นาที</span>
                        <span><i class="far fa-calendar-alt"></i> อัพเดท: 20 มี.ค. 2023</span>
                    </div>
                </div>
            </div>
            
            <!-- บัตรความรู้ 2 -->
            <div class="knowledge-card">
                <div class="card-image">
                    <i class="fas fa-utensils"></i>
                </div>
                <div class="card-content">
                    <span class="card-category">อาหารและโภชนาการ</span>
                    <h3 class="card-title">โภชนาการที่เหมาะสมสำหรับผู้สูงอายุและผู้ป่วยติดเตียง</h3>
                    <p class="card-description">คำแนะนำเกี่ยวกับอาหารที่ง่ายต่อการย่อย มีสารอาหารครบถ้วน และเหมาะสมกับสภาพร่างกาย</p>
                    <div class="card-meta">
                        <span><i class="far fa-clock"></i> อ่านเวลา: 10 นาที</span>
                        <span><i class="far fa-calendar-alt"></i> อัพเดท: 15 มี.ค. 2023</span>
                    </div>
                </div>
            </div>
            
            <!-- บัตรความรู้ 3 -->
            <div class="knowledge-card">
                <div class="card-image">
                    <i class="fas fa-hands-helping"></i>
                </div>
                <div class="card-content">
                    <span class="card-category">การพยาบาล</span>
                    <h3 class="card-title">เทคนิคการเคลื่อนย้ายผู้ป่วยติดเตียงอย่างปลอดภัย</h3>
                    <p class="card-description">วิธีการเคลื่อนย้ายผู้ป่วยที่ถูกต้องเพื่อป้องกันการบาดเจ็บทั้งสำหรับผู้ป่วยและผู้ดูแล</p>
                    <div class="card-meta">
                        <span><i class="far fa-clock"></i> อ่านเวลา: 6 นาที</span>
                        <span><i class="far fa-calendar-alt"></i> อัพเดท: 12 มี.ค. 2023</span>
                    </div>
                </div>
            </div>
            
            <!-- บัตรความรู้ 4 -->
            <div class="knowledge-card">
                <div class="card-image">
                    <i class="fas fa-brain"></i>
                </div>
                <div class="card-content">
                    <span class="card-category">สุขภาพจิต</span>
                    <h3 class="card-title">การดูแลสุขภาพจิตและอารมณ์สำหรับผู้สูงอายุ</h3>
                    <p class="card-description">วิธีการสร้างสภาพแวดล้อมที่ส่งเสริมสุขภาพจิต และการรับมือกับความเครียดในผู้สูงอายุ</p>
                    <div class="card-meta">
                        <span><i class="far fa-clock"></i> อ่านเวลา: 12 นาที</span>
                        <span><i class="far fa-calendar-alt"></i> อัพเดท: 10 มี.ค. 2023</span>
                    </div>
                </div>
            </div>
            
            <!-- บัตรความรู้ 5 -->
            <div class="knowledge-card">
                <div class="card-image">
                    <i class="fas fa-pills"></i>
                </div>
                <div class="card-content">
                    <span class="card-category">การใช้ยา</span>
                    <h3 class="card-title">การจัดการยาสำหรับผู้สูงอายุที่มีโรคประจำตัวหลายชนิด</h3>
                    <p class="card-description">แนวทางการใช้ยาอย่างปลอดภัย การจดบันทึก และการป้องกันการเกิดปฏิกิริยาระหว่างยา</p>
                    <div class="card-meta">
                        <span><i class="far fa-clock"></i> อ่านเวลา: 9 นาที</span>
                        <span><i class="far fa-calendar-alt"></i> อัพเดท: 5 มี.ค. 2023</span>
                    </div>
                </div>
            </div>
            
            <!-- บัตรความรู้ 6 -->
            <div class="knowledge-card">
                <div class="card-image">
                    <i class="fas fa-heartbeat"></i>
                </div>
                <div class="card-content">
                    <span class="card-category">การดูแลทั่วไป</span>
                    <h3 class="card-title">การออกกำลังกายเบาๆ สำหรับผู้สูงอายุและผู้ป่วยติดเตียง</h3>
                    <p class="card-description">ท่าออกกำลังกายที่เหมาะสมเพื่อรักษาความยืดหยุ่นของร่างกายและระบบไหลเวียนเลือด</p>
                    <div class="card-meta">
                        <span><i class="far fa-clock"></i> อ่านเวลา: 7 นาที</span>
                        <span><i class="far fa-calendar-alt"></i> อัพเดท: 1 มี.ค. 2023</span>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        // ฟังก์ชันการกรองหมวดหมู่
        document.querySelectorAll('.filter-button').forEach(button => {
            button.addEventListener('click', function() {
                // ลบคลาส active จากปุ่มทั้งหมด
                document.querySelectorAll('.filter-button').forEach(btn => {
                    btn.classList.remove('active');
                });
                
                // เพิ่มคลาส active ให้ปุ่มที่ถูกคลิก
                this.classList.add('active');
                
                // ในเว็บจริง ควรมีการกรองเนื้อหาตามหมวดหมู่ที่นี่
                const category = this.textContent.trim();
                alert('กำลังกรองเนื้อหาในหมวดหมู่: ' + category);
            });
        });
        
        // ฟังก์ชันการค้นหา
        document.querySelector('.search-button').addEventListener('click', performSearch);
        
        // อนุญาตให้ค้นหาโดยกด Enter
        document.querySelector('.search-input').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                performSearch();
            }
        });
        
        function performSearch() {
            const searchTerm = document.querySelector('.search-input').value;
            if (searchTerm.trim() !== '') {
                alert('กำลังค้นหา: ' + searchTerm);
                // ในเว็บจริง ควรมีการค้นหาและแสดงผลที่นี่
            } else {
                alert('กรุณากรอกคำค้นหา');
            }
        }
        
        // เพิ่มเอฟเฟกต์เมื่อโหลดหน้าเว็บ
        document.addEventListener('DOMContentLoaded', function() {
            // เพิ่มการแสดงผลทีละขั้นตอนสำหรับการ์ดความรู้
            const cards = document.querySelectorAll('.knowledge-card');
            cards.forEach((card, index) => {
                card.style.opacity = '0';
                card.style.transform = 'translateY(20px)';
                
                setTimeout(() => {
                    card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100 * index);
            });
        });
    </script>

<?php include 'footer.php'   ?>

</body>
</html>