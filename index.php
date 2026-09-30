<?php $siteName = 'KursusKu';
$tagline = 'Belajar, daftar, dan kelola kursus dalam satu tempat.';
$year = date('Y'); ?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= htmlspecialchars($siteName) ?></title>
</head>

<body>
    <header>
        <nav aria-label="Navigasi utama"> <a href="index.php"><strong><?= htmlspecialchars($siteName) ?></strong></a>
            <a href="#keunggulan">Keunggulan</a>
            <a href="#katalog">Katalog</a>
            <a href="#alur">Cara Daftar</a>
            <a href="#kontak">Kontak</a>
        </nav>
    </header>
    <main>
        <section id="hero">
            <h1><?= htmlspecialchars($tagline) ?></h1>
            <p>Temukan kursus teknologi yang relevan untuk meningkatkan keterampilan Anda.</p> <a href="#katalog">Lihat Katalog Kursus</a>
        </section>
        <section id="keunggulan">
            <h2>Mengapa Memilih KursusKu?</h2>
            <article>
                <h3>Materi Terarah</h3>
                <p>Materi disusun bertahap dari dasar hingga praktik.</ p>
            </article>
            <article>
                <h3>Belajar dengan Proyek</h3>
                <p>Setiap tahap menghasilkan bagian nyata dari aplikasi.</p>
            </article>
            <article>
                <h3>Pendampingan Praktik</h3>
                <p>Mahasiswa belajar melalui demonstrasi, latihan, dan evaluasi.</p>
            </article>
        </section>
        <section id="katalog">
            <h2>Katalog Kursus</h2>
            <article>
                <h3>Web Dasar</h3>
                <p>Belajar struktur HTML dan dasar pengembangan web.</p>
                </ article>
                <article>
                    <h3>PHP Dasar</h3>
                    <p>Belajar variabel, operator, percabangan, looping, dan form.</p>
                </article>
                <article>
                    <h3>Laravel Dasar</h3>
                    <p>Mengenal framework, route, controller, view, dan database.</p>
                </article>
        </section>
        <section id="alur">
            <h2>Cara Mendaftar</h2>
            <ol>
                <li>Pilih kursus yang diminati.</li>
                <li>Isi form pendaftaran.</li>
                <li>Periksa kembali data.</li>
                <li>Kirim pendaftaran dan tunggu konfirmasi.</li>
            </ol>
        </section>
        <section id="media">
            <h2>Kenali Program Kami</h2> <img src="assets/img/lagikursus.png" alt="Mahasiswa sedang mengikuti kegiatan kursus komputer" width="640">
            <h3>Video Singkat</h3> <video controls width="640">
                <source src="assets/mp4/sandikagalih.mp4" type="video/mp4"> Browser Anda tidak mendukung video HTML5.
            </video>
            <p><a href="https://youtube.com/shorts/rzzS28Ec0Xw?si=WsToY2KUvaELA0Id" target="_blank" rel="noopener">Dokumentasi PHP</a></p>
        </section>
        <section id="kontak">
            <h2>Kontak</h2>
            <p>Email: habibimaray@gmail.com</p>
            <p>Alamat: Laboratorium Uin</p>
        </section>
    </main>
    <footer> <small>&copy; <?= $year ?> <?= htmlspecialchars($siteName) ?></small> </footer>
</body>

</html>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hasil Pengujian - KursusKu</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background: white;
            color: #111;
        }

        h1 {
            text-align: center;
            margin-bottom: 25px;
        }

        .table-container {
            border: 2px solid #222;
            padding: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
        }

        th,
        td {
            border: 2px solid #222;
            padding: 10px;
            font-size: 18px;
            vertical-align: top;
        }

        th {
            text-align: left;
            font-size: 20px;
        }

        .no {
            width: 4%;
            text-align: center;
        }

        .input {
            width: 57%;
        }

        .expected {
            width: 13%;
        }

        .actual {
            width: 13%;
        }

        .status {
            width: 13%;
        }

        .status-pass {
            color: #111;
            font-weight: normal;
        }
    </style>
</head>

