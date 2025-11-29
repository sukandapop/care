<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard อสม. (VHV) - Care Connect (Bootstrap)</title>
    
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Sarabun Font (Recommended for Thai) -->
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Custom Styles for Bootstrap Overrides and specific elements -->
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #f0fdfa; /* Light Teal background */
            color: #1f2937;
        }
        
        /* Using Bootstrap's info color scheme for a health/teal theme */
        .role-header {
            background-color: #0d9488; /* Custom Teal Darker */
        }

        .stat-card {
            transition: transform 0.2s;
        }
        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .patient-card {
            transition: background-color 0.2s, border-left 0.2s;
            cursor: pointer;
            border-left: 5px solid transparent;
        }
        .patient-card:hover {
            background-color: #e0f2f1; /* Light hover */
        }
        .patient-card.active {
            background-color: #b2dfdb; /* Active selection background */
            border-left-color: #0d9488 !important; /* Custom Teal Darker */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Custom scrollbar for fixed-height list */
        .custom-scroll {
            overflow-y: auto;
            max-height: 65vh; /* Fixed height for the list panel */
        }

        /* Ensure form input focus matches theme */
        .form-control:focus {
            border-color: #0d9488;
            box-shadow: 0 0 0 0.25rem rgba(13, 148, 136, 0.25);
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Header / Navigation -->
    <header class="role-header text-white shadow sticky-top">
        <div class="container-fluid px-4 px-md-5">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand text-white fw-bold d-flex align-items-center gap-2" href="#">
                    <span class="fs-4">🏡</span>
                    CARE CONNECT | ศูนย์ อสม.
                </a>
                <div class="d-flex align-items-center space-x-3">
                    <span class="text-white-50 d-none d-sm-block me-3">คุณสมใจ รักบ้านเกิด (อสม. หมู่ 5)</span>
                    <button onclick="showMessageBox('แจ้งเตือน', 'คุณมี 2 ข้อความใหม่จากเจ้าหน้าที่ รพ.สต.')" class="btn btn-outline-light rounded-circle p-2 me-2">
                         <span class="fs-6">🔔</span>
                    </button>
                    <button onclick="showMessageBox('ออกจากระบบ', 'ยืนยันการออกจากระบบ?')" class="btn btn-danger btn-sm fw-medium">
                        ออกจากระบบ
                    </button>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow-1 container py-4">
        
        <!-- Welcome Banner (Using Bootstrap Alerts) -->
        <div class="alert alert-info border-start border-5 border-info p-4 rounded-3 shadow-sm mb-4" role="alert">
            <h2 class="h5 fw-bold text-info-emphasis">สวัสดีค่ะ อสม. สมใจ</h2>
            <p class="mb-0 small">
                วันนี้ (29 พ.ย. 2568) คุณมีนัดเยี่ยมบ้านผู้ป่วย <strong>2 ราย</strong> โปรดบันทึกข้อมูลให้ครบถ้วนก่อนสิ้นสุดวัน
            </p>
        </div>

        <!-- Dashboard Grid: 4/8 Split -->
        <div class="row g-4">
            
            <!-- COLUMN 1 (4/12): Patient List & Stats -->
            <div class="col-lg-4">
                
                <!-- Quick Stats -->
                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <div class="stat-card bg-white p-4 rounded-3 shadow border-bottom border-5 border-danger">
                            <p class="text-sm text-muted mb-1">ต้องเยี่ยมวันนี้ (เร่งด่วน)</p>
                            <p class="h1 fw-bold text-danger">2</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-card bg-white p-4 rounded-3 shadow border-bottom border-5 border-success">
                            <p class="text-sm text-muted mb-1">เยี่ยมเสร็จสิ้นแล้ว (สัปดาห์นี้)</p>
                            <p class="h1 fw-bold text-success">8 / 15</p>
                        </div>
                    </div>
                </div>

                <!-- Patient List Panel -->
                <div class="card shadow-lg d-flex flex-column h-100">
                    <div class="card-header bg-info-subtle border-0 d-flex justify-content-between align-items-center">
                        <h3 class="h5 fw-bold text-info-emphasis mb-0">รายชื่อผู้ป่วยที่ต้องดูแล (15 ราย)</h3>
                        <span class="small text-muted">สถานะล่าสุด</span>
                    </div>
                    <div id="patientList" class="card-body custom-scroll p-3 space-y-2">
                        <!-- Patient Cards will be inserted here by JS -->
                    </div>
                    <div class="card-footer text-center small text-muted bg-light">
                        คลิกที่ชื่อผู้ป่วยเพื่อบันทึกข้อมูล
                    </div>
                </div>
            </div>

            <!-- COLUMN 2 (8/12): Data Entry & Summary Charts -->
            <div class="col-lg-8">
                
                <!-- Home Visit Log Form -->
                <div id="visitLogCard" class="card shadow-lg mb-4 border-top border-5 border-info">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="h4 fw-bold text-dark mb-4 d-flex align-items-center gap-2">
                            <span class="fs-3">🩺</span> บันทึกเยี่ยมบ้าน / ข้อมูลสุขภาพ
                        </h3>
                        
                        <div id="activePatientDisplay" class="p-3 mb-4 rounded-3 bg-info-subtle border border-info-subtle opacity-75 transition-opacity duration-300">
                            <p class="small text-info-emphasis fw-medium mb-1">ผู้ป่วยที่ถูกเลือก:</p>
                            <p id="activePatientName" class="h5 fw-bold text-info-emphasis mb-0">
                                *โปรดเลือกผู้ป่วยจากรายชื่อด้านซ้ายเพื่อเริ่มบันทึก*
                            </p>
                        </div>

                        <form id="visitForm" class="mt-4">
                            
                            <!-- Vital Signs Section -->
                            <fieldset class="border border-secondary-subtle p-4 rounded-3 mb-4">
                                <legend class="float-none w-auto px-2 fs-6 fw-semibold text-secondary">สัญญาณชีพ (Vital Signs)</legend>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label class="form-label small fw-medium">ความดันโลหิตบน (Systolic)</label>
                                        <input type="number" id="bpSystolic" placeholder="mmHg (เช่น 130)" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label small fw-medium">ความดันโลหิตล่าง (Diastolic)</label>
                                        <input type="number" id="bpDiastolic" placeholder="mmHg (เช่น 85)" class="form-control">
                                    </div>
                                    <div class="col-md-4">
                                        <label class="form-label small fw-medium">น้ำหนัก (Weight)</label>
                                        <input type="number" id="weight" placeholder="กก." class="form-control">
                                    </div>
                                </div>
                            </fieldset>

                            <!-- Observation Section -->
                            <div class="mb-4">
                                <label class="form-label fw-semibold text-secondary">อาการและข้อสังเกต</label>
                                <textarea id="observation" rows="4" placeholder="บันทึกอาการ, การปฏิบัติตัว, ปัญหาที่พบ หรือความช่วยเหลือที่ผู้ป่วยต้องการ..." 
                                          class="form-control"></textarea>
                            </div>
                            
                            <div class="d-flex justify-content-end">
                                <button type="submit" id="submitButton" 
                                        class="btn btn-success btn-lg fw-bold shadow-sm" 
                                        disabled>
                                    บันทึกการเยี่ยม (Save Log)
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Activity Summary Chart -->
                <div class="card shadow-lg">
                    <div class="card-body p-4">
                        <h3 class="h5 fw-bold text-dark mb-4">📈 สรุปผลงานเยี่ยมบ้านเดือนปัจจุบัน</h3>
                        <div style="height: 250px;">
                            <canvas id="vhvActivityChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Custom Modal for Alerts/Messages -->
        <div id="messageBox" class="modal fade" tabindex="-1" aria-labelledby="messageTitle" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content rounded-3 shadow-lg">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title fw-bold" id="messageTitle">การแจ้งเตือน</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body pt-2">
                        <p id="messageContent" class="text-secondary"></p>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-success w-100 fw-bold" data-bs-dismiss="modal">ตกลง</button>
                    </div>
                </div>
            </div>
        </div>
        
    </main>

    <!-- Footer -->
    <footer class="bg-white border-top mt-auto py-3">
        <div class="container text-center text-muted small">
            <p class="mb-0">Care Connect VHV Interface Design • Powered by Community Health</p>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9fldo+O8o/tEjF11Nf4jA" crossorigin="anonymous"></script>

    <script>
        // Use Bootstrap's Modal for message box
        const messageModal = new bootstrap.Modal(document.getElementById('messageBox'));

        function showMessageBox(title, content) {
            document.getElementById('messageTitle').innerText = title;
            document.getElementById('messageContent').innerText = content;
            messageModal.show();
        }

        // --- GLOBAL STATE & MOCK DATA (Retained from previous version) ---
        let currentChart = null;
        let activePatientId = null;

        const mockPatients = [
            { id: 101, name: "นายสมชาย ใจดี", condition: "ความดันสูง (BP)", status: "❗ ยังไม่เยี่ยม (วันนี้)", color: "border-danger", detail: "ความดัน 145/90 (สูง)" },
            { id: 102, name: "นางสาวมานี มีสุข", condition: "เบาหวาน (DM)", status: "✅ เยี่ยมแล้ว (28/11)", color: "border-success", detail: "น้ำตาล 110 (ปกติ)" },
            { id: 103, name: "คุณยายทองคำ", condition: "ผู้สูงอายุติดเตียง", status: "🟡 รอดำเนินการ (พรุ่งนี้)", color: "border-warning", detail: "ต้องการความช่วยเหลือด้านอาหาร" },
            { id: 104, name: "เด็กหญิงสมศรี", condition: "เฝ้าระวังไข้หวัด", status: "✅ รายงานทางแชท", color: "border-success", detail: "อาการดีขึ้นแล้ว" },
            { id: 105, name: "นายมานะ แก้วตา", condition: "ความดันสูง (BP)", status: "❗ เกินกำหนดเยี่ยม 3 วัน", color: "border-danger", detail: "ยังไม่ได้รับการติดต่อกลับ" },
            { id: 106, name: "นางประนอม", condition: "เบาหวาน (DM)", status: "🟡 รอดำเนินการ (สัปดาห์หน้า)", color: "border-warning", detail: "นัดหมายเยี่ยม 5 ธ.ค." }
        ];

        document.addEventListener('DOMContentLoaded', () => {
            renderPatientList();
            renderActivityChart();
            document.getElementById('visitForm').addEventListener('submit', handleFormSubmit);
        });

        // --- PATIENT LIST LOGIC ---
        function renderPatientList() {
            const listContainer = document.getElementById('patientList');
            listContainer.innerHTML = '';
            
            const sortedPatients = [...mockPatients].sort((a, b) => {
                if (a.color.includes('danger') && !b.color.includes('danger')) return -1;
                if (!a.color.includes('danger') && b.color.includes('danger')) return 1;
                if (a.color.includes('warning') && !b.color.includes('warning')) return -1;
                if (!a.color.includes('warning') && b.color.includes('warning')) return 1;
                return 0;
            });


            sortedPatients.forEach(p => {
                const card = document.createElement('div');
                card.id = `patient-${p.id}`;
                // Using Bootstrap classes: card, shadow, mb-2, border-start, border-5
                card.className = `patient-card card shadow-sm mb-2 ${p.color}`;
                card.innerHTML = `
                    <div class="card-body p-3">
                        <div class="fw-bold text-dark fs-6">${p.name}</div>
                        <div class="small text-muted">${p.condition} | ${p.detail}</div>
                        <div class="small fw-semibold mt-1 ${p.color.includes('danger') ? 'text-danger' : p.color.includes('warning') ? 'text-warning' : 'text-success'}">
                            ${p.status}
                        </div>
                    </div>
                `;
                card.onclick = () => selectPatient(p.id, p.name);
                listContainer.appendChild(card);
            });
        }

        function selectPatient(id, name) {
            activePatientId = id;
            
            // Highlight active card
            document.querySelectorAll('.patient-card').forEach(card => card.classList.remove('active'));
            document.getElementById(`patient-${id}`).classList.add('active');

            // Update form display
            document.getElementById('activePatientName').innerText = name;
            document.getElementById('submitButton').disabled = false;
            document.getElementById('submitButton').innerText = `บันทึกการเยี่ยม ${name}`;

            // Clear previous form data for new patient
            document.getElementById('visitForm').reset();
        }

        // --- FORM SUBMISSION LOGIC ---
        function handleFormSubmit(event) {
            event.preventDefault();
            if (!activePatientId) {
                showMessageBox('ข้อผิดพลาด', 'กรุณาเลือกผู้ป่วยที่ต้องการบันทึกข้อมูลก่อน');
                return;
            }

            const bpS = document.getElementById('bpSystolic').value;
            const bpD = document.getElementById('bpDiastolic').value;
            const weight = document.getElementById('weight').value;
            const obs = document.getElementById('observation').value;

            // Simple validation
            if (!bpS || !bpD || !obs) {
                showMessageBox('ข้อผิดพลาด', 'กรุณากรอกข้อมูลสัญญาณชีพและความสังเกตอย่างน้อย 1 รายการ');
                return;
            }

            // Mock Data Saving
            console.log(`Saving data for Patient ID: ${activePatientId}`);
            console.log({ bpS, bpD, weight, obs });

            
            showMessageBox('บันทึกสำเร็จ', `บันทึกข้อมูลเยี่ยมบ้านของ ${document.getElementById('activePatientName').innerText} เรียบร้อยแล้ว`);
            
            // Mock update patient status
            const activePatient = mockPatients.find(p => p.id === activePatientId);
            if (activePatient) {
                activePatient.status = '✅ เยี่ยมวันนี้';
                activePatient.color = 'border-success';
            }
            renderPatientList();
            renderActivityChart(); 
            
            // Reset state
            activePatientId = null;
            document.getElementById('visitForm').reset();
            document.getElementById('activePatientName').innerText = '*โปรดเลือกผู้ป่วยจากรายชื่อด้านซ้ายเพื่อเริ่มบันทึก*';
            document.getElementById('submitButton').disabled = true;
            document.getElementById('submitButton').innerText = 'บันทึกการเยี่ยม (Save Log)';
            document.querySelectorAll('.patient-card').forEach(card => card.classList.remove('active'));
        }


        // --- CHART JS LOGIC (Doughnut Chart) ---
        function renderActivityChart() {
            const ctx = document.getElementById('vhvActivityChart').getContext('2d');
            if (currentChart) currentChart.destroy();
            
            const total = mockPatients.length;
            const completed = mockPatients.filter(p => p.status.includes('เยี่ยมแล้ว') || p.status.includes('เยี่ยมวันนี้') || p.status.includes('แชท')).length;
            const pending = total - completed;

            currentChart = new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: [`เยี่ยมแล้ว (${completed} ราย)`, `รอดำเนินการ (${pending} ราย)`],
                    datasets: [{
                        data: [completed, pending],
                        // Using Bootstrap's info and warning colors
                        backgroundColor: ['#0d9488', '#ffc107'] 
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom' },
                        title: {
                            display: true,
                            text: `ความคืบหน้าการเยี่ยมบ้าน (${Math.round((completed / total) * 100)}% เสร็จสิ้น)`,
                            font: { size: 16, weight: 'bold', family: 'Sarabun' }
                        }
                    }
                }
            });
        }
    </script>
</body>
</html>