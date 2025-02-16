<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="<?= base_url("assets/vendor/css/charity.css") ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" referrerpolicy="no-referrer" />
    <title>BSB</title>
</head>

<body>
    <main>
        <header>
            <nav>
                <div class="container">
                    <div class="logo">
                        <img src="<?= base_url("assets/vendor/images") ?>/logo.png" alt="logo" />
                    </div>
                    <div class="links">
                        <ul>
                            <li><a href="#intro" class="active">Beranda</a></li>
                            <li><a href="#howto">Tata Cara</a></li>
                            <li><a href="#service">Layanan</a></li>
                            <li><a href="#about">Tentang</a></li>
                        </ul>
                    </div>
                    <div class="hamburger-menu">
                        <div class="bar"></div>
                    </div>
                </div>
            </nav>
        </header>
        <section class="intro" id="intro">
            <div class="overlay overlay-lg">
                <img src="<?= base_url("assets/vendor/images") ?>/shape/square.png" class="shape square" alt="decoration1">
                <img src="<?= base_url("assets/vendor/images") ?>/shape/circle.png" class="shape circle" alt="decoration2">
                <img src="<?= base_url("assets/vendor/images") ?>/shape/half-circle.png" class="shape half-circle1" alt="decoration3">
                <img src="<?= base_url("assets/vendor/images") ?>/shape/half-circle.png" class="shape half-circle2" alt="decoration4">
                <img src="<?= base_url("assets/vendor/images") ?>/shape/x.png" class="shape xshape" alt="decoration5">
                <img src="<?= base_url("assets/vendor/images") ?>/shape/wave.png" class="shape wave wave1" alt="decoration">
                <img src="<?= base_url("assets/vendor/images") ?>/shape/wave.png" class="shape wave wave2" alt="decoration">
                <img src="<?= base_url("assets/vendor/images") ?>/shape/triangle.png" class="shape triangle" alt="decoration">
                <img src="<?= base_url("assets/vendor/images") ?>/shape/points1.png" class="points point1" alt="decoration">
            </div>
            <div class="container grid-2">
                <div class="column-1">
                    <h1 class="intro-title">Bantuan Siswa Berprestasi</h1>
                    <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est facere officia
                        aliquam.</p>
                    <a href="#" class="btn">Jelajahi</a>
                </div>
                <div class="column-2 image">
                    <img src="<?= base_url("assets/vendor/images") ?>/intro-image-3.png" alt="intro" class="image-element z-index">
                </div>
            </div>
        </section>
        <section class="howto section" id="howto">
            <div class="container">
                <div class="section-header">
                    <h3 class="title" data-title="Langkah-langkah">Tata Cara</h3>
                    <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit aperiam aspernatur
                        ducimus laborum vero pariatur.</p>
                </div>
                <div class="cards">
                    <div class="card-wrap">
                        <img src="<?= base_url("assets/vendor/images") ?>/shape/points3.png" class="points point1 points-sq" alt="decoration">
                        <div class="card" data-card="Search">
                            <div class="card-content">
                                <img src="<?= base_url("assets/vendor/images") ?>/search.png" class="icon" alt="icon">
                                <h3 class="title-sm">Cari</h3>
                                <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum,
                                    reprehenderit?</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-wrap">
                        <div class="card" data-card="Found">
                            <div class="card-content">
                                <img src="<?= base_url("assets/vendor/images") ?>/found.png" class="icon" alt="icon">
                                <h3 class="title-sm">Temukan</h3>
                                <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex,
                                    aperiam.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-wrap">
                        <img src="<?= base_url("assets/vendor/images") ?>/shape/points3.png" class="points point2 points-sq" alt="decoration">
                        <div class="card" data-card="Meet">
                            <div class="card-content">
                                <img src="<?= base_url("assets/vendor/images") ?>/support.png" class="icon" alt="icon">
                                <h3 class="title-sm">Bantu</h3>
                                <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi,
                                    delectus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
                <path fill="#3d9bd4" fill-opacity="1" d="M0,64L48,96C96,128,192,192,288,197.3C384,203,480,149,576,138.7C672,128,768,160,864,154.7C960,149,1056,107,1152,112C1248,117,1344,171,1392,197.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
                </path>
            </svg>
        </section>
        <section class="service section" id="service">
            <div class="background-bg"></div>
            <div class="container">
                <div class="section-header">
                    <h3 class="title" data-title="Temukan">Anak Berprestasi</h3>
                </div>
                <div class="section-body">
                    <div class="filter">
                        <button class="filter-btn active" data-filter="*">All</button>
                        <?php if (isset($category_list) && is_array($category_list)) {
                            foreach ($category_list as $category) {
                                $data_filter = str_replace(" ", "", $category->category_name);
                                echo "<button class='filter-btn' data-filter='.$data_filter'>$category->category_name</button>";
                            }
                        } ?>
                    </div>
                    <div class="grid">
                        <?php if (isset($student_list) && is_array($student_list)) {
                            foreach ($student_list as $student) {
                                $data_filter = str_replace(" ", "", $student->category_name);
                                echo "<div class='grid-item $data_filter'>";
                                echo "<div class='gallery-image' onclick='routeTo(\"public_student?id=$student->student_id\")'>";
                                echo "<div class='img-decor'>";
                                echo "<div class='img-box'>";
                                echo "<img src='$student->file_path' alt='child'>";
                                echo "</div>";
                                echo "</div>";
                                echo "<div class='image-content'>";
                                echo "<i class='fas fa-child'></i>";
                                echo "<div class='content-text'>";
                                echo "<h3>$student->student_name</h3>";
                                echo "<p class='text'>$student->student_age Tahun</p>";
                                echo "</div>";
                                echo "<i class=;fas fa-arrow-right'></i>";
                                echo "</div>";
                                echo "</div>";
                                echo "</div>";
                            }
                        } ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="about section" id="about">
            <div class="container">
                <div class="section-header">
                    <h3 class="title" data-title="Kenal Lebih Jauh">Tentang Kami</h3>
                </div>
                <div class="section-body grid-2">
                    <div class="column-1">
                        <h3 class="title-sm">Salam hangat dari Kami</h3>
                        <p class="text"><?= $config->about ?></p>
                        <h3 class="title-sm">Jangkau, dan temui kami</h3>
                        <p class="text"><?= $config->address; ?></p>
                        <h3 class="title-sm">atau, Hubungi</h3>
                        <p class="text"><?= $config->contact ?></p>
                    </div>
                    <div class="column-2 image">
                        <img src="<?= base_url("assets/vendor/images") ?>/about-no-bg.png" class="z-index" alt="">
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer class="footer">
        <div class="container">
            <div class="grid-4">
                <div class="grid-4-col img">
                    <div class="footer-img">
                        <img src="<?= base_url("assets/vendor/images") ?>/logo.png" alt="logo">
                    </div>
                </div>
                <div class="grid-4-col footer-links">
                    <h3 class="title-sm">Links</h3>
                    <ul>
                        <li><a href="#intro">Beranda</a></li>
                        <li><a href="#howto">Tata Cara</a></li>
                        <li><a href="#service">Layanan</a></li>
                        <li><a href="#about">Tentang</a></li>
                    </ul>
                </div>
                <div class="grid-4-col footer-links">
                    <h3 class="title-sm">3 Langkah</h3>
                    <ul>
                        <li><a href="#">Cari</a></li>
                        <li><a href="#">Temukan</a></li>
                        <li><a href="#">Bantu</a></li>
                    </ul>
                </div>
                <div class="grid-4-col footer-about">
                    <h3 class="title-sm">About</h3>
                    <p class="text"><?= $config->about; ?></p>
                </div>
            </div>
            <div class="bottom-footer">
                <div class="copyright">
                    <p class="text">Copyright&copy;2021 All rights reserved | <span>Emobodigo</span></p>
                </div>
                <div class="social-wrap">
                    <div class="followme">
                        <h3>Follow Us</h3>
                        <span class="footer-line"></span>
                        <div class="social-media">
                            <a href="">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                    <div class="back-btn-wrap">
                        <a href="#" class="back-btn">
                            <i class="fas fa-chevron-up"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
    <script src="<?= base_url("assets/vendor/js/isotope.pkgd.min.js") ?>"></script>
    <script src="<?= base_url("assets/vendor/js/app.js") ?>"></script>
</body>

</html>