<body>

    <h1>Hasil Pengujian Kalkulator KursusKu</h1>

    <div class="table-container">
        <table>
            <tr>
                <th class="no">No</th>
                <th class="input">Input</th>
                <th class="expected">Expected</th>
                <th class="actual">Actual</th>
                <th class="status">Status</th>
            </tr>

            <tr>
                <td class="no">1</td>
                <td>
                    Fee: 350.000, Peserta: 1, Diskon: 0%, Admin: 25.000
                </td>
                <td>375.000</td>
                <td>375.000</td>
                <td class="status-pass">PASS</td>
            </tr>

            <tr>
                <td class="no">2</td>
                <td>
                    Fee: 350.000, Peserta: 1, Diskon: 10%, Admin: 25.000
                </td>
                <td>340.000</td>
                <td>340.000</td>
                <td class="status-pass">PASS</td>
            </tr>

            <tr>
                <td class="no">3</td>
                <td>
                    Fee: 350.000, Peserta: 2, Diskon: 25%, Admin: 25.000
                </td>
                <td>550.000</td>
                <td>550.000</td>
                <td class="status-pass">PASS</td>
            </tr>

            <tr>
                <td class="no">4</td>
                <td>
                    Fee: 0, Peserta: 1, Diskon: 10%, Admin: 0
                </td>
                <td>0</td>
                <td>0</td>
                <td class="status-pass">PASS</td>
            </tr>

            <tr>
                <td class="no">5</td>
                <td>
                    Fee: 2.500.000, Peserta: 3, Diskon: 10%, Admin: 50.000
                </td>
                <td>6.800.000</td>
                <td>6.800.000</td>
                <td class="status-pass">PASS</td>
            </tr>

        </table>
    </div>

</body>

</html>

<?php
// Pastikan helpers.php berada di folder yang sama
require_once __DIR__ . '/helpers.php';

// Data simulasi status kursus: Penuh, Tersedia, dan batas kritis (hampir penuh / kosong)
$sampleCourses = [
    [
        'code' => 'LAR-01',
        'name' => 'Laravel Fundamental',
        'quota' => 25,
        'registered' => 25, // Kasus: Penuh
    ],
    [
        'code' => 'PHP-02',
        'name' => 'PHP Lanjutan',
        'quota' => 25,
        'registered' => 24, // Kasus: Hampir penuh (Tersedia)
    ],
    [
        'code' => 'WEB-01',
        'name' => 'Web Dasar',
        'quota' => 30,
        'registered' => 12, // Kasus: Tersedia
    ],
    [
        'code' => 'DB-01',
        'name' => 'MySQL Dasar',
        'quota' => 20,
        'registered' => 0,  // Kasus: Kosong (Tersedia)
    ],
];
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Evidence Status Kursus - KursusKu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            padding: 30px;
            color: #1e293b;
        }

        .container {
            max-width: 750px;
            margin: auto;
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-top: 0;
            color: #0f766e;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 16px;
        }

        th,
        td {
            border: 1px solid #e2e8f0;
            padding: 12px;
            text-align: left;
        }

        th {
            background: #f8fafc;
        }

        /* Class badge status sesuai panduan modul */
        .badge-available,
        .badge-full {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 0.85rem;
            font-weight: 700;
        }

        .badge-available {
            background: #e7f8ef;
            color: #146c43;
        }

        .badge-full {
            background: #fdeaea;
            color: #a61b1b;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Pemeriksaan Status Kursus & Sisa Kursi</h2>
        <p>Validasi pemanggilan fungsi <code>statusKursus()</code> dan <code>sisaKursi()</code> dari <code>helpers.php</code>:</p>

        <table>
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama Kursus</th>
                    <th>Kuota</th>
                    <th>Terdaftar</th>
                    <th>Sisa Kursi</th>
                    <th>Status Visual</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sampleCourses as $item): ?>
                    <?php
                    // Memanggil fungsi logika bisnis dari helpers.php
                    $status = statusKursus($item['quota'], $item['registered']);
                    $sisa = sisaKursi($item['quota'], $item['registered']);

                    // Menentukan class CSS berdasarkan hasil return function
                    $badgeClass = ($status === 'Penuh') ? 'badge-full' : 'badge-available';
                    ?>
                    <tr>
                        <td><?= htmlspecialchars($item['code']) ?></td>
                        <td><?= htmlspecialchars($item['name']) ?></td>
                        <td><?= $item['quota'] ?></td>
                        <td><?= $item['registered'] ?></td>
                        <td><?= $sisa ?> kursi</td>
                        <td>
                            <span class="<?= $badgeClass ?>">
                                <?= $status ?>
                            </span>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <link rel="stylesheet" href="assets/css/Gaya.css">
</body>



<?php

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$studyProgram = trim($_POST['study_program'] ?? '');
$course = $_POST['course'] ?? '';
$participantType = $_POST['participant_type'] ?? '';
$interests = $_POST['interests'] ?? [];
$note = trim($_POST['note'] ?? '');
$source = $_POST['source'] ?? '';

$interestText = implode(', ', $interests);

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

?>

