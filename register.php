<?php

declare(strict_types=1);

require __DIR__ . '/data.php';
require __DIR__ . '/helpers.php';

?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Kursus - KursusKu</title>

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
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background);
            color: var(--text);
            min-height: 100vh;
            line-height: 1.6;
        }

        /* NAVBAR */

        .navbar {
            background: var(--navy);
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        }

        .nav-inner {
            width: min(1120px, calc(100% - 40px));
            min-height: 72px;
            margin: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 25px;
        }

        .logo {
            color: #ffffff;
            font-size: 25px;
            font-weight: 800;
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .logo span {
            color: var(--cyan);
        }

        .nav-menu {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 25px;
        }

        .nav-menu a {
            color: #cbd5e1;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: 0.2s;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: var(--cyan);
        }

        /* LAYOUT */

        .container {
            width: min(1000px, calc(100% - 40px));
            margin: 0 auto;
        }

        .page-header {
            padding: 42px 0 25px;
        }

        .eyebrow {
            display: inline-block;
            background: var(--cyan-soft);
            color: var(--blue-dark);
            padding: 7px 13px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.5px;
            margin-bottom: 14px;
        }

        h1 {
            color: var(--navy);
            font-size: 32px;
            line-height: 1.3;
            margin-bottom: 10px;
        }

        .page-description {
            color: var(--muted);
            font-size: 14px;
            max-width: 700px;
        }

        /* FORM CARD */

        .form-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 30px;
            margin-bottom: 35px;
            box-shadow: 0 8px 25px rgba(15, 23, 42, 0.05);
        }

        .form-section {
            margin-bottom: 27px;
        }

        .section-title {
            font-size: 17px;
            font-weight: 800;
            color: var(--navy);
            margin-bottom: 17px;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--border);
        }

        .section-description {
            color: var(--muted);
            font-size: 13px;
            margin-top: 4px;
            font-weight: 400;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
        }

        .field {
            min-width: 0;
            margin-bottom: 20px;
            border: none;
        }

        .field>label,
        .field>legend {
            display: block;
            color: #334155;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        input[type="text"],
        input[type="email"],
        select,
        textarea {
            width: 100%;
            border: 1px solid #cbd5e1;
            background: #ffffff;
            color: var(--text);
            border-radius: 9px;
            padding: 12px 14px;
            font-family: inherit;
            font-size: 14px;
            outline: none;
            transition: 0.2s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        select:focus,
        textarea:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.12);
        }

        input::placeholder,
        textarea::placeholder {
            color: #94a3b8;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        /* PILIHAN PESERTA DAN MINAT */

        .choice-row {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .choice-row label {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            background: #f8fafc;
            border: 1px solid var(--border);
            border-radius: 9px;
            padding: 11px 14px;
            font-size: 13px;
            color: #334155;
            cursor: pointer;
            transition: 0.2s;
        }

        .choice-row label:hover {
            background: #f0f9ff;
            border-color: #7dd3fc;
        }

        .choice-row input {
            accent-color: var(--blue);
            cursor: pointer;
        }

        /* BUTTONS */

        .button-row {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 25px;
            padding-top: 22px;
            border-top: 1px solid var(--border);
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            padding: 11px 19px;
            background: var(--blue);
            color: #ffffff;
            border: 1px solid var(--blue);
            border-radius: 9px;
            text-decoration: none;
            font-family: inherit;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.2s;
        }

        .button:hover {
            background: var(--blue-dark);
            border-color: var(--blue-dark);
            transform: translateY(-1px);
        }

        .button-secondary {
            background: #ffffff;
            color: var(--blue-dark);
            border-color: #bae6fd;
        }

        .button-secondary:hover {
            background: var(--cyan-soft);
            color: var(--blue-dark);
            border-color: #7dd3fc;
        }

        /* FACILITIES */

        .formula-box {
            background: #f8fbff;
            border: 1px solid #dbeafe;
            border-radius: 11px;
            padding: 20px;
            margin-top: 27px;
        }

        .formula-box strong {
            display: block;
            color: var(--navy);
            font-size: 14px;
            margin-bottom: 12px;
        }

        .formula-box ul {
            list-style: none;
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 10px;
        }

        .formula-box li {
            color: #475569;
            font-size: 13px;
            padding-left: 23px;
            position: relative;
        }

        .formula-box li::before {
            content: "✓";
            position: absolute;
            left: 0;
            color: var(--blue);
            font-weight: 800;
        }

        /* FOOTER */

        footer {
            background: var(--navy);
            color: #94a3b8;
            text-align: center;
            padding: 22px 20px;
            font-size: 12px;
        }

        footer span {
            color: var(--cyan);
            font-weight: 700;
        }

        /* RESPONSIVE */

        @media (max-width: 700px) {
            .nav-inner {
                padding: 17px 0;
                align-items: flex-start;
                flex-direction: column;
                gap: 14px;
            }

            .nav-menu {
                gap: 15px;
            }

            .container {
                width: min(100% - 28px, 1000px);
            }

            .page-header {
                padding-top: 30px;
            }

            h1 {
                font-size: 27px;
            }

            .form-card {
                padding: 21px 17px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 0;
            }

            .formula-box ul {
                grid-template-columns: 1fr;
            }

            .button-row {
                flex-direction: column;
            }

            .button {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->

    <header class="navbar">
        <div class="nav-inner">

            <a href="index.php" class="logo">
                Kursus<span>Ku</span>
            </a>

            <nav class="nav-menu">
                <a href="index.php">Beranda</a>
                <a href="index.php#katalog">Katalog</a>
                <a href="registration.php" class="active">Daftar</a>
                <a href="fee-calculator.php">Fee Calculator</a>
                <a href="history.php">History</a>
            </nav>

        </div>
    </header>


    <!-- FORM PENDAFTARAN -->

    <main class="container">

        <section class="page-header">

            <span class="eyebrow">
                MILESTONE 6 · FORM LANJUTAN
            </span>

            <h1>Daftar Kursus</h1>

            <p class="page-description">
                Lengkapi formulir berikut untuk mendaftar kursus di KursusKu.
                Alur pendaftaran: landing page → formulir → proses PHP → ringkasan.
                Data belum disimpan ke database.
            </p>

        </section>


        <main class="form-card">

            <form method="POST" action="process.php" class="stack-form">

                <!-- DATA PESERTA -->

                <section class="form-section">

                    <h2 class="section-title">
                        Data Peserta
                        <p class="section-description">
                            Masukkan informasi diri dengan benar.
                        </p>
                    </h2>

                    <div class="form-grid">

                        <div class="field">
                            <label for="name">Nama lengkap</label>
                            <input
                                id="name"
                                name="name"
                                type="text"
                                placeholder="Masukkan nama lengkap"
                                required
                                minlength="3"
                                maxlength="80">
                        </div>

                        <div class="field">
                            <label for="email">Email</label>
                            <input
                                id="email"
                                name="email"
                                type="email"
                                placeholder="contoh@email.com"
                                required
                                maxlength="120">
                        </div>

                    </div>

                </section>


                <!-- PILIHAN KURSUS -->

                <section class="form-section">

                    <h2 class="section-title">
                        Pilihan Kursus
                        <p class="section-description">
                            Pilih program kursus dan jumlah paket yang diinginkan.
                        </p>
                    </h2>

                    <div class="field">

                        <label for="course_code">Pilih kursus</label>

                        <select id="course_code" name="course_code" required>
                            <option value="">-- Pilih kursus --</option>

                            <?php foreach ($courses as $course): ?>
                                <option value="<?= e($course['code']) ?>">
                                    <?= e($course['name']) ?>
                                    - <?= formatRupiah($course['fee']) ?>
                                </option>
                            <?php endforeach; ?>

                        </select>

                    </div>

                    <div class="field">

                        <label for="package_count">Jumlah paket</label>

                        <select id="package_count" name="package_count" required>
                            <?php for ($i = 1; $i <= 3; $i++): ?>
                                <option value="<?= $i ?>">
                                    <?= $i ?> paket
                                </option>
                            <?php endfor; ?>
                        </select>

                    </div>

                </section>


                <!-- TIPE PESERTA -->

                <section class="form-section">

                    <fieldset class="field">

                        <legend>Tipe peserta</legend>

                        <div class="choice-row">

                            <label>
                                <input
                                    type="radio"
                                    name="participant_type"
                                    value="mahasiswa"
                                    required>
                                Mahasiswa
                            </label>

                            <label>
                                <input
                                    type="radio"
                                    name="participant_type"
                                    value="guru">
                                Guru
                            </label>

                            <label>
                                <input
                                    type="radio"
                                    name="participant_type"
                                    value="umum">
                                Umum
                            </label>

                        </div>

                    </fieldset>

                </section>


                <!-- MINAT BELAJAR -->

                <section class="form-section">

                    <fieldset class="field">

                        <legend>Minat belajar</legend>

                        <div class="choice-row">

                            <?php foreach ($interestOptions as $value => $label): ?>

                                <label>
                                    <input
                                        type="checkbox"
                                        name="interests[]"
                                        value="<?= e($value) ?>">

                                    <?= e($label) ?>
                                </label>

                            <?php endforeach; ?>

                        </div>

                    </fieldset>

                </section>


                <!-- METODE BELAJAR -->

                <section class="form-section">

                    <h2 class="section-title">
                        Metode Pembelajaran
                        <p class="section-description">
                            Tentukan metode belajar yang sesuai.
                        </p>
                    </h2>

                    <div class="field">

                        <label for="learning_mode">Metode belajar</label>

                        <select
                            id="learning_mode"
                            name="learning_mode"
                            required>

                            <option value="">-- Pilih metode --</option>
                            <option value="offline">Tatap muka</option>
                            <option value="online">Online</option>
                            <option value="hybrid">Hybrid</option>

                        </select>

                    </div>

                </section>


                <!-- CATATAN -->

                <section class="form-section">

                    <h2 class="section-title">
                        Catatan Tambahan
                        <p class="section-description">
                            Sampaikan kebutuhan atau pertanyaan jika ada.
                        </p>
                    </h2>

                    <div class="field">

                        <label for="notes">Catatan tambahan</label>

                        <textarea
                            id="notes"
                            name="notes"
                            rows="4"
                            maxlength="300"
                            placeholder="Tuliskan catatan jika diperlukan..."></textarea>

                    </div>

                </section>


                <!-- TOMBOL -->

                <div class="button-row">

                    <button class="button" type="submit">
                        Proses Pendaftaran
                    </button>

                    <a class="button button-secondary" href="history-dummy.php">
                        History Dummy
                    </a>

                    <a class="button button-secondary" href="loop-lab.php">
                        Loop Lab
                    </a>

                </div>

            </form>


            <!-- FASILITAS -->


            <section class="formula-box">

                <strong>Fasilitas yang Didapatkan</strong>

                <ul>
                    <?php
                    if (isset($facilities) && is_array($facilities) && !empty($facilities)):
                        foreach ($facilities as $facility):
                    ?>
                            <li><?= e($facility) ?></li>
                        <?php
                        endforeach;
                    else:
                        ?>
                        <li>Fasilitas belum tersedia.</li>
                    <?php endif; ?>
                </ul>

            </section>
        </main>


        <!-- FOOTER -->

        <footer>
            © <?= date('Y') ?> <span>KursusKu</span>.
            Belajar Teknologi, Bangun Masa Depan.
        </footer>

</body>

</html>