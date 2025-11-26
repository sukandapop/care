<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ยืนยันการนัดหมาย | Care Connect</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background: #e6f7ff; /* สีพื้นหลังที่สว่างขึ้น */
    }
    .confirmation-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.15); /* เงาที่ชัดเจนขึ้น */
        border-top: 5px solid #28a745; /* แถบสีเขียวด้านบนเพื่อสื่อถึงความสำเร็จ */
    }
    .title {
        font-size: 28px;
        font-weight: bold;
        color: #28a745; /* สีเขียวสำหรับความสำเร็จ */
        margin-bottom: 25px;
    }
    .detail-item {
        margin-bottom: 15px;
        padding: 10px 0;
        border-bottom: 1px solid #eee;
    }
    .detail-item:last-child {
        border-bottom: none;
    }
    .detail-label {
        font-weight: 600;
        color: #495057;
    }
    .detail-value {
        color: #1e88e5;
        font-weight: bold;
    }
</style>

</head>
<body>
 <?php include('navbar.php');  ?> 
 <?php include 'bottom_nav.php'; ?>

<div class="container mt-5 mb-5">
    <div class="confirmation-card mx-auto col-lg-7 col-md-9 col-12">

        <div class="title text-center">
            <i class="bi bi-check-circle-fill me-2"></i> ✅ การนัดหมายสำเร็จแล้ว
        </div>
        <p class="text-center text-muted mb-4">ระบบได้รับข้อมูลการนัดหมายของคุณแล้ว กรุณาตรวจสอบรายละเอียดด้านล่าง</p>

        <h4 class="mb-3 text-primary">รายละเอียดการนัดหมาย</h4>
        
        <div class="row">
            <div class="col-md-12 detail-item">
                <span class="detail-label">ชื่อ - นามสกุลผู้ป่วย:</span>
                <span class="detail-value float-end"></span>
            </div>

            <div class="col-md-12 detail-item">
                <span class="detail-label">เบอร์โทรผู้ป่วย:</span>
                <span class="detail-value float-end"></span>
            </div>

            <div class="col-md-12 detail-item">
                <span class="detail-label">ประเภทการนัดหมาย:</span>
                <span class="detail-value float-end"></span>
            </div>

            <div class="col-md-6 col-12 detail-item">
                <span class="detail-label">วันที่นัดหมาย:</span>
                <span class="detail-value float-end"></span>
            </div>

            <div class="col-md-6 col-12 detail-item">
                <span class="detail-label">เวลาที่นัดหมาย:</span>
                <span class="detail-value float-end">น.</span>
            </div>

            <div class="col-md-12 detail-item">
                <div class="detail-label">รายละเอียดเพิ่มเติม:</div>
                <p class="mt-2 p-3 bg-light rounded border"></p>
            </div>
        </div>
        
        <hr>

        <div class="text-center mt-4">
            <a href="index.php" class="btn btn-outline-primary me-2">กลับสู่หน้าหลัก</a>
            <button class="btn btn-success" onclick="window.print();">พิมพ์ใบยืนยัน</button>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>