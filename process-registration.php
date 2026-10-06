<?php

declare(strict_types=1);

session_start();


/*
|--------------------------------------------------------------------------
| Jika halaman dibuka menggunakan GET
|--------------------------------------------------------------------------
*/

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    header('Location: registration.php');

    exit;
}


/*
|--------------------------------------------------------------------------
| Helper
|--------------------------------------------------------------------------
*/

function rupiahProcess(int|float $nominal): string
{
    return 'Rp ' . number_format(
        $nominal,
        0,
        ',',
        '.'
    );
}


function eProcess(string $value): string
{
    return htmlspecialchars(
        $value,
        ENT_QUOTES,
        'UTF-8'
    );
}


/*
|--------------------------------------------------------------------------
| Data Kursus
|--------------------------------------------------------------------------
*/

$courses = [

    'WEB-01' => [
        'name' => 'Web Dasar',
        'price' => 300000,
        'discount' => 20,
    ],

    'PHP-01' => [
        'name' => 'PHP Dasar',
        'price' => 400000,
        'discount' => 15,
    ],

    'LARAVEL-01' => [
        'name' => 'Laravel Dasar',
        'price' => 500000,
        'discount' => 0,
    ],

];


/*
|--------------------------------------------------------------------------
| Ambil Data Form
|--------------------------------------------------------------------------
*/

$name = trim(
    (string)($_POST['name'] ?? '')
);

$email = trim(
    (string)($_POST['email'] ?? '')
);

$courseCode = trim(
    (string)($_POST['course'] ?? '')
);

$quantity = (int)(
    $_POST['quantity'] ?? 1
);

$participantType = trim(
    (string)(
        $_POST['participant_type']
        ?? 'Mahasiswa'
    )
);

$method = trim(
    (string)(
        $_POST['method']
        ?? 'offline'
    )
);

$interests = $_POST['interests'] ?? [];

$note = trim(
    (string)($_POST['note'] ?? '')
);


/*
|--------------------------------------------------------------------------
| Validasi
|--------------------------------------------------------------------------
*/

$errors = [];


if ($name === '') {

    $errors[] = 'Nama wajib diisi.';
}


if (
    $email === ''
    ||
    !filter_var(
        $email,
        FILTER_VALIDATE_EMAIL
    )
) {

    $errors[] = 'Email tidak valid.';
}


if (!isset($courses[$courseCode])) {

    $errors[] = 'Kursus belum dipilih.';
}


if ($quantity < 1) {

    $quantity = 1;
}


if ($quantity > 10) {

    $quantity = 10;
}


/*
|--------------------------------------------------------------------------
| Jika Validasi Gagal
|--------------------------------------------------------------------------
*/

