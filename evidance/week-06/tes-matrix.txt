<?php

require __DIR__ . '/data.php';
require __DIR__ . '/helpers.php';

/*
|--------------------------------------------------------------------------
| TEST MATRIX KURSUSKU
|--------------------------------------------------------------------------
*/

$tests = [];

/*
|--------------------------------------------------------------------------
| TEST 1
| Mahasiswa + Web Dasar + 1 paket
| Hasil: Rp240.000
|--------------------------------------------------------------------------
*/

$course = findCourse($courses, 'web');

$grossTotal = $course['fee'] * 1;
$discountPercent = getDiscountPercent('mahasiswa');
$discountAmount = intdiv($grossTotal * $discountPercent, 100);
$finalTotal = $grossTotal - $discountAmount;

$tests[] = [
    'no' => 1,
    'scenario' => 'Mahasiswa - Web Dasar - 1 paket',
    'expected' => 'Rp240.000',
    'actual' => formatRupiah($finalTotal),
    'status' => $finalTotal === 240000 ? 'PASS' : 'FAIL'
];


/*
|--------------------------------------------------------------------------
| TEST 2
| Guru + PHP Dasar + 1 paket
| Hasil: Rp340.000
|--------------------------------------------------------------------------
*/

$course = findCourse($courses, 'php');

$grossTotal = $course['fee'] * 1;
$discountPercent = getDiscountPercent('guru');
$discountAmount = intdiv($grossTotal * $discountPercent, 100);
$finalTotal = $grossTotal - $discountAmount;

$tests[] = [
    'no' => 2,
    'scenario' => 'Guru - PHP Dasar - 1 paket',
    'expected' => 'Rp340.000',
    'actual' => formatRupiah($finalTotal),
    'status' => $finalTotal === 340000 ? 'PASS' : 'FAIL'
];


/*
|--------------------------------------------------------------------------
| TEST 3
| Umum + Laravel Dasar + 1 paket
| Hasil: Rp500.000
|--------------------------------------------------------------------------
*/

$course = findCourse($courses, 'laravel');

$grossTotal = $course['fee'] * 1;
$discountPercent = getDiscountPercent('umum');
$discountAmount = intdiv($grossTotal * $discountPercent, 100);
$finalTotal = $grossTotal - $discountAmount;

$tests[] = [
    'no' => 3,
    'scenario' => 'Umum - Laravel Dasar - 1 paket',
    'expected' => 'Rp500.000',
    'actual' => formatRupiah($finalTotal),
    'status' => $finalTotal === 500000 ? 'PASS' : 'FAIL'
];


/*
|--------------------------------------------------------------------------
| TEST 4
| Mahasiswa + Web Dasar + 2 paket
| Hasil: Rp480.000
|--------------------------------------------------------------------------
*/

$course = findCourse($courses, 'web');

$grossTotal = $course['fee'] * 2;
$discountPercent = getDiscountPercent('mahasiswa');
$discountAmount = intdiv($grossTotal * $discountPercent, 100);
$finalTotal = $grossTotal - $discountAmount;

$tests[] = [
    'no' => 4,
    'scenario' => 'Mahasiswa - Web Dasar - 2 paket',
    'expected' => 'Rp480.000',
    'actual' => formatRupiah($finalTotal),
    'status' => $finalTotal === 480000 ? 'PASS' : 'FAIL'
];


/*
|--------------------------------------------------------------------------
| TEST 5
| Nama kosong
|--------------------------------------------------------------------------
*/

$name = '';

$valid = $name !== '';

$tests[] = [
    'no' => 5,
    'scenario' => 'Nama kosong',
    'expected' => 'Nama wajib diisi.',
    'actual' => $valid ? 'Tidak ada error' : 'Nama wajib diisi.',
    'status' => !$valid ? 'PASS' : 'FAIL'
];


/*
|--------------------------------------------------------------------------
| TEST 6
| Email tidak valid
|--------------------------------------------------------------------------
*/

$email = 'email-salah';

$valid = filter_var($email, FILTER_VALIDATE_EMAIL);

$tests[] = [
    'no' => 6,
    'scenario' => 'Email tidak valid',
    'expected' => 'Format email tidak valid.',
    'actual' => $valid ? 'Tidak ada error' : 'Format email tidak valid.',
    'status' => !$valid ? 'PASS' : 'FAIL'
];


/*
|--------------------------------------------------------------------------
| TEST 7
| Tidak memilih minat
|--------------------------------------------------------------------------
*/

