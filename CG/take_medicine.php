<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แจ้งเตือนรับประทานยา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700&family=Noto+Sans+Thai:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --info: #36b9cc;
            --warning: #f6c23e;
            --danger: #e74a3b;
            --light: #f8f9fa;
            --dark: #212529;
        }

        body {
            background: linear-gradient(135deg, rgb(34, 171, 250) 0%, #ffffffff 100%);
            font-family: 'Kanit', sans-serif;
            min-height: 100vh;
        }

        .medicine-card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .medicine-card:hover {
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
        }

        .form-label {
            font-weight: 500;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .form-control, .form-select {
            border-radius: 8px;
            padding: 0.75rem;
            border: 1px solid #ddd;
            transition: all 0.3s;
        }

        .form-control:focus, .form-select:focus {
            border-color: #4361ee;
            box-shadow: 0 0 0 0.2rem rgba(67, 97, 238, 0.25);
        }

        .btn-primary {
            background-color: var(--primary);
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: var(--secondary);
            transform: translateY(-2px);
        }

        .btn-outline-secondary {
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-weight: 500;
        }

        .time-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            margin: 0.25rem;
            border-radius: 20px;
            background-color: #e9ecef;
            color: #495057;
            cursor: pointer;
            transition: all 0.2s;
        }

        .time-badge.active {
            background-color: var(--primary);
            color: white;
        }

        .time-badge:hover {
            background-color: #dee2e6;
        }

        .time-badge.active:hover {
            background-color: var(--secondary);
        }

        .alert-notification {
            border-left: 4px solid var(--primary);
            border-radius: 8px;
        }

        .alert-warning {
            border-left-color: var(--warning);
        }

        .alert-danger {
            border-left-color: var(--danger);
        }

        .status-indicator {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 0.5rem;
        }

        .status-active {
            background-color: #28a745;
        }

        .status-upcoming {
            background-color: #ffc107;
        }

        .status-completed {
            background-color: #6c757d;
        }

        .status-expired {
            background-color: #dc3545;
        }

        .date-range {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1rem;
        }

        .medicine-icon {
            font-size: 1.5rem;
            color: var(--primary);
            margin-right: 0.5rem;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h2 fw-bold text-dark"><i class="bi bi-capsule medicine-icon"></i>แจ้งเตือนรับประทานยา</h1>
                <p class="text-muted">ตั้งค่าแจ้งเตือนรับประทานยาให้ผู้สูงอายุครั้งเดียวสำหรับหลายวัน</p>
            </div>
            <a href="index.php" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>กลับหน้าหลัก
            </a>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <!-- ฟอร์มตั้งค่าแจ้งเตือนยา -->
                <div class="card medicine-card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-bell me-2"></i>ตั้งค่าแจ้งเตือนยา</h5>
                    </div>
                    <div class="card-body">
                        <form id="medicineAlertForm">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="elderlySelect" class="form-label">เลือกผู้สูงอายุ</label>
                                    <select class="form-select" id="elderlySelect" required>
                                        <option value="">-- เลือกผู้สูงอายุ --</option>
                                        <option value="1">สมชาย ใจดี (อายุ 72 ปี)</option>
                                        <option value="2">สมศรี เมืองดี (อายุ 68 ปี)</option>
                                        <option value="3">บุญมี รักดี (อายุ 75 ปี)</option>
                                        <option value="4">สำอาง งามดี (อายุ 70 ปี)</option>
                                        <option value="5">ขันทอง ใจงาม (อายุ 80 ปี)</option>
                                        <option value="6">สำราญ สบายดี (อายุ 65 ปี)</option>
                                        <option value="7">บัวไข ฟ้าสวย (อายุ 78 ปี)</option>
                                        <option value="8">สายฝน ฝนตก (อายุ 73 ปี)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="medicineName" class="form-label">ชื่อยา</label>
                                    <input type="text" class="form-control" id="medicineName" placeholder="กรอกชื่อยา" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="dosage" class="form-label">ขนาดยา (มก.)</label>
                                    <input type="text" class="form-control" id="dosage" placeholder="เช่น 500 มก.">
                                </div>
                                <div class="col-md-6">
                                    <label for="quantity" class="form-label">จำนวนที่รับประทาน</label>
                                    <input type="text" class="form-control" id="quantity" placeholder="เช่น 1 เม็ด, 2 ช้อนชา">
                                </div>
                            </div>

                            <div class="date-range">
                                <h6 class="fw-bold mb-3">กำหนดช่วงเวลาการแจ้งเตือน</h6>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="startDate" class="form-label">วันที่เริ่มต้น</label>
                                        <input type="date" class="form-control" id="startDate" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="endDate" class="form-label">วันที่สิ้นสุด</label>
                                        <input type="date" class="form-control" id="endDate" required>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <small class="text-muted" id="dateRangeInfo">เลือกช่วงวันที่ต้องการแจ้งเตือน</small>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">เวลาแจ้งเตือน</label>
                                <div class="d-flex flex-wrap">
                                    <span class="time-badge" data-time="06:00">เช้า (06:00)</span>
                                    <span class="time-badge" data-time="09:00">ก่อนเที่ยง (09:00)</span>
                                    <span class="time-badge" data-time="12:00">เที่ยง (12:00)</span>
                                    <span class="time-badge" data-time="15:00">บ่าย (15:00)</span>
                                    <span class="time-badge" data-time="18:00">เย็น (18:00)</span>
                                    <span class="time-badge" data-time="21:00">ก่อนนอน (21:00)</span>
                                </div>
                                <input type="hidden" id="selectedTimes">
                            </div>

                            <div class="mb-3">
                                <label for="instructions" class="form-label">คำแนะนำในการรับประทานยา</label>
                                <textarea class="form-control" id="instructions" rows="3" placeholder="เช่น รับประทานหลังอาหาร, รับประทานก่อนนอน, ห้ามรับประทานร่วมกับ..."></textarea>
                            </div>

                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="repeatWeekly">
                                <label class="form-check-label" for="repeatWeekly">ทำซ้ำทุกสัปดาห์</label>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="reset" class="btn btn-outline-secondary me-md-2">ล้างข้อมูล</button>
                                <button type="submit" class="btn btn-primary">บันทึกการแจ้งเตือน</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- รายการแจ้งเตือนปัจจุบัน -->
                <div class="card medicine-card">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0"><i class="bi bi-list-check me-2"></i>รายการแจ้งเตือนปัจจุบัน</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>ผู้สูงอายุ</th>
                                        <th>ชื่อยา</th>
                                        <th>วันที่</th>
                                        <th>เวลา</th>
                                        <th>สถานะ</th>
                                        <th>การดำเนินการ</th>
                                    </tr>
                                </thead>
                                <tbody id="alertList">
                                    <!-- ข้อมูลจะถูกเพิ่มโดย JavaScript -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <!-- การแจ้งเตือนวันนี้ -->
                <div class="card medicine-card mb-4">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="card-title mb-0"><i class="bi bi-bell-fill me-2"></i>การแจ้งเตือนวันนี้</h5>
                    </div>
                    <div class="card-body">
                        <div id="todayAlerts">
                            <!-- การแจ้งเตือนจะถูกเพิ่มโดย JavaScript -->
                        </div>
                    </div>
                </div>

                <!-- สถิติการรับประทานยา -->
                <div class="card medicine-card mb-4">
                    <div class="card-header bg-success text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-graph-up me-2"></i>สถิติการรับประทานยา</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h6 class="fw-bold">การรับประทานยาของผู้สูงอายุ</h6>
                            <div class="mb-2">
                                <span class="status-indicator status-active"></span>
                                <span>รับประทานตามเวลา: <strong>85%</strong></span>
                            </div>
                            <div class="mb-2">
                                <span class="status-indicator status-upcoming"></span>
                                <span>รับประทานช้า: <strong>10%</strong></span>
                            </div>
                            <div class="mb-2">
                                <span class="status-indicator status-expired"></span>
                                <span>ไม่ได้รับประทาน: <strong>5%</strong></span>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary">
                                <i class="bi bi-file-earmark-text me-2"></i>รายงานการรับประทานยา
                            </button>
                        </div>
                    </div>
                </div>

                <!-- ยาที่ใช้บ่อย -->
                <div class="card medicine-card">
                    <div class="card-header bg-info text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-capsule-pill me-2"></i>ยาที่ใช้บ่อย</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Paracetamol
                                <span class="badge bg-primary rounded-pill">5 คน</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Amlodipine
                                <span class="badge bg-primary rounded-pill">3 คน</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Metformin
                                <span class="badge bg-primary rounded-pill">2 คน</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Simvastatin
                                <span class="badge bg-primary rounded-pill">2 คน</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Aspirin
                                <span class="badge bg-primary rounded-pill">1 คน</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ข้อมูลตัวอย่างสำหรับการแจ้งเตือน
        const sampleAlerts = [
            {
                id: 1,
                elderly: "สมชาย ใจดี",
                medicine: "Paracetamol",
                dosage: "500 มก.",
                quantity: "1 เม็ด",
                startDate: "2023-11-20",
                endDate: "2023-11-25",
                times: ["09:00", "18:00"],
                instructions: "รับประทานหลังอาหาร",
                repeatWeekly: false,
                status: "active"
            },
            {
                id: 2,
                elderly: "บุญมี รักดี",
                medicine: "Amlodipine",
                dosage: "5 มก.",
                quantity: "1 เม็ด",
                startDate: "2023-11-15",
                endDate: "2023-11-30",
                times: ["06:00"],
                instructions: "รับประทานก่อนอาหารเช้า",
                repeatWeekly: false,
                status: "active"
            },
            {
                id: 3,
                elderly: "ขันทอง ใจงาม",
                medicine: "Metformin",
                dosage: "500 มก.",
                quantity: "1 เม็ด",
                startDate: "2023-11-10",
                endDate: "2023-11-20",
                times: ["09:00", "21:00"],
                instructions: "รับประทานหลังอาหารเช้าและเย็น",
                repeatWeekly: false,
                status: "completed"
            }
        ];

        // ตั้งค่าวันที่เริ่มต้นและสิ้นสุด
        document.getElementById('startDate').valueAsDate = new Date();
        const endDate = new Date();
        endDate.setDate(endDate.getDate() + 7);
        document.getElementById('endDate').valueAsDate = endDate;

        // อัพเดทข้อมูลช่วงวันที่
        function updateDateRangeInfo() {
            const startDate = new Date(document.getElementById('startDate').value);
            const endDate = new Date(document.getElementById('endDate').value);
            
            if (startDate && endDate) {
                const diffTime = Math.abs(endDate - startDate);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)) + 1;
                document.getElementById('dateRangeInfo').textContent = 
                    `แจ้งเตือนทั้งหมด ${diffDays} วัน (${startDate.toLocaleDateString('th-TH')} - ${endDate.toLocaleDateString('th-TH')})`;
            }
        }

        document.getElementById('startDate').addEventListener('change', updateDateRangeInfo);
        document.getElementById('endDate').addEventListener('change', updateDateRangeInfo);
        updateDateRangeInfo();

        // จัดการการเลือกเวลา
        const timeBadges = document.querySelectorAll('.time-badge');
        const selectedTimes = [];
        
        timeBadges.forEach(badge => {
            badge.addEventListener('click', function() {
                this.classList.toggle('active');
                const time = this.getAttribute('data-time');
                
                if (this.classList.contains('active')) {
                    if (!selectedTimes.includes(time)) {
                        selectedTimes.push(time);
                    }
                } else {
                    const index = selectedTimes.indexOf(time);
                    if (index > -1) {
                        selectedTimes.splice(index, 1);
                    }
                }
                
                document.getElementById('selectedTimes').value = selectedTimes.join(',');
            });
        });

        // จัดการการส่งฟอร์ม
        document.getElementById('medicineAlertForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // รับค่าจากฟอร์ม
            const elderlyName = document.getElementById('elderlySelect').options[document.getElementById('elderlySelect').selectedIndex].text;
            const medicineName = document.getElementById('medicineName').value;
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;
            const times = selectedTimes;
            
            if (times.length === 0) {
                alert('กรุณาเลือกเวลาการแจ้งเตือนอย่างน้อย 1 เวลา');
                return;
            }
            
            // สร้างออบเจ็กต์การแจ้งเตือนใหม่
            const newAlert = {
                id: Date.now(), // ใช้ timestamp เป็น ID
                elderly: elderlyName,
                medicine: medicineName,
                dosage: document.getElementById('dosage').value,
                quantity: document.getElementById('quantity').value,
                startDate: startDate,
                endDate: endDate,
                times: times,
                instructions: document.getElementById('instructions').value,
                repeatWeekly: document.getElementById('repeatWeekly').checked,
                status: "active"
            };
            
            // เพิ่มการแจ้งเตือนใหม่ลงในรายการ
            sampleAlerts.push(newAlert);
            
            // อัพเดทการแสดงผล
            updateAlertList();
            updateTodayAlerts();
            
            // แสดงการยืนยัน
            alert(`ตั้งค่าแจ้งเตือนยา ${medicineName} สำหรับ ${elderlyName} สำเร็จแล้ว`);
            
            // รีเซ็ตฟอร์ม
            this.reset();
            selectedTimes.length = 0;
            document.getElementById('selectedTimes').value = '';
            timeBadges.forEach(badge => badge.classList.remove('active'));
            
            // ตั้งค่าวันที่เริ่มต้นและสิ้นสุดใหม่
            document.getElementById('startDate').valueAsDate = new Date();
            const newEndDate = new Date();
            newEndDate.setDate(newEndDate.getDate() + 7);
            document.getElementById('endDate').valueAsDate = newEndDate;
            updateDateRangeInfo();
        });

        // อัพเดทรายการแจ้งเตือน
        function updateAlertList() {
            const alertList = document.getElementById('alertList');
            alertList.innerHTML = '';
            
            sampleAlerts.forEach(alert => {
                const row = document.createElement('tr');
                
                // กำหนดคลาสสถานะ
                let statusClass = '';
                let statusText = '';
                
                switch(alert.status) {
                    case 'active':
                        statusClass = 'status-active';
                        statusText = 'กำลังดำเนินการ';
                        break;
                    case 'upcoming':
                        statusClass = 'status-upcoming';
                        statusText = 'กำลังจะเริ่ม';
                        break;
                    case 'completed':
                        statusClass = 'status-completed';
                        statusText = 'สิ้นสุดแล้ว';
                        break;
                    case 'expired':
                        statusClass = 'status-expired';
                        statusText = 'หมดอายุ';
                        break;
                }
                
                row.innerHTML = `
                    <td>${alert.elderly}</td>
                    <td>${alert.medicine}</td>
                    <td>${formatDate(alert.startDate)} - ${formatDate(alert.endDate)}</td>
                    <td>${alert.times.join(', ')}</td>
                    <td><span class="status-indicator ${statusClass}"></span>${statusText}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-primary" onclick="editAlert(${alert.id})">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-sm btn-outline-danger" onclick="deleteAlert(${alert.id})">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                `;
                
                alertList.appendChild(row);
            });
        }

        // อัพเดทการแจ้งเตือนวันนี้
        function updateTodayAlerts() {
            const todayAlerts = document.getElementById('todayAlerts');
            todayAlerts.innerHTML = '';
            
            const today = new Date().toISOString().split('T')[0];
            
            sampleAlerts.forEach(alert => {
                if (alert.status === 'active' && today >= alert.startDate && today <= alert.endDate) {
                    alert.times.forEach(time => {
                        const alertDiv = document.createElement('div');
                        alertDiv.className = 'alert alert-notification d-flex justify-content-between align-items-center';
                        
                        alertDiv.innerHTML = `
                            <div>
                                <h6 class="mb-1">${alert.medicine} - ${alert.elderly}</h6>
                                <p class="mb-0 small">${alert.quantity} ${alert.dosage ? `(${alert.dosage})` : ''}</p>
                                <p class="mb-0 small text-muted">${alert.instructions || 'ไม่มีคำแนะนำพิเศษ'}</p>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-primary">${time}</span>
                                <div class="mt-1">
                                    <button class="btn btn-sm btn-success" onclick="markAsTaken(${alert.id}, '${time}')">
                                        <i class="bi bi-check-lg"></i> รับประทานแล้ว
                                    </button>
                                </div>
                            </div>
                        `;
                        
                        todayAlerts.appendChild(alertDiv);
                    });
                }
            });
            
            if (todayAlerts.children.length === 0) {
                todayAlerts.innerHTML = '<p class="text-muted text-center">ไม่มีรายการแจ้งเตือนสำหรับวันนี้</p>';
            }
        }

        // ฟังก์ชันช่วยเหลือ
        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('th-TH');
        }

        function editAlert(id) {
            const alert = sampleAlerts.find(a => a.id === id);
            if (alert) {
                // ในสภาพแวดล้อมจริง จะเป็นการโหลดข้อมูลลงในฟอร์มเพื่อแก้ไข
                alert(`กำลังแก้ไขการแจ้งเตือน: ${alert.medicine} - ${alert.elderly}`);
            }
        }

        function deleteAlert(id) {
            if (confirm('คุณแน่ใจว่าต้องการลบการแจ้งเตือนนี้?')) {
                const index = sampleAlerts.findIndex(a => a.id === id);
                if (index > -1) {
                    sampleAlerts.splice(index, 1);
                    updateAlertList();
                    updateTodayAlerts();
                }
            }
        }

        function markAsTaken(alertId, time) {
            // ในสภาพแวดล้อมจริง จะเป็นการบันทึกว่าผู้สูงอายุรับประทานยาแล้ว
            alert(`บันทึกการรับประทานยาเรียบร้อยแล้ว (เวลา ${time})`);
        }

        // เรียกใช้ฟังก์ชันเริ่มต้น
        updateAlertList();
        updateTodayAlerts();
    </script>
</body>
</html>