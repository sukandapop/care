<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบนัดหมาย - Care Connect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&family=Noto+Sans+Thai:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/appointment.css">
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