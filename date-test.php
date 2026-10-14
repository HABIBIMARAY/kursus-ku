<?php
date_default_timezone_set('Asia/Jakarta');

$start = new DateTimeImmutable('2026-09-15');
$now = new DateTimeImmutable('now', new DateTimeZone('Asia/Jakarta'));
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Date/Time Test - KursusKu</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --navy: #0f172a;
            --blue: #0284c7;
            --blue-dark: #0369a1;
            --cyan: #38bdf8;
            --background: #f4f7fb;
            --text: #24344d;
            --muted: #64748b;
            --white: #ffffff;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background);
            color: var(--text);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* NAVBAR */
        .navbar {
            background: var(--navy);
            padding: 18px 7%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
            flex-wrap: wrap;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.12);
        }

        .brand {
            color: var(--white);
            font-size: 23px;
            font-weight: bold;
            text-decoration: none;
        }

        .brand span {
            color: var(--cyan);
        }

        .nav-label {
            color: #cbd5e1;
            font-size: 14px;
        }

        /* KONTEN */
        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 50px 20px;
        }

        .utility-card {
            width: 100%;
            max-width: 650px;
            padding: 38px;
            background: var(--white);
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(15, 23, 42, 0.08);
        }

        .eyebrow {
            display: inline-block;
            padding: 8px 14px;
            margin-bottom: 18px;
            border-radius: 30px;
            background: #e0f2fe;
            color: var(--blue-dark);
            font-size: 12px;
            font-weight: bold;
            letter-spacing: 1px;
        }

        h1 {
            color: var(--navy);
            font-size: 32px;
            margin-bottom: 10px;
        }

        .description {
            color: var(--muted);
            font-size: 15px;
            line-height: 1.7;
            margin-bottom: 28px;
        }

        /* INFORMASI TANGGAL */
        .info-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 18px;
            margin-bottom: 14px;
            background: #f8fafc;
            border: 1px solid #e2e8f0;
            border-radius: 13px;
        }

        .info-icon {
            width: 48px;
            height: 48px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            background: #e0f2fe;
            color: var(--blue-dark);
            font-size: 23px;
        }

        .info-text {
            min-width: 0;
        }

        .info-label {
            display: block;
            color: var(--muted);
            font-size: 13px;
            margin-bottom: 7px;
        }

        .info-value {
            display: block;
            color: var(--navy);
            font-size: 18px;
            font-weight: bold;
            overflow-wrap: anywhere;
        }

        .time-item {
            background: linear-gradient(135deg, #0f172a, #172f50);
            border: none;
        }

        .time-item .info-icon {
            background: rgba(56, 189, 248, 0.15);
            color: var(--cyan);
        }

        .time-item .info-label {
            color: #cbd5e1;
        }

        .time-item .info-value {
            color: var(--white);
        }

        /* TOMBOL */
        .button {
            display: inline-block;
            margin-top: 15px;
            padding: 13px 23px;
            border-radius: 10px;
            background: var(--blue);
            color: var(--white);
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            transition: 0.3s;
        }

        .button:hover {
            background: var(--blue-dark);
            transform: translateY(-2px);
        }

        /* FOOTER */
        .footer {
            padding: 20px;
            background: var(--navy);
            color: #cbd5e1;
            text-align: center;
            font-size: 13px;
            border-top: 3px solid var(--cyan);
        }

        .footer span {
            color: var(--cyan);
        }

        /* RESPONSIVE */
        @media (max-width: 600px) {
            .navbar {
                padding: 16px 20px;
            }

            .utility-card {
                padding: 25px 20px;
            }

            h1 {
                font-size: 26px;
            }

            .info-item {
                padding: 14px;
                gap: 12px;
            }

            .info-value {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>

    <header class="navbar">
        <a href="index.php" class="brand">
            Kursus<span>Ku</span>
        </a>

        <span class="nav-label">Pengujian Date &amp; Time PHP</span>
    </header>

    <main class="main-content">
        <section class="utility-card">

            <span class="eyebrow">PHP DATE &amp; TIME</span>

            <h1>Date/Time Test</h1>

            <p class="description">
                Halaman pengujian untuk menampilkan format tanggal,
                mengubah tampilan tanggal, dan membaca waktu berdasarkan
                zona waktu Asia/Jakarta.
            </p>

            <div class="info-item">
                <div class="info-icon">📅</div>
                <div class="info-text">
                    <span class="info-label">Sumber Tanggal</span>
                    <span class="info-value">
                        <?= htmlspecialchars($start->format('Y-m-d'), ENT_QUOTES, 'UTF-8') ?>
                    </span>
                </div>
            </div>

            <div class="info-item">
                <div class="info-icon">🗓️</div>
                <div class="info-text">
                    <span class="info-label">Tampilan Tanggal (Hari-Bulan-Tahun)</span>
                    <span class="info-value">
                        <?= htmlspecialchars($start->format('d-m-Y'), ENT_QUOTES, 'UTF-8') ?>
                    </span>
                </div>
            </div>

            <div class="info-item time-item">
                <div class="info-icon">🕒</div>
                <div class="info-text">
                    <span class="info-label">Waktu Asia/Jakarta</span>
                    <span class="info-value">
                        <?= htmlspecialchars($now->format('d-m-Y H:i:s'), ENT_QUOTES, 'UTF-8') ?>
                    </span>
                </div>
            </div>

            <a href="index.php" class="button">
                ← Kembali ke Beranda
            </a>

        </section>
    </main>

    <footer class="footer">
        &copy; <?= date('Y') ?> <span>KursusKu</span>.
        Belajar Teknologi, Bangun Masa Depan.
    </footer>

</body>

</html>