<!doctype html>
<html lang="id">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Daftar Kursus - KursusKu</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Segoe UI", Arial, sans-serif;
            background: #f5f7fb;
            color: #1e293b;
        }

        .container {
            width: 92%;
            max-width: 1100px;
            margin: auto;
        }


        /* =========================
           NAVBAR
        ========================= */

        .site-header {
            background: #0f172a;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .nav-wrap {
            min-height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .brand {
            color: white;
            text-decoration: none;
            font-size: 24px;
            font-weight: 700;
        }

        nav {
            display: flex;
            gap: 30px;
        }

        nav a {
            color: #cbd5e1;
            text-decoration: none;
            font-size: 14px;
            transition: 0.3s;
        }

        nav a:hover {
            color: #38bdf8;
        }


        /* =========================
           INTRO
        ========================= */

        .page-intro {
            text-align: center;
            padding: 60px 20px 35px;
        }

        .eyebrow {
            display: inline-block;
            background: #e0f2fe;
            color: #0369a1;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .page-intro h1 {
            color: #0f172a;
            font-size: 36px;
            margin-bottom: 10px;
        }

        .page-intro p:last-child {
            color: #64748b;
            font-size: 15px;
        }


        /* =========================
           FORM CARD
        ========================= */

        .form-card {
            max-width: 850px;
            margin: auto;
            margin-bottom: 70px;
            padding: 38px;
            background: white;
            border-radius: 18px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.07);
        }


        /* =========================
           FORM GRID
        ========================= */

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label,
        legend {
            display: block;
            margin-bottom: 8px;
            color: #334155;
            font-size: 14px;
            font-weight: 600;
        }

        fieldset {
            border: none;
        }


        /* =========================
           INPUT
        ========================= */

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        select,
        textarea {

            width: 100%;
            padding: 12px 14px;

            border: 1px solid #cbd5e1;
            border-radius: 9px;

            background: white;
            color: #1e293b;

            font-family: inherit;
            font-size: 14px;

            outline: none;
            transition: 0.25s;
        }

        input:focus,
        select:focus,
        textarea:focus {

            border-color: #38bdf8;

            box-shadow:
                0 0 0 3px rgba(56, 189, 248, 0.12);
        }

        input::placeholder,
        textarea::placeholder {
            color: #94a3b8;
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }


        /* =========================
           RADIO & CHECKBOX
        ========================= */

        .choice {

            display: inline-flex !important;

            align-items: center;

            margin-right: 20px;
            margin-bottom: 8px;

            color: #475569 !important;

            font-size: 14px !important;
            font-weight: 400 !important;

            cursor: pointer;
        }

        .choice input {

            width: 16px;
            height: 16px;

            margin-right: 7px;

            accent-color: #0284c7;

            cursor: pointer;
        }


        /* =========================
           HELP TEXT
        ========================= */

        .help {

            display: block;

            margin-top: 6px;

            color: #94a3b8;

            font-size: 12px;
        }


        /* =========================
           KELOMPOK TOMBOL
        ========================= */

        .button-group {

            display: flex;

            align-items: center;

            gap: 12px;

            margin-top: 15px;
        }


        /* =========================
           SEMUA TOMBOL
        ========================= */

        .button-group .btn-primary,
        .button-group .btn-get,
        .button-group .btn-home {

            flex: 1;

            min-height: 52px;

            padding: 14px 20px;

            border-radius: 9px;

            font-family: inherit;

            font-size: 15px;

            font-weight: 600;

            text-align: center;

            text-decoration: none;

            display: flex;

            align-items: center;

            justify-content: center;

            cursor: pointer;

            transition: 0.3s;
        }


        /* =========================
           KIRIM PENDAFTARAN
        ========================= */

        .button-group .btn-primary {

            width: auto;

            border: 1px solid #0284c7;

            background: #0284c7;

            color: white;
        }

        .button-group .btn-primary:hover {

            background: #0369a1;

            border-color: #0369a1;

            transform: translateY(-2px);

            box-shadow:
                0 8px 20px rgba(2, 132, 199, 0.20);
        }


        /* =========================
           EKSPERIMEN GET
        ========================= */

        .button-group .btn-get {

            background: #0284c7;

            color: white;

            border: 1px solid #0284c7;
        }

        .button-group .btn-get:hover {

            background: #0369a1;

            border-color: #0369a1;

            transform: translateY(-2px);

            box-shadow:
                0 8px 20px rgba(2, 132, 199, 0.20);
        }


        /* =========================
           BERANDA
        ========================= */

        .button-group .btn-home {

            background: white;

            color: #475569;

            border: 1px solid #cbd5e1;
        }

        .button-group .btn-home:hover {

            background: #f1f5f9;

            border-color: #94a3b8;

            color: #0f172a;

            transform: translateY(-2px);
        }


        /* =========================
           RESPONSIVE TABLET
        ========================= */

        @media (max-width: 700px) {

            .form-grid {
                grid-template-columns: 1fr;
            }

            .form-card {
                padding: 28px;
            }

            .page-intro h1 {
                font-size: 30px;
            }

        }


        /* =========================
           RESPONSIVE HP
        ========================= */

        @media (max-width: 600px) {

            .button-group {

                flex-direction: column;

                gap: 10px;
            }

            .button-group .btn-primary,
            .button-group .btn-get,
            .button-group .btn-home {

                width: 100%;

                flex: none;
            }

        }


        @media (max-width: 500px) {

            .nav-wrap {

                flex-direction: column;

                gap: 10px;

                padding: 15px 0;
            }

            nav {
                gap: 18px;
            }

            .page-intro h1 {
                font-size: 27px;
            }

            .form-card {
                padding: 22px 18px;
            }

            .choice {

                display: flex !important;

                margin-bottom: 12px;
            }

        }
    </style>

