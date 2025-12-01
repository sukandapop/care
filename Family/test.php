<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo - ระบบผู้ดูแลในครอบครัว</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --info: #36b9cc;
            --warning: #f6c23e;
            --danger: #e74a3b;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
        }
        
        .demo-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .demo-header {
            background: linear-gradient(135deg, #4cc9f0 0%, #5d98ff 100%);
            color: white;
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .role-badge {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }
        
        .role-badge.asm {
            background: rgba(76, 201, 240, 0.2);
            color: #4cc9f0;
            border: 1px solid #4cc9f0;
        }
        
        .role-badge.family {
            background: rgba(114, 9, 183, 0.2);
            color: #7209b7;
            border: 1px solid #7209b7;
        }
        
        .demo-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }
        
        .demo-card:hover {
            transform: translateY(-5px);
        }
        
        .feature-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .permission-table th {
            background: #f8f9fa;
            font-weight: 600;
        }
        
        .elderly-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
        }
        
        .status-indicator {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            margin-right: 5px;
        }
        
        .status-normal { background: #28a745; }
        .status-warning { background: #ffc107; }
        .status-danger { background: #dc3545; }
        
        .chat-bubble {
            max-width: 70%;
            padding: 10px 15px;
            border-radius: 15px;
            margin-bottom: 10px;
        }
        
        .chat-bubble.received {
            background: #f1f3f5;
            align-self: flex-start;
        }
        
        .chat-bubble.sent {
            background: #4cc9f0;
            color: white;
            align-self: flex-end;
        }
    </style>
</head>
<body>
    <div class="demo-container">
        <!-- Header -->
        <div class="demo-header">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h3 fw-bold mb-2">Care Connect</h1>
                    <p class="mb-0">Demo ระบบสำหรับผู้ดูแลในครอบครัว</p>
                </div>
                <div>
                    <span class="role-badge family me-2">
                        <i class="fas fa-family me-1"></i>ผู้ดูแลในครอบครัว
                    </span>
                    <span class="role-badge asm">
                        <i class="fas fa-user-md me-1"></i>อสม.
                    </span>
                </div>
            </div>
        </div>
        
        <!-- ข้อมูลผู้ดูแล -->
        <div class="demo-card">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h4 class="fw-bold mb-1">คุณสมชาย รักดี</h4>
                    <p class="text-muted mb-2">ผู้ดูแลในครอบครัว - เป็นลูกของพ่อสมชาย ใจดี</p>
                    <p><i class="fas fa-envelope me-2 text-primary"></i>somchai@example.com</p>
                </div>
                <div class="col-md-4 text-end">
                    <button class="btn btn-outline-primary" onclick="switchRole()">
                        <i class="fas fa-sync-alt me-2"></i>เปลี่ยนบทบาทเป็น อสม.
                    </button>
                </div>
            </div>
        </div>
        
        <div class="row">
            <!-- Column 1: ผู้สูงอายุที่ดูแล -->
            <div class="col-lg-4">
                <div class="demo-card">
                    <h5 class="fw-bold mb-3">
                        <i class="fas fa-users me-2 text-primary"></i>ผู้สูงอายุที่ดูแล
                    </h5>
                    
                    <div class="mb-3">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" class="elderly-avatar me-3">
                            <div>
                                <h6 class="fw-bold mb-1">สมชาย ใจดี <span class="badge bg-success">พ่อ</span></h6>
                                <div class="small">
                                    <span class="status-indicator status-normal"></span>สุขภาพปกติ
                                    <span class="text-muted ms-2">อายุ 72 ปี</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center">
                            <img src="https://cdn-icons-png.flaticon.com/512/149/149072.png" class="elderly-avatar me-3">
                            <div>
                                <h6 class="fw-bold mb-1">สมศรี เมืองดี <span class="badge bg-info">แม่</span></h6>
                                <div class="small">
                                    <span class="status-indicator status-warning"></span>เฝ้าระวัง
                                    <span class="text-muted ms-2">อายุ 68 ปี</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        คุณสามารถดูข้อมูลได้เฉพาะผู้สูงอายุที่คุณดูแลเท่านั้น
                    </div>
                </div>
                
                <!-- คลังความรู้ -->
                <div class="demo-card">
                    <h5 class="fw-bold mb-3">
                        <i class="fas fa-book me-2 text-warning"></i>คลังความรู้ล่าสุด
                    </h5>
                    
                    <div class="mb-3">
                        <div class="d-flex align-items-start mb-2">
                            <i class="fas fa-file-medical text-success me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1">อาหารสำหรับผู้สูงอายุเบาหวาน</h6>
                                <p class="small text-muted mb-0">แนวทางการควบคุมอาหารและเมนูแนะนำ</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-start mb-2">
                            <i class="fas fa-running text-primary me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1">การออกกำลังกายสำหรับผู้สูงอายุ</h6>
                                <p class="small text-muted mb-0">ท่าง่ายๆ ที่ทำได้ที่บ้าน</p>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-start">
                            <i class="fas fa-pills text-danger me-2 mt-1"></i>
                            <div>
                                <h6 class="fw-bold mb-1">การจัดการยาสำหรับผู้สูงอายุ</h6>
                                <p class="small text-muted mb-0">วิธีการรับประทานยาที่ถูกต้อง</p>
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-outline-warning w-100" onclick="showKnowledge()">
                        <i class="fas fa-book-open me-2"></i>ดูคลังความรู้ทั้งหมด
                    </button>
                </div>
            </div>
            
            <!-- Column 2: ฟีเจอร์หลัก -->
            <div class="col-lg-8">
                <!-- เมนูฟีเจอร์ -->
                <div class="row mb-4">
                    <div class="col-md-6 mb-3">
                        <div class="demo-card h-100">
                            <div class="feature-icon" style="background: rgba(76, 201, 240, 0.1); color: #4cc9f0;">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                            <h5 class="fw-bold mb-2">รายงานสุขภาพ</h5>
                            <p class="text-muted small mb-3">ดูผลตรวจสุขภาพ ความดัน น้ำตาลในเลือด และประวัติการรักษา</p>
                            <button class="btn btn-primary" onclick="showHealthReport()">
                                <i class="fas fa-chart-line me-2"></i>ดูรายงาน
                            </button>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <div class="demo-card h-100">
                            <div class="feature-icon" style="background: rgba(114, 9, 183, 0.1); color: #7209b7;">
                                <i class="fas fa-calendar-check"></i>
                            </div>
                            <h5 class="fw-bold mb-2">นัดหมาย</h5>
                            <p class="text-muted small mb-3">ดูตารางนัดหมายแพทย์ การเยี่ยมบ้าน และกิจกรรมต่างๆ</p>
                            <button class="btn btn-primary" onclick="showAppointment()">
                                <i class="fas fa-calendar-alt me-2"></i>ดูนัดหมาย
                            </button>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <div class="demo-card h-100">
                            <div class="feature-icon" style="background: rgba(32, 201, 151, 0.1); color: #20c997;">
                                <i class="fas fa-comments"></i>
                            </div>
                            <h5 class="fw-bold mb-2">พูดคุยกับอสม.</h5>
                            <p class="text-muted small mb-3">สอบถามข้อมูล ปรึกษาปัญหา และรับคำแนะนำ</p>
                            <button class="btn btn-primary" onclick="showChat()">
                                <i class="fas fa-comment-dots me-2"></i>เริ่มแชท
                            </button>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <div class="demo-card h-100">
                            <div class="feature-icon" style="background: rgba(255, 193, 7, 0.1); color: #ffc107;">
                                <i class="fas fa-book-medical"></i>
                            </div>
                            <h5 class="fw-bold mb-2">คลังความรู้</h5>
                            <p class="text-muted small mb-3">ความรู้เกี่ยวกับการดูแลสุขภาพและผู้สูงอายุ</p>
                            <button class="btn btn-primary" onclick="showKnowledge()">
                                <i class="fas fa-graduation-cap me-2"></i>ดูความรู้
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- ตารางเปรียบเทียบสิทธิ์ -->
                <div class="demo-card">
                    <h5 class="fw-bold mb-3">
                        <i class="fas fa-user-shield me-2 text-info"></i>เปรียบเทียบสิทธิ์การใช้งาน
                    </h5>
                    
                    <div class="table-responsive">
                        <table class="table permission-table">
                            <thead>
                                <tr>
                                    <th>ฟีเจอร์</th>
                                    <th class="text-center">อสม.</th>
                                    <th class="text-center">ผู้ดูแล</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>บันทึกข้อมูลผู้สูงอายุ</td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                    <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                                </tr>
                                <tr>
                                    <td>บันทึกเยี่ยมบ้าน</td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                    <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                                </tr>
                                <tr>
                                    <td>บันทึกผลตรวจสุขภาพ</td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                    <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                                </tr>
                                <tr>
                                    <td>ดูรายงานสุขภาพ</td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                </tr>
                                <tr>
                                    <td>ดูนัดหมาย</td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                </tr>
                                <tr>
                                    <td>พูดคุย/แชท</td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                </tr>
                                <tr>
                                    <td>ดูคลังความรู้</td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                </tr>
                                <tr>
                                    <td>เพิ่ม/แก้ไขผู้สูงอายุ</td>
                                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                                    <td class="text-center"><i class="fas fa-times text-danger"></i></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal สำหรับรายงานสุขภาพ -->
    <div class="modal fade" id="healthModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-heartbeat me-2 text-primary"></i>รายงานสุขภาพ - สมชาย ใจดี
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">ข้อมูลล่าสุด (15 พ.ย. 2023)</h6>
                            <div class="mb-3">
                                <label class="form-label">ความดันโลหิต</label>
                                <div class="alert alert-info">
                                    <div class="d-flex justify-content-between">
                                        <span>125/80 mmHg</span>
                                        <span class="badge bg-success">ปกติ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">น้ำตาลในเลือด</label>
                                <div class="alert alert-info">
                                    <div class="d-flex justify-content-between">
                                        <span>110 mg/dL</span>
                                        <span class="badge bg-success">ปกติ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">น้ำหนัก</label>
                                <div class="alert alert-info">
                                    <div class="d-flex justify-content-between">
                                        <span>68 kg</span>
                                        <span class="badge bg-success">ปกติ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">ประวัติการตรวจ</h6>
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>วันที่</th>
                                            <th>ความดัน</th>
                                            <th>น้ำตาล</th>
                                            <th>น้ำหนัก</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>15/11/2023</td>
                                            <td>125/80</td>
                                            <td>110</td>
                                            <td>68 kg</td>
                                        </tr>
                                        <tr>
                                            <td>01/11/2023</td>
                                            <td>130/85</td>
                                            <td>115</td>
                                            <td>67.5 kg</td>
                                        </tr>
                                        <tr>
                                            <td>15/10/2023</td>
                                            <td>128/82</td>
                                            <td>108</td>
                                            <td>68 kg</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-print me-2"></i>พิมพ์รายงาน
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal สำหรับนัดหมาย -->
    <div class="modal fade" id="appointmentModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-calendar-check me-2 text-primary"></i>นัดหมาย - สมชาย ใจดี
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        คุณสามารถดูตารางนัดหมายได้ แต่ไม่สามารถเพิ่มหรือแก้ไขนัดหมายได้
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>วันที่</th>
                                    <th>เวลา</th>
                                    <th>ประเภท</th>
                                    <th>สถานที่</th>
                                    <th>สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>20 พ.ย. 2023</td>
                                    <td>09:00</td>
                                    <td>นัดตรวจสุขภาพประจำปี</td>
                                    <td>โรงพยาบาลชุมชน</td>
                                    <td><span class="badge bg-warning">รอตรวจ</span></td>
                                </tr>
                                <tr>
                                    <td>22 พ.ย. 2023</td>
                                    <td>10:30</td>
                                    <td>เยี่ยมบ้านโดยอสม.</td>
                                    <td>บ้านพัก</td>
                                    <td><span class="badge bg-info">รอเยี่ยม</span></td>
                                </tr>
                                <tr>
                                    <td>25 พ.ย. 2023</td>
                                    <td>14:00</td>
                                    <td>กิจกรรมออกกำลังกาย</td>
                                    <td>ศูนย์สุขภาพชุมชน</td>
                                    <td><span class="badge bg-success">เข้าร่วม</span></td>
                                </tr>
                                <tr>
                                    <td>30 พ.ย. 2023</td>
                                    <td>08:30</td>
                                    <td>รับยาประจำเดือน</td>
                                    <td>คลินิกชุมชน</td>
                                    <td><span class="badge bg-secondary">รอดำเนินการ</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-calendar-plus me-2"></i>แจ้งเตือนทาง Line
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal สำหรับแชท -->
    <div class="modal fade" id="chatModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-comments me-2 text-primary"></i>แชทกับ อสม. สมร
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        คุณสามารถพูดคุย สอบถามข้อมูล หรือปรึกษาปัญหาเกี่ยวกับการดูแลผู้สูงอายุได้ที่นี่
                    </div>
                    
                    <div class="chat-container d-flex flex-column" style="height: 300px; overflow-y: auto; padding: 10px; background: #f8f9fa; border-radius: 10px;">
                        <div class="chat-bubble received">
                            <strong>อสม. สมร:</strong> สวัสดีค่ะ คุณสมชาย รักษาสุขภาพพ่อเป็นอย่างไรบ้างคะ?
                        </div>
                        <div class="chat-bubble sent">
                            <strong>คุณ:</strong> สวัสดีครับ พ่อสบายดีครับ ความดันวัดวันนี้ปกติ
                        </div>
                        <div class="chat-bubble received">
                            <strong>อสม. สมร:</strong> ดีใจด้วยค่ะ อย่าลืมพาพ่อไปรับยาประจำเดือนวันที่ 30 นะคะ
                        </div>
                        <div class="chat-bubble sent">
                            <strong>คุณ:</strong> ขอบคุณครับ จะพาไปตามนัดแน่นอนครับ
                        </div>
                    </div>
                    
                    <div class="mt-3">
                        <textarea class="form-control" rows="2" placeholder="พิมพ์ข้อความของคุณที่นี่..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="button" class="btn btn-primary">
                        <i class="fas fa-paper-plane me-2"></i>ส่งข้อความ
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal สำหรับคลังความรู้ -->
    <div class="modal fade" id="knowledgeModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-book me-2 text-warning"></i>คลังความรู้
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="fw-bold"><i class="fas fa-heart text-danger me-2"></i>สุขภาพหัวใจ</h6>
                                    <p class="small text-muted">วิธีดูแลสุขภาพหัวใจสำหรับผู้สูงอายุ</p>
                                    <button class="btn btn-sm btn-outline-primary">อ่านเพิ่ม</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="fw-bold"><i class="fas fa-utensils text-success me-2"></i>โภชนาการ</h6>
                                    <p class="small text-muted">อาหารที่เหมาะสมสำหรับผู้สูงอายุ</p>
                                    <button class="btn btn-sm btn-outline-primary">อ่านเพิ่ม</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="fw-bold"><i class="fas fa-brain text-info me-2"></i>สุขภาพจิต</h6>
                                    <p class="small text-muted">การดูแลสุขภาพจิตและป้องกันอัลไซเมอร์</p>
                                    <button class="btn btn-sm btn-outline-primary">อ่านเพิ่ม</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="fw-bold"><i class="fas fa-running text-primary me-2"></i>การออกกำลังกาย</h6>
                                    <p class="small text-muted">ท่าออกกำลังกายที่ปลอดภัยสำหรับผู้สูงอายุ</p>
                                    <button class="btn btn-sm btn-outline-primary">อ่านเพิ่ม</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="fw-bold"><i class="fas fa-bed text-secondary me-2"></i>การนอนหลับ</h6>
                                    <p class="small text-muted">เทคนิคการนอนหลับที่มีคุณภาพ</p>
                                    <button class="btn btn-sm btn-outline-primary">อ่านเพิ่ม</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 class="fw-bold"><i class="fas fa-pills text-warning me-2"></i>การใช้ยา</h6>
                                    <p class="small text-muted">วิธีการรับประทานยาที่ถูกต้องและปลอดภัย</p>
                                    <button class="btn btn-sm btn-outline-primary">อ่านเพิ่ม</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // ฟังก์ชันเปิด Modal
        function showHealthReport() {
            const modal = new bootstrap.Modal(document.getElementById('healthModal'));
            modal.show();
        }
        
        function showAppointment() {
            const modal = new bootstrap.Modal(document.getElementById('appointmentModal'));
            modal.show();
        }
        
        function showChat() {
            const modal = new bootstrap.Modal(document.getElementById('chatModal'));
            modal.show();
        }
        
        function showKnowledge() {
            const modal = new bootstrap.Modal(document.getElementById('knowledgeModal'));
            modal.show();
        }
        
        // ฟังก์ชันเปลี่ยนบทบาท (สำหรับ Demo)
        function switchRole() {
            if (confirm('ต้องการเปลี่ยนไปหน้า Dashboard ของอสม. หรือไม่?')) {
                // ในระบบจริงจะ redirect ไปหน้า login เพื่อเลือกบทบาทใหม่
                // สำหรับ Demo เราจะแค่แสดง alert
                alert('ระบบจะเปลี่ยนไปหน้า Dashboard ของอสม.\n\nในระบบจริงจะมีการล็อกเอาต์และล็อกอินใหม่');
                // window.location.href = 'index.php'; // ในระบบจริง
            }
        }
        
        // แสดงคำแนะนำเมื่อโหลดหน้า
        window.onload = function() {
            setTimeout(function() {
                alert('ยินดีต้อนรับสู่ Demo ระบบผู้ดูแลในครอบครัว!\n\nคุณสามารถทดสอบฟีเจอร์ต่างๆ ได้โดยคลิกที่ปุ่มต่างๆ ในหน้าเว็บ');
            }, 1000);
        }
    </script>
</body>
</html>