<?php
$siteName = 'KursusKu';
$tagline = 'Belajar, daftar, dan kelola kursus dalam satu tempat.';
$year = date('Y');
?>
 
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>KursusKu | Belajar Teknologi</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <div class="container nav-content">
            <a href="index.php" class="logo">
                <span class="logo-icon">K</span>
                Kursus<span>Ku</span>
            </a>

            <nav>
                <a href="#beranda">Beranda</a>
                <a href="#keunggulan">Keunggulan</a>
                <a href="#katalog">Katalog</a>
                <a href="#alur">Cara Daftar</a>
                <a href="#media">Media</a>
                <a href="#kontak">Kontak</a>
                <a href="register.php">Daftar Sekarang</a>
                <a href="history.php">History</a>
            </nav>

            <a href="register.php" class="btn btn-primary">
                Mulai Belajar →
            </a>
        </div>
    </header>

    <main>

        <!-- BERANDA -->
        <section class="hero" id="beranda">
            <div class="container hero-content">

                <div class="hero-text">
                    <span class="label">
                        ✦ PLATFORM BELAJAR TEKNOLOGI
                    </span>

                    <h1>
                        Tingkatkan Skill Digitalmu
                        <span>Bersama KursusKu</span>
                    </h1>

                    <p>
                        <?= htmlspecialchars($tagline) ?>
                        Temukan materi teknologi yang terarah,
                        praktik nyata, dan pengalaman belajar
                        yang menyenangkan.
                    </p>

                    <div class="hero-buttons">
                        <a href="#katalog" class="btn btn-primary">
                            Jelajahi Katalog →
                        </a>

                        <a href="#alur" class="btn btn-outline">
                            Cara Mendaftar
                        </a>
                    </div>

                    <div class="hero-note">
                        <span class="check-icon">✓</span>
                        Belajar dari dasar hingga praktik
                    </div>
                </div>

                <div class="hero-visual">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>

                    <div class="floating-card code-card">
                        <div class="dots">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>

                        <p>Belajar Coding</p>
                        <div class="code-line"></div>
                        <div class="code-line short"></div>
                        <div class="code-line"></div>
                        <div class="code-line medium"></div>
                        <div class="code-line short"></div>
                    </div>

                    <div class="laptop">
                        <div class="laptop-screen">
                            <div class="screen-bar">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>

                            <div class="screen-content">
                                <span class="code-symbol">&lt;/&gt;</span>

                                <div class="code-lines">
                                    <i></i>
                                    <i></i>
                                    <i></i>
                                    <i></i>
                                    <i></i>
                                </div>
                            </div>
                        </div>

                        <div class="laptop-base"></div>
                    </div>

                    <div class="floating-card practice-card">
                        <span class="practice-icon">✓</span>
                        <div>
                            <strong>Belajar Praktis</strong>
                            <small>Proyek nyata</small>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- KEUNGGULAN -->
        <section class="features section" id="keunggulan">
            <div class="container">
                <div class="feature-grid">

                    <article class="feature-card">
                        <div class="feature-icon">▤</div>

                        <div>
                            <h3>Materi Terarah</h3>
                            <p>
                                Materi disusun bertahap dari dasar
                                hingga praktik.
                            </p>
                        </div>
                    </article>

                    <article class="feature-card">
                        <div class="feature-icon">&lt;/&gt;</div>

                        <div>
                            <h3>Belajar dengan Proyek</h3>
                            <p>
                                Setiap tahap menghasilkan bagian
                                nyata dari aplikasi.
                            </p>
                        </div>
                    </article>

                    <article class="feature-card">
                        <div class="feature-icon">◎</div>

                        <div>
                            <h3>Pendampingan Praktik</h3>
                            <p>
                                Belajar melalui demonstrasi,
                                latihan, dan evaluasi.
                            </p>
                        </div>
                    </article>

                </div>
            </div>
        </section>

        <!-- KATALOG KURSUS -->
        <section class="catalog section" id="katalog">
            <div class="container">

                <div class="section-heading">
                    <span class="label">PILIH JALUR BELAJARMU</span>

                    <h2>
                        Katalog Kursus
                        <span>Populer</span>
                    </h2>

                    <p>
                        Temukan kursus yang sesuai dengan tujuanmu.
                    </p>
                </div>

                <div class="course-grid">

                    <!-- KURSUS WEB -->
                    <article class="course-card">
                        <div class="course-image web-image">
                            <div class="illustration-window">
                                <span>● ● ●</span>
                                <strong>&lt;/&gt;</strong>
                                <small>HTML & CSS</small>
                            </div>
                        </div>

                        <div class="course-body">
                            <div class="course-meta">
                                <span class="category">
                                    Web Development
                                </span>

                                <span class="level">
                                    Pemula
                                </span>
                            </div>

                            <h3>Web Dasar</h3>

                            <p>
                                Belajar struktur HTML dan dasar
                                pengembangan web.
                            </p>

                            <a href="#kontak" class="course-link">
                                Lihat Detail →
                            </a>
                        </div>
                    </article>

                    <!-- KURSUS PHP -->
                    <article class="course-card">
                        <div class="course-image php-image">
                            <div class="php-logo">php</div>
                            <div class="database-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>

                        <div class="course-body">
                            <div class="course-meta">
                                <span class="category">
                                    Backend Development
                                </span>

                                <span class="level">
                                    Pemula
                                </span>
                            </div>

                            <h3>PHP Dasar</h3>

                            <p>
                                Belajar variabel, operator,
                                percabangan, looping, dan form.
                            </p>

                            <a href="#kontak" class="course-link">
                                Lihat Detail →
                            </a>
                        </div>
                    </article>

                    <!-- KURSUS LARAVEL -->
                    <article class="course-card">
                        <div class="course-image laravel-image">
                            <div class="laravel-logo">L</div>

                            <div class="framework-window">
                                <span>● ● ●</span>
                                <strong>Laravel</strong>
                            </div>
                        </div>

                        <div class="course-body">
                            <div class="course-meta">
                                <span class="category">
                                    Framework
                                </span>

                                <span class="level">
                                    Pemula
                                </span>
                            </div>

                            <h3>Laravel Dasar</h3>

                            <p>
                                Mengenal route, controller, view,
                                dan database.
                            </p>

                            <a href="#kontak" class="course-link">
                                Lihat Detail →
                            </a>
                        </div>
                    </article>

                </div>
            </div>
        </section>

        <!-- STATISTIK -->
        <section class="statistics">
            <div class="container stats-grid">

                <div class="stat-item">
                    <span class="stat-icon">♙</span>
                    <div>
                        <h3>1.200+</h3>
                        <p>Peserta Aktif</p>
                    </div>
                </div>

                <div class="stat-item">
                    <span class="stat-icon">⌘</span>
                    <div>
                        <h3>12+</h3>
                        <p>Kursus Tersedia</p>
                    </div>
                </div>

                <div class="stat-item">
                    <span class="stat-icon">☆</span>
                    <div>
                        <h3>95%</h3>
                        <p>Kepuasan Peserta</p>
                    </div>
                </div>

            </div>
        </section>

        <!-- CARA MENDAFTAR -->
        <section class="steps section" id="alur">
            <div class="container steps-grid">

                <div class="steps-intro">
                    <span class="label">MUDAH DAN PRAKTIS</span>

                    <h2>
                        Mulai Belajar
                        <span>Dalam 4 Langkah</span>
                    </h2>

                    <p>
                        Proses pendaftaran sederhana agar kamu
                        bisa fokus meningkatkan keterampilan.
                    </p>
                </div>

                <div class="steps-list">

                    <a href="#registration.php" class="step-card">
                        <span class="step-number">01</span>
                        <div>
                            <h3>Pilih Kursus</h3>
                            <p>
                                Tentukan program sesuai minatmu.
                            </p>
                        </div>
                    </a>

                    <a href="#registration.php" class="step-card">
                        <span class="step-number">02</span>
                        <div>
                            <h3>Isi Formulir</h3>
                            <p>
                                Lengkapi informasi pendaftaran.
                            </p>
                        </div>
                    </a>

                    <a href="#registration.php#daftar-kursus" class="step-card">
                        <span class="step-number">03</span>
                        <div>
                            <h3>Periksa Data</h3>
                            <p>
                                Pastikan data yang diisi sudah benar.
                            </p>
                        </div>
                    </a>

                    <a href="#registration.php#daftar-kursus" class="step-card">
                        <span class="step-number">04</span>
                        <div>
                            <h3>Tunggu Konfirmasi</h3>
                            <p>
                                Tunggu informasi pendaftaran selanjutnya.
                            </p>
                        </div>
                    </a>

                </div>
            </div>
        </section>

        <!-- MEDIA -->
        <section class="media-section section" id="media">
            <div class="container media-grid">

                <div>
                    <span class="label">KENALI KURSUSKU</span>

                    <h2>
                        Belajar Teknologi,
                        <span>Lebih Percaya Diri.</span>
                    </h2>

                    <p>
                        Kenali program pembelajaran kami dan
                        temukan langkah awal untuk meningkatkan
                        keterampilan digitalmu.
                    </p>

                    <p>
                        Pelajari juga dokumentasi resmi
                        <a href="https://www.php.net/"
                           target="_blank"
                           rel="noopener noreferrer">PHP</a>
                        untuk memperluas pengetahuanmu.
                    </p>
                </div>

                <div class="media-content">
                    <img
                        src="assets/images/hero-kursus.jpg"
                        alt="Mahasiswa sedang mengikuti kegiatan kursus komputer"
                        class="program-image"
                        loading="lazy"
                    >

                    <h3>Video Singkat KursusKu</h3>

                    <video controls preload="metadata"
                           class="program-video">
                        <source
                            src="assets/video/intro-kursus.mp4"
                            type="video/mp4"
                        >
                        Browser Anda tidak mendukung video HTML5.
                    </video>
                </div>

            </div>
        </section>
        <section id="media" class="media-section">
    <div class="container">
        <h2>Media Pembelajaran</h2>
        <p>Foto dan video kegiatan belajar KursusKu.</p>

        <div class="media-grid">

            <div class="media-card">
                <img src="assets/images/hero-kursus.jpg" alt="Kegiatan KursusKu">
                <h3>Foto Pembelajaran</h3>
            </div>

            <div class="media-card">
                <video controls>
                    <source src="assets/video/intro-kursus.mp4" type="video/mp4">
                    Browser kamu tidak mendukung video.
                </video>
                <h3>Video Pengenalan KursusKu</h3>
            </div>

        </div>
    </div>
</section>

        <!-- KONTAK -->
        <section class="contact section" id="kontak">
            <div class="container contact-box">

                <div>
                    <span class="label">
                        ADA YANG INGIN DITANYAKAN?
                    </span>

                    <h2>Yuk, Mulai Perjalanan Digitalmu!</h2>

                    <p>
                        Hubungi kami untuk mengetahui informasi
                        lebih lanjut tentang program kursus.
                    </p>
                </div>

                <div class="contact-info">
                    <p>
                        <span class="contact-icon">✉</span>
                        <span>
                            <small>Email</small>
                            <strong>kursusku@example.test</strong>
                        </span>
                    </p>

                    <p>
                        <span class="contact-icon">⌖</span>
                        <span>
                            <small>Lokasi</small>
                            <strong>Laboratorium Komputer</strong>
                        </span>
                    </p>
                </div>

            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="footer">
        <div class="container footer-content">

            <a href="index.php" class="logo footer-logo">
                <span class="logo-icon">K</span>
                Kursus<span>Ku</span>
            </a>

            <p>Belajar hari ini, berkarya esok hari.</p>

            <small>
                &copy; <?= $year ?> KursusKu.
                Semua hak dilindungi.
            </small>

        </div>
    </footer>

</body>
</html>