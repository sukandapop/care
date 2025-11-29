<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Connect: เลือกบทบาท</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Design Notes:
        1. Use Sarabun font for clean, professional look.
        2. Light blue background as shown in the provided image.
        3. Role cards are centered and use distinct colors for action buttons (Login).
        4. Fully responsive layout using flexbox and grid, adapting well to mobile screens.
    -->
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #87ceeb; /* Sky Blue - Similar to the image provided */
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }

        .card {
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.2), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        .login-button {
            border-radius: 0.75rem; /* Rounded corners */
        }
    </style>
</head>
<body>

    <div class="w-full max-w-6xl text-center">
        
        <!-- Logo and Title Area -->
        <div class="mb-10">
            <div class="mx-auto w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center shadow-lg mb-4">
                <span class="text-xl font-bold text-gray-700">Logo</span>
            </div>
            <h1 class="text-3xl font-bold text-white tracking-widest">แคร์คอนเนค</h1>
            <p class="text-lg text-white/90 uppercase tracking-widest">Care Connect</p>
        </div>

        <!-- Role Selection Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 mx-auto">
            
            <!-- 1. ผู้ป่วย (Patient) -->
            <div class="card bg-white rounded-xl shadow-xl overflow-hidden">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-4">ผู้ป่วย</h2>
                   
                </div>
                <button onclick="login('ผู้ป่วย')" class="w-full py-3 text-lg font-bold text-white bg-blue-600 hover:bg-blue-700 transition duration-150">
                    เข้าสู่ระบบ
                </button>
            </div>
            
            <!-- 2. ผู้ดูแล (Caregiver) -->
            <div class="card bg-white rounded-xl shadow-xl overflow-hidden">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-4">ผู้ดูแล</h2>
                
                </div>
                <button onclick="login('ผู้ดูแล')" class="w-full py-3 text-lg font-bold text-gray-800 bg-yellow-400 hover:bg-yellow-500 transition duration-150">
                    เข้าสู่ระบบ
                </button>
            </div>
            
            <!-- 3. อสม. (VHV) -->
            <div class="card bg-white rounded-xl shadow-xl overflow-hidden">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-4">อสม.</h2>
                 
                </div>
                <button onclick="login('อสม.')" class="w-full py-3 text-lg font-bold text-white bg-pink-500 hover:bg-pink-600 transition duration-150">
                    เข้าสู่ระบบ
                </button>
            </div>
            
            <!-- 4. CM (Case Manager) -->
            <div class="card bg-white rounded-xl shadow-xl overflow-hidden">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-4">CM</h2>
                  
                </div>
                <button onclick="login('CM')" class="w-full py-3 text-lg font-bold text-white bg-green-500 hover:bg-green-600 transition duration-150">
                    เข้าสู่ระบบ
                </button>
            </div>

            <!-- 5. PCU / รพ.สต. (Clinic Staff) -->
            <div class="card bg-white rounded-xl shadow-xl overflow-hidden">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-4">รพ.สต.</h2>
                  
                </div>
                <button onclick="login('PCU/รพ.สต.')" class="w-full py-3 text-lg font-bold text-white bg-teal-500 hover:bg-teal-600 transition duration-150">
                    เข้าสู่ระบบ
                </button>
            </div>

            <!-- 6. แอดมิน (Admin) -->
            <div class="card bg-white rounded-xl shadow-xl overflow-hidden">
                <div class="p-6">
                    <h2 class="text-2xl font-semibold text-gray-700 mb-4">แอดมิน</h2>
                   
                </div>
                <button onclick="login('แอดมิน')" class="w-full py-3 text-lg font-bold text-white bg-indigo-600 hover:bg-indigo-700 transition duration-150">
                    เข้าสู่ระบบ
                </button>
            </div>

        </div>

        <!-- Custom Modal for Alerts/Messages -->
        <div id="messageBox" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
            <div class="bg-white p-6 rounded-xl shadow-2xl max-w-sm w-full">
                <h4 id="messageTitle" class="text-lg font-bold text-gray-800 mb-3">การแจ้งเตือนระบบ</h4>
                <p id="messageContent" class="text-gray-700 mb-4 text-left"></p>
                <button onclick="closeMessageBox()" class="bg-green-600 text-white py-2 px-4 rounded-lg w-full hover:bg-green-700">ตกลง</button>
            </div>
        </div>

    </div>

    <script>
        // --- MESSAGE BOX LOGIC (Replaces alert() and confirm()) ---
        function showMessageBox(title, content) {
            document.getElementById('messageTitle').innerText = title;
            document.getElementById('messageContent').innerText = content;
            document.getElementById('messageBox').classList.remove('hidden');
            document.getElementById('messageBox').classList.add('flex');
        }

        function closeMessageBox() {
            document.getElementById('messageBox').classList.add('hidden');
            document.getElementById('messageBox').classList.remove('flex');
        }
        
        // --- MOCK LOGIN FUNCTION ---
        function login(role) {
            showMessageBox(
                'ดำเนินการต่อ',
                `คุณเลือกเข้าสู่ระบบในฐานะ "${role}" ระบบจะนำไปยังหน้าจอการยืนยันตัวตนต่อไป`
            );
            // ในระบบจริง จะมีการเปลี่ยนหน้าไปที่ /login?role=role_name หรือแสดงฟอร์ม Login/OTP 
        }
    </script>
</body>
</html>