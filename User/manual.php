


</body>
</html>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เอกสารคู่มือการใช้งาน</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome สำหรับไอคอน -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark-color);
        }
        
        .header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 2rem 0;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }
        
        .document-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 1.5rem;
            overflow: hidden;
            border: none;
        }
        
        .document-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 20px rgba(0, 0, 0, 0.15);
        }
        
        .card-header {
            background: linear-gradient(to right, var(--secondary-color), var(--primary-color));
            color: white;
            padding: 1rem 1.5rem;
            border-bottom: none;
        }
        
        .card-body {
            padding: 1.5rem;
        }
        
        .step-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 1.2rem;
            padding: 1rem;
            background-color: var(--light-color);
            border-radius: 8px;
            transition: background-color 0.2s;
        }
        
        .step-item:hover {
            background-color: #dfe6e9;
        }
        
        .step-number {
            background-color: var(--accent-color);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            flex-shrink: 0;
            font-weight: bold;
        }
        
        .footer {
            background-color: var(--dark-color);
            color: white;
            padding: 2rem 0;
            margin-top: 3rem;
            border-radius: 20px 20px 0 0;
        }
        
        .icon-wrapper {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 50px;
            height: 50px;
            background-color: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            margin-right: 15px;
        }
        
        @media (max-width: 768px) {
            .step-item {
                flex-direction: column;
            }
            
            .step-number {
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <!-- ส่วนหัว -->
    <!-- <header class="header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-4 fw-bold"><i class="fas fa-book me-3"></i>เอกสารคู่มือการใช้งาน</h1>
                    <p class="lead">คู่มือแนะนำการใช้งานอย่างละเอียดและเข้าใจง่าย</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <div class="d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
                        <div class="icon-wrapper">
                            <i class="fas fa-download fa-lg"></i>
                        </div>
                        <div>
                            <h5 class="mb-0">ดาวน์โหลดคู่มือ</h5>
                            <p class="mb-0">PDF Version</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header> -->
<?php include 'navbar.php'   ?>

    <!-- ส่วนเนื้อหา -->
    <main class="container">
        <div class="row">
            <!-- เอกสารที่ 1 -->
            <div class="col-lg-6 mb-4">
                <div class="document-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="h5 mb-0"><i class="fas fa-pills me-2"></i>คู่มือการรับประทานยา</h3>
                        <span class="badge bg-light text-dark">สำคัญ</span>
                    </div>
                    <div class="card-body">
                        <p class="card-text">คำแนะนำในการรับประทานยาอย่างถูกต้องและปลอดภัย</p>
                        
                        <div class="step-item">
                            <div class="step-number">1</div>
                            <div>
                                <h5 class="mb-1">อ่านฉลากยา</h5>
                                <p class="mb-0">ศึกษาข้อมูลบนฉลากยาให้เข้าใจก่อนรับประทาน</p>
                            </div>
                        </div>
                        
                        <div class="step-item">
                            <div class="step-number">2</div>
                            <div>
                                <h5 class="mb-1">รับประทานตามกำหนด</h5>
                                <p class="mb-0">รับประทานตามขนาดและเวลาที่แพทย์กำหนดอย่างเคร่งครัด</p>
                            </div>
                        </div>
                        
                        <div class="step-item">
                            <div class="step-number">3</div>
                            <div>
                                <h5 class="mb-1">สังเกตอาการ</h5>
                                <p class="mb-0">สังเกตอาการข้างเคียงและแจ้งแพทย์หากมีอาการผิดปกติ</p>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <a href="#" class="btn btn-primary me-2"><i class="fas fa-play-circle me-1"></i> ดูวิดีโอสอน</a>
                            <a href="#" class="btn btn-outline-secondary"><i class="fas fa-file-pdf me-1"></i> ดาวน์โหลด</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- เอกสารที่ 2 -->
            <div class="col-lg-6 mb-4">
                <div class="document-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="h5 mb-0"><i class="fas fa-bell me-2"></i>คู่มือการเตือนวิทยา</h3>
                        <span class="badge bg-warning text-dark">ใหม่</span>
                    </div>
                    <div class="card-body">
                        <p class="card-text">วิธีการตั้งค่าและใช้งานระบบเตือนวิทยาเพื่อประสิทธิภาพสูงสุด</p>
                        
                        <div class="step-item">
                            <div class="step-number">1</div>
                            <div>
                                <h5 class="mb-1">ตั้งค่าการแจ้งเตือน</h5>
                                <p class="mb-0">กำหนดประเภทและความถี่ของการแจ้งเตือนตามความต้องการ</p>
                            </div>
                        </div>
                        
                        <div class="step-item">
                            <div class="step-number">2</div>
                            <div>
                                <h5 class="mb-1">ทดสอบระบบ</h5>
                                <p class="mb-0">ทดสอบการทำงานของระบบเตือนวิทยาก่อนใช้งานจริง</p>
                            </div>
                        </div>
                        
                        <div class="step-item">
                            <div class="step-number">3</div>
                            <div>
                                <h5 class="mb-1">ตรวจสอบเป็นประจำ</h5>
                                <p class="mb-0">ตรวจสอบระบบและอัพเดทซอฟต์แวร์อย่างสม่ำเสมอ</p>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <a href="#" class="btn btn-primary me-2"><i class="fas fa-play-circle me-1"></i> ดูวิดีโอสอน</a>
                            <a href="#" class="btn btn-outline-secondary"><i class="fas fa-file-pdf me-1"></i> ดาวน์โหลด</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- เอกสารที่ 3 -->
            <div class="col-lg-6 mb-4">
                <div class="document-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="h5 mb-0"><i class="fas fa-stethoscope me-2"></i>คู่มือการรับประทานยา (ฉบับละเอียด)</h3>
                        <span class="badge bg-info">อัพเดท</span>
                    </div>
                    <div class="card-body">
                        <p class="card-text">คู่มือฉบับสมบูรณ์สำหรับการรับประทานยาทุกประเภท</p>
                        
                        <div class="step-item">
                            <div class="step-number">1</div>
                            <div>
                                <h5 class="mb-1">เตรียมยา</h5>
                                <p class="mb-0">จัดเตรียมยาตามจำนวนและชนิดที่ต้องรับประทาน</p>
                            </div>
                        </div>
                        
                        <div class="step-item">
                            <div class="step-number">2</div>
                            <div>
                                <h5 class="mb-1">รับประทานพร้อมน้ำ</h5>
                                <p class="mb-0">รับประทานยาพร้อมกับน้ำสะอาดในปริมาณที่เหมาะสม</p>
                            </div>
                        </div>
                        
                        <div class="step-item">
                            <div class="step-number">3</div>
                            <div>
                                <h5 class="mb-1">บันทึกการรับประทาน</h5>
                                <p class="mb-0">บันทึกเวลารับประทานยาเพื่อป้องกันการลืมหรือรับประทานซ้ำ</p>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <a href="#" class="btn btn-primary me-2"><i class="fas fa-play-circle me-1"></i> ดูวิดีโอสอน</a>
                            <a href="#" class="btn btn-outline-secondary"><i class="fas fa-file-pdf me-1"></i> ดาวน์โหลด</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- เอกสารที่ 4 (ตัวอย่างเพิ่มเติม) -->
            <div class="col-lg-6 mb-4">
                <div class="document-card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3 class="h5 mb-0"><i class="fas fa-first-aid me-2"></i>คู่มือปฐมพยาบาลเบื้องต้น</h3>
                        <span class="badge bg-success">แนะนำ</span>
                    </div>
                    <div class="card-body">
                        <p class="card-text">วิธีการปฐมพยาบาลเบื้องต้นสำหรับเหตุการณ์ต่างๆ</p>
                        
                        <div class="step-item">
                            <div class="step-number">1</div>
                            <div>
                                <h5 class="mb-1">ประเมินสถานการณ์</h5>
                                <p class="mb-0">ตรวจสอบความปลอดภัยของพื้นที่และสภาพผู้ป่วย</p>
                            </div>
                        </div>
                        
                        <div class="step-item">
                            <div class="step-number">2</div>
                            <div>
                                <h5 class="mb-1">โทรขอความช่วยเหลือ</h5>
                                <p class="mb-0">โทรแจ้งหน่วยกู้ชีพ 1669 ทันทีในกรณีฉุกเฉิน</p>
                            </div>
                        </div>
                        
                        <div class="step-item">
                            <div class="step-number">3</div>
                            <div>
                                <h5 class="mb-1">ปฐมพยาบาล</h5>
                                <p class="mb-0">ทำการปฐมพยาบาลเบื้องต้นตามอาการ</p>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <a href="#" class="btn btn-primary me-2"><i class="fas fa-play-circle me-1"></i> ดูวิดีโอสอน</a>
                            <a href="#" class="btn btn-outline-secondary"><i class="fas fa-file-pdf me-1"></i> ดาวน์โหลด</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

   

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

       <?php include 'bottom_nav.php' ?>
    <?php include 'footer.php'   ?>

 
        
</body>
</html>