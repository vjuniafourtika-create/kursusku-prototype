```php
<?php
date_default_timezone_set('Asia/Jakarta');
$serverTime = date('Y-m-d H:i:s');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Time - KursusKu</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #0f172a, #2563eb, #38bdf8);
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 550px;
            padding: 40px 30px;
            text-align: center;
            color: white;
            background: rgba(255, 255, 255, 0.13);
            border: 1px solid rgba(255, 255, 255, 0.25);
            border-radius: 25px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        }

        .icon {
            font-size: 60px;
            margin-bottom: 15px;
        }

        h1 {
            font-size: 30px;
            margin-bottom: 10px;
        }

        .description {
            color: #dbeafe;
            margin-bottom: 30px;
            font-size: 15px;
        }

        .time-box {
            background: rgba(15, 23, 42, 0.5);
            border-radius: 18px;
            padding: 25px 15px;
            margin-bottom: 25px;
        }

        .label {
            font-size: 13px;
            letter-spacing: 2px;
            color: #93c5fd;
            margin-bottom: 15px;
        }

        .time {
            font-size: clamp(22px, 5vw, 32px);
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .status {
            display: inline-block;
            background: rgba(34, 197, 94, 0.2);
            color: #bbf7d0;
            padding: 10px 18px;
            border-radius: 30px;
            font-size: 13px;
        }

        .dot {
            display: inline-block;
            width: 9px;
            height: 9px;
            background: #4ade80;
            border-radius: 50%;
            margin-right: 7px;
        }

        footer {
            margin-top: 30px;
            font-size: 12px;
            color: #dbeafe;
        }

        @media (max-width: 480px) {
            .container {
                padding: 30px 18px;
            }

            h1 {
                font-size: 25px;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="icon">🕒</div>

        <h1>Server Time</h1>

        <p class="description">
            Informasi waktu server KursusKu
        </p>

        <div class="time-box">
            <div class="label">WAKTU SERVER SAAT INI</div>

            <div class="time">
                <?php echo $serverTime; ?>
            </div>
        </div>

        <div class="status">
            <span class="dot"></span>
            Server Time Aktif
        </div>

        <footer>
            &copy; <?php echo date('Y'); ?> KursusKu
        </footer>
    </div>

</body>
</html>
```