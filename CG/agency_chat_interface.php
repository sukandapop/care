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

        /* Chat Detail Styles */
        .chat-detail-container {
            display: none;
            flex-direction: column;
            height: 100%;
        }

        .chat-detail-header {
            background-color: white;
            padding: 15px 20px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .chat-header-left {
            display: flex;
            align-items: center;
        }

        .back-button {
            display: none;
            background: none;
            border: none;
            font-size: 18px;
            margin-right: 15px;
            color: var(--gray-dark);
            cursor: pointer;
        }

        .chat-detail-avatar {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            margin-right: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        .chat-detail-info h2 {
            font-family: 'Kanit', sans-serif;
            font-weight: 500;
            font-size: 18px;
            margin-bottom: 4px;
        }

        .chat-detail-info .status {
            font-size: 13px;
            color: var(--gray-dark);
        }

        .status-text {
            display: flex;
            align-items: center;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            margin-right: 6px;
        }

        /* Chat Header Right - Removed call and video buttons */
        .chat-header-right {
            display: flex;
            gap: 15px;
        }

        .header-icon-btn {
            background: none;
            border: none;
            font-size: 18px;
            color: var(--gray-dark);
            cursor: pointer;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.2s;
        }

        .header-icon-btn:hover {
            background-color: var(--light-color);
        }

        /* Messages Container */
        .messages-container {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .message {
            max-width: 70%;
            padding: 12px 16px;
            border-radius: 18px;
            position: relative;
            word-wrap: break-word;
            line-height: 1.4;
        }

        .message-sent {
            align-self: flex-end;
            background-color: var(--primary-color);
            color: white;
            border-bottom-right-radius: 4px;
        }

        .message-received {
            align-self: flex-start;
            background-color: white;
            color: var(--dark-color);
            border-bottom-left-radius: 4px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        .message-sender {
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 4px;
            color: var(--gray-dark);
        }

        .message-time {
            font-size: 11px;
            margin-top: 6px;
            text-align: right;
            opacity: 0.8;
        }

        .message-received .message-time {
            color: var(--gray-dark);
        }

        .message-sent .message-time {
            color: rgba(255, 255, 255, 0.8);
        }

        /* Message Input Area */
        .message-input-container {
            background-color: white;
            padding: 15px 20px;
            border-top: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .message-input {
            flex: 1;
            padding: 12px 16px;
            border: 1px solid var(--border-color);
            border-radius: 24px;
            font-family: 'Noto Sans Thai', sans-serif;
            font-size: 15px;
            resize: none;
            max-height: 120px;
            transition: border-color 0.3s;
        }

        .message-input:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .input-action-btn {
            background: none;
            border: none;
            font-size: 20px;
            color: var(--gray-medium);
            cursor: pointer;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .input-action-btn:hover {
            background-color: var(--light-color);
            color: var(--dark-color);
        }

        .send-btn {
            background-color: var(--primary-color);
            color: white;
        }

        .send-btn:hover {
            background-color: var(--secondary-color);
            color: white;
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
           
            .back-button {
                display: block;
            }
           
            /* Mobile chat view */
            .main-chat-area.active {
                display: flex;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 100;
            }
           
            .sidebar.active {
                display: none;
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
           
            .messages-container {
                padding: 15px;
            }
           
            .message {
                max-width: 85%;
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
       
        /* Message animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
       
        .message {
            animation: fadeIn 0.3s ease-out;
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
                    <div class="avatar-placeholder user-avatar-bg">ธว</div>
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
       
        <!-- Main Chat Area -->
        <div class="main-chat-area">
            <!-- Empty State (Default) -->
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
           
            <!-- Chat Detail (Hidden by default) -->
            <div class="chat-detail-container" id="chatDetail">
                <!-- Chat Header -->
                <div class="chat-detail-header">
                    <div class="chat-header-left">
                        <button class="back-button" id="backButton">
                            <i class="fas fa-arrow-left"></i>
                        </button>
                        <div class="chat-detail-avatar user-avatar-bg" id="chatAvatar">ศร</div>
                        <div class="chat-detail-info">
                            <h2 id="chatTitle">ศรันย์ ใจดี (ผู้สูงอายุ)</h2>
                            <div class="status">
                                <span class="status-text">
                                    <span class="status-dot status-online"></span>
                                    <span id="chatStatus">ออนไลน์</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <!-- Removed call and video buttons -->
                    <div class="chat-header-right">
                        <button class="header-icon-btn" title="เมนู">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                    </div>
                </div>
               
                <!-- Messages Container -->
                <div class="messages-container" id="messagesContainer">
                    <!-- Messages will be loaded here -->
                    <div class="message message-received">
                        <div class="message-sender">ศรันย์ ใจดี</div>
                        สวัสดีครับคุณธีรวัฒน์
                        <div class="message-time">10:15</div>
                    </div>
                    <div class="message message-received">
                        ขอข้อมูลการนัดพบแพทย์ในวันศุกร์ค่ะ
                        <div class="message-time">10:16</div>
                    </div>
                    <div class="message message-sent">
                        สวัสดีครับคุณศรันย์ นัดพบแพทย์เวลาบ่าย 2 โมงครับ
                        <div class="message-time">10:20</div>
                    </div>
                    <div class="message message-sent">
                        กรุณาเตรียมตัวมาตรงเวลานะครับ
                        <div class="message-time">10:21</div>
                    </div>
                    <div class="message message-received">
                        ขอบคุณมากค่ะ จะเตรียมตัวไปค่ะ
                        <div class="message-time">10:23</div>
                    </div>
                </div>
               
                <!-- Message Input Area -->
                <div class="message-input-container">
                    <button class="input-action-btn" title="เพิ่มไฟล์">
                        <i class="fas fa-plus-circle"></i>
                    </button>
                    <button class="input-action-btn" title="ส่งรูปภาพ">
                        <i class="fas fa-image"></i>
                    </button>
                    <textarea class="message-input" id="messageInput" placeholder="พิมพ์ข้อความ..." rows="1"></textarea>
                    <button class="input-action-btn send-btn" id="sendButton" title="ส่งข้อความ">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // ข้อมูลตัวอย่างสำหรับการสนทนา
        const chatData = {
            1: {
                id: 1,
                name: "ศรันย์ ใจดี (ผู้สูงอายุ)",
                avatarText: "ศร",
                avatarColor: "user-avatar-bg",
                status: "online",
                statusText: "ออนไลน์",
                category: "patient",
                messages: [
                    { sender: "ศรันย์ ใจดี", text: "สวัสดีครับคุณธีรวัฒน์", time: "10:15", type: "received" },
                    { sender: "ศรันย์ ใจดี", text: "ขอข้อมูลการนัดพบแพทย์ในวันศุกร์ค่ะ", time: "10:16", type: "received" },
                    { sender: "คุณ (ธีรวัฒน์)", text: "สวัสดีครับคุณศรันย์ นัดพบแพทย์เวลาบ่าย 2 โมงครับ", time: "10:20", type: "sent" },
                    { sender: "คุณ (ธีรวัฒน์)", text: "กรุณาเตรียมตัวมาตรงเวลานะครับ", time: "10:21", type: "sent" },
                    { sender: "ศรันย์ ใจดี", text: "ขอบคุณมากค่ะ จะเตรียมตัวไปค่ะ", time: "10:23", type: "received" }
                ]
            },
            2: {
                id: 2,
                name: "สมศรี รักไทย (ผู้สูงอายุ)",
                avatarText: "สม",
                avatarColor: "user-avatar-bg",
                status: "offline",
                statusText: "ออฟไลน์ - ใช้งานล่าสุด 2 ชั่วโมงที่แล้ว",
                category: "patient",
                messages: [
                    { sender: "คุณ (ธีรวัฒน์)", text: "สวัสดีครับคุณสมศรี รายการอาหารเช้าสำหรับสัปดาห์นี้ส่งให้แล้วครับ", time: "09:10", type: "sent" },
                    { sender: "สมศรี รักไทย", text: "ขอบคุณสำหรับคำแนะนำเรื่องอาหารเช้านะคะ", time: "09:15", type: "received" },
                    { sender: "สมศรี รักไทย", text: "พรุ่งนี้จะไปหาคุณตามนัดนะคะ", time: "09:16", type: "received" }
                ]
            },
            3: {
                id: 3,
                name: "ทีมดูแลผู้สูงอายุ",
                avatarIcon: "users",
                avatarColor: "group-avatar-bg",
                status: "group",
                statusText: "กลุ่ม - สมาชิก 8 คน",
                category: "group",
                messages: [
                    { sender: "พญ.กรวรรณ", text: "ประชุมวันที่ 15 ยกเลิกนะครับ ตารางงานใหม่จะส่งให้พรุ่งนี้", time: "15:30", type: "received" },
                    { sender: "คุณ (ธีรวัฒน์)", text: "รับทราบครับ ขอบคุณสำหรับการแจ้งเตือน", time: "15:45", type: "sent" },
                    { sender: "นางสาวพรทิพย์", text: "รายงานสุขภาพเดือนมีนาคมส่งให้แล้ว กรุณาตรวจสอบ", time: "16:20", type: "received" },
                    { sender: "นายสมชาย", text: "อุปกรณ์ดูแลผู้สูงอายุชุดใหม่มาถึงแล้ว พร้อมใช้งานวันจันทร์", time: "09:15", type: "received" }
                ]
            },
            4: {
                id: 4,
                name: "พญ.กรวรรณ สุขใจ (CM)",
                avatarText: "พญ",
                avatarColor: "user-avatar-bg",
                status: "online",
                statusText: "ออนไลน์",
                category: "cm",
                messages: [
                    { sender: "พญ.กรวรรณ", text: "ส่งรายงานสุขภาพของศรันย์เรียบร้อยแล้ว", time: "14:30", type: "received" },
                    { sender: "คุณ (ธีรวัฒน์)", text: "ขอบคุณครับ รับทราบแล้ว จะดำเนินการต่อจากนี้", time: "14:45", type: "sent" }
                ]
            },
            5: {
                id: 5,
                name: "สำนักงานหลักประกันสุขภาพ",
                avatarText: "สธ",
                avatarColor: "agency-avatar-bg",
                status: "agency",
                statusText: "หน่วยงานราชการ",
                category: "agency",
                messages: [
                    { sender: "สำนักงานหลักประกันสุขภาพ", text: "เอกสารการอนุมัติส่งให้แล้ว กรุณาตรวจสอบ", time: "10:00", type: "received" },
                    { sender: "คุณ (ธีรวัฒน์)", text: "ขอบคุณครับ เอกสารได้รับเรียบร้อยแล้ว", time: "10:30", type: "sent" }
                ]
            }
        };

        // DOM Elements
        const chatList = document.getElementById('chatList');
        const searchInput = document.getElementById('searchInput');
        const filterButtons = document.querySelectorAll('.filter-btn');
        const chatItems = document.querySelectorAll('.chat-item');
        const emptyChatState = document.querySelector('.empty-chat-state');
        const chatDetail = document.getElementById('chatDetail');
        const messagesContainer = document.getElementById('messagesContainer');
        const chatTitle = document.getElementById('chatTitle');
        const chatAvatar = document.getElementById('chatAvatar');
        const chatStatus = document.getElementById('chatStatus');
        const messageInput = document.getElementById('messageInput');
        const sendButton = document.getElementById('sendButton');
        const backButton = document.getElementById('backButton');
        const mainChatArea = document.querySelector('.main-chat-area');
        const sidebar = document.querySelector('.sidebar');

        // Currently selected chat ID
        let currentChatId = 1;

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
               
                // Load chat messages
                const chatId = this.getAttribute('data-chat-id');
                currentChatId = parseInt(chatId);
                loadChat(chatId);
               
                // For mobile, show chat detail and hide sidebar
                if (window.innerWidth <= 768) {
                    sidebar.classList.add('active');
                    mainChatArea.classList.add('active');
                }
            });
        });
       
        // Load chat function
        function loadChat(chatId) {
            const chat = chatData[chatId];
           
            if (!chat) {
                console.error(`Chat ${chatId} not found`);
                return;
            }
           
            // Update chat header
            chatTitle.textContent = chat.name;
            chatStatus.textContent = chat.statusText;
           
            // Update avatar
            chatAvatar.textContent = chat.avatarText || "";
            chatAvatar.className = `chat-detail-avatar ${chat.avatarColor}`;
           
            // Update status dot
            const statusDot = document.querySelector('.status-dot');
            statusDot.className = 'status-dot';
           
            if (chat.status === 'online') {
                statusDot.classList.add('status-online');
            } else if (chat.status === 'offline') {
                statusDot.classList.add('status-offline');
            } else if (chat.status === 'busy') {
                statusDot.classList.add('status-busy');
            } else {
                statusDot.classList.add('status-offline');
            }
           
            // Load messages
            messagesContainer.innerHTML = '';
           
            chat.messages.forEach(message => {
                const messageElement = document.createElement('div');
                messageElement.className = `message message-${message.type}`;
               
                let messageContent = '';
                if (message.type === 'received' && message.sender) {
                    messageContent += `<div class="message-sender">${message.sender}</div>`;
                }
               
                messageContent += `${message.text}`;
                messageContent += `<div class="message-time">${message.time}</div>`;
               
                messageElement.innerHTML = messageContent;
                messagesContainer.appendChild(messageElement);
            });
           
            // Scroll to bottom of messages
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
           
            // Show chat detail and hide empty state
            emptyChatState.style.display = 'none';
            chatDetail.style.display = 'flex';
        }
       
        // Send message function
        function sendMessage() {
            const text = messageInput.value.trim();
           
            if (!text) return;
           
            // Create new message element
            const messageElement = document.createElement('div');
            messageElement.className = 'message message-sent';
           
            const now = new Date();
            const timeString = `${now.getHours().toString().padStart(2, '0')}:${now.getMinutes().toString().padStart(2, '0')}`;
           
            messageElement.innerHTML = `
                ${text}
                <div class="message-time">${timeString}</div>
            `;
           
            messagesContainer.appendChild(messageElement);
           
            // Clear input
            messageInput.value = '';
            messageInput.style.height = 'auto';
           
            // Scroll to bottom
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
           
            // Update chat list preview for current chat
            updateChatPreview(text, timeString);
           
            // Simulate reply after 1-3 seconds
            setTimeout(() => {
                simulateReply();
            }, 1000 + Math.random() * 2000);
        }
       
        // Update chat preview in sidebar
        function updateChatPreview(message, time) {
            const currentChatItem = document.querySelector(`.chat-item[data-chat-id="${currentChatId}"]`);
           
            if (currentChatItem) {
                const lastMessage = currentChatItem.querySelector('.last-message');
                const timeElement = currentChatItem.querySelector('.chat-time');
               
                lastMessage.textContent = message.length > 30 ? message.substring(0, 30) + "..." : message;
                timeElement.textContent = time;
               
                // Move to top of list
                const chatList = document.getElementById('chatList');
                chatList.prepend(currentChatItem);
            }
        }
       
        // Simulate a reply from the other person
        function simulateReply() {
            const replies = [
                "ขอบคุณสำหรับข้อมูล",
                "รับทราบแล้วค่ะ",
                "เข้าใจแล้วครับ",
                "จะตรวจสอบให้ค่ะ",
                "ขอบคุณมากนะคะ"
            ];
           
            const randomReply = replies[Math.floor(Math.random() * replies.length)];
           
            const chat = chatData[currentChatId];
            const senderName = chat.name.split(' ')[0];
           
            const messageElement = document.createElement('div');
            messageElement.className = 'message message-received';
           
            const now = new Date();
            const timeString = `${now.getHours().toString().padStart(2, '0')}:${now.getMinutes().toString().padStart(2, '0')}`;
           
            messageElement.innerHTML = `
                <div class="message-sender">${senderName}</div>
                ${randomReply}
                <div class="message-time">${timeString}</div>
            `;
           
            messagesContainer.appendChild(messageElement);
           
            // Scroll to bottom
            messagesContainer.scrollTop = messagesContainer.scrollHeight;
           
            // Update chat list preview
            const currentChatItem = document.querySelector(`.chat-item[data-chat-id="${currentChatId}"]`);
            if (currentChatItem) {
                const lastMessage = currentChatItem.querySelector('.last-message');
                const timeElement = currentChatItem.querySelector('.chat-time');
               
                lastMessage.textContent = randomReply;
                timeElement.textContent = timeString;
               
                // Mark as unread
                if (!currentChatItem.classList.contains('active')) {
                    currentChatItem.classList.add('unread');
                    lastMessage.classList.add('unread');
                   
                    // Add unread badge if not exists
                    if (!currentChatItem.querySelector('.unread-badge')) {
                        const chatPreview = currentChatItem.querySelector('.chat-preview');
                        const unreadBadge = document.createElement('div');
                        unreadBadge.className = 'unread-badge';
                        unreadBadge.textContent = '1';
                        chatPreview.appendChild(unreadBadge);
                    }
                }
               
                // Move to top of list
                const chatList = document.getElementById('chatList');
                chatList.prepend(currentChatItem);
            }
        }
       
        // Event listeners
        sendButton.addEventListener('click', sendMessage);
       
        messageInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                sendMessage();
            }
        });
       
        // Auto-resize textarea
        messageInput.addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = (this.scrollHeight) + 'px';
        });
       
        // Back button for mobile
        backButton.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                sidebar.classList.remove('active');
                mainChatArea.classList.remove('active');
            }
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
       
        // Initialize with active filter and load first chat
        filterChats('all');
        loadChat(currentChatId);
       
        // Add menu functionality
        const menuButton = document.querySelector('.header-icon-btn');
        menuButton.addEventListener('click', function() {
            // In a real app, this would show a dropdown menu
            alert('เมนูการตั้งค่าการสนทนา');
        });
    </script>
</body>
</html>