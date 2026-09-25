<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kursus - KursusKu</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Fraunces:opsz,wght@9..144,500;9..144,600&display=swap');

        :root {
            --blue: #164392;
            --blue-dark: #0b2b68;
            --blue-soft: #eaf1fb;
            --yellow: #ffbd64;
            --text: #172b4d;
            --muted: #718097;
            --border: #dce5f0;
            --white: #ffffff;
            --background: #f6f9fd;
        }

        * {
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            min-width: 320px;
            color: var(--text);
            background: var(--background);
            font-family: "DM Sans", Arial, sans-serif;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        button,
        input,
        select {
            font: inherit;
        }

        .container {
            width: min(1180px, calc(100% - 40px));
            margin: auto;
        }

        .site-header {
            position: sticky;
            z-index: 10;
            top: 0;
            border-bottom: 1px solid rgba(220, 229, 240, .8);
            background: rgba(246, 249, 253, .9);
            backdrop-filter: blur(14px);
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            min-height: 72px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--blue-dark);
            font-family: Fraunces, Georgia, serif;
            font-size: 24px;
            font-weight: 600;
        }

        .logo-icon {
            display: grid;
            width: 37px;
            height: 37px;
            place-items: center;
            border-radius: 11px;
            color: var(--blue);
            background: var(--yellow);
            font-weight: bold;
        }

        .navigation {
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--muted);
            font-size: 14px;
            font-weight: 700;
        }

        .navigation a {
            padding: 10px 15px;
            border-radius: 999px;
            transition: .2s;
        }

        .navigation a:hover {
            color: var(--blue);
            background: var(--blue-soft);
        }

        .navigation .active {
            color: white;
            background: var(--blue);
        }

        .hero {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: center;
            gap: 70px;
            padding: 85px 0 100px;
        }

        .label {
            display: inline-block;
            color: var(--blue);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .16em;
            text-transform: uppercase;
        }

        .label::before {
            display: inline-block;
            width: 7px;
            height: 7px;
            margin-right: 8px;
            border-radius: 50%;
            background: var(--yellow);
            content: "";
        }

        h1,
        h2,
        h3 {
            font-family: Fraunces, Georgia, serif;
            letter-spacing: -.05em;
        }

        h1 {
            max-width: 620px;
            margin: 25px 0 25px;
            color: var(--blue);
            font-size: clamp(52px, 7vw, 94px);
            line-height: .95;
        }

        h1 em {
            color: var(--blue-dark);
            font-weight: 500;
        }

        .hero-description {
            max-width: 540px;
            color: var(--muted);
            font-size: 17px;
            line-height: 1.75;
        }

        .hero-link {
            display: inline-flex;
            gap: 10px;
            margin-top: 27px;
            padding-bottom: 8px;
            border-bottom: 2px solid var(--yellow);
            color: var(--blue);
            font-size: 14px;
            font-weight: 700;
        }

        .hero-visual {
            position: relative;
            min-height: 430px;
        }

        .visual-glow {
            position: absolute;
            top: 25px;
            right: 15px;
            width: 230px;
            height: 230px;
            border-radius: 50%;
            background: rgba(255, 189, 100, .45);
            filter: blur(45px);
        }

        .visual-card {
            position: absolute;
            top: 0;
            right: 0;
            width: 88%;
            height: 90%;
            overflow: hidden;
            border: 8px solid white;
            border-radius: 35px 35px 35px 105px;
            background: linear-gradient(135deg, #234f9e, #0a2e6e);
            box-shadow: 0 28px 70px -35px rgba(20, 55, 120, .6);
        }

        .visual-card::before {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 28% 30%, rgba(255, 189, 100, .9) 0 7%, transparent 8%),
                radial-gradient(circle at 75% 68%, rgba(255, 255, 255, .2) 0 12%, transparent 13%),
                linear-gradient(135deg, transparent 40%, rgba(255,255,255,.12) 41% 42%, transparent 43%);
            content: "";
        }

        .book-shape {
            position: absolute;
            right: 16%;
            bottom: 19%;
            width: 48%;
            height: 38%;
            padding: 20px;
            border-radius: 7px;
            color: var(--blue);
            background: #f7f0dc;
            box-shadow: 15px 18px 0 rgba(0, 0, 0, .12);
            transform: rotate(-13deg);
        }

        .book-shape::before,
        .book-shape::after {
            display: block;
            width: 80%;
            height: 7px;
            margin: 12px 0;
            border-radius: 4px;
            background: #9db8e6;
            content: "";
        }

        .book-shape::after {
            width: 55%;
            background: var(--yellow);
        }

        .visual-badge {
            position: absolute;
            bottom: 5px;
            left: 0;
            width: 190px;
            padding: 17px;
            border: 1px solid rgba(22, 67, 146, .12);
            border-radius: 20px;
            background: rgba(255, 255, 255, .95);
            box-shadow: 0 22px 55px -35px rgba(21, 54, 115, .5);
        }

        .visual-badge strong {
            display: block;
            color: var(--blue);
            font-family: Fraunces, Georgia, serif;
            font-size: 25px;
        }

        .visual-badge span {
            display: block;
            margin-top: 4px;
            color: var(--muted);
            font-size: 11px;
        }

        .registration-section {
            padding: 95px 0;
            background: rgba(234, 241, 251, .7);
        }

        .registration-layout {
            display: grid;
            grid-template-columns: .75fr 1.25fr;
            gap: 80px;
            align-items: start;
        }

        .registration-copy h2 {
            max-width: 430px;
            margin: 18px 0;
            color: var(--blue);
            font-size: clamp(42px, 5vw, 62px);
            line-height: 1.03;
        }

        .registration-copy p {
            max-width: 390px;
            color: var(--muted);
            line-height: 1.8;
        }

        .form-card {
            padding: 32px;
            border: 1px solid rgba(22, 67, 146, .14);
            border-radius: 26px;
            background: white;
            box-shadow: 0 28px 80px -42px rgba(21, 54, 115, .48);
        }

        .form-title {
            display: flex;
            align-items: start;
            justify-content: space-between;
            padding-bottom: 22px;
            margin-bottom: 25px;
            border-bottom: 1px solid var(--border);
        }

        .form-title h2 {
            margin: 8px 0 0;
            font-size: 35px;
        }

        .step {
            padding: 8px 12px;
            border-radius: 99px;
            color: var(--blue);
            background: var(--blue-soft);
            font-size: 11px;
            font-weight: 800;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .field {
            display: block;
            margin-bottom: 18px;
        }

        .field label {
            display: block;
            margin-bottom: 8px;
            color: var(--text);
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .08em;
            text-transform: uppercase;
        }

        .field input,
        .field select {
            width: 100%;
            min-height: 52px;
            padding: 0 15px;
            border: 1px solid var(--border);
            border-radius: 13px;
            outline: none;
            color: var(--text);
            background: white;
            transition: .2s;
        }

        .field input:focus,
        .field select:focus {
            border-color: #547fc8;
            box-shadow: 0 0 0 4px rgba(84, 127, 200, .14);
        }

        .field select {
            cursor: pointer;
        }

        .submit-button {
            width: 100%;
            min-height: 54px;
            margin-top: 5px;
            border: 0;
            border-radius: 13px;
            cursor: pointer;
            color: white;
            background: var(--blue);
            font-weight: 800;
            transition: .2s;
        }

        .submit-button:hover {
            background: var(--blue-dark);
            transform: translateY(-2px);
        }

        .privacy {
            margin: 14px 0 0;
            color: var(--muted);
            font-size: 11px;
            text-align: center;
        }

        .catalog {
            padding: 95px 0;
        }

        .catalog h2 {
            margin: 15px 0 35px;
            color: var(--blue);
            font-size: 52px;
        }

        .courses {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
        }

        .course {
            min-height: 210px;
            padding: 20px;
            border: 1px solid var(--border);
            border-radius: 18px;
            background: white;
            transition: .2s;
        }

        .course:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 45px -30px var(--blue);
        }

        .course-number {
            display: grid;
            width: 40px;
            height: 40px;
            place-items: center;
            border-radius: 12px;
            color: var(--blue);
            background: var(--blue-soft);
            font-size: 12px;
            font-weight: 800;
        }

        .course h3 {
            margin: 35px 0 8px;
            font-size: 23px;
        }

        .course p {
            margin: 0;
            color: var(--muted);
            font-size: 12px;
        }

        footer {
            padding: 25px 0;
            color: white;
            background: var(--blue-dark);
        }

        .footer-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .footer-logo {
            color: white;
        }

        .footer-text {
            color: rgba(255,255,255,.7);
            font-size: 12px;
        }

        @media (max-width: 850px) {
            .hero,
            .registration-layout {
                grid-template-columns: 1fr;
            }

            .hero {
                gap: 40px;
                padding-top: 60px;
            }

            .hero-visual {
                min-height: 390px;
            }

            .courses {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 560px) {
            .container {
                width: min(100% - 28px, 1180px);
            }

            .navigation {
                gap: 0;
                font-size: 12px;
            }

            .navigation a {
                padding: 8px;
            }

            .navigation .active {
                padding: 10px;
            }

            h1 {
                font-size: 54px;
            }

            .form-card {
                padding: 21px 16px;
            }

            .form-grid,
            .courses {
                grid-template-columns: 1fr;
            }

            .catalog h2 {
                font-size: 43px;
            }

            .footer-content {
                align-items: flex-start;
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
</head>

<body>

<header class="site-header">
    <div class="container header-content">
        <a class="logo" href="registration.php">
            <span class="logo-icon">▣</span>
            <span>KursusKu</span>
        </a>

        <nav class="navigation">
            <a href="#katalog">Katalog</a>
            <a class="active" href="#daftar-kursus">Daftar Kursus</a>
        </nav>
    </div>
</header>

<main>
    <section class="hero container">
        <div>
            <span class="label">Ruang untuk bertumbuh</span>

            <h1>
                Belajar sesuatu yang
                <em>berarti.</em>
            </h1>

            <p class="hero-description">
                KursusKu membantu kamu menemukan kelas yang tepat,
                membangun keahlian baru, dan melangkah lebih dekat
                pada versi dirimu yang ingin kamu temui.
            </p>

            <a class="hero-link" href="#daftar-kursus">
                Temukan kelasmu →
            </a>
        </div>

        <div class="hero-visual">
            <div class="visual-glow"></div>

            <div class="visual-card">
                <div class="book-shape">
                    Catatan belajar
                </div>
            </div>

            <div class="visual-badge">
                <strong>1.240+</strong>
                <span>pelajar mulai dari langkah kecil</span>
            </div>
        </div>
    </section>

    <section id="daftar-kursus" class="registration-section">
        <div class="container registration-layout">

            <div class="registration-copy">
                <span class="label">Pendaftaran kursus</span>

                <h2>
                    Satu langkah kecil,
                    banyak kemungkinan.
                </h2>

                <p>
                    Ceritakan sedikit tentangmu. Kami akan siapkan
                    langkah berikutnya dengan jelas, tanpa proses
                    yang berbelit.
                </p>
            </div>

            <div class="form-card">
                <form action="process registration.php" method="GET">

                    <div class="form-title">
                        <div>
                            <span class="label">Mulai dari sini</span>
                            <h2>Isi data diri</h2>
                        </div>

                        <span class="step">01 / 01</span>
                    </div>

                    <div class="form-grid">
                        <div class="field">
                            <label for="name">Nama lengkap</label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                placeholder="Masukkan nama lengkap"
                                required
                            >
                        </div>

                        <div class="field">
                            <label for="email">Email</label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="contoh@email.com"
                                required
                            >
                        </div>

                        <div class="field">
                            <label for="phone">Nomor HP</label>
                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                placeholder="08xxxxxxxxxx"
                                required
                            >
                        </div>

                        <div class="field">
                            <label for="study">Program studi</label>
                            <input
                                type="text"
                                id="study"
                                name="study"
                                placeholder="Contoh: PTIK"
                                required
                            >
                        </div>
                    </div>

                    <div class="field">
                        <label for="course">Pilih kursus</label>

                        <select id="course" name="course" required>
                            <option value="">-- Pilih kursus --</option>
                            <option value="Desain UI/UX">
                                Desain UI/UX
                            </option>
                            <option value="Digital Marketing">
                                Digital Marketing
                            </option>
                            <option value="Web Development">
                                Web Development
                            </option>
                            <option value="Data Analytics">
                                Data Analytics
                            </option>
                        </select>
                    </div>

                    <button class="submit-button" type="submit">
                        Daftar sekarang →
                    </button>

                    <p class="privacy">
                        Data kamu aman dan hanya digunakan untuk
                        keperluan pendaftaran kelas.
                    </p>
                </form>
            </div>
        </div>
    </section>

    <section id="katalog" class="catalog container">
        <span class="label">Pilih arahmu</span>

        <h2>Kelas untuk rasa ingin tahu.</h2>

        <div class="courses">
            <a class="course" href="#daftar-kursus">
                <span class="course-number">01</span>
                <h3>Desain UI/UX</h3>
                <p>Kelas kreatif · 8 minggu</p>
            </a>

            <a class="course" href="#daftar-kursus">
                <span class="course-number">02</span>
                <h3>Digital Marketing</h3>
                <p>Kelas intensif · 6 minggu</p>
            </a>

            <a class="course" href="#daftar-kursus">
                <span class="course-number">03</span>
                <h3>Web Development</h3>
                <p>Kelas praktik · 10 minggu</p>
            </a>

            <a class="course" href="#daftar-kursus">
                <span class="course-number">04</span>
                <h3>Data Analytics</h3>
                <p>Kelas terapan · 8 minggu</p>
            </a>
        </div>
    </section>
</main>

<footer>
    <div class="container footer-content">
        <a class="logo footer-logo" href="registration.php">
            <span class="logo-icon">▣</span>
            <span>KursusKu</span>
        </a>

        <span class="footer-text">
            © 2026 KursusKu · Belajar dari mana saja
        </span>
    </div>
</footer>

</body>
</html>