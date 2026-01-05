<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การสนทนา - ผู้สูงอายุป่วยติดเตียง</title>
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
        
        :root {
            --primary-color: #4a90e2;
            --primary-light: #e6f0ff;
            --secondary-color: #2ecc71;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
            --light-color: #f9f9f9;
            --dark-color: #333333;
            --gray-light: #e9ecef;
            --gray-medium: #adb5bd;
            --gray-dark: #666666;
            --border-color: #dee2e6;
            --card-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --card-shadow-hover: 0 8px 12px rgba(0, 0, 0, 0.15);
        }

        html, body {
            height: 100%;
            width: 100%;
            overflow: hidden;
        }

        body {
            font-family: 'Sukhumvit Set', 'Kanit', Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }

        .app-container {
            display: flex;
            height: 100vh;
            width: 100vw;
            max-width: 1400px;
            margin: 0 auto;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 380px;
            background-color: white;
            border-right: 1px solid var(--border-color);
            display: flex;
            flex-direction: column;
            overflow: hidden;
            height: 100%;
        }

        /* Header Styles */
        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid var(--border-color);
            background-color: white;
            z-index: 10;
            flex-shrink: 0;
        }

        .user-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--primary-color);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 22px;
            margin-right: 15px;
        }

        .user-details h2 {
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 4px;
            color: var(--dark-color);
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
            font-family: 'Sukhumvit Set', 'Kanit', Arial, sans-serif;
            font-size: 14px;
            background-color: var(--light-color);
            transition: all 0.3s;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary-color);
            background-color: white;
            box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.1);
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
            min-height: 0;
        }

        .chat-list-header {
            padding: 15px 20px 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-shrink: 0;
        }

        .chat-list-title {
            font-weight: 600;
            font-size: 16px;
            color: var(--gray-dark);
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
            background-color: rgba(74, 144, 226, 0.05);
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

        .family-avatar-bg {
            background-color: var(--secondary-color);
        }

        .volunteer-avatar-bg {
            background-color: #e67e22;
        }

        .cm-avatar-bg {
            background-color: var(--primary-color);
        }

        .agency-avatar-bg {
            background-color: #9b59b6;
        }

        .chat-info {
            flex-grow: 1;
            min-width: 0;
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
            background-color: var(--secondary-color);
        }

        .status-offline {
            background-color: var(--gray-medium);
        }

        .status-busy {
            background-color: var(--danger-color);
        }

        .status-away {
            background-color: var(--warning-color);
        }

        /* Main Chat Area Styles */
        .main-chat-area {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: #f0f2f5;
            height: 100%;
            overflow: hidden;
        }

        /* Chat Window Styles (Initially hidden) */
        .chat-window {
            display: none;
            flex-direction: column;
            height: 100%;
            width: 100%;
        }

        /* Chat Header */
        .chat-header-bar {
            background-color: white;
            padding: 15px 20px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
        }

        .chat-contact-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .chat-contact-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        .chat-contact-details h3 {
            font-weight: 600;
            font-size: 18px;
            margin-bottom: 3px;
        }

        .chat-contact-status {
            font-size: 13px;
            color: var(--gray-dark);
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .chat-actions {
            display: flex;
            gap: 15px;
        }

        .chat-action-btn {
            background: none;
            border: none;
            color: var(--gray-dark);
            font-size: 20px;
            cursor: pointer;
            transition: color 0.2s;
        }

        .chat-action-btn:hover {
            color: var(--primary-color);
        }

        /* Chat Messages Area */
        .chat-messages {
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
        }

        .message-incoming {
            align-self: flex-start;
            background-color: white;
            border-bottom-left-radius: 5px;
        }

        .message-outgoing {
            align-self: flex-end;
            background-color: var(--primary-color);
            color: white;
            border-bottom-right-radius: 5px;
        }

        .message-time {
            font-size: 11px;
            margin-top: 5px;
            opacity: 0.7;
            text-align: right;
        }

        .message-incoming .message-time {
            color: var(--gray-dark);
        }

        .message-outgoing .message-time {
            color: rgba(255, 255, 255, 0.8);
        }

        /* Chat Input Area */
        .chat-input-area {
            padding: 15px 20px;
            background-color: white;
            border-top: 1px solid var(--border-color);
            display: flex;
            gap: 10px;
            flex-shrink: 0;
        }

        .chat-input {
            flex: 1;
            padding: 12px 15px;
            border: 1px solid var(--border-color);
            border-radius: 25px;
            font-family: 'Sukhumvit Set', 'Kanit', Arial, sans-serif;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s;
        }

        .chat-input:focus {
            border-color: var(--primary-color);
        }

        .send-button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .send-button:hover {
            background-color: #3a7bc8;
        }

        /* Empty Chat State */
        .empty-chat-state {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
            width: 100%;
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
            font-size: 24px;
            margin-bottom: 10px;
            color: var(--gray-dark);
        }

        .empty-chat-message {
            max-width: 400px;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        /* Mobile Back Button */
        .mobile-back-btn {
            display: none;
            background: none;
            border: none;
            font-size: 20px;
            color: var(--primary-color);
            cursor: pointer;
            margin-right: 10px;
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
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                z-index: 100;
            }
           
            .main-chat-area.active {
                display: flex;
            }

            .mobile-back-btn {
                display: block;
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

            .chat-messages {
                padding: 15px;
            }

            .chat-input-area {
                padding: 12px 15px;
            }

            .chat-header-bar {
                padding: 12px 15px;
            }
        }

        /* Animation for new messages */
        @keyframes highlightNew {
            0% { background-color: rgba(74, 144, 226, 0.1); }
            100% { background-color: transparent; }
        }

        .new-message {
            animation: highlightNew 2s ease-out;
        }

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

<?php include 'navbar.php'   ?>

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
                </div>
               
                <ul class="chat-list" id="chatList">
                    <!-- ลูกสาว -->
                    <li class="chat-item active unread" data-chat-id="1" data-category="family" data-contact-name="สมหญิง (ลูกสาว)" data-avatar-color="family">
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
                    <li class="chat-item" data-chat-id="2" data-category="family" data-contact-name="สมชาย (ลูกชาย)" data-avatar-color="family">
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
                    <li class="chat-item" data-chat-id="3" data-category="volunteer" data-contact-name="อสม. สมหมาย" data-avatar-color="volunteer">
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
                    <li class="chat-item" data-chat-id="4" data-category="cm" data-contact-name="พญ. กรวรรณ สุขใจ" data-avatar-color="cm">
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
                    <li class="chat-item" data-chat-id="5" data-category="agency" data-contact-name="สำนักงานหลักประกันสุขภาพ" data-avatar-color="agency">
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
                    <li class="chat-item unread" data-chat-id="6" data-category="volunteer" data-contact-name="อสม. สมร" data-avatar-color="volunteer">
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
                    <li class="chat-item" data-chat-id="7" data-category="agency" data-contact-name="โรงพยาบาลใกล้บ้าน" data-avatar-color="agency">
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
                    <li class="chat-item" data-chat-id="8" data-category="family" data-contact-name="กลุ่มครอบครัว" data-avatar-color="family">
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
       
        <!-- Main Chat Area -->
        <div class="main-chat-area" id="mainChatArea">
            <!-- Empty State (Initially visible) -->
            <div class="empty-chat-state" id="emptyChatState">
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

            <!-- Chat Window (Initially hidden) -->
            <div class="chat-window" id="chatWindow">
                <!-- Chat Header -->
                <div class="chat-header-bar">
                    <div class="chat-contact-info">
                        <!-- Mobile back button -->
                        <button class="mobile-back-btn" id="mobileBackBtn">
                            <i class="fas fa-arrow-left"></i>
                        </button>
                        <div class="chat-contact-avatar" id="chatContactAvatar">
                            สม
                        </div>
                        <div class="chat-contact-details">
                            <h3 id="chatContactName">สมหญิง (ลูกสาว)</h3>
                            <div class="chat-contact-status" id="chatContactStatus">
                                <div class="status-indicator status-online"></div>
                                <span>ออนไลน์</span>
                            </div>
                        </div>
                    </div>
                    <!-- Removed call and video buttons, only menu button remains -->
                    <div class="chat-actions">
                        <button class="chat-action-btn" title="เมนู">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                    </div>
                </div>

                <!-- Chat Messages -->
                <div class="chat-messages" id="chatMessages">
                    <!-- Messages will be dynamically inserted here -->
                    <div class="message message-incoming">
                        <p>พ่อสบายดีไหมคะ วันนี้รู้สึกอย่างไรบ้าง</p>
                        <div class="message-time">10:23</div>
                    </div>
                    <div class="message message-outgoing">
                        <p>วันนี้รู้สึกดีขึ้นเล็กน้อย แต่ยังปวดหลังอยู่บ้าง</p>
                        <div class="message-time">10:25</div>
                    </div>
                    <div class="message message-incoming">
                        <p>ดีใจจังค่ะ เดี๋ยวเย็นนี้จะเอาข้าวมาให้กินนะคะ</p>
                        <div class="message-time">10:26</div>
                    </div>
                    <div class="message message-outgoing">
                        <p>ขอบใจมากเลยลูก</p>
                        <div class="message-time">10:27</div>
                    </div>
                </div>

                <!-- Chat Input -->
                <div class="chat-input-area">
                    <input type="text" class="chat-input" id="chatInput" placeholder="พิมพ์ข้อความ..." autocomplete="off">
                    <button class="send-button" id="sendButton">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // DOM Elements
        const chatList = document.getElementById('chatList');
        const searchInput = document.getElementById('searchInput');
        const chatItems = document.querySelectorAll('.chat-item');
        const emptyChatState = document.getElementById('emptyChatState');
        const chatWindow = document.getElementById('chatWindow');
        const chatMessages = document.getElementById('chatMessages');
        const chatInput = document.getElementById('chatInput');
        const sendButton = document.getElementById('sendButton');
        const mainChatArea = document.getElementById('mainChatArea');
        const mobileBackBtn = document.getElementById('mobileBackBtn');
        const chatContactName = document.getElementById('chatContactName');
        const chatContactAvatar = document.getElementById('chatContactAvatar');
        const chatContactStatus = document.getElementById('chatContactStatus');

        // Chat data for each contact
        const chatData = {
            1: {
                name: "สมหญิง (ลูกสาว)",
                avatarColor: "family",
                status: "online",
                statusText: "ออนไลน์",
                messages: [
                    { type: "incoming", text: "พ่อสบายดีไหมคะ วันนี้รู้สึกอย่างไรบ้าง", time: "10:23" },
                    { type: "outgoing", text: "วันนี้รู้สึกดีขึ้นเล็กน้อย แต่ยังปวดหลังอยู่บ้าง", time: "10:25" },
                    { type: "incoming", text: "ดีใจจังค่ะ เดี๋ยวเย็นนี้จะเอาข้าวมาให้กินนะคะ", time: "10:26" },
                    { type: "outgoing", text: "ขอบใจมากเลยลูก", time: "10:27" }
                ]
            },
            2: {
                name: "สมชาย (ลูกชาย)",
                avatarColor: "family",
                status: "away",
                statusText: "ไม่อยู่",
                messages: [
                    { type: "incoming", text: "เย็นนี้จะเอาข้าวมาฝากครับ", time: "09:15" },
                    { type: "outgoing", text: "ดีจังเลย มีข้าวเหนียวหมูปิ้งด้วยไหม", time: "09:16" },
                    { type: "incoming", text: "มีแน่นอนครับ จะซื้อมาฝาก", time: "09:17" }
                ]
            },
            3: {
                name: "อสม. สมหมาย",
                avatarColor: "volunteer",
                status: "online",
                statusText: "ออนไลน์",
                messages: [
                    { type: "incoming", text: "พรุ่งนี้จะแวะไปวัดความดันให้นะครับ", time: "เมื่อวาน" },
                    { type: "outgoing", text: "ขอบคุณมากนะครับ", time: "เมื่อวาน" }
                ]
            },
            4: {
                name: "พญ. กรวรรณ สุขใจ",
                avatarColor: "cm",
                status: "busy",
                statusText: "ไม่ว่าง",
                messages: [
                    { type: "incoming", text: "ส่งรายงานสุขภาพประจำสัปดาห์แล้ว", time: "เมื่อวาน" },
                    { type: "outgoing", text: "ขอบคุณครับ รับทราบแล้ว", time: "เมื่อวาน" }
                ]
            },
            5: {
                name: "สำนักงานหลักประกันสุขภาพ",
                avatarColor: "agency",
                status: "offline",
                statusText: "ออฟไลน์",
                messages: [
                    { type: "incoming", text: "ขอข้อมูลเพิ่มเติมสำหรับการต่ออายุบัตร", time: "25 มี.ค." },
                    { type: "outgoing", text: "ต้องส่งเอกสารอะไรบ้างคะ", time: "25 มี.ค." }
                ]
            }
        };

        // Function to load chat messages
        function loadChatMessages(chatId) {
            chatMessages.innerHTML = '';
            
            if (chatData[chatId]) {
                const data = chatData[chatId];
                
                data.messages.forEach(msg => {
                    const messageDiv = document.createElement('div');
                    messageDiv.className = `message message-${msg.type}`;
                    
                    messageDiv.innerHTML = `
                        <p>${msg.text}</p>
                        <div class="message-time">${msg.time}</div>
                    `;
                    
                    chatMessages.appendChild(messageDiv);
                });
                
                // Scroll to bottom
                chatMessages.scrollTop = chatMessages.scrollHeight;
            } else {
                // Default message if no chat data
                const messageDiv = document.createElement('div');
                messageDiv.className = 'message message-incoming';
                messageDiv.innerHTML = `
                    <p>สวัสดีค่ะ มีอะไรให้ช่วยไหมคะ</p>
                    <div class="message-time">${new Date().getHours().toString().padStart(2, '0')}:${new Date().getMinutes().toString().padStart(2, '0')}</div>
                `;
                chatMessages.appendChild(messageDiv);
            }
        }

        // Function to update chat header
        function updateChatHeader(chatId, contactName, avatarColor, status, statusText) {
            chatContactName.textContent = contactName;
            
            // Set avatar color
            chatContactAvatar.className = 'chat-contact-avatar';
            if (avatarColor === 'family') {
                chatContactAvatar.style.backgroundColor = 'var(--secondary-color)';
            } else if (avatarColor === 'volunteer') {
                chatContactAvatar.style.backgroundColor = '#e67e22';
            } else if (avatarColor === 'cm') {
                chatContactAvatar.style.backgroundColor = 'var(--primary-color)';
            } else if (avatarColor === 'agency') {
                chatContactAvatar.style.backgroundColor = '#9b59b6';
            }
            
            // Set avatar text (first character of name)
            const firstChar = contactName.charAt(0);
            chatContactAvatar.textContent = firstChar;
            
            // Update status
            const statusIndicator = chatContactStatus.querySelector('.status-indicator');
            statusIndicator.className = 'status-indicator';
            statusIndicator.classList.add(`status-${status}`);
            
            const statusTextSpan = chatContactStatus.querySelector('span');
            statusTextSpan.textContent = statusText;
        }

        // Function to open chat
        function openChat(chatId, contactName, avatarColor, status = 'online', statusText = 'ออนไลน์') {
            // Hide empty state, show chat window
            emptyChatState.style.display = 'none';
            chatWindow.style.display = 'flex';
            
            // Update chat header and load messages
            updateChatHeader(chatId, contactName, avatarColor, status, statusText);
            loadChatMessages(chatId);
            
            // For mobile, show main chat area
            if (window.innerWidth <= 768) {
                mainChatArea.classList.add('active');
            }
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
               
                // Get chat data
                const chatId = this.getAttribute('data-chat-id');
                const contactName = this.getAttribute('data-contact-name');
                const avatarColor = this.getAttribute('data-avatar-color');
               
                // Get status from chat status element
                const statusElement = this.querySelector('.chat-status');
                let status = 'online';
                let statusText = 'ออนไลน์';
                
                if (statusElement) {
                    if (statusElement.classList.contains('status-online')) {
                        status = 'online';
                        statusText = 'ออนไลน์';
                    } else if (statusElement.classList.contains('status-away')) {
                        status = 'away';
                        statusText = 'ไม่อยู่';
                    } else if (statusElement.classList.contains('status-busy')) {
                        status = 'busy';
                        statusText = 'ไม่ว่าง';
                    } else if (statusElement.classList.contains('status-offline')) {
                        status = 'offline';
                        statusText = 'ออฟไลน์';
                    }
                }
               
                // Open the chat
                openChat(chatId, contactName, avatarColor, status, statusText);
            });
        });

        // Send message function
        function sendMessage() {
            const messageText = chatInput.value.trim();
            
            if (messageText) {
                // Create outgoing message
                const messageDiv = document.createElement('div');
                messageDiv.className = 'message message-outgoing';
                
                const now = new Date();
                const timeString = `${now.getHours().toString().padStart(2, '0')}:${now.getMinutes().toString().padStart(2, '0')}`;
                
                messageDiv.innerHTML = `
                    <p>${messageText}</p>
                    <div class="message-time">${timeString}</div>
                `;
                
                chatMessages.appendChild(messageDiv);
                chatInput.value = '';
                
                // Scroll to bottom
                chatMessages.scrollTop = chatMessages.scrollHeight;
                
                // Simulate reply after 1 second
                setTimeout(() => {
                    const replyDiv = document.createElement('div');
                    replyDiv.className = 'message message-incoming';
                    
                    // Simple auto-reply based on message content
                    let replyText = "ได้รับข้อความแล้วค่ะ";
                    
                    if (messageText.includes('ขอบคุณ') || messageText.includes('ขอบใจ')) {
                        replyText = "ด้วยความยินดีค่ะ";
                    } else if (messageText.includes('สบายดี') || messageText.includes('เป็นอย่างไร')) {
                        replyText = "ดีใจที่ได้ยินเช่นนั้นค่ะ";
                    } else if (messageText.includes('หิว') || messageText.includes('อาหาร')) {
                        replyText = "เดี๋ยวจัดอาหารให้ค่ะ";
                    }
                    
                    replyDiv.innerHTML = `
                        <p>${replyText}</p>
                        <div class="message-time">${now.getHours().toString().padStart(2, '0')}:${(now.getMinutes() + 1).toString().padStart(2, '0')}</div>
                    `;
                    
                    chatMessages.appendChild(replyDiv);
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }, 1000);
            }
        }

        // Send button click
        sendButton.addEventListener('click', sendMessage);

        // Enter key to send message
        chatInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                sendMessage();
            }
        });

        // Mobile back button
        mobileBackBtn.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
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
    </script>
</body>
</html>