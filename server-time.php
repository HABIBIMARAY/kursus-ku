<?php

declare(strict_types=1);

// Mengatur zona waktu Indonesia Barat (WIB)
date_default_timezone_set('Asia/Jakarta');

// Mengambil waktu server sesuai zona waktu WIB
$serverTime = date('Y-m-d H:i:s');

?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Waktu Server - KursusKu</title>

    <style>
        :root {
            --navy: #0f172a;
            --blue: #0284c7;
            --blue-dark: #0369a1;
            --cyan: #38bdf8;
            --cyan-soft: #e0f2fe;
            --background: #f4f7fb;
            --white: #ffffff;
            --text: #24344d;
            --muted: #64748b;
            --border: #e2e8f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background);
            color: var(--text);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .utility-card {
            width: 100%;
            max-width: 680px;
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 18px;
            padding: 40px;
            box-shadow: 0 12px 35px rgba(15, 23, 42, 0.08);
        }

        .eyebrow {
            display: inline-block;
            background: var(--cyan-soft);
            color: var(--blue-dark);
            padding: 7px 13px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.5px;
            margin-bottom: 20px;
        }

        h1 {
            color: var(--navy);
            font-size: 30px;
            line-height: 1.3;
            margin-bottom: 12px;
        }

        .subtitle {
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 25px;
            line-height: 1.7;
        }

        .clock-box {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            border: 1px solid #bae6fd;
            border-left: 5px solid var(--blue);
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 22px;
            text-align: center;
        }

        .clock-label {
            color: var(--blue-dark);
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1.5px;
            margin-bottom: 12px;
        }

        .clock {
            color: var(--navy);
            font-size: clamp(30px, 7vw, 44px);
            font-weight: 800;
            letter-spacing: 1px;
            font-variant-numeric: tabular-nums;
        }

        .date {
            color: var(--muted);
            font-size: 14px;
            margin-top: 10px;
        }

        .timezone {
            display: inline-block;
            margin-top: 15px;
            background: var(--white);
            border: 1px solid #bae6fd;
            color: var(--blue-dark);
            border-radius: 30px;
            padding: 6px 12px;
            font-size: 12px;
            font-weight: 700;
        }

        .description {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.8;
            margin-bottom: 26px;
        }

        code {
            background: #f1f5f9;
            color: var(--blue-dark);
            padding: 3px 7px;
            border-radius: 5px;
            font-size: 13px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            background: var(--blue);
            color: var(--white);
            padding: 13px 20px;
            border-radius: 9px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 700;
            transition: 0.25s;
        }

        .button:hover {
            background: var(--blue-dark);
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(2, 132, 199, 0.2);
        }

        .footer-note {
            margin-top: 28px;
            padding-top: 18px;
            border-top: 1px solid var(--border);
            color: var(--muted);
            font-size: 12px;
            text-align: center;
        }

        .footer-note span {
            color: var(--blue-dark);
            font-weight: 700;
        }

        @media (max-width: 600px) {
            body {
                padding: 16px;
            }

            .utility-card {
                padding: 26px 22px;
                border-radius: 14px;
            }

            h1 {
                font-size: 25px;
            }

            .button {
                width: 100%;
            }
        }
    </style>
</head>

<body class="utility-page">

    <main class="utility-card">

        <span class="eyebrow">PERTEMUAN 2</span>

        <h1>PHP Diproses oleh Server</h1>

        <p class="subtitle">
            Jam server KursusKu berdasarkan zona waktu Indonesia Barat.
        </p>

        <section class="clock-box">

            <div class="clock-label">WAKTU SEKARANG</div>

            <div class="clock" id="clock">
                <?= htmlspecialchars($serverTime, ENT_QUOTES, 'UTF-8') ?>
            </div>

            <div class="date" id="date">
                Memuat tanggal...
            </div>

            <div class="timezone">
                WIB · UTC+7
            </div>

        </section>

        <p class="description">
            Waktu awal diambil dari PHP menggunakan fungsi
            <code>date()</code> dengan zona waktu
            <code>Asia/Jakarta</code>. Tampilan jam kemudian diperbarui
            setiap detik di browser.
        </p>

        <a class="button" href="index.php">
            &larr; Kembali ke Beranda
        </a>

        <div class="footer-note">
            © <?= date('Y') ?> <span>KursusKu</span>.
            PHP Server Time Demo.
        </div>

    </main>

    <script>
        // Menampilkan waktu WIB dan memperbaruinya setiap detik.
        // Zona waktu browser tidak memengaruhi hasil.
        function updateClock() {
            const now = new Date();

            const optionsTime = {
                timeZone: 'Asia/Jakarta',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            };

            const optionsDate = {
                timeZone: 'Asia/Jakarta',
                weekday: 'long',
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            };

            document.getElementById('clock').textContent =
                new Intl.DateTimeFormat('id-ID', optionsTime)
                .format(now);

            document.getElementById('date').textContent =
                new Intl.DateTimeFormat('id-ID', optionsDate)
                .format(now);
        }

        updateClock();
        setInterval(updateClock, 1000);
    </script>

</body>

</html>