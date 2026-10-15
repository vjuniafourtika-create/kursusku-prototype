```php
<?php

// ==========================================
// 1. MEMANGGIL FILE DATA DAN HELPERS
// ==========================================

require __DIR__ . '/data.php';
require __DIR__ . '/helpers.php';


// ==========================================
// 2. MEMERIKSA REQUEST METHOD
// ==========================================

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(302);
    header('Location: register.php');
    exit;
}


// ==========================================
// 3. MENGAMBIL DATA DARI FORMULIR
// ==========================================

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');

$courseCode = trim($_POST['course_code'] ?? '');
$participantType = trim($_POST['participant_type'] ?? '');
$learningMode = trim($_POST['learning_mode'] ?? '');

$packageCount = filter_var(
    $_POST['package_count'] ?? null,
    FILTER_VALIDATE_INT
);

$notes = trim($_POST['notes'] ?? '');

$interests = $_POST['interests'] ?? [];


// ==========================================
// 4. VALIDASI ARRAY INTERESTS
// ==========================================

if (!is_array($interests)) {
    http_response_code(400);
    exit('Permintaan tidak valid: interests harus berupa array.');
}

$allowedInterestKeys = array_keys($interestOptions);

$interests = array_values(
    array_intersect(
        $interests,
        $allowedInterestKeys
    )
);


// ==========================================
// 5. VALIDASI DATA FORMULIR
// ==========================================

$errors = [];

// Validasi nama
if ($name === '') {
    $errors[] = 'Nama wajib diisi.';
}

// Validasi email
if ($email === '') {
    $errors[] = 'Email wajib diisi.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid.';
}

// Validasi kursus
$course = findCourse($courses, $courseCode);

if ($course === null) {
    $errors[] = 'Kursus tidak ditemukan.';
}

// Validasi jenis peserta
if (!in_array(
    $participantType,
    ['mahasiswa', 'guru', 'umum'],
    true
)) {
    $errors[] = 'Tipe peserta tidak valid.';
}

// Validasi metode belajar
if (!in_array(
    $learningMode,
    ['offline', 'online', 'hybrid'],
    true
)) {
    $errors[] = 'Metode belajar tidak valid.';
}

// Validasi jumlah paket
if (!in_array(
    $packageCount,
    [1, 2, 3],
    true
)) {
    $errors[] = 'Jumlah paket tidak valid.';
}


// ==========================================
// 6. HTTP RESPONSE UNTUK DATA TIDAK VALID
// ==========================================

if ($errors !== []) {
    http_response_code(422);
    ?>

    <!DOCTYPE html>
    <html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
        >
        <title>Data Tidak Valid - KursusKu</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>

    <body>

        <main class="container">

            <section class="summary-card">

                <h1>Data Belum Valid</h1>

                <p>
                    HTTP Response: 422 - Unprocessable Content
                </p>

                <p>
                    Periksa kembali formulir pendaftaran kamu.
                </p>

                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= e($error) ?></li>
                    <?php endforeach; ?>
                </ul>

                <br>

                <a href="register.php" class="btn-primary">
                    Kembali ke Formulir
                </a>

            </section>

        </main>

    </body>
    </html>

    <?php
    exit;
}


// ==========================================
// 7. MENGHITUNG BIAYA DAN DISKON
// ==========================================

$discountPercent = getDiscountPercent($participantType);

$grossTotal = $course['fee'] * $packageCount;

$discountAmount = intdiv(
    $grossTotal * $discountPercent,
    100
);

$finalTotal = $grossTotal - $discountAmount;

$learningModeLabel = getLearningModeLabel($learningMode);


// ==========================================
// 8. HTTP RESPONSE BERHASIL
// ==========================================

http_response_code(200);

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Hasil Pendaftaran - KursusKu</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- NAVIGASI -->

    <header class="site-header">

        <div class="container nav-wrap">

            <a href="index.php" class="brand">
                KursusKu
            </a>

            <nav class="nav-links">
                <a href="index.php">Beranda</a>
                <a href="register.php">Daftar Kursus</a>
                <a href="history.php">History Dummy</a>
            </nav>

        </div>

    </header>


    <!-- KONTEN UTAMA -->

    <main class="container">

        <section class="alert-success">

            <h1>Pendaftaran Berhasil!</h1>

            <p>
                HTTP Response: 200 - OK
            </p>

            <p>
                Data pendaftaran berhasil diproses.
            </p>

        </section>


        <!-- DATA PESERTA -->

        <section class="summary-card">

            <h2>Ringkasan Pendaftaran</h2>

            <dl class="summary-list">

                <dt>Nama</dt>
                <dd><?= e($name) ?></dd>

                <dt>Email</dt>
                <dd><?= e($email) ?></dd>

                <dt>Kursus</dt>
                <dd><?= e($course['name']) ?></dd>

                <dt>Jenis Peserta</dt>
                <dd><?= e($participantType) ?></dd>

                <dt>Metode Belajar</dt>
                <dd><?= e($learningModeLabel) ?></dd>

                <dt>Jumlah Paket</dt>
                <dd><?= $packageCount ?></dd>

            </dl>


            <!-- MINAT BELAJAR -->

            <h3>Minat Belajar</h3>

            <ul>

                <?php if ($interests === []): ?>

                    <li>Belum memilih minat.</li>

                <?php else: ?>

                    <?php foreach ($interests as $interest): ?>

                        <li>
                            <?= e($interestOptions[$interest]) ?>
                        </li>

                    <?php endforeach; ?>

                <?php endif; ?>

            </ul>


            <!-- CATATAN -->

            <h3>Catatan</h3>

            <p>
                <?= $notes !== ''
                    ? nl2br(e($notes))
                    : 'Tidak ada catatan.' ?>
            </p>


            <!-- RINCIAN BIAYA -->

            <h2>Rincian Biaya</h2>

            <dl class="summary-list">

                <dt>Harga per Paket</dt>
                <dd><?= formatRupiah($course['fee']) ?></dd>

                <dt>Total Sebelum Diskon</dt>
                <dd><?= formatRupiah($grossTotal) ?></dd>

                <dt>Persentase Diskon</dt>
                <dd><?= $discountPercent ?>%</dd>

                <dt>Nominal Diskon</dt>
                <dd><?= formatRupiah($discountAmount) ?></dd>

                <dt>Total Akhir</dt>
                <dd>
                    <strong>
                        <?= formatRupiah($finalTotal) ?>
                    </strong>
                </dd>

            </dl>


            <!-- TOMBOL -->

            <div class="history-action">

                <a href="register.php" class="btn-primary">
                    Daftar Kursus Lagi
                </a>

                <a href="index.php" class="btn-secondary">
                    Kembali ke Beranda
                </a>

            </div>

        </section>

    </main>


    <!-- FOOTER -->

    <footer class="footer">

        <div class="container">
            <p>
                &copy; 2026 KursusKu.
                Praktikum Pemrograman Web III.
            </p>
        </div>

    </footer>

</body>
</html>
```