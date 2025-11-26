<!DOCTYPE html>
<html lang="th">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>การนัดหมายผู้ป่วย | Care Connect</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background: #f0f7ff;
    }
    .appointment-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }
    .title {
        font-size: 26px;
        font-weight: bold;
        color: #1e88e5;
        margin-bottom: 20px;
    }
</style>

</head>
<body>
 <?php include('navbar.php');  ?> 
 <?php include 'bottom_nav.php'; ?>

<div class="container mt-5 mb-5">
    <div class="appointment-card mx-auto col-lg-6 col-md-8 col-12">

        <div class="title text-center">📅 แบบฟอร์มการนัดหมายผู้ป่วย</div>

        <form action="save_appointment.php" method="POST">

            <!-- ชื่อผู้ป่วย -->
            <div class="mb-3">
                <label class="form-label">ชื่อ - นามสกุลผู้ป่วย</label>
                <input type="text" class="form-control" name="patient_name" required>
            </div>

            <!-- เบอร์โทร -->
            <div class="mb-3">
                <label class="form-label">เบอร์โทรผู้ป่วย</label>
                <input type="text" class="form-control" name="patient_phone" maxlength="10" required>
            </div>

            <!-- ประเภทการนัดหมาย -->
            <div class="mb-3">
                <label class="form-label">ประเภทการนัดหมาย</label>
                <select class="form-select" name="appointment_type" required>
                    <option value="">-- เลือกประเภท --</option>
                    <option value="ตรวจสุขภาพทั่วไป">ตรวจสุขภาพทั่วไป</option>
                    <option value="ติดตามอาการ">ติดตามอาการ</option>
                    <option value="ตรวจเยี่ยมบ้าน">ตรวจเยี่ยมบ้าน</option>
                    <option value="ปรึกษาสุขภาพจิต">ปรึกษาสุขภาพจิต</option>
                </select>
            </div>

            <!-- วันที่ -->
            <div class="mb-3">
                <label class="form-label">วันที่นัดหมาย</label>
                <input type="date" class="form-control" name="appointment_date" required>
            </div>

            <!-- เวลา -->
            <div class="mb-3">
                <label class="form-label">เวลาที่นัดหมาย</label>
                <input type="time" class="form-control" name="appointment_time" required>
            </div>

            <!-- หมายเหตุ -->
            <div class="mb-3">
                <label class="form-label">รายละเอียดเพิ่มเติม (ถ้ามี)</label>
                <textarea class="form-control" name="note" rows="3"></textarea>
            </div>

            <!-- ปุ่มบันทึก -->
            <button type="submit" class="btn btn-primary w-100">
                ✔ บันทึกการนัดหมาย
            </button>

        </form>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
