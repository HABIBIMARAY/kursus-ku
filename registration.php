<?php

declare(strict_types=1);

function rupiahRegistration(int|float $nominal): string
{
    return 'Rp ' . number_format($nominal, 0, ',', '.');
}

function eRegistration(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$siteName = 'KursusKu';
$year = date('Y');

$courses = [
    [
        'code' => 'WEB-01',
        'name' => 'Web Dasar',
        'price' => 300000,
        'discount' => 20,
    ],
    [
        'code' => 'PHP-01',
        'name' => 'PHP Dasar',
        'price' => 400000,
        'discount' => 15,
    ],
    [
        'code' => 'LARAVEL-01',
        'name' => 'Laravel Dasar',
        'price' => 500000,
        'discount' => 0,
    ],
];

$facilities = [
    'Modul digital',
    'Sertifikat penyelesaian',
    'Forum diskusi kelas',
];

?>
<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        Daftar Kursus - <?= eRegistration($siteName); ?>
    </title>


    <style>
        /* =====================================================
           KURSUSKU - REGISTRATION PAGE
           CSS KHUSUS registration.php
           TIDAK MEMPENGARUHI index.php
        ===================================================== */


        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        :root {

            --navy: #0f172a;

            --navy-soft: #17233d;

            --blue: #0284c7;

            --blue-dark: #0369a1;

            --cyan: #38bdf8;

            --cyan-soft: #e0f2fe;

            --background: #f3f8fc;

            --white: #ffffff;

            --text: #24344d;

            --text-soft: #475569;

            --muted: #64748b;

            --border: #d7e2ea;

            --border-soft: #e7eef4;

            --success: #0f766e;

        }


        html {
            scroll-behavior: smooth;
        }


        body {

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background:
                linear-gradient(135deg,
                    #f4f9fd 0%,
                    #edf7fc 50%,
                    #f7fbfd 100%);

            color:
                var(--text);

            line-height:
                1.6;

            min-height:
                100vh;
        }


        a {
            text-decoration: none;
        }


        button,
        input,
        select,
        textarea {
            font-family: inherit;
        }


        /* =====================================================
           CONTAINER
        ===================================================== */

        .container {

            width:
                min(1000px,
                    calc(100% - 40px));

            margin:
                0 auto;
        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .navbar {

            background:
                var(--navy);

            border-bottom:
                1px solid rgba(255, 255, 255, 0.08);

            box-shadow:
                0 5px 20px rgba(15, 23, 42, 0.12);

            position:
                sticky;

            top:
                0;

            z-index:
                100;
        }


        .nav-inner {

            min-height:
                70px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            gap:
                25px;
        }


        .logo {

            color:
                #ffffff;

            font-size:
                24px;

            font-weight:
                800;

            letter-spacing:
                -0.5px;
        }


        .logo span {

            color:
                var(--cyan);
        }


        .nav-menu {

            display:
                flex;

            align-items:
                center;

            gap:
                28px;
        }


        .nav-menu a {

            color:
                #cbd5e1;

            font-size:
                14px;

            font-weight:
                500;

            padding:
                8px 0;

            position:
                relative;

            transition:
                0.25s;
        }


        .nav-menu a:hover {

            color:
                #ffffff;
        }


        .nav-menu a::after {

            content:
                "";

            position:
                absolute;

            left:
                0;

            bottom:
                0;

            width:
                0;

            height:
                2px;

            background:
                var(--cyan);

            border-radius:
                10px;

            transition:
                0.25s;
        }


        .nav-menu a:hover::after,
        .nav-menu a.active::after {

            width:
                100%;
        }


        .nav-menu a.active {

            color:
                #ffffff;

            font-weight:
                700;
        }


        /* =====================================================
           PAGE HEADER
        ===================================================== */

        .page-header {

            text-align:
                center;

            padding:
                55px 10px 30px;
        }


        .eyebrow {

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            background:
                var(--cyan-soft);

            color:
                var(--blue-dark);

            border:
                1px solid #bae6fd;

            padding:
                7px 15px;

            border-radius:
                999px;

            font-size:
                11px;

            font-weight:
                800;

            letter-spacing:
                0.7px;

            margin-bottom:
                13px;
        }


        .page-header h1 {

            color:
                var(--navy-soft);

            font-size:
                clamp(30px,
                    4vw,
                    40px);

            line-height:
                1.2;

            margin-bottom:
                10px;

            letter-spacing:
                -0.5px;
        }


        .page-header>p:last-child {

            color:
                var(--muted);

            font-size:
                15px;

            max-width:
                620px;

            margin:
                0 auto;
        }


        /* =====================================================
           FORM CARD
        ===================================================== */

        .form-card {

            width:
                100%;

            max-width:
                850px;

            margin:
                0 auto 65px;

            background:
                rgba(255, 255, 255, 0.98);

            border:
                1px solid var(--border-soft);

            border-radius:
                20px;

            padding:
                35px;

            box-shadow:
                0 18px 50px rgba(15, 23, 42, 0.08);

            position:
                relative;

            overflow:
                hidden;
        }


        .form-card::before {

            content:
                "";

            position:
                absolute;

            left:
                0;

            right:
                0;

            top:
                0;

            height:
                4px;

            background:
                linear-gradient(90deg,
                    var(--blue-dark),
                    var(--blue),
                    var(--cyan));
        }


        /* =====================================================
           FORM SECTION
        ===================================================== */

        .form-section {

            padding:
                25px 0;

            border-bottom:
                1px solid var(--border-soft);
        }


        .form-section:first-child {

            padding-top:
                5px;
        }


        .form-section:last-of-type {

            border-bottom:
                none;

            padding-bottom:
                10px;
        }


        .section-title {

            margin-bottom:
                20px;
        }


        .section-title h2 {

            color:
                var(--navy-soft);

            font-size:
                18px;

            font-weight:
                750;

            margin-bottom:
                4px;
        }


        .section-title h2::before {

            content:
                "";

            display:
                inline-block;

            width:
                4px;

            height:
                18px;

            background:
                var(--blue);

            border-radius:
                5px;

            margin-right:
                9px;

            vertical-align:
                -3px;
        }


        .section-title p {

            color:
                var(--muted);

            font-size:
                13px;

            margin-left:
                13px;
        }


        /* =====================================================
           FORM GROUP
        ===================================================== */

        .form-group {

            margin-bottom:
                20px;
        }


        .form-group:last-child {

            margin-bottom:
                0;
        }


        .form-group label {

            display:
                block;

            color:
                #334155;

            font-size:
                13px;

            font-weight:
                700;

            margin-bottom:
                8px;
        }


        .form-group label span {

            color:
                #dc2626;

            margin-left:
                2px;
        }


        /* =====================================================
           INPUT / SELECT / TEXTAREA
        ===================================================== */

        input[type="text"],
        input[type="email"],
        input[type="number"],
        select,
        textarea {

            width:
                100%;

            border:
                1px solid var(--border);

            background:
                #ffffff;

            color:
                #1e293b;

            border-radius:
                10px;

            padding:
                13px 14px;

            font-size:
                14px;

            outline:
                none;

            transition:
                0.25s;

            box-shadow:
                0 1px 2px rgba(15, 23, 42, 0.02);
        }


        input[type="text"]:hover,
        input[type="email"]:hover,
        input[type="number"]:hover,
        select:hover,
        textarea:hover {

            border-color:
                #a8c7d9;
        }


        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="number"]:focus,
        select:focus,
        textarea:focus {

            border-color:
                var(--blue);

            box-shadow:
                0 0 0 4px rgba(2, 132, 199, 0.10);
        }


        input::placeholder,
        textarea::placeholder {

            color:
                #94a3b8;
        }


        select {

            cursor:
                pointer;

            appearance:
                auto;
        }


        textarea {

            min-height:
                115px;

            resize:
                vertical;

            line-height:
                1.5;
        }


        /* =====================================================
           GRID DATA
        ===================================================== */

        .form-section:first-child {

            display:
                grid;

            grid-template-columns:
                1fr 1fr;

            column-gap:
                20px;
        }


        .form-section:first-child .section-title {

            grid-column:
                1 / -1;
        }


        .form-section:first-child .form-group {

            margin-bottom:
                0;
        }


        /* =====================================================
           PRICE PREVIEW
        ===================================================== */

        .price-preview {

            display:
                grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap:
                12px;

            margin-top:
                15px;
        }


        .price-preview>div {

            background:
                linear-gradient(145deg,
                    #f5fbff,
                    #eef8fd);

            border:
                1px solid #d8edf7;

            border-radius:
                12px;

            padding:
                15px;

            min-height:
                78px;

            display:
                flex;

            flex-direction:
                column;

            justify-content:
                center;
        }


        .price-preview span {

            color:
                var(--muted);

            font-size:
                11px;

            margin-bottom:
                5px;
        }


        .price-preview strong {

            color:
                var(--blue-dark);

            font-size:
                17px;

            font-weight:
                800;
        }


        /* =====================================================
           RADIO & CHECKBOX
        ===================================================== */

        .radio-group,
        .checkbox-group {

            display:
                grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap:
                12px;
        }


        .checkbox-group {

            grid-template-columns:
                repeat(4, 1fr);
        }


        .radio-card,
        .checkbox-card {

            display:
                flex;

            align-items:
                center;

            gap:
                10px;

            min-height:
                50px;

            padding:
                12px 14px;

            background:
                #f8fafc;

            border:
                1px solid var(--border);

            border-radius:
                10px;

            cursor:
                pointer;

            color:
                #475569;

            font-size:
                13px;

            font-weight:
                600;

            transition:
                0.2s;
        }


        .radio-card:hover,
        .checkbox-card:hover {

            background:
                #eff9ff;

            border-color:
                #8dd8f7;

            color:
                var(--blue-dark);

            transform:
                translateY(-1px);
        }


        .radio-card input,
        .checkbox-card input {

            width:
                17px;

            height:
                17px;

            margin:
                0;

            accent-color:
                var(--blue);

            flex-shrink:
                0;

            cursor:
                pointer;
        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .form-actions {

            display:
                grid;

            grid-template-columns:
                1fr 1fr 1fr;

            gap:
                12px;

            padding-top:
                25px;
        }


        .btn {

            min-height:
                48px;

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            padding:
                11px 18px;

            border-radius:
                10px;

            font-size:
                13px;

            font-weight:
                750;

            cursor:
                pointer;

            transition:
                0.25s;

            border:
                1px solid transparent;
        }


        .btn:hover {

            transform:
                translateY(-2px);

            box-shadow:
                0 7px 16px rgba(15, 23, 42, 0.10);
        }


        .btn-primary {

            color:
                #ffffff;

            background:
                linear-gradient(135deg,
                    var(--blue-dark),
                    var(--blue));

            border-color:
                var(--blue);
        }


        .btn-primary:hover {

            background:
                linear-gradient(135deg,
                    #075985,
                    var(--blue-dark));
        }


        .btn-secondary {

            color:
                var(--blue-dark);

            background:
                #effaff;

            border-color:
                #8dd8f7;
        }


        .btn-secondary:hover {

            background:
                #dff5ff;

            border-color:
                var(--cyan);
        }


        .btn-outline {

            color:
                #475569;

            background:
                #ffffff;

            border-color:
                #cbd5e1;
        }


        .btn-outline:hover {

            color:
                var(--blue-dark);

            background:
                #f8fcff;

            border-color:
                #8dd8f7;
        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {

            background:
                var(--navy);

            border-top:
                1px solid rgba(255, 255, 255, 0.06);

            color:
                #94a3b8;

            padding:
                24px 0;

            text-align:
                center;
        }


        .footer p {

            font-size:
                12px;
        }


        .footer::before {

            content:
                "";

            display:
                block;

            width:
                50px;

            height:
                2px;

            background:
                var(--cyan);

            margin:
                0 auto 12px;

            border-radius:
                10px;
        }


        /* =====================================================
           RESPONSIVE TABLET
        ===================================================== */

        @media (max-width: 750px) {

            .container {

                width:
                    calc(100% - 30px);
            }


            .form-card {

                padding:
                    28px 25px;
            }


            .radio-group {

                grid-template-columns:
                    1fr 1fr;
            }


            .checkbox-group {

                grid-template-columns:
                    1fr 1fr;
            }


            .form-actions {

                grid-template-columns:
                    1fr 1fr;
            }


            .form-actions .btn-outline {

                grid-column:
                    1 / -1;
            }

        }


        /* =====================================================
           RESPONSIVE MOBILE
        ===================================================== */

        @media (max-width: 560px) {

            .container {

                width:
                    calc(100% - 24px);
            }


            .nav-inner {

                min-height:
                    auto;

                padding:
                    16px 0;

                flex-direction:
                    column;

                gap:
                    10px;
            }


            .nav-menu {

                gap:
                    20px;
            }


            .nav-menu a {

                font-size:
                    13px;
            }


            .page-header {

                padding:
                    40px 5px 25px;
            }


            .page-header h1 {

                font-size:
                    29px;
            }


            .page-header>p:last-child {

                font-size:
                    13px;
            }


            .form-card {

                border-radius:
                    16px;

                padding:
                    23px 18px;

                margin-bottom:
                    45px;
            }


            .form-section:first-child {

                display:
                    block;
            }


            .form-section:first-child .form-group {

                margin-bottom:
                    20px;
            }


            .price-preview {

                grid-template-columns:
                    1fr;
            }


            .price-preview>div {

                min-height:
                    65px;
            }


            .radio-group,
            .checkbox-group {

                grid-template-columns:
                    1fr;
            }


            .radio-card,
            .checkbox-card {

                min-height:
                    47px;
            }


            .form-actions {

                grid-template-columns:
                    1fr;

                gap:
                    10px;
            }


            .form-actions .btn-outline {

                grid-column:
                    auto;
            }


            .btn {

                width:
                    100%;
            }

        }


        /* =====================================================
           HP SANGAT KECIL
        ===================================================== */

        @media (max-width: 380px) {

            .nav-menu {

                gap:
                    14px;
            }


            .nav-menu a {

                font-size:
                    12px;
            }


            .form-card {

                padding:
                    20px 15px;
            }


            .section-title h2 {

                font-size:
                    16px;
            }

        }
    </style>

</head>


<body>


    <!-- =====================================================
         NAVBAR
    ===================================================== -->

    <header class="navbar">

        <div class="container nav-inner">

            <a
                href="index.php"
                class="logo">

                Kursus<span>Ku</span>

            </a>


            <nav class="nav-menu">

                <a href="index.php">
                    Beranda
                </a>

                <a href="index.php#katalog">
                    Katalog
                </a>

                <a
                    href="registration.php"
                    class="active">
                    Daftar
                </a>

            </nav>

        </div>

    </header>



    <!-- =====================================================
         MAIN
    ===================================================== -->

    <main class="container">


        <!-- PAGE HEADER -->

        <section class="page-header">

            <p class="eyebrow">
                PENDAFTARAN KURSUS
            </p>


            <h1>
                Daftar Kursus
            </h1>


            <p>
                Isi data pendaftaran untuk mulai belajar
                bersama KursusKu.
            </p>

        </section>



        <!-- =================================================
             FORM
        ================================================= -->

        <section class="form-card">


            <form
                action="process-registration.php"
                method="POST">


                <!-- =================================================
                     DATA PESERTA
                ================================================= -->

                <div class="form-section">


                    <div class="section-title">

                        <h2>
                            Data Peserta
                        </h2>

                        <p>
                            Masukkan informasi dasar peserta.
                        </p>

                    </div>



                    <!-- NAMA -->

                    <div class="form-group">

                        <label for="name">

                            Nama Lengkap
                            <span>*</span>

                        </label>


                        <input
                            type="text"
                            id="name"
                            name="name"
                            placeholder="Masukkan nama lengkap"
                            required>

                    </div>



                    <!-- EMAIL -->

                    <div class="form-group">

                        <label for="email">

                            Email
                            <span>*</span>

                        </label>


                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="contoh@email.com"
                            required>

                    </div>

                </div>



                <!-- =================================================
                     PILIHAN KURSUS
                ================================================= -->

                <div class="form-section">


                    <div class="section-title">

                        <h2>
                            Pilihan Kursus
                        </h2>

                        <p>
                            Pilih kursus yang ingin diikuti.
                        </p>

                    </div>



                    <!-- KURSUS -->

                    <div class="form-group">

                        <label for="course">

                            Pilih Kursus
                            <span>*</span>

                        </label>


                        <select
                            id="course"
                            name="course"
                            required>


                            <option value="">
                                -- Pilih Kursus --
                            </option>


                            <?php foreach ($courses as $course): ?>

                                <option
                                    value="<?= eRegistration($course['code']); ?>"
                                    data-price="<?= $course['price']; ?>"
                                    data-discount="<?= $course['discount']; ?>">

                                    <?= eRegistration($course['name']); ?>

                                    -

                                    <?= rupiahRegistration($course['price']); ?>

                                </option>

                            <?php endforeach; ?>


                        </select>

                    </div>



                    <!-- JUMLAH PAKET -->

                    <div class="form-group">

                        <label for="quantity">

                            Jumlah Paket
                            <span>*</span>

                        </label>


                        <input
                            type="number"
                            id="quantity"
                            name="quantity"
                            min="1"
                            max="10"
                            value="1"
                            required>

                    </div>



                    <!-- PREVIEW -->

                    <div
                        class="price-preview"
                        id="pricePreview">


                        <div>

                            <span>
                                Harga satuan
                            </span>

                            <strong id="previewUnit">
                                Rp 0
                            </strong>

                        </div>


                        <div>

                            <span>
                                Jumlah paket
                            </span>

                            <strong id="previewQuantity">
                                1
                            </strong>

                        </div>


                        <div>

                            <span>
                                Total perkiraan
                            </span>

                            <strong id="previewTotal">
                                Rp 0
                            </strong>

                        </div>


                    </div>

                </div>



                <!-- =================================================
                     TIPE PESERTA
                ================================================= -->

                <div class="form-section">


                    <div class="section-title">

                        <h2>
                            Tipe Peserta
                        </h2>

                        <p>
                            Pilih tipe peserta.
                        </p>

                    </div>


                    <div class="radio-group">


                        <label class="radio-card">

                            <input
                                type="radio"
                                name="participant_type"
                                value="Mahasiswa"
                                checked>

                            <span>
                                Mahasiswa
                            </span>

                        </label>



                        <label class="radio-card">

                            <input
                                type="radio"
                                name="participant_type"
                                value="Umum">

                            <span>
                                Umum
                            </span>

                        </label>



                        <label class="radio-card">

                            <input
                                type="radio"
                                name="participant_type"
                                value="Guru">

                            <span>
                                Guru
                            </span>

                        </label>


                    </div>

                </div>



                <!-- =================================================
                     METODE
                ================================================= -->

                <div class="form-section">


                    <div class="section-title">

                        <h2>
                            Metode Pembelajaran
                        </h2>

                        <p>
                            Pilih metode pembelajaran
                            yang diinginkan.
                        </p>

                    </div>


                    <div class="radio-group">


                        <label class="radio-card">

                            <input
                                type="radio"
                                name="method"
                                value="offline"
                                checked>

                            <span>
                                Tatap Muka
                            </span>

                        </label>



                        <label class="radio-card">

                            <input
                                type="radio"
                                name="method"
                                value="hybrid">

                            <span>
                                Hybrid
                            </span>

                        </label>


                    </div>

                </div>



                <!-- =================================================
                     MINAT
                ================================================= -->

                <div class="form-section">


                    <div class="section-title">

                        <h2>
                            Minat
                        </h2>

                        <p>
                            Pilih bidang yang diminati.
                        </p>

                    </div>


                    <div class="checkbox-group">


                        <label class="checkbox-card">

                            <input
                                type="checkbox"
                                name="interests[]"
                                value="UI/UX">

                            <span>
                                UI/UX
                            </span>

                        </label>



                        <label class="checkbox-card">

                            <input
                                type="checkbox"
                                name="interests[]"
                                value="Database">

                            <span>
                                Database
                            </span>

                        </label>



                        <label class="checkbox-card">

                            <input
                                type="checkbox"
                                name="interests[]"
                                value="Backend">

                            <span>
                                Backend
                            </span>

                        </label>



                        <label class="checkbox-card">

                            <input
                                type="checkbox"
                                name="interests[]"
                                value="Frontend">

                            <span>
                                Frontend
                            </span>

                        </label>


                    </div>

                </div>



                <!-- =================================================
                     CATATAN
                ================================================= -->

                <div class="form-section">


                    <div class="section-title">

                        <h2>
                            Catatan
                        </h2>

                        <p>
                            Tambahkan catatan jika diperlukan.
                        </p>

                    </div>


                    <div class="form-group">

                        <textarea
                            name="note"
                            id="note"
                            rows="4"
                            placeholder="Contoh: Fokus belajar PHP..."></textarea>

                    </div>

                </div>



                <!-- =================================================
                     FASILITAS
                ================================================= -->

                <input
                    type="hidden"
                    name="facilities"
                    value="default">



                <!-- =================================================
                     BUTTON
                ================================================= -->

                <div class="form-actions">


                    <button
                        type="submit"
                        class="btn btn-primary">

                        Kirim Pendaftaran

                    </button>



                    <a
                        href="process-registration.php"
                        class="btn btn-secondary">

                        Eksperimen GET

                    </a>



                    <a
                        href="index.php"
                        class="btn btn-outline">

                        Beranda

                    </a>


                </div>


            </form>


        </section>

    </main>



    <!-- =====================================================
         FOOTER
    ===================================================== -->

    <footer class="footer">

        <div class="container">

            <p>

                &copy;
                <?= eRegistration($year); ?>

                <?= eRegistration($siteName); ?>.

                Belajar Teknologi, Bangun Masa Depan.

            </p>

        </div>

    </footer>



    <!-- =====================================================
         JAVASCRIPT PREVIEW HARGA
    ===================================================== -->

    <script>
        const courseSelect =
            document.getElementById('course');


        const quantityInput =
            document.getElementById('quantity');


        const previewUnit =
            document.getElementById('previewUnit');


        const previewQuantity =
            document.getElementById('previewQuantity');


        const previewTotal =
            document.getElementById('previewTotal');



        function formatRupiah(number) {

            return new Intl.NumberFormat(
                'id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0
                }
            ).format(number);

        }



        function updatePricePreview() {

            const selected =
                courseSelect.options[
                    courseSelect.selectedIndex
                ];


            const price =
                Number(
                    selected.dataset.price || 0
                );


            let quantity =
                Number(
                    quantityInput.value || 1
                );


            if (quantity < 1) {

                quantity = 1;

            }


            if (quantity > 10) {

                quantity = 10;

            }


            quantityInput.value =
                quantity;


            const total =
                price * quantity;


            previewUnit.textContent =
                formatRupiah(price);


            previewQuantity.textContent =
                quantity;


            previewTotal.textContent =
                formatRupiah(total);

        }



        courseSelect.addEventListener(
            'change',
            updatePricePreview
        );


        quantityInput.addEventListener(
            'input',
            updatePricePreview
        );


        updatePricePreview();
    </script>


</body>

</html>