<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบบันทึกข้อมูลผู้สูงอายุติดเตียง</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./css/bedridden_data_record.css">
</head>
<body>

<?php include 'navbar.php'; ?>

    <div class="container">
        <header>
            <div class="header-content">
                <i class="fas fa-user-injured"></i>
                <div>
                    <h1>ระบบบันทึกข้อมูลผู้สูงอายุติดเตียง</h1>
                    <p class="subtitle">สำหรับการดูแลผู้สูงอายุที่ต้องการการดูแลอย่างใกล้ชิด</p>
                </div>
            </div>
        </header>
        
        <div class="content">
            <div class="alert success-alert" id="successAlert">
                <i class="fas fa-check-circle"></i> บันทึกข้อมูลสำเร็จ! ข้อมูลผู้สูงอายุถูกบันทึกลงระบบแล้ว
            </div>
            
            <div class="alert error-alert" id="errorAlert">
                <i class="fas fa-exclamation-triangle"></i> กรุณากรอกข้อมูลที่จำเป็นให้ครบถ้วน
            </div>
            
            <form id="elderlyRecordForm">
                <div class="form-section">
                    <h2 class="section-title">
                        <i class="fas fa-id-card"></i> ข้อมูลส่วนตัว
                    </h2>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="fullName" class="required">ชื่อ-นามสกุล</label>
                            <input type="text" id="fullName" name="fullName" placeholder="กรุณากรอกชื่อ-นามสกุล">
                        </div>
                        
                        <div class="form-group">
                            <label for="idCard" class="required">เลขประจำตัวประชาชน</label>
                            <input type="text" id="idCard" name="idCard" placeholder="กรอกเลขประจำตัวประชาชน 13 หลัก">
                        </div>
                        
                        <div class="form-group">
                            <label for="birthDate" class="required">วันเดือนปีเกิด</label>
                            <input type="date" id="birthDate" name="birthDate">
                        </div>
                        
                        <div class="form-group">
                            <label for="age" class="required">อายุ</label>
                            <input type="number" id="age" name="age" min="60" max="120" placeholder="อายุเป็นปี">
                        </div>
                        
                        <div class="form-group">
                            <label class="required">เพศ</label>
                            <div class="radio-group">
                                <div class="radio-option">
                                    <input type="radio" id="male" name="gender" value="ชาย">
                                    <label for="male">ชาย</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" id="female" name="gender" value="หญิง">
                                    <label for="female">หญิง</label>
                                </div>
                                <div class="radio-option">
                                    <input type="radio" id="other" name="gender" value="อื่นๆ">
                                    <label for="other">อื่นๆ</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="bedriddenDate" class="required">วันที่เริ่มติดเตียง</label>
                            <input type="date" id="bedriddenDate" name="bedriddenDate">
                        </div>
                    </div>
                </div>
                
                <div class="form-section">
                    <h2 class="section-title">
                        <i class="fas fa-home"></i> ข้อมูลที่อยู่และผู้ติดต่อ
                    </h2>
                    
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label for="address" class="required">ที่อยู่</label>
                            <textarea id="address" name="address" rows="3" placeholder="บ้านเลขที่, หมู่, ตำบล, อำเภอ, จังหวัด, รหัสไปรษณีย์"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="phone" class="required">เบอร์โทรศัพท์</label>
                            <input type="tel" id="phone" name="phone" placeholder="กรอกเบอร์โทรศัพท์">
                        </div>
                        
                        <div class="form-group">
                            <label for="emergencyContact" class="required">ผู้ติดต่อฉุกเฉิน</label>
                            <input type="text" id="emergencyContact" name="emergencyContact" placeholder="ชื่อผู้ติดต่อฉุกเฉิน">
                        </div>
                        
                        <div class="form-group">
                            <label for="emergencyPhone" class="required">เบอร์ติดต่อฉุกเฉิน</label>
                            <input type="tel" id="emergencyPhone" name="emergencyPhone" placeholder="เบอร์ติดต่อฉุกเฉิน">
                        </div>
                    </div>
                </div>
                
                <div class="form-section">
                    <h2 class="section-title">
                        <i class="fas fa-heartbeat"></i> ข้อมูลด้านสุขภาพ
                    </h2>
                    
                    <div class="form-grid">
                        <div class="form-group">
                            <label for="primaryDiagnosis" class="required">โรคประจำตัวหลัก</label>
                            <input type="text" id="primaryDiagnosis" name="primaryDiagnosis" placeholder="เช่น โรคหัวใจ, เบาหวาน, ความดัน">
                        </div>
                        
                        <div class="form-group">
                            <label for="secondaryDiagnosis">โรคประจำตัวรอง</label>
                            <input type="text" id="secondaryDiagnosis" name="secondaryDiagnosis" placeholder="โรคอื่น ๆ (ถ้ามี)">
                        </div>
                        
                        <div class="form-group">
                            <label for="allergies">การแพ้ยา/อาหาร</label>
                            <input type="text" id="allergies" name="allergies" placeholder="ระบุการแพ้ (ถ้ามี)">
                        </div>
                        
                        <div class="form-group">
                            <label for="bedriddenReason" class="required">สาเหตุที่ติดเตียง</label>
                            <select id="bedriddenReason" name="bedriddenReason">
                                <option value="">เลือกสาเหตุ</option>
                                <option value="โรคหลอดเลือดสมอง">โรคหลอดเลือดสมอง (Stroke)</option>
                                <option value="โรคข้อเสื่อมรุนแรง">โรคข้อเสื่อมรุนแรง</option>
                                <option value="โรคพาร์กินสัน">โรคพาร์กินสัน</option>
                                <option value="อัมพาต">อัมพาต</option>
                                <option value="อุบัติเหตุ">อุบัติเหตุ</option>
                                <option value="อื่นๆ">อื่นๆ</option>
                            </select>
                        </div>
                        
                        <div class="form-group full-width">
                            <label for="notes">หมายเหตุเพิ่มเติม</label>
                            <textarea id="notes" name="notes" rows="4" placeholder="บันทึกข้อมูลอื่น ๆ ที่สำคัญ เช่น พฤติกรรม, ความชอบ, ข้อควรระวัง"></textarea>
                        </div>
                    </div>
                </div>
                
                <div class="button-group">
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-save"></i> บันทึกข้อมูล
                    </button>
                    <button type="button" class="reset-btn" id="resetBtn">
                        <i class="fas fa-redo"></i> ล้างฟอร์ม
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // อัพเดทอายุเมื่อเลือกวันเกิด
        document.getElementById('birthDate').addEventListener('change', function() {
            const birthDate = new Date(this.value);
            const today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();
            
            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }
            
            if (age >= 60) {
                document.getElementById('age').value = age;
            }
        });
        
        // ตั้งค่าวันเริ่มติดเตียงเป็นวันนี้
        document.getElementById('bedriddenDate').valueAsDate = new Date();
        
        // อัพเดทวันเกิดเมื่อป้อนอายุ
        document.getElementById('age').addEventListener('change', function() {
            const age = parseInt(this.value);
            if (age >= 60) {
                const today = new Date();
                const birthYear = today.getFullYear() - age;
                const birthDate = new Date(birthYear, today.getMonth(), today.getDate());
                document.getElementById('birthDate').valueAsDate = birthDate;
            }
        });
        
        // รีเซ็ตฟอร์ม
        document.getElementById('resetBtn').addEventListener('click', function() {
            if (confirm('คุณต้องการล้างข้อมูลทั้งหมดในฟอร์มหรือไม่?')) {
                document.getElementById('elderlyRecordForm').reset();
                document.getElementById('bedriddenDate').valueAsDate = new Date();
                hideAlerts();
            }
        });
        
        // ซ่อน alert ทั้งหมด
        function hideAlerts() {
            document.getElementById('successAlert').style.display = 'none';
            document.getElementById('errorAlert').style.display = 'none';
        }
        
        // จัดการการส่งฟอร์ม
        document.getElementById('elderlyRecordForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // ตรวจสอบข้อมูลที่จำเป็น
            const requiredFields = [
                'fullName', 'idCard', 'birthDate', 'age', 
                'bedriddenDate', 'address', 'phone', 
                'emergencyContact', 'emergencyPhone', 
                'primaryDiagnosis', 'bedriddenReason'
            ];
            
            let isValid = true;
            let firstErrorField = null;
            
            requiredFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (!field.value.trim()) {
                    isValid = false;
                    if (!firstErrorField) firstErrorField = field;
                    
                    // เพิ่มสไตล์แสดงข้อผิดพลาด
                    field.style.borderColor = '#e53e3e';
                    field.style.boxShadow = '0 0 0 3px rgba(229, 62, 62, 0.1)';
                } else {
                    // ลบสไตล์ข้อผิดพลาด
                    field.style.borderColor = '#cbd5e0';
                    field.style.boxShadow = 'none';
                }
            });
            
            // ตรวจสอบว่าเลือกเพศหรือไม่
            const genderSelected = document.querySelector('input[name="gender"]:checked');
            if (!genderSelected) {
                isValid = false;
                document.querySelector('.radio-group').style.outline = '2px solid #e53e3e';
                document.querySelector('.radio-group').style.borderRadius = '8px';
                document.querySelector('.radio-group').style.padding = '5px';
            } else {
                document.querySelector('.radio-group').style.outline = 'none';
                document.querySelector('.radio-group').style.padding = '0';
            }
            
            if (!isValid) {
                // แสดง error alert
                document.getElementById('errorAlert').style.display = 'block';
                document.getElementById('successAlert').style.display = 'none';
                
                // เลื่อนไปยังฟิลด์แรกที่ผิดพลาด
                if (firstErrorField) {
                    firstErrorField.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    firstErrorField.focus();
                }
                
                return;
            }
            
            // ถ้าข้อมูลครบ แสดง success alert
            document.getElementById('successAlert').style.display = 'block';
            document.getElementById('errorAlert').style.display = 'none';
            
            // ในสถานการณ์จริง ข้อมูลควรถูกส่งไปยังเซิร์ฟเวอร์ที่นี่
            console.log('บันทึกข้อมูลผู้สูงอายุสำเร็จ');
            console.log('ข้อมูลที่บันทึก:', {
                fullName: document.getElementById('fullName').value,
                idCard: document.getElementById('idCard').value,
                birthDate: document.getElementById('birthDate').value,
                age: document.getElementById('age').value,
                gender: document.querySelector('input[name="gender"]:checked').value,
                bedriddenDate: document.getElementById('bedriddenDate').value,
                address: document.getElementById('address').value,
                phone: document.getElementById('phone').value,
                emergencyContact: document.getElementById('emergencyContact').value,
                emergencyPhone: document.getElementById('emergencyPhone').value,
                primaryDiagnosis: document.getElementById('primaryDiagnosis').value,
                secondaryDiagnosis: document.getElementById('secondaryDiagnosis').value,
                allergies: document.getElementById('allergies').value,
                bedriddenReason: document.getElementById('bedriddenReason').value,
                notes: document.getElementById('notes').value
            });
            
            // เลื่อนไปด้านบนเพื่อแสดงข้อความสำเร็จ
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
        
        // ลบสไตล์ข้อผิดพลาดเมื่อผู้ใช้เริ่มพิมพ์
        const inputs = document.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                this.style.borderColor = '#cbd5e0';
                this.style.boxShadow = 'none';
                
                if (this.name === 'gender') {
                    document.querySelector('.radio-group').style.outline = 'none';
                    document.querySelector('.radio-group').style.padding = '0';
                }
            });
        });
    </script>
</body>
</html>