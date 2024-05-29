<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PantauTamuPro</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Ninestars
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Updated: May 18 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">
        <img src="assets/img/orange1.png" alt="Pantautamupro">
</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero" class="">Home</a></li>
          <li><a class="nav-link scrollto active" href="#about">About</a></li>
    
          <li><a class="nav-link scrollto active" href="#team">Team</a></li>
          <li><a class="nav-link scrollto active" href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="section hero">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1 class="">PANTAU TAMU PRO</h1>
            <p>
Pantau tamu dengan mudah dan aman menggunakan aplikasi kami. Lacak kunjungan, kelola kontak, dan pastikan pengalaman tamu yang lancar. Tetap terhubung tanpa kehilangan detail penting!</p>
            <div class="d-flex">
            <a href="{{ route('form-kunjungan') }}" class="btn-get-started">Isi Tamu</a> &nbsp; &nbsp;
              <a href="{{ route('codevip') }}"class="btn-get-started">VIP</a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img">
            <img src="assets/img/hero-img.svg" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="section about">

      <div class="container">

        <div class="row gy-3">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/about-img.svg" alt="" class="img-fluid">
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="about-content ps-0 ps-lg-3">
              <h3>ABOUT US</h3>
              <p class="fst-italic">
              Pantau Tamu Pro adalah sebuah aplikasi inovatif yang membantu berbagai organisasi dalam mengelola dan memantau kunjungan tamu secara efisien.
              </p>
              <ul>
                <li>
                  <i class="bi bi-diagram-3"></i>
                  <div>
                    <h4>Fitur Utama</h4>
                    <p>Aplikasi ini menyediakan fitur utama seperti pendaftaran tamu digital, laporan dan analisis, pengingat dan notifikasi.</p>
                  </div>
                </li>
                <li>
                  <i class="bi bi-fullscreen-exit"></i>
                  <div>
                    <h4>Tujuan Utama</h4>
                    <p> untuk  memperbaiki manajemen kunjungan, menyediakan data akurat untuk analisis, dan mendukung inisiatif ramah lingkungan dengan mengurangi penggunaan kertas.</p>
                  </div>
                </li>
              </ul>
              <p>
              Menggunakan Pantau Tamu Pro adalah solusi canggih untuk memonitor tamu yang mengunjungi suatu tempat, memastikan keamanan dan efisiensi dalam manajemen kunjungan. Dengan fitur teknologi terkini, aplikasi ini memudahkan pencatatan dan pengawasan tamu, memberikan pengalaman yang lebih aman dan terorganisir bagi pengguna.
              </p>
            </div>

          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Services Section -->
    <!-- /Services Section -->

    <!-- Portfolio Section -->
   <!-- /Portfolio Section -->

    <!-- Faq Section -->
