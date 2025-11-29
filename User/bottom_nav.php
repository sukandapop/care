<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

 <style>
/* Bottom nav สไตล์ Care Connect */
.bottom-nav {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background: #51b7fc; /* สี navbar Care Connect */
    display: flex;
    justify-content: space-around;
    align-items: center;
    padding: 8px 0;
    border-top: 2px solid #4267b2;
    z-index: 9999;
    box-shadow: 0 -2px 8px rgba(0,0,0,0.2);
}

.bottom-nav a {
    text-decoration: none;
    color: #ffffff;
    font-weight: 600;
    font-size: 14px;
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: 0.3s;
    font-size: large;
}



@media (min-width: 768px) {
  .bottom-nav {
    display: none; /* ซ่อนเมนูมือถือบน desktop */
  }
}
</style>

<div class="bottom-nav ">
    <a href="index.php" class="active">
        <i class="fa-solid fa-house"></i>
        <span>หน้าแรก</span>
    </a>
    <a href="appointment.php" class="active">
        <i class="fa-solid fa-calendar-check"></i>
        <span>นัดหมาย</span>
    </a>
    <a href="take_medicine.php" class="active">
        <i class="fa-solid fa-users"></i>
        <span>รับประทานยา</span>
    </a>
    <a href="#contact"class="active">
        <i class="fa-solid fa-comments"></i>
        <span>ปรึกษา</span>
    </a>
</div>

  
    
</body>
</html>