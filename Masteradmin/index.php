<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Connect: System Design Interactive Report</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300;400;500;700&display=swap" rel="stylesheet">
    
    <!-- Chosen Palette: "Soft Medical Harmony" - Warm neutrals (Cream/off-white) for background to reduce eye strain, Soft Teal/Blue for primary actions (trust/health), Amber for alerts, and Slate Grey for text. -->
    
    <!-- Application Structure Plan: 
         The app is designed as an "Interactive System Walkthrough". 
         1. "Overview Dashboard": Introduces the system goals and high-level hierarchy visually.
         2. "Role Simulator" (Core Feature): A tabbed interface allowing the user to 'become' each of the 6 roles. This is the most effective way to understand the permissions and user experience described in the report. It dynamically renders a mock interface for that specific role (charts, tasks, notifications).
         3. "Permission Matrix": An interactive data table to cross-reference features against roles, useful for quick technical lookup.
         The structure prioritizes "User Empathy" (seeing what they see) over linear reading. 
    -->

    <!-- Visualization & Content Choices:
         1. Hierarchy Pyramid (HTML/CSS): Represents the 6 levels of users. Goal: Show authority levels. Interaction: Click to filter details.
         2. Role Dashboards (HTML/JS + Chart.js):
            - Patient: Line Chart (BP/Sugar trends) -> Goal: Inform/Monitor.
            - Staff: Bar Chart (Patient statistics) -> Goal: Analyze.
            - Agency: Donut Chart (KPIs) -> Goal: Executive Summary.
         3. Feature Matrix (HTML Table + JS Hover): Grid layout. Goal: Compare permissions. Interaction: Row highlighting for readability.
         4. Notification/Chat Mocks (HTML/CSS): Visualizing the communication features without backend logic.
    -->

    <!-- CONFIRMATION: NO SVG graphics used. NO Mermaid JS used. -->

    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #f8fafc; /* Warm neutral light gray */
            color: #334155; /* Slate 700 */
        }
        
        /* Chart Container Styling per requirements */
        .chart-container {
            position: relative;
            width: 100%;
            max-width: 600px; /* max-w-2xl equivalent logic */
            margin-left: auto;
            margin-right: auto;
            height: 300px;
            max-height: 400px;
        }
        @media (min-width: 768px) {
            .chart-container {
                height: 350px;
            }
        }

        .role-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .role-card:hover, .role-card.active {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border-left: 5px solid #0d9488; /* Teal 600 */
        }
        .role-card.active {
            background-color: #f0fdfa; /* Teal 50 */
        }

        .nav-btn {
            transition: all 0.2s;
        }
        .nav-btn.active {
            background-color: #0f766e; /* Teal 700 */
            color: white;
        }

        /* Custom Scrollbar for list areas */
        .custom-scroll::-webkit-scrollbar {
            width: 6px;
        }
        .custom-scroll::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        .custom-scroll::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    <!-- Navigation Header -->
    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-teal-600 rounded-lg flex items-center justify-center text-white font-bold text-xl">+</div>
                    <span class="font-bold text-xl text-teal-800">Care Connect Design</span>
                </div>
                <nav class="hidden md:flex space-x-4">
                    <button onclick="switchSection('overview')" id="nav-overview" class="nav-btn active px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-teal-600">ภาพรวมระบบ</button>
                    <button onclick="switchSection('simulator')" id="nav-simulator" class="nav-btn px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-teal-600">จำลองบทบาทผู้ใช้ (Role Simulator)</button>
                    <button onclick="switchSection('matrix')" id="nav-matrix" class="nav-btn px-3 py-2 rounded-md text-sm font-medium text-gray-700 hover:text-teal-600">ตารางสิทธิ์ (Matrix)</button>
                </nav>
            </div>
        </div>
        <!-- Mobile Nav -->
        <div class="md:hidden flex justify-around border-t py-2 bg-gray-50">
            <button onclick="switchSection('overview')" class="text-xs font-bold text-teal-700">ภาพรวม</button>
            <button onclick="switchSection('simulator')" class="text-xs font-bold text-gray-600">จำลองบทบาท</button>
            <button onclick="switchSection('matrix')" class="text-xs font-bold text-gray-600">ตารางสิทธิ์</button>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 w-full">

        <!-- SECTION 1: OVERVIEW -->
        <section id="section-overview" class="space-y-8 animate-fade-in">
            <div class="bg-white rounded-xl shadow p-6 border-l-4 border-teal-500">
                <h1 class="text-2xl font-bold text-gray-800 mb-2">เป้าหมายของระบบ (System Goal)</h1>
                <p class="text-gray-600 leading-relaxed">
                    Care Connect คือแพลตฟอร์มการดูแลสุขภาพแบบองค์รวมที่มุ่งเน้นการเชื่อมโยงข้อมูลระหว่าง 
                    <span class="font-semibold text-teal-600">ผู้ป่วย</span>, 
                    <span class="font-semibold text-teal-600">อสม.</span>, และ 
                    <span class="font-semibold text-teal-600">เจ้าหน้าที่สาธารณสุข</span> 
                    เพื่อให้เกิดการดูแลที่ต่อเนื่อง (Continuity of Care) ผ่านระบบแจ้งเตือนอัจฉริยะ, การสื่อสารแบบ Real-time, และการติดตามข้อมูลสุขภาพที่แม่นยำ
                </p>
            </div>

            <!-- Conceptual Hierarchy Diagram -->
            <div class="grid md:grid-cols-2 gap-8 items-start">
                <div>
                    <h2 class="text-xl font-bold text-gray-800 mb-4">โครงสร้างบทบาท (Role Hierarchy)</h2>
                    <p class="text-sm text-gray-500 mb-4">ระบบถูกออกแบบให้มี 6 ระดับ โดยสิทธิ์การจัดการจะเพิ่มขึ้นตามลำดับชั้น คลิกที่การ์ดเพื่อดูรายละเอียดเบื้องต้น</p>
                    
                    <div class="space-y-2 relative">
                        <!-- Connecting Line -->
                        <div class="absolute left-6 top-4 bottom-4 w-1 bg-gray-200 -z-10"></div>

                        <!-- Roles List -->
                        <div class="role-item flex items-center gap-4 p-3 bg-white rounded-lg shadow-sm cursor-pointer hover:bg-teal-50" onclick="quickJumpToRole(6)">
                            <div class="w-12 h-12 rounded-full bg-slate-800 text-white flex items-center justify-center font-bold shadow">6</div>
                            <div>
                                <h3 class="font-bold text-slate-800">Master Admin</h3>
                                <p class="text-xs text-gray-500">ผู้ดูแลระบบหลัก</p>
                            </div>
                        </div>

                        <div class="role-item flex items-center gap-4 p-3 bg-white rounded-lg shadow-sm cursor-pointer hover:bg-teal-50" onclick="quickJumpToRole(5)">
                            <div class="w-12 h-12 rounded-full bg-indigo-700 text-white flex items-center justify-center font-bold shadow">5</div>
                            <div>
                                <h3 class="font-bold text-indigo-800">Agency Viewer</h3>
                                <p class="text-xs text-gray-500">หน่วยงาน (สปสช., เขตสุขภาพ)</p>
                            </div>
                        </div>

                        <div class="role-item flex items-center gap-4 p-3 bg-white rounded-lg shadow-sm cursor-pointer hover:bg-teal-50" onclick="quickJumpToRole(4)">
                            <div class="w-12 h-12 rounded-full bg-teal-600 text-white flex items-center justify-center font-bold shadow">4</div>
                            <div>
                                <h3 class="font-bold text-teal-800">Health Staff</h3>
                                <p class="text-xs text-gray-500">เจ้าหน้าที่สาธารณสุข</p>
                            </div>
                        </div>

                        <div class="role-item flex items-center gap-4 p-3 bg-white rounded-lg shadow-sm cursor-pointer hover:bg-teal-50" onclick="quickJumpToRole(3)">
                            <div class="w-12 h-12 rounded-full bg-green-500 text-white flex items-center justify-center font-bold shadow">3</div>
                            <div>
                                <h3 class="font-bold text-green-700">VHV / อสม.</h3>
                                <p class="text-xs text-gray-500">อาสาสมัครสาธารณสุข</p>
                            </div>
                        </div>

                        <div class="role-item flex items-center gap-4 p-3 bg-white rounded-lg shadow-sm cursor-pointer hover:bg-teal-50" onclick="quickJumpToRole(2)">
                            <div class="w-12 h-12 rounded-full bg-orange-400 text-white flex items-center justify-center font-bold shadow">2</div>
                            <div>
                                <h3 class="font-bold text-orange-700">Caregiver</h3>
                                <p class="text-xs text-gray-500">ผู้ดูแลผู้ป่วย</p>
                            </div>
                        </div>

                        <div class="role-item flex items-center gap-4 p-3 bg-white rounded-lg shadow-sm cursor-pointer hover:bg-teal-50" onclick="quickJumpToRole(1)">
                            <div class="w-12 h-12 rounded-full bg-rose-400 text-white flex items-center justify-center font-bold shadow">1</div>
                            <div>
                                <h3 class="font-bold text-rose-700">Patient</h3>
                                <p class="text-xs text-gray-500">ผู้ป่วย</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Overview Chart -->
                <div class="bg-white p-6 rounded-xl shadow h-full flex flex-col justify-center">
                    <h3 class="text-lg font-bold text-center mb-4 text-gray-700">สัดส่วนการเข้าถึงฟีเจอร์ของระบบ</h3>
                    <div class="chart-container">
                        <canvas id="overviewChart"></canvas>
                    </div>
                    <p class="text-center text-xs text-gray-400 mt-2">แสดงปริมาณฟีเจอร์ที่แต่ละบทบาทเข้าถึงได้</p>
                </div>
            </div>
        </section>

        <!-- SECTION 2: ROLE SIMULATOR -->
        <section id="section-simulator" class="hidden space-y-6">
            <div class="bg-indigo-50 p-6 rounded-xl border border-indigo-100">
                <h2 class="text-xl font-bold text-indigo-900 mb-2">Role Simulator: ประสบการณ์ผู้ใช้งาน</h2>
                <p class="text-indigo-700 text-sm">
                    เลือกบทบาทจากเมนูด้านซ้าย เพื่อจำลองหน้าจอและฟังก์ชันที่ผู้ใช้นั้นๆ จะมองเห็น (Mock Interface) 
                    ช่วยให้เห็นภาพการทำงานจริงของ User Story แต่ละระดับ
                </p>
            </div>

            <div class="grid lg:grid-cols-4 gap-6">
                <!-- Sidebar: Role Selection -->
                <div class="lg:col-span-1 space-y-2">
                    <button onclick="setRole(1)" class="role-select-btn w-full text-left p-4 rounded-lg bg-white border hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500 active" data-role="1">
                        <div class="font-bold text-rose-600">Patient / Caregiver</div>
                        <div class="text-xs text-gray-500">ผู้ป่วย & ผู้ดูแล</div>
                    </button>
                    <button onclick="setRole(3)" class="role-select-btn w-full text-left p-4 rounded-lg bg-white border hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500" data-role="3">
                        <div class="font-bold text-green-600">VHV / อสม.</div>
                        <div class="text-xs text-gray-500">อาสาสมัคร</div>
                    </button>
                    <button onclick="setRole(4)" class="role-select-btn w-full text-left p-4 rounded-lg bg-white border hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500" data-role="4">
                        <div class="font-bold text-teal-600">Health Staff</div>
                        <div class="text-xs text-gray-500">เจ้าหน้าที่สาธารณสุข</div>
                    </button>
                    <button onclick="setRole(5)" class="role-select-btn w-full text-left p-4 rounded-lg bg-white border hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-teal-500" data-role="5">
                        <div class="font-bold text-indigo-600">Agency / Admin</div>
                        <div class="text-xs text-gray-500">หน่วยงาน & ผู้ดูแลระบบ</div>
                    </button>
                </div>

                <!-- Main: Dynamic Interface Area -->
                <div class="lg:col-span-3 bg-white rounded-xl shadow-lg overflow-hidden flex flex-col min-h-[600px]">
                    <!-- Mock Header -->
                    <div class="bg-slate-800 text-white p-4 flex justify-between items-center" id="mock-header">
                        <span class="font-bold" id="mock-role-title">Patient Dashboard</span>
                        <div class="flex gap-3 text-xs">
                            <span class="bg-slate-700 px-2 py-1 rounded">🔔 3</span>
                            <span class="bg-slate-700 px-2 py-1 rounded">👤 Profile</span>
                        </div>
                    </div>

                    <!-- Dynamic Content -->
                    <div class="p-6 flex-grow flex flex-col gap-6" id="mock-content">
                        <!-- Content injected via JS -->
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 3: PERMISSION MATRIX -->
        <section id="section-matrix" class="hidden space-y-6">
             <div class="bg-white p-6 rounded-xl shadow mb-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">ตารางเปรียบเทียบสิทธิ์ (Feature Matrix)</h2>
                <p class="text-sm text-gray-500 mb-6">ตารางแสดงความละเอียดของสิทธิ์การเข้าถึงข้อมูลและการจัดการในแต่ละโมดูล (เลื่อนแนวนอนเพื่อดูทั้งหมด)</p>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                            <tr>
                                <th scope="col" class="px-6 py-3 sticky left-0 bg-gray-100 z-10">ฟีเจอร์ / โมดูล</th>
                                <th scope="col" class="px-6 py-3 text-center">Patient (1)</th>
                                <th scope="col" class="px-6 py-3 text-center">Caregiver (2)</th>
                                <th scope="col" class="px-6 py-3 text-center">อสม. (3)</th>
                                <th scope="col" class="px-6 py-3 text-center bg-teal-50">Staff (4)</th>
                                <th scope="col" class="px-6 py-3 text-center">Agency (5)</th>
                                <th scope="col" class="px-6 py-3 text-center">Admin (6)</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200" id="matrix-body">
                            <!-- JS generates rows -->
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-auto py-6">
        <div class="max-w-7xl mx-auto px-4 text-center text-gray-400 text-sm">
            <p>Care Connect System Design Mockup for Analysis</p>
        </div>
    </footer>

    <script>
        // --- DATA STORE ---
        const roleData = {
            1: {
                title: "Patient / Caregiver Dashboard",
                theme: "bg-rose-600",
                description: "เน้นการดูแลตนเอง รับแจ้งเตือน และดูประวัติสุขภาพ",
                features: ["รับแจ้งเตือนยา/นัดหมาย", "ดูรายงานสุขภาพ (BP, Sugar)", "แชทกับ อสม.", "คลังความรู้"],
                mockContent: `
                    <div class="grid md:grid-cols-3 gap-4">
                        <!-- Notification Cards -->
                        <div class="md:col-span-1 space-y-4">
                            <div class="bg-amber-50 border-l-4 border-amber-400 p-4 rounded shadow-sm">
                                <h4 class="font-bold text-amber-800">💊 ถึงเวลากินยา</h4>
                                <p class="text-sm text-amber-700">Metformin 500mg (หลังอาหาร)</p>
                                <button class="mt-2 text-xs bg-amber-200 text-amber-800 px-2 py-1 rounded hover:bg-amber-300">ยืนยันการกิน</button>
                            </div>
                            <div class="bg-blue-50 border-l-4 border-blue-400 p-4 rounded shadow-sm">
                                <h4 class="font-bold text-blue-800">📅 นัดหมายถัดไป</h4>
                                <p class="text-sm text-blue-700">ตรวจสุขภาพประจำปี @ รพ.สต.</p>
                                <p class="text-xs text-gray-500 mt-1">15 ธ.ค. 09:00 น.</p>
                            </div>
                        </div>
                        
                        <!-- Chart Area -->
                        <div class="md:col-span-2 bg-white border rounded p-4 shadow-sm">
                            <h4 class="font-bold text-gray-700 mb-2">📈 รายงานสุขภาพ (ความดันโลหิต)</h4>
                            <div class="chart-container h-64">
                                <canvas id="roleChart"></canvas>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Bottom Actions -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-2">
                        <button class="p-4 bg-teal-50 text-teal-700 rounded border border-teal-100 hover:bg-teal-100 flex flex-col items-center">
                            <span class="text-2xl">💬</span>
                            <span class="font-bold text-sm mt-1">แชทกับหมอ</span>
                        </button>
                        <button class="p-4 bg-purple-50 text-purple-700 rounded border border-purple-100 hover:bg-purple-100 flex flex-col items-center">
                            <span class="text-2xl">📚</span>
                            <span class="font-bold text-sm mt-1">คลังความรู้</span>
                        </button>
                    </div>
                `
            },
            3: {
                title: "VHV (อสม.) Dashboard",
                theme: "bg-green-600",
                description: "เน้นการลงพื้นที่ เยี่ยมบ้าน และบันทึกข้อมูลแทนผู้ป่วย",
                features: ["รายชื่อผู้ป่วยในความดูแล", "บันทึกเยี่ยมบ้าน", "ส่งใบนัดหมาย", "แชทปรึกษา"],
                mockContent: `
                    <div class="grid md:grid-cols-3 gap-4">
                        <!-- Patient List -->
                        <div class="md:col-span-1 bg-white border rounded shadow-sm flex flex-col max-h-[400px]">
                            <div class="p-3 bg-gray-50 border-b font-bold text-gray-700">รายชื่อผู้ป่วย (5 คน)</div>
                            <div class="overflow-y-auto custom-scroll p-2 space-y-2">
                                <div class="p-2 border rounded hover:bg-gray-50 cursor-pointer bg-red-50 border-red-200">
                                    <div class="font-bold text-sm">นายสมชาย (ความดันสูง)</div>
                                    <div class="text-xs text-red-500">❗ ไม่ได้วัดความดัน 3 วัน</div>
                                </div>
                                <div class="p-2 border rounded hover:bg-gray-50 cursor-pointer">
                                    <div class="font-bold text-sm">นางสมศรี (เบาหวาน)</div>
                                    <div class="text-xs text-green-600">✅ ปกติ</div>
                                </div>
                                <div class="p-2 border rounded hover:bg-gray-50 cursor-pointer">
                                    <div class="font-bold text-sm">คุณยายมี (ติดเตียง)</div>
                                    <div class="text-xs text-gray-500">รอเยี่ยมบ้านเสาร์นี้</div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Area -->
                        <div class="md:col-span-2 space-y-4">
                            <div class="bg-white border rounded p-4 shadow-sm">
                                <h4 class="font-bold text-gray-700 mb-2">📝 บันทึกเยี่ยมบ้าน (นายสมชาย)</h4>
                                <div class="grid grid-cols-2 gap-4 mb-2">
                                    <input type="text" placeholder="ค่าความดัน (Systolic)" class="border p-2 rounded text-sm">
                                    <input type="text" placeholder="ค่าน้ำตาล (mg/dL)" class="border p-2 rounded text-sm">
                                </div>
                                <textarea placeholder="อาการทั่วไป / ปัญหาที่พบ..." class="w-full border p-2 rounded text-sm h-20"></textarea>
                                <div class="flex justify-end mt-2">
                                    <button class="bg-green-600 text-white px-4 py-2 rounded text-sm hover:bg-green-700">บันทึกข้อมูล</button>
                                </div>
                            </div>

                            <div class="bg-white border rounded p-4 shadow-sm">
                                <h4 class="font-bold text-gray-700 mb-2">📊 สรุปการลงพื้นที่เดือนนี้</h4>
                                <div class="chart-container h-48">
                                    <canvas id="roleChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                `
            },
            4: {
                title: "Health Staff Dashboard",
                theme: "bg-teal-600",
                description: "ดูภาพรวมสุขภาพประชากร จัดการนัดหมาย และตรวจสอบงาน อสม.",
                features: ["รายงานสุขภาพครบวงจร", "จัดการคลังความรู้", "ตรวจสอบข้อมูล อสม.", "ดูสถิติเยี่ยมบ้าน"],
                mockContent: `
                    <div class="grid md:grid-cols-4 gap-4 mb-4">
                        <div class="bg-white p-4 rounded shadow-sm border-t-4 border-teal-500">
                            <div class="text-xs text-gray-500">ผู้ป่วยทั้งหมด</div>
                            <div class="text-2xl font-bold">1,240</div>
                        </div>
                        <div class="bg-white p-4 rounded shadow-sm border-t-4 border-red-500">
                            <div class="text-xs text-gray-500">กลุ่มเสี่ยงสูง</div>
                            <div class="text-2xl font-bold text-red-600">45</div>
                        </div>
                        <div class="bg-white p-4 rounded shadow-sm border-t-4 border-blue-500">
                            <div class="text-xs text-gray-500">เยี่ยมบ้านแล้ว</div>
                            <div class="text-2xl font-bold">85%</div>
                        </div>
                        <div class="bg-white p-4 rounded shadow-sm border-t-4 border-purple-500">
                            <div class="text-xs text-gray-500">รออนุมัติข้อมูล</div>
                            <div class="text-2xl font-bold text-purple-600">12</div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-3 gap-6 h-full">
                         <div class="md:col-span-2 bg-white border rounded p-4 shadow-sm">
                            <div class="flex justify-between items-center mb-4">
                                <h4 class="font-bold text-gray-700">📉 แนวโน้มสุขภาพในพื้นที่ (NCDs)</h4>
                                <select class="text-xs border rounded p-1"><option>3 เดือนล่าสุด</option></select>
                            </div>
                            <div class="chart-container">
                                <canvas id="roleChart"></canvas>
                            </div>
                        </div>

                        <div class="md:col-span-1 bg-white border rounded p-4 shadow-sm flex flex-col">
                            <h4 class="font-bold text-gray-700 mb-2">📅 จัดการนัดหมาย</h4>
                            <div class="space-y-3 text-sm">
                                <div class="flex justify-between items-center p-2 bg-gray-50 rounded">
                                    <span>คลินิกเบาหวาน</span>
                                    <button class="text-teal-600 text-xs border border-teal-600 px-2 py-1 rounded hover:bg-teal-50">ส่งนัดกลุ่ม</button>
                                </div>
                                <div class="flex justify-between items-center p-2 bg-gray-50 rounded">
                                    <span>รณรงค์วัคซีน</span>
                                    <button class="text-teal-600 text-xs border border-teal-600 px-2 py-1 rounded hover:bg-teal-50">ส่งนัดกลุ่ม</button>
                                </div>
                            </div>
                             <div class="mt-auto pt-4 border-t">
                                <h4 class="font-bold text-gray-700 mb-2">📚 คลังความรู้</h4>
                                <button class="w-full bg-slate-100 text-slate-600 py-2 rounded text-xs hover:bg-slate-200">+ อัปโหลดบทความใหม่</button>
                            </div>
                        </div>
                    </div>
                `
            },
            5: {
                title: "Agency / Admin Dashboard",
                theme: "bg-indigo-700",
                description: "Agency: ดูภาพรวม KPI | Admin: จัดการ Users และ Settings",
                features: ["รายงาน KPI ภาพรวม", "จัดการผู้ใช้งาน (Admin)", "ตั้งค่าระบบ (Admin)", "Export ข้อมูล"],
                mockContent: `
                    <div class="flex gap-4 mb-4 border-b pb-2">
                        <button class="font-bold text-indigo-700 border-b-2 border-indigo-700 px-2">Executive View</button>
                        <button class="text-gray-500 hover:text-indigo-600 px-2">System Admin</button>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-white border rounded p-6 shadow-sm flex flex-col items-center justify-center">
                            <h4 class="font-bold text-gray-700 mb-4 w-full text-left">📊 KPI: อัตราการควบคุมโรคได้ (Target 70%)</h4>
                            <div class="chart-container" style="max-height: 250px;">
                                <canvas id="roleChart"></canvas>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="bg-white border rounded p-4 shadow-sm">
                                <h4 class="font-bold text-gray-700 mb-2">⚙️ สถานะระบบ (System Health)</h4>
                                <div class="space-y-2">
                                    <div class="flex justify-between text-sm"><span>Active Users (Today)</span> <span class="font-bold">842</span></div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-green-600 h-2.5 rounded-full" style="width: 85%"></div>
                                    </div>
                                    <div class="flex justify-between text-sm mt-2"><span>Database Storage</span> <span class="font-bold">45%</span></div>
                                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white border rounded p-4 shadow-sm">
                                <h4 class="font-bold text-gray-700 mb-2">👥 User Management (Admin Only)</h4>
                                <table class="w-full text-xs text-left">
                                    <tr class="border-b"><th class="py-1">User</th><th class="py-1">Role</th><th class="py-1">Action</th></tr>
                                    <tr class="border-b"><td class="py-1">Dr. Somsak</td><td>Staff</td><td class="text-blue-600 cursor-pointer">Edit</td></tr>
                                    <tr class="border-b"><td class="py-1">VHV Manee</td><td>VHV</td><td class="text-blue-600 cursor-pointer">Edit</td></tr>
                                </table>
                                <button class="mt-3 w-full border border-dashed border-gray-400 text-gray-500 py-1 rounded text-xs hover:bg-gray-50">+ Add New User</button>
                            </div>
                        </div>
                    </div>
                `
            }
        };

        const matrixData = [
            { feature: "ดูรายงานสุขภาพ (ตนเอง)", p1: "✅", p2: "✅", p3: "-", p4: "✅", p5: "-", p6: "✅" },
            { feature: "ดูรายงานสุขภาพ (ทุกคน)", p1: "-", p2: "-", p3: "-", p4: "✅", p5: "-", p6: "✅" },
            { feature: "รับแจ้งเตือนยา/นัดหมาย", p1: "✅", p2: "✅", p3: "แจ้ง", p4: "จัดการ", p5: "-", p6: "จัดการ" },
            { feature: "แชท (Chat)", p1: "✅", p2: "✅", p3: "✅", p4: "✅", p5: "-", p6: "ดูประวัติ" },
            { feature: "บันทึกเยี่ยมบ้าน", p1: "-", p2: "-", p3: "✅", p4: "ดู", p5: "-", p6: "จัดการ" },
            { feature: "คลังความรู้", p1: "อ่าน", p2: "อ่าน", p3: "อ่าน", p4: "จัดการ", p5: "อ่าน", p6: "จัดการ" },
            { feature: "ดู KPI ภาพรวม", p1: "-", p2: "-", p3: "-", p4: "✅", p5: "✅", p6: "✅" },
            { feature: "จัดการ User ทั้งระบบ", p1: "-", p2: "-", p3: "-", p4: "-", p5: "-", p6: "✅" },
        ];

        let currentRoleChart = null;
        let overviewChart = null;

        // --- INIT ---
        document.addEventListener('DOMContentLoaded', () => {
            renderMatrix();
            initOverviewChart();
            setRole(1); // Default role
        });

        // --- NAVIGATION LOGIC ---
        function switchSection(sectionId) {
            // Update Nav State
            document.querySelectorAll('.nav-btn').forEach(btn => btn.classList.remove('active', 'bg-teal-700', 'text-white'));
            document.querySelectorAll('.nav-btn').forEach(btn => btn.classList.add('text-gray-700'));
            
            const activeBtn = document.getElementById(`nav-${sectionId}`);
            if(activeBtn) {
                activeBtn.classList.add('active', 'bg-teal-700', 'text-white');
                activeBtn.classList.remove('text-gray-700');
            }

            // Show/Hide Sections
            document.getElementById('section-overview').classList.add('hidden');
            document.getElementById('section-simulator').classList.add('hidden');
            document.getElementById('section-matrix').classList.add('hidden');

            document.getElementById(`section-${sectionId}`).classList.remove('hidden');

            // Resize charts if section becomes visible
            if (sectionId === 'overview' && overviewChart) {
                overviewChart.resize();
            }
        }

        function quickJumpToRole(roleId) {
            switchSection('simulator');
            // Map generic IDs to specific simulators
            let targetRole = roleId;
            if (roleId === 6) targetRole = 5; // Map Admin to Agency/Admin view
            if (roleId === 2) targetRole = 1; // Map Caregiver to Patient view
            setRole(targetRole);
        }

        // --- ROLE SIMULATOR LOGIC ---
        function setRole(roleId) {
            // Update Sidebar UI
            document.querySelectorAll('.role-select-btn').forEach(btn => {
                btn.classList.remove('active', 'border-teal-500', 'ring-2', 'ring-teal-500', 'bg-teal-50');
                if(parseInt(btn.dataset.role) === roleId) {
                    btn.classList.add('active', 'border-teal-500', 'ring-2', 'ring-teal-500', 'bg-teal-50');
                }
            });

            const data = roleData[roleId];
            
            // Update Mock Interface Header
            const header = document.getElementById('mock-header');
            header.className = `p-4 flex justify-between items-center text-white transition-colors duration-500 ${data.theme.replace('bg-', 'bg-')}`; // Tailwind class replacement trick might need explicit mapping if simple replacement fails, but bg-rose-600 works directly.
            // Explicit color mapping for reliability
            if (roleId === 1) header.style.backgroundColor = '#e11d48'; // Rose 600
            if (roleId === 3) header.style.backgroundColor = '#16a34a'; // Green 600
            if (roleId === 4) header.style.backgroundColor = '#0d9488'; // Teal 600
            if (roleId === 5) header.style.backgroundColor = '#4338ca'; // Indigo 700

            document.getElementById('mock-role-title').innerText = data.title;

            // Update Mock Content
            document.getElementById('mock-content').innerHTML = data.mockContent;

            // Render Chart for Role
            renderRoleChart(roleId);
        }

        // --- CHART JS LOGIC ---
        function initOverviewChart() {
            const ctx = document.getElementById('overviewChart').getContext('2d');
            overviewChart = new Chart(ctx, {
                type: 'polarArea',
                data: {
                    labels: ['Patient', 'Caregiver', 'VHV', 'Staff', 'Agency', 'Admin'],
                    datasets: [{
                        label: 'Access Level Score',
                        data: [3, 3, 5, 8, 4, 10], // Arbitrary score based on feature count
                        backgroundColor: [
                            'rgba(244, 63, 94, 0.5)', // Rose
                            'rgba(251, 146, 60, 0.5)', // Orange
                            'rgba(34, 197, 94, 0.5)', // Green
                            'rgba(13, 148, 136, 0.5)', // Teal
                            'rgba(79, 70, 229, 0.5)', // Indigo
                            'rgba(30, 41, 59, 0.5)'  // Slate
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { r: { suggestedMax: 10, ticks: { display: false } } },
                    plugins: { legend: { position: 'right' } }
                }
            });
        }

        function renderRoleChart(roleId) {
            const canvas = document.getElementById('roleChart');
            if (!canvas) return; // Sometimes chart is not in the mock content

            if (currentRoleChart) currentRoleChart.destroy();

            const ctx = canvas.getContext('2d');

            // Patient View: Line Chart (BP)
            if (roleId === 1) {
                currentRoleChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                        datasets: [{
                            label: 'Systolic BP',
                            data: [120, 122, 118, 125, 130, 128, 122],
                            borderColor: '#e11d48',
                            tension: 0.3
                        }, {
                            label: 'Diastolic BP',
                            data: [80, 82, 78, 85, 88, 84, 80],
                            borderColor: '#fda4af',
                            tension: 0.3
                        }]
                    },
                    options: { responsive: true, maintainAspectRatio: false }
                });
            }
            // VHV View: Bar Chart (Visits)
            else if (roleId === 3) {
                currentRoleChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                        datasets: [{
                            label: 'เยี่ยมบ้านสำเร็จ',
                            data: [5, 8, 4, 6],
                            backgroundColor: '#22c55e'
                        }]
                    },
                    options: { responsive: true, maintainAspectRatio: false }
                });
            }
            // Staff View: Multi-line (Trends)
            else if (roleId === 4) {
                currentRoleChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                        datasets: [{
                            label: 'ผู้ป่วยควบคุมน้ำตาลได้',
                            data: [45, 48, 52, 50, 58, 65],
                            borderColor: '#0d9488',
                            fill: true,
                            backgroundColor: 'rgba(13, 148, 136, 0.1)'
                        }]
                    },
                    options: { responsive: true, maintainAspectRatio: false }
                });
            }
            // Admin View: Doughnut (KPI)
            else if (roleId === 5) {
                currentRoleChart = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Pass Target', 'Below Target', 'Critical'],
                        datasets: [{
                            data: [65, 25, 10],
                            backgroundColor: ['#4338ca', '#f59e0b', '#ef4444']
                        }]
                    },
                    options: { responsive: true, maintainAspectRatio: false }
                });
            }
        }

        // --- MATRIX RENDERING ---
        function renderMatrix() {
            const tbody = document.getElementById('matrix-body');
            matrixData.forEach((row, index) => {
                const tr = document.createElement('tr');
                tr.className = index % 2 === 0 ? 'bg-white hover:bg-gray-50' : 'bg-gray-50 hover:bg-gray-100';
                tr.innerHTML = `
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 sticky left-0 ${index % 2 === 0 ? 'bg-white' : 'bg-gray-50'}">${row.feature}</th>
                    <td class="px-6 py-4 text-center ${row.p1 !== '-' ? 'text-teal-600 font-bold' : 'text-gray-300'}">${row.p1}</td>
                    <td class="px-6 py-4 text-center ${row.p2 !== '-' ? 'text-teal-600 font-bold' : 'text-gray-300'}">${row.p2}</td>
                    <td class="px-6 py-4 text-center ${row.p3 !== '-' ? 'text-teal-600 font-bold' : 'text-gray-300'}">${row.p3}</td>
                    <td class="px-6 py-4 text-center bg-teal-50 border-x border-teal-100 ${row.p4 !== '-' ? 'text-teal-800 font-bold' : 'text-gray-300'}">${row.p4}</td>
                    <td class="px-6 py-4 text-center ${row.p5 !== '-' ? 'text-teal-600 font-bold' : 'text-gray-300'}">${row.p5}</td>
                    <td class="px-6 py-4 text-center ${row.p6 !== '-' ? 'text-teal-600 font-bold' : 'text-gray-300'}">${row.p6}</td>
                `;
                tbody.appendChild(tr);
            });
        }
    </script>
</body>
</html>