<?php

declare(strict_types=1);

$tests = [
    ['fee' => 350000, 'participants' => 1, 'discount' => 0, 'admin' => 25000, 'expected' => 375000],
    ['fee' => 350000, 'participants' => 1, 'discount' => 10, 'admin' => 25000, 'expected' => 340000],
    ['fee' => 350000, 'participants' => 2, 'discount' => 25, 'admin' => 25000, 'expected' => 550000],
    ['fee' => 0, 'participants' => 1, 'discount' => 10, 'admin' => 0, 'expected' => 0],
    ['fee' => 2500000, 'participants' => 3, 'discount' => 10, 'admin' => 50000, 'expected' => 6800000],
];

foreach ($tests as $index => $test) {
    $subtotal = $test['fee'] * $test['participants'];

    $discountAmount = intdiv(
        $subtotal * $test['discount'],
        100
    );

    $actual = $subtotal - $discountAmount + $test['admin'];

    $tests[$index]['actual'] = $actual;

    $tests[$index]['status'] =
        $actual === $test['expected'] ? 'PASS' : 'FAIL';
}

$totalTests = count($tests);
$passedTests = count(array_filter(
    $tests,
    fn(array $test): bool => $test['status'] === 'PASS'
));
$failedTests = $totalTests - $passedTests;

function rupiahTestMatrix(int|float $value): string
{
    return 'Rp ' . number_format($value, 0, ',', '.');
}