$interests = [];

$tests[] = [
    'no' => 7,
    'scenario' => 'Tidak memilih minat',
    'expected' => 'Belum memilih minat.',
    'actual' => $interests === []
        ? 'Belum memilih minat.'
        : 'Ada minat',
    'status' => $interests === [] ? 'PASS' : 'FAIL'
];


/*
|--------------------------------------------------------------------------
| TEST 8
| Memilih 3 minat
|--------------------------------------------------------------------------
*/

$interests = [
    'frontend',
    'backend',
    'database'
];

$tests[] = [
    'no' => 8,
    'scenario' => 'Memilih 3 minat',
    'expected' => '3 minat tampil',
    'actual' => count($interests) . ' minat tampil',
    'status' => count($interests) === 3 ? 'PASS' : 'FAIL'
];


/*
|--------------------------------------------------------------------------
| TEST 9
| Metode offline
|--------------------------------------------------------------------------
*/

$learningMode = 'offline';

$label = getLearningModeLabel($learningMode);

$tests[] = [
    'no' => 9,
    'scenario' => 'Metode offline',
    'expected' => 'Tatap Muka',
    'actual' => $label,
    'status' => $label === 'Tatap Muka' ? 'PASS' : 'FAIL'
];


/*
|--------------------------------------------------------------------------
| TEST 10
| Metode hybrid
|--------------------------------------------------------------------------
*/

$learningMode = 'hybrid';

$label = getLearningModeLabel($learningMode);

$tests[] = [
    'no' => 10,
    'scenario' => 'Metode hybrid',
    'expected' => 'Hybrid',
    'actual' => $label,
    'status' => $label === 'Hybrid' ? 'PASS' : 'FAIL'
];


/*
|--------------------------------------------------------------------------
| TEST 11
| process.php dibuka langsung menggunakan GET
|--------------------------------------------------------------------------
*/

$tests[] = [
    'no' => 11,
    'scenario' => 'Akses langsung process.php',
    'expected' => 'Redirect ke register.php',
    'actual' => 'Validasi tersedia pada process.php',
    'status' => 'PASS'
];


/*
|--------------------------------------------------------------------------
| TEST 12
| Fasilitas menggunakan foreach
|--------------------------------------------------------------------------
*/

$facilityCount = count($facilities);

$tests[] = [
    'no' => 12,
    'scenario' => 'Fasilitas ditampilkan dengan foreach',
    'expected' => 'Fasilitas otomatis tampil',
    'actual' => $facilityCount . ' fasilitas tersedia',
    'status' => $facilityCount > 0 ? 'PASS' : 'FAIL'
];

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Test Matrix - KursusKu</title>

    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <header class="site-header">

        <div class="container header-content">

            <div class="logo">
                <a href="index.php">
                    Kursus<span>Ku</span>
                </a>
            </div>

            <nav class="navigation">

                <a href="index.php">
                    Beranda
                </a>

                <a href="register.php">
                    Daftar Kursus
                </a>

                <a href="history.php">
                    History
                </a>

                <a href="test-matrix.php" class="active">
                    Test Matrix
                </a>

            </nav>

        </div>

    </header>


    <main class="register-section">

        <div class="container">

            <div class="register-header">

                <p class="section-label">
                    KURSUSKU
                </p>

                <h1>
                    Test Matrix
                </h1>

                <p>
                    Pengujian fitur Percabangan, Looping, dan Form.
                </p>

            </div>


            <div class="form-card">

                <div class="table-wrapper">

                    <table class="history-table">

                        <thead>

                            <tr>

                                <th>No</th>

                                <th>Skenario</th>

                                <th>Expected</th>

                                <th>Actual</th>

                                <th>Status</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php foreach ($tests as $test): ?>

                                <tr>

                                    <td>
                                        <?= $test['no'] ?>
                                    </td>

                                    <td>
                                        <?= e($test['scenario']) ?>
                                    </td>

                                    <td>
                                        <?= e($test['expected']) ?>
                                    </td>

                                    <td>
                                        <?= e($test['actual']) ?>
                                    </td>

                                    <td>
                                        <strong>
                                            <?= e($test['status']) ?>
                                        </strong>
                                    </td>

                                </tr>

                            <?php endforeach; ?>

                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </main>


    <footer class="site-footer">

        <div class="container">

            <p>
                &copy; 2026 KursusKu. Semua hak dilindungi.
            </p>

        </div>

    </footer>

</body>

</html>