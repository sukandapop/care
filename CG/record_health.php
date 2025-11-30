<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกผลตรวจสุขภาพประจำเดือน</title>
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

        .health-card {
            border-radius: 12px;
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .health-card:hover {
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

        .nav-pills .nav-link {
            border-radius: 8px;
            margin: 0 0.25rem;
            color: #555;
            font-weight: 500;
        }

        .nav-pills .nav-link.active {
            background-color: var(--primary);
            color: white;
        }

        .status-indicator {
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 0.5rem;
        }

        .status-normal {
            background-color: #28a745;
        }

        .status-warning {
            background-color: #ffc107;
        }

        .status-danger {
            background-color: #dc3545;
        }

        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
            color: #333;
        }

        .report-section {
            background-color: white;
            border-radius: 12px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }

        .month-year-selector {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h2 fw-bold text-dark">บันทึกผลตรวจสุขภาพประจำเดือน</h1>
                <p class="text-muted">กรอกข้อมูลผลตรวจสุขภาพเพื่อทำสรุปรายงานรายเดือนและรายปี</p>
            </div>
            <a href="index.php" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i>กลับหน้าหลัก
            </a>
        </div>

        <div class="row">
            <div class="col-lg-8">
                <!-- ฟอร์มบันทึกข้อมูลสุขภาพ -->
                <div class="card health-card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="card-title mb-0"><i class="bi bi-heart-pulse me-2"></i>ฟอร์มบันทึกผลตรวจสุขภาพ</h5>
                    </div>
                    <div class="card-body">
                        <form id="healthRecordForm">
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
                                    <label for="recordDate" class="form-label">วันที่บันทึก</label>
                                    <input type="date" class="form-control" id="recordDate" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="systolic" class="form-label">ความดันตัวบน (mmHg)</label>
                                    <input type="number" class="form-control" id="systolic" min="70" max="200" placeholder="120">
                                </div>
                                <div class="col-md-4">
                                    <label for="diastolic" class="form-label">ความดันตัวล่าง (mmHg)</label>
                                    <input type="number" class="form-control" id="diastolic" min="40" max="130" placeholder="80">
                                </div>
                                <div class="col-md-4">
                                    <label for="pulse" class="form-label">อัตราการเต้นหัวใจ (ครั้ง/นาที)</label>
                                    <input type="number" class="form-control" id="pulse" min="40" max="150" placeholder="72">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="bloodSugar" class="form-label">น้ำตาลในเลือด (mg/dL)</label>
                                    <input type="number" class="form-control" id="bloodSugar" min="50" max="300" placeholder="100">
                                </div>
                                <div class="col-md-4">
                                    <label for="weight" class="form-label">น้ำหนัก (kg)</label>
                                    <input type="number" class="form-control" id="weight" min="30" max="120" step="0.1" placeholder="65.5">
                                </div>
                                <div class="col-md-4">
                                    <label for="height" class="form-label">ส่วนสูง (cm)</label>
                                    <input type="number" class="form-control" id="height" min="100" max="200" placeholder="165">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="symptoms" class="form-label">อาการหรือข้อสังเกต</label>
                                <textarea class="form-control" id="symptoms" rows="3" placeholder="บันทึกอาการหรือข้อสังเกตเพิ่มเติม"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="medication" class="form-label">ยาที่รับประทานประจำ</label>
                                <textarea class="form-control" id="medication" rows="2" placeholder="บันทึกยาที่รับประทานประจำ"></textarea>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button type="reset" class="btn btn-outline-secondary me-md-2">ล้างข้อมูล</button>
                                <button type="submit" class="btn btn-primary">บันทึกข้อมูล</button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- ตารางบันทึกล่าสุด -->
                <div class="card health-card">
                    <div class="card-header bg-light">
                        <h5 class="card-title mb-0"><i class="bi bi-clock-history me-2"></i>บันทึกล่าสุด</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>วันที่</th>
                                        <th>ชื่อ-นามสกุล</th>
                                        <th>ความดัน</th>
                                        <th>น้ำตาลในเลือด</th>
                                        <th>น้ำหนัก</th>
                                        <th>สถานะ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>15/11/2023</td>
                                        <td>สมชาย ใจดี</td>
                                        <td>125/80</td>
                                        <td>110 mg/dL</td>
                                        <td>68 kg</td>
                                        <td><span class="status-indicator status-normal"></span>ปกติ</td>
                                    </tr>
                                    <tr>
                                        <td>10/11/2023</td>
                                        <td>บุญมี รักดี</td>
                                        <td>140/90</td>
                                        <td>135 mg/dL</td>
                                        <td>72 kg</td>
                                        <td><span class="status-indicator status-warning"></span>เฝ้าระวัง</td>
                                    </tr>
                                    <tr>
                                        <td>05/11/2023</td>
                                        <td>ขันทอง ใจงาม</td>
                                        <td>150/95</td>
                                        <td>160 mg/dL</td>
                                        <td>75 kg</td>
                                        <td><span class="status-indicator status-danger"></span>เสี่ยง</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

           
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ตั้งค่าวันที่ปัจจุบันเป็นค่าเริ่มต้น
        document.getElementById('recordDate').valueAsDate = new Date();
        
        // จัดการการส่งฟอร์ม
        document.getElementById('healthRecordForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // รับค่าจากฟอร์ม
            const elderlyName = document.getElementById('elderlySelect').options[document.getElementById('elderlySelect').selectedIndex].text;
            const recordDate = document.getElementById('recordDate').value;
            
            // แสดงการยืนยัน
            alert(`บันทึกข้อมูลสุขภาพสำหรับ ${elderlyName} วันที่ ${recordDate} สำเร็จแล้ว`);
            
            // รีเซ็ตฟอร์ม
            this.reset();
            document.getElementById('recordDate').valueAsDate = new Date();
        });

        // คำนวณ BMI เมื่อกรอกน้ำหนักและส่วนสูง
        document.getElementById('weight').addEventListener('input', calculateBMI);
        document.getElementById('height').addEventListener('input', calculateBMI);

        function calculateBMI() {
            const weight = parseFloat(document.getElementById('weight').value);
            const height = parseFloat(document.getElementById('height').value) / 100; // แปลงเป็นเมตร
            
            if (weight && height) {
                const bmi = (weight / (height * height)).toFixed(1);
                // สามารถแสดงค่า BMI ได้ที่นี่หากต้องการ
                console.log(`BMI: ${bmi}`);
            }
        }
    </script>
</body>
</html>