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
            background-color: var(--gray-light);
            color: var(--dark-color);
            line-height: 1.6;
            height: 100vh;
            overflow: hidden;
        }

        .app-container {
            display: flex;
            height: 100vh;
            max-width: 1600px;
            margin: 0 auto;
            background-color: white;
            box-shadow: var(--card-shadow);
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

        .sidebar-header {
            padding: 20px;
            border-bottom: 1px solid var(--border-color);
            background-color: white;
        }

        .user-info {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .user-details h2 {
            font-family: 'Kanit', sans-serif;
            font-weight: 500;
            font-size: 18px;
            margin-bottom: 4px;
        }

        .user-details .role {
            font-size: 12px;
            background-color: var(--primary-light);
            color: var(--primary-color);
            padding: 2px 10px;
            border-radius: 20px;
            display: inline-block;
        }

        .search-container {
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 10px 40px 10px 15px;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-family: inherit;
            background-color: var(--light-color);
        }

        /* Chat List Items */
        .chat-list-container {
            flex: 1;
            overflow-y: auto;
        }

        .chat-item {
            padding: 15px 20px;
            border-bottom: 1px solid var(--border-color);
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: background 0.2s;
            position: relative;
        }

        .chat-item:hover { background-color: var(--light-color); }
        .chat-item.active {
            background-color: var(--primary-light);
            border-left: 4px solid var(--primary-color);
        }

        .avatar-placeholder {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            margin-right: 15px;
            flex-shrink: 0;
        }

        .user-avatar-bg { background-color: var(--primary-color); }
        .group-avatar-bg { background-color: var(--success-color); }

        .chat-info { flex: 1; min-width: 0; }
        .chat-name { font-weight: 600; font-size: 15px; }
        .last-message { font-size: 13px; color: var(--gray-dark); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .unread-badge {
            background-color: var(--danger-color);
            color: white;
            font-size: 11px;
            padding: 2px 7px;
            border-radius: 10px;
            margin-left: 5px;
        }

        /* Main Chat Area (Right Side) */
        .main-chat-area {
            flex: 1;
            display: flex;
            flex-direction: column;
            background-color: #f0f2f5;
        }

        /* Chat Header */
        .chat-window-header {
            padding: 15px 25px;
            background-color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid var(--border-color);
            box-shadow: 0 2px 5px rgba(0,0,0,0.02);
        }

        /* Messages Area */
        .messages-container {
            flex: 1;
            padding: 20px;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .msg { max-width: 70%; padding: 10px 15px; border-radius: 15px; font-size: 14px; position: relative; }
        .msg-received {
            background-color: white;
            align-self: flex-start;
            border-bottom-left-radius: 2px;
            box-shadow: var(--card-shadow);
        }
        .msg-sent {
            background-color: var(--primary-color);
            color: white;
            align-self: flex-end;
            border-bottom-right-radius: 2px;
        }
        .msg-time { font-size: 10px; margin-top: 5px; opacity: 0.7; display: block; text-align: right; }

        /* Input Area */
        .chat-input-area {
            padding: 20px;
            background-color: white;
            border-top: 1px solid var(--border-color);
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .input-box {
            flex: 1;
            padding: 12px 15px;
            border: 1px solid var(--border-color);
            border-radius: 25px;
            outline: none;
            background-color: var(--light-color);
        }

        .send-btn {
            background-color: var(--primary-color);
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.2s;
        }
        .send-btn:hover { transform: scale(1.05); background-color: var(--secondary-color); }

        /* Empty State */
        .empty-chat-state {
            display: flex; flex-direction: column; align-items: center; justify-content: center;
            height: 100%; color: var(--gray-medium);
        }
    </style>
</head>
<body>
    <div class="app-container">
        <div class="sidebar">
            <div class="sidebar-header">
                <div class="user-info">
                    <div class="user-details">
                        <h2>ธีรวัฒน์ จิตต์เมตตา</h2>
                        <span class="role">Case Manager</span>
                    </div>
                </div>
                <div class="search-container">
                    <input type="text" class="search-input" placeholder="ค้นหาการสนทนา..." id="searchInput">
                    <i class="fas fa-search" style="position: absolute; right: 15px; top: 12px; color: var(--gray-medium);"></i>
                </div>
            </div>
            
            <div class="chat-list-container">
                <ul class="chat-list" id="chatList">
                    <li class="chat-item active" data-chat-id="1">
                        <div class="avatar-placeholder user-avatar-bg">ศร</div>
                        <div class="chat-info">
                            <div style="display: flex; justify-content: space-between;">
                                <span class="chat-name">ศรันย์ ใจดี (ผู้สูงอายุ)</span>
                                <span style="font-size: 11px; color: var(--gray-dark);">10:23</span>
                            </div>
                            <p class="last-message">ขอข้อมูลการนัดพบแพทย์ในวันศุกร์ค่ะ</p>
                        </div>
                        <span class="unread-badge">3</span>
                    </li>
                    <li class="chat-item" data-chat-id="2">
                        <div class="avatar-placeholder user-avatar-bg">สม</div>
                        <div class="chat-info">
                            <span class="chat-name">สมศรี รักไทย</span>
                            <p class="last-message">ขอบคุณสำหรับคำแนะนำค่ะ</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="main-chat-area" id="mainChat">
            <div class="chat-window-header">
                <div style="display: flex; align-items: center; gap: 15px;">
                    <div class="avatar-placeholder user-avatar-bg" style="width: 40px; height: 40px;">ศร</div>
                    <div>
                        <h3 style="font-size: 16px; font-family: 'Kanit';">ศรันย์ ใจดี (ผู้สูงอายุ)</h3>
                        <span style="font-size: 12px; color: var(--success-color);">● กำลังออนไลน์</span>
                    </div>
                </div>
                <div style="color: var(--gray-dark); display: flex; gap: 20px; font-size: 18px; cursor: pointer;">
                    <i class="fas fa-phone-alt"></i>
                    <i class="fas fa-video"></i>
                    <i class="fas fa-info-circle"></i>
                </div>
            </div>

            <div class="messages-container" id="msgContainer">
                <div class="msg msg-received">
                    สวัสดีครับ ผม CM ผู้จัดการผู้สูงอายุประจำพื้นที่ มีอะไรให้ช่วยเหลือไหมครับ?
                    <span class="msg-time">10:00</span>
                </div>
                <div class="msg msg-sent">
                    สวัสดีค่ะ อยากสอบถามเกี่ยวกับการนัดตรวจสุขภาพที่โรงพยาบาลค่ะ
                    <span class="msg-time">10:02</span>
                </div>
                <div class="msg msg-received">
                    ตอนนี้มีนัดตรวจสุขภาพวันที่ 15 นี้ เวลา 09:00 น. ที่โรงพยาบาลใกล้บ้านครับ
                    <span class="msg-time">10:03</span>
                </div>
                <div class="msg msg-received">
                    ต้องการให้จัดรถรับส่งด้วยไหมครับ?
                    <span class="msg-time">10:03</span>
                </div>
                <div class="msg msg-sent">
                    ต้องการค่ะ ขอบคุณมากค่ะ
                    <span class="msg-time">10:04</span>
                </div>
            </div>

            <div class="chat-input-area">
                <i class="far fa-plus-square" style="font-size: 20px; color: var(--gray-dark); cursor: pointer;"></i>
                <i class="far fa-image" style="font-size: 20px; color: var(--gray-dark); cursor: pointer;"></i>
                <input type="text" class="input-box" placeholder="พิมพ์ข้อความของคุณที่นี่...">
                <button class="send-btn">
                    <i class="fas fa-paper-plane"></i>
                </button>
            </div>
        </div>
    </div>

    <script>
        // ฟังก์ชันเบื้องต้นสำหรับการเลือกแชท
        document.querySelectorAll('.chat-item').forEach(item => {
            item.addEventListener('click', function() {
                document.querySelectorAll('.chat-item').forEach(i => i.classList.remove('active'));
                this.classList.add('active');
            });
        });
    </script>
</body>
</html>