<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบติดต่อสื่อสาร | ผู้สูงอายุ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400;500;600;700&family=Kanit:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-light: #e6eeff;
            --secondary-color: #3a0ca3;
            --success-color: #06d6a0;
            --warning-color: #ffd166;
            --danger-color: #ef476f;
            --light-color: #f8f9fa;
            --dark-color: #212529;
            --gray-color: #6c757d;
            --border-color: #dee2e6;
            --card-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            --card-shadow-hover: 0 8px 16px rgba(0, 0, 0, 0.12);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Noto Sans Thai', sans-serif;
            background-color: #f5f7fb;
            color: var(--dark-color);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Header Styles */
        header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 20px 0;
            border-radius: 0 0 15px 15px;
            box-shadow: 0 4px 12px rgba(67, 97, 238, 0.2);
            margin-bottom: 30px;
        }

        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo i {
            font-size: 32px;
        }

        .logo h1 {
            font-family: 'Kanit', sans-serif;
            font-weight: 500;
            font-size: 24px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.15);
            padding: 8px 15px;
            border-radius: 50px;
        }

        .user-info img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        /* Main Content Styles */
        .page-title {
            font-family: 'Kanit', sans-serif;
            font-weight: 500;
            font-size: 28px;
            margin-bottom: 10px;
            color: var(--secondary-color);
        }

        .page-description {
            color: var(--gray-color);
            margin-bottom: 30px;
            font-size: 16px;
            max-width: 800px;
        }

        .contacts-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .contact-category {
            background-color: white;
            border-radius: 12px;
            box-shadow: var(--card-shadow);
            padding: 25px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .contact-category:hover {
            transform: translateY(-5px);
            box-shadow: var(--card-shadow-hover);
        }

        .category-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid var(--primary-light);
        }

        .category-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 22px;
            color: white;
        }

        .cm-icon {
            background-color: var(--primary-color);
        }

        .manager-icon {
            background-color: var(--success-color);
        }

        .agency-icon {
            background-color: var(--secondary-color);
        }

        .category-title {
            font-family: 'Kanit', sans-serif;
            font-weight: 500;
            font-size: 20px;
        }

        .category-subtitle {
            color: var(--gray-color);
            font-size: 14px;
        }

        .contact-list {
            list-style: none;
        }

        .contact-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: background-color 0.2s;
            border: 1px solid transparent;
        }

        .contact-item:hover {
            background-color: var(--primary-light);
            border-color: var(--primary-color);
        }

        .contact-item.active {
            background-color: var(--primary-light);
            border-color: var(--primary-color);
        }

        .contact-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
            border: 2px solid var(--border-color);
        }

        .avatar-placeholder {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            margin-right: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        .cm-avatar {
            background-color: var(--primary-color);
        }

        .manager-avatar {
            background-color: var(--success-color);
        }

        .agency-avatar {
            background-color: var(--secondary-color);
        }

        .contact-info {
            flex-grow: 1;
        }

        .contact-name {
            font-weight: 600;
            margin-bottom: 3px;
        }

        .contact-role {
            color: var(--gray-color);
            font-size: 14px;
            margin-bottom: 5px;
        }

        .contact-status {
            display: flex;
            align-items: center;
            font-size: 13px;
        }

        .status-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            margin-right: 6px;
        }

        .status-online {
            background-color: var(--success-color);
        }

        .status-offline {
            background-color: var(--gray-color);
        }

        .status-busy {
            background-color: var(--danger-color);
        }

        .contact-action {
            color: var(--primary-color);
            font-size: 20px;
            opacity: 0.7;
            transition: opacity 0.2s;
        }

        .contact-item:hover .contact-action {
            opacity: 1;
        }

        /* Footer Styles */
        footer {
            text-align: center;
            padding: 20px;
            margin-top: 30px;
            color: var(--gray-color);
            font-size: 14px;
            border-top: 1px solid var(--border-color);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 15px;
                text-align: center;
            }
            
            .contacts-container {
                grid-template-columns: 1fr;
            }
            
            .page-title {
                font-size: 24px;
            }
        }

        @media (max-width: 480px) {
            .contact-category {
                padding: 20px 15px;
            }
            
            .contact-item {
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <div class="header-content">
            <div class="logo">
                <i class="fas fa-comments"></i>
                <h1>ระบบติดต่อสื่อสาร</h1>
            </div>
            <div class="user-info">
                <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="ผู้ใช้งาน">
                <span>สุณี ใจดี (ผู้ดูแล)</span>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <h1 class="page-title">เลือกผู้ติดต่อเพื่อเริ่มการสนทนา</h1>
        <p class="page-description">เลือก CM, ผู้จัดการผู้สูงอายุ หรือหน่วยงานที่เกี่ยวข้องเพื่อเริ่มการสนทนา การสนทนาจะถูกบันทึกและสามารถกลับมาอ่านได้ในภายหลัง</p>
        
        <div class="contacts-container">
            <!-- CM Section -->
            <div class="contact-category">
                <div class="category-header">
                    <div class="category-icon cm-icon">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <div>
                        <h2 class="category-title">Case Manager (CM)</h2>
                        <p class="category-subtitle">ผู้จัดการเคสผู้สูงอายุ</p>
                    </div>
                </div>
                <ul class="contact-list">
                    <li class="contact-item active" onclick="selectContact('cm1')">
                        <div class="avatar-placeholder cm-avatar">นพ</div>
                        <div class="contact-info">
                            <div class="contact-name">นพ.ปัญญา เกียรติสูง</div>
                            <div class="contact-role">CM หลัก - ผู้สูงอายุกลุ่มที่ 1</div>
                            <div class="contact-status">
                                <span class="status-indicator status-online"></span>
                                <span>ออนไลน์</span>
                            </div>
                        </div>
                        <div class="contact-action">
                            <i class="fas fa-comment-medical"></i>
                        </div>
                    </li>
                    <li class="contact-item" onclick="selectContact('cm2')">
                        <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="CM" class="contact-avatar">
                        <div class="contact-info">
                            <div class="contact-name">พญ.กรวรรณ สุขใจ</div>
                            <div class="contact-role">CM รอง - ผู้สูงอายุกลุ่มที่ 2</div>
                            <div class="contact-status">
                                <span class="status-indicator status-busy"></span>
                                <span>ไม่ว่าง</span>
                            </div>
                        </div>
                        <div class="contact-action">
                            <i class="fas fa-comment-medical"></i>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- ผู้จัดการผู้สูงอายุ Section -->
            <div class="contact-category">
                <div class="category-header">
                    <div class="category-icon manager-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div>
                        <h2 class="category-title">ผู้จัดการผู้สูงอายุ</h2>
                        <p class="category-subtitle">ผู้ดูแลประจำวันและกิจกรรม</p>
                    </div>
                </div>
                <ul class="contact-list">
                    <li class="contact-item" onclick="selectContact('manager1')">
                        <div class="avatar-placeholder manager-avatar">ศร</div>
                        <div class="contact-info">
                            <div class="contact-name">ศรันย์ ดูแลดี</div>
                            <div class="contact-role">ผู้จัดการผู้สูงอายุ - กทม.กลาง</div>
                            <div class="contact-status">
                                <span class="status-indicator status-online"></span>
                                <span>ออนไลน์</span>
                            </div>
                        </div>
                        <div class="contact-action">
                            <i class="fas fa-comment-medical"></i>
                        </div>
                    </li>
                    <li class="contact-item" onclick="selectContact('manager2')">
                        <img src="https://randomuser.me/api/portraits/men/65.jpg" alt="ผู้จัดการ" class="contact-avatar">
                        <div class="contact-info">
                            <div class="contact-name">ธีรภัทร จิตเมตตา</div>
                            <div class="contact-role">ผู้จัดการกิจกรรม - กทม.ตะวันออก</div>
                            <div class="contact-status">
                                <span class="status-indicator status-offline"></span>
                                <span>ออฟไลน์</span>
                            </div>
                        </div>
                        <div class="contact-action">
                            <i class="fas fa-comment-medical"></i>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- หน่วยงาน Section -->
            <div class="contact-category">
                <div class="category-header">
                    <div class="category-icon agency-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <div>
                        <h2 class="category-title">หน่วยงานที่เกี่ยวข้อง</h2>
                        <p class="category-subtitle">หน่วยงานรัฐและเอกชนที่ให้บริการ</p>
                    </div>
                </div>
                <ul class="contact-list">
                    <li class="contact-item" onclick="selectContact('agency1')">
                        <div class="avatar-placeholder agency-avatar">สธ</div>
                        <div class="contact-info">
                            <div class="contact-name">สำนักงานหลักประกันสุขภาพ</div>
                            <div class="contact-role">บริการสุขภาพและยาสำหรับผู้สูงอายุ</div>
                            <div class="contact-status">
                                <span class="status-indicator status-online"></span>
                                <span>เปิดทำการ</span>
                            </div>
                        </div>
                        <div class="contact-action">
                            <i class="fas fa-comment-medical"></i>
                        </div>
                    </li>
                    <li class="contact-item" onclick="selectContact('agency2')">
                        <div class="avatar-placeholder agency-avatar">สส</div>
                        <div class="contact-info">
                            <div class="contact-name">กรมพัฒนาสังคมและสวัสดิการ</div>
                            <div class="contact-role">บริการสังคมและสวัสดิการผู้สูงอายุ</div>
                            <div class="contact-status">
                                <span class="status-indicator status-online"></span>
                                <span>เปิดทำการ</span>
                            </div>
                        </div>
                        <div class="contact-action">
                            <i class="fas fa-comment-medical"></i>
                        </div>
                    </li>
                    <li class="contact-item" onclick="selectContact('agency3')">
                        <img src="https://logo.clearbit.com/redcross.or.th" alt="หน่วยงาน" class="contact-avatar">
                        <div class="contact-info">
                            <div class="contact-name">สภากาชาดไทย</div>
                            <div class="contact-role">บริการพยาบาลและดูแลที่บ้าน</div>
                            <div class="contact-status">
                                <span class="status-indicator status-busy"></span>
                                <span>ปิดทำการ</span>
                            </div>
                        </div>
                        <div class="contact-action">
                            <i class="fas fa-comment-medical"></i>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>ระบบติดต่อสื่อสารสำหรับผู้จัดการผู้สูงอายุและหน่วยงานที่เกี่ยวข้อง © 2023</p>
        <p>ศูนย์ดูแลผู้สูงอายุแห่งชาติ | โทร. 0-2123-4567</p>
    </footer>

    <script>
        // Function to handle contact selection
        function selectContact(contactId) {
            // Remove active class from all contact items
            document.querySelectorAll('.contact-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Add active class to selected contact
            event.currentTarget.classList.add('active');
            
            // Map contact IDs to names for display
            const contactNames = {
                'cm1': 'นพ.ปัญญา เกียรติสูง',
                'cm2': 'พญ.กรวรรณ สุขใจ',
                'manager1': 'ศรันย์ ดูแลดี',
                'manager2': 'ธีรภัทร จิตเมตตา',
                'agency1': 'สำนักงานหลักประกันสุขภาพ',
                'agency2': 'กรมพัฒนาสังคมและสวัสดิการ',
                'agency3': 'สภากาชาดไทย'
            };
            
            // Show confirmation message
            const contactName = contactNames[contactId];
            alert(`คุณเลือกที่จะสนทนากับ: ${contactName}\n\nระบบจะนำคุณไปยังหน้าห้องสนทนาในขั้นตอนต่อไป`);
            
            // In a real application, you would redirect to the chat page
            // window.location.href = `/chat?contact=${contactId}`;
        }

        // Add some interactivity to contact items
        document.querySelectorAll('.contact-item').forEach(item => {
            item.addEventListener('click', function() {
                // The selectContact function already handles this
            });
        });
    </script>
</body>
</html>