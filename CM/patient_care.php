<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบติดตามการดูแลผู้ป่วย</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Sarabun', sans-serif;
            padding-top: 20px;
        }
        .header {
            background-color: #2c7fb8;
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .section-title {
            color: #2c7fb8;
            border-bottom: 2px solid #2c7fb8;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
        }
        .family-card {
            border-left: 5px solid #7fcdbb;
        }
        .volunteer-card {
            border-left: 5px solid #edf8b1;
        }
        .patient-list {
            max-height: 200px;
            overflow-y: auto;
        }
        .stat-card {
            background-color: #2c7fb8;
            color: white;
            padding: 15px;
            border-radius: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header text-center">
            <h1>ระบบติดตามการดูแลผู้ป่วย</h1>
            <p class="lead">ข้อมูลการดูแลผู้ป่วยโดยครอบครัวและอาสาสมัครสาธารณสุขประจำหมู่บ้าน (อสม.)</p>
        </div>

        <!-- สถิติโดยรวม -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="stat-card">
                    <h4>จำนวนครอบครัวทั้งหมด</h4>
                    <h2>53</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <h4>จำนวนผู้ป่วยทั้งหมด</h4>
                    <h2>53</h2>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <h4>จำนวนอสม.</h4>
                    <h2>8</h2>
                </div>
            </div>
        </div>

        <!-- ส่วนแสดงข้อมูลครอบครัว -->
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="section-title">การดูแลโดยครอบครัว</h2>
                <!-- <p class="text-muted">(1 ครอบครัว ดูแลผู้ป่วย 1 คน)</p> -->
            </div>
        </div>

        <div class="row" id="family-section">
            <!-- ข้อมูลครอบครัวจะถูกเพิ่มโดย JavaScript -->
        </div>

        <!-- ส่วนแสดงข้อมูลอสม. -->
        <div class="row mb-4 mt-5">
            <div class="col-12">
                <h2 class="section-title">การดูแลโดยอาสาสมัครสาธารณสุข (อสม.)</h2>
                <p class="text-muted">(อสม. 8 คน ดูแลผู้ป่วยเฉลี่ยคนละ 6-7 คน)</p>
            </div>
        </div>

        <div class="row" id="volunteer-section">
            <!-- ข้อมูลอสม.จะถูกเพิ่มโดย JavaScript -->
        </div>
    </div>

    <script>
        // ข้อมูลตัวอย่างสำหรับครอบครัว
        const families = [
            { id: 1, name: "ครอบครัว สมบูรณ์", patient: "นายก้องเกียรติ สมบูรณ์" },
            { id: 2, name: "ครอบครัว ใจดี", patient: "นางสมใจ ใจดี" },
            { id: 3, name: "ครอบครัว วัฒนา", patient: "นายวัฒนา มีสุข" },
            { id: 4, name: "ครอบครัว พัฒนา", patient: "นางสาวพัฒน์นรี พัฒนา" },
            { id: 5, name: "ครอบครัว ศรีสุข", patient: "นายสุขใจ ศรีสุข" },
            { id: 6, name: "ครอบครัว ทรัพย์สิน", patient: "นางทรัพย์สิน ใจกว้าง" },
            { id: 7, name: "ครอบครัว มั่นคง", patient: "นายมั่นคง วัฒนา" },
            { id: 8, name: "ครอบครัว เกษมสุข", patient: "นางเกษมสุข สุขใจ" },
            { id: 9, name: "ครอบครัว รุ่งเรือง", patient: "นายรุ่งเรือง วัฒนา" },
            { id: 10, name: "ครอบครัว วัฒนสุข", patient: "นางวัฒนสุข สุขสันต์" }
        ];

        // ข้อมูลตัวอย่างสำหรับอสม.
        const volunteers = [
            { id: 1, name: "อสม. สมชาย ใจดี", patients: ["นางสมใจ ใจดี", "นายก้องเกียรติ สมบูรณ์", "นางสาวพัฒน์นรี พัฒนา", "นายสุขใจ ศรีสุข", "นางทรัพย์สิน ใจกว้าง", "นายมั่นคง วัฒนา"] },
            { id: 2, name: "อสม. สมหญิง มีสุข", patients: ["นางเกษมสุข สุขใจ", "นายรุ่งเรือง วัฒนา", "นางวัฒนสุข สุขสันต์", "นายสมหมาย ใจกว้าง", "นางสมศรี มีสุข", "นายสมศักดิ์ วัฒนา"] },
            { id: 3, name: "อสม. วิเชียร วัฒนา", patients: ["นางวิไล ใจดี", "นายวิศรุต สมบูรณ์", "นางวิภาวดี พัฒนา", "นายวิษณุ ศรีสุข", "นางวิไลรัตน์ ใจกว้าง", "นายวิโรจน์ วัฒนา", "นางวิมล สุขใจ"] },
            { id: 4, name: "อสม. ประสิทธิ์ สุขสันต์", patients: ["นายประสิทธิ์ ใจดี", "นางประไพ สมบูรณ์", "นายประยูร พัฒนา", "นางประภา ศรีสุข", "นายประเสริฐ ใจกว้าง", "นางประนอม วัฒนา"] },
            { id: 5, name: "อสม. สุภาพ ใจกว้าง", patients: ["นางสุภาพร ใจดี", "นายสุพจน์ สมบูรณ์", "นางสุภาวดี พัฒนา", "นายสุรศักดิ์ ศรีสุข", "นางสุรีรัตน์ ใจกว้าง", "นายสุรชัย วัฒนา", "นางสุรีย์ สุขใจ"] },
            { id: 6, name: "อสม. บุญมี มีสุข", patients: ["นายบุญมี ใจดี", "นางบุญศรี สมบูรณ์", "นายบุญส่ง พัฒนา", "นางบุญญา ศรีสุข", "นายบุญธรรม ใจกว้าง", "นางบุญเรือง วัฒนา"] },
            { id: 7, name: "อสม. เกียรติศักดิ์ วัฒนา", patients: ["นางเกียรติศักดิ์ ใจดี", "นายเกียรติศักดิ์ สมบูรณ์", "นางเกศริน พัฒนา", "นายเกรียงไกร ศรีสุข", "นางแก้วกัลยา ใจกว้าง", "นายโกศล วัฒนา", "นางโกสุม สุขใจ"] },
            { id: 8, name: "อสม. พรชัย สุขใจ", patients: ["นายพรชัย ใจดี", "นางพรทิพย์ สมบูรณ์", "นายพรมงคล พัฒนา", "นางพรสวรรค์ ศรีสุข", "นายพรรณราย ใจกว้าง", "นางพรรณี วัฒนา"] }
        ];

        // แสดงข้อมูลครอบครัว
        const familySection = document.getElementById('family-section');
        
        families.forEach(family => {
            const col = document.createElement('div');
            col.className = 'col-md-6 col-lg-4 mb-3';
            
            col.innerHTML = `
                <div class="card family-card h-100">
                    <div class="card-body">
                        <h5 class="card-title">${family.name}</h5>
                        <p class="card-text"><strong>ผู้ป่วยที่ดูแล:</strong> ${family.patient}</p>
                    </div>
                </div>
            `;
            
            familySection.appendChild(col);
        });

        // แสดงข้อมูลอสม.
        const volunteerSection = document.getElementById('volunteer-section');
        
        volunteers.forEach(volunteer => {
            const col = document.createElement('div');
            col.className = 'col-md-6 col-lg-3 mb-3';
            
            let patientList = '';
            volunteer.patients.forEach(patient => {
                patientList += `<li class="list-group-item">${patient}</li>`;
            });
            
            col.innerHTML = `
                <div class="card volunteer-card h-100">
                    <div class="card-body">
                        <h5 class="card-title">${volunteer.name}</h5>
                        <p class="card-text"><strong>จำนวนผู้ป่วย:</strong> ${volunteer.patients.length} คน</p>
                        <div class="patient-list">
                            <ul class="list-group list-group-flush">
                                ${patientList}
                            </ul>
                        </div>
                    </div>
                </div>
            `;
            
            volunteerSection.appendChild(col);
        });
    </script>
</body>
</html>