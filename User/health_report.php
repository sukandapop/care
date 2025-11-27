<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title>Health Report</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/health_report.css">
</head>

<body>

<!-- <?php include('navbar.php'); ?> -->
<?php include('bottom_nav.php'); ?>

    <div class="header">
        <h1>รายงานสุขภาพส่วนบุคคล</h1>
        <p>ติดตามสุขภาพของคุณอย่างสม่ำเสมอ</p>
    </div>
    
    <div class="time-selector">
        <button class="time-btn active" id="daily-btn">รายวัน</button>
        <button class="time-btn" id="monthly-btn">รายเดือน</button>
    </div>
    
    <div class="dashboard">
        <!-- ระดับน้ำตาล -->
        <div class="card">
            <h3><i>📊</i> ระดับน้ำตาลในเลือด</h3>
            <div class="current-value">
                <p>ค่าปัจจุบัน: <strong>98 mg/dL</strong></p>
                <div class="status">
                    <div class="status-dot status-normal"></div>
                    <span>อยู่ในเกณฑ์ปกติ</span>
                </div>
            </div>
            <div class="chart-container">
                <div class="chart" id="sugar-chart">
                    <!-- กราฟจะถูกสร้างด้วย JavaScript -->
                </div>
            </div>
        </div>
        
        <!-- ความดันโลหิต -->
        <div class="card">
            <h3><i>💓</i> ความดันโลหิต</h3>
            <div class="current-value">
                <p>ค่าปัจจุบัน: <strong>120/80 mmHg</strong></p>
                <div class="status">
                    <div class="status-dot status-normal"></div>
                    <span>อยู่ในเกณฑ์ปกติ</span>
                </div>
            </div>
            <div class="chart-container">
                <div class="chart" id="pressure-chart">
                    <!-- กราฟจะถูกสร้างด้วย JavaScript -->
                </div>
            </div>
        </div>
        
        <!-- น้ำหนัก -->
        <div class="card">
            <h3><i>⚖️</i> น้ำหนักตัว</h3>
            <div class="current-value">
                <p>ค่าปัจจุบัน: <strong>65 kg</strong></p>
                <div class="status">
                    <div class="status-dot status-normal"></div>
                    <span>อยู่ในเกณฑ์ปกติ</span>
                </div>
            </div>
            <div class="chart-container">
                <div class="chart" id="weight-chart">
                    <!-- กราฟจะถูกสร้างด้วย JavaScript -->
                </div>
            </div>
        </div>
        
        <!-- อาการ -->
        <div class="card">
            <h3><i>😊</i> อาการ</h3>
            <p>อาการในวันนี้:</p>
            <table class="symptoms-table">
                <thead>
                    <tr>
                        <th>เวลา</th>
                        <th>อาการ</th>
                        <th>ความรุนแรง</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>08:00</td>
                        <td>ปวดหัวเล็กน้อย</td>
                        <td><div class="status-dot status-warning"></div> ปานกลาง</td>
                    </tr>
                    <tr>
                        <td>12:30</td>
                        <td>เวียนศีรษะ</td>
                        <td><div class="status-dot status-warning"></div> ปานกลาง</td>
                    </tr>
                    <tr>
                        <td>18:45</td>
                        <td>ไม่มีอาการ</td>
                        <td><div class="status-dot status-normal"></div> ปกติ</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // ข้อมูลตัวอย่างสำหรับกราฟรายวัน
        const dailyData = {
            sugar: [95, 102, 98, 110, 105, 100, 98],
            pressure: [118, 120, 122, 119, 121, 120, 118],
            weight: [65.2, 65.1, 65.0, 65.3, 65.1, 65.0, 64.9]
        };
        
        // ข้อมูลตัวอย่างสำหรับกราฟรายเดือน
        const monthlyData = {
            sugar: [98, 102, 105, 100, 95, 98, 101, 104, 99, 97, 100, 102, 98, 101, 99, 97, 100, 102, 105, 100, 98, 101, 104, 99, 97, 100, 102, 98, 101, 99],
            pressure: [120, 118, 122, 119, 121, 120, 118, 122, 121, 119, 120, 118, 122, 121, 119, 120, 118, 122, 121, 119, 120, 118, 122, 121, 119, 120, 118, 122, 121, 119],
            weight: [66.0, 65.8, 65.5, 65.3, 65.1, 65.0, 64.9, 64.8, 64.7, 64.9, 65.0, 65.1, 65.0, 64.9, 64.8, 64.7, 64.9, 65.0, 65.1, 65.0, 64.9, 64.8, 64.7, 64.9, 65.0, 65.1, 65.0, 64.9, 64.8, 64.7]
        };
        
        // ปุ่มสลับระหว่างรายวันและรายเดือน
        const dailyBtn = document.getElementById('daily-btn');
        const monthlyBtn = document.getElementById('monthly-btn');
        
        // ฟังก์ชันสร้างกราฟ
        function createChart(containerId, data, labels, isDaily) {
            const container = document.getElementById(containerId);
            container.innerHTML = '';
            
            const maxValue = Math.max(...data);
            const minValue = Math.min(...data);
            const range = maxValue - minValue;
            
            data.forEach((value, index) => {
                const bar = document.createElement('div');
                bar.className = 'bar';
                
                // คำนวณความสูงของแท่งกราฟ
                const heightPercentage = range > 0 ? ((value - minValue) / range) * 80 + 10 : 50;
                bar.style.height = `${heightPercentage}%`;
                
                // เพิ่มป้ายกำกับ
                const label = document.createElement('div');
                label.className = 'bar-label';
                label.textContent = isDaily ? labels[index] : (index + 1);
                
                // เพิ่ม tooltip แสดงค่าที่แท้จริง
                bar.title = `${value} ${containerId.includes('sugar') ? 'mg/dL' : containerId.includes('pressure') ? 'mmHg' : 'kg'}`;
                
                container.appendChild(bar);
                container.appendChild(label);
            });
        }
        
        // ฟังก์ชันแสดงข้อมูลรายวัน
        function showDailyData() {
            const days = ['จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส', 'อา'];
            createChart('sugar-chart', dailyData.sugar, days, true);
            createChart('pressure-chart', dailyData.pressure, days, true);
            createChart('weight-chart', dailyData.weight, days, true);
            
            dailyBtn.classList.add('active');
            monthlyBtn.classList.remove('active');
        }
        
        // ฟังก์ชันแสดงข้อมูลรายเดือน
        function showMonthlyData() {
            const days = Array.from({length: 30}, (_, i) => i + 1);
            createChart('sugar-chart', monthlyData.sugar, days, false);
            createChart('pressure-chart', monthlyData.pressure, days, false);
            createChart('weight-chart', monthlyData.weight, days, false);
            
            monthlyBtn.classList.add('active');
            dailyBtn.classList.remove('active');
        }
        
        // เพิ่ม event listeners
        dailyBtn.addEventListener('click', showDailyData);
        monthlyBtn.addEventListener('click', showMonthlyData);
        
        // โหลดข้อมูลรายวันเมื่อเริ่มต้น
        showDailyData();
    </script>

<script src="../js/bootstrap.min.js"></script>
</body>
</html>
