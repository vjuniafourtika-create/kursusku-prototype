
<?php
$courses = [
    'web' => [
        'name' => 'Web Dasar',
        'fee' => 300000,
        'description' => 'Belajar dasar HTML, CSS, dan pembuatan website.'
    ],
    'php' => [
        'name' => 'PHP Dasar',
        'fee' => 400000,
        'description' => 'Mengenal PHP untuk membuat website dinamis.'
    ],
    'laravel' => [
        'name' => 'Laravel Dasar',
        'fee' => 500000,
        'description' => 'Membangun aplikasi web menggunakan Laravel.'
    ],
    'laravel-fundamental' => [
        'name' => 'Laravel Fundamental',
        'fee' => 600000,
        'description' => 'Memahami konsep Laravel untuk pengembangan aplikasi.'
    ],
    'mysql' => [
        'name' => 'MySQL',
        'fee' => 350000,
        'description' => 'Belajar mengelola database dengan MySQL.'
    ],
    'ui-web' => [
        'name' => 'UI Web Dasar',
        'fee' => 300000,
        'description' => 'Mempelajari desain antarmuka website yang menarik.'
    ]
];

$interestOptions = [
    'frontend' => 'Frontend',
    'backend' => 'Backend',
    'database' => 'Database',
    'uiux' => 'UI/UX'
];

