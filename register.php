<?php require __DIR__ . '/data.php';
require __DIR__ . '/helpers.php'; ?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kursus - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body> <!-- Header -->
    <header class="site-header">
        <div class="container header-content">
            <div class="logo"> <a href="index.php">Kursus<span>Ku</span></a> </div>
            <nav class="navigation"> <a href="index.php">Beranda</a> <a href="register.php" class="active">Daftar Kursus</a> <a href="history.php">History</a> </nav>
        </div>
    </header> <!-- Main -->
    <main class="register-section">
        <div class="container">
            <div class="register-header">
                <p class="section-label">KURSUSKU</p>
                <h1>Form Pendaftaran Kursus</h1>
                <p> Lengkapi data berikut untuk melakukan pendaftaran kursus yang kamu pilih. </p>
            </div> <!-- Form -->
            <form method="POST" action="process.php" class="register-form"> <!-- Data Peserta -->
                <div class="form-card">
                    <h2>Data Peserta</h2>
                    <div class="form-group"> <label for="name"> Nama lengkap </label> <input id="name" name="name" type="text" placeholder="Masukkan nama lengkap" required> </div>
                    <div class="form-group"> <label for="email"> Email </label> <input id="email" name="email" type="email" placeholder="contoh@email.com" required> </div>
                </div> <!-- Pilihan Kursus -->
                <div class="form-card">
                    <h2>Pilihan Kursus</h2>
                    <div class="form-group"> <label for="course_code"> Pilih kursus </label> <div class="form-card">
    <h2>Pilihan Kursus</h2>

    <div class="form-group">
        <label for="course_code">Pilih kursus</label>

        <select id="course_code" name="course_code" required>
            <option value="">-- Pilih kursus --</option>

            <?php foreach ($courses as $course): ?>
                <option value="<?= e($course['code']) ?>">
                    <?= e($course['name']) ?> - <?= formatRupiah($course['fee']) ?>
                </option>
            <?php endforeach; ?>

        </select>
    </div>
</div>
                    </div>
                </div> <!-- Tipe Peserta -->
                <!-- Minat Belajar -->
<div class="form-card">
    <h2>Minat Belajar</h2>

    <fieldset>
        <legend>Pilih minat belajar</legend>

        <div class="checkbox-group">
            <?php foreach ($interestOptions as $value => $label): ?>
                <label class="checkbox-option">
                    <input
                        type="checkbox"
                        name="interests[]"
                        value="<?= e($value) ?>"
                    >
                    <span><?= e($label) ?></span>
                </label>
            <?php endforeach; ?>
        </div>
    </fieldset>
</div>

<!-- Fasilitas -->
<div class="form-card">
    <h2>Fasilitas</h2>

    <ul>
        <?php foreach ($facilities as $facility): ?>
            <li><?= e($facility) ?></li>
        <?php endforeach; ?>
    </ul>
</div>


<!-- Metode Belajar -->
<div class="form-card">
    <h2>Metode Belajar</h2>

    <div class="form-group">
        <label for="learning_mode">Metode belajar</label>

        <select
            id="learning_mode"
            name="learning_mode"
            required
        >
            <option value="">-- Pilih metode --</option>
            <option value="offline">Tatap muka</option>
            <option value="online">Online</option>
            <option value="hybrid">Hybrid</option>
        </select>
    </div>
</div>


<!-- Jumlah Paket -->
<div class="form-card">
    <h2>Jumlah Paket</h2>

    <div class="form-group">
        <label for="package_count">Jumlah paket</label>

        <select
            id="package_count"
            name="package_count"
            required
        >
            <?php for ($i = 1; $i <= 3; $i++): ?>
                <option value="<?= $i ?>">
                    <?= $i ?> paket
                </option>
            <?php endfor; ?>
        </select>
    </div>
</div>


<!-- Catatan -->
<div class="form-card">
    <h2>Catatan Tambahan</h2>

    <div class="form-group">
        <label for="notes">Catatan tambahan</label>

        <textarea
            id="notes"
            name="notes"
            rows="4"
            maxlength="300"
            placeholder="Tulis catatan tambahan jika diperlukan..."
        ></textarea>
    </div>
</div>
                <div class="form-card">
                    <h2>Tipe Peserta</h2>
                    <fieldset>
                        <legend> Pilih tipe peserta </legend>
                        <div class="radio-group"> <label class="radio-option"> <input type="radio" name="participant_type" value="mahasiswa" required> <span>Mahasiswa</span> </label> <label class="radio-option"> <input type="radio" name="participant_type" value="guru"> <span>Guru</span> </label> <label class="radio-option"> <input type="radio" name="participant_type" value="umum"> <span>Umum</span> </label> </div>
                    </fieldset>
                </div> <!-- Tombol -->
                <div class="form-action"> <a href="index.php" class="btn btn-secondary"> Kembali </a> <button type="submit" class="btn btn-primary"> Proses Pendaftaran </button> </div>
            </form>
        </div>
    </main> <!-- Footer -->
    <footer class="site-footer">
        <div class="container">
            <p> &copy; 2026 KursusKu. Semua hak dilindungi. </p>
        </div>
    </footer>
</body>

</html>