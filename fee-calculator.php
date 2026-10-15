
<?php
$courseName = 'Laravel Fundamental';
$fee = 350000;
$participantCount = 2;
$discountPercent = 10;
$adminFee = 25000;
$isActive = true;

// Proses perhitungan biaya
$subtotal = $fee * $participantCount;
$discount = intdiv($subtotal * $discountPercent, 100);
$total = $subtotal - $discount + $adminFee;

// Format angka menjadi Rupiah
function rupiah(int $amount): string
{
    return 'Rp ' . number_format($amount, 0, ',', '.');
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Biaya - KursusKu</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f1f5fb;
            color: #243247;
            min-height: 100vh;
        }

        .navbar {
            background: #ffffff;
            border-bottom: 1px solid #e5eaf2;
            padding: 20px 7%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
        }

        .brand {
            font-size: 24px;
            font-weight: bold;
            color: #2563eb;
        }

        .brand span {
            color: #172b4d;
        }

        .nav-label {
            color: #64748b;
            font-size: 13px;
        }

        .container {
            width: min(1000px, 90%);
            margin: 45px auto;
        }

        .heading {
            margin-bottom: 28px;
        }

        .heading .eyebrow {
            color: #2563eb;
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .heading h1 {
            font-size: clamp(27px, 4vw, 36px);
            margin-bottom: 12px;
            color: #172b4d;
        }

        .heading p {
            color: #64748b;
            line-height: 1.7;
        }

        .layout {
            display: grid;
            grid-template-columns: 1fr 1.1fr;
            gap: 24px;
            align-items: stretch;
        }

        .card {
            background: #ffffff;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 8px 30px rgba(30, 64, 120, 0.07);
            border: 1px solid #e8edf5;
        }

        .card h2 {
            font-size: 19px;
            margin-bottom: 22px;
            color: #172b4d;
        }

        .course-icon {
            width: 58px;
            height: 58px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            background: #eaf1ff;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .course-name {
            font-size: 23px;
            font-weight: bold;
            margin-bottom: 9px;
        }

        .description {
            color: #64748b;
            font-size: 14px;
            line-height: 1.7;
        }

        .badge {
            display: inline-block;
            margin-top: 18px;
            padding: 8px 12px;
            background: #dcfce7;
            color: #15803d;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
            padding: 17px 0;
            border-bottom: 1px solid #edf0f5;
            font-size: 14px;
        }

        .info span:first-child {
            color: #64748b;
        }

        .info strong {
            text-align: right;
            color: #243247;
        }

        .discount {
            color: #16a34a !important;
        }

        .total-box {
            margin-top: 25px;
            padding: 24px;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #ffffff;
            border-radius: 15px;
        }

        .total-box p {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 12px;
        }

        .total-box h3 {
            font-size: clamp(24px, 4vw, 31px);
            overflow-wrap: anywhere;
        }

        .total-box small {
            display: block;
            margin-top: 12px;
            opacity: 0.85;
            line-height: 1.6;
        }

        .note {
            margin-top: 22px;
            padding: 15px;
            background: #eff6ff;
            color: #1e40af;
            border-radius: 10px;
            font-size: 13px;
            line-height: 1.7;
        }

        .footer {
            text-align: center;
            color: #94a3b8;
            font-size: 12px;
            padding: 10px 20px 30px;
        }

        @media (max-width: 700px) {
            .navbar {
                padding: 18px 5%;
            }

            .brand {
                font-size: 21px;
            }

            .container {
                margin: 30px auto;
            }

            .layout {
                grid-template-columns: 1fr;
            }

            .card {
                padding: 23px;
            }
        }
    </style>
</head>

<body>

    <header class="navbar">
        <div class="brand">Kursus<span>Ku</span></div>
        <div class="nav-label">Kalkulator Biaya Kursus</div>
    </header>

    <main class="container">

        <section class="heading">
            <div class="eyebrow">KURSUSKU • PEMBELAJARAN DIGITAL</div>
            <h1>Kalkulator Biaya Kursus</h1>
            <p>
                Lihat rincian biaya, potongan diskon, dan total pembayaran
                kursus secara jelas dan transparan.
            </p>
        </section>

        <div class="layout">

            <section class="card">
                <div class="course-icon">📘</div>

                <h2>Informasi Kursus</h2>

                <div class="course-name">
                    <?= htmlspecialchars($courseName) ?>
                </div>

                <p class="description">
                    Program pembelajaran Laravel Fundamental untuk
                    mengenal dasar pengembangan aplikasi web.
                </p>

                <?php if ($isActive): ?>
                    <div class="badge">● Kursus Aktif</div>
                <?php endif; ?>

                <div class="info" style="margin-top: 25px;">
                    <span>Biaya per peserta</span>
                    <strong><?= rupiah($fee) ?></strong>
                </div>

                <div class="info">
                    <span>Jumlah peserta</span>
                    <strong><?= $participantCount ?> orang</strong>
                </div>

                <div class="info">
                    <span>Diskon</span>
                    <strong><?= $discountPercent ?>%</strong>
                </div>

                <div class="info">
                    <span>Biaya administrasi</span>
                    <strong><?= rupiah($adminFee) ?></strong>
                </div>
            </section>

            <section class="card">
                <h2>Rincian Pembayaran</h2>

                <div class="info">
                    <span>Subtotal</span>
                    <strong><?= rupiah($subtotal) ?></strong>
                </div>

                <div class="info">
                    <span>Diskon <?= $discountPercent ?>%</span>
                    <strong class="discount">
                        − <?= rupiah($discount) ?>
                    </strong>
                </div>

                <div class="info">
                    <span>Biaya administrasi</span>
                    <strong><?= rupiah($adminFee) ?></strong>
                </div>

                <div class="total-box">
                    <p>Total pembayaran</p>
                    <h3><?= rupiah($total) ?></h3>
                    <small>
                        Total akhir setelah pengurangan diskon
                        dan penambahan biaya administrasi.
                    </small>
                </div>

                <div class="note">
                    <strong>Informasi perhitungan</strong><br>
                    Total = Subtotal − Diskon + Biaya Administrasi.
                    Semua perhitungan dilakukan menggunakan PHP.
                </div>
            </section>

        </div>
    </main>

    <footer class="footer">
        &copy; <?= date('Y') ?> KursusKu — Platform Pembelajaran Digital
    </footer>

</body>
</html>