if (!empty($errors)) {

?>

    <!DOCTYPE html>

    <html lang="id">

    <head>

        <meta charset="UTF-8">

        <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0">

        <title>
            Pendaftaran Belum Berhasil - KursusKu
        </title>


        <style>
            /* =====================================================
           RESET
        ===================================================== */

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }


            /* =====================================================
           BODY
        ===================================================== */

            body {

                font-family:
                    Arial,
                    Helvetica,
                    sans-serif;

                min-height: 100vh;

                background:
                    linear-gradient(135deg,
                        #f3f8fc,
                        #eaf7ff);

                color:
                    #1e293b;

                display:
                    flex;

                align-items:
                    center;

                justify-content:
                    center;

                padding:
                    25px;
            }


            /* =====================================================
           ERROR CONTAINER
        ===================================================== */

            .error-container {

                width:
                    min(650px,
                        100%);
            }


            /* =====================================================
           ERROR CARD
        ===================================================== */

            .error-card {

                background:
                    #ffffff;

                border:
                    1px solid #dce6ef;

                border-radius:
                    18px;

                padding:
                    38px;

                box-shadow:
                    0 20px 50px rgba(15,
                        23,
                        42,
                        0.09);

                position:
                    relative;

                overflow:
                    hidden;
            }


            .error-card::before {

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
                        #0369a1,
                        #0284c7,
                        #38bdf8);
            }


            /* =====================================================
           EYEBROW
        ===================================================== */

            .eyebrow {

                display:
                    inline-block;

                padding:
                    6px 12px;

                border-radius:
                    999px;

                background:
                    #e0f2fe;

                color:
                    #0369a1;

                font-size:
                    11px;

                font-weight:
                    800;

                letter-spacing:
                    0.7px;

                margin-bottom:
                    15px;
            }


            /* =====================================================
           TITLE
        ===================================================== */

            h1 {

                color:
                    #0f172a;

                font-size:
                    29px;

                line-height:
                    1.25;

                margin-bottom:
                    10px;
            }


            .description {

                color:
                    #64748b;

                font-size:
                    14px;

                margin-bottom:
                    23px;
            }


            /* =====================================================
           ERROR ALERT
        ===================================================== */

            .alert-error {

                background:
                    #fff1f2;

                border:
                    1px solid #fecdd3;

                border-left:
                    4px solid #ef4444;

                border-radius:
                    10px;

                padding:
                    15px 17px;

                margin-bottom:
                    25px;
            }


            .alert-error p {

                color:
                    #b91c1c;

                font-size:
                    13px;

                margin-bottom:
                    5px;
            }


            .alert-error p:last-child {

                margin-bottom:
                    0;
            }


            /* =====================================================
           BUTTON
        ===================================================== */

            .form-actions {

                display:
                    grid;

                grid-template-columns:
                    1fr 1fr;

                gap:
                    12px;
            }


            .btn {

                min-height:
                    46px;

                display:
                    flex;

                align-items:
                    center;

                justify-content:
                    center;

                padding:
                    10px 16px;

                border-radius:
                    9px;

                font-size:
                    13px;

                font-weight:
                    700;

                text-decoration:
                    none;

                transition:
                    0.25s;
            }


            .btn:hover {

                transform:
                    translateY(-2px);
            }


            .btn-primary {

                background:
                    #0284c7;

                color:
                    #ffffff;

                border:
                    1px solid #0284c7;
            }


            .btn-primary:hover {

                background:
                    #0369a1;
            }


            .btn-outline {

                background:
                    #ffffff;

                color:
                    #475569;

                border:
                    1px solid #cbd5e1;
            }


            .btn-outline:hover {

                background:
                    #f8fafc;

                border-color:
                    #94a3b8;
            }


            /* =====================================================
           RESPONSIVE ERROR
        ===================================================== */

            @media (max-width: 600px) {

                .error-card {

                    padding:
                        27px 20px;
                }


                h1 {

                    font-size:
                        25px;
                }


                .form-actions {

                    grid-template-columns:
                        1fr;
                }

            }
        </style>

    </head>


    <body>

        <main class="error-container">

            <section class="error-card">

                <p class="eyebrow">
                    PENDAFTARAN
                </p>


                <h1>
                    Pendaftaran Belum Berhasil
                </h1>


                <p class="description">

                    Periksa kembali data yang kamu masukkan
                    sebelum mengirimkan pendaftaran.

                </p>


                <div class="alert-error">

                    <?php foreach ($errors as $error): ?>

                        <p>
                            <?= eProcess($error); ?>
                        </p>

                    <?php endforeach; ?>

                </div>


                <div class="form-actions">

                    <a
                        href="registration.php"
                        class="btn btn-primary">
                        Kembali ke Pendaftaran
                    </a>


                    <a
                        href="index.php"
                        class="btn btn-outline">
                        Beranda
                    </a>

                </div>

            </section>

        </main>

    </body>

    </html>

<?php

    exit;
}


/*
|--------------------------------------------------------------------------
| Data Kursus Terpilih
|--------------------------------------------------------------------------
*/

$selectedCourse =
    $courses[$courseCode];

$courseName =
    $selectedCourse['name'];

$unitPrice =
    $selectedCourse['price'];

$discountPercent =
    $selectedCourse['discount'];


/*
|--------------------------------------------------------------------------
| Perhitungan Biaya
|--------------------------------------------------------------------------
*/

$subtotal =
    $unitPrice * $quantity;

$discount =
    $subtotal *
    ($discountPercent / 100);

$adminFee = 0;

$total =
    $subtotal
    -
    $discount
    +
    $adminFee;


/*
|--------------------------------------------------------------------------
| Metode Pembelajaran
|--------------------------------------------------------------------------
*/

$methodLabel = '';

