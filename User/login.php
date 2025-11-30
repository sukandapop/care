<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Connect: เข้าสู่ระบบ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Firebase Imports for Authentication and Firestore -->
    <script type="module">
        import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-app.js";
        import { getAuth, signInWithCustomToken, signInAnonymously, onAuthStateChanged, signInWithEmailAndPassword, setPersistence, browserSessionPersistence } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-auth.js";
        import { getFirestore, doc, setDoc, getDoc } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-firestore.js";
        
        // Global variables are automatically provided by the platform
        const appId = typeof __app_id !== 'undefined' ? __app_id : 'default-app-id';
        const firebaseConfig = typeof __firebase_config !== 'undefined' ? JSON.parse(__firebase_config) : {};
        const initialAuthToken = typeof __initial_auth_token !== 'undefined' ? __initial_auth_token : null;

        let app, db, auth, currentUserId = null;

        window.firebaseInit = async () => {
            if (Object.keys(firebaseConfig).length === 0) {
                console.error("Firebase configuration is missing. Cannot initialize Firebase.");
                // Fallback to mock login if config is not available
                document.getElementById('mockLoginBtn').classList.remove('hidden');
                return;
            }

            try {
                // 1. Initialize Firebase
                app = initializeApp(firebaseConfig);
                auth = getAuth(app);
                db = getFirestore(app);
                
                // 2. Set Persistence (optional, but good practice)
                await setPersistence(auth, browserSessionPersistence);

                // 3. Handle Initial Authentication (Canvas environment custom token)
                if (initialAuthToken) {
                    await signInWithCustomToken(auth, initialAuthToken);
                } else {
                    await signInAnonymously(auth);
                }
                
                // 4. Set up Auth State Listener
                onAuthStateChanged(auth, (user) => {
                    if (user) {
                        currentUserId = user.uid;
                        console.log("Firebase Auth Ready. User ID:", currentUserId);
                    } else {
                        currentUserId = null;
                        console.log("User is signed out or anonymous.");
                    }
                });

                window.auth = auth;
                window.db = db;
                window.currentUserId = currentUserId; // Export for use in handleLogin

            } catch (error) {
                console.error("Firebase Initialization or Auth Error:", error);
                // Fallback to mock login if initialization fails
                document.getElementById('mockLoginBtn').classList.remove('hidden');
                showMessageBox('ข้อผิดพลาด', 'ไม่สามารถเชื่อมต่อระบบยืนยันตัวตนได้ กรุณาลองใหม่อีกครั้ง');
            }
        };

        window.firebaseInit();
    </script>
    
    <style>
        body {
            font-family: 'Sarabun', sans-serif;
            background-color: #f0f4f8;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
        }

        .login-card {
            background-color: #ffffff;
            border-radius: 1.5rem; /* Large rounded corners */
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            max-width: 440px;
            width: 95%;
            padding: 2.5rem;
            border-top: 5px solid #10b981; /* Emerald border for brand color */
        }

        .input-field {
            border: 1px solid #d1d5db;
            border-radius: 0.5rem;
            padding: 0.75rem 1rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .input-field:focus {
            border-color: #10b981;
            outline: none;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.2); /* Light emerald focus ring */
        }
    </style>
