<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบบันทึกการรับประทานยา - Care Connect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&family=Noto+Sans+Thai:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/take_medicine.css">
    
</head>
<body style=" font-family: 'Sukhumvit Set', 'Kanit', Arial, sans-serif;">
    
    <?php include 'navbar.php'; ?>

    <div class="main-container">
        <!-- Header Section -->
        <div class="medication-header">
            <div class="header-content">
                <div class="text-center text-md-start">
                    <h1 class="page-title">ระบบบันทึกการรับประทานยา</h1>
                    <p class="mb-0">วันที่ 16 กุมภาพันธ์ 2568</p>
                </div>
            </div>
        </div>

        <!-- Today's Summary -->
<div class="today-summary">
  <div class="row g-3">

    <div class="col-6 col-md-3">
      <div class="summary-card time-card"
           data-time="เช้า"
           data-meds="พาราเซตามอล 1 เม็ด">
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
      <div class="summary-card time-card"
           data-time="เที่ยง"
           data-meds="ยาฆ่าเชื้อ 1 เม็ด">
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
      <div class="summary-card time-card"
           data-time="เย็น"
           data-meds="ยาเบาหวาน,วิตามินบี">
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
<div class="modal fade" id="medicineModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTitle"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <ul id="medicineList" class="list-group"></ul>
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
                            <h3 class="medication-name">พาราเซตามอล 500 mg.</h3>
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
                            <h3 class="medication-name">ยาฆ่าเชื้อ 250 mg.</h3>
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
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        const modal = new bootstrap.Modal(
    document.getElementById('medicineModal')
  );

  document.querySelectorAll('.time-card').forEach(card => {
    card.addEventListener('click', () => {

      const time = card.dataset.time;
      const meds = card.dataset.meds.split(',');

      // หัวข้อ Modal
      document.getElementById('modalTitle').innerText =
        `ยาที่ต้องกินช่วง${time}`;

      // เคลียร์รายการเดิม
      const list = document.getElementById('medicineList');
      list.innerHTML = '';

      // สร้างรายการยา
      meds.forEach(med => {
        const li = document.createElement('li');
        li.className = 'list-group-item';
        li.innerText = med;
        list.appendChild(li);
      });

      modal.show();
    });
  });
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