</head>


<body>


    <!-- =========================
         NAVBAR
    ========================= -->




    <!-- =========================
         CONTENT
    ========================= -->

    <main class="container">


        <!-- INTRO -->

        <section class="page-intro">

            <p class="eyebrow">
                Pendaftaran Kursus
            </p>

            <h1>
                Mulai belajar bersama KursusKu
            </h1>

            <p>
                Silakan isi data pendaftaran dengan benar.
            </p>

        </section>


        <!-- FORM -->

        <section class="form-card">


            <form
                action="process-registration.php"
                method="POST">


                <!-- DATA DIRI -->

                <div class="form-grid">


                    <div class="form-group">

                        <label for="name">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Masukkan nama lengkap"
                            required>

                    </div>


                    <div class="form-group">

                        <label for="email">
                            Email
                        </label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="contoh@email.com"
                            required>

                    </div>


                    <div class="form-group">

                        <label for="phone">
                            Nomor HP
                        </label>

                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            placeholder="081234567890"
                            required>

                    </div>


                    <div class="form-group">

                        <label for="study_program">
                            Program Studi
                        </label>

                        <input
                            type="text"
                            id="study_program"
                            name="study_program"
                            placeholder="Masukkan program studi"
                            required>

                    </div>

                </div>


                <!-- KURSUS -->

                <div class="form-group">

                    <label for="course">
                        Kursus yang Dipilih
                    </label>

                    <select
                        id="course"
                        name="course"
                        required>

                        <option value="">
                            -- Pilih kursus --
                        </option>

                        <option value="Web Dasar">
                            Web Dasar
                        </option>

                        <option value="PHP Dasar">
                            PHP Dasar
                        </option>

                        <option value="Laravel Fundamental">
                            Laravel Fundamental
                        </option>

                    </select>

                </div>


                <!-- JENIS PESERTA -->

                <fieldset class="form-group">

                    <legend>
                        Jenis Peserta
                    </legend>


                    <label class="choice">

                        <input
                            type="radio"
                            name="participant_type"
                            value="Mahasiswa"
                            required>

                        Mahasiswa

                    </label>


                    <label class="choice">

                        <input
                            type="radio"
                            name="participant_type"
                            value="Umum">

                        Umum

                    </label>

                </fieldset>


                <!-- MINAT TAMBAHAN -->

                <fieldset class="form-group">

                    <legend>
                        Minat Tambahan
                    </legend>


                    <label class="choice">

                        <input
                            type="checkbox"
                            name="interests[]"
                            value="UI/UX">

                        UI/UX

                    </label>


                    <label class="choice">

                        <input
                            type="checkbox"
                            name="interests[]"
                            value="Database">

                        Database

                    </label>


                    <label class="choice">

                        <input
                            type="checkbox"
                            name="interests[]"
                            value="Backend">

                        Backend

                    </label>

                </fieldset>


                <!-- CATATAN -->

                <div class="form-group">

                    <label for="note">
                        Catatan
                    </label>

                    <textarea
                        id="note"
                        name="note"
                        maxlength="300"
                        placeholder="Tuliskan kebutuhan belajar Anda (opsional)"></textarea>


                    <small class="help">
                        Maksimal 300 karakter.
                    </small>

                </div>


                <!-- =========================
                     TIGA TOMBOL
                ========================= -->

                <div class="button-group">


                    <!-- KIRIM PENDAFTARAN -->

                    <button
                        type="submit"
                        class="btn-primary">

                        Kirim Pendaftaran

                    </button>


                    <!-- EKSPERIMEN GET -->

                    <a
                        href="process-registration.php?mode=get"
                        class="btn-get">

                        Eksperimen GET

                    </a>


                    <!-- BERANDA -->

                    <a
                        href="index.php"
                        class="btn-home">

                        Beranda

                    </a>


                </div>


            </form>

        </section>

    </main>



