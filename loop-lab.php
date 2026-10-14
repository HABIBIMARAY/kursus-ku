<?php

declare(strict_types=1);

$courses = [
    'Web Dasar',
    'PHP Dasar',
    'Laravel Dasar'
];

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Loop Lab - KursusKu</title>

    <link rel="stylesheet" href="assets/css/style.css">

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
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: var(--background);
            color: var(--text);
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.6;
        }

        /* NAVBAR */

        .loop-header {
            background: var(--navy);
            padding: 0 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        }

        .loop-header-inner {
            width: min(1120px, 100%);
            min-height: 72px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 24px;
        }

        .loop-brand {
            color: var(--white);
            text-decoration: none;
            font-size: 25px;
            font-weight: 800;
            white-space: nowrap;
        }

        .loop-brand span {
            color: var(--cyan);
        }

        .loop-nav {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 24px;
        }

        .loop-nav a {
            color: #cbd5e1;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.2s;
        }

        .loop-nav a:hover,
        .loop-nav a.active {
            color: var(--cyan);
        }

        /* KONTEN UTAMA */

        .loop-page {
            width: min(1100px, calc(100% - 40px));
            margin: 0 auto;
            padding: 45px 0 55px;
        }

        /* HERO */

        .loop-hero {
            background: var(--white);
            padding: 32px;
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 7px 20px rgba(15, 23, 42, 0.04);
            margin-bottom: 28px;
        }

        .loop-badge {
            display: inline-block;
            padding: 7px 13px;
            border-radius: 30px;
            background: var(--cyan-soft);
            color: var(--blue-dark);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.5px;
        }

        .loop-hero h1 {
            margin: 13px 0 8px;
            color: var(--navy);
            font-size: 32px;
            line-height: 1.3;
        }

        .loop-hero p {
            margin: 0;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.8;
        }

        /* KARTU PERULANGAN */

        .loop-card {
            display: grid;
            grid-template-columns: 55px minmax(0, 1fr);
            gap: 22px;
            background: var(--white);
            padding: 26px;
            margin-bottom: 20px;
            border: 1px solid var(--border);
            border-radius: 15px;
            box-shadow: 0 7px 20px rgba(15, 23, 42, 0.04);
            transition: 0.2s ease;
        }

        .loop-card:hover {
            border-color: #bae6fd;
            box-shadow: 0 12px 25px rgba(15, 23, 42, 0.08);
            transform: translateY(-2px);
        }

        .loop-number {
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 11px;
            background: var(--cyan-soft);
            color: var(--blue-dark);
            font-size: 18px;
            font-weight: 800;
        }

        .loop-content h2 {
            margin: 0 0 8px;
            color: var(--navy);
            font-size: 21px;
        }

        .loop-description {
            margin: 0 0 18px;
            color: var(--muted);
            font-size: 14px;
            line-height: 1.7;
        }

        /* HASIL PERULANGAN */

        .loop-result {
            background: #f8fafc;
            border: 1px solid var(--border);
            border-left: 4px solid var(--blue);
            border-radius: 10px;
            padding: 20px;
        }

        .loop-result h3 {
            margin: 0 0 13px;
            color: var(--blue-dark);
            font-size: 15px;
        }

        .loop-result ol {
            margin: 0;
            padding-left: 25px;
        }

        .loop-result li {
            padding: 6px 0;
            color: var(--text);
            font-size: 14px;
        }

        .loop-result li::marker {
            color: var(--blue);
            font-weight: 700;
        }

        /* KESIMPULAN */

        .loop-conclusion {
            background: var(--white);
            border: 1px solid var(--border);
            border-left: 4px solid var(--cyan);
            border-radius: 13px;
            padding: 24px 26px;
            margin-top: 28px;
        }

        .loop-conclusion h2 {
            margin: 0 0 15px;
            color: var(--navy);
            font-size: 21px;
        }

        .loop-conclusion ul {
            margin: 0;
            padding-left: 23px;
        }

        .loop-conclusion li {
            margin-bottom: 9px;
            color: var(--text);
            font-size: 14px;
            line-height: 1.7;
        }

        .loop-conclusion li:last-child {
            margin-bottom: 0;
        }

        .loop-conclusion strong {
            color: var(--blue-dark);
        }

        /* TOMBOL */

        .loop-buttons {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 12px;
            margin-top: 28px;
            margin-bottom: 15px;
        }

        .loop-buttons a {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            min-height: 44px;
            padding: 12px 20px;
            border-radius: 9px;
            text-align: center;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            transition: 0.2s ease;
        }

        .loop-buttons a:hover {
            transform: translateY(-2px);
        }

        .loop-btn-primary {
            background: var(--blue);
            color: var(--white);
            border: 1px solid var(--blue);
        }

        .loop-btn-primary:hover {
            background: var(--blue-dark);
            border-color: var(--blue-dark);
        }

        .loop-btn-secondary {
            background: var(--white);
            color: var(--blue-dark);
            border: 1px solid #bae6fd;
        }

        .loop-btn-secondary:hover {
            background: var(--cyan-soft);
        }

        /* FOOTER */

        .loop-footer {
            background: var(--navy);
            text-align: center;
            padding: 22px 15px;
            color: #94a3b8;
            font-size: 12px;
        }

        .loop-footer span {
            color: var(--cyan);
            font-weight: 700;
        }

        /* RESPONSIVE */

        @media (max-width: 850px) {
            .loop-header-inner {
                padding: 17px 0;
                flex-direction: column;
                align-items: flex-start;
                gap: 14px;
            }

            .loop-nav {
                gap: 17px;
            }
        }

        @media (max-width: 600px) {
            .loop-page {
                width: calc(100% - 28px);
                padding-top: 30px;
            }

            .loop-hero {
                padding: 23px;
            }

            .loop-hero h1 {
                font-size: 27px;
            }

            .loop-card {
                grid-template-columns: 1fr;
                padding: 21px;
                gap: 15px;
            }

            .loop-conclusion {
                padding: 21px;
            }

            .loop-buttons {
                flex-direction: column;
            }

            .loop-buttons a {
                width: 100%;
            }

            .loop-nav {
                gap: 13px;
            }

            .loop-nav a {
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

    <!-- HEADER -->

    <header class="loop-header">

        <div class="loop-header-inner">

            <a href="index.php" class="loop-brand">
                Kursus<span>Ku</span>
            </a>

            <nav class="loop-nav">
                <a href="index.php">Beranda</a>
                <a href="index.php#katalog">Katalog</a>
                <a href="registration.php">Daftar</a>
                <a href="history.php">History</a>
                <a href="loop-lab.php" class="active">Loop Lab</a>
            </nav>

        </div>

    </header>

    <!-- KONTEN UTAMA -->

    <main class="loop-page">

        <!-- HERO -->

        <section class="loop-hero">

            <span class="loop-badge">
                MILESTONE 6 · LOOPING
            </span>

            <h1>Loop Lab</h1>

            <p>
                Perbandingan perulangan
                <strong>for</strong>,
                <strong>while</strong>,
                dan <strong>do-while</strong>.
                Pelajari bagaimana PHP mengulang perintah
                untuk menampilkan data kursus.
            </p>

        </section>

        <!-- FOR -->

        <section class="loop-card">

            <div class="loop-number">1</div>

            <div class="loop-content">

                <h2>Perulangan for</h2>

                <p class="loop-description">
                    Digunakan ketika jumlah pengulangan
                    sudah diketahui.
                </p>

                <div class="loop-result">

                    <h3>Hasil perulangan for</h3>

                    <ol>

                        <?php
                        for (
                            $i = 0;
                            $i < count($courses);
                            $i++
                        ):
                        ?>

                            <li>
                                <?= e($courses[$i]) ?>
                            </li>

                        <?php endfor; ?>

                    </ol>

                </div>

            </div>

        </section>

        <!-- WHILE -->

        <section class="loop-card">

            <div class="loop-number">2</div>

            <div class="loop-content">

                <h2>Perulangan while</h2>

                <p class="loop-description">
                    Perulangan berjalan selama kondisi
                    bernilai benar.
                </p>

                <div class="loop-result">

                    <h3>Hasil perulangan while</h3>

                    <ol>

                        <?php
                        $i = 0;

                        while ($i < count($courses)):
                        ?>

                            <li>
                                <?= e($courses[$i]) ?>
                            </li>

                        <?php
                            $i++;
                        endwhile;
                        ?>

                    </ol>

                </div>

            </div>

        </section>

        <!-- DO-WHILE -->

        <section class="loop-card">

            <div class="loop-number">3</div>

            <div class="loop-content">

                <h2>Perulangan do-while</h2>

                <p class="loop-description">
                    Blok kode dijalankan minimal satu kali
                    sebelum kondisi diperiksa.
                </p>

                <div class="loop-result">

                    <h3>Hasil perulangan do-while</h3>

                    <ol>

                        <?php
                        $i = 0;

                        if (count($courses) > 0) {

                            do {
                        ?>

                                <li>
                                    <?= e($courses[$i]) ?>
                                </li>

                        <?php
                                $i++;
                            } while ($i < count($courses));
                        }
                        ?>

                    </ol>

                </div>

            </div>

        </section>

        <!-- KESIMPULAN -->

        <section class="loop-conclusion">

            <h2>Kesimpulan</h2>

            <ul>

                <li>
                    <strong>for</strong>
                    cocok ketika jumlah perulangan
                    sudah diketahui.
                </li>

                <li>
                    <strong>while</strong>
                    mengecek kondisi sebelum
                    menjalankan perulangan.
                </li>

                <li>
                    <strong>do-while</strong>
                    menjalankan blok minimal satu kali
                    sebelum mengecek kondisi.
                </li>

            </ul>

        </section>

        <!-- TOMBOL NAVIGASI -->

        <div class="loop-buttons">

            <a
                href="registration.php"
                class="loop-btn-primary">
                Daftar Kursus
            </a>

            <a
                href="index.php"
                class="loop-btn-secondary">
                Kembali ke Beranda
            </a>

        </div>

    </main>

    <!-- FOOTER -->

    <footer class="loop-footer">

        <p>
            &copy; <?= date('Y') ?>
            <span>KursusKu</span>.
            Belajar Teknologi, Bangun Masa Depan.
        </p>

    </footer>

</body>

</html>