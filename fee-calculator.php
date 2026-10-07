<?php

declare(strict_types=1);

/*
|--------------------------------------------------------------------------
| KURSUSKU - FEE CALCULATOR
|--------------------------------------------------------------------------
| Kalkulator estimasi biaya kursus.
|--------------------------------------------------------------------------
*/

$courseName = 'Laravel Fundamental';

$fee = 350000;

$participantCount = 2;

$discountPercent = 10;

$adminFee = 25000;

$isActive = true;


/*
|--------------------------------------------------------------------------
| PERHITUNGAN
|--------------------------------------------------------------------------
*/

$subtotal = $fee * $participantCount;

$discount = intdiv(
    $subtotal * $discountPercent,
    100
);

$total = $subtotal - $discount + $adminFee;


/*
|--------------------------------------------------------------------------
| HELPER
|--------------------------------------------------------------------------
*/

function rupiahCalculator(int|float $value): string
{
    return 'Rp ' . number_format(
        $value,
        0,
        ',',
        '.'
    );
}

function eCalculator(string $value): string
{
    return htmlspecialchars(
        $value,
        ENT_QUOTES,
        'UTF-8'
    );
}

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
        Fee Calculator - KursusKu
    </title>


    <style>
        /* =====================================================
           KURSUSKU - FEE CALCULATOR
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

            --background: #f4f7fb;

            --white: #ffffff;

            --text: #24344d;

            --text-soft: #475569;

            --muted: #64748b;

            --border: #d7e2ea;

            --border-soft: #e7eef4;

            --success: #15803d;

            --success-bg: #ecfdf5;
        }


        body {

            font-family:
                Arial,
                Helvetica,
                sans-serif;

            background:
                linear-gradient(135deg,
                    #f8fbff 0%,
                    #eef8ff 50%,
                    #f4f7fb 100%);

            color:
                var(--text);

            min-height:
                100vh;

            line-height:
                1.6;
        }


        a {
            text-decoration: none;
        }


        /* =====================================================
           CONTAINER
        ===================================================== */

        .container {

            width:
                min(1100px,
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


        .brand {

            color:
                #ffffff;

            font-size:
                25px;

            font-weight:
                800;

            text-decoration:
                none;
        }


        .brand span {

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
                600;

            transition:
                0.25s;
        }


        .nav-menu a:hover {

            color:
                var(--cyan);
        }


        .nav-menu a.active {

            color:
                #ffffff;
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
                inline-block;

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
                34px;

            line-height:
                1.2;

            margin-bottom:
                10px;
        }


        .page-header p {

            color:
                var(--muted);

            font-size:
                14px;

            max-width:
                650px;

            margin:
                0 auto;
        }


        /* =====================================================
           MAIN CARD
        ===================================================== */

        .calculator-card {

            background:
                rgba(255,
                    255,
                    255,
                    0.98);

            border:
                1px solid var(--border-soft);

            border-radius:
                20px;

            padding:
                30px;

            margin-bottom:
                60px;

            box-shadow:
                0 18px 50px rgba(15, 23, 42, 0.08);

            position:
                relative;

            overflow:
                hidden;
        }


        .calculator-card::before {

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
                    var(--blue-dark),
                    var(--blue),
                    var(--cyan));
        }


        /* =====================================================
           COURSE INFO
        ===================================================== */

        .course-info {

            background:
                #f8fcff;

            border:
                1px solid var(--border);

            border-radius:
                14px;

            padding:
                20px;

            margin-bottom:
                25px;
        }


        .course-label {

            color:
                var(--muted);

            font-size:
                12px;

            margin-bottom:
                4px;
        }


        .course-name {

            color:
                var(--navy-soft);

            font-size:
                22px;

            font-weight:
                800;
        }


        .active-status {

            display:
                inline-flex;

            margin-top:
                8px;

            padding:
                5px 10px;

            border-radius:
                999px;

            background:
                var(--success-bg);

            color:
                var(--success);

            font-size:
                11px;

            font-weight:
                700;
        }


        /* =====================================================
           TABLE
        ===================================================== */

        .table-wrapper {

            overflow-x:
                auto;

            border:
                1px solid var(--border);

            border-radius:
                12px;
        }


        table {

            width:
                100%;

            border-collapse:
                collapse;

            min-width:
                600px;
        }


        th {

            background:
                var(--navy);

            color:
                #ffffff;

            padding:
                14px;

            font-size:
                12px;

            text-align:
                left;

            font-weight:
                700;
        }


        td {

            padding:
                14px;

            border-bottom:
                1px solid #e8eef2;

            color:
                var(--text-soft);

            font-size:
                13px;
        }


        tbody tr:last-child td {

            border-bottom:
                none;
        }


        tbody tr:hover {

            background:
                #f8fcff;
        }


        .value {

            text-align:
                right;

            font-weight:
                650;

            color:
                var(--text);
        }


        .discount {

            color:
                #dc2626;

            font-weight:
                650;
        }


        /* =====================================================
           TOTAL
        ===================================================== */

        .total-row td {

            background:
                var(--cyan-soft);

            border-top:
                2px solid #bae6fd;

            padding:
                18px 14px;
        }


        .total-label {

            color:
                var(--blue-dark);

            font-size:
                15px;

            font-weight:
                800;
        }


        .total-value {

            color:
                var(--blue-dark);

            font-size:
                21px;

            font-weight:
                850;

            text-align:
                right;
        }


        /* =====================================================
           ACTION
        ===================================================== */

        .actions {

            display:
                flex;

            justify-content:
                center;

            align-items:
                center;

            gap:
                12px;

            margin-top:
                25px;

            flex-wrap:
                wrap;
        }


        .btn {

            display:
                inline-flex;

            align-items:
                center;

            justify-content:
                center;

            min-height:
                44px;

            padding:
                10px 20px;

            border-radius:
                10px;

            font-size:
                13px;

            font-weight:
                750;

            transition:
                0.25s;

            border:
                1px solid transparent;
        }


        .btn:hover {

            transform:
                translateY(-2px);

            box-shadow:
                0 8px 18px rgba(15, 23, 42, 0.10);
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


        .btn-secondary {

            color:
                var(--blue-dark);

            background:
                #effaff;

            border-color:
                #8dd8f7;
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
                24px 0;
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


        .footer p {

            font-size:
                12px;
        }


        /* =====================================================
           RESPONSIVE
        ===================================================== */

        @media (max-width: 750px) {

            .container {

                width:
                    calc(100% - 24px);
            }


            .nav-inner {

                flex-direction:
                    column;

                padding:
                    16px 0;

                gap:
                    12px;
            }


            .nav-menu {

                gap:
                    18px;
            }


            .page-header {

                padding:
                    40px 5px 25px;
            }


            .page-header h1 {

                font-size:
                    28px;
            }


            .calculator-card {

                padding:
                    18px;

                border-radius:
                    16px;
            }


            .actions {

                flex-direction:
                    column;
            }


            .btn {

                width:
                    100%;
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
                class="brand">

                Kursus<span>Ku</span>

            </a>


            <nav class="nav-menu">

                <a href="index.php">
                    Beranda
                </a>

                <a href="index.php#katalog">
                    Katalog
                </a>

                <a href="registration.php">
                    Daftar
                </a>

                <a
                    href="fee-calculator.php"
                    class="active">

                    Fee Calculator

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

            <span class="eyebrow">

                KALKULATOR BIAYA

            </span>


            <h1>

                Kalkulator Estimasi Biaya

            </h1>


            <p>

                Lihat rincian biaya kursus berdasarkan
                jumlah peserta, diskon, dan biaya administrasi.

            </p>

        </section>



        <!-- =================================================
             CALCULATOR
        ================================================= -->

        <section class="calculator-card">


            <!-- COURSE -->

            <div class="course-info">

                <div class="course-label">

                    Kursus yang dipilih

                </div>


                <div class="course-name">

                    <?= eCalculator($courseName); ?>

                </div>


                <?php if ($isActive): ?>

                    <span class="active-status">

                        ● Kursus Aktif

                    </span>

                <?php endif; ?>

            </div>



            <!-- TABLE -->

            <div class="table-wrapper">

                <table>


                    <thead>

                        <tr>

                            <th>
                                Komponen
                            </th>

                            <th>
                                Nilai
                            </th>

                        </tr>

                    </thead>


                    <tbody>


                        <tr>

                            <td>
                                Biaya per peserta
                            </td>

                            <td class="value">

                                <?= rupiahCalculator($fee); ?>

                            </td>

                        </tr>


                        <tr>

                            <td>
                                Jumlah peserta
                            </td>

                            <td class="value">

                                <?= $participantCount; ?>

                                peserta

                            </td>

                        </tr>


                        <tr>

                            <td>
                                Subtotal
                            </td>

                            <td class="value">

                                <?= rupiahCalculator($subtotal); ?>

                            </td>

                        </tr>


                        <tr>

                            <td>

                                Diskon
                                (<?= $discountPercent; ?>%)

                            </td>

                            <td class="value discount">

                                - <?= rupiahCalculator($discount); ?>

                            </td>

                        </tr>


                        <tr>

                            <td>
                                Biaya administrasi
                            </td>

                            <td class="value">

                                <?= rupiahCalculator($adminFee); ?>

                            </td>

                        </tr>


                        <tr class="total-row">

                            <td class="total-label">

                                Total Akhir

                            </td>

                            <td class="total-value">

                                <?= rupiahCalculator($total); ?>

                            </td>

                        </tr>


                    </tbody>

                </table>

            </div>



            <!-- ACTION -->

            <div class="actions">


                <a
                    href="index.php"
                    class="btn btn-primary">

                    Kembali ke Beranda

                </a>


                <a
                    href="registration.php"
                    class="btn btn-secondary">

                    Daftar Kursus

                </a>


            </div>


        </section>


    </main>



    <!-- =====================================================
         FOOTER
    ===================================================== -->

    <footer class="footer">

        <div class="container">

            <p>

                &copy;
                <?= eCalculator($year); ?>

                KursusKu.

                Belajar Teknologi, Bangun Masa Depan.

            </p>

        </div>

    </footer>


</body>

</html>