</body>

</html>
<?php

$nama = $_GET['nama'] ?? '-';
$email = $_GET['email'] ?? '-';
$no_hp = $_GET['no_hp'] ?? '-';
$program_studi = $_GET['program_studi'] ?? '-';
$kursus = $_GET['kursus'] ?? '-';
$jenis_peserta = $_GET['jenis_peserta'] ?? '-';
$minat = $_GET['minat'] ?? '-';
$catatan = $_GET['catatan'] ?? '-';

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hasil Pendaftaran - KursusKu</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f7fb;
            color: #24344d;
            padding: 70px 20px;
        }

        .container {
            max-width: 820px;
            margin: auto;
        }

        /* HEADER */
        .header {
            background: #ecfff6;
            border: 1px solid #a9ecd0;
            border-radius: 15px;
            padding: 28px 30px;
            margin-bottom: 25px;
        }

        .header h1 {
            color: #087f75;
            font-size: 26px;
            margin-bottom: 10px;
        }

        .header p {
            color: #40566f;
            font-size: 14px;
        }

        /* CARD */
        .card {
            background: #ffffff;
            border: 1px solid #e1e7ef;
            border-radius: 16px;
            padding: 35px;
            box-shadow: 0 8px 25px rgba(35, 55, 80, 0.05);
        }

        /* DATA */
        .data-row {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid #e1e7ef;
            font-size: 14px;
        }

        .label {
            width: 175px;
            color: #304967;
            font-weight: 500;
        }

        .value {
            flex: 1;
            color: #24344d;
        }

        /* BUTTON AREA */
        .buttons {
            display: flex;
            gap: 12px;
            margin-top: 28px;
        }

        .button {
            flex: 1;
            text-align: center;
            padding: 13px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
        }

        .primary {
            background: #128fc5;
            color: white;
        }

        .primary:hover {
            background: #087eb0;
        }

        .secondary {
            background: white;
            color: #304967;
            border: 1px solid #ccd7e3;
        }

        .secondary:hover {
            background: #f5f8fb;
        }

        /* RESPONSIVE */
        @media (max-width: 600px) {

            body {
                padding: 30px 15px;
            }

            .card {
                padding: 25px 20px;
            }

            .header {
                padding: 25px 20px;
            }

            .data-row {
                display: block;
            }

            .label {
                width: 100%;
                margin-bottom: 6px;
            }

            .buttons {
                flex-direction: column;
            }
        }
    </style>
</head>

<body>

    <div class="container">

        <!-- HEADER -->
        <div class="header">

            <h1>Pendaftaran Diterima untuk Diproses</h1>

            <p>
                Data pendaftaran Anda berhasil diterima.
            </p>

        </div>


        <!-- DATA -->
        <div class="card">

            <div class="data-row">
                <div class="label">Nama</div>
                <div class="value">
                    <?= htmlspecialchars($nama) ?>
                </div>
            </div>

            <div class="data-row">
                <div class="label">Email</div>
                <div class="value">
                    <?= htmlspecialchars($email) ?>
                </div>
            </div>

            <div class="data-row">
                <div class="label">Nomor HP</div>
                <div class="value">
                    <?= htmlspecialchars($no_hp) ?>
                </div>
            </div>

            <div class="data-row">
                <div class="label">Program Studi</div>
                <div class="value">
                    <?= htmlspecialchars($program_studi) ?>
                </div>
            </div>

            <div class="data-row">
                <div class="label">Kursus</div>
                <div class="value">
                    <?= htmlspecialchars($kursus) ?>
                </div>
            </div>

            <div class="data-row">
                <div class="label">Jenis Peserta</div>
                <div class="value">
                    <?= htmlspecialchars($jenis_peserta) ?>
                </div>
            </div>

            <div class="data-row">
                <div class="label">Minat Tambahan</div>
                <div class="value">
                    <?= htmlspecialchars($minat) ?>
                </div>
            </div>

            <div class="data-row">
                <div class="label">Catatan</div>
                <div class="value">
                    <?= htmlspecialchars($catatan) ?>
                </div>
            </div>


            <!-- BUTTON -->
            <div class="buttons">

                <a href="registration.php" class="button primary">
                    ← Kembali ke Form
                </a>

                <a href="index.php" class="button secondary">
                    ← Kembali ke Beranda
                </a>

            </div>

        </div>

    </div>

</body>

</html>