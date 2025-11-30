<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบแชทสื่อสารกับ CM และหน่วยงาน</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2c7873;
            --secondary: #6fb98f;
            --accent: #ff6b6b;
            --light: #f8f9fa;
            --dark: #343a40;
            --gray: #6c757d;
            --light-gray: #e9ecef;
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
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .container {
            display: flex;
            flex: 1;
            max-width: 1200px;
            margin: 0 auto;
            background: white;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        
        /* ส่วนแถบข้าง */
        .sidebar {
            width: 320px;
            background-color: var(--light);
            border-right: 1px solid var(--light-gray);
            display: flex;
            flex-direction: column;
        }
        
        .sidebar-header {
            padding: 20px;
            background-color: var(--primary);
            color: white;
        }
        
        .sidebar-header h1 {
            font-size: 1.5rem;
            margin-bottom: 5px;
        }
        
        .sidebar-header p {
            font-size: 0.9rem;
            opacity: 0.9;
        }
        
        .contact-list {
            flex: 1;
            overflow-y: auto;
            padding: 10px 0;
        }
        
        .contact-item {
            display: flex;
            padding: 15px;
            border-bottom: 1px solid var(--light-gray);
            cursor: pointer;
            transition: background 0.2s;
        }
        
        .contact-item:hover {
            background-color: rgba(111, 185, 143, 0.1);
        }
        
        .contact-item.active {
            background-color: rgba(44, 120, 115, 0.1);
            border-left: 4px solid var(--primary);
        }
        
        .contact-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-right: 15px;
        }
        
        .contact-info {
            flex: 1;
        }
        
        .contact-name {
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .contact-role {
            font-size: 0.85rem;
            color: var(--gray);
            margin-bottom: 5px;
        }
        
        .last-message {
            font-size: 0.9rem;
            color: var(--gray);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 200px;
        }
        
        .contact-status {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: space-between;
        }
        
        .time {
            font-size: 0.8rem;
            color: var(--gray);
        }
        
        .unread-count {
            background-color: var(--accent);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            margin-top: 5px;
        }
        
        /* ส่วนแชทหลัก */
        .chat-area {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .chat-header {
            padding: 15px 20px;
            border-bottom: 1px solid var(--light-gray);
            display: flex;
            align-items: center;
        }
        
        .chat-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-right: 15px;
        }
        
        .chat-info {
            flex: 1;
        }
        
        .chat-name {
            font-weight: 600;
        }
        
        .chat-status {
            font-size: 0.85rem;
            color: var(--gray);
        }
        
        .online {
            color: var(--secondary);
        }
        
        .chat-actions {
            display: flex;
            gap: 10px;
        }
        
        .chat-action-btn {
            background: none;
            border: none;
            color: var(--gray);
            cursor: pointer;
            font-size: 1.2rem;
        }
        
        .chat-messages {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 15px;
            background-color: #f9f9f9;
        }
        
        .message {
            max-width: 70%;
            padding: 12px 15px;
            border-radius: 18px;
            position: relative;
            line-height: 1.4;
        }
        
        .received {
            align-self: flex-start;
            background-color: white;
            border-bottom-left-radius: 5px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }
        
        .sent {
            align-self: flex-end;
            background-color: var(--primary);
            color: white;
            border-bottom-right-radius: 5px;
        }
        
        .message-time {
            font-size: 0.7rem;
            margin-top: 5px;
            opacity: 0.7;
            text-align: right;
        }
        
        .chat-input-area {
            padding: 15px 20px;
            border-top: 1px solid var(--light-gray);
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .message-input {
            flex: 1;
            padding: 12px 15px;
            border: 1px solid var(--light-gray);
            border-radius: 24px;
            outline: none;
            resize: none;
            height: 45px;
            max-height: 120px;
        }
        
        .message-input:focus {
            border-color: var(--secondary);
        }
        
        .send-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s;
        }
        
        .send-btn:hover {
            background-color: #235e59;
        }
        
        .attachment-btn {
            background: none;
            border: none;
            color: var(--gray);
            cursor: pointer;
            font-size: 1.2rem;
        }
        
        /* ส่วนหน่วยงาน */
        .agencies-section {
            margin-top: 20px;
        }
        
        .section-title {
            padding: 10px 15px;
            font-weight: 600;
            color: var(--gray);
            font-size: 0.9rem;
            border-bottom: 1px solid var(--light-gray);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
                max-height: 40vh;
            }
            
            .chat-area {
                flex: 1;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- แถบข้างแสดงรายชื่อผู้ติดต่อ -->
        <div class="sidebar">
            <div class="sidebar-header">
                <h1>การแชทกับ CM และหน่วยงาน</h1>
                <p>ติดต่อสื่อสารกับผู้จัดการผู้สูงอายุและหน่วยงานที่เกี่ยวข้อง</p>
            </div>
            
            <div class="contact-list">
                <div class="contact-item active" data-contact="cm1">
                    <div class="contact-avatar">CM</div>
                    <div class="contact-info">
                        <div class="contact-name">คุณสมชาย ใจดี</div>
                        <div class="contact-role">ผู้จัดการผู้สูงอายุ (CM)</div>
                        <div class="last-message">สวัสดีครับ มีอะไรให้ช่วยไหมครับ?</div>
                    </div>
                    <div class="contact-status">
                        <div class="time">10:00</div>
                        <div class="unread-count">2</div>
                    </div>
                </div>
                
                <div class="contact-item" data-contact="hospital">
                    <div class="contact-avatar">รพ</div>
                    <div class="contact-info">
                        <div class="contact-name">โรงพยาบาลใกล้บ้าน</div>
                        <div class="contact-role">หน่วยงานสุขภาพ</div>
                        <div class="last-message">ยืนยันนัดตรวจสุขภาพวันที่ 15</div>
                    </div>
                    <div class="contact-status">
                        <div class="time">09:45</div>
                    </div>
                </div>
                
                <div class="contact-item" data-contact="caregiver">
                    <div class="contact-avatar">ผส</div>
                    <div class="contact-info">
                        <div class="contact-name">คุณสาวิตรี</div>
                        <div class="contact-role">ผู้ดูแลผู้สูงอายุ</div>
                        <div class="last-message">รายงานการดูแลประจำวันส่งแล้ว</div>
                    </div>
                    <div class="contact-status">
                        <div class="time">昨天</div>
                    </div>
                </div>
                
                <div class="agencies-section">
                    <div class="section-title">หน่วยงานที่เกี่ยวข้อง</div>
                    
                    <div class="contact-item" data-contact="social">
                        <div class="contact-avatar">สส</div>
                        <div class="contact-info">
                            <div class="contact-name">สำนักงานพัฒนาสังคม</div>
                            <div class="contact-role">หน่วยงานสวัสดิการ</div>
                            <div class="last-message">แจ้งเตือนการรับเบี้ยยังชีพ</div>
                        </div>
                        <div class="contact-status">
                            <div class="time">07/10</div>
                        </div>
                    </div>
                    
                    <div class="contact-item" data-contact="volunteer">
                        <div class="contact-avatar">อส</div>
                        <div class="contact-info">
                            <div class="contact-name">อาสาสมัครชุมชน</div>
                            <div class="contact-role">หน่วยงานอาสา</div>
                            <div class="last-message">จะไปเยี่ยมตามนัดวันพรุ่งนี้</div>
                        </div>
                        <div class="contact-status">
                            <div class="time">06/10</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- พื้นที่แชทหลัก -->
        <div class="chat-area">
            <div class="chat-header">
                <div class="chat-avatar">CM</div>
                <div class="chat-info">
                    <div class="chat-name">คุณสมชาย ใจดี (CM)</div>
                    <div class="chat-status online">กำลังออนไลน์</div>
                </div>
                <div class="chat-actions">
                    <button class="chat-action-btn"><i class="fas fa-phone"></i></button>
                    <button class="chat-action-btn"><i class="fas fa-video"></i></button>
                    <button class="chat-action-btn"><i class="fas fa-info-circle"></i></button>
                </div>
            </div>
            
            <div class="chat-messages">
                <div class="message received">
                    สวัสดีครับ ผม CM ผู้จัดการผู้สูงอายุประจำพื้นที่ มีอะไรให้ช่วยเหลือไหมครับ?
                    <div class="message-time">10:00</div>
                </div>
                
                <div class="message sent">
                    สวัสดีค่ะ อยากสอบถามเกี่ยวกับการนัดตรวจสุขภาพที่โรงพยาบาลค่ะ
                    <div class="message-time">10:02</div>
                </div>
                
                <div class="message received">
                    ตอนนี้มีนัดตรวจสุขภาพวันที่ 15 นี้ เวลา 09:00 น. ที่โรงพยาบาลใกล้บ้านครับ
                    <div class="message-time">10:03</div>
                </div>
                
                <div class="message received">
                    ต้องการให้จัดรถรับส่งหรือไม่ครับ?
                    <div class="message-time">10:03</div>
                </div>
                
                <div class="message sent">
                    ต้องการค่ะ ขอบคุณมากค่ะ
                    <div class="message-time">10:04</div>
                </div>
            </div>
            
            <div class="chat-input-area">
                <button class="attachment-btn">
                    <i class="fas fa-paperclip"></i>
                </button>
                <textarea class="message-input" placeholder="พิมพ์ข้อความ..."></textarea>
                <button class="send-btn">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>

    <script>
        // เปลี่ยนการแชทเมื่อคลิกที่รายชื่อผู้ติดต่อ
        document.querySelectorAll('.contact-item').forEach(item => {
            item.addEventListener('click', function() {
                // ลบสถานะ active จากทุกอัน
                document.querySelectorAll('.contact-item').forEach(i => {
                    i.classList.remove('active');
                });
                
                // เพิ่มสถานะ active ให้อันที่คลิก
                this.classList.add('active');
                
                // อัพเดทหัวข้อแชท
                const contactName = this.querySelector('.contact-name').textContent;
                const contactRole = this.querySelector('.contact-role').textContent;
                
                document.querySelector('.chat-name').textContent = contactName;
                document.querySelector('.chat-status').textContent = contactRole;
                
                // ลบจำนวนข้อความที่ยังไม่ได้อ่าน
                const unreadCount = this.querySelector('.unread-count');
                if (unreadCount) {
                    unreadCount.remove();
                }
            });
        });
        
        // ส่งข้อความ
        const messageInput = document.querySelector('.message-input');
        const sendBtn = document.querySelector('.send-btn');
        const chatMessages = document.querySelector('.chat-messages');
        
        function sendMessage() {
            const message = messageInput.value.trim();
            if (message) {
                const messageElement = document.createElement('div');
                messageElement.classList.add('message', 'sent');
                
                const now = new Date();
                const timeString = `${now.getHours()}:${now.getMinutes().toString().padStart(2, '0')}`;
                
                messageElement.innerHTML = `
                    ${message}
                    <div class="message-time">${timeString}</div>
                `;
                
                chatMessages.appendChild(messageElement);
                messageInput.value = '';
                
                // เลื่อนไปที่ข้อความล่าสุด
                chatMessages.scrollTop = chatMessages.scrollHeight;
                
                // จำลองการตอบกลับ (เฉพาะ CM)
                if (document.querySelector('.contact-item.active').dataset.contact === 'cm1') {
                    setTimeout(() => {
                        const replies = [
                            "ได้รับข้อความแล้วครับ จะดำเนินการให้เร็วที่สุด",
                            "ขอบคุณสำหรับข้อมูลครับ",
                            "มีอะไรให้ช่วยเหลือเพิ่มเติมไหมครับ?",
                            "ผมจะแจ้งให้หน่วยงานที่เกี่ยวข้องทราบครับ"
                        ];
                        
                        const randomReply = replies[Math.floor(Math.random() * replies.length)];
                        
                        const replyElement = document.createElement('div');
                        replyElement.classList.add('message', 'received');
                        replyElement.innerHTML = `
                            ${randomReply}
                            <div class="message-time">${now.getHours()}:${(now.getMinutes() + 1).toString().padStart(2, '0')}</div>
                        `;
                        
                        chatMessages.appendChild(replyElement);
                        chatMessages.scrollTop = chatMessages.scrollHeight;
                    }, 1000);
                }
            }
        }
        
        sendBtn.addEventListener('click', sendMessage);
        
        messageInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                sendMessage();
            }
        });
        
        // เริ่มต้นเลื่อนไปที่ข้อความล่าสุด
        chatMessages.scrollTop = chatMessages.scrollHeight;
    </script>
</body>
</html>