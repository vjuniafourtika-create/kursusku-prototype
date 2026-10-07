<?php

require __DIR__ . '/data.php';
require __DIR__ . '/helpers.php';

// Pastikan halaman hanya diproses melalui POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit;
}

// Ambil data dari form
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');

$courseCode = $_POST['course_code'] ?? '';
$participantType = $_POST['participant_type'] ?? '';
$learningMode = $_POST['learning_mode'] ?? '';

$packageCount = (int) ($_POST['package_count'] ?? 1);

$notes = trim($_POST['notes'] ?? '');

$interests = $_POST['interests'] ?? [];

// Pastikan interests berupa array
if (!is_array($interests)) {
    $interests = [];
}

// Batasi interests hanya pada pilihan yang tersedia
$allowedInterestKeys = array_keys($interestOptions);

$interests = array_values(
    array_intersect($interests, $allowedInterestKeys)
);

// Validasi
$errors = [];

if ($name === '') {
    $errors[] = 'Nama wajib diisi.';
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid.';
}

// Cari kursus
$course = findCourse($courses, $courseCode);

if ($course === null) {
    $errors[] = 'Kursus tidak ditemukan.';
}

// Validasi tipe peserta
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

// ======================
// Tampilkan error
// ======================

if ($errors !== []) {
    ?>
    <!doctype html>
    <html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data Belum Valid - KursusKu</title>
    </head>

    <body>
        <main>
            <h1>Data belum dapat diproses</h1>

            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= e($error) ?></li>
                <?php endforeach; ?>
            </ul>

            <a href="register.php">Kembali ke form</a>
        </main>
    </body>
    </html>
    <?php
    exit;
}
// =========================
// Hitung biaya
// =========================

$discountPercent = getDiscountPercent($participantType);

$grossTotal = $course['fee'] * $packageCount;

$discountAmount = intdiv(
    $grossTotal * $discountPercent,
    100
);

$finalTotal = $grossTotal - $discountAmount;
$learningModeLabel = getLearningModeLabel($learningMode);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pendaftaran - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <nav>
        <a href="index.php">Beranda</a>
        <a href="register.php">Daftar Kursus</a>
        <a href="history.php">History Dummy</a>
    </nav>

    <main class="container">

        <h1>Ringkasan Pendaftaran</h1>

        <p>Nama: <?= e($name) ?></p>
        <p>Email: <?= e($email) ?></p>
        <p>Kursus: <?= e($course['name']) ?></p>

        <h3>Minat Belajar</h3>

        <ul>
            <?php if ($interests === []): ?>
                <li>Belum memilih minat.</li>
            <?php else: ?>
                <?php foreach ($interests as $interest): ?>
                    <li><?= e($interest) ?></li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>

        <p>Metode Belajar: <?= e($learningModeLabel) ?></p>

        <p>Jumlah Paket: <?= $packageCount ?></p>

        <p>Total Sebelum Diskon: <?= formatRupiah($grossTotal) ?></p>

        <p>Diskon: <?= $discountPercent ?>%</p>

        <p>Total Akhir: <?= formatRupiah($finalTotal) ?></p>

        <h3>Catatan</h3>
        <p><?= e($notes) ?></p>
        <h3>Minat</h3>
<ul>
    <?php if ($interests === []): ?>
        <li>Belum memilih minat.</li>
    <?php else: ?>
        <?php foreach ($interests as $interest): ?>
            <?php $label = $interestOptions[$interest] ?? $interest; ?>
            <li><?= e($label) ?></li>
        <?php endforeach; ?>
    <?php endif; ?>
</ul>

        <a href="register.php">Kembali ke Form</a>

    </main>

</body>
</html>