<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบนัดหมาย - Care Connect</title>
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
            background-color: #f8f9fa;
            color: #333;
        }

       

        .appointment-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px 20px;
        }

        .page-title {
            font-family: 'Kanit', sans-serif;
            font-weight: 600;
            color: #2d5fc5;
            margin-bottom: 10px;
        }

        .page-subtitle {
            color: #666;
            margin-bottom: 30px;
        }

     /* Calendar Section */
.calendar-section {
    background: white;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    margin-bottom: 20px;
    overflow-x: auto; /* เพิ่มสำหรับ horizontal scroll */
    -webkit-overflow-scrolling: touch; /* สำหรับ scroll ที่ลื่นในมือถือ */
}

.calendar-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    padding: 0 10px;
    min-width: 350px; /* ป้องกัน header เล็กลงเกินไป */
}

.month-year {
    font-family: 'Kanit', sans-serif;
    font-size: 1.3rem;
    color: var(--primary);
    margin: 0;
}

.calendar-controls {
    display: flex;
    gap: 10px;
}

.calendar-controls button {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    background: var(--light);
    border: none;
    color: var(--primary);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s;
}

.calendar-controls button:hover {
    background: var(--primary);
    color: white;
}

.calendar-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 350px; /* ขั้นต่ำของตาราง */
}

.calendar-table thead {
    background: #f8f9fa;
}

.calendar-table th {
    padding: 12px 8px;
    text-align: center;
    font-family: 'Kanit', sans-serif;
    color: var(--primary);
    font-weight: 600;
    font-size: 0.85rem;
    border-bottom: 2px solid #e0e0e0;
    min-width: 40px;
}

.calendar-table td {
    padding: 8px;
    text-align: center;
    vertical-align: top;
    height: 60px;
    border: 1px solid #f0f0f0;
    position: relative;
}

.day-number {
    font-family: 'Kanit', sans-serif;
    font-size: 0.9rem;
    font-weight: 500;
    margin-bottom: 5px;
    color: var(--dark);
}

/* สีสำหรับวันที่ไม่ใช่เดือนปัจจุบัน */
.calendar-table td:first-child .day-number,
.calendar-table td:last-child .day-number {
    color: #adb5bd;
}

.appointment-indicator {
    position: absolute;
    bottom: 5px;
    left: 0;
    right: 0;
    display: flex;
    justify-content: center;
    gap: 3px;
    flex-wrap: wrap;
}

.appointment-dot {
    width: 6px;
    height: 6px;
    border-radius: 50%;
}

.appointment-dot.consultation {
    background: var(--primary);
}

.appointment-dot.home-visit {
    background: var(--success);
}

.appointment-dot.follow-up {
    background: var(--warning);
}

.appointment-dot.urgent {
    background: var(--danger);
}

