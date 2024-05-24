<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT-PRO</title>
    <!-- My Style -->
    <link rel="stylesheet" href="{{asset('css/user.css')}}" />
     <!-- Remix Icon -->
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" type="text/css" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
</head>
<body>
<div class="navbar">
    <div class="navbar-nav">
    <img src="{{asset('img/PT-PRO.png')}}" alt="logo" style="width:200px"/>
     
    </div>
    <div class="navbar-nav">
      <a href="#home">Home</a>
      <a href="#contact">Kontak Kami</a>
    </div>
  </div>

  <!-- Hero Section start -->
  <section class="hero" id="home">
      <main class="content">
        <h1>Pantau <span>Tamu-Pro</span></h1>
        <p> Jaga jejak tamu Anda dengan mudah dan aman menggunakan aplikasi buku tamu kami. Dengan fitur-fitur yang praktis dan andal, Anda dapat melacak setiap kunjungan, mengelola informasi kontak, dan memastikan pengalaman tamu yang lancar setiap saat. Tetap terhubung dengan para tamu Anda, tanpa kehilangan detail penting!</p>
        <a href="{{ route('form-kunjungan') }}" class="btn">Isi Tamu</a>
        <a href="{{ route('codevip') }}" class="btn">VIP</a>
      </main>
      <div class="header__image">
        <img src="img/icon.png" alt="header" />
        <div class="ellipse-2"></div>
        <div class="ellipse-3"></div>
      </div>
    </section>
    <!-- Hero Section end -->

   <!-- About Section start -->
<!-- About Section start -->

    <!-- Contact Section 2 Start -->
    <section id="contact" class="footcont">
    <footer>
        <div class="feedback-form-and-map">
            <div class="feedback-form">
                <!-- <form action="mailto:tujuan@gmail.com" method="post" enctype="text/plain"> -->
                    <p style="font-size: 25px; font-family: serif;">BERHUBUNGAN DENGAN KAMI!</p><br>
                    <p style="color: #d9cb06;">Kami Selalu Mencari Cara Untuk Berhubungan Dengan Mereka Yang Ingin Menyampaikan<br>Kesan dan Pesan Untuk Aplikasi Kami.</p><br>
                    <label for="feedback">Masukkan masukan Anda:</label><br>
                    <form action="/feedback" method="post">
                      @csrf
                      <div class="form-group">
                        <textarea id="feedback" name="keterangan" rows="4" cols="50"></textarea>
                        &nbsp; &nbsp;
                        <button type="submit" style="background: none; border: none; padding: 0;"><i class="bi bi-arrow-right-circle" style="font-size: 20px; color:white;"></i></button>
                      </div>
                    </form>
                    <br><br>
                    <p style="font-size: 15px; font-family: serif;">LEBIH DEKAT DENGAN KAMI!</p><br>
                    <p style="color: #d9cb06;">Kunjungi Dan Temukan Kami Diberbagai Platform Social Media Untuk Mengeksplor Lebih Jauh.</p><br>
                    <div class="social-icons" style="color: #fff;">
                        <a href="https://dispendik.jemberkab.go.id/pengumuman"><i class="bi-globe" style="font-size: 20px; color:white;"></i></a>
                        &nbsp;&nbsp;
                        <a href="https://www.facebook.com/dispendik.jember/?locale=id_ID"><i class="bi-facebook" style="font-size: 20px; color:white;"></i></a>
                        &nbsp;&nbsp;
                        <a href="https://twitter.com/diknasjember"><i class="bi-twitter" style="font-size: 20px; color:white;"></i></a>
                        &nbsp;&nbsp;
                        <a href="https://www.instagram.com/dispendik.jember/"><i class="bi-instagram" style="font-size: 20px; color:white;"></i></a>
                    </div>
                <!-- </form> -->
                </div>
            <div class="maps-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1973.0149763259863!2d113.70262798012148!3d-8.15233048564564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7b1bfae3eeb55%3A0x3a74696b38f90783!2sPT.%20Mangli%20Djaya%20Raya!5e0!3m2!1sen!2sid!4v1649734707859!5m2!1sen!2sid&z=20" width="900" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            <div class="footer-content">
            <p>Hak Cipta © 2024 Pantau Tamu Pro. Dibuat dengan <i class="ri-heart-fill"></i> oleh Tim Pengembang Aplikasi |</p>
            <p>Powered By Smart IT</p>
            <br>
            <a href="/login">Login Admin</a>
        </div>
          </div>
         
        </div>
       
        
    </footer>
</section>

    
</body>
</html>