function rupiah($amount)
{
    return 'Rp ' . number_format($amount, 0, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Daftar Kursus - KursusKu</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --blue: #1746a2;
            --blue-dark: #102f70;
            --blue-light: #eaf1ff;
            --yellow: #ffd447;
            --white: #ffffff;
            --text: #243047;
            --muted: #697586;
            --border: #dce3ef;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f5f8ff;
            color: var(--text);
            line-height: 1.6;
        }

        a {
            text-decoration: none;
        }

        .container {
            width: min(1120px, 92%);
            margin: auto;
        }

        /* NAVBAR */
        .navbar {
            background: var(--white);
            box-shadow: 0 3px 15px rgba(20, 50, 100, 0.08);
            position: sticky;
            top: 0;
            z-index: 10;
        }

        .nav-content {
            min-height: 76px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .logo {
            color: var(--blue);
            font-size: 27px;
            font-weight: 800;
        }

        .logo span {
            color: #e4ae00;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .nav-links a {
            color: #344054;
            font-weight: 600;
            font-size: 14px;
        }

        .nav-links a:hover,
        .nav-links .active {
            color: var(--blue);
        }

        .nav-button {
            background: var(--blue);
            color: white !important;
            padding: 11px 18px;
            border-radius: 10px;
        }

        /* HERO */
        .hero {
            padding: 65px 0;
            background: linear-gradient(125deg, #12357d, #2464d9);
            color: white;
            overflow: hidden;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1.4fr 0.8fr;
            align-items: center;
            gap: 40px;
        }

        .hero-label {
            display: inline-block;
            background: rgba(255, 255, 255, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 30px;
            padding: 7px 14px;
            margin-bottom: 18px;
            font-size: 13px;
        }

        .hero h1 {
            font-size: clamp(32px, 5vw, 49px);
            line-height: 1.15;
            margin-bottom: 20px;
        }

        .hero h1 span {
            color: var(--yellow);
        }

        .hero p {
            color: #e5edff;
            max-width: 590px;
            margin-bottom: 25px;
        }

        .hero-button {
            display: inline-block;
            background: var(--yellow);
            color: var(--blue-dark);
            padding: 13px 23px;
            border-radius: 10px;
            font-weight: 800;
        }

        .hero-card {
            background: white;
            color: var(--text);
            padding: 28px;
            border-radius: 22px;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.15);
        }

        .hero-card .emoji {
            font-size: 48px;
            margin-bottom: 12px;
        }

        .hero-card h3 {
            color: var(--blue);
            font-size: 22px;
            margin-bottom: 8px;
        }

        .hero-card p {
            color: var(--muted);
            margin: 0;
        }

        .hero-stat {
            display: flex;
            gap: 22px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .hero-stat strong {
            display: block;
            font-size: 21px;
            color: var(--yellow);
        }

        .hero-stat span {
            font-size: 13px;
            color: #e5edff;
        }

        /* SECTION */
        .section {
            padding: 65px 0;
        }

        .section-heading {
            text-align: center;
            margin-bottom: 35px;
        }

        .section-heading .eyebrow {
            color: var(--blue);
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .section-heading h2 {
            color: #162d59;
            font-size: clamp(26px, 4vw, 35px);
            margin: 8px 0;
        }

        .section-heading p {
            color: var(--muted);
        }

        /* COURSE CATALOG */
        .course-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 22px;
        }

        .course-card {
            background: white;
            border: 1px solid #e6ebf5;
            border-radius: 17px;
            padding: 25px;
            box-shadow: 0 8px 25px rgba(25, 55, 110, 0.05);
            transition: 0.25s;
        }

        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 32px rgba(25, 55, 110, 0.12);
        }

        .course-icon {
            width: 54px;
            height: 54px;
            display: grid;
            place-items: center;
            background: var(--blue-light);
            border-radius: 14px;
            font-size: 27px;
            margin-bottom: 17px;
        }

        .course-card h3 {
            color: #18366f;
            margin-bottom: 8px;
        }

        .course-card p {
            font-size: 14px;
            color: var(--muted);
            min-height: 66px;
        }

        .course-price {
            color: var(--blue);
            font-weight: 800;
            font-size: 19px;
            margin: 17px 0;
        }

        .course-link {
            display: inline-block;
            color: var(--blue);
            font-weight: 700;
            font-size: 14px;
        }

        /* REGISTRATION */
        .registration-section {
            background: #eaf1ff;
        }

        .registration-layout {
            display: grid;
            grid-template-columns: 0.75fr 1.25fr;
            align-items: start;
            gap: 30px;
        }

        .info-panel {
            background: var(--blue);
            color: white;
            border-radius: 20px;
            padding: 30px;
            position: sticky;
            top: 100px;
        }

        .info-panel h3 {
            font-size: 25px;
            margin-bottom: 12px;
        }

        .info-panel > p {
            color: #e2ebff;
            margin-bottom: 25px;
        }

        .info-item {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            margin: 20px 0;
        }

        .info-item .check {
            background: var(--yellow);
            color: var(--blue-dark);
            border-radius: 50%;
            width: 27px;
            height: 27px;
            display: grid;
            place-items: center;
            flex-shrink: 0;
            font-weight: 800;
        }

        .info-item strong {
            display: block;
        }

        .info-item small {
            color: #dce7ff;
        }

        .form-card {
            background: white;
            padding: 32px;
            border-radius: 20px;
            box-shadow: 0 10px 35px rgba(20, 50, 100, 0.08);
        }

        .form-card h3 {
            color: #18366f;
            font-size: 25px;
            margin-bottom: 5px;
        }

        .form-description {
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 25px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 19px;
        }

        .field {
            margin-bottom: 20px;
            min-width: 0;
        }

        .field.full {
            grid-column: 1 / -1;
        }

        .field > label,
        .field > .field-label {
            display: block;
            font-size: 14px;
            font-weight: 700;
            color: #263957;
            margin-bottom: 8px;
        }

        .required {
            color: #d43b3b;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: #fff;
            font: inherit;
            font-size: 14px;
            color: var(--text);
            outline: none;
            transition: border 0.2s, box-shadow 0.2s;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(23, 70, 162, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .choice-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 10px;
        }

        .participant-option {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px;
            border: 1px solid var(--border);
            border-radius: 10px;
            font-size: 13px;
            cursor: pointer;
        }

        .participant-option:has(input:checked) {
            background: var(--blue-light);
            border-color: var(--blue);
        }

        input[type="radio"],
        input[type="checkbox"] {
            accent-color: var(--blue);
            width: 16px;
            height: 16px;
            flex-shrink: 0;
        }

        /* INTERESTS */
        .interests-box {
            background: #f8faff;
            border: 1px solid #e0e8f7;
            border-radius: 13px;
            padding: 18px;
        }

        .interests-box > p {
            font-size: 13px;
            color: var(--muted);
            margin-bottom: 14px;
        }

        .interests-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 12px;
        }

        .interest-option {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 13px;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: white;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
            transition: 0.2s;
        }

        .interest-option:hover {
            border-color: var(--blue);
            background: var(--blue-light);
        }

        .interest-option:has(input:checked) {
            background: #eaf1ff;
            border-color: var(--blue);
            color: var(--blue);
        }

        .interest-note {
            font-size: 12px;
            color: var(--muted);
            margin-top: 10px;
        }

        .submit-button {
            width: 100%;
            border: none;
            background: var(--blue);
            color: white;
            padding: 15px;
            border-radius: 11px;
            font-size: 15px;
            font-weight: 800;
            cursor: pointer;
            transition: 0.2s;
        }

        .submit-button:hover {
            background: var(--blue-dark);
            transform: translateY(-1px);
        }

        .privacy-note {
            text-align: center;
            font-size: 12px;
            color: var(--muted);
            margin-top: 14px;
        }

        /* FOOTER */
        footer {
            background: #10244a;
            color: white;
            padding: 30px 0;
        }

        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .footer-content p {
            color: #c7d4ed;
            font-size: 13px;
        }

        .footer-logo {
            color: white;
            font-size: 22px;
            font-weight: 800;
        }

        .footer-logo span {
            color: var(--yellow);
        }

        /* RESPONSIVE */
        @media (max-width: 850px) {
            .hero-content,
            .registration-layout {
                grid-template-columns: 1fr;
            }

            .course-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .info-panel {
                position: static;
            }
        }

        @media (max-width: 600px) {
            .nav-content {
                padding: 15px 0;
                align-items: flex-start;
                flex-direction: column;
            }

            .nav-links {
                width: 100%;
                gap: 14px;
                flex-wrap: wrap;
            }

            .hero {
                padding: 45px 0;
            }

            .course-grid,
            .form-grid,
            .interests-grid {
                grid-template-columns: 1fr;
            }

            .field.full {
                grid-column: auto;
            }

            .choice-grid {
                grid-template-columns: 1fr;
            }

            .form-card,
            .info-panel {
                padding: 22px;
            }

            .section {
                padding: 45px 0;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <div class="container nav-content">
            <a href="#beranda" class="logo">Kursus<span>Ku</span></a>

            <nav class="nav-links">
                <a href="#beranda">Beranda</a>
                <a href="#kursus">Katalog Kursus</a>
                <a href="#pendaftaran" class="active">Daftar Kursus</a>
                <a href="history.php">History</a>
                <a href="#pendaftaran" class="nav-button">Daftar Sekarang</a>
            </nav>
        </div>
    </header>

    <!-- HERO -->
    <section class="hero" id="beranda">
        <div class="container hero-content">
            <div>
                <span class="hero-label">Platform Belajar Digital</span>

                <h1>
                    Tingkatkan Skill,<br>
                    Wujudkan <span>Masa Depanmu.</span>
                </h1>

                <p>
                    Belajar teknologi bersama KursusKu. Pilih kursus yang
                    sesuai dengan minatmu dan mulai perjalanan belajar
                    untuk meningkatkan keterampilan digital.
                </p>

                <a href="#pendaftaran" class="hero-button">
                    Daftar Kursus Sekarang →
                </a>

                <div class="hero-stat">
                    <div>
                        <strong>6</strong>
                        <span>Pilihan Kursus</span>
                    </div>
                    <div>
                        <strong>Fleksibel</strong>
                        <span>Pilih Minat Belajar</span>
                    </div>
                    <div>
                        <strong>Digital</strong>
                        <span>Belajar Teknologi</span>
                    </div>
                </div>
            </div>

            <div class="hero-card">
                <div class="emoji">🎓</div>
                <h3>Mulai Belajar Hari Ini!</h3>
                <p>
                    Pilih program belajar, tentukan minatmu, dan daftarkan
                    diri melalui formulir KursusKu.
                </p>
            </div>
        </div>
    </section>

    <!-- KATALOG KURSUS -->
    <section class="section" id="kursus">
        <div class="container">
            <div class="section-heading">
                <span class="eyebrow">Katalog Pembelajaran</span>
                <h2>Temukan Kursus Pilihanmu</h2>
                <p>Pilih program yang sesuai dengan tujuan belajarmu.</p>
            </div>

            <div class="course-grid">
                <?php
                $courseIcons = [
                    'web' => '🌐',
                    'php' => '💻',
                    'laravel' => '🚀',
                    'laravel-fundamental' => '⚙️',
                    'mysql' => '🗄️',
                    'ui-web' => '🎨'
                ];
                ?>

                <?php foreach ($courses as $code => $course): ?>
                    <article class="course-card">
                        <div class="course-icon">
                            <?= $courseIcons[$code] ?>
                        </div>

                        <h3>
                            <?= htmlspecialchars($course['name']) ?>
                        </h3>

                        <p>
                            <?= htmlspecialchars($course['description']) ?>
                        </p>

                        <div class="course-price">
                            <?= rupiah($course['fee']) ?>
                        </div>

                        <a
                            href="#pendaftaran"
                            class="course-link"
                            onclick="pilihKursus('<?= htmlspecialchars($code, ENT_QUOTES) ?>')"
                        >
                            Pilih Kursus →
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- FORM PENDAFTARAN -->
    <section class="section registration-section" id="pendaftaran">
        <div class="container">
            <div class="section-heading">
                <span class="eyebrow">Pendaftaran Online</span>
                <h2>Daftar Kursus di KursusKu</h2>
                <p>Isi data dengan benar sebelum mengirim formulir.</p>
            </div>

            <div class="registration-layout">

                <!-- INFORMASI PENDAFTARAN -->
                <aside class="info-panel">
                    <h3>Mulai Langkah Pertamamu!</h3>

                    <p>
                        Lengkapi formulir pendaftaran dan pilih kursus
                        sesuai kebutuhanmu.
                    </p>

                    <div class="info-item">
                        <span class="check">✓</span>
                        <div>
                            <strong>Pilih Kursus</strong>
                            <small>Tentukan program belajar yang kamu inginkan.</small>
                        </div>
                    </div>

                    <div class="info-item">
                        <span class="check">✓</span>
                        <div>
                            <strong>Isi Data Diri</strong>
                            <small>Masukkan identitas dan informasi peserta.</small>
                        </div>
                    </div>

                    <div class="info-item">
                        <span class="check">✓</span>
                        <div>
                            <strong>Tentukan Interests</strong>
                            <small>Pilih bidang teknologi yang kamu minati.</small>
                        </div>
                    </div>

                    <div class="info-item">
                        <span class="check">✓</span>
                        <div>
                            <strong>Kirim Pendaftaran</strong>
                            <small>Periksa kembali data sebelum dikirim.</small>
                        </div>
                    </div>
                </aside>

                <!-- FORM -->
                <div class="form-card">
                    <h3>Formulir Pendaftaran</h3>

                    <p class="form-description">
                        Kolom bertanda <span class="required">*</span>
                        wajib diisi.
                    </p>

                    <form action="process.php" method="POST">
                        <div class="form-grid">

                            <!-- NAMA -->
                            <div class="field">
                                <label for="name">
                                    Nama Lengkap <span class="required">*</span>
                                </label>

                                <input
                                    type="text"
                                    id="name"
                                    name="name"
                                    placeholder="Masukkan nama lengkap"
                                    required
                                    maxlength="100"
                                >
                            </div>

                            <!-- EMAIL -->
                            <div class="field">
                                <label for="email">
                                    Email <span class="required">*</span>
                                </label>

                                <input
                                    type="email"
                                    id="email"
                                    name="email"
                                    placeholder="nama@email.com"
                                    required
                                >
                            </div>

                            <!-- NOMOR HP -->
                            <div class="field">
                                <label for="phone">Nomor HP</label>

                                <input
                                    type="tel"
                                    id="phone"
                                    name="phone"
                                    placeholder="Contoh: 081234567890"
                                    maxlength="20"
                                >
                            </div>

                            <!-- PENDIDIKAN -->
                            <div class="field">
                                <label for="study">Pendidikan</label>

                                <select id="study" name="study">
                                    <option value="">-- Pilih pendidikan --</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA/SMK">SMA/SMK</option>
                                    <option value="Mahasiswa">Mahasiswa</option>
                                    <option value="Sarjana">Sarjana</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>

                            <!-- PILIH KURSUS -->
                            <div class="field full">
                                <label for="course_code">
                                    Pilih Kursus <span class="required">*</span>
                                </label>

                                <select
                                    id="course_code"
                                    name="course_code"
                                    required
                                >
                                    <option value="">-- Pilih kursus --</option>

                                    <?php foreach ($courses as $code => $course): ?>
                                        <option value="<?= htmlspecialchars($code) ?>">
                                            <?= htmlspecialchars($course['name']) ?>
                                            - <?= rupiah($course['fee']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- JENIS PESERTA -->
                            <div class="field full">
                                <span class="field-label">
                                    Jenis Peserta <span class="required">*</span>
                                </span>

                                <div class="choice-grid">
                                    <label class="participant-option">
                                        <input
                                            type="radio"
                                            name="participant_type"
                                            value="mahasiswa"
                                            required
                                        >
                                        Mahasiswa
                                    </label>

                                    <label class="participant-option">
                                        <input
                                            type="radio"
                                            name="participant_type"
                                            value="guru"
                                        >
                                        Guru
                                    </label>

                                    <label class="participant-option">
                                        <input
                                            type="radio"
                                            name="participant_type"
                                            value="umum"
                                        >
                                        Umum
                                    </label>
                                </div>
                            </div>

                            <!-- INTERESTS -->
                            <div class="field full">
                                <span class="field-label">
                                    Interests / Minat Belajar
                                    <span class="required">*</span>
                                </span>

                                <div class="interests-box">
                                    <p>
                                        Pilih satu atau beberapa bidang yang
                                        kamu minati.
                                    </p>

                                    <div class="interests-grid">
                                        <?php foreach ($interestOptions as $value => $label): ?>
                                            <label class="interest-option">
                                                <input
                                                    type="checkbox"
                                                    name="interests[]"
                                                    value="<?= htmlspecialchars($value) ?>"
                                                >
                                                <span>
                                                    <?= htmlspecialchars($label) ?>
                                                </span>
                                            </label>
                                        <?php endforeach; ?>
                                    </div>

                                    <div class="interest-note">
                                        Contoh: kamu bisa memilih Frontend
                                        dan UI/UX sekaligus.
                                    </div>
                                </div>
                            </div>

                            <!-- MODE BELAJAR -->
                            <div class="field full">
                                <label for="learning_mode">Mode Belajar</label>

                                <select
                                    id="learning_mode"
                                    name="learning_mode"
                                >
                                    <option value="">-- Pilih mode belajar --</option>
                                    <option value="online">Online</option>
                                    <option value="offline">Offline</option>
                                    <option value="hybrid">Hybrid</option>
                                </select>
                            </div>

                            <!-- JUMLAH PAKET -->
                            <div class="field">
                                <label for="package_count">Jumlah Paket</label>

                                <select
                                    id="package_count"
                                    name="package_count"
                                >
                                    <option value="1">1 Paket</option>
                                    <option value="2">2 Paket</option>
                                    <option value="3">3 Paket</option>
                                </select>
                            </div>

                            <!-- CATATAN -->
                            <div class="field full">
                                <label for="notes">Catatan Tambahan</label>

                                <textarea
                                    id="notes"
                                    name="notes"
                                    placeholder="Tuliskan pertanyaan atau catatan jika ada..."
                                    maxlength="1000"
                                ></textarea>
                            </div>

                            <!-- TOMBOL KIRIM -->
                            <div class="field full">
                                <button type="submit" class="submit-button">
                                    Kirim Pendaftaran →
                                </button>

                                <p class="privacy-note">
                                    Pastikan data yang dimasukkan sudah benar.
                                </p>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="container footer-content">
            <a href="#beranda" class="footer-logo">
                Kursus<span>Ku</span>
            </a>

            <p>
                © <?= date('Y') ?> KursusKu. Belajar, berkembang, dan berkarya.
            </p>
        </div>
    </footer>

    <script>
        function pilihKursus(kode) {
            const pilihan = document.getElementById('course_code');
            pilihan.value = kode;
        }
    </script>

</body>
</html>