/* สำหรับหน้าจอขนาดเล็ก */
@media (max-width: 576px) {
    .calendar-section {
        padding: 15px;
        border-radius: 12px;
        margin-left: -10px;
        margin-right: -10px;
        border-radius: 0;
    }
    
    .calendar-header {
        padding: 0 5px;
        margin-bottom: 15px;
    }
    
    .month-year {
        font-size: 1.1rem;
    }
    
    .calendar-table th {
        padding: 8px 4px;
        font-size: 0.75rem;
        min-width: 35px;
    }
    
    .calendar-table td {
        padding: 4px;
        height: 50px;
    }
    
    .day-number {
        font-size: 0.8rem;
    }
    
    .appointment-dot {
        width: 5px;
        height: 5px;
    }
}

        .appointment-dot.consultation {
            background: #ff9a9e;
        }

        .appointment-dot.home-visit {
            background: #5d98ff;
        }

        .appointment-dot.follow-up {
            background: #6cce6c;
        }

        .appointment-dot.urgent {
            background: #ff6b6b;
        }

        .appointments-list {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .section-title {
            font-family: 'Kanit', sans-serif;
            font-weight: 600;
            color: #2d5fc5;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #f1f6ff;
        }

        .appointment-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            margin-bottom: 20px;
            transition: all 0.3s ease;
            overflow: hidden;
        }

        .appointment-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        .appointment-header {
            padding: 15px 20px;
            border-bottom: 1px solid #f1f1f1;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .appointment-date {
            font-family: 'Kanit', sans-serif;
            font-weight: 600;
            color: #2d5fc5;
            font-size: 1.1rem;
        }

        .appointment-type {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .appointment-type.consultation {
            background: #ffeaea;
            color: #ff6b6b;
        }

        .appointment-type.home-visit {
            background: #e6f0ff;
            color: #5d98ff;
        }

        .appointment-type.follow-up {
            background: #e6f7e6;
            color: #28a745;
        }

        .appointment-body {
            padding: 20px;
        }

        .appointment-time {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: #333;
        }

        .appointment-details {
            color: #666;
            margin-bottom: 15px;
        }

        .appointment-patient {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .patient-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #5d98ff;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-weight: 600;
        }

        .patient-info h5 {
            font-family: 'Kanit', sans-serif;
            font-weight: 600;
            margin-bottom: 2px;
            font-size: 1rem;
        }

        .patient-info p {
            font-size: 0.85rem;
            color: #888;
            margin: 0;
        }

        .appointment-actions {
            display: flex;
            gap: 10px;
            margin-top: 15px;
        }

        .appointment-actions button {
            flex: 1;
            padding: 8px 15px;
            border-radius: 8px;
            border: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-details {
            background: #f1f6ff;
            color: #5d98ff;
        }

        .btn-details:hover {
            background: #e6f0ff;
        }

        

        .no-appointments {
            text-align: center;
            padding: 40px 20px;
            color: #888;
        }

        .no-appointments i {
            font-size: 3rem;
            margin-bottom: 15px;
            color: #ddd;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .calendar-table td {
                height: 60px;
                padding: 5px;
            }
            
            .day-number {
                font-size: 0.9rem;
            }
            
            .appointment-dot {
                width: 6px;
                height: 6px;
            }
            
            .appointment-header {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .appointment-type {
                margin-top: 8px;
            }
        }

        @media (max-width: 576px) {
            .calendar-table td {
                height: 50px;
            }
            
            .day-number {
                font-size: 0.8rem;
            }
            
            .appointment-dot {
                width: 4px;
                height: 4px;
            }
            
            .appointment-actions {
                flex-direction: column;
            }

          

        }
    </style>
</head>
<body>
  
<?php include 'navbar.php'; ?>

    <!-- Main Content -->
    <div class="appointment-container">
        <h1 class="page-title">นัดหมาย</h1>
        <p class="page-subtitle">จัดการนัดหมายและติดตามการให้บริการ</p>

        <!-- Calendar Section -->
        <div class="calendar-section">
    <iframe src="https://calendar.google.com/calendar/embed?src=c_a2faa58e894d0f4824fd058f4be6834c14b463de076da0dc261164146a56e421%40group.calendar.google.com&ctz=Asia%2FBangkok" 
        style="border: 0" 
        width="800" 
        height="600" 
        frameborder="0" 
        scrolling="no">
    </iframe>
</div>


        <!-- Appointments List -->
        <div class="appointments-list">
            <h3 class="section-title">นัดหมายที่กำลังมาถึง</h3>
            
            <!-- Appointment Card 1 -->
            <div class="appointment-card">
                <div class="appointment-header">
                    <div class="appointment-date">วันพุธ, 5 กุมภาพันธ์ 2025</div>
                    <div class="appointment-type follow-up">นัดติดตามผล</div>
                </div>
                <div class="appointment-body">
                    <div class="appointment-time">10:00 - 10:30 น.</div>
                    <div class="appointment-details">ติดตามผลการรักษาและปรับยา</div>
                    <div class="appointment-patient">
                        <div class="patient-avatar">นพ.</div>
                        <div class="patient-info">
                            <h5>นพ.สมชาย ใจดี</h5>
                            <p>อายุรกรรม</p>
                        </div>
                    </div>
                    <div class="appointment-actions">
                        <button class="btn-details">รายละเอียด</button>
                        
                    </div>
                </div>
            </div>
            
            <!-- Appointment Card 2 -->
            <div class="appointment-card">
                <div class="appointment-header">
                    <div class="appointment-date">วันศุกร์, 14 กุมภาพันธ์ 2025</div>
                    <div class="appointment-type consultation">ให้คำปรึกษา</div>
                </div>
                <div class="appointment-body">
                    <div class="appointment-time">14:00 - 15:00 น.</div>
                    <div class="appointment-details">ปรึกษาปัญหาสุขภาพจิตและความเครียด</div>
                    <div class="appointment-patient">
                        <div class="patient-avatar">พญ.</div>
                        <div class="patient-info">
                            <h5>พญ.สุภาพร วัฒนสุข</h5>
                            <p>จิตเวชศาสตร์</p>
                        </div>
                    </div>
                    <div class="appointment-actions">
                        <button class="btn-details">รายละเอียด</button>
                       
                    </div>
                </div>
            </div>
            
            <!-- Appointment Card 3 -->
            <div class="appointment-card">
                <div class="appointment-header">
                    <div class="appointment-date">วันพฤหัสบดี, 20 กุมภาพันธ์ 2025</div>
                    <div class="appointment-type home-visit">เยี่ยมบ้าน</div>
                </div>
                <div class="appointment-body">
                    <div class="appointment-time">09:00 - 10:30 น.</div>
                    <div class="appointment-details">เยี่ยมบ้านผู้ป่วยเรื้อรังและประเมินอาการ</div>
                    <div class="appointment-patient">
                        <div class="patient-avatar">พญ.</div>
                        <div class="patient-info">
                            <h5>พญ.อรุณี สุขใจ</h5>
                            <p>เวชปฏิบัติครอบครัว</p>
                        </div>
                    </div>
                    <div class="appointment-actions">
                        <button class="btn-details">รายละเอียด</button>
                       
                    </div>
                </div>
            </div>
            
            <!-- No Appointments Message (hidden by default) -->
            <div class="no-appointments d-none">
                <i class="fas fa-calendar-times"></i>
                <h4>ไม่มีนัดหมายในขณะนี้</h4>
                <p>เมื่อคุณมีนัดหมายใหม่ จะปรากฏที่นี่</p>
            </div>
        </div>
    </div>



   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ฟังก์ชันสำหรับเปลี่ยนเดือนในปฏิทิน
        document.getElementById('prev-month').addEventListener('click', function() {
            alert('เปลี่ยนไปยังเดือนก่อนหน้า');
            // ในแอปพลิเคชันจริง จะมีโค้ดสำหรับเปลี่ยนเดือน
        });

        document.getElementById('next-month').addEventListener('click', function() {
            alert('เปลี่ยนไปยังเดือนถัดไป');
            // ในแอปพลิเคชันจริง จะมีโค้ดสำหรับเปลี่ยนเดือน
        });

        // ฟังก์ชันสำหรับเลือกวันที่ในปฏิทิน
        document.querySelectorAll('.calendar-table td').forEach(cell => {
            cell.addEventListener('click', function() {
                // ลบคลาส active จากเซลล์อื่นๆ
                document.querySelectorAll('.calendar-table td').forEach(c => {
                    c.classList.remove('active');
                });
                
                // เพิ่มคลาส active ให้เซลล์ที่คลิก
                this.classList.add('active');
                
                // ในแอปพลิเคชันจริง จะมีโค้ดสำหรับแสดงนัดหมายในวันนั้น
                const day = this.querySelector('.day-number').textContent;
                alert(`แสดงนัดหมายสำหรับวันที่ ${day} กุมภาพันธ์ 2025`);
            });
        });

        // ฟังก์ชันสำหรับยกเลิกนัดหมาย
        document.querySelectorAll('.btn-cancel').forEach(button => {
            button.addEventListener('click', function() {
                if (confirm('คุณแน่ใจว่าต้องการยกเลิกนัดหมายนี้?')) {
                    const card = this.closest('.appointment-card');
                    card.style.opacity = '0.5';
                    setTimeout(() => {
                        card.remove();
                        // ตรวจสอบว่ายังมีการ์ดนัดหมายเหลืออยู่หรือไม่
                        if (document.querySelectorAll('.appointment-card').length === 0) {
                            document.querySelector('.no-appointments').classList.remove('d-none');
                        }
                    }, 500);
                }
            });
        });
    </script>
</body>
</html>