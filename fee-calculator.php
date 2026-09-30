<?php $courseName = 'Laravel Fundamental';
$fee = 350000;
$participantCount = 2;
$discountPercent = 10;
$adminFee = 25000;
$isActive = true;
$subtotal = $fee * $participantCount;
$discount = intdiv($subtotal * $discountPercent, 100);
$total = $subtotal - $discount + $adminFee; ?>
<?php
// Hitung subtotal
$subtotal = $fee * $participantCount;

// Hitung diskon
$discount = $subtotal * ($discountPercent / 100);

// Biaya admin
$adminFee = 5000;

// Hitung total akhir
$total = $subtotal - $discount + $adminFee;
?>

<table border="1" cellpadding="8">
    <!doctype html>
    <html lang="id">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kalkulator Biaya - KursusKu</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background: #f5f7f6;
                margin: 0;
                padding: 32px;
                color: #16332c
            }

            .card {
                max-width: 720px;
                margin: auto;
                background: white;
                padding: 24px;
                border-radius: 16px
            }

            table {
                width: 100%;
                border-collapse: collapse
            }

            th,
            td {
                border-bottom: 1px solid #ddd;
                padding: 10px;
                text-align: left
            }

            .total {
                background: #eaf7f3;
                font-weight: bold
            }

            a {
                color: #0f766e
            }
        </style>
    </head>

    <body>
        <main class="card">
            <h1>Kalkulator Estimasi Biaya</h1>
            <p>Kursus: <strong><?= $courseName ?></strong></p>
            <table>
                <tr>
                    <th>Komponen</th>
                    <th>Nilai</th>
                </tr>
                <tr>
                    <td>Biaya per peserta</td>
                    <td>Rp <?= number_format($fee, 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td>Jumlah peserta</td>
                    <td><?= $participantCount ?></td>
                </tr>
                <tr>
                    <td>Subtotal</td>
                    <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td>Diskon (<?= $discountPercent ?>%)</td>
                    <td>- Rp <?= number_format($discount, 0, ',', '.') ?></td>
                </tr>
                <tr>
                    <td>Biaya admin</td>
                    <td>Rp <?= number_format($adminFee, 0, ',', '.') ?></td>
                </tr>
                <tr class="total">
                    <td>Total akhir</td>
                    <td>Rp <?= number_format($total, 0, ',', '.') ?></ td>
                </tr>
            </table>
            <p><a href="index kalkulator.php">Kembali ke Beranda KursusKu</a></p>
        </main>
    </body>

    </html>

    <?php
    $testCases = [
        [1, 350000, 1, 0, 25000, 375000],
        [2, 350000, 1, 10, 25000, 340000],
        [3, 350000, 2, 25, 25000, 550000],
        [4, 0, 1, 10, 0, 0],
        [5, 2500000, 3, 10, 50000, 6800000],
    ];
    ?>
    <!doctype html>
    <html lang="id">

    <head>
        <meta charset="utf-8">
        <title>Test Case Matrix - KursusKu</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                padding: 24px;
                background: #f5f7f6;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                background: #fff;
            }

            th,
            td {
                border: 1px solid #ddd;
                padding: 10px;
                text-align: center;
            }

            th {
                background: #0f766e;
                color: white;
            }

            .pass {
                color: green;
                font-weight: bold;
            }

            .fail {
                color: red;
                font-weight: bold;
            }
        </style>
    </head>

    <body>
        <h2>Hasil Uji Matriks 5 Test Case (Milestone 3)</h2>
        <table>
            <tr>
                <th>No</th>
                <th>Fee</th>
                <th>Peserta</th>
                <th>Diskon</th>
                <th>Admin</th>
                <th>Expected Total</th>
                <th>Actual Total</th>
                <th>Status</th>
            </tr>
            <?php foreach ($testCases as [$no, $fee, $qty, $disc, $admin, $expected]): ?>
                <?php
                $subtotal = $fee * $qty;
                $discount = intdiv($subtotal * $disc, 100);
                $actual = $subtotal - $discount + $admin;
                $status = ($actual === $expected) ? 'PASS' : 'FAIL';
                ?>
                <tr>
                    <td><?= $no ?></td>
                    <td>Rp <?= number_format($fee, 0, ',', '.') ?></td>
                    <td><?= $qty ?></td>
                    <td><?= $disc ?>%</td>
                    <td>Rp <?= number_format($admin, 0, ',', '.') ?></td>
                    <td>Rp <?= number_format($expected, 0, ',', '.') ?></td>
                    <td>Rp <?= number_format($actual, 0, ',', '.') ?></td>
                    <td class="<?= strtolower($status) ?>"><?= $status ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    </body>

    </html>