if ($method === 'offline') {

    $methodLabel = 'Tatap Muka';
} elseif ($method === 'hybrid') {

    $methodLabel = 'Hybrid';
} else {

    $methodLabel = 'Tatap Muka';
}


/*
|--------------------------------------------------------------------------
| Minat
|--------------------------------------------------------------------------
*/

if (!is_array($interests)) {

    $interests = [];
}


$interests =
    array_values(
        array_filter(
            array_map(
                'strval',
                $interests
            )
        )
    );


/*
|--------------------------------------------------------------------------
| Fasilitas
|--------------------------------------------------------------------------
*/

$facilities = [

    'Modul digital',

    'Sertifikat penyelesaian',

    'Forum diskusi kelas',

];


/*
|--------------------------------------------------------------------------
| SIMPAN DATA PENDAFTARAN KE HISTORY
|--------------------------------------------------------------------------
|
| Tambahan untuk halaman history-dummy.php
|
*/

if (!isset($_SESSION['history'])) {

    $_SESSION['history'] = [];
}


$_SESSION['history'][] = [

    'name' =>
    $name,

    'email' =>
    $email,

    'courseName' =>
    $courseName,

    'quantity' =>
    $quantity,

    'total' =>
    (int)$total,

];


$year = date('Y');

?>

<!DOCTYPE html>