</head>
<body>

    <div class="login-card text-center">
        
        <!-- App Header/Branding -->
        <div class="mb-8">
            <div class="mx-auto w-16 h-16 bg-emerald-500 rounded-full flex items-center justify-center shadow-lg mb-3">
                <span class="text-3xl" role="img" aria-label="Heart with checkmark">💚</span>
            </div>
            <h1 class="text-3xl font-bold text-gray-800">Care Connect</h1>
            <p class="text-gray-500 mt-1">เข้าสู่ระบบเพื่อปฏิบัติการ</p>
        </div>

        <!-- Login Form -->
        <form onsubmit="handleLogin(event)">
            <div class="mb-5 text-left">
                <label for="username" class="block text-gray-700 font-semibold mb-2">รหัสผู้ใช้งาน (Username / Email)</label>
                <input type="text" id="username" name="username" required 
                       placeholder="เช่น sssomjai.vhv@example.com"
                       class="input-field w-full"
                       autocomplete="username">
            </div>
            <div class="mb-6 text-left">
                <label for="password" class="block text-gray-700 font-semibold mb-2">รหัสผ่าน</label>
                <input type="password" id="password" name="password" required 
                       placeholder="รหัสผ่านของคุณ"
                       class="input-field w-full"
                       autocomplete="current-password">
            </div>
            <button type="submit" 
                    class="w-full py-3 bg-emerald-500 text-white font-bold text-lg rounded-lg hover:bg-emerald-600 transition duration-150 shadow-md">
               
                <a href="index.php"> เข้าสู่ระบบ</a>
            </button>
        </form>

        <!-- Mock Login Button (Hidden unless Firebase fails) -->
        <button id="mockLoginBtn" onclick="mockLogin()" 
                class="hidden w-full py-3 mt-4 bg-gray-500 text-white font-bold text-lg rounded-lg hover:bg-gray-600 transition duration-150">
            เข้าสู่ระบบ (จำลอง)
        </button>

        <!-- Links -->
        <div class="mt-6 text-sm flex justify-between">
            <a href="#" onclick="showMessageBox('ช่วยเหลือ', 'หากคุณลืมรหัสผ่าน กรุณาติดต่อหัวหน้าทีม CM หรือเจ้าหน้าที่ รพ.สต. เพื่อรีเซ็ตรหัสผ่าน')"
               class="text-emerald-600 hover:text-emerald-800 hover:underline transition duration-150">
                ลืมรหัสผ่าน?
            </a>
            <a href="#" onclick="showMessageBox('ติดต่อผู้ดูแล', 'หากคุณไม่มีบัญชีผู้ใช้งาน กรุณาติดต่อผู้ดูแลระบบเพื่อสร้างบัญชีใหม่')"
               class="text-gray-500 hover:text-gray-700 hover:underline transition duration-150">
                ไม่มีบัญชี?
            </a>
        </div>
    </div>
    
    <!-- Custom Modal for Alerts/Messages -->
    <div id="messageBox" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
        <div class="bg-white p-6 rounded-xl shadow-2xl max-w-sm w-full">
            <h4 id="messageTitle" class="text-lg font-bold text-gray-800 mb-3">การแจ้งเตือนระบบ</h4>
            <p id="messageContent" class="text-gray-700 mb-4 text-left"></p>
            <button onclick="closeMessageBox()" class="bg-emerald-600 text-white py-2 px-4 rounded-lg w-full hover:bg-emerald-700">ตกลง</button>
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

        // --- LOGIN HANDLER ---
        async function handleLogin(event) {
            event.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('password').value;
            const loginButton = event.target.querySelector('button[type="submit"]');

            if (!window.auth) {
                mockLogin();
                return;
            }

            loginButton.disabled = true;
            loginButton.innerText = 'กำลังเข้าสู่ระบบ...';

            try {
                // In a real application, you would use Firebase Authentication here:
                /*
                const userCredential = await signInWithEmailAndPassword(window.auth, username, password);
                const user = userCredential.user;
                // Success: Redirect or update UI
                */

                // --- MOCK SUCCESS (Since full auth flow requires user registration) ---
                await new Promise(resolve => setTimeout(resolve, 1500)); // Simulate network delay
                
                showMessageBox(
                    'เข้าสู่ระบบสำเร็จ!', 
                    `ยินดีต้อนรับผู้ใช้งาน: ${username}\nเข้าสู่ระบบ Care Connect เรียบร้อยแล้ว ระบบจะนำทางคุณไปยัง Dashboard.`
                );

                // Clear form fields
                document.getElementById('username').value = '';
                document.getElementById('password').value = '';

            } catch (error) {
                console.error("Login Error:", error);
                let errorMessage = 'รหัสผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง กรุณาตรวจสอบอีกครั้ง';
                
                // You can refine error messages based on Firebase error codes if using real auth
                if (error.code === 'auth/user-not-found') {
                    errorMessage = 'ไม่พบผู้ใช้งานในระบบ';
                } else if (error.code === 'auth/wrong-password') {
                    errorMessage = 'รหัสผ่านไม่ถูกต้อง';
                }

                showMessageBox('เข้าสู่ระบบล้มเหลว', errorMessage);
                
            } finally {
                loginButton.disabled = false;
                loginButton.innerText = 'เข้าสู่ระบบ';
            }
        }

        function mockLogin() {
             const username = document.getElementById('username').value;
             showMessageBox(
                'เข้าสู่ระบบสำเร็จ (จำลอง)',
                `ผู้ใช้งาน: ${username}\nยินดีต้อนรับเข้าสู่ระบบ Care Connect! (ระบบนี้ยังไม่เชื่อมต่อฐานข้อมูลจริง)`
            );
             document.getElementById('username').value = '';
             document.getElementById('password').value = '';
        }

    </script>
</body>
</html>