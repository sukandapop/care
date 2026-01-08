<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การสนทนา - ผู้สูงอายุป่วยติดเตียง</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Sukhumvit+Set:wght@300;400;500;600;700&family=Kanit:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/communication.css">
</head>
<body>

<?php include 'navbar.php'   ?>
    <!-- เนื้อหาหลัก -->
    <div class="app-container">
        <!-- Sidebar with Chat List -->
        <div class="sidebar">
            <!-- Header -->
            <div class="sidebar-header">
                <div class="user-info">
                    <div class="user-avatar">ผส</div>
                    <div class="user-details">
                        <h2>ผู้สูงอายุป่วยติดเตียง</h2>
                        <span class="role">ผู้ใช้งานระบบสื่อสาร</span>
                    </div>
                </div>
               
                <div class="search-container">
                    <input type="text" class="search-input" placeholder="ค้นหาการสนทนา..." id="searchInput">
                    <i class="fas fa-search search-icon"></i>
                </div>
            </div>
           
            <!-- Chat List -->
            <div class="chat-list-container">
                <div class="chat-list-header">
                    <h3 class="chat-list-title">การสนทนาทั้งหมด</h3>
                    <div class="filter-options">
                        <button class="filter-btn active" data-filter="all">ทั้งหมด</button>
                        <button class="filter-btn" data-filter="unread">ยังไม่อ่าน</button>
                        <button class="filter-btn" data-filter="family">ครอบครัว</button>
                    </div>
                </div>
               
                <ul class="chat-list" id="chatList">
                    <!-- ลูกสาว -->
                    <li class="chat-item active unread" data-chat-id="1" data-category="family">
                        <div class="avatar-placeholder family-avatar-bg">สม</div>
                        <div class="chat-status status-online"></div>
                        <div class="chat-info">
                            <div class="chat-header">
                                <h3 class="chat-name">สมหญิง (ลูกสาว)</h3>
                                <span class="chat-time">10:23</span>
                            </div>
                            <div class="chat-preview">
                                <p class="last-message unread">พ่อสบายดีไหมคะ วันนี้รู้สึกอย่างไรบ้าง</p>
                                <div class="unread-badge">3</div>
                            </div>
                        </div>
                    </li>
                   
                    <!-- ลูกชาย -->
                    <li class="chat-item" data-chat-id="2" data-category="family">
                        <div class="avatar-placeholder family-avatar-bg">สมช</div>
                        <div class="chat-status status-away"></div>
                        <div class="chat-info">
                            <div class="chat-header">
                                <h3 class="chat-name">สมชาย (ลูกชาย)</h3>
                                <span class="chat-time">09:15</span>
                            </div>
                            <div class="chat-preview">
                                <p class="last-message">เย็นนี้จะเอาข้าวมาฝากครับ</p>
                            </div>
                        </div>
                    </li>
                   
                    <!-- อาสาสมัคร -->
                    <li class="chat-item" data-chat-id="3" data-category="volunteer">
                        <div class="avatar-placeholder volunteer-avatar-bg">อ</div>
                        <div class="chat-status status-online"></div>
                        <div class="chat-info">
                            <div class="chat-header">
                                <h3 class="chat-name">อสม. สมหมาย</h3>
                                <span class="chat-time">เมื่อวาน</span>
                            </div>
                            <div class="chat-preview">
                                <p class="last-message">พรุ่งนี้จะแวะไปวัดความดันให้นะครับ</p>
                                <div class="unread-badge">1</div>
                            </div>
                        </div>
                    </li>
                   
                    <!-- Case Manager -->
                    <li class="chat-item" data-chat-id="4" data-category="cm">
                        <div class="avatar-placeholder cm-avatar-bg">พญ</div>
                        <div class="chat-status status-busy"></div>
                        <div class="chat-info">
                            <div class="chat-header">
                                <h3 class="chat-name">พญ. กรวรรณ สุขใจ</h3>
                                <span class="chat-time">เมื่อวาน</span>
                            </div>
                            <div class="chat-preview">
                                <p class="last-message">ส่งรายงานสุขภาพประจำสัปดาห์แล้ว</p>
                            </div>
                        </div>
                    </li>
                   
                    <!-- หน่วยงานสุขภาพ -->
                    <li class="chat-item" data-chat-id="5" data-category="agency">
                        <div class="avatar-placeholder agency-avatar-bg">สธ</div>
                        <div class="chat-info">
                            <div class="chat-header">
                                <h3 class="chat-name">สำนักงานหลักประกันสุขภาพ</h3>
                                <span class="chat-time">25 มี.ค.</span>
                            </div>
                            <div class="chat-preview">
                                <p class="last-message">ขอข้อมูลเพิ่มเติมสำหรับการต่ออายุบัตร</p>
                            </div>
                        </div>
                    </li>
                   
                    <!-- อาสาสมัครคนที่ 2 -->
                    <li class="chat-item unread" data-chat-id="6" data-category="volunteer">
                        <div class="avatar-placeholder volunteer-avatar-bg">สมร</div>
                        <div class="chat-status status-offline"></div>
                        <div class="chat-info">
                            <div class="chat-header">
                                <h3 class="chat-name">อสม. สมร</h3>
                                <span class="chat-time">24 มี.ค.</span>
                            </div>
                            <div class="chat-preview">
                                <p class="last-message unread">พรุ่งนี้จะเอายามาส่งให้นะคะ</p>
                                <div class="unread-badge">1</div>
                            </div>
                        </div>
                    </li>
                   
                    <!-- โรงพยาบาล -->
                    <li class="chat-item" data-chat-id="7" data-category="agency">
                        <div class="avatar-placeholder agency-avatar-bg">รพ</div>
                        <div class="chat-info">
                            <div class="chat-header">
                                <h3 class="chat-name">โรงพยาบาลใกล้บ้าน</h3>
                                <span class="chat-time">23 มี.ค.</span>
                            </div>
                            <div class="chat-preview">
                                <p class="last-message">นัดตรวจสุขภาพประจำเดือน เดือนหน้า</p>
                            </div>
                        </div>
                    </li>
                   
                    <!-- กลุ่มครอบครัว -->
                    <li class="chat-item" data-chat-id="8" data-category="family">
                        <div class="avatar-placeholder family-avatar-bg">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="chat-info">
                            <div class="chat-header">
                                <h3 class="chat-name">กลุ่มครอบครัว</h3>
                                <span class="chat-time">22 มี.ค.</span>
                            </div>
                            <div class="chat-preview">
                                <p class="last-message">สมหญิง: แม่บอกว่าวันนี้ทานข้าวได้ดี</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
       
        <!-- Main Chat Area (Empty State) -->
        <div class="main-chat-area">
            <div class="empty-chat-state">
                <div class="empty-chat-icon">
                    <i class="fas fa-comment-dots"></i>
                </div>
                <h2 class="empty-chat-title">เลือกการสนทนาเพื่อเริ่มแชท</h2>
                <p class="empty-chat-message">เลือกการสนทนาจากรายการด้านซ้ายเพื่อดูข้อความและส่งข้อความใหม่ คุณยังสามารถค้นหาการสนทนาหรือกรองตามประเภทได้</p>
                <div style="margin-top: 20px; color: var(--primary-color);">
                    <i class="fas fa-arrow-left" style="margin-right: 10px;"></i>
                    <span>เลือกการสนทนาจากรายการ</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        // DOM Elements
        const chatList = document.getElementById('chatList');
        const searchInput = document.getElementById('searchInput');
        const filterButtons = document.querySelectorAll('.filter-btn');
        const chatItems = document.querySelectorAll('.chat-item');
       
        // Filter chats by category
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all filter buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
               
                // Add active class to clicked button
                this.classList.add('active');
               
                const filter = this.getAttribute('data-filter');
                filterChats(filter);
            });
        });
       
        // Filter chat function
        function filterChats(filter) {
            chatItems.forEach(item => {
                const category = item.getAttribute('data-category');
               
                if (filter === 'all') {
                    item.style.display = 'flex';
                } else if (filter === 'unread') {
                    if (item.classList.contains('unread')) {
                        item.style.display = 'flex';
                    } else {
                        item.style.display = 'none';
                    }
                } else if (filter === 'family') {
                    if (category === 'family') {
                        item.style.display = 'flex';
                    } else {
                        item.style.display = 'none';
                    }
                } else {
                    // For other specific categories
                    if (category === filter) {
                        item.style.display = 'flex';
                    } else {
                        item.style.display = 'none';
                    }
                }
            });
        }
       
        // Search function
        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();
           
            chatItems.forEach(item => {
                const chatName = item.querySelector('.chat-name').textContent.toLowerCase();
                const lastMessage = item.querySelector('.last-message').textContent.toLowerCase();
               
                if (chatName.includes(searchTerm) || lastMessage.includes(searchTerm)) {
                    item.style.display = 'flex';
                } else {
                    item.style.display = 'none';
                }
            });
        });
       
        // Select chat item
        chatItems.forEach(item => {
            item.addEventListener('click', function() {
                // Remove active class from all items
                chatItems.forEach(chat => chat.classList.remove('active'));
               
                // Add active class to clicked item
                this.classList.add('active');
               
                // Mark as read (remove unread badge)
                if (this.classList.contains('unread')) {
                    this.classList.remove('unread');
                    const lastMessage = this.querySelector('.last-message');
                    lastMessage.classList.remove('unread');
                   
                    // Remove unread badge
                    const unreadBadge = this.querySelector('.unread-badge');
                    if (unreadBadge) {
                        unreadBadge.remove();
                    }
                   
                    // Add animation for visual feedback
                    this.classList.add('new-message');
                    setTimeout(() => {
                        this.classList.remove('new-message');
                    }, 2000);
                }
               
                // In a real app, this would load the chat messages
                const chatId = this.getAttribute('data-chat-id');
                const chatName = this.querySelector('.chat-name').textContent;
                console.log(`กำลังโหลดการสนทนาที่ ${chatId} กับ ${chatName}`);
               
                // For mobile, we would navigate to chat screen
                if (window.innerWidth <= 768) {
                    alert(`บนแอปจริงจะเปิดหน้าการสนทนากับ: ${chatName}`);
                }
            });
        });

        // Simulate new message received
        setTimeout(() => {
            // Find a chat that doesn't have unread messages
            const targetChat = document.querySelector('.chat-item[data-chat-id="2"]');
            if (targetChat && !targetChat.classList.contains('unread')) {
                // Update last message
                const lastMessage = targetChat.querySelector('.last-message');
                lastMessage.textContent = "กำลังซื้อข้าวเหนียวหมูปิ้งมาให้ครับ";
                lastMessage.classList.add('unread');
               
                // Add unread badge
                const chatPreview = targetChat.querySelector('.chat-preview');
                const existingBadge = targetChat.querySelector('.unread-badge');
               
                if (!existingBadge) {
                    const unreadBadge = document.createElement('div');
                    unreadBadge.className = 'unread-badge';
                    unreadBadge.textContent = '1';
                    chatPreview.appendChild(unreadBadge);
                }
               
                // Mark as unread
                targetChat.classList.add('unread');
               
                // Update time
                const timeElement = targetChat.querySelector('.chat-time');
                const now = new Date();
                const timeString = `${now.getHours().toString().padStart(2, '0')}:${now.getMinutes().toString().padStart(2, '0')}`;
                timeElement.textContent = timeString;
               
                // Add highlight animation
                targetChat.classList.add('new-message');
                setTimeout(() => {
                    targetChat.classList.remove('new-message');
                }, 2000);
               
                // Move to top of list
                chatList.prepend(targetChat);
            }
        }, 5000);
       
        // Initialize with active filter
        filterChats('all');
    </script>
</body>
</html>