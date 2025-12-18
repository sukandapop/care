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
        :root {
            --primary: #4361ee;
            --secondary: #3a56d4;
            --success: #06D6A0;
            --warning: #FFD166;
            --danger: #EF476F;
            --info: #118AB2;
            --light: #f8f9fa;
            --dark: #212529;
            --skybule: #0d6efd;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Noto Sans Thai', sans-serif;
            background: linear-gradient(135deg, #f0f7ff 0%, #e6f2ff 100%);
            min-height: 100vh;
        }

        .main-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 15px;
        }

        /* Header Section */
        .medication-header {
            background: linear-gradient(135deg, var(--skybule) 0%, var(--skybule) 100%);
            color: white;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(55, 175, 255, 0.3);
            margin-bottom: 20px;
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        .page-title {
            font-family: 'Kanit', sans-serif;
            font-weight: 700;
            font-size: 1.8rem;
            margin-bottom: 5px;
            line-height: 1.3;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 1.2rem;
            font-weight: 600;
        }

        .user-details h4 {
            font-family: 'Kanit', sans-serif;
            margin: 0;
            font-size: 1rem;
            line-height: 1.3;
        }

        .user-details p {
            margin: 0;
            opacity: 0.9;
            font-size: 0.85rem;
        }

        /* Today's Summary */
        .today-summary {
            margin-bottom: 25px;
        }

        .summary-card {
            background: white;
            border-radius: 12px;
            padding: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            display: flex;
            align-items: center;
            gap: 12px;
            transition: transform 0.3s;
            height: 100%;
            margin-bottom: 15px;
        }

        .summary-card:hover {
            transform: translateY(-3px);
        }

        .summary-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            flex-shrink: 0;
        }

        .summary-icon.morning { background: linear-gradient(135deg, #FFD166 0%, #FFB347 100%); }
        .summary-icon.afternoon { background: linear-gradient(135deg, #06D6A0 0%, #00B894 100%); }
        .summary-icon.evening { background: linear-gradient(135deg, #118AB2 0%, #0D6E8F 100%); }
        .summary-icon.total { background: linear-gradient(135deg, #7209B7 0%, #5A0A8C 100%); }

        .summary-content h3 {
            font-family: 'Kanit', sans-serif;
            font-size: 1.4rem;
            margin: 0;
            color: var(--dark);
            line-height: 1.2;
        }

        .summary-content p {
            margin: 5px 0 0;
            color: #666;
            font-size: 0.85rem;
        }

        /* Main Content Layout */
        .content-wrapper {
            margin-bottom: 30px;
        }

        /* Timeline Section */
        .timeline-section {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
        }

        .section-title {
            font-family: 'Kanit', sans-serif;
            font-size: 1.3rem;
            color: var(--primary);
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 2px solid #f0f0f0;
            display: flex;
            align-items: center;
        }

        .timeline-item {
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f0f0f0;
        }

        .timeline-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .time-badge {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }

        .time-circle {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Kanit', sans-serif;
            font-weight: 600;
            font-size: 0.9rem;
            flex-shrink: 0;
        }

        .time-label {
            font-family: 'Kanit', sans-serif;
            color: var(--primary);
            font-weight: 500;
            font-size: 0.9rem;
        }

        .medication-info {
            flex: 1;
        }

        .medication-header-row {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-bottom: 15px;
        }

        .medication-name {
            font-family: 'Kanit', sans-serif;
            font-size: 1.1rem;
            color: var(--dark);
            margin: 0;
            line-height: 1.3;
        }

        .medication-status {
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 500;
            width: fit-content;
        }

        .status-taken {
            background: #d4edda;
            color: #155724;
        }

        .status-pending {
            background: #fff3cd;
            color: #856404;
        }

        .status-missed {
            background: #f8d7da;
            color: #721c24;
        }

        .medication-details {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 15px;
        }

        .detail-row {
            display: flex;
            flex-direction: column;
            margin-bottom: 8px;
        }

        .detail-row:last-child {
            margin-bottom: 0;
        }

        .detail-label {
            color: #666;
            font-weight: 500;
            font-size: 0.85rem;
            margin-bottom: 2px;
        }

        .detail-value {
            color: var(--dark);
            font-size: 0.9rem;
            line-height: 1.4;
        }

        .action-buttons {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .action-btn {
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-family: 'Kanit', sans-serif;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 0.9rem;
        }

        .action-btn.taken {
            background: var(--success);
            color: white;
        }

        .action-btn.taken:hover {
            background: #05b58b;
        }

        .action-btn.take {
            background: var(--primary);
            color: white;
        }

        .action-btn.take:hover {
            background: var(--secondary);
        }

        .action-btn.snooze {
            background: var(--warning);
            color: #333;
        }

        .action-btn.snooze:hover {
            background: #ffc747;
        }

        /* Medication Details Section */
        .details-section {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
        }

        .details-table {
            width: 100%;
            border-collapse: collapse;
        }

        .details-table th {
            background: #f8f9fa;
            padding: 12px;
            text-align: left;
            font-family: 'Kanit', sans-serif;
            color: var(--primary);
            font-weight: 600;
            border-bottom: 2px solid #e0e0e0;
            font-size: 0.9rem;
        }

        .details-table td {
            padding: 12px;
            border-bottom: 1px solid #f0f0f0;
            vertical-align: top;
            font-size: 0.85rem;
        }

        .details-table tr:hover {
            background: #f8f9fa;
        }

        .medication-cell {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .med-icon {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .med-info h5 {
            font-family: 'Kanit', sans-serif;
            margin: 0;
            font-size: 0.9rem;
            line-height: 1.2;
        }

        .med-info p {
            margin: 3px 0 0;
            color: #666;
            font-size: 0.8rem;
        }

        /* Footer Section */
        .medication-footer {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            margin-top: 20px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 15px;
        }

        @media (min-width: 768px) {
            .footer-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 992px) {
            .footer-grid {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        .footer-card {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 15px;
            background: #f8f9fa;
            border-radius: 10px;
            transition: all 0.3s;
        }

        .footer-card:hover {
            background: #e9ecef;
            transform: translateY(-3px);
        }

        .footer-icon {
            width: 45px;
            height: 45px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            color: white;
            flex-shrink: 0;
        }

        .footer-icon.info { background: var(--info); }
        .footer-icon.warning { background: var(--warning); color: #333; }
        .footer-icon.success { background: var(--success); }

        .footer-content h5 {
            font-family: 'Kanit', sans-serif;
            margin: 0;
            font-size: 0.9rem;
        }

        .footer-content p {
            margin: 5px 0 0;
            color: #666;
            font-size: 0.8rem;
        }

        /* Responsive Design */
        @media (max-width: 576px) {
            .main-container {
                padding: 10px;
            }
            
            .medication-header {
                padding: 15px;
                border-radius: 12px;
            }
            
            .header-content {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .user-info {
                flex-direction: column;
                text-align: center;
            }
            
            .page-title {
                font-size: 1.5rem;
            }
            
            .timeline-section,
            .details-section,
            .medication-footer {
                padding: 15px;
                border-radius: 12px;
            }
            
            .section-title {
                font-size: 1.2rem;
            }
            
            .time-badge {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
            
            .medication-header-row {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .detail-row {
                flex-direction: column;
            }
            
            .action-buttons {
                flex-direction: column;
            }
            
            .action-btn {
                width: 100%;
            }
        }

        @media (min-width: 768px) {
            .action-buttons {
                flex-direction: row;
            }
            
            .medication-header-row {
                flex-direction: row;
                justify-content: space-between;
                align-items: center;
            }
            
            .detail-row {
                flex-direction: row;
            }
            
            .detail-label {
                min-width: 100px;
            }
        }

        @media (min-width: 992px) {
            .main-container {
                padding: 20px;
            }
            
            .page-title {
                font-size: 2rem;
            }
            
            .time-badge {
                flex-direction: column;
                gap: 10px;
                margin-bottom: 0;
                width: 80px;
            }
            
            .timeline-item {
                display: flex;
                gap: 20px;
            }
        }

        /* Custom Bootstrap overrides */
        .table-responsive {
            border-radius: 10px;
            overflow: hidden;
        }
        
        .btn {
            font-family: 'Kanit', sans-serif;
            font-weight: 500;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="main-container">
        <!-- Header Section -->
        <div class="medication-header">
            <div class="header-content">
                <div class="text-center text-md-start">
                    <h1 class="page-title">ระบบบันทึกการรับประทานยา</h1>
                    <p class="mb-0">วันที่ 16 กุมภาพันธ์ 2568</p>
                </div>
                <div class="user-info">
                    <div class="user-avatar">ด</div>
                    <div class="user-details text-center text-md-start">
                        <h4>คุณดวงฤดี ชลปัญญา</h4>
                        <p>ผู้ดูแลในครอบครัว</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Today's Summary -->
        <div class="today-summary">
            <div class="row g-3">
                <div class="col-6 col-md-3">
                    <div class="summary-card">
                        <div class="summary-icon morning">
                            <i class="fas fa-sun"></i>
                        </div>
                        <div class="summary-content">
                            <h3>2</h3>
                            <p>ยาช่วงเช้า</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-6 col-md-3">
                    <div class="summary-card">
                        <div class="summary-icon afternoon">
                            <i class="fas fa-cloud-sun"></i>
                        </div>
                        <div class="summary-content">
                            <h3>1</h3>
                            <p>ยาช่วงเที่ยง</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-6 col-md-3">
                    <div class="summary-card">
                        <div class="summary-icon evening">
                            <i class="fas fa-moon"></i>
                        </div>
                        <div class="summary-content">
                            <h3>2</h3>
                            <p>ยาช่วงเย็น</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-6 col-md-3">
                    <div class="summary-card">
                        <div class="summary-icon total">
                            <i class="fas fa-pills"></i>
                        </div>
                        <div class="summary-content">
                            <h3>5</h3>
                            <p>ยาทั้งหมดวันนี้</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="content-wrapper">
            <!-- Timeline Section -->
            <div class="timeline-section">
                <h2 class="section-title"><i class="fas fa-clock me-2"></i>เวลารับประทานยาวันนี้</h2>
                
                <!-- Morning Medication -->
                <div class="timeline-item">
                    <div class="time-badge">
                        <div class="time-circle">08:00</div>
                        <div class="time-label">ช่วงเช้า</div>
                    </div>
                    <div class="medication-info">
                        <div class="medication-header-row">
                            <h3 class="medication-name">Paracetamol 500 mg.</h3>
                            <span class="medication-status status-taken">รับประทานแล้ว</span>
                        </div>
                        <div class="medication-details">
                            <div class="detail-row">
                                <span class="detail-label">ขนาดยา:</span>
                                <span class="detail-value">1 เม็ด หลังอาหารเช้า</span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label">วัตถุประสงค์:</span>
                                <span class="detail-value">ลดไข้และบรรเทาปวด</span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label">คำเตือน:</span>
                                <span class="detail-value">ควรรับประทานหลังอาหารเพื่อป้องกันการระคายเคืองกระเพาะ</span>
                            </div>
                        </div>
                        <div class="action-buttons">
                            <button class="action-btn taken" disabled>
                                <i class="fas fa-check-circle"></i> รับประทานแล้ว
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Afternoon Medication -->
                <div class="timeline-item">
                    <div class="time-badge">
                        <div class="time-circle">12:00</div>
                        <div class="time-label">ช่วงเที่ยง</div>
                    </div>
                    <div class="medication-info">
                        <div class="medication-header-row">
                            <h3 class="medication-name">Amoxicillin 250 mg.</h3>
                            <span class="medication-status status-pending">รอรับประทาน</span>
                        </div>
                        <div class="medication-details">
                            <div class="detail-row">
                                <span class="detail-label">ขนาดยา:</span>
                                <span class="detail-value">1 เม็ด หลังอาหารเที่ยง</span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label">วัตถุประสงค์:</span>
                                <span class="detail-value">ยาปฏิชีวนะรักษาการติดเชื้อ</span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label">คำเตือน:</span>
                                <span class="detail-value">ต้องรับประทานให้ครบตามกำหนดแม้อาการจะดีขึ้นแล้ว</span>
                            </div>
                        </div>
                        <div class="action-buttons">
                            <button class="action-btn take">
                                <i class="fas fa-pills"></i> ยืนยันการรับประทาน
                            </button>
                            <button class="action-btn snooze">
                                <i class="fas fa-clock"></i> เลื่อน 15 นาที
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Evening Medication -->
                <div class="timeline-item">
                    <div class="time-badge">
                        <div class="time-circle">18:00</div>
                        <div class="time-label">ช่วงเย็น</div>
                    </div>
                    <div class="medication-info">
                        <div class="medication-header-row">
                            <h3 class="medication-name">Loratadine 10 mg.</h3>
                            <span class="medication-status status-pending">รอรับประทาน</span>
                        </div>
                        <div class="medication-details">
                            <div class="detail-row">
                                <span class="detail-label">ขนาดยา:</span>
                                <span class="detail-value">1 เม็ด ก่อนนอน</span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label">วัตถุประสงค์:</span>
                                <span class="detail-value">ยาแก้แพ้ ลดน้ำมูก คันตา</span>
                            </div>
                            <div class="detail-row">
                                <span class="detail-label">คำเตือน:</span>
                                <span class="detail-value">อาจทำให้เกิดอาการง่วงนอน หลีกเลี่ยงการขับขี่ยานพาหนะ</span>
                            </div>
                        </div>
                        <div class="action-buttons">
                            <button class="action-btn take">
                                <i class="fas fa-pills"></i> ยืนยันการรับประทาน
                            </button>
                            <button class="action-btn snooze">
                                <i class="fas fa-clock"></i> เลื่อน 15 นาที
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Medication Details Section -->
                <div class="details-section mt-4">
                    <h2 class="section-title"><i class="fas fa-list-alt me-2"></i>รายละเอียดยาทั้งหมด</h2>
                    
                    <div class="table-responsive">
                        <table class="details-table">
                            <thead>
                                <tr>
                                    <th>ชื่อยา</th>
                                    <th>เวลา</th>
                                    <th>สถานะ</th>
                                    <th>รายละเอียด</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="medication-cell">
                                            <div class="med-icon" style="background: #4361ee;">
                                                <i class="fas fa-pills"></i>
                                            </div>
                                            <div class="med-info">
                                                <h5>Paracetamol</h5>
                                                <p>500 mg. - ลดไข้</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>08:00 น.</td>
                                    <td><span class="medication-status status-taken">รับประทานแล้ว</span></td>
                                    <td>หลังอาหารเช้า, รับประทานเมื่อ 08:15 น.</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="medication-cell">
                                            <div class="med-icon" style="background: #06D6A0;">
                                                <i class="fas fa-prescription-bottle-alt"></i>
                                            </div>
                                            <div class="med-info">
                                                <h5>Amoxicillin</h5>
                                                <p>250 mg. - ยาปฏิชีวนะ</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>12:00 น.</td>
                                    <td><span class="medication-status status-pending">รอรับประทาน</span></td>
                                    <td>หลังอาหารเที่ยง, จำนวนคงเหลือ 12 เม็ด</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="medication-cell">
                                            <div class="med-icon" style="background: #7209B7;">
                                                <i class="fas fa-allergies"></i>
                                            </div>
                                            <div class="med-info">
                                                <h5>Loratadine</h5>
                                                <p>10 mg. - แก้แพ้</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>18:00 น.</td>
                                    <td><span class="medication-status status-pending">รอรับประทาน</span></td>
                                    <td>ก่อนนอน, อาจทำให้ง่วงนอน</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="medication-cell">
                                            <div class="med-icon" style="background: #FFD166;">
                                                <i class="fas fa-heartbeat"></i>
                                            </div>
                                            <div class="med-info">
                                                <h5>Amlodipine</h5>
                                                <p>5 mg. - ลดความดัน</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>20:00 น.</td>
                                    <td><span class="medication-status status-taken">รับประทานแล้ว</span></td>
                                    <td>หลังอาหารเย็น, รับประทานเมื่อ 20:10 น.</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="medication-cell">
                                            <div class="med-icon" style="background: #EF476F;">
                                                <i class="fas fa-capsules"></i>
                                            </div>
                                            <div class="med-info">
                                                <h5>Metformin</h5>
                                                <p>500 mg. - ควบคุมน้ำตาล</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>21:00 น.</td>
                                    <td><span class="medication-status status-missed">เลยเวลา</span></td>
                                    <td>ก่อนนอน, ควรรับประทานตามเวลาอย่างเคร่งครัด</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Section -->
        <div class="medication-footer">
            <h2 class="section-title"><i class="fas fa-info-circle me-2"></i>คำแนะนำและการแจ้งเตือน</h2>
            
            <div class="footer-grid">
                <div class="footer-card">
                    <div class="footer-icon info">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="footer-content">
                        <h5>การแจ้งเตือน</h5>
                        <p>ระบบจะแจ้งเตือนก่อนเวลารับประทานยา 15 นาที</p>
                    </div>
                </div>
                
                <div class="footer-card">
                    <div class="footer-icon warning">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="footer-content">
                        <h5>คำเตือน</h5>
                        <p>กรุณารับประทานยาตรงเวลาและตามคำแนะนำของแพทย์</p>
                    </div> 
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ฟังก์ชันสำหรับยืนยันการรับประทานยา
        document.querySelectorAll('.action-btn.take').forEach(button => {
            button.addEventListener('click', function() {
                const medicationInfo = this.closest('.medication-info');
                const statusSpan = medicationInfo.querySelector('.medication-status');
                const medicationName = medicationInfo.querySelector('.medication-name').textContent;
                
                // เปลี่ยนสถานะเป็นรับประทานแล้ว
                statusSpan.textContent = 'รับประทานแล้ว';
                statusSpan.className = 'medication-status status-taken';
                
                // เปลี่ยนปุ่มเป็น "รับประทานแล้ว" และปิดการใช้งาน
                const actionButtons = medicationInfo.querySelector('.action-buttons');
                actionButtons.innerHTML = `
                    <button class="action-btn taken" disabled>
                        <i class="fas fa-check-circle"></i> รับประทานแล้ว
                    </button>
                `;
                
                // เพิ่มรายละเอียดเวลาที่รับประทาน
                const detailsDiv = medicationInfo.querySelector('.medication-details');
                const timeDetail = document.createElement('div');
                timeDetail.className = 'detail-row';
                timeDetail.innerHTML = `
                    <span class="detail-label">เวลารับประทาน:</span>
                    <span class="detail-value">${new Date().toLocaleTimeString('th-TH', {hour: '2-digit', minute:'2-digit'})}</span>
                `;
                detailsDiv.appendChild(timeDetail);
                
                // อัพเดตตารางรายละเอียด
                updateMedicationTable(medicationName, 'taken');
                
                // แสดงการแจ้งเตือน
                showNotification(`บันทึกการรับประทานยา ${medicationName} เรียบร้อยแล้ว!`);
                
                // ตรวจสอบว่ายาทั้งหมดรับประทานครบหรือยัง
                checkAllMedicationsTaken();
            });
        });
        
        // ฟังก์ชันเลื่อนเวลา
        document.querySelectorAll('.action-btn.snooze').forEach(button => {
            button.addEventListener('click', function() {
                const medicationInfo = this.closest('.medication-info');
                const medicationName = medicationInfo.querySelector('.medication-name').textContent;
                
                showNotification(`เลื่อนการแจ้งเตือนสำหรับยา ${medicationName} ออกไป 15 นาที`);
                
                // อัพเดตเวลาบนปุ่ม (ในระบบจริงอาจอัพเดตเวลาจริง)
                const timeCircle = medicationInfo.closest('.timeline-item').querySelector('.time-circle');
                const currentTime = timeCircle.textContent;
                const [hours, minutes] = currentTime.split(':').map(Number);
                let newMinutes = minutes + 15;
                let newHours = hours;
                
                if (newMinutes >= 60) {
                    newMinutes -= 60;
                    newHours += 1;
                }
                
                const newTime = `${newHours.toString().padStart(2, '0')}:${newMinutes.toString().padStart(2, '0')}`;
                timeCircle.textContent = newTime;
                
                // แสดงเวลาที่เลื่อนแล้ว
                const detailsDiv = medicationInfo.querySelector('.medication-details');
                let snoozeDetail = detailsDiv.querySelector('.snooze-detail');
                
                if (!snoozeDetail) {
                    snoozeDetail = document.createElement('div');
                    snoozeDetail.className = 'detail-row snooze-detail';
                    detailsDiv.appendChild(snoozeDetail);
                }
                
                snoozeDetail.innerHTML = `
                    <span class="detail-label">เลื่อนเวลา:</span>
                    <span class="detail-value">เลื่อนจาก ${currentTime} เป็น ${newTime}</span>
                `;
            });
        });
        
        // ฟังก์ชันอัพเดตตารางรายละเอียด
        function updateMedicationTable(medicationName, status) {
            const tableRows = document.querySelectorAll('.details-table tbody tr');
            
            tableRows.forEach(row => {
                const nameCell = row.querySelector('.med-info h5');
                if (nameCell && nameCell.textContent.includes(medicationName.split(' ')[0])) {
                    const statusCell = row.querySelector('.medication-status');
                    if (status === 'taken') {
                        statusCell.textContent = 'รับประทานแล้ว';
                        statusCell.className = 'medication-status status-taken';
                        
                        // อัพเดตรายละเอียดเพิ่มเติม
                        const detailCell = row.cells[3];
                        const currentTime = new Date().toLocaleTimeString('th-TH', {hour: '2-digit', minute:'2-digit'});
                        detailCell.textContent += `, รับประทานเมื่อ ${currentTime} น.`;
                    }
                }
            });
        }
        
        // ฟังก์ชันตรวจสอบว่ายาทั้งหมดรับประทานครบหรือยัง
        function checkAllMedicationsTaken() {
            const pendingMeds = document.querySelectorAll('.status-pending, .status-missed');
            if (pendingMeds.length === 0) {
                setTimeout(() => {
                    showNotification('ยินดีด้วย! คุณรับประทานยาครบทั้งหมดสำหรับวันนี้แล้ว', 'success');
                }, 500);
            }
        }
        
        // ฟังก์ชันแสดงการแจ้งเตือน (ปรับปรุงสำหรับมือถือ)
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `alert alert-${type === 'success' ? 'success' : 'info'} position-fixed`;
            notification.style.top = '20px';
            notification.style.right = '20px';
            notification.style.left = '20px';
            notification.style.zIndex = '1050';
            notification.style.boxShadow = '0 5px 15px rgba(0,0,0,0.2)';
            notification.style.borderRadius = '10px';
            notification.style.padding = '15px';
            notification.innerHTML = `
                <div class="d-flex align-items-center">
                    <i class="fas ${type === 'success' ? 'fa-check-circle' : 'fa-info-circle'} me-2"></i>
                    <span style="font-size: 0.9rem;">${message}</span>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.opacity = '0';
                notification.style.transition = 'opacity 0.5s';
                setTimeout(() => notification.remove(), 500);
            }, 3000);
        }
        
        // จำลองการแจ้งเตือนตามเวลาจริง
        function simulateMedicationAlerts() {
            const now = new Date();
            const currentTime = now.getHours() * 100 + now.getMinutes();
            
            // เช็คว่าตอนนี้เป็นช่วงเวลาใกล้เคียงกับการกินยาหรือไม่
            if (currentTime >= 800 && currentTime <= 815) {
                showNotification('ถึงเวลารับประทานยาช่วงเช้าแล้ว', 'warning');
            } else if (currentTime >= 1200 && currentTime <= 1215) {
                showNotification('ถึงเวลารับประทานยาช่วงเที่ยงแล้ว', 'warning');
            } else if (currentTime >= 1800 && currentTime <= 1815) {
                showNotification('ถึงเวลารับประทานยาช่วงเย็นแล้ว', 'warning');
            }
        }
        
        // เรียกฟังก์ชันจำลองการแจ้งเตือนเมื่อโหลดหน้า
        simulateMedicationAlerts();
        
        // ตั้งเวลาให้ตรวจสอบทุก 5 นาที
        setInterval(simulateMedicationAlerts, 5 * 60 * 1000);
    </script>
</body>
</html>