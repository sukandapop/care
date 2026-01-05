<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกการเยี่ยมบ้านผู้สูงอายุติดเตียง</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
            color: #333;
        }
        
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        h1 {
            color: #2c7873;
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #2c7873;
            padding-bottom: 10px;
        }
        
        h2 {
            color: #2c7873;
            border-left: 4px solid #2c7873;
            padding-left: 10px;
            margin-top: 30px;
        }
        
        .section {
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        
        table, th, td {
            border: 1px solid #ddd;
        }
        
        th, td {
            padding: 10px;
            text-align: left;
        }
        
        th {
            background-color: #e8f4f3;
        }
        
        input[type="text"],
        input[type="date"],
        input[type="number"],
        input[type="file"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 10px;
        }
        
        .checkbox-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-bottom: 10px;
        }
        
        .checkbox-item {
            display: flex;
            align-items: center;
        }
        
        .checkbox-item input {
            margin-right: 5px;
        }
        
        button {
            background-color: #2c7873;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        
        button:hover {
            background-color: #235f5b;
        }
        
        .photo-section {
            margin-top: 20px;
            padding: 15px;
            border: 1px dashed #2c7873;
            border-radius: 5px;
            background-color: #f0f9f8;
        }
        
        .photo-preview {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }
        
        .photo-preview img {
            max-width: 150px;
            max-height: 150px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        
        .photo-item {
            position: relative;
            display: inline-block;
        }
        
        .remove-photo {
            position: absolute;
            top: -5px;
            right: -5px;
            background: red;
            color: white;
            border: none;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            cursor: pointer;
            font-size: 12px;
        }
        
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }
            
            table {
                display: block;
                overflow-x: auto;
            }
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

    <div class="container">
        <h1>บันทึกการเยี่ยมบ้านผู้สูงอายุติดเตียง</h1>
        
        <div class="section">
            <h2>ส่วนที่ 1: ข้อมูลทั่วไป</h2>
            <table>
                <tr>
                    <th width="30%">วันที่เยี่ยมบ้าน</th>
                    <td width="70%"><input type="date" id="visitDate" required></td>
                </tr>
                <tr>
                    <th>ชื่อ-สกุล อสม.</th>
                    <td><input type="text" id="volunteerName" required></td>
                </tr>
                <tr>
                    <th>บ้านเลขที่</th>
                    <td><input type="text" id="houseNumber" required></td>
                </tr>
                <tr>
                    <th>ชื่อ-สกุล ผู้สูงอายุ</th>
                    <td><input type="text" id="elderName" required></td>
                </tr>
                <tr>
                    <th>อายุ</th>
                    <td><input type="number" id="age" required></td>
                </tr>
                <tr>
                    <th>เพศ</th>
                    <td>
                        <input type="radio" id="male" name="gender" value="male">
                        <label for="male">ชาย</label>
                        <input type="radio" id="female" name="gender" value="female" style="margin-left: 15px;">
                        <label for="female">หญิง</label>
                    </td>
                </tr>
                <tr>
                    <th>เลขที่บัตรประจำตัวประชาชน</th>
                    <td><input type="text" id="idCard" required></td>
                </tr>
                <tr>
                    <th>ชื่อ-สกุล ผู้ดูแลหลัก</th>
                    <td><input type="text" id="caregiverName" required></td>
                </tr>
                <tr>
                    <th>ความสัมพันธ์กับผู้สูงอายุ</th>
                    <td>
                        <select id="relationship" required>
                            <option value="">-- กรุณาเลือก --</option>
                            <option value="ลูก">ลูก</option>
                            <option value="หลาน">หลาน</option>
                            <option value="พี่เลี้ยง">พี่เลี้ยง</option>
                            <option value="อยู่คนเดียว">อยู่คนเดียว</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>เบอร์โทรศัพท์ติดต่อ</th>
                    <td><input type="text" id="phoneNumber" required></td>
                </tr>
            </table>
            
            <!-- ส่วนอัพโหลดรูปภาพการเยี่ยม -->
            <div class="photo-section">
                <p><strong>อัพโหลดรูปภาพการเยี่ยมบ้าน</strong></p>
                <input type="file" id="visitPhoto" accept="image/*" multiple>
                <div class="photo-preview" id="visitPhotoPreview"></div>
            </div>
        </div>
        
        <div class="section">
            <h2>ส่วนที่ 2: การประเมินสภาพผู้สูงอายุ ณ วันเยี่ยม</h2>
            
            <h3>1. สภาพร่างกายทั่วไป</h3>
            <p><strong>ระดับความสามารถในกิจวัตรประจำวัน (ADL - Activities of Daily Living)</strong></p>
            
            <table>
                <tr>
                    <th width="40%">การรับประทานอาหาร</th>
                    <td width="60%">
                        <input type="radio" id="eat1" name="eat" value="ทำเองได้">
                        <label for="eat1">ทำเองได้</label><br>
                        <input type="radio" id="eat2" name="eat" value="ต้องการช่วยเหลือบ้าง">
                        <label for="eat2">ต้องการช่วยเหลือบ้าง</label><br>
                        <input type="radio" id="eat3" name="eat" value="ต้องป้อน">
                        <label for="eat3">ต้องป้อน</label>
                    </td>
                </tr>
                <tr>
                    <th>การอาบน้ำ/เช็ดตัว</th>
                    <td>
                        <input type="radio" id="bath1" name="bath" value="ทำเองได้">
                        <label for="bath1">ทำเองได้</label><br>
                        <input type="radio" id="bath2" name="bath" value="ต้องการช่วยเหลือ">
                        <label for="bath2">ต้องการช่วยเหลือ</label><br>
                        <input type="radio" id="bath3" name="bath" value="ต้องช่วยทำทั้งหมด">
                        <label for="bath3">ต้องช่วยทำทั้งหมด</label>
                    </td>
                </tr>
                <tr>
                    <th>การแต่งกาย</th>
                    <td>
                        <input type="radio" id="dress1" name="dress" value="ทำเองได้">
                        <label for="dress1">ทำเองได้</label><br>
                        <input type="radio" id="dress2" name="dress" value="ต้องการช่วยเหลือ">
                        <label for="dress2">ต้องการช่วยเหลือ</label><br>
                        <input type="radio" id="dress3" name="dress" value="ต้องช่วยทำทั้งหมด">
                        <label for="dress3">ต้องช่วยทำทั้งหมด</label>
                    </td>
                </tr>
                <tr>
                    <th>การเคลื่อนย้าย (ลุก-นั่ง-พลิกตัว)</th>
                    <td>
                        <input type="radio" id="move1" name="move" value="ทำเองได้">
                        <label for="move1">ทำเองได้</label><br>
                        <input type="radio" id="move2" name="move" value="ต้องการช่วยเหลือ">
                        <label for="move2">ต้องการช่วยเหลือ</label><br>
                        <input type="radio" id="move3" name="move" value="ต้องช่วยทำทั้งหมด">
                        <label for="move3">ต้องช่วยทำทั้งหมด</label>
                    </td>
                </tr>
                <tr>
                    <th>การใช้ห้องน้ำ/การขับถ่าย</th>
                    <td>
                        <input type="radio" id="toilet1" name="toilet" value="ควบคุมได้">
                        <label for="toilet1">ควบคุมได้</label><br>
                        <input type="radio" id="toilet2" name="toilet" value="กลั้นไม่อยู่">
                        <label for="toilet2">กลั้นไม่อยู่</label><br>
                        <input type="radio" id="toilet3" name="toilet" value="ใช้ผ้าอ้อม">
                        <label for="toilet3">ใช้ผ้าอ้อม</label>
                    </td>
                </tr>
            </table>
            
            <p><strong>สัญญาณชีพ (ถ้ามีเครื่องวัด)</strong></p>
            <table>
                <tr>
                    <th width="40%">ความดันโลหิต</th>
                    <td width="60%">
                        <input type="text" id="bloodPressure" placeholder="เช่น 120/80"> mmHg
                    </td>
                </tr>
                <tr>
                    <th>อัตราชีพจร</th>
                    <td>
                        <input type="number" id="pulse" placeholder="เช่น 72"> ครั้ง/นาที
                    </td>
                </tr>
            </table>
            
            <p><strong>แผลกดทับ (ตรวจดูตามจุดต่างๆ เช่น ส้นเท้า ข้อเท้า สะโพก ก้นกบ)</strong></p>
            <div class="checkbox-group">
                <div class="checkbox-item">
                    <input type="radio" id="wound1" name="wound" value="ไม่มีแผล">
                    <label for="wound1">ไม่มีแผล</label>
                </div>
                <div class="checkbox-item">
                    <input type="radio" id="wound2" name="wound" value="มีแผล">
                    <label for="wound2">มีแผล</label>
                </div>
            </div>
            <p>ตำแหน่งแผล: <input type="text" id="woundLocation" style="width: 70%;"></p>
            <p>ลักษณะแผล: <textarea id="woundDescription" rows="2"></textarea></p>
            
            <h3>2. สภาพจิตใจและอารมณ์</h3>
            <div class="checkbox-group">
                <div class="checkbox-item">
                    <input type="checkbox" id="mood1">
                    <label for="mood1">ยิ้มแย้มแจ่มใส / พูดคุยดี</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="mood2">
                    <label for="mood2">ดูเศร้า ซึม ไม่ค่อยพูด</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="mood3">
                    <label for="mood3">วิตกกังวล กลัว</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="mood4">
                    <label for="mood4">หงุดหงิดง่าย</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="mood5">
                    <label for="mood5">สับสน หลงลืม</label>
                </div>
            </div>
            
            <h3>3. การใช้ยา</h3>
            <div class="checkbox-group">
                <div class="checkbox-item">
                    <input type="radio" id="medicine1" name="medicine" value="รับประทานยาได้ด้วยตนเอง">
                    <label for="medicine1">รับประทานยาได้ด้วยตนเอง</label>
                </div>
                <div class="checkbox-item">
                    <input type="radio" id="medicine2" name="medicine" value="มีผู้ดูแลจัดยาให้">
                    <label for="medicine2">มีผู้ดูแลจัดยาให้</label>
                </div>
            </div>
            
            <p><strong>รายชื่อยาที่รับประทานเป็นประจำ:</strong> (เช่น ยาลดความดัน, ยาเบาหวาน)</p>
            <textarea id="medicationList" rows="3" placeholder="1. ...&#10;2. ...&#10;3. ..."></textarea>
            
            <p><strong>ปัญหาที่เกี่ยวข้องกับการใช้ยา:</strong> (เช่น ลืมกินยา, ได้รับยาซ้ำซ้อน, ผลข้างเคียง)</p>
            <textarea id="medicationIssues" rows="2"></textarea>
        </div>
        
        <div class="section">
            <h2>ส่วนที่ 3: การดูแลและช่วยเหลือที่ให้ในช่วงเยี่ยมบ้าน</h2>
            <div class="checkbox-group">
                <div class="checkbox-item">
                    <input type="checkbox" id="care1">
                    <label for="care1">สอน/สาธิต การพลิกตัวเปลี่ยนท่าผู้ป่วยเพื่อป้องกันแผลกดทับ</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="care2">
                    <label for="care2">ให้คำแนะนำการดูแลความสะอาดร่างกายและช่องปาก</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="care3">
                    <label for="care3">ให้คำแนะนำการจัดการด้านโภชนาการและสารน้ำ (การป้อนอาหาร/น้ำ)</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="care4">
                    <label for="care4">ให้คำแนะนำเกี่ยวกับการจัดการยา</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="care5">
                    <label for="care5">ให้กำลังใจและคำปรึกษาด้านจิตใจแก่ผู้สูงอายุและผู้ดูแล</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="care6">
                    <label for="care6">ประสานงาน/แจ้งเจ้าหน้าที่สาธารณสุขเกี่ยวกับปัญหาที่พบ</label>
                </div>
                <div class="checkbox-item">
                    <input type="checkbox" id="care7">
                    <label for="care7">อื่นๆ ระบุ</label>
                    <input type="text" id="otherCare" style="width: 200px; margin-left: 10px;">
                </div>
            </div>
        </div>
        
        <div class="section">
            <h2>ส่วนที่ 4: สรุปปัญหาและข้อเสนอแนะ</h2>
            <table>
                <tr>
                    <th width="30%">ปัญหาที่พบ</th>
                    <th width="70%">ข้อเสนอแนะ/การช่วยเหลือ</th>
                </tr>
                <tr>
                    <td>1. ด้านร่างกาย (เช่น มีแผลกดทับ, ท้องผูก)</td>
                    <td><textarea id="physicalProblem" rows="2"></textarea></td>
                </tr>
                <tr>
                    <td>2. ด้านจิตใจ (เช่น ผู้ดูแลเครียด, ผู้สูงอายุซึมเศร้า)</td>
                    <td><textarea id="mentalProblem" rows="2"></textarea></td>
                </tr>
                <tr>
                    <td>3. ด้านสังคม/เศรษฐกิจ (เช่น ขาดแคลนเงิน, ที่อยู่อาศัยไม่เหมาะสม)</td>
                    <td><textarea id="socialProblem" rows="2"></textarea></td>
                </tr>
                <tr>
                    <td>4. ด้านการเข้าถึงบริการสาธารณสุข</td>
                    <td><textarea id="serviceProblem" rows="2"></textarea></td>
                </tr>
            </table>
            
            <p><strong>นัดเยี่ยมบ้านครั้งต่อไป:</strong> <input type="date" id="nextVisitDate"></p>
            <p><strong>ลายเซ็น/ชื่อ-สกุล อสม.</strong> ______________________________</p>
        </div>
        
        <button type="button" id="submitBtn">บันทึกข้อมูล</button>
    </div>

    <script>
        // ฟังก์ชันสำหรับจัดการการอัพโหลดรูปภาพ
        function setupPhotoUpload(inputId, previewId) {
            const input = document.getElementById(inputId);
            const preview = document.getElementById(previewId);
            
            input.addEventListener('change', function(e) {
                // ล้างรูปภาพเก่า
                preview.innerHTML = '';
                
                // ตรวจสอบว่ามีไฟล์ที่เลือกหรือไม่
                if (this.files && this.files.length > 0) {
                    // วนลูปผ่านไฟล์ทั้งหมด
                    for (let i = 0; i < this.files.length; i++) {
                        const file = this.files[i];
                        
                        // ตรวจสอบว่าเป็นรูปภาพหรือไม่
                        if (!file.type.match('image.*')) {
                            alert('กรุณาเลือกไฟล์รูปภาพเท่านั้น');
                            continue;
                        }
                        
                        const reader = new FileReader();
                        
                        reader.onload = function(e) {
                            // สร้างองค์ประกอบรูปภาพ
                            const img = document.createElement('img');
                            img.src = e.target.result;
                            
                            // สร้างปุ่มลบ
                            const removeBtn = document.createElement('button');
                            removeBtn.textContent = '×';
                            removeBtn.className = 'remove-photo';
                            removeBtn.onclick = function() {
                                preview.removeChild(div);
                                // ในทางปฏิบัติอาจต้องลบไฟล์จาก input ด้วย
                            };
                            
                            // สร้าง div สำหรับรูปภาพและปุ่มลบ
                            const div = document.createElement('div');
                            div.className = 'photo-item';
                            div.appendChild(img);
                            div.appendChild(removeBtn);
                            
                            // เพิ่มลงในพื้นที่แสดงผล
                            preview.appendChild(div);
                        };
                        
                        reader.readAsDataURL(file);
                    }
                }
            });
        }
        
        // ตั้งค่าการอัพโหลดรูปภาพสำหรับส่วนการเยี่ยมบ้าน
        setupPhotoUpload('visitPhoto', 'visitPhotoPreview');
        
        // ฟังก์ชันสำหรับบันทึกข้อมูล
        document.getElementById('submitBtn').addEventListener('click', function() {
            // ในทางปฏิบัติ ควรมีการตรวจสอบความถูกต้องของข้อมูล
            // และส่งข้อมูลไปยังเซิร์ฟเวอร์
            
            alert('บันทึกข้อมูลเรียบร้อยแล้ว');
            // ในทางปฏิบัติควร redirect ไปยังหน้าอื่นหรือรีเซ็ตฟอร์ม
        });
    </script>
</body>
</html>