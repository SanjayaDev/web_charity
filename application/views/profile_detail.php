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
                        <img src="<?= base_url("assets/vendor/images") ?>/logo.png" alt="logo" onclick="routeTo('welcome')" />
                    </div>
                    <div class="links">
                        <ul>
                            <li><a href="<?= base_url("welcome") ?>">Beranda</a></li>
                        </ul>
                    </div>
                    <div class="hamburger-menu">
                        <div class="bar"></div>
                    </div>
                </div>
            </nav>
        </header>
        <section class="about section">
            <div class="container">
                <div class="section-header">
                    <h3 class="title" data-title="Halo, saya"><?= $student_info->student_name ?></h3>
                </div>
                <div class="section-body grid-2">
                    <div class="column-1">
                        <h3 class="title-sm">Biodata</h3>
                        <p class="text">Lahir pada tanggal <?= date("d-m-Y", strtotime($student_info->student_dob)); ?>, Anak yang berumur <?= $student_info->student_age ?> Tahun ini mengenyam pendidikan di <?= $student_info->student_school; ?>, saat ini tinggal di <?= $student_info->student_address; ?></p>
                        <p class="text"><?= $student_info->note; ?></p>
                        <h3 class="title-sm">Prestasi</h3>
                        <?php if (isset($achievement_list) && is_array($achievement_list)) {
                            if (count($achievement_list) > 0) {
                                foreach ($achievement_list as $item) {
                                    echo "<p class='text'>$item->achievement_name Tingkat $item->level_name</p>";
                                    echo "<p class='desc'>$item->description</p>";
                                }
                            } else {
                                echo "<p class='text'>Tidak ada prestasi</p>";
                            }
                        } ?>
                        <h3 class="title-sm">Wali</h3>
                        <p class="text"><?= $student_info->student_trustee; ?></p>
                    </div>
                    <div class="column-2 image">
                        <img src="<?= $student_info->file_path; ?>" class="z-index" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="howto section">
            <div class="container">
                <div class="section-header">
                    <h3 class="title" data-title="Bukan Saya?"> Temukan anak seumuran saya lainnya</h3>
                </div>
                <div class="section-body">
                    <div class="grid">
                        <?php if (isset($related_list) && is_array($related_list)) {
                            foreach ($related_list as $student) {
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
    </main>
    <footer class="footer">
        <div class="container">
            <div class="grid-4">
                <div class="grid-4-col img">
                    <div class="footer-img">
                        <img src="<?= base_url("assets/vendor/images") ?>/logo.png" alt="logo" />
                    </div>
                </div>
                <div class="grid-4-col footer-links">
                    <h3 class="title-sm">Links</h3>
                    <ul>
                        <li><a href="<?= base_url('welcome') ?>">Beranda</a></li>
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
                    <p class="text">
                        <?= $config->about; ?>
                    </p>
                </div>
            </div>
            <div class="bottom-footer">
                <div class="copyright">
                    <p class="text">
                        Copyright&copy;2021 All rights reserved | <span>Emobodigo</span>
                    </p>
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