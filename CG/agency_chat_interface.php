<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การสนทนา - CG Messenger</title>
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
            --gray-light: #e9ecef;
            --gray-medium: #adb5bd;
            --gray-dark: #6c757d;
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
            height: 100vh;
            overflow: hidden;
        }

        .app-container {
            display: flex;
            height: 100vh;
            max-width: 1400px;
            margin: 0 auto;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.05);
        }

        /* Sidebar Styles */
        .sidebar {
            width: 380px;
            background-color: white;
            border-right: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* Header Styles */
        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid var(--border-color);
            background-color: white;
            z-index: 10;
        }

        .user-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .user-details h2 {
            font-family: 'Kanit', sans-serif;
            font-weight: 500;
            font-size: 18px;
            margin-bottom: 4px;
        }

        .user-details .role {
            color: var(--gray-dark);
            font-size: 14px;
            background-color: var(--primary-light);
            color: var(--primary-color);
            padding: 3px 10px;
            border-radius: 20px;
            display: inline-block;
        }

        /* Search Bar Styles */
        .search-container {
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 12px 45px 12px 15px;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-family: 'Noto Sans Thai', sans-serif;
            font-size: 14px;
            background-color: var(--light-color);
            transition: all 0.3s;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-color);
            background-color: white;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.1);
        }

        .search-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-medium);
        }

        /* Chat List Styles */
        .chat-list-container {
            flex: 1;
            overflow-y: auto;
        }

        .chat-list-header {
            padding: 15px 20px 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .chat-list-title {
            font-family: 'Kanit', sans-serif;
            font-weight: 500;
            font-size: 16px;
            color: var(--gray-dark);
        }

        .filter-options {
            display: flex;
            gap: 10px;
        }

        .filter-btn {
            background: none;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            padding: 5px 10px;
            font-size: 12px;
            color: var(--gray-dark);
            cursor: pointer;
            transition: all 0.2s;
        }

        .filter-btn.active {
            background-color: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .chat-list {
            list-style: none;
        }

        .chat-item {
            padding: 15px 20px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: background-color 0.2s;
            position: relative;
        }

        .chat-item:hover {
            background-color: var(--light-color);
        }

        .chat-item.active {
            background-color: var(--primary-light);
            border-left: 4px solid var(--primary-color);
        }

        .chat-item.unread {
            background-color: rgba(67, 97, 238, 0.05);
        }

        .chat-avatar {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .avatar-placeholder {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            margin-right: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 20px;
            flex-shrink: 0;
        }

        .user-avatar-bg {
            background-color: var(--primary-color);
        }

        .group-avatar-bg {
            background-color: var(--success-color);
        }

        .agency-avatar-bg {
            background-color: var(--secondary-color);
        }

        .chat-info {
            flex-grow: 1;
            min-width: 0; /* สำหรับการตัดข้อความยาวเกิน */
        }

        .chat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 5px;
        }

        .chat-name {
            font-weight: 600;
            font-size: 16px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .chat-time {
            font-size: 12px;
            color: var(--gray-dark);
            flex-shrink: 0;
            margin-left: 10px;
        }

        .chat-preview {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .last-message {
            font-size: 14px;
            color: var(--gray-dark);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            flex-grow: 1;
        }

        .last-message.unread {
            color: var(--dark-color);
            font-weight: 500;
        }

        .unread-badge {
            background-color: var(--danger-color);
            color: white;
            font-size: 12px;
            font-weight: bold;
            width: 22px;
            height: 22px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-left: 10px;
        }

        .chat-status {
            position: absolute;
            bottom: 20px;
            left: 65px;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 2px solid white;
        }

        .status-online {
            background-color: var(--success-color);
        }

        .status-offline {
            background-color: var(--gray-medium);
        }

        .status-busy {
            background-color: var(--danger-color);
        }

        /* Main Chat Area Styles */
        .main-chat-area {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: #f0f2f5;
        }

        .empty-chat-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            color: var(--gray-dark);
            text-align: center;
            padding: 20px;
        }

        .empty-chat-icon {
            font-size: 80px;
            color: var(--gray-light);
            margin-bottom: 20px;
        }

        .empty-chat-title {
            font-family: 'Kanit', sans-serif;
            font-size: 24px;
            margin-bottom: 10px;
            color: var(--gray-dark);
        }

        .empty-chat-message {
            max-width: 400px;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .sidebar {
                width: 320px;
            }
        }

        @media (max-width: 768px) {
            .app-container {
                flex-direction: column;
            }
           
            .sidebar {
                width: 100%;
                height: 100%;
            }
           
            .main-chat-area {
                display: none;
            }
           
            .chat-list-container {
                padding-bottom: 20px;
            }
        }

        @media (max-width: 480px) {
            .sidebar-header {
                padding: 15px;
            }
           
            .chat-item {
                padding: 12px 15px;
            }
           
            .chat-avatar, .avatar-placeholder {
                width: 50px;
                height: 50px;
                font-size: 18px;
            }
           
            .chat-status {
                left: 60px;
                bottom: 18px;
            }
        }

        /* Animation for new messages */
        @keyframes highlightNew {
            0% { background-color: rgba(67, 97, 238, 0.1); }
            100% { background-color: transparent; }
        }

        .new-message {
            animation: highlightNew 2s ease-out;
        }
    </style>
</head>
<body>
    <div class="app-container">
        <!-- Sidebar with Chat List -->
        <div class="sidebar">
            <!-- Header -->
            <div class="sidebar-header">
                <div class="user-info">
                    <div class="user-avatar">ธ</div>
                    <div class="user-details">
                        <h2>ธีรวัฒน์ จิตต์เมตตา</h2>
                        <span class="role">Case Manager</span>
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
                        <button class="filter-btn" data-filter="groups">กลุ่ม</button>
                    </div>
                </div>
               
                <ul class="chat-list" id="chatList">
                    <!-- ผู้สูงอายุ 1 -->
                    <li class="chat-item active unread" data-chat-id="1" data-category="patient">
                        <div class="avatar-placeholder user-avatar-bg">ศร</div>
                        <div class="chat-status status-online"></div>
                        <div class="chat-info">
                            <div class="chat-header">
                                <h3 class="chat-name">ศรันย์ ใจดี (ผู้สูงอายุ)</h3>
                                <span class="chat-time">10:23</span>
                            </div>
                            <div class="chat-preview">
                                <p class="last-message unread">ขอข้อมูลการนัดพบแพทย์ในวันศุกร์ค่ะ</p>
                                <div class="unread-badge">3</div>
                            </div>
                        </div>
                    </li>
                   
                    <!-- ผู้สูงอายุ 2 -->
                    <li class="chat-item" data-chat-id="2" data-category="patient">
                        <div class="avatar-placeholder user-avatar-bg">สม</div>
                        <div class="chat-status status-offline"></div>
                        <div class="chat-info">
                            <div class="chat-header">
                                <h3 class="chat-name">สมศรี รักไทย (ผู้สูงอายุ)</h3>
                                <span class="chat-time">09:15</span>
                            </div>
                            <div class="chat-preview">
                                <p class="last-message">ขอบคุณสำหรับคำแนะนำเรื่องอาหารเช้านะคะ</p>
                            </div>
                        </div>
                    </li>
                   
                    <!-- กลุ่มผู้ดูแล -->
                    <li class="chat-item" data-chat-id="3" data-category="group">
                        <div class="avatar-placeholder group-avatar-bg">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="chat-info">
                            <div class="chat-header">
                                <h3 class="chat-name">ทีมดูแลผู้สูงอายุ</h3>
                                <span class="chat-time">เมื่อวาน</span>
                            </div>
                            <div class="chat-preview">
                                <p class="last-message">ธีรวัฒน์: ประชุมวันที่ 15 ยกเลิกนะครับ</p>
                                <div class="unread-badge">12</div>
                            </div>
                        </div>
                    </li>
                   
                    <!-- CM อื่น -->
                    <li class="chat-item" data-chat-id="4" data-category="cm">
                        <div class="avatar-placeholder user-avatar-bg">พญ</div>
                        <div class="chat-status status-online"></div>
                        <div class="chat-info">
                            <div class="chat-header">
                                <h3 class="chat-name">พญ.กรวรรณ สุขใจ (CM)</h3>
                                <span class="chat-time">เมื่อวาน</span>
                            </div>
                            <div class="chat-preview">
                                <p class="last-message">ส่งรายงานสุขภาพของศรันย์เรียบร้อยแล้ว</p>
                            </div>
                        </div>
                    </li>
                   
                    <!-- หน่วยงาน -->
                    <li class="chat-item" data-chat-id="5" data-category="agency">
                        <div class="avatar-placeholder agency-avatar-bg">สธ</div>
                        <div class="chat-info">
                            <div class="chat-header">
                                <h3 class="chat-name">สำนักงานหลักประกันสุขภาพ</h3>
                                <span class="chat-time">25 มี.ค.</span>
                            </div>
                            <div class="chat-preview">
                                <p class="last-message">เอกสารการอนุมัติส่งให้แล้ว กรุณาตรวจสอบ</p>
                            </div>
                        </div>
                    </li>
                   
                    <!-- ผู้สูงอายุ 3 -->
                    <li class="chat-item unread" data-chat-id="6" data-category="patient">
                        <div class="avatar-placeholder user-avatar-bg">ปร</div>
                        <div class="chat-status status-busy"></div>
                        <div class="chat-info">
                            <div class="chat-header">
                                <h3 class="chat-name">ประยูร เกื้อกูล (ผู้สูงอายุ)</h3>
                                <span class="chat-time">24 มี.ค.</span>
                            </div>
                            <div class="chat-preview">
                                <p class="last-message unread">รู้สึกปวดหลังมากขึ้นเมื่อเช้านี้</p>
                                <div class="unread-badge">1</div>
                            </div>
                        </div>
                    </li>
                   
                    <!-- ครอบครัวผู้สูงอายุ -->
                    <li class="chat-item" data-chat-id="7" data-category="family">
                        <div class="avatar-placeholder user-avatar-bg">สุ</div>
                        <div class="chat-status status-offline"></div>
                        <div class="chat-info">
                            <div class="chat-header">
                                <h3 class="chat-name">คุณสุพัตรา (ลูกสาวศรันย์)</h3>
                                <span class="chat-time">23 มี.ค.</span>
                            </div>
                            <div class="chat-preview">
                                <p class="last-message">ขอบคุณที่ดูแลคุณพ่อเป็นอย่างดีนะคะ</p>
                            </div>
                        </div>
                    </li>
                   
                    <!-- กลุ่มกิจกรรม -->
                    <li class="chat-item" data-chat-id="8" data-category="group">
                        <div class="avatar-placeholder group-avatar-bg">
                            <i class="fas fa-dumbbell"></i>
                        </div>
                        <div class="chat-info">
                            <div class="chat-header">
                                <h3 class="chat-name">กลุ่มกิจกรรมบำบัด</h3>
                                <span class="chat-time">22 มี.ค.</span>
                            </div>
                            <div class="chat-preview">
                                <p class="last-message">แจ้งเปลี่ยนเวลากิจกรรมเป็น 10:00 น.</p>
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
        // ข้อมูลตัวอย่างสำหรับการสนทนา
        const chatData = [
            {
                id: 1,
                name: "ศรันย์ ใจดี (ผู้สูงอายุ)",
                avatarType: "text",
                avatarText: "ศร",
                avatarColor: "user",
                status: "online",
                lastMessage: "ขอข้อมูลการนัดพบแพทย์ในวันศุกร์ค่ะ",
                time: "10:23",
                unreadCount: 3,
                category: "patient",
                isUnread: true
            },
            {
                id: 2,
                name: "สมศรี รักไทย (ผู้สูงอายุ)",
                avatarType: "text",
                avatarText: "สม",
                status: "offline",
                lastMessage: "ขอบคุณสำหรับคำแนะนำเรื่องอาหารเช้านะคะ",
                time: "09:15",
                unreadCount: 0,
                category: "patient",
                isUnread: false
            },
            {
                id: 3,
                name: "ทีมดูแลผู้สูงอายุ",
                avatarType: "icon",
                avatarIcon: "users",
                avatarColor: "group",
                lastMessage: "ธีรวัฒน์: ประชุมวันที่ 15 ยกเลิกนะครับ",
                time: "เมื่อวาน",
                unreadCount: 12,
                category: "group",
                isUnread: true
            }
        ];

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
                } else if (filter === 'groups') {
                    if (category === 'group') {
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
                console.log(`Loading chat ${chatId} with ${chatName}`);
               
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
                lastMessage.textContent = "พรุ่งนี้จะไปหาคุณตามนัดนะคะ";
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
                const chatList = document.getElementById('chatList');
                chatList.prepend(targetChat);
            }
        }, 5000);
       
        // Initialize with active filter
        filterChats('all');
    </script>
</body>
</html>