<?php
require __DIR__ . '/helpers.php';

$history = [
    [
        'name' => 'viona',
        'course' => 'Web Dasar',
        'total' => 240000
    ],
    [
        'name' => 'farik',
        'course' => 'PHP Dasar',
        'total' => 340000
    ],
    [
        'name' => 'junia',
        'course' => 'Laravel Dasar',
        'total' => 500000
    ],
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>History Dummy - KursusKu</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>

    <!-- NAVIGASI -->
    <nav class="navbar">
        <div class="nav-container">

            <a href="index.php" class="logo">
                KursusKu
            </a>

            <div class="nav-links">
                <a href="index.php">Beranda</a>
                <a href="register.php">Daftar Kursus</a>
                <a href="history.php" class="active">History Dummy</a>
            </div>

        </div>
    </nav>


    <!-- KONTEN UTAMA -->
    <main class="history-container">

        <section class="history-header">
            <span class="history-badge">DATA PENDAFTARAN</span>

            <h1>History Pendaftaran</h1>

            <p>
                Daftar data dummy peserta kursus yang ditampilkan
                menggunakan perulangan <strong>foreach</strong>.
            </p>
        </section>


        <!-- TABEL HISTORY -->
        <section class="history-card">

            <div class="table-wrapper">

                <table class="history-table">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Kursus</th>
                            <th>Total</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($history as $index => $item): ?>

                            <tr>

                                <td>
                                    <?= $index + 1 ?>
                                </td>

                                <td>
                                    <strong>
                                        <?= e($item['name']) ?>
                                    </strong>
                                </td>

                                <td>
                                    <?= e($item['course']) ?>
                                </td>

                                <td class="total-price">
                                    <?= formatRupiah($item['total']) ?>
                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </section>


        <!-- TOMBOL KEMBALI -->
        <div class="history-action">

            <a href="register.php" class="btn-primary">
                + Daftar Kursus
            </a>

            <a href="index.php" class="btn-secondary">
                ← Kembali ke Beranda
            </a>

        </div>

    </main>


    <!-- FOOTER -->
    <footer class="footer">
        <p>
            &copy; 2026 KursusKu. Praktikum Pemrograman Web III.
        </p>
    </footer>

</body>
</html>