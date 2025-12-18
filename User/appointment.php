<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เลือกผู้ติดต่อ - ผู้สูงอายุป่วยติดเตียง</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sukhumvit+Set:wght@300;400;500;600;700&family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        /* Reset และฟอนต์พื้นฐาน */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Sukhumvit Set', 'Kanit', Arial, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        /* ส่วนหัว */
        .header {
            background-color: #4a90e2;
            color: white;
            padding: 25px 0;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .header-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        .header-content h1 {
            font-size: 2.2rem;
            margin-bottom: 10px;
        }
        
        .header-content p {
            font-size: 1.2rem;
            opacity: 0.9;
        }
        
        .user-info {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 15px;
            border-radius: 8px;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }
        
        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: white;
            color: #4a90e2;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 22px;
            margin-right: 15px;
        }
        
        .user-details h3 {
            font-size: 1.2rem;
            margin-bottom: 5px;
        }
        
        .user-details .role {
            font-size: 0.9rem;
            opacity: 0.9;
        }
        
        /* ส่วนหลัก */
        .main-content {
            margin-bottom: 20px;
        }
        
        /* หมวดหมู่ผู้ติดต่อ */
        .page-title {
            color: #4a90e2;
            font-size: 1.8rem;
            margin-bottom: 10px;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }
        
        .page-description {
            color: #666;
            margin-bottom: 25px;
            font-size: 1.1rem;
        }
        
        .contacts-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .contact-category {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .contact-category:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.15);
        }
        
        .category-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #eee;
        }
        
        .category-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 22px;
            color: white;
        }
        
        .family-icon {
            background-color: #2ecc71;
        }
        
        .volunteer-icon {
            background-color: #e67e22;
        }
        
        .cm-icon {
            background-color: #4a90e2;
        }
        
        .agency-icon {
            background-color: #9b59b6;
        }
        
        .category-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #4a90e2;
        }
        
        .category-subtitle {
            color: #666;
            font-size: 0.9rem;
        }
        
        /* รายชื่อผู้ติดต่อ */
        .contact-list {
            list-style: none;
        }
        
        .contact-item {
            padding: 15px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
            border-radius: 8px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: all 0.2s;
            border: 2px solid transparent;
        }
        
        .contact-item:hover {
            background-color: #f0f7ff;
            border-color: #4a90e2;
        }
        
        .contact-item.active {
            background-color: #f0f7ff;
            border-color: #4a90e2;
        }
        
        .contact-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 20px;
            margin-right: 15px;
            flex-shrink: 0;
        }
        
        .family-avatar {
            background-color: #2ecc71;
        }
        
        .volunteer-avatar {
            background-color: #e67e22;
        }
        
        .cm-avatar {
            background-color: #4a90e2;
        }
        
        .agency-avatar {
            background-color: #9b59b6;
        }
        
        .contact-info {
            flex-grow: 1;
        }
        
        .contact-name {
            font-weight: 600;
            margin-bottom: 5px;
            font-size: 1.1rem;
        }
        
        .contact-role {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 5px;
        }
        
        .contact-status {
            display: flex;
            align-items: center;
            font-size: 0.8rem;
        }
        
        .status-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            margin-right: 6px;
        }
        
        .status-online {
            background-color: #2ecc71;
        }
        
        .status-offline {
            background-color: #95a5a6;
        }
        
        .status-busy {
            background-color: #e74c3c;
        }
        
        .status-away {
            background-color: #f39c12;
        }
        
        .contact-action {
            color: #4a90e2;
            font-size: 1.5rem;
            opacity: 0.7;
            transition: opacity 0.2s;
        }
        
        .contact-item:hover .contact-action {
            opacity: 1;
        }
        
        /* ปุ่มฉุกเฉิน */
        .emergency-section {
            background-color: white;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            text-align: center;
        }
        
        .emergency-button {
            background-color: #e74c3c;
            color: white;
            border: none;
            padding: 15px 30px;
            border-radius: 10px;
            font-size: 1.3rem;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }
        
        .emergency-button:hover {
            background-color: #c0392b;
        }
        
        .emergency-description {
            color: #666;
            margin-top: 15px;
            font-size: 1rem;
        }
        
        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            margin-top: 30px;
            color: #666;
            font-size: 0.9rem;
            border-top: 1px solid #ddd;
        }
        
        /* ปุ่มด่วน (แบบใหม่) */
        .quick-buttons {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-top: 30px;
        }
        
        .quick-button {
            background-color: white;
            border: 2px solid #4a90e2;
            color: #4a90e2;
            padding: 15px;
            border-radius: 10px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
        }
        
        .quick-button:hover {
            background-color: #4a90e2;
            color: white;
        }
        
        /* การตอบสนองต่ออุปกรณ์มือถือ */
        @media (max-width: 768px) {
            .contacts-container {
                grid-template-columns: 1fr;
            }
            
            .header-content h1 {
                font-size: 1.8rem;
            }
            
            .user-info {
                width: 100%;
            }
            
            .quick-buttons {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 480px) {
            .contact-category {
                padding: 15px;
            }
            
            .contact-item {
                padding: 12px;
            }
            
            .emergency-button {
                padding: 12px 25px;
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <div class="header-content">
            <h1>เลือกผู้ติดต่อสำหรับการสื่อสาร</h1>
            <p>เลือกบุคคลที่ต้องการสนทนาเพื่อเริ่มการแชท สำหรับผู้สูงอายุป่วยติดเตียง</p>
            
            <div class="user-info">
                <div class="user-avatar">ผส</div>
                <div class="user-details">
                    <h3>ผู้สูงอายุป่วยติดเตียง</h3>
                    <div class="role">ผู้ใช้งานระบบสื่อสาร</div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="main-content">
            <h2 class="page-title">บุคคลที่สามารถติดต่อได้</h2>
            <p class="page-description">เลือกบุคคลจากรายการด้านล่างเพื่อเริ่มการสนทนา การสนทนาจะถูกบันทึกและสามารถกลับมาอ่านได้ในภายหลัง</p>
            
            <div class="contacts-container">
                <!-- ครอบครัว Section -->
                <div class="contact-category">
                    <div class="category-header">
                        <div class="category-icon family-icon">
                            <i class="fas fa-home"></i>
                        </div>
                        <div>
                            <h2 class="category-title">ครอบครัว</h2>
                            <p class="category-subtitle">สมาชิกในครอบครัวผู้ดูแล</p>
                        </div>
                    </div>
                    <ul class="contact-list">
                        <li class="contact-item active" onclick="selectContact('family1')">
                            <div class="contact-avatar family-avatar">สม</div>
                            <div class="contact-info">
                                <div class="contact-name">สมหญิง (ลูกสาว)</div>
                                <div class="contact-role">ดูแลหลัก - ญาติสายตรง</div>
                                <div class="contact-status">
                                    <span class="status-indicator status-online"></span>
                                    <span>ออนไลน์</span>
                                </div>
                            </div>
                            <div class="contact-action">
                                <i class="fas fa-comment-medical"></i>
                            </div>
                        </li>
                        <li class="contact-item" onclick="selectContact('family2')">
                            <div class="contact-avatar family-avatar">สมช</div>
                            <div class="contact-info">
                                <div class="contact-name">สมชาย (ลูกชาย)</div>
                                <div class="contact-role">ดูแลรอง - ญาติสายตรง</div>
                                <div class="contact-status">
                                    <span class="status-indicator status-away"></span>
                                    <span>ไม่ว่าง</span>
                                </div>
                            </div>
                            <div class="contact-action">
                                <i class="fas fa-comment-medical"></i>
                            </div>
                        </li>
                    </ul>
                </div>

                <!-- อาสาสมัครสาธารณสุข Section -->
                <div class="contact-category">
                    <div class="category-header">
                        <div class="category-icon volunteer-icon">
                            <i class="fas fa-hands-helping"></i>
                        </div>
                        <div>
                            <h2 class="category-title">อาสาสมัครสาธารณสุข</h2>
                            <p class="category-subtitle">อสม. ผู้ดูแลประจำพื้นที่</p>
                        </div>
                    </div>
                    <ul class="contact-list">
                        <li class="contact-item" onclick="selectContact('volunteer1')">
                            <div class="contact-avatar volunteer-avatar">สมห</div>
                            <div class="contact-info">
                                <div class="contact-name">อสม. สมหมาย</div>
                                <div class="contact-role">อาสาสมัครดูแลประจำ</div>
                                <div class="contact-status">
                                    <span class="status-indicator status-online"></span>
                                    <span>ออนไลน์</span>
                                </div>
                            </div>
                            <div class="contact-action">
                                <i class="fas fa-comment-medical"></i>
                            </div>
                        </li>
                        <li class="contact-item" onclick="selectContact('volunteer2')">
                            <div class="contact-avatar volunteer-avatar">สมร</div>
                            <div class="contact-info">
                                <div class="contact-name">อสม. สมร</div>
                                <div class="contact-role">อาสาสมัครสำรอง</div>
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

                <!-- Case Manager Section -->
                <div class="contact-category">
                    <div class="category-header">
                        <div class="category-icon cm-icon">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <div>
                            <h2 class="category-title">Case Manager</h2>
                            <p class="category-subtitle">ผู้จัดการดูแลผู้สูงอายุ</p>
                        </div>
                    </div>
                    <ul class="contact-list">
                        <li class="contact-item" onclick="selectContact('cm1')">
                            <div class="contact-avatar cm-avatar">พญ</div>
                            <div class="contact-info">
                                <div class="contact-name">พญ. กรวรรณ สุขใจ</div>
                                <div class="contact-role">CM หลัก - ผู้จัดการดูแล</div>
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
                            <div class="contact-avatar agency-avatar">สธ</div>
                            <div class="contact-info">
                                <div class="contact-name">สำนักงานหลักประกันสุขภาพ</div>
                                <div class="contact-role">บริการสุขภาพและยา</div>
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
                            <div class="contact-avatar agency-avatar">รพ</div>
                            <div class="contact-info">
                                <div class="contact-name">โรงพยาบาลใกล้บ้าน</div>
                                <div class="contact-role">บริการพยาบาลฉุกเฉิน</div>
                                <div class="contact-status">
                                    <span class="status-indicator status-online"></span>
                                    <span>เปิดทำการ 24 ชม.</span>
                                </div>
                            </div>
                            <div class="contact-action">
                                <i class="fas fa-comment-medical"></i>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- ปุ่มด่วน -->
            <div class="quick-buttons">
                <button class="quick-button" onclick="sendQuickMessage('ต้องการน้ำดื่ม')">
                    <i class="fas fa-glass-water" style="margin-right: 8px;"></i>ต้องการน้ำดื่ม
                </button>
                <button class="quick-button" onclick="sendQuickMessage('ต้องการยา')">
                    <i class="fas fa-pills" style="margin-right: 8px;"></i>ต้องการยา
                </button>
                <button class="quick-button" onclick="sendQuickMessage('ปวดเมื่อย')">
                    <i class="fas fa-bed" style="margin-right: 8px;"></i>ปวดเมื่อย
                </button>
                <button class="quick-button" onclick="sendQuickMessage('ต้องการความช่วยเหลือ')">
                    <i class="fas fa-hands-helping" style="margin-right: 8px;"></i>ต้องการความช่วยเหลือ
                </button>
            </div>
        </div>

        <!-- Emergency Section -->
        <div class="emergency-section">
            <button class="emergency-button" onclick="handleEmergency()">
                <i class="fas fa-exclamation-triangle"></i>
                แจ้งเหตุฉุกเฉิน
            </button>
            <p class="emergency-description">กดปุ่มนี้เมื่อต้องการความช่วยเหลือเร่งด่วน ระบบจะส่งการแจ้งเตือนไปยังทุกคนในรายการติดต่อ</p>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>ระบบสื่อสารสำหรับผู้สูงอายุป่วยติดเตียง © 2023</p>
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
                'family1': 'สมหญิง (ลูกสาว)',
                'family2': 'สมชาย (ลูกชาย)',
                'volunteer1': 'อสม. สมหมาย',
                'volunteer2': 'อสม. สมร',
                'cm1': 'พญ. กรวรรณ สุขใจ',
                'agency1': 'สำนักงานหลักประกันสุขภาพ',
                'agency2': 'โรงพยาบาลใกล้บ้าน'
            };
            
            const contactName = contactNames[contactId];
            
            // In a real application, you would redirect to the chat page
            // For now, we'll show a confirmation and simulate navigation
            alert(`คุณเลือกที่จะสนทนากับ: ${contactName}\n\nระบบจะนำคุณไปยังหน้าห้องสนทนากับบุคคลนี้`);
            
            // Example: Redirect to chat page (uncomment in real implementation)
            // window.location.href = `/chat.html?contact=${contactId}&name=${encodeURIComponent(contactName)}`;
        }

        // Function to handle emergency button
        function handleEmergency() {
            if (confirm('ต้องการแจ้งเหตุฉุกเฉินหรือไม่? ระบบจะส่งการแจ้งเตือนไปยังทุกคนในรายการติดต่อ')) {
                alert('ระบบได้ส่งการแจ้งเตือนเหตุฉุกเฉินแล้ว!\n\nทีมดูแลจะติดต่อกลับภายใน 5 นาที');
                
                // In a real application, you would make an API call to send emergency alerts
                // to all contacts in the list
                
                // Log emergency event for demonstration
                console.log('Emergency alert sent at:', new Date().toLocaleTimeString());
                
                // Optional: Automatically create an emergency chat or call
                // window.location.href = '/emergency-chat.html';
            }
        }

        // Function to send quick messages
        function sendQuickMessage(message) {
            // Find active contact
            const activeContact = document.querySelector('.contact-item.active');
            
            if (activeContact) {
                const contactName = activeContact.querySelector('.contact-name').textContent;
                alert(`ส่งข้อความด่วน "${message}" ไปยัง: ${contactName}`);
                
                // In a real app, this would send the message to the selected contact
                // and navigate to the chat page with the message pre-filled
                
                // Example redirect with pre-filled message
                // window.location.href = `/chat.html?contact=${contactId}&message=${encodeURIComponent(message)}`;
            } else {
                alert('กรุณาเลือกผู้ติดต่อก่อนส่งข้อความด่วน');
            }
        }

        // Add some interactivity to contact items
        document.querySelectorAll('.contact-item').forEach(item => {
            item.addEventListener('click', function() {
                // The selectContact function already handles this
            });
        });
        
        // Simulate some status changes for demonstration
        setInterval(() => {
            const statusIndicators = document.querySelectorAll('.status-indicator');
            statusIndicators.forEach(indicator => {
                // Randomly change some statuses (for demo only)
                if (Math.random() > 0.7) {
                    const statuses = ['status-online', 'status-offline', 'status-away', 'status-busy'];
                    const currentStatus = indicator.classList[1];
                    const newStatus = statuses[Math.floor(Math.random() * statuses.length)];
                    
                    if (newStatus !== currentStatus) {
                        indicator.classList.remove(currentStatus);
                        indicator.classList.add(newStatus);
                        
                        // Update status text
                        const statusText = indicator.nextElementSibling;
                        if (statusText) {
                            const statusMap = {
                                'status-online': 'ออนไลน์',
                                'status-offline': 'ออฟไลน์',
                                'status-away': 'ไม่ว่าง',
                                'status-busy': 'ไม่ว่าง'
                            };
                            statusText.textContent = statusMap[newStatus];
                        }
                    }
                }
            });
        }, 10000); // Update every 10 seconds
    </script>
</body>
</html>