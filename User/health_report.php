<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ติดตามสุขภาพ - สำหรับผู้สูงอายุ</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="../css/health_report.css">
    <style>

    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>ติดตามสุขภาพรายวัน</h1>
            <div class="date-display" id="currentDate">วันนี้: 1 มกราคม 2567</div>
        </header>
        
        <div class="controls">
            <button id="dailyBtn" class="large-button active">ข้อมูลรายวัน</button>
            <button id="monthlyBtn" class="large-button">ข้อมูลรายเดือน</button>
        </div>
        
        <div class="dashboard">
            <!-- ความดัน -->
            <div class="health-card">
                <div class="card-header">
                    <div class="card-title">ความดันโลหิต</div>
                    <div class="current-value" id="bpValue">120/80</div>
                </div>
                <div class="chart-container">
                    <canvas id="bpChart"></canvas>
                </div>
                <div class="status normal" id="bpStatus">ปกติ</div>
            </div>
            
            <!-- น้ำตาล -->
            <div class="health-card">
                <div class="card-header">
                    <div class="card-title">น้ำตาลในเลือด</div>
                    <div class="current-value" id="sugarValue">98 mg/dL</div>
                </div>
                <div class="chart-container">
                    <canvas id="sugarChart"></canvas>
                </div>
                <div class="status normal" id="sugarStatus">ปกติ</div>
            </div>
            
            <!-- น้ำหนัก -->
            <div class="health-card">
                <div class="card-header">
                    <div class="card-title">น้ำหนักตัว</div>
                    <div class="current-value" id="weightValue">65 kg</div>
                </div>
                <div class="chart-container">
                    <canvas id="weightChart"></canvas>
                </div>
                <div class="status normal" id="weightStatus">ปกติ</div>
            </div>
            
            <!-- อุณหภูมิ -->
            <div class="health-card">
                <div class="card-header">
                    <div class="card-title">อุณหภูมิร่างกาย</div>
                    <div class="current-value" id="tempValue">36.5 °C</div>
                </div>
                <div class="chart-container">
                    <canvas id="tempChart"></canvas>
                </div>
                <div class="status normal" id="tempStatus">ปกติ</div>
            </div>
        </div>
        
        <div class="summary">
            <h2>สรุปสุขภาพสัปดาห์นี้</h2>
            <div class="summary-grid">
                <div class="summary-item">
                    <div class="summary-value" id="avgBp">122/78</div>
                    <div class="summary-label">ความดันเฉลี่ย</div>
                </div>
                <div class="summary-item">
                    <div class="summary-value" id="avgSugar">102</div>
                    <div class="summary-label">น้ำตาลเฉลี่ย (mg/dL)</div>
                </div>
                <div class="summary-item">
                    <div class="summary-value" id="avgWeight">64.8</div>
                    <div class="summary-label">น้ำหนักเฉลี่ย (kg)</div>
                </div>
                <div class="summary-item">
                    <div class="summary-value" id="avgTemp">36.6</div>
                    <div class="summary-label">อุณหภูมิเฉลี่ย (°C)</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // ตั้งค่าวันที่ปัจจุบัน
        const now = new Date();
        const options = { year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('currentDate').textContent = `วันนี้: ${now.toLocaleDateString('th-TH', options)}`;
        
        // ข้อมูลตัวอย่าง - เปลี่ยนเลข 1-7 เป็นวันจันทร์-อาทิตย์
        const dailyLabels = ['จ.', 'อ.', 'พ.', 'พฤ.', 'ศ.', 'ส.', 'อา.'];
        const monthlyLabels = ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
        
        const dailyData = {
            bp: {
                systolic: [120, 122, 118, 125, 119, 121, 120],
                diastolic: [80, 78, 76, 82, 77, 79, 80]
            },
            sugar: [98, 102, 95, 105, 100, 98, 101],
            weight: [65, 64.8, 65.2, 64.9, 65.1, 64.7, 65],
            temp: [36.5, 36.6, 36.4, 36.7, 36.5, 36.6, 36.5]
        };
        
        const monthlyData = {
            bp: {
                systolic: [125, 122, 120, 118, 121, 119, 120, 122, 121, 119, 120, 118],
                diastolic: [82, 80, 78, 76, 79, 77, 78, 80, 79, 77, 78, 76]
            },
            sugar: [105, 102, 100, 98, 101, 99, 100, 102, 101, 99, 100, 98],
            weight: [66, 65.5, 65.2, 65, 64.8, 64.5, 64.8, 65, 65.2, 65, 64.8, 65],
            temp: [36.7, 36.6, 36.5, 36.4, 36.5, 36.6, 36.7, 36.6, 36.5, 36.4, 36.5, 36.6]
        };
        
        // สร้างกราฟ
        let currentView = 'daily';
        
        function createChart(ctx, type, data, labels, color) {
            return new Chart(ctx, {
                type: type,
                data: {
                    labels: labels,
                    datasets: [{
                        label: '',
                        data: data,
                        backgroundColor: color + '20',
                        borderColor: color,
                        borderWidth: 2,
                        tension: 0.4,
                        pointBackgroundColor: color,
                        pointRadius: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            enabled: true,
                            mode: 'index',
                            intersect: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            grid: {
                                color: 'rgba(0,0,0,0.05)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        }
        
        function createBPChart(ctx, systolicData, diastolicData, labels) {
            return new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'ความดันบน',
                            data: systolicData,
                            backgroundColor: 'rgba(74, 144, 226, 0.2)',
                            borderColor: 'rgba(74, 144, 226, 1)',
                            borderWidth: 2,
                            tension: 0.4,
                            pointBackgroundColor: 'rgba(74, 144, 226, 1)',
                            pointRadius: 4
                        },
                        {
                            label: 'ความดันล่าง',
                            data: diastolicData,
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 2,
                            tension: 0.4,
                            pointBackgroundColor: 'rgba(255, 99, 132, 1)',
                            pointRadius: 4
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        },
                        tooltip: {
                            enabled: true,
                            mode: 'index',
                            intersect: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: false,
                            grid: {
                                color: 'rgba(0,0,0,0.05)'
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        }
        
        // สร้างกราฟเริ่มต้น
        let bpChart = createBPChart(
            document.getElementById('bpChart').getContext('2d'),
            dailyData.bp.systolic,
            dailyData.bp.diastolic,
            dailyLabels
        );
        
        let sugarChart = createChart(
            document.getElementById('sugarChart').getContext('2d'),
            'line',
            dailyData.sugar,
            dailyLabels,
            'rgba(76, 175, 80, 1)'
        );
        
        let weightChart = createChart(
            document.getElementById('weightChart').getContext('2d'),
            'line',
            dailyData.weight,
            dailyLabels,
            'rgba(156, 39, 176, 1)'
        );
        
        let tempChart = createChart(
            document.getElementById('tempChart').getContext('2d'),
            'line',
            dailyData.temp,
            dailyLabels,
            'rgba(255, 152, 0, 1)'
        );
        
        // อัพเดตสถานะสุขภาพ
        function updateStatus() {
            const lastIndex = currentView === 'daily' ? dailyLabels.length - 1 : monthlyLabels.length - 1;
            
            // ความดัน
            const systolic = currentView === 'daily' ? dailyData.bp.systolic[lastIndex] : monthlyData.bp.systolic[lastIndex];
            const diastolic = currentView === 'daily' ? dailyData.bp.diastolic[lastIndex] : monthlyData.bp.diastolic[lastIndex];
            document.getElementById('bpValue').textContent = `${systolic}/${diastolic}`;
            
            if (systolic < 120 && diastolic < 80) {
                document.getElementById('bpStatus').className = 'status normal';
                document.getElementById('bpStatus').textContent = 'ปกติ';
            } else if (systolic < 130 && diastolic < 80) {
                document.getElementById('bpStatus').className = 'status warning';
                document.getElementById('bpStatus').textContent = 'ความดันสูงเล็กน้อย';
            } else {
                document.getElementById('bpStatus').className = 'status danger';
                document.getElementById('bpStatus').textContent = 'ความดันสูง';
            }
            
            // น้ำตาล
            const sugar = currentView === 'daily' ? dailyData.sugar[lastIndex] : monthlyData.sugar[lastIndex];
            document.getElementById('sugarValue').textContent = `${sugar} mg/dL`;
            
            if (sugar < 100) {
                document.getElementById('sugarStatus').className = 'status normal';
                document.getElementById('sugarStatus').textContent = 'ปกติ';
            } else if (sugar < 126) {
                document.getElementById('sugarStatus').className = 'status warning';
                document.getElementById('sugarStatus').textContent = 'น้ำตาลสูงเล็กน้อย';
            } else {
                document.getElementById('sugarStatus').className = 'status danger';
                document.getElementById('sugarStatus').textContent = 'น้ำตาลสูง';
            }
            
            // น้ำหนัก
            const weight = currentView === 'daily' ? dailyData.weight[lastIndex] : monthlyData.weight[lastIndex];
            document.getElementById('weightValue').textContent = `${weight} kg`;
            
            if (weight >= 60 && weight <= 70) {
                document.getElementById('weightStatus').className = 'status normal';
                document.getElementById('weightStatus').textContent = 'ปกติ';
            } else if (weight >= 55 && weight <= 75) {
                document.getElementById('weightStatus').className = 'status warning';
                document.getElementById('weightStatus').textContent = 'น้ำหนักเกิน/ต่ำกว่าเกณฑ์เล็กน้อย';
            } else {
                document.getElementById('weightStatus').className = 'status danger';
                document.getElementById('weightStatus').textContent = 'น้ำหนักเกิน/ต่ำกว่าเกณฑ์มาก';
            }
            
            // อุณหภูมิ
            const temp = currentView === 'daily' ? dailyData.temp[lastIndex] : monthlyData.temp[lastIndex];
            document.getElementById('tempValue').textContent = `${temp} °C`;
            
            if (temp >= 36.1 && temp <= 37.2) {
                document.getElementById('tempStatus').className = 'status normal';
                document.getElementById('tempStatus').textContent = 'ปกติ';
            } else if (temp >= 35.5 && temp <= 38.0) {
                document.getElementById('tempStatus').className = 'status warning';
                document.getElementById('tempStatus').textContent = 'อุณหภูมิร่างกายผิดปกติ';
            } else {
                document.getElementById('tempStatus').className = 'status danger';
                document.getElementById('tempStatus').textContent = 'อุณหภูมิร่างกายผิดปกติมาก';
            }
            
            // อัพเดตสรุป
            updateSummary();
        }
        
        // อัพเดตข้อมูลสรุป
        function updateSummary() {
            const data = currentView === 'daily' ? dailyData : monthlyData;
            
            // คำนวณค่าเฉลี่ย
            const avgSystolic = Math.round(data.bp.systolic.reduce((a, b) => a + b, 0) / data.bp.systolic.length);
            const avgDiastolic = Math.round(data.bp.diastolic.reduce((a, b) => a + b, 0) / data.bp.diastolic.length);
            const avgSugar = Math.round(data.sugar.reduce((a, b) => a + b, 0) / data.sugar.length);
            const avgWeight = (data.weight.reduce((a, b) => a + b, 0) / data.weight.length).toFixed(1);
            const avgTemp = (data.temp.reduce((a, b) => a + b, 0) / data.temp.length).toFixed(1);
            
            document.getElementById('avgBp').textContent = `${avgSystolic}/${avgDiastolic}`;
            document.getElementById('avgSugar').textContent = avgSugar;
            document.getElementById('avgWeight').textContent = avgWeight;
            document.getElementById('avgTemp').textContent = avgTemp;
        }
        
        // สลับมุมมองระหว่างรายวันและรายเดือน
        document.getElementById('dailyBtn').addEventListener('click', function() {
            currentView = 'daily';
            document.getElementById('dailyBtn').classList.add('active');
            document.getElementById('monthlyBtn').classList.remove('active');
            
            // อัพเดตกราฟ
            bpChart.data.labels = dailyLabels;
            bpChart.data.datasets[0].data = dailyData.bp.systolic;
            bpChart.data.datasets[1].data = dailyData.bp.diastolic;
            bpChart.update();
            
            sugarChart.data.labels = dailyLabels;
            sugarChart.data.datasets[0].data = dailyData.sugar;
            sugarChart.update();
            
            weightChart.data.labels = dailyLabels;
            weightChart.data.datasets[0].data = dailyData.weight;
            weightChart.update();
            
            tempChart.data.labels = dailyLabels;
            tempChart.data.datasets[0].data = dailyData.temp;
            tempChart.update();
            
            updateStatus();
        });
        
        document.getElementById('monthlyBtn').addEventListener('click', function() {
            currentView = 'monthly';
            document.getElementById('monthlyBtn').classList.add('active');
            document.getElementById('dailyBtn').classList.remove('active');
            
            // อัพเดตกราฟ
            bpChart.data.labels = monthlyLabels;
            bpChart.data.datasets[0].data = monthlyData.bp.systolic;
            bpChart.data.datasets[1].data = monthlyData.bp.diastolic;
            bpChart.update();
            
            sugarChart.data.labels = monthlyLabels;
            sugarChart.data.datasets[0].data = monthlyData.sugar;
            sugarChart.update();
            
            weightChart.data.labels = monthlyLabels;
            weightChart.data.datasets[0].data = monthlyData.weight;
            weightChart.update();
            
            tempChart.data.labels = monthlyLabels;
            tempChart.data.datasets[0].data = monthlyData.temp;
            tempChart.update();
            
            updateStatus();
        });
        
        // อัพเดตสถานะเริ่มต้น
        updateStatus();
    </script>
</body>
</html>