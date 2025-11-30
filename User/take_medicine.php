<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบบันทึกการรับประทานยา - Care Connect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&family=Noto+Sans+Thai:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Noto Sans Thai', sans-serif;
            background: linear-gradient(135deg, #f0f7ff 0%, #e6f2ff 100%);
            color: #333;
            width: 100%;
            margin: 0 auto;
            padding: 20px;
        }

        .medication-container {
            width: 100%;
            margin: 0 auto;
            background: white;
            border-radius: 20px;
            margin-top: 2rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .medication-header {
            background: linear-gradient(135deg, #5d98ff 0%, #2d5fc5 100%);
            color: white;
            padding: 25px 30px;
            text-align: center;
        }

        .page-title {
            font-family: 'Kanit', sans-serif;
            font-weight: 600;
            font-size: 2rem;
            margin-bottom: 5px;
        }

        .current-date {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .timeline-container {
            padding: 30px 20px;
        }

        .timeline {
            position: relative;
            max-width: 700px;
            margin: 0 auto;
        }

        .timeline::after {
            content: '';
            position: absolute;
            width: 4px;
            background: #e0e0e0;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -2px;
            border-radius: 10px;
        }

        .timeline-item {
            padding: 10px 40px;
            position: relative;
            width: 50%;
            box-sizing: border-box;
            margin-bottom: 30px;
        }

        .timeline-item::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background: #5d98ff;
            border: 4px solid white;
            top: 20px;
            border-radius: 50%;
            z-index: 1;
            box-shadow: 0 0 0 4px #5d98ff;
        }

        .left {
            left: 0;
        }

        .right {
            left: 50%;
        }

        .left::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            right: 30px;
            border: medium solid white;
            border-width: 10px 0 10px 10px;
            border-color: transparent transparent transparent white;
        }

        .right::before {
            content: " ";
            height: 0;
            position: absolute;
            top: 22px;
            width: 0;
            z-index: 1;
            left: 30px;
            border: medium solid white;
            border-width: 10px 10px 10px 0;
            border-color: transparent white transparent transparent;
        }

        .right::after {
            left: -10px;
        }

        .time-period {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .time-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            font-size: 1.5rem;
            color: white;
            flex-shrink: 0;
        }

        .morning .time-icon {
            background: linear-gradient(135deg, #FFD166 0%, #ffb347 100%);
        }

        .afternoon .time-icon {
            background: linear-gradient(135deg, #06D6A0 0%, #06b884 100%);
        }

        .evening .time-icon {
            background: linear-gradient(135deg, #118AB2 0%, #0d6e8f 100%);
        }

        .time-label {
            font-family: 'Kanit', sans-serif;
            font-weight: 600;
            font-size: 1.3rem;
            color: #2d5fc5;
        }

        .medication-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border-left: 5px solid #5d98ff;
            transition: all 0.3s ease;
        }

        .medication-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-family: 'Kanit', sans-serif;
            font-weight: 600;
            color: #2d5fc5;
            margin-bottom: 15px;
            font-size: 1.2rem;
        }

        .medication-detail {
            margin-bottom: 10px;
            display: flex;
            flex-wrap: wrap;
        }

        .detail-label {
            font-weight: 600;
            color: #555;
            min-width: 80px;
        }

        .detail-value {
            color: #333;
            flex: 1;
        }

        .status-badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
            margin-top: 10px;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-taken {
            background: #d1ecf1;
            color: #0c5460;
        }

        .status-missed {
            background: #f8d7da;
            color: #721c24;
        }

        .action-button {
            background: #5d98ff;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 8px 15px;
            font-family: 'Kanit', sans-serif;
            font-weight: 500;
            margin-top: 15px;
            transition: all 0.3s ease;
            width: 100%;
        }

        .action-button:hover {
            background: #2d5fc5;
            transform: translateY(-2px);
        }

        .action-button.taken {
            background: #06D6A0;
        }

        .footer-note {
            background: #f8f9fa;
            padding: 20px 30px;
            text-align: center;
            border-top: 1px solid #eaeaea;
        }

        .note-item {
            margin-bottom: 10px;
            color: #666;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .note-item i {
            color: #5d98ff;
            margin-right: 10px;
        }

        /* Mobile Styles */
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }
            
            .medication-container {
                border-radius: 15px;
            }
            
            .medication-header {
                padding: 20px 15px;
            }
            
            .page-title {
                font-size: 1.7rem;
            }
            
            .current-date {
                font-size: 1rem;
            }
            
            .timeline-container {
                padding: 20px 15px;
            }
            
            .timeline::after {
                left: 31px;
            }

            .timeline-item {
                width: 100%;
                padding-left: 70px;
                padding-right: 15px;
            }

            .timeline-item::before {
                left: 60px;
                border: medium solid white;
                border-width: 10px 10px 10px 0;
                border-color: transparent white transparent transparent;
            }

            .left::before, .right::before {
                left: 60px;
                border-width: 10px 10px 10px 0;
                border-color: transparent white transparent transparent;
            }

            .left::after, .right::after {
                left: 21px;
            }

            .right {
                left: 0;
            }
            
            .time-period {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .time-icon {
                margin-bottom: 10px;
            }
            
            .time-label {
                font-size: 1.1rem;
            }
            
            .medication-card {
                padding: 15px;
            }
            
            .card-title {
                font-size: 1.1rem;
            }
            
            .medication-detail {
                flex-direction: column;
            }
            
            .detail-label {
                min-width: auto;
                margin-bottom: 5px;
            }
            
            .footer-note {
                padding: 15px;
            }
        }

        /* Small Mobile Styles */
        @media (max-width: 576px) {
            .page-title {
                font-size: 1.5rem;
            }
            
            .current-date {
                font-size: 0.9rem;
            }
            
            .timeline-item {
                padding-left: 60px;
                padding-right: 10px;
            }
            
            .timeline-item::after {
                width: 16px;
                height: 16px;
                top: 18px;
            }
            
            .time-icon {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
            }
            
            .time-label {
                font-size: 1rem;
            }
            
            .card-title {
                font-size: 1rem;
            }
            
            .medication-card {
                padding: 12px;
            }
            
            .action-button {
                padding: 10px;
                font-size: 0.9rem;
            }
            
            .note-item {
                font-size: 0.9rem;
            }
        }

        /* Large Screen Styles */
        @media (min-width: 1200px) {
            .medication-container {
                max-width: 1000px;
            }
            
            .timeline-container {
                padding: 40px 30px;
            }
        }

        /* Tablet Styles */
        @media (min-width: 769px) and (max-width: 1024px) {
            .timeline-container {
                padding: 30px 25px;
            }
            
            .timeline-item {
                padding: 10px 35px;
            }
        }
    </style>
</head>
<body>

<?php include 'navbar.php'; ?>

    <div class="medication-container">
        <!-- Header -->
        <div class="medication-header">
            <h1 class="page-title">รายการรับประทานยา</h1>
            <div class="current-date">วันจันทร์ ที่ 16 กุมภาพันธ์ 2568</div>
        </div>

        <!-- Timeline -->
        <div class="timeline-container">
            <div class="timeline">
                <!-- Morning Medication -->
                <div class="timeline-item left">
                    <div class="time-period morning">
                        <div class="time-icon">
                            <i class="fas fa-sun"></i>
                        </div>
                        <div class="time-label">ช่วงเช้า (08:00 น.)</div>
                    </div>
                    <div class="medication-card">
                        <h3 class="card-title">รายการยาช่วงเช้า</h3>
                        <div class="medication-detail">
                            <span class="detail-label">ชื่อยา:</span>
                            <span class="detail-value">Paracetamol 500 mg.</span>
                        </div>
                        <div class="medication-detail">
                            <span class="detail-label">ขนาด:</span>
                            <span class="detail-value">1 เม็ด หลังอาหาร</span>
                        </div>
                        <div class="medication-detail">
                            <span class="detail-label">หมายเหตุ:</span>
                            <span class="detail-value">สำหรับลดไข้และบรรเทาปวด</span>
                        </div>
                        <span class="status-badge status-taken">รับประทานแล้ว</span>
                        <button class="action-button taken" disabled>
                            <i class="fas fa-check-circle"></i> รับประทานแล้ว
                        </button>
                    </div>
                </div>

                <!-- Afternoon Medication -->
                <div class="timeline-item right">
                    <div class="time-period afternoon">
                        <div class="time-icon">
                            <i class="fas fa-cloud-sun"></i>
                        </div>
                        <div class="time-label">ช่วงเที่ยง (12:00 น.)</div>
                    </div>
                    <div class="medication-card">
                        <h3 class="card-title">รายการยาช่วงเที่ยง</h3>
                        <div class="medication-detail">
                            <span class="detail-label">ชื่อยา:</span>
                            <span class="detail-value">Amoxicillin 250 mg.</span>
                        </div>
                        <div class="medication-detail">
                            <span class="detail-label">ขนาด:</span>
                            <span class="detail-value">1 เม็ด หลังอาหาร</span>
                        </div>
                        <div class="medication-detail">
                            <span class="detail-label">หมายเหตุ:</span>
                            <span class="detail-value">ยาปฏิชีวนะ ต้องรับประทานให้ครบ</span>
                        </div>
                        <span class="status-badge status-pending">รอรับประทาน</span>
                        <button class="action-button">
                            <i class="fas fa-pills"></i> ยืนยันการรับประทานยา
                        </button>
                    </div>
                </div>

                <!-- Evening Medication -->
                <div class="timeline-item left">
                    <div class="time-period evening">
                        <div class="time-icon">
                            <i class="fas fa-moon"></i>
                        </div>
                        <div class="time-label">ช่วงเย็น (18:00 น.)</div>
                    </div>
                    <div class="medication-card">
                        <h3 class="card-title">รายการยาช่วงเย็น</h3>
                        <div class="medication-detail">
                            <span class="detail-label">ชื่อยา:</span>
                            <span class="detail-value">Loratadine 10 mg.</span>
                        </div>
                        <div class="medication-detail">
                            <span class="detail-label">ขนาด:</span>
                            <span class="detail-value">1 เม็ด ก่อนนอน</span>
                        </div>
                        <div class="medication-detail">
                            <span class="detail-label">หมายเหตุ:</span>
                            <span class="detail-value">ยาแก้แพ้ อาจทำให้ง่วงนอน</span>
                        </div>
                        <span class="status-badge status-pending">รอรับประทาน</span>
                        <button class="action-button">
                            <i class="fas fa-pills"></i> ยืนยันการรับประทานยา
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer-note">
            <div class="note-item">
                <i class="fas fa-bell"></i>
                <span>กรุณากินยาให้ตรงเวลา</span>
            </div>
            <div class="note-item">
                <i class="fas fa-shield-alt"></i>
                <span>ระบบแจ้งเตือนการกินยา</span>
            </div>
        </div>
    </div>
<?php include 'bottom_nav.php' ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ฟังก์ชันสำหรับยืนยันการรับประทานยา
        document.querySelectorAll('.action-button:not(.taken)').forEach(button => {
            button.addEventListener('click', function() {
                const card = this.closest('.medication-card');
                const statusBadge = card.querySelector('.status-badge');
                
                // เปลี่ยนสถานะเป็นรับประทานแล้ว
                statusBadge.textContent = 'รับประทานแล้ว';
                statusBadge.className = 'status-badge status-taken';
                
                // เปลี่ยนปุ่ม
                this.innerHTML = '<i class="fas fa-check-circle"></i> รับประทานแล้ว';
                this.className = 'action-button taken';
                this.disabled = true;
                
                // แสดงการแจ้งเตือน
                showNotification('บันทึกการรับประทานยาเรียบร้อยแล้ว!');
                
                // ตรวจสอบว่ายาทั้งหมดรับประทานครบหรือยัง
                checkAllMedicationsTaken();
            });
        });
        
        // ฟังก์ชันตรวจสอบว่ายาทั้งหมดรับประทานครบหรือยัง
        function checkAllMedicationsTaken() {
            const pendingMeds = document.querySelectorAll('.status-pending');
            if (pendingMeds.length === 0) {
                // แสดงข้อความเมื่อรับประทานยาครบทั้งหมด
                setTimeout(() => {
                    showNotification('ยินดีด้วย! คุณรับประทานยาครบทั้งหมดสำหรับวันนี้แล้ว');
                }, 500);
            }
        }
        
        // ฟังก์ชันแสดงการแจ้งเตือน
        function showNotification(message) {
            // สร้าง element สำหรับการแจ้งเตือน
            const notification = document.createElement('div');
            notification.className = 'alert alert-success position-fixed';
            notification.style.top = '20px';
            notification.style.right = '20px';
            notification.style.zIndex = '1050';
            notification.style.minWidth = '300px';
            notification.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="fas fa-check-circle me-2"></i>
                    <span>${message}</span>
                </div>
            `;
            
            // เพิ่มการแจ้งเตือนเข้าไปใน body
            document.body.appendChild(notification);
            
            // ลบการแจ้งเตือนหลังจาก 3 วินาที
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
        
        // จำลองการแจ้งเตือนตามเวลาจริง
        function checkMedicationTime() {
            const now = new Date();
            const currentHour = now.getHours();
            let timePeriod = '';
            
            // เช็คว่าตอนนี้เป็นช่วงเวลาใด
            if (currentHour >= 8 && currentHour < 12) {
                timePeriod = 'เช้า';
            } else if (currentHour >= 12 && currentHour < 18) {
                timePeriod = 'เที่ยง';
            } else if (currentHour >= 18 || currentHour < 8) {
                timePeriod = 'เย็น';
            }
            
            // แสดงการแจ้งเตือนถ้าถึงเวลากินยา
            if (timePeriod && !localStorage.getItem(`notification-${timePeriod}-${now.toDateString()}`)) {
                const pendingButton = document.querySelector(`.${timePeriod} .action-button:not(.taken)`);
                if (pendingButton) {
                    showNotification(`ถึงเวลารับประทานยาช่วง${timePeriod}แล้ว`);
                    localStorage.setItem(`notification-${timePeriod}-${now.toDateString()}`, 'shown');
                }
            }
        }
        
        // เรียกฟังก์ชันตรวจสอบเวลาเมื่อโหลดหน้า
        checkMedicationTime();
        
        // ตั้งเวลาให้ตรวจสอบทุกชั่วโมง
        setInterval(checkMedicationTime, 60 * 60 * 1000);
        
        // สำหรับอุปกรณ์เคลื่อนที่: เพิ่มการตรวจจับการสลับ orientation
        window.addEventListener('orientationchange', function() {
            // รีเฟรชวิวพอร์ตเพื่อป้องกันปัญหาเลย์เอาต์
            setTimeout(function() {
                window.scrollTo(0, 0);
            }, 100);
        });
    </script>
</body>
</html>