<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบแจ้งปัญหาและเหตุฉุกเฉินสำหรับผู้สูงอายุ</title>
    <style>
        :root {
            --primary: #2c7873;
            --secondary: #6fb98f;
            --accent: #ff6b6b;
            --light: #f8f9fa;
            --dark: #343a40;
            --warning: #ffc107;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: var(--dark);
            line-height: 1.6;
        }
        
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 30px 0;
            text-align: center;
            border-radius: 0 0 10px 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        header h1 {
            font-size: 2.2rem;
            margin-bottom: 10px;
        }
        
        header p {
            font-size: 1.1rem;
            opacity: 0.9;
        }
        
        .emergency-contact {
            background-color: var(--accent);
            color: white;
            padding: 15px;
            margin: 20px 0;
            border-radius: 8px;
            text-align: center;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .form-container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        
        input, select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
            transition: border 0.3s;
        }
        
        input:focus, select:focus, textarea:focus {
            border-color: var(--secondary);
            outline: none;
            box-shadow: 0 0 0 2px rgba(111, 185, 143, 0.2);
        }
        
        .urgency-levels {
            display: flex;
            gap: 15px;
            margin-top: 10px;
        }
        
        .urgency-option {
            flex: 1;
            text-align: center;
            padding: 15px 10px;
            border: 2px solid #ddd;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .urgency-option:hover {
            border-color: var(--secondary);
        }
        
        .urgency-option.selected {
            border-color: var(--accent);
            background-color: rgba(255, 107, 107, 0.1);
            font-weight: bold;
        }
        
        .high-urgency {
            color: var(--accent);
        }
        
        .medium-urgency {
            color: var(--warning);
        }
        
        .low-urgency {
            color: var(--secondary);
        }
        
        .btn {
            display: inline-block;
            padding: 14px 28px;
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
            width: 100%;
        }
        
        .btn:hover {
            background-color: #235e59;
        }
        
        .btn-emergency {
            background-color: var(--accent);
        }
        
        .btn-emergency:hover {
            background-color: #e55a5a;
        }
        
        .contact-info {
            background-color: var(--light);
            padding: 25px;
            border-radius: 10px;
            text-align: center;
            margin-top: 30px;
        }
        
        .contact-info h3 {
            margin-bottom: 15px;
            color: var(--primary);
        }
        
        footer {
            text-align: center;
            padding: 20px;
            color: #6c757d;
            font-size: 0.9rem;
            margin-top: 30px;
        }
        
        @media (max-width: 600px) {
            .urgency-levels {
                flex-direction: column;
            }
            
            header h1 {
                font-size: 1.8rem;
            }
            
            .form-container {
                padding: 20px;
            }
        }
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