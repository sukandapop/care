<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Connect: เข้าสู่ระบบ</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>

<div class="login-card text-center">
    <div class="mb-8">
        <div class="mx-auto w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center shadow-lg mb-3"></div>
        <h1 class="text-3xl font-bold text-gray-800">Care Connect</h1>
        <p class="text-gray-500 mt-1">เข้าสู่ระบบเพื่อปฏิบัติการ</p>
    </div>

    <form onsubmit="handleLogin(event)">
        <div class="mb-5 text-left">
            <label class="block text-gray-700 font-semibold mb-2">รหัสผู้ใช้งาน</label>
            <input class="input-field w-full" required>
        </div>
        <div class="mb-6 text-left">
            <label class="block text-gray-700 font-semibold mb-2">รหัสผ่าน</label>
            <input type="password" class="input-field w-full" required>
        </div>

        <button type="submit"
            class="w-full py-3 bg-blue-500 text-white font-bold text-lg rounded-lg hover:bg-blue-600 transition shadow-md">
            <a href="index.php" class="text-white no-underline">เข้าสู่ระบบ</a>
            
        </button>
    </form>

   

    <div class="mt-6 text-sm flex justify-between">
        <a class="text-blue-600 hover:text-blue-800 hover:underline">ลืมรหัสผ่าน?</a>
        <a class="text-gray-500 hover:text-gray-700 hover:underline">ไม่มีบัญชี?</a>
    </div>
</div>

<div id="messageBox" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50 p-4">
    <div class="bg-white p-6 rounded-xl shadow-2xl max-w-sm w-full">
        <h4 class="text-lg font-bold text-gray-800 mb-3">การแจ้งเตือนระบบ</h4>
        <p class="text-gray-700 mb-4 text-left"></p>
        <button class="bg-blue-600 text-white py-2 px-4 rounded-lg w-full hover:bg-blue-700">ตกลง</button>
    </div>
</div>

</body>
</html>
