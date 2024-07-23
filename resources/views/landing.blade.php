<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <title>Index - Arsha Bootstrap Template</title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="/arsha/assets/img/favicon.png" rel="icon">
        <link href="/arsha/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com" rel="preconnect">
        <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="/arsha/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="/arsha/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
        <link href="/arsha/assets/vendor/aos/aos.css" rel="stylesheet">
        <link href="/arsha/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
        <link href="/arsha/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

        <!-- Main CSS File -->
        <link href="/arsha/assets/css/main.css" rel="stylesheet">

        <!-- =======================================================
  * Template Name: Arsha
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Updated: Jun 29 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

        @vite(['resources/app.js'])
    </head>

    <body class="index-page">

        <header id="header" class="header d-flex align-items-center fixed-top">
            <div class="container-fluid container-xl position-relative d-flex align-items-center">

                <a href="/" class="logo d-flex align-items-center me-auto">
                    <!-- Uncomment the line below if you also wish to use an image logo -->
                    <!-- <img src="/arsha/assets/img/logo.png" alt=""> -->
                    <h1 class="sitename">Smartgama</h1>
                </a>

                <nav id="navmenu" class="navmenu">
                    <ul>
                        <li><a href="#hero" class="active">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#pricing">Pricing</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
                </nav>

                <a class="btn-getstarted" href="#pricing">Daftar Sekarang</a>
                <a href="{{ route('login') }}" class="btn-watch-video d-flex align-items-center ps-3">Login</a>

            </div>
        </header>

        <main class="main">

            <!-- Hero Section -->
            <section id="hero" class="hero section dark-background">

                <div class="container">
                    <div class="row gy-4">
                        <div class="col-lg-6 order-lg-1 d-flex flex-column justify-content-center order-2"
                            data-aos="zoom-out">
                            <h1>Better Solutions For Your Learning Journey</h1>
                            <p>Bimbingan Belajar Terbaik dan Terbesar Se-Yogyakarta</p>
                            <div class="d-flex">
                                <a href="#pricing" class="btn-get-started">Daftar Sekarang</a>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 hero-img order-1" data-aos="zoom-out" data-aos-delay="200">
                            <img src="/arsha/assets/img/hero-img.png" class="img-fluid animated" alt="">
                        </div>
                    </div>
                </div>

            </section><!-- /Hero Section -->

            <!-- About Section -->
            <section id="about" class="about section">

                <!-- Section Title -->
                <div class="section-title container" data-aos="fade-up">
                    <h2>About Us</h2>
                </div><!-- End Section Title -->

                <div class="container">

                    <div class="row gy-4">

                        <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="100">
                            <p>
                                Smartgama adalah bimbingan belajar tatap muka berbasis teknologi online yang
                                telah berhasil mengantarkan 47.000 lebih kelulusan siswa ke PTN dan PT Kedinasan pada
                                tahun 2023 dan angka tersebut terus meningkat setiap tahunnya. Kami telah meraih 2
                                penghargaan MURI yaitu sebagai Bimbel Terbaik dengan Kelulusan Siswa Terbanyak ke PTN
                                dan PT Kedinasan se-Indonesia, dan Bimbel Terbesar dengan Lokasi Terbanyak se-Indonesia
                                yang dikelola secara terpusat (no franchise). Kami berdiri sejak 2 Mei
                                1984, dan memiliki visi untuk menjadi bimbingan belajar terbaik dan terbesar
                                se-Indonesia.
                            </p>
                            <ul>
                                <li><i class="bi bi-check2-circle"></i> <span>Telah Meluluskan 47.000 Lebih Siswa ke
                                        PTN & PT Kedinasan Impian di Tahun 2023</span></li>
                                <li><i class="bi bi-check2-circle"></i> <span>Menerapkan Formula 3B, Yaitu: Belajar,
                                        Berlatih, Bertanding
                                    </span></li>
                                <li><i class="bi bi-check2-circle"></i> <span>Memiliki Konsep The King, Berpikir
                                        Kreatif Sebagai Strategi Untuk Menjawab Soal dengan Mudah, Cepat, dan Akurat
                                    </span></li>
                            </ul>
                        </div>

                    </div>

                </div>

            </section>
            <!-- /About Section -->

            <!-- Pricing Section -->
            <section id="pricing" class="pricing section light-background">

                <!-- Section Title -->
                <div class="section-title container" data-aos="fade-up">
                    <h2>Program</h2>
                    <p>Daftar Program Kami</p>
                </div><!-- End Section Title -->

                <div class="container">

                    <div class="row gy-4 justify-content-center flex-wrap">

                        @foreach ($programs as $program)
                            <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                                <div class="pricing-item featured">
                                    <h3>{{ $program->nama }}</h3>
                                    <h4><sup>Rp</sup>{{ $program->harga }}<span> / Semester</span></h4>
                                    <ul>
                                        <li><i class="bi bi-check"></i> <span>Pengajar Ahli</span></li>
                                        <li><i class="bi bi-check"></i> <span>Pendampingan</span></li>
                                        <li><i class="bi bi-check"></i> <span>Materi Terlengkap</span></li>
                                        <li><i class="bi bi-check"></i> <span>Tes Progresif Berkala</span>
                                        </li>
                                    </ul>
                                    <a href="{{ route('register', [
                                        'program_id' => $program->id,
                                    ]) }}"
                                        class="buy-btn">Daftar Sekarang</a>
                                </div>
                            </div><!-- End Pricing Item -->
                        @endforeach

                    </div>

                </div>

            </section><!-- /Pricing Section -->

            <!-- Testimonials Section -->
            <section id="testimonials" class="testimonials section">

                <!-- Section Title -->
                <div class="section-title container" data-aos="fade-up">
                    <h2>Testimonials</h2>
                    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
                </div><!-- End Section Title -->

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="swiper init-swiper">
                        <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <img src="/arsha/assets/img/testimonials/testimonials-1.jpg"
                                        class="testimonial-img" alt="">
                                    <h3>Saul Goodman</h3>
                                    <h4>Ceo &amp; Founder</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Proin iaculis purus consequat sem cure digni ssim donec porttitora entum
                                            suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et.
                                            Maecen aliquam, risus at semper.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <img src="/arsha/assets/img/testimonials/testimonials-2.jpg"
                                        class="testimonial-img" alt="">
                                    <h3>Sara Wilsson</h3>
                                    <h4>Designer</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Export tempor illum tamen malis malis eram quae irure esse labore quem
                                            cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua
                                            noster fugiat irure amet legam anim culpa.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <img src="/arsha/assets/img/testimonials/testimonials-3.jpg"
                                        class="testimonial-img" alt="">
                                    <h3>Jena Karlis</h3>
                                    <h4>Store Owner</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla
                                            quem veniam duis minim tempor labore quem eram duis noster aute amet eram
                                            fore quis sint minim.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <img src="/arsha/assets/img/testimonials/testimonials-4.jpg"
                                        class="testimonial-img" alt="">
                                    <h3>Matt Brandon</h3>
                                    <h4>Freelancer</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export
                                            minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt
                                            elit fore quem dolore labore illum veniam.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <img src="/arsha/assets/img/testimonials/testimonials-5.jpg"
                                        class="testimonial-img" alt="">
                                    <h3>John Larson</h3>
                                    <h4>Entrepreneur</h4>
                                    <div class="stars">
                                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i
                                            class="bi bi-star-fill"></i>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam
                                            tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum
                                            fugiat legam esse veniam culpa fore nisi cillum quid.</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->

                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                </div>

            </section><!-- /Testimonials Section -->

            <!-- Contact Section -->
            <section id="contact" class="contact section">

                <!-- Section Title -->
                <div class="section-title container" data-aos="fade-up">
                    <h2>Contact</h2>
                    <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
                </div><!-- End Section Title -->

                <div class="container" data-aos="fade-up" data-aos-delay="100">

                    <div class="row gy-4">

                        <div class="col-lg-5">

                            <div class="info-wrap">
                                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                                    <i class="bi bi-geo-alt flex-shrink-0"></i>
                                    <div>
                                        <h3>Address</h3>
                                        <p>A108 Adam Street, New York, NY 535022</p>
                                    </div>
                                </div><!-- End Info Item -->

                                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                                    <i class="bi bi-telephone flex-shrink-0"></i>
                                    <div>
                                        <h3>Call Us</h3>
                                        <p>+1 5589 55488 55</p>
                                    </div>
                                </div><!-- End Info Item -->

                                <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                                    <i class="bi bi-envelope flex-shrink-0"></i>
                                    <div>
                                        <h3>Email Us</h3>
                                        <p>info@example.com</p>
                                    </div>
                                </div><!-- End Info Item -->

                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus"
                                    style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade" title=""></iframe>
                            </div>
                        </div>

                        <div class="col-lg-7">
                            <form action="forms/contact.php" method="post" class="php-email-form"
                                data-aos="fade-up" data-aos-delay="200">
                                <div class="row gy-4">

                                    <div class="col-md-6">
                                        <label for="name-field" class="pb-2">Your Name</label>
                                        <input type="text" name="name" id="name-field" class="form-control"
                                            required="">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email-field" class="pb-2">Your Email</label>
                                        <input type="email" class="form-control" name="email" id="email-field"
                                            required="">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="subject-field" class="pb-2">Subject</label>
                                        <input type="text" class="form-control" name="subject" id="subject-field"
                                            required="">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="message-field" class="pb-2">Message</label>
                                        <textarea class="form-control" name="message" rows="10" id="message-field" required=""></textarea>
                                    </div>

                                    <div class="col-md-12 text-center">
                                        <div class="loading">Loading</div>
                                        <div class="error-message"></div>
                                        <div class="sent-message">Your message has been sent. Thank you!</div>

                                        <button type="submit">Send Message</button>
                                    </div>

                                </div>
                            </form>
                        </div><!-- End Contact Form -->

                    </div>

                </div>

            </section><!-- /Contact Section -->

        </main>

        <!-- Scroll Top -->
        <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <!-- Preloader -->
        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <script src="/arsha/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="/arsha/assets/vendor/php-email-form/validate.js"></script>
        <script src="/arsha/assets/vendor/aos/aos.js"></script>
        <script src="/arsha/assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="/arsha/assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="/arsha/assets/vendor/waypoints/noframework.waypoints.js"></script>
        <script src="/arsha/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
        <script src="/arsha/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>

        <!-- Main JS File -->
        <script src="/arsha/assets/js/main.js"></script>

    </body>

</html>
