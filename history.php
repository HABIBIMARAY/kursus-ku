<?php

declare(strict_types=1);

require __DIR__ . '/helpers.php';
if (!function_exists('e')) {
    function e($value): string
    {
        return htmlspecialchars(
            (string) $value,
            ENT_QUOTES,
            'UTF-8'
        );
    }
}

// Data dummy untuk latihan array dan foreach
$registration = [
    [
        'name' => 'Alya Putri',
        'course' => 'Web Dasar',
        'total' => 240000
    ],
    [
        'name' => 'Bima Saputra',
        'course' => 'PHP Dasar',
        'total' => 340000
    ],
    [
        'name' => 'Citra Rahma',
        'course' => 'Laravel Dasar',
        'total' => 500000
    ],
    [
        'name' => 'Dani Akbar',
        'course' => 'Web Dasar',
        'total' => 480000
    ],
];

// Perhitungan ringkasan
$totalPendaftaran = count($registration);
$totalPendapatan = array_sum(array_column($registration, 'total'));

// Format Rupiah langsung menggunakan number_format()
// agar tidak bergantung pada fungsi formatRupiah()
function formatRupiahHistory($angka): string
{
    return 'Rp ' . number_format((float) $angka, 0, ',', '.');
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>History Pendaftaran - KursusKu</title>

    <style>
        :root {
            --navy: #0f172a;
            --blue: #0284c7;
            --blue-dark: #0369a1;
            --cyan: #38bdf8;
            --blue-soft: #e0f2fe;
            --background: #f4f7fb;
            --text: #24344d;
            --muted: #64748b;
            --border: #e2e8f0;
            --white: #ffffff;
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
            line-height: 1.6;
        }

        a {
            text-decoration: none;
        }

        .navbar {
            background: var(--navy);
            color: var(--white);
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.12);
        }

        .nav-container {
            max-width: 1150px;
            margin: auto;
            padding: 18px 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
        }

        .brand {
            color: var(--white);
            font-size: 24px;
            font-weight: 800;
            letter-spacing: -0.5px;
        }

        .brand span {
            color: var(--cyan);
        }

        .nav-links {
            display: flex;
            flex-wrap: wrap;
            gap: 22px;
            align-items: center;
        }

        .nav-links a {
            color: #cbd5e1;
            font-size: 14px;
            transition: color 0.2s;
        }

        .nav-links a:hover,
        .nav-links a.active {
            color: var(--cyan);
        }

        .container {
            width: min(1100px, 92%);
            margin: 38px auto;
        }

        .page-heading {
            margin-bottom: 26px;
        }

        .eyebrow {
            display: inline-block;
            color: var(--blue-dark);
            background: var(--blue-soft);
            border-radius: 20px;
            padding: 6px 12px;
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }

        .page-heading h1 {
            color: var(--navy);
            font-size: clamp(27px, 4vw, 36px);
            line-height: 1.25;
            margin-bottom: 10px;
        }

        .page-heading p {
            color: var(--muted);
            font-size: 15px;
            max-width: 700px;
        }

        .summary-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px;
            margin-bottom: 26px;
        }

        .summary-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 5px 18px rgba(15, 23, 42, 0.04);
        }

        .summary-label {
            color: var(--muted);
            font-size: 14px;
            margin-bottom: 8px;
        }

        .summary-value {
            color: var(--navy);
            font-size: clamp(23px, 3vw, 30px);
            font-weight: 800;
            overflow-wrap: anywhere;
        }

        .summary-note {
            margin-top: 7px;
            color: var(--muted);
            font-size: 12px;
        }

        .history-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 5px 18px rgba(15, 23, 42, 0.04);
        }

        .card-header {
            padding: 22px 24px;
            border-bottom: 1px solid var(--border);
        }

        .card-header h2 {
            color: var(--navy);
            font-size: 20px;
            margin-bottom: 4px;
        }

        .card-header p {
            color: var(--muted);
            font-size: 13px;
        }

        .table-wrap {
            width: 100%;
            overflow-x: auto;
        }

        .course-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 620px;
        }

        .course-table thead {
            background: #f8fafc;
        }

        .course-table th {
            color: #475569;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.4px;
            text-align: left;
            padding: 16px 20px;
            border-bottom: 1px solid var(--border);
        }

        .course-table td {
            padding: 18px 20px;
            border-bottom: 1px solid #edf2f7;
            font-size: 14px;
            vertical-align: middle;
        }

        .course-table tbody tr:last-child td {
            border-bottom: none;
        }

        .course-table tbody tr:hover {
            background: #f8fbff;
        }

        .number-cell {
            color: var(--muted);
            width: 65px;
        }

        .name-cell {
            color: var(--navy);
            font-weight: 700;
        }

        .course-name {
            display: inline-block;
            background: var(--blue-soft);
            color: var(--blue-dark);
            padding: 6px 11px;
            border-radius: 7px;
            font-size: 12px;
            font-weight: 700;
        }

        .price-cell {
            color: var(--blue-dark);
            font-weight: 800;
            white-space: nowrap;
        }

        .empty-state {
            text-align: center;
            padding: 35px 20px !important;
            color: var(--muted);
        }

        .button-row {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 24px;
        }

        .button {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            border-radius: 9px;
            background: var(--blue);
            color: var(--white);
            font-size: 14px;
            font-weight: 700;
            transition: background 0.2s, transform 0.2s;
        }

        .button:hover {
            background: var(--blue-dark);
            transform: translateY(-1px);
        }

        .button-secondary {
            background: var(--white);
            color: var(--navy);
            border: 1px solid var(--border);
        }

        .button-secondary:hover {
            background: #f1f5f9;
            color: var(--navy);
        }

        .info-note {
            margin-top: 20px;
            padding: 15px 17px;
            background: #f8fafc;
            border: 1px solid var(--border);
            border-left: 4px solid var(--cyan);
            border-radius: 8px;
            color: var(--muted);
            font-size: 13px;
        }

        .footer {
            margin-top: 45px;
            padding: 22px 15px;
            text-align: center;
            background: var(--navy);
            color: #cbd5e1;
            font-size: 13px;
        }

        .footer strong {
            color: var(--cyan);
        }

        @media (max-width: 700px) {
            .nav-container {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-links {
                gap: 13px;
            }

            .container {
                margin: 27px auto;
            }

            .summary-grid {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .summary-card {
                padding: 20px;
            }

            .card-header {
                padding: 20px;
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

    <?php
    $registrations = [
        [
            'name' => 'Alya Putri',
            'course' => 'Web Dasar',
            'total' => 240000
        ],
        [
            'name' => 'Bima Saputra',
            'course' => 'PHP Dasar',
            'total' => 340000
        ],
        [
            'name' => 'Citra Rahma',
            'course' => 'Laravel Dasar',
            'total' => 500000
        ],
        [
            'name' => 'Dani Akbar',
            'course' => 'Web Dasar',
            'total' => 480000
        ],
    ];

    foreach ($registrations as $index => $item):
    ?>
        <tr>
            <td><?= $index + 1 ?></td>
            <td><?= htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8') ?></td>
            <td><?= htmlspecialchars($item['course'], ENT_QUOTES, 'UTF-8') ?></td>
            <td>
                Rp <?= number_format($item['total'], 0, ',', '.') ?>
            </td>
        </tr>
    <?php endforeach; ?>



    <header class="navbar">
        <div class="nav-container">
            <a class="brand" href="index.php">
                Kursus<span>Ku</span>
            </a>

            <nav class="nav-links">
                <a href="index.php">Beranda</a>
                <a href="index.php#katalog">Katalog</a>
                <a href="registration.php">Daftar</a>
                <a href="fee-calculator.php">Kalkulator Biaya</a>
                <a href="history.php" class="active">History</a>
            </nav>
        </div>
    </header>

    <main class="container">

        <section class="page-heading">
            <span class="eyebrow">MILESTONE 6 · FOREACH</span>

            <h1>History Pendaftaran</h1>

            <p>
                Halaman ini menampilkan contoh riwayat pendaftaran kursus
                menggunakan array, perulangan foreach, dan perhitungan total
                biaya pada KursusKu.
            </p>
        </section>

        <section class="summary-grid">

            <div class="summary-card">
                <p class="summary-label">Total Pendaftaran</p>

                <div class="summary-value">
                    <?= number_format($totalPendaftaran, 0, ',', '.') ?>
                    Pendaftar
                </div>

                <p class="summary-note">
                    Jumlah data pendaftaran pada contoh ini.
                </p>
            </div>

            <div class="summary-card">
                <p class="summary-label">Total Biaya Pendaftaran</p>

                <div class="summary-value">
                    <?= e(formatRupiahHistory($totalPendapatan)) ?>
                </div>

                <p class="summary-note">
                    Akumulasi total biaya dari seluruh data dummy.
                </p>
            </div>

        </section>

        <section class="history-card">

            <div class="card-header">
                <h2>Daftar Riwayat Kursus</h2>

                <p>
                    Data contoh untuk mempraktikkan array dan foreach.
                </p>
            </div>

            <div class="table-wrap">
                <table class="course-table">

                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Peserta</th>
                            <th>Nama Kursus</th>
                            <th>Total Biaya</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (!empty($registrations)): ?>

                            <?php foreach ($registrations as $index => $item): ?>
                                <tr>
                                    <td class="number-cell">
                                        <?= $index + 1 ?>
                                    </td>

                                    <td class="name-cell">
                                        <?= e($item['name']) ?>
                                    </td>

                                    <td>
                                        <span class="course-name">
                                            <?= e($item['course']) ?>
                                        </span>
                                    </td>

                                    <td class="price-cell">
                                        <?= e(formatRupiahHistory($item['total'])) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>

                        <?php else: ?>

                            <tr>
                                <td colspan="4" class="empty-state">
                                    Belum ada data pendaftaran.
                                </td>
                            </tr>

                        <?php endif; ?>
                    </tbody>

                </table>
            </div>

        </section>

        <div class="info-note">
            <strong>Catatan:</strong>
            Data pada halaman ini masih berupa data dummy yang ditulis
            langsung di dalam kode PHP. Data ini belum terhubung ke database
            dan belum mengambil riwayat pendaftaran asli.
        </div>

        <div class="button-row">
            <a class="button" href="registration.php">
                Daftar Kursus
            </a>

            <a class="button button-secondary" href="index.php">
                Kembali ke Beranda
            </a>
        </div>

    </main>

    <footer class="footer">
        &copy; <?= date('Y') ?> <strong>KursusKu</strong>.
        Belajar Teknologi, Bangun Masa Depan.
    </footer>

</body>

</html>