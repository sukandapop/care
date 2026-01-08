<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มคลังความรู้สำหรับผู้ป่วยติดเตียง</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', 'Kanit', sans-serif;
        }
        
        body {
            background-color: #f0f7ff;
            color: #333;
            line-height: 1.6;
            padding: 20px;
            min-height: 100vh;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 150, 0.1);
            overflow: hidden;
        }
        
        .header {
            background: linear-gradient(135deg, #4a6fa5, #2d4d7e);
            color: white;
            padding: 25px 30px;
            text-align: center;
            position: relative;
        }
        
        .header h1 {
            font-size: 2.2rem;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
        }
        
        .header p {
            font-size: 1.1rem;
            opacity: 0.9;
            max-width: 800px;
            margin: 0 auto;
        }
        
        .content-wrapper {
            display: flex;
            flex-wrap: wrap;
            padding: 0;
        }
        
        .form-section {
            flex: 1;
            min-width: 300px;
            padding: 30px;
            background-color: #f9fbff;
            border-right: 1px solid #e1e8f5;
        }
        
        .preview-section {
            flex: 1;
            min-width: 300px;
            padding: 30px;
            background-color: #ffffff;
        }
        
        .section-title {
            font-size: 1.5rem;
            color: #2d4d7e;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #e1e8f5;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2d4d7e;
            font-size: 1rem;
        }
        
        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #c5d0e6;
            border-radius: 8px;
            font-size: 1rem;
            transition: border 0.3s;
        }
        
        .form-control:focus {
            outline: none;
            border-color: #4a6fa5;
            box-shadow: 0 0 0 2px rgba(74, 111, 165, 0.2);
        }
        
        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }
        
        .file-upload {
            border: 2px dashed #c5d0e6;
            border-radius: 8px;
            padding: 25px;
            text-align: center;
            background-color: #f9fbff;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .file-upload:hover {
            border-color: #4a6fa5;
            background-color: #f0f7ff;
        }
        
        .file-upload i {
            font-size: 2.5rem;
            color: #4a6fa5;
            margin-bottom: 10px;
        }
        
        .file-list {
            margin-top: 15px;
            display: none;
        }
        
        .file-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            background-color: white;
            border-radius: 6px;
            margin-bottom: 8px;
            border: 1px solid #e1e8f5;
        }
        
        .btn {
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .btn-primary {
            background-color: #4a6fa5;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #3a5a8a;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        
        .btn-secondary {
            background-color: #e1e8f5;
            color: #2d4d7e;
        }
        
        .btn-secondary:hover {
            background-color: #d1d8e5;
        }
        
        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        
        .knowledge-preview {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            margin-top: 10px;
            border: 1px solid #e1e8f5;
        }
        
        .preview-header {
            background-color: #f0f7ff;
            padding: 20px;
            border-bottom: 1px solid #e1e8f5;
        }
        
        .preview-title {
            font-size: 1.4rem;
            color: #2d4d7e;
            margin-bottom: 5px;
        }
        
        .preview-meta {
            display: flex;
            gap: 15px;
            color: #666;
            font-size: 0.9rem;
        }
        
        .preview-content {
            padding: 20px;
            max-height: 300px;
            overflow-y: auto;
        }
        
        .preview-files {
            padding: 15px 20px;
            background-color: #f9fbff;
            border-top: 1px solid #e1e8f5;
        }
        
        .file-preview-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px;
            background-color: white;
            border-radius: 6px;
            margin-bottom: 8px;
            border: 1px solid #e1e8f5;
        }
        
        .file-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f7ff;
            border-radius: 5px;
            color: #4a6fa5;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: #999;
        }
        
        .empty-state i {
            font-size: 3rem;
            margin-bottom: 15px;
            opacity: 0.5;
        }
        
        .category-tag {
            display: inline-block;
            background-color: #e8f0ff;
            color: #4a6fa5;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        
        @media (max-width: 768px) {
            .content-wrapper {
                flex-direction: column;
            }
            
            .form-section {
                border-right: none;
                border-bottom: 1px solid #e1e8f5;
            }
        }
        
        .notification {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            gap: 10px;
            transform: translateY(100px);
            opacity: 0;
            transition: all 0.5s;
            z-index: 1000;
        }
        
        .notification.show {
            transform: translateY(0);
            opacity: 1;
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

    <div class="container">
        <header class="header">
            <h1><i class="fas fa-book-medical"></i> เพิ่มคลังความรู้สำหรับผู้ป่วยติดเตียง</h1>
            <p>สำหรับอาสาสมัครสาธารณสุข (อสม.) ใช้เพื่อเพิ่มข้อมูลความรู้ทางการแพทย์และแนวทางการดูแลผู้ป่วยติดเตียง</p>
        </header>
        
        <div class="content-wrapper">
            <!-- ส่วนฟอร์มเพิ่มข้อมูล -->
            <section class="form-section">
                <h2 class="section-title"><i class="fas fa-edit"></i> เพิ่มความรู้ใหม่</h2>
                
                <form id="knowledgeForm">
                    <div class="form-group">
                        <label for="knowledgeTitle"><i class="fas fa-heading"></i> ชื่อเรื่องความรู้</label>
                        <input type="text" id="knowledgeTitle" class="form-control" placeholder="ตัวอย่าง: วิธีการดูแลผู้ป่วยติดเตียงอย่างถูกวิธี" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="knowledgeCategory"><i class="fas fa-tags"></i> หมวดหมู่</label>
                        <select id="knowledgeCategory" class="form-control" required>
                            <option value="">เลือกหมวดหมู่</option>
                            <option value="care">การดูแลผู้ป่วย</option>
                            <option value="nutrition">โภชนาการและการให้อาหาร</option>
                            <option value="exercise">การออกกำลังกายบนเตียง</option>
                            <option value="medicine">การใช้ยาและการจัดการอาการ</option>
                            <option value="mental">สุขภาพจิตและการให้กำลังใจ</option>
                            <option value="prevention">การป้องกันแผลกดทับ</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="knowledgeContent"><i class="fas fa-file-alt"></i> เนื้อหาความรู้</label>
                        <textarea id="knowledgeContent" class="form-control" placeholder="เขียนเนื้อหาความรู้ที่นี่..." required></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label><i class="fas fa-paperclip"></i> ไฟล์แนบ (รูปภาพ, เอกสาร, วิดีโอ)</label>
                        <div class="file-upload" id="fileUploadArea">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <p>คลิกหรือลากไฟล์มาวางที่นี่เพื่ออัปโหลด</p>
                            <p style="font-size: 0.9rem; color: #777;">รองรับไฟล์: JPG, PNG, PDF, DOC, MP4 (ขนาดไม่เกิน 10MB)</p>
                            <input type="file" id="fileInput" multiple style="display: none;">
                        </div>
                        <div class="file-list" id="fileList"></div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> บันทึกความรู้</button>
                        <button type="button" class="btn btn-secondary" id="resetBtn"><i class="fas fa-redo"></i> ล้างข้อมูล</button>
                    </div>
                </form>
            </section>
            
            <!-- ส่วนแสดงตัวอย่าง -->
            <section class="preview-section">
                <h2 class="section-title"><i class="fas fa-eye"></i> ตัวอย่างความรู้</h2>
                <p style="margin-bottom: 20px; color: #666;">นี่คือตัวอย่างรูปแบบความรู้ที่จะแสดงให้ผู้ป่วยติดเตียงดู</p>
                
                <div id="previewContainer">
                    <div class="empty-state" id="emptyPreview">
                        <i class="fas fa-file-alt"></i>
                        <h3>ยังไม่มีข้อมูลความรู้</h3>
                        <p>กรอกแบบฟอร์มด้านซ้ายเพื่อดูตัวอย่างที่นี่</p>
                    </div>
                    
                    <div class="knowledge-preview" id="knowledgePreview" style="display: none;">
                        <div class="preview-header">
                            <h3 class="preview-title" id="previewTitle">ชื่อเรื่องความรู้</h3>
                            <div class="preview-meta">
                                <span><i class="far fa-calendar"></i> <span id="previewDate">วันนี้</span></span>
                                <span><i class="fas fa-tag"></i> <span id="previewCategory" class="category-tag">หมวดหมู่</span></span>
                            </div>
                        </div>
                        <div class="preview-content" id="previewContent">
                            เนื้อหาความรู้จะแสดงที่นี่...
                        </div>
                        <div class="preview-files" id="previewFiles">
                            <p style="font-weight: 600; margin-bottom: 10px; color: #2d4d7e;"><i class="fas fa-paperclip"></i> ไฟล์แนบ</p>
                            <div id="filePreviewList"></div>
                        </div>
                    </div>
                </div>
                
                <div style="margin-top: 30px; padding: 20px; background-color: #f0f7ff; border-radius: 10px;">
                    <h3 style="color: #2d4d7e; margin-bottom: 10px;"><i class="fas fa-lightbulb"></i> คำแนะนำสำหรับอสม.</h3>
                    <ul style="padding-left: 20px; color: #555;">
                        <li style="margin-bottom: 8px;">เพิ่มเนื้อหาที่เข้าใจง่าย มีภาพประกอบถ้าจำเป็น</li>
                        <li style="margin-bottom: 8px;">เลือกหมวดหมู่ให้เหมาะสมกับเนื้อหา</li>
                        <li style="margin-bottom: 8px;">ตรวจสอบความถูกต้องของข้อมูลก่อนบันทึก</li>
                        <li>พิจารณาความเหมาะสมของเนื้อหากับสภาพผู้ป่วย</li>
                    </ul>
                </div>
            </section>
        </div>
    </div>
    
    <div class="notification" id="notification">
        <i class="fas fa-check-circle"></i>
        <span id="notificationText">บันทึกข้อมูลสำเร็จแล้ว!</span>
    </div>

    <script>
        // ประกาศตัวแปรเก็บไฟล์
        let selectedFiles = [];
        
        // อ้างอิง DOM elements
        const knowledgeForm = document.getElementById('knowledgeForm');
        const knowledgeTitle = document.getElementById('knowledgeTitle');
        const knowledgeCategory = document.getElementById('knowledgeCategory');
        const knowledgeContent = document.getElementById('knowledgeContent');
        const fileUploadArea = document.getElementById('fileUploadArea');
        const fileInput = document.getElementById('fileInput');
        const fileList = document.getElementById('fileList');
        const resetBtn = document.getElementById('resetBtn');
        const previewContainer = document.getElementById('previewContainer');
        const knowledgePreview = document.getElementById('knowledgePreview');
        const emptyPreview = document.getElementById('emptyPreview');
        const previewTitle = document.getElementById('previewTitle');
        const previewDate = document.getElementById('previewDate');
        const previewCategory = document.getElementById('previewCategory');
        const previewContent = document.getElementById('previewContent');
        const previewFiles = document.getElementById('previewFiles');
        const filePreviewList = document.getElementById('filePreviewList');
        const notification = document.getElementById('notification');
        const notificationText = document.getElementById('notificationText');
        
        // ตั้งค่าวันที่ปัจจุบัน
        const today = new Date();
        const formattedDate = today.toLocaleDateString('th-TH', {
            year: 'numeric',
            month: 'long',
            day: 'numeric'
        });
        
        // Event Listeners
        fileUploadArea.addEventListener('click', () => {
            fileInput.click();
        });
        
        fileInput.addEventListener('change', handleFileSelect);
        
        // จัดการเมื่อเลือกไฟล์
        function handleFileSelect(e) {
            const files = e.target.files;
            selectedFiles = Array.from(files);
            updateFileList();
            updateFilePreview();
        }
        
        // อัพเดตรายการไฟล์ที่เลือก
        function updateFileList() {
            if (selectedFiles.length === 0) {
                fileList.style.display = 'none';
                return;
            }
            
            fileList.style.display = 'block';
            fileList.innerHTML = '';
            
            selectedFiles.forEach((file, index) => {
                const fileItem = document.createElement('div');
                fileItem.className = 'file-item';
                
                const fileInfo = document.createElement('div');
                fileInfo.innerHTML = `
                    <div style="font-weight: 600;">${file.name}</div>
                    <div style="font-size: 0.8rem; color: #777;">${formatFileSize(file.size)}</div>
                `;
                
                const removeBtn = document.createElement('button');
                removeBtn.innerHTML = '<i class="fas fa-times"></i>';
                removeBtn.style.cssText = 'background: none; border: none; color: #ff6b6b; cursor: pointer; font-size: 1rem;';
                removeBtn.addEventListener('click', () => {
                    selectedFiles.splice(index, 1);
                    updateFileList();
                    updateFilePreview();
                });
                
                fileItem.appendChild(fileInfo);
                fileItem.appendChild(removeBtn);
                fileList.appendChild(fileItem);
            });
        }
        
        // อัพเดตตัวอย่างไฟล์
        function updateFilePreview() {
            filePreviewList.innerHTML = '';
            
            if (selectedFiles.length === 0) {
                previewFiles.style.display = 'none';
                return;
            }
            
            previewFiles.style.display = 'block';
            
            selectedFiles.forEach((file, index) => {
                const filePreviewItem = document.createElement('div');
                filePreviewItem.className = 'file-preview-item';
                
                // กำหนดไอคอนตามประเภทไฟล์
                let iconClass = 'fa-file';
                if (file.type.startsWith('image/')) {
                    iconClass = 'fa-file-image';
                } else if (file.type === 'application/pdf') {
                    iconClass = 'fa-file-pdf';
                } else if (file.type.includes('video')) {
                    iconClass = 'fa-file-video';
                } else if (file.type.includes('document') || file.type.includes('word')) {
                    iconClass = 'fa-file-word';
                }
                
                filePreviewItem.innerHTML = `
                    <div class="file-icon">
                        <i class="fas ${iconClass}"></i>
                    </div>
                    <div style="flex: 1;">
                        <div style="font-weight: 600; font-size: 0.9rem;">${file.name}</div>
                        <div style="font-size: 0.8rem; color: #777;">${formatFileSize(file.size)}</div>
                    </div>
                `;
                
                filePreviewList.appendChild(filePreviewItem);
            });
        }
        
        // จัดการเมื่อฟอร์มถูกส่ง
        knowledgeForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // อัพเดตตัวอย่างความรู้
            updatePreview();
            
            // แสดงการแจ้งเตือน
            showNotification('บันทึกข้อมูลความรู้สำเร็จแล้ว!');
            
            // ในสภาพแวดล้อมจริงควรส่งข้อมูลไปยังเซิร์ฟเวอร์ที่นี่
            console.log('ข้อมูลความรู้ที่บันทึก:', {
                title: knowledgeTitle.value,
                category: knowledgeCategory.value,
                content: knowledgeContent.value,
                files: selectedFiles.map(f => f.name),
                date: new Date().toISOString()
            });
        });
        
        // อัพเดตตัวอย่าง
        function updatePreview() {
            if (knowledgeTitle.value.trim() === '' || 
                knowledgeCategory.value === '' || 
                knowledgeContent.value.trim() === '') {
                return; // อย่าอัพเดตตัวอย่างถ้าข้อมูลไม่ครบ
            }
            
            // อัพเดตข้อมูลตัวอย่าง
            previewTitle.textContent = knowledgeTitle.value;
            previewDate.textContent = formattedDate;
            
            // แสดงชื่อหมวดหมู่ที่อ่านเข้าใจง่าย
            const categoryMap = {
                'care': 'การดูแลผู้ป่วย',
                'nutrition': 'โภชนาการและการให้อาหาร',
                'exercise': 'การออกกำลังกายบนเตียง',
                'medicine': 'การใช้ยาและการจัดการอาการ',
                'mental': 'สุขภาพจิตและการให้กำลังใจ',
                'prevention': 'การป้องกันแผลกดทับ'
            };
            
            previewCategory.textContent = categoryMap[knowledgeCategory.value] || knowledgeCategory.value;
            previewContent.textContent = knowledgeContent.value;
            
            // แสดงตัวอย่างไฟล์
            updateFilePreview();
            
            // แสดงตัวอย่างความรู้และซ่อนสถานะว่าง
            knowledgePreview.style.display = 'block';
            emptyPreview.style.display = 'none';
        }
        
        // รีเซ็ตฟอร์ม
        resetBtn.addEventListener('click', function() {
            knowledgeForm.reset();
            selectedFiles = [];
            updateFileList();
            updateFilePreview();
            
            // รีเซ็ตตัวอย่าง
            knowledgePreview.style.display = 'none';
            emptyPreview.style.display = 'block';
            
            // แจ้งเตือนการรีเซ็ต
            showNotification('ล้างข้อมูลฟอร์มแล้ว');
        });
        
        // อัพเดตตัวอย่างเมื่อผู้ใช้พิมพ์
        knowledgeTitle.addEventListener('input', updatePreview);
        knowledgeCategory.addEventListener('change', updatePreview);
        knowledgeContent.addEventListener('input', updatePreview);
        
        // ฟังก์ชันแสดงการแจ้งเตือน
        function showNotification(message) {
            notificationText.textContent = message;
            notification.classList.add('show');
            
            setTimeout(() => {
                notification.classList.remove('show');
            }, 3000);
        }
        
        // ฟังก์ชันจัดรูปแบบขนาดไฟล์
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }
        
        // ตัวอย่างข้อมูลเริ่มต้นเพื่อให้เห็นตัวอย่าง
        function loadSampleData() {
            knowledgeTitle.value = "การป้องกันแผลกดทับในผู้ป่วยติดเตียง";
            knowledgeCategory.value = "prevention";
            knowledgeContent.value = `แผลกดทับเป็นปัญหาที่พบบ่อยในผู้ป่วยติดเตียง เกิดจากการกดทับของร่างกายบนพื้นผิวเป็นเวลานาน ซึ่งทำให้เลือดไม่สามารถไหลเวียนไปเลี้ยงผิวหนังได้

คำแนะนำในการป้องกันแผลกดทับ:
1. เปลี่ยนท่าผู้ป่วยทุก 2 ชั่วโมง
2. ใช้เบาะรองกันแผลกดทับ
3. ตรวจสอบผิวหนังทุกวันบริเวณที่ถูกกดทับ
4. ทำความสะอาดผิวหนังและรักษาความชุ่มชื้น
5. ดูแลโภชนาการให้เหมาะสมเพื่อเสริมสร้างผิวหนัง

หากพบผิวหนังแดงที่กดแล้วไม่เปลี่ยนสี ควรปรึกษาแพทย์หรือพยาบาลทันที`;

            updatePreview();
            showNotification('โหลดตัวอย่างข้อมูลสำเร็จ');
        }
        
        // โหลดข้อมูลตัวอย่างหลังจากหน้าเว็บโหลดเสร็จ
        window.addEventListener('DOMContentLoaded', () => {
            // โหลดข้อมูลตัวอย่างหลังจาก 1 วินาที
            setTimeout(loadSampleData, 500);
        });
    </script>
</body>
</html>