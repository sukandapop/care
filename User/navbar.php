<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>

 
</head>
    <style>
    .navbar a {
        font-size: 3rem;
    }
    /* กำหนดเป้าหมายรายการทั้งหมดในเมนู */
.navbar-default .navbar-nav > li > a {
    /* เพิ่มขนาดตัวอักษรเป็น 15 พิกเซล */
    font-size: 15px; 
 
}

/*---------------------------------------
      MENU              
  -----------------------------------------*/

  .navbar-default {
    background: #51b7fc;
    box-shadow: 0 2px 8px rgba(0,0,0,.075);
    border: none;
    margin-bottom: 0;
    padding: 10px;
  }

  .navbar-default .navbar-brand {
    color: #393939;
    font-weight: 500;
  }

  .navbar-default .navbar-brand .fa {
    color: #ffffff;
  }

  .navbar-default .navbar-nav li.appointment-btn {
    margin: 3px 0 0 20px;
  }

  .navbar-default .navbar-nav li.appointment-btn a {
    background: #a5c422;
    border-radius: 7px;
    color: #ffffff;
    font-size: 2rem;
    font-weight: 600;
    padding-top: 20px;
    padding-bottom: 20px;
  }

  .navbar-default .navbar-nav li.appointment-btn a:hover {
    background: #4267b2;
    color: #ffffff !important;
  }

  .navbar-default .navbar-nav li a {
    color: #302e2eff;
    font-size: 12px;
    font-weight: 800;
    padding-right: 20px;
    padding-left: 20px;
    -webkit-transition: all ease-in-out 0.4s;
    transition: all ease-in-out 0.4s;
  }

  .navbar-default .navbar-nav > li a:hover {
    color: #fcfbfcff !important;
  }

  .navbar-default .navbar-nav > li > a:hover,
  .navbar-default .navbar-nav > li > a:focus {
    color: #555555;
    background-color: transparent;
  }

  .navbar-default .navbar-nav > .active > a,
  .navbar-default .navbar-nav > .active > a:hover,
  .navbar-default .navbar-nav > .active > a:focus {
    color: #393939;
    background-color: transparent;
  }

  .navbar-default .navbar-toggle {
    border: none;
    padding-top: 10px;
  }

  .navbar-default .navbar-toggle .icon-bar {
    background: #393939;
    border-color: transparent;
  }

  .navbar-default .navbar-toggle:hover,
  .navbar-default .navbar-toggle:focus { 
    background-color: transparent;
  }
  
  .nav navbar-nav navbar-right li a {
    font-size: 5rem;
  }

    </style>
<body>

<section class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon icon-bar"></span>
            <span class="icon icon-bar"></span>
            <span class="icon icon-bar"></span>
        </button>
        <a href="index.php" class="navbar-brand">Care connect</a>
    </div>

    <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#top" class="smoothScroll">หน้าแรก</a></li>
            <li><a href="#about" class="smoothScroll">นัดหมาย</a></li>
            <li><a href="#team" class="smoothScroll">ข้อมูลเยี่ยมบ้าน</a></li>
            <li><a href="#news" class="smoothScroll">ความรู้</a></li>
            <li><a href="#google-map" class="smoothScroll">รายงานสุภาพ</a></li>
            <li class="appointment-btn"><a href="#appointment">พูดคุยให้คำปรึกษา</a></li>
        </ul>
    </div>
</div>
</section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
     <script>
// Navbar scroll effect
window.addEventListener('scroll', () => {
     const navbar = document.querySelector('.navbar');
     if (window.scrollY > 80) {
navbar.classList.add('scrolled');
     } else {
navbar.classList.remove('scrolled');
     }
});
     </script>

</body>
</html>   