<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        Hasil Pendaftaran - KursusKu
    </title>


    <!-- =====================================================
         CSS LANGSUNG DI DALAM PROCESS-REGISTRATION.PHP
    ====================================================== -->

    <style>
        /* =====================================================
           RESET
        ===================================================== */

        * {

            margin: 0;

            padding: 0;

            box-sizing: border-box;

        }


        /* =====================================================
           ROOT
        ===================================================== */

        :root {

            --navy: #0f172a;

            --blue: #0284c7;

            --blue-dark: #0369a1;

            --cyan: #38bdf8;

            --cyan-soft: #e0f2fe;

            --background: #f3f8fc;

            --white: #ffffff;

            --text: #1e293b;

            --text-soft: #475569;

            --muted: #64748b;

            --border: #dce6ef;

        }


        /* =====================================================
           BODY
        ===================================================== */

        body {

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background:
                linear-gradient(135deg,
                    #f3f8fc 0%,
                    #eaf7ff 50%,
                    #f7fbff 100%);

            color:
                var(--text);

            min-height:
                100vh;

            line-height:
                1.6;

        }


        a {

            text-decoration:
                none;

        }


        /* =====================================================
           CONTAINER
        ===================================================== */

        .container {

            width:
                min(850px,
                    calc(100% - 40px));

            margin:
                0 auto;

        }


        /* =====================================================
           NAVBAR
        ===================================================== */

        .navbar {

            background:
                rgba(15,
                    23,
                    42,
                    0.97);

            border-bottom:
                1px solid rgba(255,
                    255,
                    255,
                    0.08);

            box-shadow:
                0 7px 25px rgba(15,
                    23,
                    42,
                    0.12);

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
                white;

            font-size:
                25px;

            font-weight:
                800;

        }


        .logo span {

            color:
                var(--cyan);

        }


        .nav-menu {

            display:
                flex;

            gap:
                25px;

        }


        .nav-menu a {

            color:
                #cbd5e1;

            font-size:
                14px;

            transition:
                0.25s;

        }


        .nav-menu a:hover,
        .nav-menu a.active {

            color:
                var(--cyan);

        }


        /* =====================================================
           RESULT PAGE
        ===================================================== */

        .result-page {

            padding:
                55px 0 70px;

        }


        .result-card {

            background:
                rgba(255,
                    255,
                    255,
                    0.98);

            border:
                1px solid var(--border);

            border-radius:
                20px;

            padding:
                35px;

            box-shadow:
                0 20px 55px rgba(15,
                    23,
                    42,
                    0.09);

            position:
                relative;

            overflow:
                hidden;

        }


        .result-card::before {

            content:
                "";

            position:
                absolute;

            top:
                0;

            left:
                0;

            right:
                0;

            height:
                4px;

            background:
                linear-gradient(90deg,
                    #0369a1,
                    #0284c7,
                    #38bdf8);

        }


        /* =====================================================
           EYEBROW
        ===================================================== */

        .eyebrow {

            display:
                inline-flex;

            padding:
                7px 13px;

            background:
                #e0f2fe;

            color:
                #0369a1;

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


        /* =====================================================
           TITLE
        ===================================================== */

        .result-card>h1 {

            color:
                var(--navy);

            font-size:
                30px;

            line-height:
                1.25;

            margin-bottom:
                9px;

        }


        .result-intro {

            color:
                var(--muted);

            font-size:
                14px;

            margin-bottom:
                27px;

        }


        /* =====================================================
           INFO PESERTA
        ===================================================== */

        .result-info-grid {

            display:
                grid;

            grid-template-columns:
                1fr 1fr;

            gap:
                12px;

            margin-bottom:
                30px;

        }


        .result-info-box {

            background:
                #f7fafc;

            border:
                1px solid #e3ebf2;

            border-radius:
                11px;

            padding:
                15px 16px;

            min-height:
                70px;

            transition:
                0.2s;

        }


        .result-info-box:hover {

            border-color:
                #bae6fd;

            background:
                #f5fbff;

            transform:
                translateY(-1px);

        }


        .result-info-box span {

            display:
                block;

            color:
                var(--muted);

            font-size:
                11px;

            margin-bottom:
                4px;

        }


        .result-info-box strong {

            display:
                block;

            color:
                #334155;

            font-size:
                14px;

            word-break:
                break-word;

        }


        /* =====================================================
           SECTION
        ===================================================== */

        .result-section {

            margin-top:
                27px;

            padding-top:
                25px;

            border-top:
                1px solid #e7edf3;

        }


        .result-section h2 {

            color:
                var(--navy);

            font-size:
                18px;

            margin-bottom:
                13px;

        }


        /* =====================================================
           COST TABLE
        ===================================================== */

        .cost-table {

            border:
                1px solid #dfe8ef;

            border-radius:
                11px;

            overflow:
                hidden;

            background:
                white;

        }


        .cost-row {

            display:
                flex;

            align-items:
                center;

            justify-content:
                space-between;

            gap:
                20px;

            min-height:
                47px;

            padding:
                11px 15px;

            border-bottom:
                1px solid #e8eef3;

        }


        .cost-row:last-child {

            border-bottom:
                none;

        }


        .cost-row span {

            color:
                var(--muted);

            font-size:
                13px;

        }


        .cost-row strong {

            color:
                #334155;

            font-size:
                13px;

            white-space:
                nowrap;

        }


        /* =====================================================
           TOTAL
        ===================================================== */

        .cost-row.total-row {

            background:
                linear-gradient(90deg,
                    #e7f7ff,
                    #f0fbff);

            border-top:
                1px solid #bce7f8;

        }


        .cost-row.total-row span,
        .cost-row.total-row strong {

            color:
                var(--blue-dark);

            font-weight:
                800;

        }


        .cost-row.total-row strong {

            font-size:
                15px;

        }


        /* =====================================================
           INTEREST
        ===================================================== */

        .interest-tags {

            display:
                flex;

            flex-wrap:
                wrap;

            gap:
                8px;

        }


        .interest-tag {

            display:
                inline-flex;

            align-items:
                center;

            padding:
                7px 12px;

            background:
                #eaf8ff;

            border:
                1px solid #c7eafa;

            color:
                #0879ad;

            border-radius:
                999px;

            font-size:
                12px;

            font-weight:
                700;

            transition:
                0.2s;

        }


        .interest-tag:hover {

            background:
                #dff4ff;

            transform:
                translateY(-1px);

        }


        /* =====================================================
           FACILITY
        ===================================================== */

        .facility-list {

            padding-left:
                21px;

        }


        .facility-list li {

            color:
                var(--text-soft);

            font-size:
                13px;

            margin-bottom:
                7px;

        }


        .facility-list li::marker {

            color:
                var(--blue);

        }


        /* =====================================================
           NOTE
        ===================================================== */

        .result-note {

            padding:
                13px 15px;

            background:
                #f8fafc;

            border:
                1px solid #e3eaf0;

            border-left:
                4px solid var(--cyan);

            border-radius:
                9px;

            color:
                var(--muted);

            font-size:
                13px;

            line-height:
                1.6;

        }


        /* =====================================================
           BUTTON
        ===================================================== */

        .result-actions {

            display:
                grid;

            grid-template-columns:
                1fr 1fr 1fr;

            gap:
                11px;

            margin-top:
                30px;

            padding-top:
                5px;

        }


        .btn {

            min-height:
                47px;

            display:
                flex;

            align-items:
                center;

            justify-content:
                center;

            border-radius:
                10px;

            padding:
                10px 15px;

            font-size:
                12px;

            font-weight:
                700;

            transition:
                0.25s;

            cursor:
                pointer;

        }


        .btn:hover {

            transform:
                translateY(-2px);

        }


        /* =====================================================
           PRIMARY BUTTON
        ===================================================== */

        .btn-primary {

            background:
                linear-gradient(135deg,
                    #0284c7,
                    #0369a1);

            color:
                white;

            border:
                1px solid #0284c7;

        }


        .btn-primary:hover {

            background:
                linear-gradient(135deg,
                    #0369a1,
                    #075985);

        }


        /* =====================================================
           SECONDARY BUTTON
        ===================================================== */

        .btn-secondary {

            background:
                #e0f2fe;

            color:
                #0369a1;

            border:
                1px solid #bae6fd;

        }


        .btn-secondary:hover {

            background:
                #d5f0fd;

        }


        /* =====================================================
           OUTLINE BUTTON
        ===================================================== */

        .btn-outline {

            background:
                white;

            color:
                #475569;

            border:
                1px solid #cbd5e1;

        }


        .btn-outline:hover {

            background:
                #f8fafc;

            border-color:
                #94a3b8;

        }


        /* =====================================================
           FOOTER
        ===================================================== */

        .footer {

            background:
                var(--navy);

            color:
                #94a3b8;

            text-align:
                center;

            padding:
                25px 0;

            font-size:
                12px;

        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 700px) {

            .container {

                width:
                    calc(100% - 28px);

            }


            .nav-inner {

                min-height:
                    auto;

                padding:
                    14px 0;

                flex-direction:
                    column;

                gap:
                    10px;

            }


            .nav-menu {

                gap:
                    18px;

            }


            .result-page {

                padding:
                    30px 0 45px;

            }


            .result-card {

                padding:
                    26px 19px;

            }


            .result-card>h1 {

                font-size:
                    25px;

            }


            .result-info-grid {

                grid-template-columns:
                    1fr;

            }


            .result-actions {

                grid-template-columns:
                    1fr;

            }


            .cost-row {

                min-height:
                    44px;

                padding:
                    10px 12px;

            }

        }


        /* =====================================================
           RESPONSIVE HP KECIL
        ===================================================== */

        @media (max-width: 420px) {

            .nav-menu {

                gap:
                    13px;

            }


            .nav-menu a {

                font-size:
                    12px;

            }


            .result-card {

                border-radius:
                    15px;

                padding:
                    23px 16px;

            }


            .result-card>h1 {

                font-size:
                    23px;

            }


            .result-intro {

                font-size:
                    13px;

            }


            .cost-row {

                gap:
                    10px;

            }


            .cost-row span,
            .cost-row strong {

                font-size:
                    12px;

            }

        }
    </style>

</head>


<body>


    <!-- =====================================================
         NAVBAR
    ====================================================== -->

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
         HASIL PENDAFTARAN
    ====================================================== -->

    <main class="result-page">

        <div class="container">


            <section class="result-card">


                <p class="eyebrow">
                    PENDAFTARAN BERHASIL
                </p>


                <h1>
                    Pendaftaran Berhasil Diproses
                </h1>


                <p class="result-intro">

                    Data pendaftaran kamu telah berhasil
                    diterima dan sedang diproses.

                </p>


                <!-- =================================================
                     DATA PESERTA
                ================================================= -->

                <div class="result-info-grid">


                    <div class="result-info-box">

                        <span>
                            Nama
                        </span>

                        <strong>
                            <?= eProcess($name); ?>
                        </strong>

                    </div>


                    <div class="result-info-box">

                        <span>
                            Email
                        </span>

                        <strong>
                            <?= eProcess($email); ?>
                        </strong>

                    </div>


                    <div class="result-info-box">

                        <span>
                            Kursus
                        </span>

                        <strong>
                            <?= eProcess($courseName); ?>
                        </strong>

                    </div>


                    <div class="result-info-box">

                        <span>
                            Tipe peserta
                        </span>

                        <strong>
                            <?= eProcess($participantType); ?>
                        </strong>

                    </div>


                    <div class="result-info-box">

                        <span>
                            Metode
                        </span>

                        <strong>
                            <?= eProcess($methodLabel); ?>
                        </strong>

                    </div>


                    <div class="result-info-box">

                        <span>
                            Jumlah paket
                        </span>

                        <strong>
                            <?= $quantity; ?>
                        </strong>

                    </div>


                </div>


                <!-- =================================================
                     RINCIAN BIAYA
                ================================================= -->

                <section class="result-section">

                    <h2>
                        Rincian Biaya
                    </h2>


                    <div class="cost-table">


                        <div class="cost-row">

                            <span>
                                Biaya satuan
                            </span>

                            <strong>
                                <?= rupiahProcess($unitPrice); ?>
                            </strong>

                        </div>


                        <div class="cost-row">

                            <span>
                                Jumlah paket
                            </span>

                            <strong>
                                <?= $quantity; ?>
                            </strong>

                        </div>


                        <div class="cost-row">

                            <span>
                                Subtotal
                            </span>

                            <strong>
                                <?= rupiahProcess($subtotal); ?>
                            </strong>

                        </div>


                        <div class="cost-row">

                            <span>
                                Diskon <?= $discountPercent; ?>%
                            </span>

                            <strong>
                                -<?= rupiahProcess($discount); ?>
                            </strong>

                        </div>


                        <div class="cost-row">

                            <span>
                                Biaya admin
                            </span>

                            <strong>
                                <?= rupiahProcess($adminFee); ?>
                            </strong>

                        </div>


                        <div class="cost-row total-row">

                            <span>
                                TOTAL AKHIR
                            </span>

                            <strong>
                                <?= rupiahProcess($total); ?>
                            </strong>

                        </div>


                    </div>

                </section>


                <!-- =================================================
                     MINAT
                ================================================= -->

                <section class="result-section">

                    <h2>
                        Minat
                    </h2>


                    <div class="interest-tags">


                        <?php if (empty($interests)): ?>

                            <span class="interest-tag">
                                Belum memilih minat
                            </span>


                        <?php else: ?>


                            <?php foreach ($interests as $interest): ?>

                                <span class="interest-tag">

                                    <?= eProcess($interest); ?>

                                </span>

                            <?php endforeach; ?>


                        <?php endif; ?>


                    </div>

                </section>


                <!-- =================================================
                     FASILITAS
                ================================================= -->

                <section class="result-section">

                    <h2>
                        Fasilitas
                    </h2>


                    <ul class="facility-list">


                        <?php foreach ($facilities as $facility): ?>

                            <li>
                                <?= eProcess($facility); ?>
                            </li>

                        <?php endforeach; ?>


                    </ul>

                </section>


                <!-- =================================================
                     CATATAN
                ================================================= -->

                <section class="result-section">

                    <h2>
                        Catatan
                    </h2>


                    <div class="result-note">


                        <?php if ($note !== ''): ?>

                            <?= nl2br(eProcess($note)); ?>


                        <?php else: ?>

                            Tidak ada catatan.


                        <?php endif; ?>


                    </div>

                </section>


                <!-- =================================================
                     BUTTON
                ================================================= -->

                <div class="result-actions">


                    <a
                        href="registration.php"
                        class="btn btn-primary">
                        Daftar Lagi
                    </a>


                    <a
                        href="history-dummy.php"
                        class="btn btn-secondary">
                        Lihat History Dummy
                    </a>


                    <a
                        href="index.php"
                        class="btn btn-outline">
                        Beranda
                    </a>


                </div>


            </section>

        </div>

    </main>


    <!-- =====================================================
         FOOTER
    ====================================================== -->

    <footer class="footer">

        <div class="container">

            <p>

                &copy;
                <?= $year; ?>

                KursusKu.

                Belajar Teknologi, Bangun Masa Depan.

            </p>

        </div>

    </footer>


</body>

</html>