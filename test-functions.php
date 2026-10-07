<?php
require_once __DIR__ . '/helpers.php';

$tests = [
    ['Rupiah', rupiah(250000), 'Rp 250.000'],
    ['Penuh', statusKursus(25, 25), 'Penuh'],
    ['Tersedia', statusKursus(30, 29), 'Tersedia'],
    ['Sisa kosong', sisaKursi(20, 0), 20],
    ['Sisa penuh', sisaKursi(25, 25), 0],
    ['Tanggal', formatTanggal('2026-09-15'), '15-09-2026'],
];

$totalTests = count($tests);
$passedTests = 0;
$failedTests = 0;

foreach ($tests as [$name, $actual, $expected]) {
    if ($actual === $expected) {
        $passedTests++;
    } else {
        $failedTests++;
    }
}

function eTest($value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test Functions - KursusKu</title>

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

            --green: #16a34a;
            --green-soft: #dcfce7;

            --red: #dc2626;
            --red-soft: #fee2e2;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family:
                Inter,
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;

            background: var(--background);
            color: var(--text);
            line-height: 1.6;
        }

        /* =========================
           NAVBAR
        ========================= */

        .navbar {
            background: var(--navy);
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        }

        .nav-inner {
            width: min(1120px, calc(100% - 40px));
            margin: auto;

            min-height: 72px;

            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 30px;
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
            gap: 26px;
        }

        .nav-menu a {
            color: #cbd5e1;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: 0.25s;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: var(--cyan);
        }

        /* =========================
           CONTAINER
        ========================= */

        .container {
            width: min(1120px, calc(100% - 40px));
            margin: auto;
        }

        /* =========================
           PAGE HEADER
        ========================= */

        .page-header {
            padding: 48px 0 28px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;

            background: var(--cyan-soft);
            color: var(--blue-dark);

            padding: 6px 12px;
            border-radius: 999px;

            font-size: 12px;
            font-weight: 700;

            margin-bottom: 12px;
        }

        .page-header h1 {
            font-size: 32px;
            line-height: 1.2;
            color: var(--navy);
            margin-bottom: 8px;
        }

        .page-header p {
            color: var(--muted);
            font-size: 15px;
        }

        /* =========================
           SUMMARY
        ========================= */

        .summary {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;

            margin-bottom: 24px;
        }

        .summary-card {
            background: var(--white);

            border: 1px solid var(--border);
            border-radius: 14px;

            padding: 20px;

            box-shadow:
                0 4px 12px rgba(15, 23, 42, 0.04);
        }

        .summary-label {
            color: var(--muted);
            font-size: 13px;
            margin-bottom: 5px;
        }

        .summary-value {
            color: var(--navy);
            font-size: 28px;
            font-weight: 800;
        }

        .summary-value.pass {
            color: var(--green);
        }

        .summary-value.fail {
            color: var(--red);
        }

        /* =========================
           TEST CARD
        ========================= */

        .test-card {
            background: var(--white);

            border: 1px solid var(--border);
            border-radius: 16px;

            overflow: hidden;

            box-shadow:
                0 8px 25px rgba(15, 23, 42, 0.05);

            margin-bottom: 28px;
        }

        .card-header {
            padding: 20px 24px;

            border-bottom: 1px solid var(--border);

            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .card-header h2 {
            font-size: 18px;
            color: var(--navy);
        }

        .card-header p {
            color: var(--muted);
            font-size: 13px;
            margin-top: 3px;
        }

        .test-count {
            background: var(--cyan-soft);
            color: var(--blue-dark);

            padding: 7px 12px;
            border-radius: 8px;

            font-size: 12px;
            font-weight: 700;

            white-space: nowrap;
        }

        /* =========================
           TABLE
        ========================= */

        .table-wrapper {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8fafc;
            color: #475569;

            text-align: left;

            font-size: 12px;
            font-weight: 700;

            padding: 14px 18px;

            border-bottom: 1px solid var(--border);
        }

        td {
            padding: 16px 18px;

            font-size: 14px;

            border-bottom: 1px solid #edf2f7;

            vertical-align: middle;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #f8fbff;
        }

        .number {
            width: 55px;
            color: var(--muted);
            font-weight: 700;
        }

        .test-name {
            color: var(--navy);
            font-weight: 700;
        }

        code {
            display: inline-block;

            background: #f1f5f9;
            color: #334155;

            padding: 5px 8px;
            border-radius: 6px;

            font-family: Consolas, Monaco, monospace;
            font-size: 12px;

            border: 1px solid #e2e8f0;
        }

        /* =========================
           STATUS
        ========================= */

        .status {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            min-width: 68px;

            padding: 6px 10px;

            border-radius: 999px;

            font-size: 11px;
            font-weight: 800;
        }

        .status.pass {
            color: var(--green);
            background: var(--green-soft);
        }

        .status.fail {
            color: var(--red);
            background: var(--red-soft);
        }

        /* =========================
           BUTTON
        ========================= */

        .actions {
            display: flex;
            justify-content: center;
            gap: 12px;

            margin-bottom: 50px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            min-height: 44px;

            padding: 0 20px;

            border-radius: 9px;

            text-decoration: none;

            font-size: 13px;
            font-weight: 700;

            transition: 0.25s;
        }

        .btn-primary {
            background: var(--blue);
            color: white;
        }

        .btn-primary:hover {
            background: var(--blue-dark);
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: white;
            color: var(--blue-dark);

            border: 1px solid #bae6fd;
        }

        .btn-secondary:hover {
            background: var(--cyan-soft);
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            background: var(--navy);
            color: #94a3b8;

            text-align: center;

            padding: 22px 20px;

            font-size: 12px;
        }

        footer strong {
            color: var(--cyan);
        }

        /* =========================
           RESPONSIVE
        ========================= */

        @media (max-width: 768px) {

            .nav-inner {
                min-height: auto;
                padding: 18px 0;

                flex-direction: column;
                align-items: flex-start;

                gap: 14px;
            }

            .nav-menu {
                width: 100%;
                gap: 18px;

                flex-wrap: wrap;
            }

            .page-header h1 {
                font-size: 27px;
            }

            .summary {
                grid-template-columns: 1fr;
            }

            .card-header {
                align-items: flex-start;
                flex-direction: column;
            }

            .actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <!-- =========================
         NAVBAR
    ========================= -->

    <header class="navbar">
        <div class="nav-inner">

            <a href="index.php" class="logo">
                Kursus<span>Ku</span>
            </a>

            <nav class="nav-menu">
                <a href="index.php">Beranda</a>
                <a href="index.php#katalog">Katalog</a>
                <a href="registration.php">Daftar</a>
                <a href="fee-calculator.php">Fee Calculator</a>
                <a href="test-functions.php" class="active">Test Functions</a>
            </nav>

        </div>
    </header>


    <!-- =========================
         CONTENT
    ========================= -->

    <main class="container">

        <section class="page-header">

            <span class="eyebrow">
                UNIT TEST
            </span>

            <h1>
                Pengujian Functions
            </h1>

            <p>
                Pengujian fungsi pada <strong>helpers.php</strong>
                untuk memastikan setiap fungsi menghasilkan nilai yang sesuai.
            </p>

        </section>


        <!-- =========================
             SUMMARY
        ========================= -->

        <section class="summary">

            <div class="summary-card">
                <div class="summary-label">
                    Total Test Case
                </div>

                <div class="summary-value">
                    <?= $totalTests ?>
                </div>
            </div>


            <div class="summary-card">
                <div class="summary-label">
                    Test Berhasil
                </div>

                <div class="summary-value pass">
                    <?= $passedTests ?>
                </div>
            </div>


            <div class="summary-card">
                <div class="summary-label">
                    Test Gagal
                </div>

                <div class="summary-value fail">
                    <?= $failedTests ?>
                </div>
            </div>

        </section>


        <!-- =========================
             TEST TABLE
        ========================= -->

        <section class="test-card">

            <div class="card-header">

                <div>
                    <h2>
                        Hasil Pengujian Functions
                    </h2>

                    <p>
                        Verifikasi hasil aktual terhadap hasil yang diharapkan.
                    </p>
                </div>

                <div class="test-count">
                    <?= $totalTests ?> Test Case
                </div>

            </div>


            <div class="table-wrapper">

                <table>

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Function</th>
                            <th>Actual</th>
                            <th>Expected</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($tests as $index => [$name, $actual, $expected]): ?>

                            <?php
                            $passed = ($actual === $expected);
                            ?>

                            <tr>

                                <td class="number">
                                    <?= $index + 1 ?>
                                </td>

                                <td class="test-name">
                                    <?= eTest($name) ?>
                                </td>

                                <td>
                                    <code>
                                        <?= eTest($actual) ?>
                                    </code>
                                </td>

                                <td>
                                    <code>
                                        <?= eTest($expected) ?>
                                    </code>
                                </td>

                                <td>

                                    <span class="status <?= $passed ? 'pass' : 'fail' ?>">
                                        <?= $passed ? 'PASS' : 'FAIL' ?>
                                    </span>

                                </td>

                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            </div>

        </section>


        <!-- =========================
             ACTIONS
        ========================= -->

        <div class="actions">

            <a href="index.php" class="btn btn-primary">
                ← Kembali ke Beranda
            </a>

            <a href="registration.php" class="btn btn-secondary">
                Halaman Pendaftaran
            </a>

        </div>

    </main>


    <!-- =========================
         FOOTER
    ========================= -->

    <footer>
        © <?= date('Y') ?> <strong>KursusKu</strong>.
        Unit Testing Functions.
    </footer>

</body>

</html>