<!-- /Faq Section -->

    <!-- Team Section -->
    <section id="team" class="team section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Tim Pengembang</h2>
        <p>Tim yang bertanggung jawab atas pembuatan, pengujian, dan pemeliharaan aplikasi. Mereka merancang fitur, mengembangkan kode, dan memastikan keberfungsian aplikasi. Pengembang juga terlibat dalam menangani masukan pengguna, memperbaiki bug, dan mengimplementasikan pembaruan untuk meningkatkan kinerja dan pengalaman pengguna.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <img src="assets/img/bayu.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Muhamad Bayu Candra Pamungkas</h4>
                  <span>UI Mobile</span>
                  <span>Frontend</span>
                </div>
                <div class="social">
                  
              
                  <a href="https://www.instagram.com/ubay_uta?igsh=MjFpZ2VzdHB2cXY5"><i class="bi bi-instagram"></i></a>
                  <a href="https://www.linkedin.com/in/muhamad-bayu-candra-pamungkas-9021291b7/"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <img src="assets/img/fanisa.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Fanisa Nur Arifah</h4>
                  <span>Backend</span>
                  <span>Frontend</span>
                </div>
                <div class="social">
                  
                  <a href="https://www.instagram.com/fanisaarfh?igsh=MWRvMzF3NnN2dGU4MA=="><i class="bi bi-instagram"></i></a>
                  <a href="https://www.linkedin.com/in/fanisa-nur-arifah-a689461b6/"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <img src="assets/img/firda.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Firda Ulfa Unsilah</h4>
                  <span>Project Manager</span>
                </div>
                <div class="social">
                  
                  <a href="https://www.instagram.com/frdulf_?igsh=MWVvY3F4NG5yczR3aQ=="><i class="bi bi-instagram"></i></a>
                  <a href="https://www.linkedin.com/in/firda-ulfa-unsilah-b3252b1b6/"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="member">
              <img src="assets/img/rifqi.jpg" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Septiananda Rifqi Nurhidayat</h4>
                  <span>Backend</span>
                  <span>Frontend</span>
                </div>
                <div class="social">
               
                  <a href="https://www.instagram.com/rifqii_septian?igsh=a2x5Ym85MjZ4b284&utm_source=qr"><i class="bi bi-instagram"></i></a>
                  <a href="https://www.linkedin.com/in/septiananda-rifqi-nurhidayat/"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div><!-- End Team Member -->

        </div>

      </div>

    </section><!-- /Team Section -->

    <!-- Clients Section -->
    
    <!-- /Clients Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Hubungi Kami</h2>
        <!-- <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p> -->
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-5">

            <div class="info-wrap">
              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-geo-alt flex-shrink-0"></i>
                <div>
                  <h3>Alamat</h3>
                  <p>Jl. DR. Soebandi No.29 </p>
                   <p>Kreongan Atas, Jemberlor, Kec. Patrang, Kabupaten Jember, Jawa Timur 68118</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                <i class="bi bi-telephone flex-shrink-0"></i>
                <div>
                  <h3>Telepon</h3>
                  <p>0331487028</p>
                </div>
              </div><!-- End Info Item -->

              <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                <i class="bi bi-envelope flex-shrink-0"></i>
                <div>
                  <h3>Email </h3>
                  <p>dispendik@jemberkab.go.id</p>
                </div>
              </div><!-- End Info Item -->

              <iframe 
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1973.0149763259863!2d113.70262798012148!3d-8.15233048564564!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7b1bfae3eeb55%3A0x3a74696b38f90783!2sPT.%20Mangli%20Djaya%20Raya!5e0!3m2!1sen!2sid!4v1649734707859!5m2!1sen!2sid&zoom=22" 
    frameborder="0" 
    style="border:0; width: 100%; height: 280px;" 
    allowfullscreen="" 
    loading="lazy" 
    referrerpolicy="no-referrer-when-downgrade">
  </iframe>
            </div>
          </div>

<div class="col-lg-7">
  <form action="{{ route('feedback.store') }}" method="POST" >
  @csrf 
  <div class="row gy-4">
    <div class="col-md-12">
      <p>Berikan feedback Anda dan bantu kami meningkatkan pengalaman Anda di website ini. Terima kasih!</p>
      <label for="keterangan" class="pb-2">Message</label>
      <textarea class="form-control" name="keterangan" rows="10" id="keterangan" required=""></textarea>
    </div>
    <div class="col-md-12 text-center">
  <button type="submit" class="btn btn-primary" style="background-color: #eb5d1e; border-color: orange;">Send Message</button>
</div>

  </div>
  </form>
</div>

  <footer id="footer" class="footer position-relative">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <span class="sitename">Dinas Pendidikan Kabupaten Jember</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Bersama Membangun Generasi Cerdas dan Berkarakter </p> 
          </div>
        </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Menu Utama</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#home">Home</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#about">About</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#team">Team</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#contact">Contact</a></li>
            </ul>
          </div>



        <div class="col-lg-4 col-md-12">
          <h4>Follow Us</h4>
          <p>Ikuti Media Sosial Kami Untuk Mendapatkan Informasi Menarik Lainnya</p>
          <div class="social-links d-flex">
            <a href="https://www.facebook.com/dispendik.jember/"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/dispendik.jember?igsh=Mnk1bGdzYXp1MzFt"><i class="bi bi-instagram"></i></a>
            <a href="https://www.youtube.com/channel/UCoGNlbM_8QMv7XCTPiVxMbQ/featured"><i class="bi bi-youtube"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Pantau Tamu Pro</strong> <span>All Rights Reserved</span></p>
      <a href="{{ route('login') }}" class="btn-get-started">Login</a>
      <div class="credits">
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
 
  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  
</body>

</html>