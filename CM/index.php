<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard ผู้จัดการเคส (CM) - Care Connect</title>
    
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Sarabun Font -->
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Custom Styles (Indigo Theme for CM) -->
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #f5f3ff; /* Very Light Indigo background */
            color: #1f2937;
        }
        
        .role-header {
            background-color: #4f46e5; /* Indigo 600 - CM Theme */
        }

        .stat-card {
            transition: transform 0.2s, box-shadow 0.2s;
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
            background-color: #e0e7ff; /* Light hover */
        }
        .patient-card.active {
            background-color: #c7d2fe; /* Active selection background */
            border-left-color: #4f46e5 !important; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .custom-scroll {
            overflow-y: auto;
            max-height: 55vh; /* Fixed height for the list panel */
        }
        
        /* Focus styles for the indigo theme */
        .form-control:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 0.25rem rgba(79, 70, 229, 0.25);
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- Header / Navigation -->
    <header class="role-header text-white shadow sticky-top">
        <div class="container-fluid px-4 px-md-5">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand text-white fw-bold d-flex align-items-center gap-2" href="#">
                    <span class="fs-4">📋</span>
                    CARE CONNECT | ศูนย์ผู้จัดการเคส (CM)
                </a>
                <div class="d-flex align-items-center space-x-3">
                    <span class="text-white-50 d-none d-sm-block me-3">คุณพิมลวรรณ สุขุม (CM เขต 3)</span>
                    <button onclick="showMessageBox('แจ้งเตือน', 'คุณมี 4 การแจ้งเตือนใหม่: เคสเร่งด่วน 2 ราย')" class="btn btn-outline-light rounded-circle p-2 me-2">
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
        
        <!-- Welcome Banner -->
        <div class="alert alert-primary border-start border-5 border-primary p-4 rounded-3 shadow-sm mb-4" role="alert">
            <h2 class="h5 fw-bold text-primary-emphasis">สวัสดีค่ะ CM พิมลวรรณ</h2>
            <p class="mb-0 small">
                วันนี้มีรายงานเยี่ยมบ้านจาก อสม. เข้ามา **12 รายการ** และมีเคสที่ต้องพิจารณา **3 ราย**
            </p>
        </div>

        <!-- Dashboard Grid: 4/8 Split -->
        <div class="row g-4">
            
            <!-- COLUMN 1 (4/12): Urgent Action List & Stats -->
            <div class="col-lg-4">
                
                <!-- Quick Stats -->
                <div class="row g-3 mb-4">
                    <div class="col-6">
                        <div class="stat-card bg-white p-4 rounded-3 shadow border-bottom border-5 border-danger">
                            <p class="text-sm text-muted mb-1">เคสความเสี่ยงสูง (High Risk)</p>
                            <p class="h1 fw-bold text-danger">7</p>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-card bg-white p-4 rounded-3 shadow border-bottom border-5 border-primary">
                            <p class="text-sm text-muted mb-1">บันทึก อสม. รอการตรวจสอบ</p>
                            <p class="h1 fw-bold text-primary">3</p>
                        </div>
                    </div>
                </div>

                <!-- Patient List Panel: Focus on ACTION REQUIRED -->
                <div class="card shadow-lg d-flex flex-column h-100">
                    <div class="card-header bg-primary-subtle border-0 d-flex justify-content-between align-items-center">
                        <h3 class="h5 fw-bold text-primary-emphasis mb-0">เคสที่ต้องดำเนินการ (Action Required)</h3>
                        <span class="small text-muted">ความเสี่ยง / สถานะ</span>
                    </div>
                    <div id="patientList" class="card-body custom-scroll p-3 space-y-2">
                        <!-- Patient Cards will be inserted here by JS -->
                    </div>
                </div>
            </div>

            <!-- COLUMN 2 (8/12): Case Review & Summary Charts -->
            <div class="col-lg-8">
                
                <!-- Case Review Panel -->
                <div id="caseReviewCard" class="card shadow-lg mb-4 border-top border-5 border-primary">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="h4 fw-bold text-dark mb-4 d-flex align-items-center gap-2">
                            <span class="fs-3">📝</span> รายละเอียดเคสและการดำเนินการ
                        </h3>
                        
                        <div id="activePatientDisplay" class="p-3 mb-4 rounded-3 bg-primary-subtle border border-primary-subtle opacity-75 transition-opacity duration-300">
                            <p class="small text-primary-emphasis fw-medium mb-1">เคสที่ถูกเลือก:</p>
                            <p id="activePatientName" class="h5 fw-bold text-primary-emphasis mb-0">
                                *โปรดเลือกเคสที่ต้องการตรวจสอบจากรายชื่อด้านซ้าย*
                            </p>
                        </div>

                        <!-- Case Summary -->
                        <div id="caseSummary" class="d-none">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <p class="mb-1 fw-bold text-secondary">อสม. ผู้รับผิดชอบ:</p>
                                    <p id="vhvName" class="mb-0">สมใจ รักบ้านเกิด</p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-1 fw-bold text-secondary">ความเสี่ยงปัจจุบัน:</p>
                                    <span id="riskLevel" class="badge rounded-pill bg-danger">สูงมาก</span>
                                </div>
                            </div>

                            <h5 class="fw-bold text-dark mt-4 mb-3">บันทึกเยี่ยมล่าสุด (โดย อสม.)</h5>
                            <div class="card card-body bg-light mb-4">
                                <p id="latestLogDate" class="small text-muted mb-1">วันที่บันทึก: 29 พ.ย. 2568 เวลา 10:30 น.</p>
                                <p id="latestLogDetails" class="mb-1 fw-medium">
                                    BP 150/95. ผู้ป่วยบ่นเวียนศีรษะเล็กน้อย ไม่ยอมกินยาตามแผน อสม. ได้แนะนำให้พักผ่อนและวัดความดันซ้ำ.
                                </p>
                            </div>

                            <h5 class="fw-bold text-dark mb-3">การดำเนินการโดย CM</h5>
                            <div class="d-grid gap-2 d-md-block">
                                <button type="button" class="btn btn-success me-md-2" onclick="handleCMAction('อนุมัติแผน')">
                                    <i class="bi bi-check-lg"></i> อนุมัติการเยี่ยม/ปิดเคส
                                </button>
                                <button type="button" class="btn btn-warning me-md-2" onclick="handleCMAction('ส่งข้อความ')">
                                    <i class="bi bi-chat-dots"></i> ส่งข้อความถึง อสม.
                                </button>
                                <button type="button" class="btn btn-danger" onclick="handleCMAction('ส่งต่อผู้เชี่ยวชาญ')">
                                    <i class="bi bi-send"></i> ส่งต่อแพทย์/พยาบาล
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Team Performance Chart -->
                <div class="card shadow-lg">
                    <div class="card-body p-4">
                        <h3 class="h5 fw-bold text-dark mb-4">📊 สรุปผลงานทีม อสม. ในพื้นที่รับผิดชอบ</h3>
                        <div style="height: 280px;">
                            <canvas id="cmTeamChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Custom Modal for Alerts/Messages (Bootstrap Modal) -->
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
                        <button type="button" class="btn btn-primary w-100 fw-bold" data-bs-dismiss="modal">ตกลง</button>
                    </div>
                </div>
            </div>
        </div>
        
    </main>

    <!-- Footer -->
    <footer class="bg-white border-top mt-auto py-3">
        <div class="container text-center text-muted small">
            <p class="mb-0">Care Connect CM Interface Design • Case Management System</p>
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

        let currentChart = null;
        let activePatientId = null;

        const mockCases = [
            { id: 201, name: "นายสมชาย ใจดี", vhv: "อสม. สมใจ", risk: "สูงมาก", status: "บันทึกใหม่รอ CM", color: "border-danger", log: "BP 150/95. ผู้ป่วยไม่ยอมกินยาตามแผน (รายงาน 29 พ.ย.)" },
            { id: 202, name: "นางสาวมานี มีสุข", vhv: "อสม. บุญถึง", risk: "ปานกลาง", status: "เยี่ยมแล้ว, ปกติ", color: "border-success", log: "น้ำตาล 110. ปฏิบัติตัวดี (รายงาน 28 พ.ย.)" },
            { id: 203, name: "คุณยายทองคำ", vhv: "อสม. สมใจ", risk: "สูง", status: "เคสใหม่ - ติดเตียง", color: "border-warning", log: "ต้องการความช่วยเหลือด้านอาหารและสุขาภิบาล (รายงาน 29 พ.ย.)" },
            { id: 204, name: "นายมานะ แก้วตา", vhv: "อสม. บุญถึง", risk: "ต่ำ", status: "เยี่ยมสำเร็จ", color: "border-info", log: "นัดหมายเยี่ยม 5 ธ.ค. ได้รับการติดต่อกลับแล้ว (อัปเดต 27 พ.ย.)" },
            { id: 205, name: "นางประนอม", vhv: "อสม. สมใจ", risk: "ปานกลาง", status: "รออนุมัติแผน", color: "border-primary", log: "เสนอแผนดูแลเบาหวานระยะ 2 (รอดำเนินการ)" }
        ];

        document.addEventListener('DOMContentLoaded', () => {
            renderPatientList();
            renderTeamChart();
        });

        // --- PATIENT LIST LOGIC ---
        function renderPatientList() {
            const listContainer = document.getElementById('patientList');
            listContainer.innerHTML = '';
            
            // Priority: Danger > Primary > Warning > Success/Info
            const sortedCases = [...mockCases].sort((a, b) => {
                const order = { 'danger': 4, 'primary': 3, 'warning': 2, 'success': 1, 'info': 1 };
                return order[b.color.split('-').pop()] - order[a.color.split('-').pop()];
            });


            sortedCases.forEach(p => {
                const card = document.createElement('div');
                card.id = `patient-${p.id}`;
                // Using Bootstrap classes for card styling
                card.className = `patient-card card shadow-sm mb-2 ${p.color}`;
                card.innerHTML = `
                    <div class="card-body p-3">
                        <div class="fw-bold text-dark fs-6">${p.name}</div>
                        <div class="small text-muted mb-1">อสม. ผู้รับผิดชอบ: ${p.vhv}</div>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge rounded-pill ${p.color.replace('border-', 'bg-')}">${p.risk}</span>
                            <span class="small fw-semibold text-secondary">${p.status}</span>
                        </div>
                    </div>
                `;
                card.onclick = () => selectPatient(p.id);
                listContainer.appendChild(card);
            });
        }

        function selectPatient(id) {
            activePatientId = id;
            const patient = mockCases.find(p => p.id === id);

            // Highlight active card
            document.querySelectorAll('.patient-card').forEach(card => card.classList.remove('active'));
            document.getElementById(`patient-${id}`).classList.add('active');

            // Update form display
            document.getElementById('activePatientName').innerText = patient.name;
            document.getElementById('vhvName').innerText = patient.vhv;
            document.getElementById('riskLevel').innerText = patient.risk;
            document.getElementById('riskLevel').className = `badge rounded-pill ${patient.color.replace('border-', 'bg-')}`;
            document.getElementById('latestLogDetails').innerText = patient.log;
            document.getElementById('caseSummary').classList.remove('d-none');
        }

        function handleCMAction(action) {
            if (!activePatientId) {
                showMessageBox('ข้อผิดพลาด', 'กรุณาเลือกเคสก่อนดำเนินการ');
                return;
            }
            
            const patientName = document.getElementById('activePatientName').innerText;
            
            showMessageBox('ดำเนินการสำเร็จ (จำลอง)', `CM ดำเนินการ "${action}" สำหรับเคสของ ${patientName} เรียบร้อยแล้ว`);
            
            // Logic to update case status (Mock)
            if (action === 'อนุมัติแผน') {
                const activeCase = mockCases.find(c => c.id === activePatientId);
                if (activeCase) {
                    activeCase.status = 'อนุมัติแล้ว';
                    activeCase.color = 'border-success';
                }
                renderPatientList();
                // Reset view after action
                document.getElementById('caseSummary').classList.add('d-none');
                document.getElementById('activePatientName').innerText = '*โปรดเลือกเคสที่ต้องการตรวจสอบจากรายชื่อด้านซ้าย*';
                document.querySelectorAll('.patient-card').forEach(card => card.classList.remove('active'));
                activePatientId = null;
            }
        }


        // --- CHART JS LOGIC (Bar Chart for Team Performance) ---
        function renderTeamChart() {
            const ctx = document.getElementById('cmTeamChart').getContext('2d');
            if (currentChart) currentChart.destroy();
            
            const data = {
                labels: ['อสม. สมใจ', 'อสม. บุญถึง', 'อสม. พรชัย', 'อสม. วรรณี'],
                datasets: [{
                    label: 'บันทึกเยี่ยมบ้าน (ราย)',
                    data: [15, 22, 10, 18], // Mock data: number of visits this month
                    backgroundColor: [
                        '#4f46e5', // Primary
                        '#818cf8', 
                        '#a5b4fc', 
                        '#c7d2fe'
                    ],
                    borderColor: '#4f46e5',
                    borderWidth: 1
                }]
            };

            currentChart = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: 'จำนวนการเยี่ยมบ้านของทีม อสม. ในเดือนนี้',
                            font: { size: 16, weight: 'bold', family: 'Sarabun' }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: { display: true, text: 'จำนวนเคส', font: { family: 'Sarabun' } }
                        },
                        x: {
                            title: { display: true, text: 'ชื่อ อสม.', font: { family: 'Sarabun' } }
                        }
                    }
                }
            });
        }
    </script>
</body>
</html>