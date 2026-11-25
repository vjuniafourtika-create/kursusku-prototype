```php
<?php

// ========================================
// 1. MEMERIKSA REQUEST METHOD
// ========================================

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: registration.php');
    exit;
}


// ========================================
// 2. FUNGSI ESCAPE HTML
// ========================================

function e($value): string
{
    return htmlspecialchars(
        (string) $value,
        ENT_QUOTES,
        'UTF-8'
    );
}


// ========================================
// 3. MENGAMBIL DATA DARI FORMULIR
// ========================================

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$studyProgram = trim($_POST['study_program'] ?? '');

$course = trim($_POST['course'] ?? '');
$participantType = trim($_POST['participant_type'] ?? '');

$interests = $_POST['interests'] ?? [];

$note = trim($_POST['note'] ?? '');
$source = trim($_POST['source'] ?? '');


// ========================================
// 4. VALIDASI DATA INPUT
// ========================================

$errors = [];

if ($name === '') {
    $errors[] = 'Nama wajib diisi.';
}

if ($email === '') {
    $errors[] = 'Email wajib diisi.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid.';
}

if ($phone === '') {
    $errors[] = 'Nomor HP wajib diisi.';
}

if ($studyProgram === '') {
    $errors[] = 'Program studi wajib diisi.';
}

if ($course === '') {
    $errors[] = 'Kursus wajib dipilih.';
}

if ($participantType === '') {
    $errors[] = 'Jenis peserta wajib dipilih.';
}


// ========================================
// 5. MEMERIKSA ARRAY INTERESTS
// ========================================

if (!is_array($interests)) {
    $interests = [];
}

$interests = array_filter(
    $interests,
    'is_string'
);

$interestText = implode(', ', $interests);


// ========================================
// 6. MENAMPILKAN ERROR JIKA ADA
// ========================================

if (!empty($errors)) {
    http_response_code(422);
}

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

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

</head>

<body>

<!-- ========================================
     HEADER DAN NAVIGASI
========================================= -->

<header class="site-header">

    <div class="container nav-wrap">

        <a href="index.php" class="brand">
            KursusKu
        </a>

        <nav class="nav-links">

            <a href="index.php">
                Katalog
            </a>

            <a href="registration.php">
                Daftar Kursus
            </a>

        </nav>

    </div>

</header>


<!-- ========================================
     KONTEN UTAMA
========================================= -->

<main class="container">

    <?php if (!empty($errors)): ?>

        <!-- PESAN VALIDASI ERROR -->

        <section class="summary-card">

            <h1>Data Belum Lengkap</h1>

            <p>
                Periksa kembali formulir pendaftaran kamu.
            </p>

            <ul>
                <?php foreach ($errors as $error): ?>

                    <li>
                        <?= e($error) ?>
                    </li>

                <?php endforeach; ?>
            </ul>

            <br>

            <a
                href="registration.php"
                class="btn-link"
            >
                Kembali ke Formulir
            </a>

        </section>

    <?php else: ?>

        <!-- PESAN SUKSES -->

        <section class="alert-success">

            <h1>
                Pendaftaran Berhasil!
            </h1>

            <p>
                Data pendaftaran kamu berhasil diterima
                dan ditampilkan di bawah ini.
            </p>

        </section>


        <!-- RINGKASAN PENDAFTARAN -->

        <section class="summary-card">

            <h2>
                Ringkasan Pendaftaran
            </h2>

            <dl class="summary-list">

                <dt>Nama</dt>
                <dd><?= e($name) ?></dd>

                <dt>Email</dt>
                <dd><?= e($email) ?></dd>

                <dt>Nomor HP</dt>
                <dd><?= e($phone) ?></dd>

                <dt>Program Studi</dt>
                <dd><?= e($studyProgram) ?></dd>

                <dt>Kursus</dt>
                <dd><?= e($course) ?></dd>

                <dt>Jenis Peserta</dt>
                <dd><?= e($participantType) ?></dd>

                <dt>Minat</dt>
                <dd>
                    <?= $interestText !== ''
                        ? e($interestText)
                        : 'Belum ada minat yang dipilih' ?>
                </dd>

                <dt>Catatan</dt>
                <dd>
                    <?= $note !== ''
                        ? nl2br(e($note))
                        : 'Tidak ada catatan' ?>
                </dd>

                <dt>Sumber Informasi</dt>
                <dd><?= e($source) ?></dd>

            </dl>

            <br>

            <a
                href="registration.php"
                class="btn-link"
            >
                Kembali ke Formulir
            </a>

            <a
                href="index.php"
                class="btn-link"
            >
                Kembali ke Katalog
            </a>

        </section>

    <?php endif; ?>

</main>


<!-- ========================================
     FOOTER
========================================= -->

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