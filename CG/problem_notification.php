<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบแจ้งปัญหาและเหตุฉุกเฉินสำหรับผู้สูงอายุ</title>
    <link rel="stylesheet" href="./css/problem_notification.css">
    <style>

    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

    <header>
        <div class="container">
            <h1>ระบบแจ้งปัญหาและเหตุฉุกเฉิน</h1>
            <p>สำหรับผู้สูงอายุ - ติดต่อ CM (ผู้จัดการผู้สูงอายุ)</p>
        </div>
    </header>
    
    <div class="container">
        <div class="emergency-contact">
            <p>หากเป็นเหตุฉุกเฉินที่ต้องรับมือทันที โปรดโทร: <strong>1669</strong> (ศูนย์นเรนทร)</p>
        </div>
        
        <div class="form-container">
            <h2>แบบฟอร์มแจ้งปัญหา/เหตุฉุกเฉิน</h2>
            <p>กรุณากรอกข้อมูลให้ครบถ้วนเพื่อให้ CM สามารถช่วยเหลือได้อย่างมีประสิทธิภาพ</p>
            
            <form id="emergencyForm">
                <div class="form-group">
                    <label for="reporterName">ชื่อ-นามสกุล ผู้แจ้ง *</label>
                    <input type="text" id="reporterName" name="reporterName" required>
                </div>
                
                <div class="form-group">
                    <label for="reporterPhone">เบอร์โทรศัพท์ *</label>
                    <input type="tel" id="reporterPhone" name="reporterPhone" required>
                </div>
                
                <div class="form-group">
                    <label for="elderName">ชื่อ-นามสกุล ผู้สูงอายุ *</label>
                    <input type="text" id="elderName" name="elderName" required>
                </div>
                
                <div class="form-group">
                    <label for="elderId">รหัสประจำตัวผู้สูงอายุ (ถ้ามี)</label>
                    <input type="text" id="elderId" name="elderId">
                </div>
                
                <div class="form-group">
                    <label for="problemType">ประเภทปัญหา *</label>
                    <select id="problemType" name="problemType" required>
                        <option value="">-- กรุณาเลือกประเภทปัญหา --</option>
                        <option value="health">ปัญหาสุขภาพ/การเจ็บป่วย</option>
                        <option value="accident">อุบัติเหตุ</option>
                        <option value="mental">ปัญหาด้านจิตใจ/อารมณ์</option>
                        <option value="environment">ปัญหาสิ่งแวดล้อม/ที่อยู่อาศัย</option>
                        <option value="care">ปัญหาด้านการดูแล</option>
                        <option value="financial">ปัญหาด้านการเงิน</option>
                        <option value="other">อื่นๆ</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label>ระดับความเร่งด่วน *</label>
                    <div class="urgency-levels">
                        <div class="urgency-option high-urgency" data-level="high">
                            <strong>ด่วนมาก</strong>
                            <p>เสี่ยงต่อชีวิตหรือความปลอดภัย</p>
                        </div>
                        <div class="urgency-option medium-urgency" data-level="medium">
                            <strong>ด่วน</strong>
                            <p>ต้องการความช่วยเหลือภายใน 24 ชม.</p>
                        </div>
                        <div class="urgency-option low-urgency" data-level="low">
                            <strong>ปกติ</strong>
                            <p>ต้องการความช่วยเหลือทั่วไป</p>
                        </div>
                    </div>
                    <input type="hidden" id="urgencyLevel" name="urgencyLevel" required>
                </div>
                
                <div class="form-group">
                    <label for="problemDetails">รายละเอียดปัญหา *</label>
                    <textarea id="problemDetails" name="problemDetails" rows="5" required placeholder="โปรดอธิบายปัญหาหรือเหตุการณ์ที่เกิดขึ้นโดยละเอียด"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="location">สถานที่เกิดเหตุ *</label>
                    <input type="text" id="location" name="location" required placeholder="ที่อยู่หรือสถานที่เกิดเหตุ">
                </div>
                
                <button type="submit" class="btn">ส่งแบบฟอร์มแจ้งปัญหา</button>
            </form>
        </div>
        
        <div class="contact-info">
            <h3>ช่องทางการติดต่อ CM (ผู้จัดการผู้สูงอายุ)</h3>
            <p>โทรศัพท์: <strong>02-XXX-XXXX</strong></p>
            <p>อีเมล: <strong>cm_eldercare@example.com</strong></p>
            <p>เวลาทำการ: จันทร์-ศุกร์ 8:30-17:30 น.</p>
        </div>
    </div>
    
    <footer>
        <div class="container">
            <p>ระบบแจ้งปัญหาและเหตุฉุกเฉินสำหรับผู้สูงอายุ © 2023</p>
        </div>
    </footer>

    <script>
        // เลือกระดับความเร่งด่วน
        document.querySelectorAll('.urgency-option').forEach(option => {
            option.addEventListener('click', function() {
                // ลบคลาส selected จากทุกตัวเลือก
                document.querySelectorAll('.urgency-option').forEach(opt => {
                    opt.classList.remove('selected');
                });
                
                // เพิ่มคลาส selected ให้ตัวเลือกที่ถูกคลิก
                this.classList.add('selected');
                
                // ตั้งค่าค่าใน input hidden
                document.getElementById('urgencyLevel').value = this.getAttribute('data-level');
            });
        });
        
        // จัดการการส่งฟอร์ม
        document.getElementById('emergencyForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // ตรวจสอบว่ามีการเลือกระดับความเร่งด่วนหรือไม่
            const urgencyLevel = document.getElementById('urgencyLevel').value;
            if (!urgencyLevel) {
                alert('กรุณาเลือกระดับความเร่งด่วน');
                return;
            }
            
            // ในสถานการณ์จริง ข้อมูลจะถูกส่งไปยังเซิร์ฟเวอร์
            // สำหรับตัวอย่างนี้ เราจะแสดงข้อความยืนยัน
            
            const reporterName = document.getElementById('reporterName').value;
            const problemType = document.getElementById('problemType').value;
            
            let urgencyText = '';
            switch(urgencyLevel) {
                case 'high':
                    urgencyText = 'ด่วนมาก';
                    break;
                case 'medium':
                    urgencyText = 'ด่วน';
                    break;
                case 'low':
                    urgencyText = 'ปกติ';
                    break;
            }
            
            alert(`ขอบคุณ ${reporterName} สำหรับการแจ้งปัญหา\n\nประเภทปัญหา: ${document.getElementById('problemType').options[document.getElementById('problemType').selectedIndex].text}\nระดับความเร่งด่วน: ${urgencyText}\n\nCM จะติดต่อกลับไปในเร็วๆ นี้`);
            
            // รีเซ็ตฟอร์ม
            this.reset();
            document.querySelectorAll('.urgency-option').forEach(opt => {
                opt.classList.remove('selected');
            });
            document.getElementById('urgencyLevel').value = '';
        });
    </script>
</body>
</html>