function escapeTestMatrix(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

$year = date('Y');

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Test Matrix - KursusKu</title>

    <style>
        /* =====================================================
           KURSUSKU - TEST MATRIX
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
            --danger: #dc2626;
            --danger-bg: #fef2f2;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(135deg,
                    #f8fbff 0%,
                    #eef8ff 50%,
                    #f4f7fb 100%);
            color: var(--text);
            min-height: 100vh;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
        }

        .container {
            width: min(1200px, calc(100% - 40px));
            margin: 0 auto;
        }

        /* NAVBAR */

        .navbar {
            background: var(--navy);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            box-shadow: 0 5px 20px rgba(15, 23, 42, 0.12);
        }

        .nav-inner {
            min-height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 25px;
        }

        .brand {
            color: var(--white);
            font-size: 25px;
            font-weight: 800;
        }

        .brand span {
            color: var(--cyan);
        }

        .nav-menu {
            display: flex;
            align-items: center;
            gap: 25px;
        }

        .nav-menu a {
            color: #cbd5e1;
            font-size: 14px;
            font-weight: 600;
            transition: 0.25s;
        }

        .nav-menu a:hover,
        .nav-menu a.active {
            color: var(--white);
        }

        /* PAGE HEADER */

        .page-header {
            text-align: center;
            padding: 50px 10px 30px;
        }

        .eyebrow {
            display: inline-block;
            background: var(--cyan-soft);
            color: var(--blue-dark);
            border: 1px solid #bae6fd;
            padding: 7px 15px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 0.7px;
            margin-bottom: 13px;
        }

        .page-header h1 {
            color: var(--navy-soft);
            font-size: 34px;
            line-height: 1.2;
            margin-bottom: 10px;
        }

        .page-header p {
            color: var(--muted);
            font-size: 14px;
            max-width: 680px;
            margin: 0 auto;
        }

        /* MAIN CARD */

        .test-card {
            background: rgba(255, 255, 255, 0.98);
            border: 1px solid var(--border-soft);
            border-radius: 20px;
            padding: 28px;
            margin-bottom: 55px;
            box-shadow: 0 18px 50px rgba(15, 23, 42, 0.08);
            position: relative;
            overflow: hidden;
        }

        .test-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg,
                    var(--blue-dark),
                    var(--blue),
                    var(--cyan));
        }

        .section-heading {
            margin-bottom: 20px;
        }

        .section-heading h2 {
            color: var(--navy-soft);
            font-size: 20px;
            margin-bottom: 5px;
        }

        .section-heading p {
            color: var(--muted);
            font-size: 13px;
        }

        /* SUMMARY */

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 15px;
            margin-bottom: 28px;
        }

        .summary-item {
            background: #f8fcff;
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 18px;
        }

        .summary-label {
            display: block;
            color: var(--muted);
            font-size: 12px;
            margin-bottom: 6px;
        }

        .summary-value {
            color: var(--navy-soft);
            font-size: 25px;
            font-weight: 800;
        }

        .summary-item.passed .summary-value {
            color: var(--success);
        }

        .summary-item.failed .summary-value {
            color: var(--danger);
        }

        /* TABLE */

        .table-wrapper {
            overflow-x: auto;
            border: 1px solid var(--border);
            border-radius: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 950px;
        }

        thead th {
            background: var(--navy);
            color: var(--white);
            padding: 14px 12px;
            font-size: 12px;
            text-align: left;
            font-weight: 700;
            white-space: nowrap;
        }

        tbody td {
            padding: 14px 12px;
            border-bottom: 1px solid var(--border-soft);
            color: var(--text-soft);
            font-size: 13px;
            white-space: nowrap;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background: #f8fcff;
        }

        .number-cell {
            font-weight: 700;
            color: var(--navy-soft);
        }

        .money-cell {
            text-align: right;
            font-weight: 600;
            color: var(--text);
        }

        .badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 5px 11px;
            border-radius: 999px;
            font-size: 11px;
            font-weight: 800;
        }

        .badge-pass {
            background: var(--success-bg);
            color: var(--success);
            border: 1px solid #bbf7d0;
        }

        .badge-fail {
            background: var(--danger-bg);
            color: var(--danger);
            border: 1px solid #fecaca;
        }

        /* INFORMATION */

        .info-note {
            margin-top: 20px;
            padding: 15px 17px;
            border: 1px solid #bae6fd;
            background: #f0f9ff;
            border-radius: 12px;
            color: var(--blue-dark);
            font-size: 13px;
        }

        .info-note strong {
            display: block;
            margin-bottom: 4px;
        }

        /* ACTIONS */

        .actions {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            margin-top: 25px;
            flex-wrap: wrap;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 44px;
            padding: 10px 20px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 750;
            transition: 0.25s;
            border: 1px solid transparent;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 18px rgba(15, 23, 42, 0.10);
        }

        .btn-primary {
            color: var(--white);
            background: linear-gradient(135deg,
                    var(--blue-dark),
                    var(--blue));
            border-color: var(--blue);
        }

        .btn-secondary {
            color: var(--blue-dark);
            background: #effaff;
            border-color: #8dd8f7;
        }

        /* FOOTER */

        .footer {
            background: var(--navy);
            color: #94a3b8;
            text-align: center;
            padding: 24px 0;
        }

        .footer::before {
            content: "";
            display: block;
            width: 50px;
            height: 2px;
            background: var(--cyan);
            margin: 0 auto 12px;
            border-radius: 10px;
        }

        .footer p {
            font-size: 12px;
        }

        /* RESPONSIVE */

        @media (max-width: 750px) {
            .container {
                width: calc(100% - 24px);
            }

            .nav-inner {
                flex-direction: column;
                padding: 16px 0;
                gap: 12px;
            }

            .nav-menu {
                justify-content: center;
                flex-wrap: wrap;
                gap: 12px 18px;
            }

            .page-header {
                padding: 38px 5px 25px;
            }

            .page-header h1 {
                font-size: 28px;
            }

            .test-card {
                padding: 18px;
                border-radius: 16px;
            }

            .summary-grid {
                grid-template-columns: 1fr;
                gap: 10px;
            }

            .summary-value {
                font-size: 22px;
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

    <!-- NAVBAR -->

    <header class="navbar">
        <div class="container nav-inner">

            <a href="index.php" class="brand">
                Kursus<span>Ku</span>
            </a>

            <nav class="nav-menu">
                <a href="index.php">Beranda</a>
                <a href="index.php#katalog">Katalog</a>
                <a href="registration.php">Daftar</a>
                <a href="fee-calculator.php">Fee Calculator</a>
                <a href="test-matrix.php" class="active">Test Matrix</a>
            </nav>

        </div>
    </header>

    <!-- MAIN -->

    <main class="container">

        <section class="page-header">
            <span class="eyebrow">PENGUJIAN MILESTONE 3</span>

            <h1>Test Matrix Kalkulator Biaya</h1>

            <p>
                Lima skenario pengujian untuk memeriksa hasil perhitungan
                biaya kursus dengan membandingkan nilai expected dan actual.
            </p>
        </section>

        <section class="test-card">

            <div class="section-heading">
                <h2>Ringkasan Pengujian</h2>
                <p>
                    Status PASS berarti hasil perhitungan sesuai dengan
                    nilai yang diharapkan.
                </p>
            </div>

            <div class="summary-grid">

                <div class="summary-item">
                    <span class="summary-label">Total Test Case</span>
                    <div class="summary-value">
                        <?= $totalTests; ?>
                    </div>
                </div>

                <div class="summary-item passed">
                    <span class="summary-label">Pengujian PASS</span>
                    <div class="summary-value">
                        <?= $passedTests; ?>
                    </div>
                </div>

                <div class="summary-item failed">
                    <span class="summary-label">Pengujian FAIL</span>
                    <div class="summary-value">
                        <?= $failedTests; ?>
                    </div>
                </div>

            </div>

            <div class="section-heading">
                <h2>Hasil Test Case</h2>
                <p>
                    Geser tabel ke samping jika dibuka pada layar kecil.
                </p>
            </div>

            <div class="table-wrapper">
                <table>

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Fee</th>
                            <th>Peserta</th>
                            <th>Diskon</th>
                            <th>Admin</th>
                            <th>Expected</th>
                            <th>Actual</th>
                            <th>Status</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($tests as $i => $test): ?>
                            <tr>
                                <td class="number-cell">
                                    <?= $i + 1; ?>
                                </td>

                                <td class="money-cell">
                                    <?= rupiahTestMatrix($test['fee']); ?>
                                </td>

                                <td>
                                    <?= $test['participants']; ?>
                                    peserta
                                </td>

                                <td>
                                    <?= $test['discount']; ?>%
                                </td>

                                <td class="money-cell">
                                    <?= rupiahTestMatrix($test['admin']); ?>
                                </td>

                                <td class="money-cell">
                                    <?= rupiahTestMatrix($test['expected']); ?>
                                </td>

                                <td class="money-cell">
                                    <?= rupiahTestMatrix($test['actual']); ?>
                                </td>

                                <td>
                                    <span class="badge <?= $test['status'] === 'PASS' ? 'badge-pass' : 'badge-fail'; ?>">
                                        <?= escapeTestMatrix($test['status']); ?>
                                    </span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>

                </table>
            </div>

            <div class="info-note">
                <strong>Catatan Pengujian</strong>
                Nilai expected merupakan hasil yang diharapkan, sedangkan
                actual merupakan hasil perhitungan program. Jika keduanya
                sama, status pengujian adalah PASS; jika berbeda, statusnya
                FAIL.
            </div>

            <div class="actions">

                <a href="fee-calculator.php" class="btn btn-primary">
                    Kembali ke Kalkulator
                </a>

                <a href="index.php" class="btn btn-secondary">
                    Kembali ke Beranda
                </a>

            </div>

        </section>

    </main>

    <!-- FOOTER -->

    <footer class="footer">
        <div class="container">
            <p>
                &copy; <?= escapeTestMatrix($year); ?>
                KursusKu. Belajar Teknologi, Bangun Masa Depan.
            </p>
        </div>
    </footer>

</body>

</html>