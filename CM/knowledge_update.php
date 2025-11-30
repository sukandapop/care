<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อัพโหลดข้อมูลการดูแลผู้สูงอายุ - คลังความรู้</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #2c7fb8;
            --secondary-color: #7fcdbb;
            --accent-color: #edf8b1;
            --light-color: #f0f9ff;
        }
        
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
        }
        
        .header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem 0;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
        
        .upload-container {
            background-color: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 2rem;
            margin-top: -50px;
            position: relative;
            z-index: 10;
        }
        
        .form-section {
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #eee;
        }
        
        .form-section:last-child {
            border-bottom: none;
        }
        
        .section-title {
            color: var(--primary-color);
            font-weight: 600;
            margin-bottom: 1.2rem;
            display: flex;
            align-items: center;
        }
        
        .section-title i {
            margin-right: 10px;
            color: var(--secondary-color);
        }
        
        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            padding: 10px 25px;
            border-radius: 30px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-primary:hover {
            background-color: #1d6fa5;
            transform: translateY(-2px);
        }
        
        .category-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }
        
        .category-badge {
            background-color: var(--light-color);
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .category-badge.active {
            background-color: var(--primary-color);
            color: white;
        }
        
        .content-section {
            margin-bottom: 1.5rem;
        }
        
        .content-section-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .content-section-title {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 5px;
        }
        
        .remove-section {
            color: #e74c3c;
            cursor: pointer;
        }
        
        .file-upload-area {
            border: 2px dashed #ced4da;
            border-radius: 10px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s;
            background-color: #fafafa;
            cursor: pointer;
        }
        
        .file-upload-area:hover {
            border-color: var(--primary-color);
            background-color: #f0f8ff;
        }
        
        .file-upload-area i {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }
        
        .file-list {
            margin-top: 1.5rem;
        }
        
        .file-item {
            display: flex;
            align-items: center;
            padding: 10px;
            background-color: #f8f9fa;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        
        .file-item i {
            color: var(--secondary-color);
            margin-right: 10px;
        }
        
        .file-name {
            flex-grow: 1;
        }
        
        .file-size {
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .remove-file {
            color: #e74c3c;
            cursor: pointer;
            margin-left: 10px;
        }
        
        footer {
            background-color: var(--primary-color);
            color: white;
            padding: 1.5rem 0;
            margin-top: 3rem;
            text-align: center;
        }
        
        .preview-box {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            margin-top: 10px;
            border-left: 4px solid var(--secondary-color);
        }
        
        @media (max-width: 768px) {
            .upload-container {
                padding: 1.5rem;
            }
            
            .header h1 {
                font-size: 1.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="header text-center">
        <div class="container">
            <h1><i class="fas fa-hand-holding-heart me-2"></i>อัพโหลดความรู้การดูแลผู้สูงอายุ</h1>
            <p class="lead">แบ่งปันความรู้และเทคนิคการดูแลผู้สูงอายุสำหรับคลังความรู้องค์กร</p>
        </div>
    </div>

    <div class="container">
        <div class="upload-container">
            <form id="elderlyCareUploadForm">
                <!-- ข้อมูลพื้นฐาน -->
                <div class="form-section">
                    <h3 class="section-title"><i class="fas fa-info-circle"></i>ข้อมูลพื้นฐาน</h3>
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="title" class="form-label">หัวข้อความรู้</label>
                            <input type="text" class="form-control" id="title" placeholder="เช่น: การป้องกันและลดแผลกดทับในผู้ป่วยติดเตียง" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="author" class="form-label">ผู้เขียน/แหล่งที่มา</label>
                            <input type="text" class="form-control" id="author" placeholder="กรอกชื่อผู้เขียนหรือแหล่งที่มา">
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">คำอธิบายสรุป</label>
                        <textarea class="form-control" id="description" rows="2" placeholder="อธิบายสรุปเกี่ยวกับเนื้อหาความรู้นี้" required></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label">หมวดหมู่หลัก</label>
                        <div class="category-badges">
                            <div class="category-badge active" data-category="prevention">การป้องกันและลดทับ</div>
                            <div class="category-badge" data-category="nutrition">อาหารและโภชนาการ</div>
                            <div class="category-badge" data-category="physiotherapy">การทำกายภาพบำบัด</div>
                            <div class="category-badge" data-category="general">การดูแลทั่วไป</div>
                            <div class="category-badge" data-category="nursing">การพยาบาล</div>
                            <div class="category-badge" data-category="mental">สุขภาพจิต</div>
                            <div class="category-badge" data-category="medication">การใช้ยา</div>
                        </div>
                        <input type="hidden" id="mainCategory" value="prevention" required>
                    </div>
                </div>
                
                <!-- เนื้อหาความรู้ -->
                <div class="form-section">
                    <h3 class="section-title"><i class="fas fa-file-alt"></i>เนื้อหาความรู้</h3>
                    <div id="contentSections">
                        <div class="content-section">
                            <div class="content-section-header">
                                <div>
                                    <div class="content-section-title">ส่วนที่ 1</div>
                                    <small class="text-muted">เพิ่มหัวข้อและเนื้อหาสำหรับส่วนนี้</small>
                                </div>
                                <div class="remove-section" style="display: none;">
                                    <i class="fas fa-times"></i>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control section-title-input" placeholder="หัวข้อส่วนนี้ (เช่น: การป้องกันและดูแลแผลกดทับ)">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control section-content" rows="4" placeholder="รายละเอียดเนื้อหาในส่วนนี้..."></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <button type="button" class="btn btn-outline-primary" id="addSectionBtn">
                        <i class="fas fa-plus me-2"></i>เพิ่มส่วนเนื้อหา
                    </button>
                </div>
                
                <!-- อัพโหลดไฟล์ -->
                <div class="form-section">
                    <h3 class="section-title"><i class="fas fa-file-upload"></i>อัพโหลดไฟล์ประกอบ</h3>
                    
                    <div class="file-upload-area" id="dropArea">
                        <i class="fas fa-cloud-upload-alt"></i>
                        <h5>ลากไฟล์มาวางที่นี่ หรือคลิกเพื่อเลือกไฟล์</h5>
                        <p class="text-muted">รองรับไฟล์: PDF, DOC, DOCX, PPT, XLS, JPG, PNG (ขนาดไม่เกิน 10MB)</p>
                        <input type="file" id="fileInput" multiple style="display: none;">
                    </div>
                    
                    <div class="file-list" id="fileList">
                        <!-- ไฟล์ที่เลือกจะแสดงที่นี่ -->
                    </div>
                </div>
                
                <!-- ข้อมูลเพิ่มเติม -->
                <div class="form-section">
                    <h3 class="section-title"><i class="fas fa-cog"></i>การตั้งค่าเพิ่มเติม</h3>
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="targetAudience" class="form-label">กลุ่มเป้าหมาย</label>
                            <select class="form-select" id="targetAudience">
                                <option value="all" selected>ผู้ดูแลและบุคลากรทางการแพทย์ทั้งหมด</option>
                                <option value="caregivers">ผู้ดูแลทั่วไป</option>
                                <option value="nurses">พยาบาล</option>
                                <option value="therapists">นักกายภาพบำบัด</option>
                                <option value="family">สมาชิกในครอบครัว</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="difficulty" class="form-label">ระดับความยาก</label>
                            <select class="form-select" id="difficulty">
                                <option value="basic" selected>พื้นฐาน</option>
                                <option value="intermediate">ปานกลาง</option>
                                <option value="advanced">สูง</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="keywords" class="form-label">คำค้นหา</label>
                        <input type="text" class="form-control" id="keywords" placeholder="คำสำคัญที่ช่วยในการค้นหา (คั่นด้วยเครื่องหมาย ,)">
                        <small class="text-muted">เช่น: แผลกดทับ, การพลิกตัว, โภชนาการ, ผู้ป่วยติดเตียง</small>
                    </div>
                    
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="allowSharing" checked>
                        <label class="form-check-label" for="allowSharing">
                            อนุญาตให้แบ่งปันความรู้นี้
                        </label>
                    </div>
                </div>
                
                <!-- ปุ่มดำเนินการ -->
                <div class="d-flex justify-content-between mt-4">
                    <button type="button" class="btn btn-outline-secondary" id="previewBtn">
                        <i class="fas fa-eye me-2"></i>ดูตัวอย่าง
                    </button>
                    <div>
                        <button type="reset" class="btn btn-outline-danger me-2">
                            <i class="fas fa-times me-2"></i>ล้างข้อมูล
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-cloud-upload-alt me-2"></i>อัพโหลดความรู้
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>คลังความรู้การดูแลผู้สูงอายุ &copy; 2023 - พัฒนาเพื่อแบ่งปันความรู้ในการดูแลผู้สูงอายุ</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropArea = document.getElementById('dropArea');
            const fileInput = document.getElementById('fileInput');
            const fileList = document.getElementById('fileList');
            const form = document.getElementById('elderlyCareUploadForm');
            const categoryBadges = document.querySelectorAll('.category-badge');
            const mainCategoryInput = document.getElementById('mainCategory');
            const contentSections = document.getElementById('contentSections');
            const addSectionBtn = document.getElementById('addSectionBtn');
            
            let uploadedFiles = [];
            let sectionCount = 1;
            
            // ฟังก์ชันสำหรับการจัดการหมวดหมู่
            categoryBadges.forEach(badge => {
                badge.addEventListener('click', function() {
                    categoryBadges.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');
                    mainCategoryInput.value = this.getAttribute('data-category');
                });
            });
            
            // ฟังก์ชันสำหรับการเพิ่มส่วนเนื้อหา
            addSectionBtn.addEventListener('click', function() {
                sectionCount++;
                const newSection = document.createElement('div');
                newSection.className = 'content-section';
                newSection.innerHTML = `
                    <div class="content-section-header">
                        <div>
                            <div class="content-section-title">ส่วนที่ ${sectionCount}</div>
                            <small class="text-muted">เพิ่มหัวข้อและเนื้อหาสำหรับส่วนนี้</small>
                        </div>
                        <div class="remove-section">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control section-title-input" placeholder="หัวข้อส่วนนี้">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control section-content" rows="4" placeholder="รายละเอียดเนื้อหาในส่วนนี้..."></textarea>
                    </div>
                `;
                
                contentSections.appendChild(newSection);
                
                // เพิ่ม event listener สำหรับปุ่มลบส่วน
                newSection.querySelector('.remove-section').addEventListener('click', function() {
                    if (contentSections.children.length > 1) {
                        newSection.remove();
                        updateSectionNumbers();
                    }
                });
            });
            
            // ฟังก์ชันอัพเดทเลขส่วน
            function updateSectionNumbers() {
                const sections = contentSections.querySelectorAll('.content-section');
                sectionCount = sections.length;
                
                sections.forEach((section, index) => {
                    const title = section.querySelector('.content-section-title');
                    title.textContent = `ส่วนที่ ${index + 1}`;
                });
            }
            
            // ฟังก์ชันสำหรับการจัดการการอัพโหลดไฟล์
            dropArea.addEventListener('click', () => fileInput.click());
            
            fileInput.addEventListener('change', handleFiles);
            
            // ฟังก์ชันลากและวาง
            ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, preventDefaults, false);
            });
            
            function preventDefaults(e) {
                e.preventDefault();
                e.stopPropagation();
            }
            
            ['dragenter', 'dragover'].forEach(eventName => {
                dropArea.addEventListener(eventName, highlight, false);
            });
            
            ['dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, unhighlight, false);
            });
            
            function highlight() {
                dropArea.style.borderColor = '#2c7fb8';
                dropArea.style.backgroundColor = '#e8f4fe';
            }
            
            function unhighlight() {
                dropArea.style.borderColor = '#ced4da';
                dropArea.style.backgroundColor = '#fafafa';
            }
            
            dropArea.addEventListener('drop', handleDrop, false);
            
            function handleDrop(e) {
                const dt = e.dataTransfer;
                const files = dt.files;
                handleFiles({ target: { files } });
            }
            
            function handleFiles(e) {
                const files = e.target.files;
                
                for (let i = 0; i < files.length; i++) {
                    const file = files[i];
                    
                    // ตรวจสอบขนาดไฟล์ (ไม่เกิน 10MB)
                    if (file.size > 10 * 1024 * 1024) {
                        alert(`ไฟล์ ${file.name} มีขนาดใหญ่เกินไป (สูงสุด 10MB)`);
                        continue;
                    }
                    
                    uploadedFiles.push(file);
                    displayFile(file);
                }
            }
            
            function displayFile(file) {
                const fileItem = document.createElement('div');
                fileItem.className = 'file-item';
                
                const fileIcon = getFileIcon(file.type);
                
                fileItem.innerHTML = `
                    <i class="${fileIcon}"></i>
                    <div class="file-name">${file.name}</div>
                    <div class="file-size">${formatFileSize(file.size)}</div>
                    <div class="remove-file" data-filename="${file.name}">
                        <i class="fas fa-times"></i>
                    </div>
                `;
                
                fileList.appendChild(fileItem);
                
                // เพิ่ม event listener สำหรับปุ่มลบไฟล์
                fileItem.querySelector('.remove-file').addEventListener('click', function() {
                    const filename = this.getAttribute('data-filename');
                    removeFile(filename);
                    fileItem.remove();
                });
            }
            
            function getFileIcon(fileType) {
                if (fileType.includes('image')) return 'fas fa-file-image';
                if (fileType.includes('pdf')) return 'fas fa-file-pdf';
                if (fileType.includes('word') || fileType.includes('document')) return 'fas fa-file-word';
                if (fileType.includes('presentation') || fileType.includes('powerpoint')) return 'fas fa-file-powerpoint';
                if (fileType.includes('sheet') || fileType.includes('excel')) return 'fas fa-file-excel';
                return 'fas fa-file';
            }
            
            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }
            
            function removeFile(filename) {
                uploadedFiles = uploadedFiles.filter(file => file.name !== filename);
            }
            
            // ฟังก์ชันสำหรับการส่งฟอร์ม
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                
                // ตรวจสอบข้อมูลที่จำเป็น
                const title = document.getElementById('title').value;
                const description = document.getElementById('description').value;
                const mainCategory = document.getElementById('mainCategory').value;
                
                if (!title || !description || !mainCategory) {
                    alert('กรุณากรอกข้อมูลพื้นฐานให้ครบถ้วน');
                    return;
                }
                
                // ตรวจสอบว่ามีเนื้อหาอย่างน้อยหนึ่งส่วน
                const sectionTitles = document.querySelectorAll('.section-title-input');
                let hasContent = false;
                
                sectionTitles.forEach(input => {
                    if (input.value.trim() !== '') {
                        hasContent = true;
                    }
                });
                
                if (!hasContent) {
                    alert('กรุณาเพิ่มเนื้อหาอย่างน้อยหนึ่งส่วน');
                    return;
                }
                
                // ในสภาพแวดล้อมจริง ควรมีการส่งข้อมูลไปยังเซิร์ฟเวอร์ที่นี่
                // ตัวอย่างนี้จะแสดงผลลัพธ์เท่านั้น
                
                const formData = new FormData();
                formData.append('title', title);
                formData.append('author', document.getElementById('author').value);
                formData.append('description', description);
                formData.append('mainCategory', mainCategory);
                formData.append('targetAudience', document.getElementById('targetAudience').value);
                formData.append('difficulty', document.getElementById('difficulty').value);
                formData.append('keywords', document.getElementById('keywords').value);
                formData.append('allowSharing', document.getElementById('allowSharing').checked);
                
                // รวบรวมข้อมูลส่วนเนื้อหา
                const sections = [];
                document.querySelectorAll('.content-section').forEach(section => {
                    const titleInput = section.querySelector('.section-title-input');
                    const contentInput = section.querySelector('.section-content');
                    
                    if (titleInput.value.trim() !== '') {
                        sections.push({
                            title: titleInput.value,
                            content: contentInput.value
                        });
                    }
                });
                
                formData.append('sections', JSON.stringify(sections));
                
                for (let i = 0; i < uploadedFiles.length; i++) {
                    formData.append('files', uploadedFiles[i]);
                }
                
                // จำลองการอัพโหลด
                simulateUpload(formData);
            });
            
            function simulateUpload(formData) {
                // แสดงการโหลด
                const submitBtn = form.querySelector('button[type="submit"]');
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>กำลังอัพโหลด...';
                submitBtn.disabled = true;
                
                // จำลองเวลาในการอัพโหลด
                setTimeout(() => {
                    alert('อัพโหลดความรู้เกี่ยวกับการดูแลผู้สูงอายุสำเร็จ! ข้อมูลของคุณถูกบันทึกลงในคลังความรู้แล้ว');
                    form.reset();
                    fileList.innerHTML = '';
                    contentSections.innerHTML = `
                        <div class="content-section">
                            <div class="content-section-header">
                                <div>
                                    <div class="content-section-title">ส่วนที่ 1</div>
                                    <small class="text-muted">เพิ่มหัวข้อและเนื้อหาสำหรับส่วนนี้</small>
                                </div>
                                <div class="remove-section" style="display: none;">
                                    <i class="fas fa-times"></i>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control section-title-input" placeholder="หัวข้อส่วนนี้ (เช่น: การป้องกันและดูแลแผลกดทับ)">
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control section-content" rows="4" placeholder="รายละเอียดเนื้อหาในส่วนนี้..."></textarea>
                            </div>
                        </div>
                    `;
                    uploadedFiles = [];
                    sectionCount = 1;
                    
                    // รีเซ็ตหมวดหมู่
                    categoryBadges.forEach(badge => badge.classList.remove('active'));
                    categoryBadges[0].classList.add('active');
                    mainCategoryInput.value = 'prevention';
                    
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 2000);
            }
            
            // ฟังก์ชันสำหรับปุ่มดูตัวอย่าง
            document.getElementById('previewBtn').addEventListener('click', function() {
                const title = document.getElementById('title').value;
                
                if (!title) {
                    alert('กรุณากรอกหัวข้อความรู้ก่อนดูตัวอย่าง');
                    return;
                }
                
                // สร้างตัวอย่างเนื้อหาจากข้อมูลที่กรอก
                let previewContent = `<h4>${title}</h4>`;
                
                document.querySelectorAll('.content-section').forEach((section, index) => {
                    const titleInput = section.querySelector('.section-title-input');
                    const contentInput = section.querySelector('.section-content');
                    
                    if (titleInput.value.trim() !== '') {
                        previewContent += `<h5>${index + 1}. ${titleInput.value}</h5>`;
                        previewContent += `<p>${contentInput.value || 'ไม่มีเนื้อหาในส่วนนี้'}</p>`;
                    }
                });
                
                // แสดงตัวอย่างใน modal (ในที่นี้ใช้ alert แทนเพื่อความง่าย)
                alert('ตัวอย่างเนื้อหาที่จะอัพโหลด:\n\n' + 
                      'หัวข้อ: ' + title + '\n\n' +
                      'ดูตัวอย่างเต็มได้ที่หน้าจอ Preview จริงในระบบ');
            });
        });
    </script>
</body>
</html>