<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบแชทกลุ่มสำหรับผู้สูงอายุ</title>
    <link rel="stylesheet" href="../css/communication.css">
    <style>

    </style>
</head>
<body>

<?php include 'navbar.php'   ?>

    <div class="container">
        <header class="header">
            <h1>แชทกลุ่มสำหรับผู้สูงอายุป่วยติดเตียง</h1>
            <p>ช่องทางการสื่อสารระหว่างผู้สูงอายุ ครอบครัว และอาสาสมัครสาธารณสุข</p>
        </header>
        
        <div class="main-content">
            <!-- แถบด้านข้างสำหรับข้อมูลกลุ่ม -->
            <div class="group-sidebar">
                <h2>ข้อมูลกลุ่ม</h2>
                <div class="group-info">
                    <div class="group-name">ครอบครัวและอสม.</div>
                    <div class="group-description">กลุ่มสำหรับการสื่อสารระหว่างผู้สูงอายุ ครอบครัว และอาสาสมัครสาธารณสุขประจำหมู่บ้าน</div>
                </div>
                
                <h2>สมาชิกในกลุ่ม</h2>
                <ul class="members-list">
                    <li class="member-item">
                        <div class="member-avatar user">ผ</div>
                        <div class="member-info">
                            <h3>ผู้สูงอายุ</h3>
                            <p>คุณปู่/คุณย่า</p>
                        </div>
                        <div class="member-status status-online"></div>
                    </li>
                    <li class="member-item">
                        <div class="member-avatar family">ล</div>
                        <div class="member-info">
                            <h3>ลูกสาว (สมหญิง)</h3>
                            <p>ครอบครัว</p>
                        </div>
                        <div class="member-status status-away"></div>
                    </li>
                    <li class="member-item">
                        <div class="member-avatar volunteer">อ</div>
                        <div class="member-info">
                            <h3>อสม. สมหมาย</h3>
                            <p>อาสาสมัครสาธารณสุข</p>
                        </div>
                        <div class="member-status status-online"></div>
                    </li>
                </ul>
                
                <h2 style="margin-top: 30px;">ปุ่มด่วน</h2>
                <div class="quick-buttons">
                    <button class="quick-button">ต้องการน้ำดื่ม</button>
                    <button class="quick-button">ต้องการยา</button>
                    <button class="quick-button">ปวดเมื่อย</button>
                    <button class="quick-button">ต้องการความช่วยเหลือ</button>
                </div>
            </div>
            
            <!-- พื้นที่แชทหลัก -->
            <div class="chat-area">
                <div class="chat-header">
                    <div class="chat-header-info">
                        <h2>ครอบครัวและอสม.</h2>
                        <p>กลุ่มแชทสำหรับการสื่อสารระหว่างผู้สูงอายุ ครอบครัว และอสม.</p>
                    </div>
                    <div class="group-actions">
                        <button class="group-action-btn" id="groupInfoBtn">ข้อมูลกลุ่ม</button>
                        <button class="group-action-btn">ตั้งค่า</button>
                    </div>
                </div>
                
                <div class="chat-messages">
                    <div class="message family">
                        <div class="message-content">
                            <div class="message-header">
                                <span class="message-sender">ลูกสาว (สมหญิง)</span>
                                <span class="message-time">10:05 น.</span>
                            </div>
                            <div class="message-bubble">
                                สวัสดีครับพ่อ วันนี้รู้สึกอย่างไรบ้างครับ?
                            </div>
                        </div>
                    </div>
                    
                    <div class="message user">
                        <div class="message-content">
                            <div class="message-header">
                                <span class="message-sender">คุณ</span>
                                <span class="message-time">10:07 น.</span>
                            </div>
                            <div class="message-bubble">
                                วันนี้รู้สึกปวดหลังนิดหน่อย ลูกชาย
                            </div>
                        </div>
                    </div>
                    
                    <div class="message volunteer">
                        <div class="message-content">
                            <div class="message-header">
                                <span class="message-sender">อสม. สมหมาย</span>
                                <span class="message-time">10:08 น.</span>
                            </div>
                            <div class="message-bubble">
                                สวัสดีครับคุณปู่ เดี๋ยวผมจะแวะไปเยี่ยมช่วงบ่ายนะครับ
                            </div>
                        </div>
                    </div>
                    
                    <div class="message user">
                        <div class="message-content">
                            <div class="message-header">
                                <span class="message-sender">คุณ</span>
                                <span class="message-time">10:12 น.</span>
                            </div>
                            <div class="message-bubble">
                                ขอบคุณนะลูก กับอสม.สมหมายด้วย
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="message-input">
                    <textarea placeholder="พิมพ์ข้อความ..." id="messageText"></textarea>
                    <button class="send-button" id="sendButton">
                        <i>ส่ง</i>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- ส่วนข้อมูลกลุ่มที่ด้านล่าง -->
        <div class="group-detail-section" id="groupDetailSection">
            <div class="group-detail-header">
                <h2>ข้อมูลกลุ่ม</h2>
                <button class="close-detail-btn" id="closeDetailBtn">ปิด</button>
            </div>
            <div class="group-detail-content">
                <div class="group-detail-info">
                    <h3>รายละเอียดกลุ่ม</h3>
                    <p><strong>ชื่อกลุ่ม:</strong> ครอบครัวและอสม.</p>
                    <p><strong>สร้างเมื่อ:</strong> 15 มกราคม 2566</p>
                    <p><strong>วัตถุประสงค์:</strong> กลุ่มสำหรับการสื่อสารระหว่างผู้สูงอายุป่วยติดเตียง ครอบครัว และอาสาสมัครสาธารณสุขประจำหมู่บ้าน เพื่อการดูแลสุขภาพและความเป็นอยู่ที่ดีของผู้สูงอายุ</p>
                    <p><strong>กฎการใช้งาน:</strong> 
                        <ul style="margin-left: 20px; color: #666;">
                            <li>ใช้ภาษาที่สุภาพและเหมาะสม</li>
                            <li>ไม่ส่งข้อมูลส่วนตัวที่สำคัญ</li>
                            <li>แจ้งอาการหรือความต้องการให้ชัดเจน</li>
                            <li>ใช้ปุ่มฉุกเฉินเมื่อต้องการความช่วยเหลือเร่งด่วน</li>
                        </ul>
                    </p>
                </div>
                <div class="group-detail-members">
                    <h3>สมาชิกทั้งหมด</h3>
                    <ul class="detail-members-list">
                        <li class="detail-member-item">
                            <div class="member-avatar user">ผ</div>
                            <div class="member-info">
                                <h3>ผู้สูงอายุ</h3>
                                <p>คุณปู่/คุณย่า (สมาชิกหลัก)</p>
                            </div>
                            <div class="member-status status-online"></div>
                        </li>
                        <li class="detail-member-item">
                            <div class="member-avatar family">ล</div>
                            <div class="member-info">
                                <h3>ลูกสาว (สมหญิง)</h3>
                                <p>ครอบครัว</p>
                            </div>
                            <div class="member-status status-away"></div>
                        </li>
                        <li class="detail-member-item">
                            <div class="member-avatar volunteer">อ</div>
                            <div class="member-info">
                                <h3>อสม. สมหมาย</h3>
                                <p>อาสาสมัครผู้ดูแลผู้สูงอายุ</p>
                            </div>
                            <div class="member-status status-online"></div>
                        </li>
                        <li class="detail-member-item">
                            <div class="member-avatar volunteer">อ</div>
                            <div class="member-info">
                                <h3>CM</h3>
                                <p>ผู้จัดการดูแลผู้สูงอายุ</p>
                            </div>
                            <div class="member-status status-offline"></div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- ส่วนปุ่มฉุกเฉิน -->
        <div class="emergency-section">
            <button class="emergency-button" id="emergencyButton">
                <span>แจ้งเหตุฉุกเฉิน</span>
            </button>
            <p style="margin-top: 10px; color: #666;">กดปุ่มนี้เมื่อต้องการความช่วยเหลือเร่งด่วน</p>
        </div>
    </div>

    <script>
        // ฟังก์ชันสำหรับการส่งข้อความ
        document.getElementById('sendButton').addEventListener('click', function() {
            const messageText = document.getElementById('messageText');
            const text = messageText.value.trim();
            
            if (text) {
                // สร้างข้อความใหม่จากผู้ใช้
                const messagesContainer = document.querySelector('.chat-messages');
                const newMessage = document.createElement('div');
                newMessage.className = 'message user';
                
                const now = new Date();
                const timeString = `${now.getHours()}:${now.getMinutes().toString().padStart(2, '0')} น.`;
                
                newMessage.innerHTML = `
                    <div class="message-content">
                        <div class="message-header">
                            <span class="message-sender">คุณ</span>
                            <span class="message-time">${timeString}</span>
                        </div>
                        <div class="message-bubble">
                            ${text}
                        </div>
                    </div>
                `;
                
                messagesContainer.appendChild(newMessage);
                messageText.value = '';
                
                // เลื่อนไปที่ข้อความล่าสุด
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
                
                // จำลองการตอบกลับจากสมาชิกในกลุ่ม (สำหรับการสาธิต)
                setTimeout(function() {
                    const members = [
                        { type: 'family', name: 'ลูกชาย (สมชาย)', avatar: 'ล' },
                        { type: 'family', name: 'ลูกสาว (สมหญิง)', avatar: 'ล' },
                        { type: 'volunteer', name: 'อสม. สมหมาย', avatar: 'อ' }
                    ];
                    
                    const randomMember = members[Math.floor(Math.random() * members.length)];
                    
                    const replies = {
                        family: [
                            "ได้รับข้อความแล้วครับ/ค่ะ",
                            "กำลังดำเนินการให้ครับ/ค่ะ",
                            "ขอบคุณสำหรับข้อมูลครับ/ค่ะ",
                            "จะแวะไปเยี่ยมเร็วๆ นี้ครับ/ค่ะ",
                            "ดูแลสุขภาพด้วยนะครับ/ค่ะ"
                        ],
                        volunteer: [
                            "ได้รับข้อความแล้วครับ",
                            "จะแวะไปเยี่ยมให้เร็วที่สุดครับ",
                            "ขอบคุณสำหรับข้อมูลครับ",
                            "ดูแลตัวเองดีๆ นะครับ",
                            "มีอะไรให้ช่วยเหลือไหมครับ"
                        ]
                    };
                    
                    const randomReply = replies[randomMember.type][Math.floor(Math.random() * replies[randomMember.type].length)];
                    
                    const replyMessage = document.createElement('div');
                    replyMessage.className = `message ${randomMember.type}`;
                    
                    replyMessage.innerHTML = `
                        <div class="message-content">
                            <div class="message-header">
                                <span class="message-sender">${randomMember.name}</span>
                                <span class="message-time">${timeString}</span>
                            </div>
                            <div class="message-bubble">
                                ${randomReply}
                            </div>
                        </div>
                    `;
                    
                    messagesContainer.appendChild(replyMessage);
                    messagesContainer.scrollTop = messagesContainer.scrollHeight;
                }, 1000 + Math.random() * 2000); // สุ่มเวลาตอบกลับระหว่าง 1-3 วินาที
            }
        });
        
        // อนุญาตให้ส่งข้อความด้วยการกด Enter
        document.getElementById('messageText').addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                document.getElementById('sendButton').click();
            }
        });
        
        // การจัดการปุ่มฉุกเฉิน
        document.getElementById('emergencyButton').addEventListener('click', function() {
            if (confirm('ต้องการแจ้งเหตุฉุกเฉินหรือไม่? ระบบจะส่งการแจ้งเตือนไปยังทุกคนในกลุ่ม')) {
                alert('ระบบได้ส่งการแจ้งเตือนเหตุฉุกเฉินแล้ว');
                
                // เพิ่มข้อความแจ้งเตือนในแชท
                const messagesContainer = document.querySelector('.chat-messages');
                const emergencyMessage = document.createElement('div');
                emergencyMessage.className = 'message user';
                
                const now = new Date();
                const timeString = `${now.getHours()}:${now.getMinutes().toString().padStart(2, '0')} น.`;
                
                emergencyMessage.innerHTML = `
                    <div class="message-content">
                        <div class="message-header">
                            <span class="message-sender">ระบบ</span>
                            <span class="message-time">${timeString}</span>
                        </div>
                        <div class="message-bubble" style="background-color: #ffcccc; color: #cc0000; font-weight: bold;">
                            แจ้งเหตุฉุกเฉิน! ผู้ใช้ได้กดปุ่มแจ้งเหตุฉุกเฉิน กรุณาติดต่อกลับโดยเร็ว
                        </div>
                    </div>
                `;
                
                messagesContainer.appendChild(emergencyMessage);
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
                
                // จำลองการตอบกลับฉุกเฉินจากสมาชิก
                setTimeout(function() {
                    const emergencyReplies = [
                        { type: 'family', name: 'ลูกชาย (สมชาย)', message: 'กำลังโทรหาครับ!' },
                        { type: 'volunteer', name: 'อสม. สมหมาย', message: 'กำลังเดินทางไปที่นั่นครับ!' },
                        { type: 'family', name: 'ลูกสาว (สมหญิง)', message: 'กำลังโทรหาค่ะ!' }
                    ];
                    
                    emergencyReplies.forEach((reply, index) => {
                        setTimeout(() => {
                            const replyMessage = document.createElement('div');
                            replyMessage.className = `message ${reply.type}`;
                            
                            replyMessage.innerHTML = `
                                <div class="message-content">
                                    <div class="message-header">
                                        <span class="message-sender">${reply.name}</span>
                                        <span class="message-time">${timeString}</span>
                                    </div>
                                    <div class="message-bubble" style="background-color: #fffacd;">
                                        ${reply.message}
                                    </div>
                                </div>
                            `;
                            
                            messagesContainer.appendChild(replyMessage);
                            messagesContainer.scrollTop = messagesContainer.scrollHeight;
                        }, 1000 * (index + 1));
                    });
                }, 1000);
            }
        });
        
        // การจัดการปุ่มด่วน
        document.querySelectorAll('.quick-button').forEach(button => {
            button.addEventListener('click', function() {
                const quickMessage = this.textContent;
                document.getElementById('messageText').value = quickMessage;
                document.getElementById('sendButton').click();
            });
        });
        
        // การจัดการปุ่มข้อมูลกลุ่ม
        document.getElementById('groupInfoBtn').addEventListener('click', function() {
            const groupDetailSection = document.getElementById('groupDetailSection');
            groupDetailSection.style.display = 'block';
            
            // เลื่อนหน้าจอไปยังส่วนข้อมูลกลุ่ม
            groupDetailSection.scrollIntoView({ behavior: 'smooth' });
        });
        
        // การจัดการปุ่มปิดข้อมูลกลุ่ม
        document.getElementById('closeDetailBtn').addEventListener('click', function() {
            const groupDetailSection = document.getElementById('groupDetailSection');
            groupDetailSection.style.display = 'none';
        });
    </script>

<?php include 'footer.php'   ?>

</body>
</html>